<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Mail\SendResetPasswordEmail;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{


    /**
     * Send password reset link
     *
     * @return \Illuminate\Http\JsonResponse()
     */
    public function submitForgetPassword(\Illuminate\Http\Request $request)
    {
        try {
            $validator = Validator::make(request() -> all(),[
               'email' => 'required|email|exists:employees',
            ]);

            if ($validator -> fails()){
                $errors = $validator -> errors();
                return $this->customFailResponseWithPayload($errors->all());
            }

            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::to($request->email)
                ->send(new SendResetPasswordEmail('emails.resetPasswordEmail',
                    'Reset Password Notification',
                    ['token' => $token,'email' => $request->email]));

            return $this->customSuccessResponseWithPayload('We have e-mailed your password reset link!');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
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
            $validator = Validator::make(request() -> all(),[
                'email' => 'required|email|exists:employees',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ]);

            if ($validator -> fails()){
                $errors = $validator -> errors();
                return response() -> json($errors -> all(),500);
            }

            $updatePassword = DB::table('password_resets')
                ->where([
                    'email' => request()->email,
                    'token' => request()->token
                ])
                ->first();

            if(!$updatePassword){
                return $this->customFailResponseWithPayload('Invalid token!');
            }

            Employee::where('email', request()->email)
                ->update(['password' => Hash::make(request()->password)]);

            DB::table('password_resets')->where(['email'=> request()->email])->delete();

            return $this->customSuccessResponseWithPayload('Your password has been changed!');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

    }
}
