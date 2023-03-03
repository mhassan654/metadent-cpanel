<?php

namespace App\Http\Controllers\Api\v2;

use App\Mail\SendResetPasswordEmail;
use App\Modules\Common\Helper;
use Metadent\AuthModule\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends BaseController
{
    /**
     * Send password reset link
     *
     * @return \Illuminate\Http\JsonResponse()
     */
    public function submitForgetPassword(Request $request)
    {
        try {
            Helper::custom_validator(request()->all(), [
                'email' => 'required|email|exists:employees',
            ], [
                'email.required' => 'Email does not exist',
                'email.exists' => 'Email does not exist'
            ]);

           $last_password_request = DB::table('password_resets')->where('email',$request->email )->first();

            if($last_password_request){
                DB::table('password_resets')->where('email',$request->email )->delete();
            }

            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::to($request->email)
                ->send(new SendResetPasswordEmail(
                    'emails.resetPasswordEmail',
                    'Reset Password Notification',
                    ['token' => $token, 'email' => $request->email, 'path' => $request->url]
                ));

            return $this->sendResponse([], 'We have e-mailed your password reset link!');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage());
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm()
    {
        try {
            Helper::custom_validator(request()->all(), [
                'email' => 'required|email|exists:employees',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ]);

            $updatePassword = DB::table('password_resets')
                ->where([
                    'email' => request()->email,
                    'token' => request()->token
                ])
                ->first();

            if (!$updatePassword) {
                return $this->customFailResponseWithPayload('Invalid token!');
            }

            Employee::where('email', request()->email)
                ->update(['password' => Hash::make(request()->password)]);

            DB::table('password_resets')->where(['email' => request()->email])->delete();

            return $this->customSuccessResponseWithPayload('Your password has been changed!');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
