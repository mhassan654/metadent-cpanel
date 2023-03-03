<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;
use App\Models\TreatmentCategory;
use App\Models\TreatmentProcedure;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreTreatmentProcedureRequest;

class TreatmentsController extends Controller
{
      public function index(Request $request)
    {
        try {
                $treatments = Cache::remember('treatments', 10*60, function() {
                    return $this->allTreatments();
                });
                return $treatments;

        }catch(\Throwable $th){
            return $this->customFailResponseWithPayload($th->getMessage());
        }

    }

    public function show(Request $request)
    {

        if ($this->authUser()->can('View Treatment'))
        {
            $validator = Validator::make($request -> all(),[
                "treatmentId" => "required"
            ]);

            if ($validator -> fails()){
                $errors = $validator -> errors();
                return response() -> json($errors -> all(),500);
            }

            $treatment = Treatment::find(request()->treatmentId);

            if($treatment)
            {
                return $this->customSuccessResponseWithPayload($treatment);
            }

            return $this->customFailResponseWithPayload("Treatment not found");

        }
        return $this->customFailResponseWithPayload('Not Authorized');

    }

    public function store(Request $request)
    {
        if ($this->authUser()->can('Create Treatment'))
        {
            $validator = Validator::make($request -> all(),[
                "treatment" => "required|unique:treatments",
                "treatment_category_id" => "required",
                "price" => "required|integer",
                "code" => "required",
            ]);

            if ($validator -> fails()){
                $errors = $validator -> errors();
                return response() -> json($errors -> all(),500);
            }

            // create treatment
            $newTreatment = Treatment::create([
                "treatment" => request()->treatment,
                "treatment_category" => request()->treatment_category_id,
                "subcategory" => request()->subcategory,
                "code" => request()->code,
                "price" => request()->price,
                "facility_id" => 1,
                "procedures"=> json_encode($request->procedures)
            ]);

            if($newTreatment)
            {
                return $this->allTreatments();
            }

            return $this->customFailResponseWithPayload("Could not create resource");

        }
        return $this->customFailResponseWithPayload('Not Authorized');

    }

    public function update(Request $request)
    {

        if ($this->authUser()->can('Update Treatment'))
        {
            $validator = Validator::make($request -> all(),[
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
                    "procedures"=> json_encode($request->procedures)
                ]);

                return $this->allTreatments();
            }

            return $this->customFailResponseWithPayload("Treatment failed to be updated");
        }
        return $this->customFailResponseWithPayload('Not Authorized');

    }

    public function destroy(Request $request)
    {

        if ($this->authUser()->can('Delete Treatment'))
        {
            $validator = Validator::make($request -> all(),[
                "treatmentId" => "required",
            ]);

            if ($validator -> fails()){
                $errors = $validator -> errors();
                return response() -> json($errors -> all(),500);
            }
        }
        return $this->customFailResponseWithPayload('Not Authorized');

    }

    public function deleteSelected($id)
    {

        if ($this->authUser()->can('Delete Treatments'))
        {
            $single_treatment_id = explode(',' , $id);

            foreach($single_treatment_id as $Id) {
                Treatment::findOrFail($Id)->delete();
            }
            return $this->customSuccessResponseWithPayload("Deleted successfully");
        }
        return $this->customFailResponseWithPayload('Not Authorized');
    }

    private function allTreatments()
    {
        return $this->customSuccessResponseWithPayload(
            Treatment::with(['treatmentCategory','subCategory'])
            ->orderBy("created_at", "desc")->get());
    }


    public function doctorTreatments()
    {
        return $this->customSuccessResponseWithPayload(Treatment::with(['doctors'])->orderBy("created_at", "desc")->get());

    }

    public function paginateTreatments()
    {
        return $this->customSuccessResponseWithPayload(Treatment::with(['treatmentCategory','subCategory'])
       ->orderBy("created_at", "desc")->paginate(20));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TreatmentProcedure  $treatmentProcedure
     * @return \Illuminate\Http\JsonResponse
     */
    public function treatmentWithProcedures(StoreTreatmentProcedureRequest $request)
    {
        $validator = Validator::make(request() -> all(),[
            "treatmentId" => "required"
        ]);

        if ($validator -> fails()){
            $errors = $validator -> errors();
            return response() -> json($errors -> all(),500);
        }

        $query = TreatmentProcedure::where('treatment_id', request()->id)->get();

        return $this->customSuccessResponseWithPayload($query);
    }

    public function categoryTreatments(){
        $cats =  TreatmentCategory::has('childrenCategories')->get();

        // $treatments = [];
        // foreach($cats as $item){
        //     $treatments[] = Treatment::where('subcategory',$item->id )->first();
        // }

        // print_r($treatments);
        // $cats->treatments = $treatments;

        return $cats;
    }
}
