<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Models\CompositeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompositeTypesController extends BaseController
{
    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    // function for fetching/retrieving all adhesive types
    public function index()
    {
        return $this->customSuccessResponseWithPayload(CompositeType::where('facility_id', Auth::user()->facility_id)->get());
    }

    // function for creating a new adhesive type
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "materialType" => "required|string|unique:composite_types,material_type",
            "code" => "required|regex:/^[a-zA-Z0-9\s]+$/",
            "materialName"=>"required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(
                [
                    "status"=> "FAIL",
                    "payload" => ["message"=>$errors->all()]
                ],200
            );
        }
        try {
            $new_type = CompositeType::create([
                "facility_id" => Auth::user()->facility_id,
                "material_type" => $request->materialType,
                "code" => $request->code,
                "material_name" => $request->materialName,
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
        $validator = Validator::make(request() -> all(),[
            "typeId" => "required"
        ]);

        if ($validator -> fails()){
            $errors = $validator -> errors();
            return response() -> json($errors -> all(),500);
        }

        $type = CompositeType::find(request()->typeId);

        if($type)
        {
            return $this->customSuccessResponseWithPayload($type);
        }

        return $this->customFailResponseWithPayload("Type not found");

    }

    //function for updating an adhesive type
    public function update(Request $request)
    {
        $type = CompositeType::find(request()->typeId);

        $validator = Validator::make(request()->all(), [
            "materialType" => "required|string",
            "code" => "required|regex:/^[a-zA-Z0-9\s]+$/",
            "materialName"=>"required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(
                [
                    "status"=> "FAIL",
                    "payload" => ["message"=>$errors->all()]
                ],200
            );
        }
        try {
            if($type)
            {
                $type->update([
                    "facility_id" => Auth::user()->facility_id,
                    "material_type" => $request->materialType,
                    "code" => $request->code,
                    "material_name" => $request->materialName
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

        $type = CompositeType::find(request()->typeId);

        try {
            if($type)
            {
                $type->forceDelete();

                return $this->customSuccessResponseWithPayload('Type  has been deleted');
            }

            return $this->customFailResponseWithPayload("Type  not found");

        }catch(\Throwable $th)
        {
            return $this->customFailResponseWithPayload($th->getMessage(),200);
        }


    }
    /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        $restored= CompositeType::onlyTrashed()->restore();

        return $this->customSuccessResponseWithPayload($restored);
    }
}
