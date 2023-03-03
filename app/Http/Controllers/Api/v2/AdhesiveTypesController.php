<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\AdhesiveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdhesiveTypesController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    // function for fetching/retrieving all adhesive types
    public function index()
    {
        return $this->customSuccessResponseWithPayload(AdhesiveType::all());
    }

    // function for creating a new adhesive type
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "adhesiveType" => "required|string|unique:adhesive_types,adhesive_type",
            "code" => "required|regex:/^[a-zA-Z0-9\s]+$/",
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
            $new_type = AdhesiveType::create([
                "facility_id" => 1,
                "adhesive_type" => $request->adhesiveType,
                "code" => $request->code,
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

            $type = AdhesiveType::find(request()->typeId);

            if($type)
            {
                return $this->customSuccessResponseWithPayload($type);
            }

            return $this->customFailResponseWithPayload("Type not found");

    }

    //function for updating an adhesive type
    public function update(Request $request)
    {
        $type = AdhesiveType::find(request()->typeId);

        try {
            if($type)
            {
                $type->update([
                    "facility_id" => 1,
                    "adhesive_type" => $request->adhesiveType,
                    "code" => $request->code,
                ]);

                return $this->customSuccessResponseWithPayload($type);
            }

            return $this->customFailResponseWithPayload("Type not found");

        }catch(\Throwable $th)
        {
           return $this->customSuccessResponseWithPayload($th->getMessage());
        }

    }

    // function for deleting an adhesive type
    public function destroy()
    {
        request()->validate(["typeId" => "required"]);

        $type = AdhesiveType::find(request()->typeId);

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
     * @return response()
     */
    public function restoreAll()
    {
       $restored= AdhesiveType::onlyTrashed()->restore();

        return $this->customSuccessResponseWithPayload($restored);
    }

}
