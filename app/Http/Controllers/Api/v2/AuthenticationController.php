<?php

namespace App\Http\Controllers\Api\v2;

use Carbon\Carbon;
use App\Helpers\Helper;
use App\Helpers\LogActivity;
use App\Models\Employee;
use App\Models\Translation;
use Illuminate\Support\Str;
use App\Models\EmployeeCode;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\ApiV2Controller;
use App\Services\Auth\Google2faService;
use Illuminate\Support\Facades\RateLimiter;


class AuthenticationController extends ApiV2Controller
{
    // public $userData;

    // public function __construct()
    // {
    //     // All the functions should first consume the listed middlewares before proceeding, apart from login function
    //     //        $this->middleware("auth:api", ["except" => ["login"]]);
    // }

    // //TIED TO v1/auth/login ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    // public function login()
    // {
    //     try {
    //         Helper::custom_validator(request()->all(), ['email' => 'required|email', 'password' => 'required|string',]);

    //         $user_data = AuthService::login(request('email'), request('password'));
    //         return $this->customSuccessResponseWithPayload($user_data);
    //     } catch (\Throwable $ex) {
    //         return $this->customFailResponseWithPayload($ex->getMessage());
    //     }
    // }

    // //tied to v2/auth/login
    // public function two_factor_login()
    // {
    //     try {

    //         Helper::custom_validator(request()->all(), [
    //             'email' => 'required|email',
    //             'password' => 'required|string',
    //             'login_type' => 'nullable',
    //             'phone' => 'nullable'
    //         ]);

    //         if (AuthService::hasUserEnteredTemporaryPassword(request('email'))) {
    //             $data = AuthService::attemptLogin(
    //                 email: request('email'),
    //                 password: request('password'),
    //                 login_type: request('login_type')
    //             );

    //             if (is_string($data)) {
    //                 $new_login_type = str_contains($data, 'Check your email') ? LOGIN_WITH_EMAIL : LOGIN_WITH_SMS;
    //                 $message = $data;
    //             } else {
    //                 $new_login_type = LOGIN_WITH_APP;
    //                 $message = 'Check your Two Authenticator App for the OTP';
    //             }

    //             return $this->sendResponse(data: ['login_type' => $new_login_type], success_code: 20000, message: $message);
    //         }
    //         $data = AuthService::confirmTemporaryPassword(email: request('email'), temp_password: request('password'));

    //         return $this->sendResponse($data, success_code: 20001);
    //     } catch (\Throwable $th) {
    //         return $this->sendError($th->getMessage());
    //     }
    // }

    // public function me()
    // {
    //     if (Auth::check()) {
    //         $user = AuthService::currentUser();
    //         return $this->customSuccessResponseWithPayload($user);
    //     }
    //     return $this->customFailResponseWithPayload("Please login");
    // }


    // //TIED TO v1/auth/logout ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    // public function destroy()
    // {
    //     LogActivity::addToLog('User Logged Out', 'Logout');
    //     // Log out the client
    //     Auth::logout();

    //     // Notify the client that the logout was successful
    //     return $this->customSuccessResponseWithMessage("Successfully logged out");
    // }


    // //TIED TO v1/auth/refresh ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    // public function refresh()
    // {
    //     $user = EmployeeCode::where('employee_id', Auth::user()->id)->first();

    //     $user->update([
    //         'last_login_time' => Carbon::now()
    //     ]);

    //     LogActivity::addToLog('User Refreshed Login Token', 'LoginSuccess');
    //     // Create a new token for the logged in user, and return it to the client
    //     return $this->customSuccessResponseWithPayload([
    //         "token" => Auth::refresh(),
    //         "user" => Auth::user(),
    //         "token_type" => "bearer",
    //     ]);
    // }

    // public function get_all_translations()
    // {
    //     $language_code = get_facility_setting('lang');
    //     // dd($languageCode);
    //     return Cache::rememberForever("frontend-translations-{$language_code}", function () use ($language_code) {
    //         return json_decode(Translation::where('lang', $language_code)->pluck('translation_text', 'source_text')->toJson());
    //     });
    // }

    // public function verify(Request $request)
    // {
    //     $phone = Str::replace(' ', '', $request->phone);

    //     if (get_facility_setting('employee_login_with') === 'email' || (get_facility_setting('employee_login_with') === 'email_phone' && get_facility_setting('employee_otp_with') === 'email')) {
    //         $employee = Employee::where('email', $request->email)->first();
    //     } elseif (get_facility_setting('employee_login_with') === 'phone' || (get_facility_setting('employee_login_with') === 'email_phone' && get_facility_setting('employee_otp_with') === 'phone')) {
    //         $employee = Employee::where('phone', $phone)->first();
    //     } else {
    //         $employee = null;
    //     }

    //     if (!$employee) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'No employee found with this email address.'
    //         ], 200);
    //     }
    //     if ($employee->verification_code != $request->code) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Code does not match.'
    //         ], 200);
    //     } else {

    //         if (get_setting('employee_login_with') === 'email' || (get_facility_setting('employee_login_with') === 'email_phone' && get_facility_setting('employee_otp_with') === 'email')) {
    //             if (get_setting('employee_login_with') === 'email' || (get_facility_setting('employee_login_with') === 'email_phone' && get_facility_setting('employee_otp_with') === 'email')) {
    //                 $employee->email_verified_at = date('Y-m-d H:m:s');
    //                 $employee->is_email_verified = 1;
    //                 $employee->verification_code = '';
    //             } else {
    //                 $employee->phone_verified_at = date('Y-m-d H:m:s');
    //                 $employee->is_phone_verified = 1;
    //                 $employee->verification_code = '';
    //             }

    //             $employee->save();
    //             return $this->customSuccesResponseWithPayload('account verified, Please continue to the login screen');
    //         }
    //     }
    // }

    // public function verify2faOtp()
    // {
    //     try {
    //         Helper::custom_validator(request()->all(), ['code' => 'required', 'email' => 'required|email', 'password' => 'required|string',]);

    //         $user_data = AuthService::verify2faUsingApp(request('code'), request('email'), request('password'));
    //         return $this->customSuccessResponseWithPayload($user_data);
    //     } catch (\Throwable $ex) {
    //         return $this->customFailResponseWithPayload($ex->getMessage());
    //     }
    // }

    // public function confirmTemporaryPassword()
    // {
    //     try {
    //         Helper::custom_validator(request()->all(), ['email' => 'required|email', 'password' => 'required|string']);

    //         $user_data = AuthService::confirmTemporaryPassword(request('email'), request('password'));
    //         return $this->sendResponse($user_data, '', 2044);
    //     } catch (\Throwable $ex) {
    //         return $this->sendError($ex->getMessage());
    //     }
    // }

    // public function verify_2fa_and_login(Request $request)
    // {
    //     try {
    //         $rules = [
    //             'code' => 'required',
    //             'email' => 'required|email'
    //         ];
    //         Helper::custom_validator($request->all(), $rules);

    //         $user_data = AuthService::newLogin(
    //             email: $request->email,
    //             otpCode: $request->code
    //         );
    //         return $this->sendResponse($user_data);
    //     } catch (\Throwable $ex) {
    //         return $this->sendError($ex->getMessage());
    //     }
    // }

    // public function send_phone_otp(Request $request)
    // {
    //     try {
    //         $rules = [
    //             'phone' => 'required',
    //             'email' => 'required|email',
    //             'password' => 'required|string',
    //         ];
    //         Helper::custom_validator($request->all(), $rules);

    //         $message_notification = AuthService::sendOtp(
    //             email: $request->email,
    //             password: $request->password,
    //             phone: $request->phone
    //         );
    //         return $this->sendResponse($message_notification);
    //     } catch (\Throwable $ex) {
    //         return $this->sendError($ex->getMessage());
    //     }
    // }

    // public function test_qr_code(Request $request)
    // {
    //     try {
    //         $rules = [
    //             'email' => 'required|email'
    //         ];
    //         Helper::custom_validator($request->all(), $rules);

    //         $user = Employee::where('email', $request->email)->first();

    //         if ($user) {
    //             Google2faService::generate2faSecret($user);
    //             return $this->sendResponse(message: 'The email has been sent');
    //         }
    //         throw new \Exception('User with email ' . $request->email . ' not found');
    //     } catch (\Throwable $ex) {
    //         return $this->sendError($ex->getMessage());
    //     }
    // }

    // public function loin_withonly_email()
    // {
    //     try {
    //         return $this->sendResponse(AuthService::loginWithOnlyEmail(request('email')));
    //     } catch (\Throwable $ex) {
    //         return $this->sendError($ex->getMessage());
    //     }
    // }

    // public function loin_email()
    // {
    //     try {
    //         return $this->sendResponse(['logged in']);
    //     } catch (\Throwable $ex) {
    //         return $this->sendError('Not logged in');
    //     }
    // }
    public $userData;

    public function __construct()
    {
        // All the functions should first consume the listed middlewares before proceeding, apart from login function
        //        $this->middleware("auth:api", ["except" => ["login"]]);
    }

    //TIED TO v1/auth/login ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function login(): \Illuminate\Http\JsonResponse
    {
        $credentials = request(['email', 'password']);
        //generating token for both user
        $token = auth('api')->attempt($credentials);
        if ($token = auth('api')->attempt($credentials)) {
            $response = [
                'token' => $token,
                'token_type' => 'bearer',
                'user' => auth()->user(),
                "roles" => Auth::user()->roles->pluck('name'),
                "permissions" => auth()->user()->permissions,
                'expires_in' => auth()->factory()->getTTL() * 60
            ];

            LogActivity::addToLog('User Logged into the system', 'LoginSuccess');

            return $this->customSuccessResponseWithPayload($response);
        }

        LogActivity::addToLog('User with email' . ' ' . request()->email . ' ' . 'failed to login', 'LoginFail');

        return $this->customFailResponseWithPayload('Unauthorized');
    }

    //tied to v2/auth/login
    public function two_factor_login()
    {
        try{

            Helper::custom_validator(request()->all(),['email' => 'required|email','password' => 'required|string']);

            $user = Employee::where('email',request()->email)->first();

            if (!$user || !Hash::check(request()->password, $user->password)) {
                RateLimiter::hit($this->throttleKey(), get_facility_setting('locked_account_duration_mins', 3) * 60);

                LogActivity::addToLog('User with email' . ' ' . request()->email . ' ' . 'failed to login', 'LoginFail');

            } else {

                $credentials = [
                    'email' => $user->email,
                    'password' => request()->password
                ];

                Employee::sendCode($user, $credentials);

                LogActivity::addToLog('User with email'.' '.request()->email.' '. 'received TFA code', 'LoginSuccess');

                return $this->customSuccessResponseWithPayload('Check your email for code');
            }
        } catch(\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function me()
    {
        if (Auth::check()) {
            $response = [
                "roles" => Auth::user()->roles,
                "permissions" => auth()->user()->permissions,
                "user" => Auth::user()
            ];
            return $this->customSuccessResponseWithPayload($response);
        }

        return $this->customFailResponseWithPayload("me");
        // return $this->getPermissions();
    }


    //TIED TO v1/auth/logout ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function destroy()
    {
        LogActivity::addToLog('User Logged Out of the system', 'Logout');
        // Log out the client
        Auth::logout();

        // Notify the client that the logout was successful
        return $this->customSuccessResponseWithMessage("Successfully logged out");
    }


    //TIED TO v1/auth/refresh ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function refresh()
    {
        $user = EmployeeCode::where('employee_id', Auth::user()->id)->first();

        $user->update([
            'last_login_time' => Carbon::now()
        ]);
        // Create a new token for the logged in user, and return it to the client
        return $this->customSuccessResponseWithPayload([
            "token" => Auth::refresh(),
            "user" => Auth::user(),
            "token_type" => "bearer",
        ]);
    }

    public function get_all_translations()
    {
        $language_code = get_facility_setting('lang');
        // dd($languageCode);
        return Cache::rememberForever("frontend-translations-{$language_code}", function () use ($language_code) {
            return json_decode(Translation::where('lang', $language_code)->pluck('translation_text', 'source_text')->toJson());
        });
    }

    public function throttleKey(): string
    {
        return Str::lower(request('email')) . '|' . request()->ip();
    }

    public function checkTooManyFailedAttempts()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), get_facility_setting('max_login_attempts', 4))) {
            return;
        }
        throw new \Exception('Too many failed login attempts, account is temporarily locked. Please wait for '
            . get_facility_setting('locked_account_duration_mins', 3) . ' minutes and try again');
    }

    public function remainingLoginAttempts(): int
    {
        // adding 1 to avoid showing user [0] attempts
        return RateLimiter::retriesLeft($this->throttleKey(), get_facility_setting('max_login_attempts', 4)) + 1;
    }
}
