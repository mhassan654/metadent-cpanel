<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends ApiBaseController
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
            $users = User::with('department')->orderBy('created_at', 'desc')->get();
            return $this->customSuccessResponseWithPayload($users);
    }

    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
                "userId" => "required",
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        $getUserInfo = User::with(['roles','permissions'])->find(request()->userId);

        return $this->customSuccessResponseWithPayload($getUserInfo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

            $validator = Validator::make($request->all(), [
                "firstName" => "required",
                "lastName" => "required",
                "gender" => "required",
                "address" => "required",
                "phonenumber" => "required",
                "accountstatusId" => "required",
                "departmentId" => "required|integer",
                "password" => "required",
                'email' => 'required|email|unique:users,email',
                "roles" => "nullable",
                "subDepartment" => "nullable|integer",
            ]);

            if ($validator->fails()) {
                // return $this->customFailResponseMessage($validator->messages(), 200);
                return $this->customFailResponseWithPayload($validator->errors()->all());
            }

            // get logged in user data
            $user = $request->user();
            try {
                $newUser = new User();
                $newUser->first_name = request()->firstName;
                $newUser->last_name = request()->lastName;
                $newUser->gender = request()->gender;
                $newUser->address = request()->address;
                $newUser->department_id = request()->departmentId;
                $newUser->sub_department_id = request()->subDepartment;
                $newUser->phonenumber = request()->phonenumber;
                $newUser->account_status_id = request()->accountstatusId;
                $newUser->specializations = null;
                $newUser->birth_date = null;
                $newUser->facility_id = $user->facility_id;
                $newUser->email = request()->email;
                $newUser->week_days = [];
                $newUser->weeks = [];
                $newUser->availability = [];
                $newUser->password = Hash::make(request()->password);
                $newUser->save();
                $newUser->assignRole([$request->input('roles')]);

                // Check if the new user creation is successful, then proceed
                if (!$newUser) {
                    // Notify the client that the desired action was successful
                    return $this->customFailResponseWithPayload("User creation failed");
                }
                // Notify the client that the desired action was successful
                return $this->customSuccessResponseWithPayload('User created successfully');

            } catch (\Exception $exception) {
                return $this->customFailResponseWithPayload($exception->getMessage());
            }

    }

    public function update(Request $request)
    {
            try {

                $validator = Validator::make($request->all(), [
                    "userId" => "required",
                    "firstName" => "required",
                    "lastName" => "required",
                    "gender" => "required",
                    "address" => "required",
                    "phonenumber" => "required",
                    "accountstatusId" => "required",
                    "email" => "required",
                    "subDepartment" => "nullable|integer",
                ]);

                if ($validator->fails()) {
                    return $this->customFailResponseWithPayload($validator->errors()->all());
                }

                $user = User::find(request()->userId);
                if ($user) {
                    $user->first_name = $request->firstName;
                    $user->last_name = $request->lastName;
                    $user->first_name = $request->firstName;
                    $user->gender = $request->gender;
                    $user->address = $request->address;
                    $user->phonenumber = $request->phonenumber;
                    $user->department_id = $request->departmentId;
                    $user->sub_department_id = request()->subDepartment;
                    $user->account_status_id = $request->accountstatusId;
                    $user->email = $request->email;
                    $user->update();

                    // Check if the user update is successful
                    if ($user) {
                        // Notify the client that the desired action was successful
                        return $this->customSuccessResponseWithPayload("User updated successfully");
                    }

                    // if the user update has failed then notify the client
                    return $this->customSuccessResponseWithPayload("User update failed");
                }

            } catch (\Exception $exception) {
                return $this->customFailResponseWithPayload($exception->getMessage());

            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {

            $validator = Validator::make($request->all(), [
                "userId" => "required",
            ]);

            if ($validator->fails()) {
                // return $this->customFailResponseMessage($validator->messages(), 200);
                return $this->customFailResponseWithPayload($validator->errors()->all());
            }

            // Look for the specified user in the database and store in a variable for more computations
            $user = User::find(request()->userId);
            try {
                // Check if the specified user record exists in the database
                if ($request->user()->can('user-delete')) {
                    DB::transaction(function () use ($user) {
                        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
                        DB::table('model_has_permissions')->where('model_id', $user->id)->delete();
                        // DB::table('users')->where('id', $user->id)->delete();
                    });
                    User::find($user->id)->delete();
                    // Notify the client that the desired action was successful
                    return $this->customSuccessResponseWithPayload("User deleted successfully");
                }

                // If the user does not exist in the database then notify the client
                return $this->customFailResponseWithPayload("User does not exist in the system");
            } catch (\Exception $exception) {
                return $this->customFailResponseWithPayload($exception->getMessage());
            }

    }

    public function getDoctors()
    {
        $doctors = User::with(['department'=> function($query){
            $query->select(['id','department']);
        }])->role('Doctor')->get()->makeHidden('role_id','permissions');

        return $this->customSuccessResponseWithPayload($doctors);
    }

    public function doctorDetails()
    {


            $validator = Validator::make(request()->all(), [
                "doctorId" => "required",
            ]);

            if ($validator->fails()) {
                return $this->customFailResponseMessage($validator->messages(), 200);
            }

        $doctor = User::with('appointments')->role('Doctor')->find(\request()->doctorId);

        return $this->customSuccessResponseWithPayload($doctor);
    }

    public function search()
    {
        $searchusers = User::where('first_name','LIKE','%'.request()->key_word.'%')
                             ->orWhere('last_name','LIKE','%'.request()->key_word.'%')
                             ->orWhere('email','LIKE','%'.request()->key_word.'%')
                             ->orderBy('created_at','desc')
                             ->get();
        return $this->customSuccessResponseWithPayload($searchusers);
    }
}
