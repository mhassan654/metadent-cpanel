<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\EmployeeCode;

class SessionController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    public function sessionCheck()
    {
        try {
            $user = EmployeeCode::where('employee_id',auth()->user()->id)->first();
            $warning_time = auth()->factory()->getTTL() - Carbon::parse($user->last_login_time)->diffInMinutes(Carbon::now());
            return $this->customSuccessResponseWithPayload($warning_time);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayLoad($th->getMessage());
        }
   }
}
