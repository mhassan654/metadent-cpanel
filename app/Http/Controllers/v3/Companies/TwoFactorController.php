<?php

namespace App\Http\Controllers\v3\Companies;

use App\Http\Controllers\Controller;
use App\Models\UserCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class TwoFactorController extends Controller
{
    /**
     * Write code on Method
     *
     * @return \Illuminate\Http\JsonResponse()
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required',
        ]);

        // dd(SessionModel::get('credentials'));
        $user_auth_token = Auth::attempt(Session::get('credentials'));

        if($user_auth_token)
        {
            $find = UserCode::orderBy('updated_at','desc')
                ->where('user_id',auth()->user()->id)
                ->where('code',$request->code)
                ->first();

            if(is_null($find))
            {
                return $this->customFailResponseWithPayLoad('Wrong Code');
            }else
            {
                return $this->customSuccessResponseWithPayLoad([
                    'token'=>$user_auth_token,
                    'user'=>Auth::user(),
                    'token_type'=>'bearer',
                    Auth::user()->roles
                ]);
            }
        }else
        {
            return $this->customFailResponseWithPayLoad('Unauthorized');
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

        return $this->customSuccessResponseWithMessage('We sent you code on your email. '.substr(auth()->user()->email, 0, 5) . '******' . substr(auth()->user()->email,  -2));
    }

}
