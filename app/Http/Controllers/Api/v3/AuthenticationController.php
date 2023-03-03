<?php

namespace App\Http\Controllers\Api\v3;

use App\Http\Controllers\ApiBaseController;
use App\Models\User;
use App\Models\UserCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthenticationController extends ApiBaseController
{
    public function __construct()
    {
        // All the functions should first consume the listed middlewares before proceeding, apart from login function
        $this->middleware("auth:api", ["except" => ["login"]]);
    }

    //TIED TO v1/auth/login ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function login(Request $request)
    {
        request()->validate([
            "email" => "required",
            "password" => "required",
        ]);
        $user = User::where('email', $request->email)->first();
        if (is_null($user)) {
            return $this->customFailResponseWithPayload("The combination of Username and password is incorrect please check yo details & try again");
        } else {
            if (!Hash::check($request->password, $user->password)) {
                return $this->customFailResponseWithPayload("The combination of Username and password is incorrect please check yo details & try again");
            } else {
                User::generateCode($user->id, $user->email);
                Session::put('credentials', request(['email', 'password']));
                return $this->customSuccessResponseWithPayload('We sent you code on your email. ' . substr($user->email, 0, 5) . '******' . substr($user->email,  -2));
            }
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

        return $this->customFailResponseWithPayload("Unauthorised");
    }


    //TIED TO v1/auth/logout ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function destroy()
    {
        // Log out the client
        Auth::logout();

        // Notify the client that the logout was successful
        return $this->customSuccessResponseWithMessage("Successfully logged out");
    }


    //TIED TO v1/auth/refresh ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function refresh()
    {
        // Create a new token for the logged in user, and return it to the client
        return $this->customSuccessResponseWithPayload([
            "token" => Auth::refresh(),
            "user" => Auth::user(),
            "token_type" => "bearer",
        ]);
    }
}
