<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentsController extends Controller
{
    // constructor function
    public function __construct()
    {
//        $this->middleware("auth:api");
    }


    /**
     * Display a listing of all departments.
     *  //TIED TO v1/departments/all ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "name" => "required",
            "facility_id" => "required",
        ]);

        $newDepartment = Department::create([
            "name" => request()->name,
            "facility_id" => Auth::user()->facility_id,
        ]);

        if ($newDepartment) {
            return $this->deapartment($newDepartment);
        }

        return $this->failure("Department was not created");
    }

    /**
     * Display the specified department.
     *
     * @param  int  $department
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return $this->customSuccessResponseWithPayload(Department::find(request()->department));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate(["departmentId" => "required"]);

        $department = Department::find($request->id);

        if ($department) {
            $department->update([
                "name" => $request->department,
            ]);

            return $this->department(Department::find($request->departmentId));
        }

        return $this->customFailResponseWithPayload("department not found");
    }

    /**
     * Remove the specified department from storage.
     *
     * @param  int  $departmentId
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        request()->validate(["departmentId" => "required"]);

        $department = Department::find(request()->departmentId);

        if ($department)
        {
            $department->delete();
            return $this->customSuccessResponseWithMessage("department deleted successfully");

        }else{
            return $this->customSuccessResponseWithPayload("Sorry Request failed");
        }
    }


    private function department($department)
    {
        return $this->customSuccessResponseWithPayload($department);
    }

    private function alldepartments()
    {
        return $this->customSuccessResponseWithPayload(
            Department::orderBy("created_at", "desc")->get()
        );
    }
}
