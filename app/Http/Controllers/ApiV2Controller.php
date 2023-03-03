<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiV2Controller extends Controller
{

    /**
     * Holds a private string
     * @var string
     */
    public $authenticatedUser = '';
    private $userRole = '';

    // check logged in user permissions and roles

    public function AuthenticateUser()
    {

        // get logged in user data
        $authenticatedUser = request()->user();
        return $this->$authenticatedUser;
    }
}
