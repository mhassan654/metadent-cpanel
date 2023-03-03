<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTreatmentProcedureRequest;
use App\Models\Treatment;
use App\Models\TreatmentProcedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TreatmentsController extends Controller
{
    public function __construct()
    {
//        $this->middleware("auth:api");
    }

    public function index()
    {
        return $this->allTreatments();
    }

    public function show()
    {
        request()->validate([
            "treatmentId" => "required",
        ]);

        $treatment = Treatment::find(request()->treatmentId);

        if($treatment)
        {
            return $this->customSuccessResponseWithPayload($treatment);
        }

        return $this->customFailResponseWithPayload("Treatment not found");
    }

    public function store()
    {
        request()->validate([
            "treatment" => "required",
            "treatment_category_id" => "required",
            "price" => "required",
            "code" => "required",
        ]);

        $newTreatment = Treatment::create([
            "treatment" => request()->treatment,
            "treatment_category" => request()->treatment_category_id,
            "code" => request()->code,
            "price" => request()->price,
            "facility_id" => Auth::user()->facility_id,
        ]);

        if($newTreatment)
        {
            LogActivity::addToLog('Treatment with id:' . $newTreatment->id . 'was created' );
            return $this->allTreatments();
        }

        return $this->customFailResponseWithPayload("Treatment failed to be created");
    }

    public function update()
    {

        $validator = Validator::make(request() -> all(),[
            "treatmentId" => "required",
            "treatment" => "required",
            "treatment_category_id" => "required",
            "code" => "required",
        ]);

        if ($validator -> fails()){
            $errors = $validator -> errors();
            return response() -> json($errors -> all(),500);
        }

        $treatment = Treatment::find(request()->treatmentId);

        if($treatment)
        {
            $treatment->update([
                "treatment" => request()->treatment,
                "treatment_category" => request()->treatment_category_id,
                "code" => request()->code,
                "price" => request()->price,
            ]);

            LogActivity::addToLog('Treatment with id:' . $treatment->id . 'was updated' );
            return $this->allTreatments();
        }

        return $this->customFailResponseWithPayload("Treatment failed to be updated");
    }


    public function destroy()
    {
        request()->validate([
            "treatmentId" => "required",
        ]);

        $treatment = Treatment::find(request()->treatmentId);

        if($treatment)
        {
            $treatment->delete();

            LogActivity::addToLog('Treatment with id:' . $treatment->id . 'was deleted' );
            return $this->allTreatments();
        }

        return $this->customFailResponseWithPayload("Treatment not found");
    }

    public function deleteSelected($id)
    {
       $single_user_id = explode(',' , $id);

       foreach($single_user_id as $Id) {
           Treatment::findOrFail($Id)->delete();
       }

        LogActivity::addToLog('Bulk treatments delete was performed.');

       return $this->customSuccessResponseWithPayload("Deleted successfully");

    }

    private function allTreatments()
    {
        return $this->customSuccessResponseWithPayload(Treatment::with(['treatmentCategory'])->where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());
    }

    public function doctorTreatments()
    {
        return $this->customSuccessResponseWithPayload(Treatment::with(['doctors'])->where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());

    }

    public function paginateTreatments()
    {
        return $this->customSuccessResponseWithPayload(Treatment::with('treatmentCategory')->where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->paginate(17));
    }


}
