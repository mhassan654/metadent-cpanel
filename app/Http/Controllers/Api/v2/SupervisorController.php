<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Supervisor;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreSupervisorRequest;
use App\Http\Requests\UpdateSupervisorRequest;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(Supervisor::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupervisorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "name" => "required|string",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $supervisor = new Supervisor();
        $supervisor->name = request()->name;
        // $supervisor->facility_id = Auth::user()->facility_id;
        $supervisor->save();

        if ($supervisor) {
            return $supervisor;
        }

        return $this->customFailResponseWithPayload("Supervisor was not created");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupervisorRequest  $request
     * @param  \App\Models\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "supervisorId" => "required",
            "name" => "required",
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        try {
                $supervisor = Supervisor::find(request()->supervisorId);
                if ($supervisor) {
                    $supervisor->name = request()->name;
                    $supervisor->update();

                    if ($supervisor):
                        return $this->customSuccessResponseWithPayload($supervisor);
                    endif;
                } else {
                    return $this->customFailResponseWithPayload('Supervisor not found');
                }

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage(), 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'supervisorId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

         $supervisor = Supervisor::find(request()->supervisorId);

         if($supervisor)
         {
             $supervisor->Delete();

             return $this->customSuccessResponseWithPayload(' supervisor  has been archived');
         }

         return $this->customFailResponseWithPayload(" supervisor  not found");
    }
}
