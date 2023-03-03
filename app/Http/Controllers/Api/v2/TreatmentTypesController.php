<?php
/**
 **Created by MUWONGE HASSAN on 21/05/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use App\Models\TreatmentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TreatmentTypesController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    // function for fetching/retrieving all adhesive types
    public function index()
    {
        return $this->all_types();
    }

    // function for creating a new adhesive type
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'procedures' => 'nullable|array',
            'color' => 'nullable|string',
            'code' => 'nullable|string',
            'duration' => 'nullable'
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        try {
            $new_type = TreatmentType::create([
                "facility_id" => 1,
                "title" => $request->title,
                "procedures" => $request->procedures,
                "color" => $request->color,
                "code" => $request->code,
//                "duration" => $request->duration,
            ]);

            if ($new_type):
                return $this->customSuccessResponseWithPayload($new_type);
            endif;

        }catch (\Throwable $th)
        {
            $this->customSuccessResponseWithPayload($th->getMessage());
        }
    }

    //function for retrieving a single adhesive type by it's id
    public function show()
    {
        $validator = Validator::make(request()->all(), [
            "typeId" => "required"
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        $type = TreatmentType::find(request()->typeId);

        if($type)
        {
            return $this->customSuccessResponseWithPayload($type);
        }

        return $this->customFailResponseWithPayload("Type not found");

    }

    public function all_types()
    {
        try {
            //code...
            $all_types = TreatmentType::with('appointments')
                ->where('facility_id', $this->authUser()->facility_id)->get();
            // dd($all_types);
            $final_treatment_types_container = [];

            foreach($all_types as $type){
                $treatments = $type->procedures;
                // dd($treatments);
                $treatments_list = [];

                foreach($treatments as $type_id){
                    if(gettype($type_id) !='array') continue;
                    if(array_key_exists('id', $type_id)) $treatments_list[] = Treatment::find($type_id['id']);
                    else $treatments_list[] = Treatment::find($type_id[0]['id']);
                    // dd($treatments_list);

                    foreach ($treatments_list as $treatment){
                        $span = [
                            'span' => $type_id['waiting_time'] ?? '',
                            'spanUnit' => $type_id['time_unit'] ?? '',
                            'duration' => $type_id['duration'] ?? '',
                            'duration_unit' => $type_id['duration_unit'] ?? '',
                        ];
                        $treatment->waiting_time = $span['span'];
                        $treatment->time_unit = $span['spanUnit'];
                        $treatment->duration = $span['duration'];
                        $treatment->duration_unit = $span['duration_unit'];
                    }
                }

                $type->procedures = $treatments_list;
                // dump($type->procedures);
                $final_treatment_types_container[] = $type;
            }
            // dd($final_treatment_types_container);
            // var_dump($treatments_list);

            return $this->customSuccessResponseWithPayload($final_treatment_types_container);
        } catch (\Throwable $th) {
            Log::info($th->getMessage());
            return $th->getMessage();
            //throw $th;
        }

    }

    //function for updating an adhesive type
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'stageId' => 'required',
            'procedures' => 'nullable|array',
            'color' => 'nullable|string',
            'code' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }
        $type = TreatmentType::find(request()->stageId);

        try {
            if($type)
            {
                $type->update([
                    "title" => $request->title,
                    "procedures" => $request->treatments,
                    "code" => $request->code,
                    "color" => $request->color,
                ]);

                return $this->customSuccessResponseWithPayload($type);
            }

            return $this->customFailResponseWithPayload("Type not found");

        }catch(\Throwable $th)
        {
            $this->customSuccessResponseWithPayload($th->getMessage());
        }

    }

    // function for deleting an adhesive type
    public function destroy()
    {
        request()->validate(["typeId" => "required"]);

        $type = TreatmentType::find(request()->typeId);

        if($type)
        {
            $type->forceDelete();

            return $this->customSuccessResponseWithPayload('Type  has been deleted');
        }

        return $this->customFailResponseWithPayload("Type  not found");
    }
    /**
     * restore all post
     *
     * @return \Illuminate\Http\JsonResponse()
     */
    public function restoreAll()
    {
        $restored= TreatmentType::onlyTrashed()->restore();

        return $this->customSuccessResponseWithPayload($restored);
    }
}
