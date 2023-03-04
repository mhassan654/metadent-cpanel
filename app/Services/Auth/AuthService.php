<?php

namespace App\Services\Auth;

use Carbon\Carbon;
use App\Helpers\Helper;
use App\Models\Employee;
use Illuminate\Support\Str;
use App\Helpers\LogActivity;
use App\Models\EmployeeCode;
use App\Services\Sms\SmsService;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use PragmaRX\Google2FAQRCode\Google2FA;
use Illuminate\Support\Facades\RateLimiter;

class AuthService
{

    public static function login(string $email, string $password, string|null $login_type = null): array
    {

        JWTAuth::factory()->setTTL(get_facility_setting('min_login_session_time', 60));

        $auth_token = Auth::attempt(['email' => $email, 'password' => $password]);

        if ($auth_token) {

            $user = auth()->user();
            LogActivity::addToLog('User Logged into the system', action: 'Login2faSuccess', employee_id: $user->id);

            if ($login_type && $user->login_2fa_method) {
                $user->update(['login_2fa_method' => $login_type]);
            }
            return [
                'token' => $auth_token,
                'user' => $user,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
                'max_idle_minutes' => get_facility_setting("max_idle_minutes", 30),
                'idle_display_minutes' => get_facility_setting("max_timeout_idle_minutes", 5),
                'permissions' => $user->permissions,
                'roles' => $user->roles->pluck('name'),
            ];
        }

        LogActivity::addToLog('User with email' . ' ' . $email . ' ' . 'failed to login', action: 'LoginFail');

        throw new \Exception('The combination of email and password is incorrect please check your details & try again.');
    }

    public static function verify2faUsingApp(string $code, $employee): array
    {
        // $user = self::attemptLogin($email, $password, LOGIN_WITH_APP);

        $twoFa = new Google2FA();
        $valid = $twoFa->verifyKey($employee->google2fa_secret, $code);

        if ($valid) {
            // 'OPT successfull => login';
            // return self::login($email, $password, LOGIN_WITH_APP);
            return self::loginWithOnlyEmail($employee->email);
        }
        throw new \Exception('Invalid or expired code entered');
    }

    /**
     * @throws \Exception
     */
    public static function attemptLogin(string $email, string $password, string|null $login_type = null): Model | string
    {

        $employee = self::checkLoginAttempts($email, $password);

        $auth_login_type = $login_type ?? $employee->login_2fa_method;

        $employee->update(['login_2fa_method' => $auth_login_type]);

        if ($auth_login_type == LOGIN_WITH_EMAIL) {
            $credentials = [
                'email' => $email,
                'password' => $password
            ];

            Employee::storeLoginCode($employee, null);

            LogActivity::addToLog('User with email ' .  $email . ' received 2FA code', action: 'LoginSuccess');

            return 'Check your email for the verification code';
        }
        if ($auth_login_type == LOGIN_WITH_SMS) {
            // $telephone = $phone ?? $employee->phone;
            if ($employee->phone) {
                $data =  SmsService::sendOtp($employee->phone);
                Employee::storeLoginCode($employee, $data['otp']);
                // if ($telephone) $employee->update(['phone' => $telephone]);
                return $data['message'];
            }
            throw new \Exception('Please go to admin to add your OTP phone number');
        }

        Google2faService::checkUserEnabled2FA($employee);

        Employee::storeLoginCode($employee, null);

        return $employee;
    }

    public static function verifyOtpCode(string $code, string $email): Model
    {
        $employeeCode = EmployeeCode::where('code', $code)->first();
        $expiry_minutes = get_facility_setting("mfa_code_expiry_minutes", 15);

        if (is_null($employeeCode)) {
            LogActivity::addToLog('User entered a wrong code', action: 'LoginFail');
            throw new \Exception('Invalid or expired code entered');
        }

        if ((int) $employeeCode->is_used === 1) {

            LogActivity::addToLog('User entered a used code', action: 'LoginFail', employee_id: $employeeCode->employee_id);

            throw new \Exception('Your Code has already been used!, Please login again for new code');
        } elseif (Carbon::parse($employeeCode->expire_time)->diffInMinutes(Carbon::now()) > $expiry_minutes) {

            LogActivity::addToLog('User with entered an expired code', action: 'LoginFail', employee_id: $employeeCode->employee_id);

            throw new \Exception('Your Code has already Expired!, Please login again for new code');
        }
        return $employeeCode;
    }

    public static function verifyCodeAndLogin(string $code, $user): array
    {
        self::verifyOtpCode($code, $user->email);

        $user->update([
            'is_used' => 1,
            'last_login_time' => Carbon::now(),
        ]);

        // return self::login($email, $password, LOGIN_WITH_EMAIL);
        return self::loginWithOnlyEmail($user->email);
    }

    protected static function throttleKey(): string
    {
        return Str::lower(request('email')) . '|' . request()->ip();
    }

    protected static function checkTooManyFailedAttempts(): void
    {
        if (!RateLimiter::tooManyAttempts(self::throttleKey(), get_facility_setting('max_login_attempts', 4))) {
            return;
        }
        $seconds = RateLimiter::availableIn(self::throttleKey());
        throw new \Exception('Too many failed login attempts, account is temporarily locked. Please wait for '
            . $seconds . ' seconds to try again');
    }

    protected static function remainingLoginAttempts(): int
    {
        // adding 1 to avoid showing user [0] attempts
        return RateLimiter::retriesLeft(self::throttleKey(), get_facility_setting('max_login_attempts', 4)) + 1;
    }

    public static function currentUser(): array
    {
        $user = auth()->user();
        return [
            "roles" => $user->roles,
            "permissions" => $user->permissions,
            "user" => $user,
            'expires_in' => auth()->factory()->getTTL() * 60,
            'max_idle_minutes' => get_facility_setting("max_idle_minutes", 30),
            'idle_display_minutes' => get_facility_setting("max_timeout_idle_minutes", 5),
        ];
    }

    public static function refreshToken()
    {
        $user = auth()->user();
        self::updateUserLastLogin($user->id);

        LogActivity::addToLog('User Refreshed Auth Token', action: 'LoginSuccess');
        // Create a new token for the logged in user, and return it to the client
        return [
            "token" => Auth::refresh(),
            "user" => $user,
            "token_type" => "bearer",
            "roles" => $user->roles,
            "permissions" => $user->permissions,
            'expires_in' => auth()->factory()->getTTL() * 60,
            'max_idle_minutes' => get_facility_setting("max_idle_minutes", 30),
            'idle_display_minutes' => get_facility_setting("max_timeout_idle_minutes", 5),
        ];
    }

    public static function updateUserLastLogin(string|int $userId): Model
    {
        $user = EmployeeCode::where('employee_id', $userId)->first();

        $user->update([
            'last_login_time' => Carbon::now()
        ]);
        return $user;
    }

    public static function confirmTemporaryPassword(string $email, string $temp_password)
    {
        $employee = Employee::where('email', $email)->first(); //->where('is_temp_password_updated', NO);

        if (!$employee) {
            throw new \Exception('Please check the link in your email and try again');
        }

        if (Hash::check($temp_password, $employee->password)) {
            $employee->is_temp_password_updated = YES;
            $employee->save();
            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            return [
                'email' => $email,
                'token' => $token
            ];
        }
        throw new \Exception('Please check your email for the temporary password');
    }

    public static  function resetPassword($email, $password)
    {
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => request()->email,
                'token' => request()->token
            ])
            ->first();

        if (!$updatePassword) {
            throw new \Exception('Invalid token!');
        }

        Employee::where('email', $email)
            ->update(['password' => Hash::make($password)]);

        DB::table('password_resets')->where(['email' => request()->email])->delete();

        return 'Your password has been changed!';
    }

    public static function hasUserEnteredTemporaryPassword(string $email): bool
    {
        $employee = self::checkLoginAttempts($email, null);

        return $employee->is_temp_password_updated == YES;
    }

    public static function verifySmsOtp(string $opt_code)
    {
        return SmsService::verifyOtp($opt_code);
    }

    // public static function verify2faAndLogin(string $email, string $password,  string $code, string|null $login_type = null)
    // {
    //     $new_2fa_login_method = $login_type ?? self::getUserLogin2faMethod($email, $password);
    //     if ($new_2fa_login_method == LOGIN_WITH_SMS) {
    //         SmsService::verifyOtp($code);
    //         return self::login($email, $password, LOGIN_WITH_SMS);
    //     } else if ($new_2fa_login_method == LOGIN_WITH_APP) {
    //         return self::verify2faUsingApp($code,  $email);
    //     } else {
    //         return self::verifyCodeAndLogin($code, $email);
    //     }
    // }

    public static function getUserLogin2faMethod(string $email, string $password): string
    {
        $employee = Employee::where('email', $email)->first();

        if (!$employee || !Hash::check($password, $employee->password)) {
            throw new \Exception('Check your email and password');
        }
        return  $employee->login_2fa_method;
    }

    public static function getLogginUser(string $email, string $password): Model
    {
        $employee = Employee::where('email', $email)->first();

        if (!$employee || !Hash::check($password, $employee->password)) {
            throw new \Exception('Check your email and password');
        }
        return  $employee;
    }

    public static function sendOtp(string $email, string $password, string $phone)
    {
        $user = self::getLogginUser($email, $password);
        $data = SmsService::sendOtp($phone);
        $user->update(['phone' => $phone, 'login_2fa_method' => LOGIN_WITH_SMS]);
        return $data['message'];
    }

    public static function checkLoginAttempts(string $email, ?string $password): Employee
    {
        self::checkTooManyFailedAttempts();

        $employee = Employee::where('email', $email)->first();

        if (!$employee || (isset($password) && !Hash::check($password, $employee->password))) {

            RateLimiter::hit(self::throttleKey(), get_facility_setting('locked_account_duration_mins', 3) * 60);

            LogActivity::addToLog('User with email' . ' ' . $email . ' ' . 'failed to login', action: 'LoginFail');

            throw new \Exception(
                'The combination of email and password is incorrect please check your details & try again. '
                . self::remainingLoginAttempts() . ' attempts remaining'
            );
        }
        return $employee;
    }

    public static function loginWithOnlyEmail(string $email)
    {
        JWTAuth::factory()->setTTL(get_facility_setting('min_login_session_time', 60));
        $employee = Employee::where('email', $email)->first();

        if (!$employee) {
            throw new \Exception('User not found');
        }
        $token = JWTAuth::fromUser($employee);
        JWTAuth::setToken($token)->toUser();
        $user = auth()->user();
        return [
            'token' => $token,
            'user' => $user,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'max_idle_minutes' => get_facility_setting("max_idle_minutes", 30),
            'idle_display_minutes' => get_facility_setting("max_timeout_idle_minutes", 5),
            "roles" => $user->roles,
            "permissions" => $user->permissions,
        ];
    }

    public static function newLogin(string $email, string $otpCode)
    {
        $employee = Employee::where('email', $email)->first();
        if (!$employee) {
            throw new \Exception('Your Code has already Expired!, Please login again for new code');
        }
        $login_2fa_method = $employee->login_2fa_method;

        if ($login_2fa_method == LOGIN_WITH_SMS || $login_2fa_method == LOGIN_WITH_EMAIL) {
            return self::verifyCodeAndLogin($otpCode, $employee);
        } else {
            return self::verify2faUsingApp(code: $otpCode, employee: $employee);
        }
    }
}
