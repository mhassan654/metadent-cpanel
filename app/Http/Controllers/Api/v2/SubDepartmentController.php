<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\SubDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check()) {
            return $this->customSuccessResponseWithPayload(
                SubDepartment::with('parent_department')->where('parent_id', '!=', 0)->orderBy("id", "desc")->get()
            );

        }
        return $this->customFailResponseMessage('You need to login first.');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "department" => "required|unique:departments",
            "parentId" => "required|integer",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $newDepartment = new SubDepartment();
        $newDepartment->department = request()->department;
        $newDepartment->parent_id = request()->parentId;
        $newDepartment->facility_id = Auth::user()->facility_id;
        $newDepartment->save();

        if ($newDepartment) {
            return $newDepartment;
        }

        return $this->customFailResponseWithPayload("Department was not created");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubDepartment  $subDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'department' => 'required|string',
            'parentId' => 'required|integer',
            'departmentId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        try {
                $department = SubDepartment::find(request()->departmentId);
                if ($department) {
                    $department->department = request()->department;
                    $department->parent_id = request()->parentId;
                    $department->update();

                    if ($department):
                        return $this->customSuccessResponseWithPayload($department);
                    endif;
                }else {
                    return $this->customFailResponseWithPayload('Sub department not found');
                }

        } catch (\Throwable$th) {
            return $this->customFailResponseWithPayload($th->getMessage(),404);
        }
    }

  // function for deleting an adhesive type
  public function destroy()
  {
     $validator = Validator::make(request()->all(), [
         'departmentId' => 'required|integer',
     ]);

     if ($validator->fails()) {
         return $this->customFailResponseMessage($validator->messages(), 200);
     }

      $department = SubDepartment::find(request()->departmentId);

      if($department)
      {
          $department->Delete();

          return $this->customSuccessResponseWithPayload('Sub Department  has been archived');
      }

      return $this->customFailResponseWithPayload("Sub Department  not found");
  }
  /**
   * restore all post
   *
   * @return \Illuminate\Http\JsonResponse()
   */
  public function restoreAll()
  {
      $restored= SubDepartment::onlyTrashed()->restore();

      return $this->customSuccessResponseWithPayload($restored);
  }
}
