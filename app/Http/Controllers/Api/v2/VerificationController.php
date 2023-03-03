<?php

namespace App\Http\Controllers\Api\v2;

use Metadent\AuthModule\Models\Employee;
use Carbon\Carbon;

//use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends BaseController
{
    /*
  |--------------------------------------------------------------------------
  | Email Verification Controller
  |--------------------------------------------------------------------------
  |
  | This controller is responsible for handling email verification for any
  | user that recently registered with the application. Emails may also
  | be re-sent if the user didn't receive the original email message.
  |
  */

    // use VerifiesEmail;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        // $this->middleware('signed')->only('verify');
//        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verification_confirmation($code){
        $user = Employee::where('verification_code', $code)->first();
        if($user != null){
            $user->email_verified_at = Carbon::now();
            $user->save();
            auth()->login($user, true);
            return $this->customSuccesResponseWithPayload('Your email has been verified successfully');
        }
        else {
            return $this->customFailResponseWithPayload('Sorry, we could not verifiy you. Please try again');

        }

    }
}
