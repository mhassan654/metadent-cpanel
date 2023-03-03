<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\Treatment;
use App\Models\Procedures;
use Illuminate\Support\Arr;
use App\Modules\Core\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\TreatmentProcedure;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreTreatmentProcedureRequest;
use App\Http\Requests\UpdateTreatmentProcedureRequest;

class TreatmentProcedureController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {

    //     $allProcedures = Treatment::with(['procedures' => function($query) {
    //         $query->select(['id', 'treatment_id',  'name', 'interval','set_period']);
    //     }])->get(['id','treatment']);

    //     return $this->customSuccessResponseWithPayload($allProcedures);
    // }

    public function index()
    {

        $allProcedures = Procedures::where('facility_id', Auth::user()->facility_id)->get();

        return $this->customSuccessResponseWithPayload($allProcedures);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTreatmentProcedureRequest $request
     * @return JsonResponse
     */
    public function store()
    {
        $validator = Validator::make(request() -> all(),[
            "name" => "required|unique:treatment_procedures",
            "interval"=> "required",
            "setPeriod"=> "required",
            "treatmentId" => "required",
        ]);

        if ($validator -> fails()){
            $errors = $validator -> errors();
            return response() -> json($errors -> all(),500);
        }

        $newProcedure = new TreatmentProcedure();

       $newProcedure->name = request()->name;
       $newProcedure->interval = request()->interval;
       $newProcedure->treatment_id = request()->treatmentId;
       $newProcedure->set_period = request()->setPeriod;
       $newProcedure->save();

        if($newProcedure)
        {


            LogActivity::addToLog('audit trail:','Treatment procedure with id:' . $newProcedure->id . 'was created' );
            return $this->customSuccessResponseWithPayload($newProcedure);
        }

        return $this->customFailResponseWithPayload("Treatment Procedure failed to be created");
    }

    /**
     * Display the specified resource.
     *
     * @param TreatmentProcedure $treatmentProcedure
     * @return \Illuminate\Http\Response
     */
    public function show(TreatmentProcedure $treatmentProcedure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTreatmentProcedureRequest $request
     * @param TreatmentProcedure $treatmentProcedure
     * @return JsonResponse
     */
    public function update(Request $request, TreatmentProcedure $treatmentProcedure): JsonResponse
    {

        try{
//            if ($request->user()->can('user-update')) {

            $validator = Validator::make($request -> all(),[
                "name" => "required|unique:treatment_procedures",
                "interval"=> "required",
                "setPeriod"=> "required",
                "treatmentId" => "required"
            ]);

            if ($validator -> fails()){
                $errors = $validator -> errors();
                return response() -> json($errors -> all(),500);
            }


            $updateProcedure = TreatmentProcedure::find(request()->procedureId);
            if($updateProcedure)
            {
                $updateProcedure->name = request()->name;
                $updateProcedure->interval = request()->interval;
                $updateProcedure->treatment_id = request()->treatmentId;
                $updateProcedure->set_period = request()->setPeriod;
                $updateProcedure->save();


                // Check if the user update is successful
                if($updateProcedure)
                {
                    // Notify the client that the desired action was successful
                    return $this->customSuccessResponseWithPayload("Procedure updated successfully");
                }

                // if the user update has failed then notify the client
                return $this->customSuccessResponseWithMessage("Procedure update failed");
            }

//                return $this->customFailResponseWithPayload("User not Found");
//            }
//            return $this->customFailResponseWithPayload("Permission denied");

        }catch(\Exception $exception)
        {
            return  $this->customFailResponseWithPayload($exception->getMessage());

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TreatmentProcedure $treatmentProcedure
     * @return JsonResponse
     */
    public function destroy(TreatmentProcedure $treatmentProcedure): JsonResponse
    {
        $validator = Validator::make(request() -> all(),[
            "procedureId" => "required"
        ]);

        if ($validator -> fails()){
            $errors = $validator -> errors();
            return response() -> json($errors -> all(),500);
        }

       $procedure =  TreatmentProcedure::destroy(request()->procedureId);

        return $this->customSuccessResponseWithPayload($procedure);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TreatmentProcedure $treatmentProcedure
     * @return JsonResponse
     */
    public function treatmentWithProcedures()
    {
        $validator = Validator::make(request() -> all(),[
            "treatmentId" => "required"
        ]);

        if ($validator -> fails()){
            $errors = $validator -> errors();
            return response() -> json($errors -> all(),500);
        }

        $query = TreatmentProcedure::where('treatment_id', request()->treatmentId)->latest()->get();

        return $this->customSuccessResponseWithPayload($query);
    }
}
