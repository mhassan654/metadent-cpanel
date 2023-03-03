<?php
/*
 *
 * @Author: Wavamuno Brandon Elijah
 * @Email: brandonelijah099@gmail.com
 * @Github: Elijahwb
 * @Tel: +256 753 659 098 / +256 770 944 854
 *
 */

namespace App\Http\Controllers\Api\v1;

use App\Helpers\Helper;
use Cache;
use Carbon\Carbon;
use App\Models\User;
use http\Env\Request;
use App\Models\Translation;
use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        // All the functions should first consume the listed middlewares before proceeding, apart from login function
//        $this->middleware("auth:api", ["except" => ["login"]]);
    }

    public function login()
    {

        try {
            Helper::custom_validator(request()->all(), ['email' => 'required|email', 'password' => 'required|string']);

            $credentials = request(['email', 'password']);
            //generating token for both user
            $user_token = auth('api')->attempt($credentials);

            if ($user_token) {
                $user_response = [
                    'token' => $user_token,
                    'token_type' => 'bearer',
                    'user' => auth()->user(),
                    "roles" => Auth::user()->roles->pluck('name'),
                    "permissions" => auth()->user()->permissions,
                    'translations' => '',
                    // 'translations' => $this->get_all_translations(),
                    'expires_in' => auth()->factory()->getTTL() * 60,
                ];

                Session::put('lastLoginActivity', Carbon::now());

            LogActivity::addToLog('User Logged into the system','LoginSuccess');

                return $this->customSuccessResponseWithPayload($user_response);
            }

            LogActivity::addToLog('User with email' . ' ' . request()->email . ' ' . 'failed to login', 'LoginFail');

            throw new Exception('Unauthorized');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function me()
    {
        if (Auth::check()) {
            $response = [
                "roles" => Auth::user()->roles,
                "permissions" => auth()->user()->permissions,
                "user" => Auth::user(),
            ];
            return $this->customSuccessResponseWithPayload($response);
        }

        return $this->customFailResponseWithPayload("Unauthorized");
    }

    //TIED TO v1/auth/logout ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function destroy()
    {
        LogActivity::addToLog('User Logged Out of the system', 'Logout');

        // Log out the client
        Auth::logout();
        // Notify the client that the logout was successful
        return $this->customSuccessResponseWithPayload("Successfully logged out");
    }

    //TIED TO v1/auth/refresh ROUTE IN THE api.php FILE IN THE ROUTES FOLDERdf
    public function refresh()
    {
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
}
