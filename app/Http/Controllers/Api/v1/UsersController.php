<?php
/*
 *
 * @Author: Wavamuno Brandon Elijah
 * @Email: brandonelijah099@gmail.com
 * @Github: Elijahwb
 * @Tel: +256753659098 / +256770944854
 *
 */

namespace App\Http\Controllers\Api\v1;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\Treatment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function __construct()
    {
//        $this->middleware(['role:Super-Admin']);
//        $this->middleware(['auth:api']);
    }

    //TIED TO v1/users/all ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function index()
    {
        $users = Cache::remember('users', 1*60, function(){
            return User::where('facility_id', Auth::user()->facility_id)->with('roles')->orderBy("created_at", "desc")->get();
        });
        return $this->customSuccessResponseWithPayload($users);
    }


    public function show()
    {

        $validator = Validator::make(request() -> all(),[
            "userId" => "required",
        ]);

        if ($validator -> fails()){
            $errors = $validator -> errors();
            return response() -> json($errors -> all(),500);
        }

        $getUserInfo = User::with(['roles','permissions'])->find(request()->userId);

        return $this->customSuccessResponseWithPayload($getUserInfo);
    }
    //TIED TO v1/users/create ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function store(Request $request)
    {
        // Check if all the mandatory fields have been provided
        request()->validate([
            "firstName" => "required",
            "lastName" => "required",
            "gender" => "required",
            "address" => "required",
            "phonenumber" => "required",
            "accountstatusId" => "required",
            "password" => "required",
            "email" => "required",
            "roles" => "required",
        ]);
        $user = $request->user();
        // Create new user and store in a variable for more computations
        $newUser = User::create([
            "first_name" => request()->firstName,
            "last_name" => request()->lastName,
            "birth_date" => null,
            "gender" => request()->gender,
            "address" => request()->address,
            "phonenumber" => request()->phonenumber,
            "account_status_id" => request()->accountstatusId,
            "facility_id" =>  $user->facility_id,
            "availability"=> request()->availability,
            "specializations" => null,
            "password" => Hash::make(request()->password),
            "email" => request()->email
        ]);
        $newUser->assignRole([$request->input('roles')]);


        // Check if the new user creation is successful, then proceed
        if($newUser)
        {
            LogActivity::addToLog('New user with id:' . $newUser->id . 'was created' );
            // Notify the client that the desired action was successful
            return $this->customSuccessResponseWithMessage("User created successfully");
        }

        // If the new user creation has failed then notify the client that the desired action failed
        return $this->customFailResponseWithPayload("User not created");
    }

    //TIED TO v1/users/edit ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function update(Request $request)
    {
        // Check if all the mandatory fields have been provided
        request()->validate([
            "userId" => "required"
        ]);

        // Look for the specified user in the database and store in a variable for more computations
        $user = User::find(request()->userId);

        // Check if the specified user record exists in the database
        if($user)
        {

            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->first_name = $request->firstName;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->phonenumber = $request->phonenumber;
            $user->account_status_id = $request->accountstatusId;
            $user->email = $request->email;
            $user->save();
            DB::table('model_has_roles')->where('model_id',$request->userId)->delete();

            $user->assignRole($request->input('roles'));

            // Check if the user update is successful
            if($user)
            {
                // Notify the client that the desired action was successful
                return $this->customSuccessResponseWithPayload("User updated successfully");
            }

            // if the user update has failed then notify the client
            return $this->customSuccessResponseWithMessage("User update failed");
        }

        // If the user record does not exist then notify the client
        return $this->customFailResponseWithPayload("User not Updated");
    }

    public function getDoctors()
    {
        $doctors = User::where('facility_id', Auth::user()->facility_id)->role('Doctor')->get();

        return $this->customSuccessResponseWithPayload($doctors);
    }

    public function doctorDetails()
    {
        $validator = Validator::make(request() -> all(),[
            "doctorId" => "required",
        ]);

        if ($validator -> fails()){
            $errors = $validator -> errors();
            return response() -> json($errors -> all(),500);
        }

        $doctor = User::where('facility_id', Auth::user()->facility_id)->role('Doctor')->find(\request()->doctorId);

        return $this->customSuccessResponseWithPayload($doctor);
    }

    //TIED TO v1/users/delete ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function destroy()
    {
        // Check if all the mandatory fields have been provided
        request()->validate(["userId" => "required"]);

        // Look for the specified user in the database and store in a variable for more computations
        $user = User::find(request()->userId);

        // Check if the specified user record exists in the database
        if($user)
        {
            // Delete the user record from the database
            $user->delete();

            LogActivity::addToLog('User with id:' . $user->id . 'was deleted' );
            // Notify the client that the desired action was successful
            return $this->customSuccessResponseWithPayload("User deleted successfully");
        }

        // If the user does not exist in the database then notify the client
        return $this->customFailResponseWithPayload("User does not exist in the system");
    }
}
