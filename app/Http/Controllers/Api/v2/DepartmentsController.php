<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class DepartmentsController extends BaseController
{
    public function __construct()
    {
//        $this->middleware(["auth:api"]);
    }

    /**
     * Display a listing of all departments.
     *  //TIED TO v1/departments/all ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Return all patients falling in the given facility id

        return $this->allDepartments();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "department" => "required|unique:departments",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        try {
            if (auth()->check()) {
                $newDepartment = new Department();
                $newDepartment->department = request()->department;
                $newDepartment->facility_id = Auth::user()->facility_id;
                $newDepartment->save();

                if ($newDepartment):
                    return $this->customSuccessResponseWithPayload($newDepartment);
                endif;
            } else {
                return $this->customSuccessResponseWithPayload('You need to log in first');
            }

        } catch (\Throwable$th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

    }

    /**
     * Display the specified department.
     *
     * @param  int  $department
     * @return \Illuminate\Http\JsonResponse
     */
    public function show()
    {

        request()->validate([
            "departmentId" => "required",
        ]);
        $department = Cache::remember('department', 2 * 60, function () {
            return Department::find(request()->departmentId);
        });
        return $this->customSuccessResponseWithPayload($department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            "departmentId" => "required",
            "department" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 500);
        }

        $department = Department::find($request->departmentId);
        try {
            if ($department) {
                if($department->department === 'Dentists' || $department->department === 'Front Office') {
                    return $this->customFailResponseWithPayload('Department Cannot be updated');
                }
                $department->department = $request->department;
                $department->save();

                return $this->department(Department::find($request->departmentId));
            }

            return $this->customFailResponseWithPayload("department not found");
        } catch (\Throwable$th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

        /**
     * Update the specified resource parent id in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function change_parent(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            "parentId" => "required",
            "departmentId" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 500);
        }

        $department = Department::find($request->departmentId);

        try {
            if ($department) {

                $department->parent_id = $request->parentId;
                $department->save();

                return $this->department(Department::find($request->departmentId));
            }

            return $this->customFailResponseWithPayload("department not found");
        } catch (\Throwable$th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Remove the specified department from storage.
     *
     * @param  int  $departmentId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy()
    {

        $validator = Validator::make(request()->all(), [
            "departmentId" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 500);
        }

        $department = Department::find(request()->departmentId);

        if ($department) {
            if($department->department === 'Front Office' || $department->department === 'Dentists') {
                return $this->customFailResponseWithPayload('Department Cannot be deleted');
            }
            $department->delete();
            return $this->customSuccessResponseWithMessage("department deleted successfully");

        }

        return $this->failure("Sorry Request failed");
    }

    private function department($department)
    {

        return $this->customSuccessResponseWithPayload($department);
    }

    private function alldepartments()
    {
        return $this->customSuccessResponseWithPayload(
            Department::with('sub_department')->where('facility_id', Auth::user()->facility_id)->where('parent_id', 0)->orderBy("id", "desc")->get()
        );
    }

    public function front_office_departments()
    {
        try {
            return $this->customSuccessResponseWithPayload(
                Department::where('facility_id', Auth::user()->facility_id)
                ->where('department','Front Office')
                ->orWhere('department','Dentists')
                ->orderBy("id", "desc")
                ->get()
            );
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
