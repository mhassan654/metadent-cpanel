<?php

namespace App\Http\Controllers\Api\v2;

use App\Modules\Common\Helper;
use App\Modules\Core\LogActivity;
use App\Models\EmployeeCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\ApiV2Controller;

class TwoFAController extends ApiV2Controller
{
    /**
     * Write code on Method
     *
     * @return \Illuminate\Http\JsonResponse()
     */
    public function store(Request $request)
    {
        try {
            Helper::custom_validator($request->all(), [
                'code' => 'required',
                'login_type' => 'nullable'
            ]);

            $user = EmployeeCode::where('code', request()->code)->first();

            if (is_null($user)) {

                return $this->customFailResponseWithPayload('Wrong Code entered');
            } else {

                $email = json_decode($user->credentials)->email;
                $password = json_decode($user->credentials)->password;
                $expiry_minutes = get_facility_setting("mfa_code_expiry_minutes", 15);


                if ((int) $user->is_used === 1) {

                    LogActivity::addToLog('User entered a used code', 'LoginFail', null, null, null, null, $user->employee_id);

                    return $this->customFailResponseWithPayload('Your Code has already been used!, Please login again for new code');
                } elseif (Carbon::parse($user->expire_time)->diffInMinutes(Carbon::now()) > $expiry_minutes) {

                    LogActivity::addToLog('User with entered an expired code', 'LoginFail', null, null, null, null, $user->employee_id);

                    return $this->customFailResponseWithPayload('Your Code has already Expired!, Please login again for new code');
                } else {

                    // $user_auth_token = Auth::attempt(['email' => $email,'password' => $password]);
                    JWTAuth::factory()->setTTL(get_facility_setting('min_login_session_time', 60));

                    $user_auth_token = JWTAuth::attempt(['email' => $email, 'password' => $password]);

                    if ($user_auth_token) {
                        $request->session()->forget('credentials');

                        $user->update([
                            'is_used' => 1,
                            'last_login_time' => Carbon::now(),
                        ]);

                        LogActivity::addToLog('User Logged into the system', 'LoginSuccess');

                        return $this->customSuccessResponseWithPayLoad([
                            'token' => $user_auth_token,
                            'user' => Auth::user(),
                            'token_type' => 'bearer',
                            'expires_in' => auth()->factory()->getTTL() * 60,
                            'permissions' => auth()->user()->permissions,
                            'roles' => Auth::user()->roles->pluck('name'),
                            'max_idle_minutes' => get_facility_setting("max_idle_minutes", 30),
                            'idle_display_minutes' => get_facility_setting("max_timeout_idle_minutes", 5)
                        ]);
                    } else {

                        LogActivity::addToLog('User failed to authenticate', 'LoginFail', null, null, null, null, $user->employee_id);

                        return $this->customFailResponseWithPayLoad('Unauthorized');
                    }
                }
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayLoad($th->getMessage());
        }
    }

    /**
     * Write code on Method
     *
     * @return \Illuminate\Http\JsonResponse()
     */
    public function resend()
    {
        auth()->user()->generateCode();

        return $this->customSuccessResponseWithMessage('We sent you code on your email. ' . substr(auth()->user()->email, 0, 5) . '******' . substr(auth()->user()->email, -2));
    }
}
