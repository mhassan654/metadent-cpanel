<?php
// Created by Mulindwa Denis

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\ApiBaseController;
use App\Models\Treatment;
use App\Models\BundledTreatment;
use App\Models\DoneTreatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BundledTreatmentsController extends BaseController {

    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    public function index()
    {
        try {
            $response = [];
            $sub_treatments = [];
            foreach(BundledTreatment::orderBy('created_at','desc')->get() as $bundle){
                foreach($bundle->sub_treatments as $sub_treatment){
                   $sub_treatments[] = Treatment::find($sub_treatment);
                }
                $bundle->sub_treatments = $sub_treatments;
                $response[] = $bundle;
                unset($sub_treatments);
            }
            return $this->customSuccessResponseWithPayload($response);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'treatment' => 'required|string|unique:bundled_treatments,treatment_name',
            'code' => 'required|string|unique:bundled_treatments,code',
            'sub_treatments' => 'array',
        ]);

        if($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        } else {
            $treatment = BundledTreatment::create([
                'treatment_name' => $request->treatment,
                'code' => $request->code,
                'color' => $request->color,
                'sub_treatments' => $request->sub_treatments,
                'description' => $request->description,
            ]);
            if($treatment){
                return $this->customSuccessResponseWithPayload($treatment);
            }else {
                return $this->customFailResponseWithPayload('Treatment Not Created');
            }
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'treatmentId' => 'required',
            'treatment' => 'required',
            'code' => 'required',
            'sub_treatments' => 'array',
        ]);

        if($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        } else {
            $treatment = BundledTreatment::find($request->treatmentId);
            if($treatment){
            $treatment->update([
                'treatment_name' => $request->treatment,
                'code' => $request->code,
                'color' => $request->color,
                'sub_treatments' => $request->sub_treatments,
                'description' => $request->description,
            ]);
            return $this->customSuccessResponseWithPayload('Treatment Updated Successfully');
         } else {
            return $this->customFailResponseWithPayload('Treatment not Updated');
         }
      }
    }

    public function paginated()
    {
        try {
            $response = [];
            $sub_treatments = [];
            foreach(BundledTreatment::orderBy('created_at','desc')->paginate(5) as $bundle){
                foreach($bundle->sub_treatments as $sub_treatment){
                   $sub_treatments[] = Treatment::find($sub_treatment);
                }
                $bundle->sub_treatments = $sub_treatments;
                $response[] = $bundle;
                unset($sub_treatments);
            }
            return $this->customSuccessResponseWithPayload($response);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function search(Request $request)
    {
        try {
            $result = [];
            $sub_treatments = [];
            foreach(BundledTreatment::where('code', 'LIKE', '%'.$request->key_word.'%')->get() as $bundle){
                foreach($bundle->sub_treatments as $sub_treatment){
                    $sub_treatments[] = Treatment::find($sub_treatment);
                }
                $bundle->sub_treatments = $sub_treatments;
                $result[] = $bundle;
                unset($sub_treatments);
            }
            return $this->customSuccessResponseWithPayload($result);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function destroy(Request $request)
    {

        $validator = Validator::make($request->all(),[
            "treatmentId" => "required"
        ]);


        if($validator->fails()){
            return $this->customFailResponseWithPayload($validator->errors()->all());
        }

        try {
            $check = DoneTreatment::where('treatment_complete',$request->treatmentId)->first();
            $treatment = BundledTreatment::find($request->treatmentId);

            if((!$check && is_null($treatment->sub_treatments)) || (!$check && $treatment->sub_treatments)) {
                $treatment->forceDelete();
                return $this->customFailResponseWithPayload('Treatment Deleted Successfully');
            }else if($check && $treatment->sub_treatments){
                foreach($treatment->sub_treatments as $treatment_check){
                    $sub_treatment_check = DoneTreatment::where('treatment_complete',$treatment_check);
                    if($sub_treatment_check || !$sub_treatment_check) {
                        $treatment->delete();
                        return $this->customFailResponseWithPayload('Treatment in use. It is just Archived');
                    }
                }
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function archive(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'treatmentId' => 'required'
        ]);
        if($validator->fails()){
            return $this->customFailResponseWithPayload($validator->errors()->all());
        }
        try {
            $treatment = BundledTreatment::find($request->treatmentId);
            if($treatment):
                $treatment->delete();
                return $this->customSuccessResponseWithPayload('Treatment Archived');
            else:
                return $this->customFailResponseWithPayload('Treatment not found');
            endif;
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function archiveAll()
    {
        try {
            foreach(BundledTreatment::all() as $treatment){
                $treatment->delete();
            }
            return $this->customSuccessResponseWithPayload('All treatments archived');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function archiveSelected(Request $request)
    {
        try {
            foreach($request->selected as $treatment){
                BundledTreatment::find($treatment)->delete();
            }
            return $this->customSuccessResponseWithPayload('Selected treatments archived');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function restoreAll()
    {
        $restored = BundledTreatment::onlyTrashed()->restore();
        $response = '';
        if($restored > 1) {
            $response = $restored.' '.'treatments have been restored';
        }
        if($restored == 1 ) {
            $response = $restored.' '.'treatment has been restored';
        }
        if($restored < 1) {
            $response = 'No treatment has been archived';
        }
        return $this->customSuccessResponseWithPayload($response);
    }

    public function deleteAll()
    {
        try {
            foreach(BundledTreatment::all(['id']) as $treatment){
                $check = DoneTreatment::where('treatment_complete',$treatment->id)->first();
                if($check):
                   $treatment->delete();
                else :
                    $treatment->forceDelete();
                endif;
            }
            return $this->customSuccessResponseWithPayload('All treatments deleted');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function deleteSelected(Request $request)
    {
        try {
            foreach($request->selected as $treatment){
                $check = DoneTreatment::where('treatment_complete',$treatment)->first();
                if(!$check):
                   BundledTreatment::find($treatment)->forceDelete();
                else :
                    BundledTreatment::find($treatment)->delete();
                endif;
            }
            return $this->customSuccessResponseWithPayload('Selected treatments deleted');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

}
