<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Models\Procedures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProcedureController extends BaseController
{
    public function __construct()
    {
//        $this->middleware(["auth:api", 'role:Super-Admin']);
    }

    public function index()
    {
        return $this->customSuccessResponseWithPayload(Procedures::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());

    }

    public function show()
    {
//        request()->validate(["procedureId" => "required"]);

        if ($this->authUser()->hasRole('Charting')) {
            $validator = Validator::make(request()->all(), [
                "procedureId" => "required",
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                // return response()->json($errors->all(), 500);
                return $this->customFailResponseWithPayload($errors->all());
            }

            $procedure = Procedures::find(request()->procedureId);

            if ($procedure) {
                return $this->customSuccessResponseWithPayload($procedure);
            }

            return $this->customFailResponseWithPayload("Procedure does not exist");
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    public function store()
    {

        if ($this->authUser()->hasRole('Charting')) {
            $validator = Validator::make(request()->all(), [
                "procedure" => "required",
                "code" => "required",
                "price" => "required",
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                // return response()->json($errors->all(), 500);
                return $this->customFailResponseWithPayload($errors->all());
            }

            $newProcedure = Procedures::create([
                "procedure" => request()->procedure,
                "code" => request()->code,
                "price" => request()->price,
                "facility_id" => Auth::user()->facility_id,
            ]);

            if ($newProcedure) {
                return $this->customSuccessResponseWithPayload(Procedures::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());
            }

            return $this->customFailResponseWithPayload("Procedure was not created");
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    public function update()
    {
        if ($this->authUser()->hasRole('Charting')) {
//            request()->validate(["procedureId" => "required"]);

            $validator = Validator::make(request()->all(), [
                "procedureId" => "required",
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                // return response()->json($errors->all(), 500);
                return $this->customFailResponseWithPayload($errors->all());
            }

            $procedure = Procedures::find(request()->procedureId);

            if ($procedure) {
                $procedure->update([
                    "procedure" => request()->procedure,
                    "code" => request()->code,
                    "price" => request()->price,
                ]);

                return $this->customSuccessResponseWithPayload(Procedures::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());
            }

            return $this->customFailResponseWithPayload("Procedure was not update");
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    public function destroy()
    {

        if ($this->authUser()->hasRole('Charting')) {
            request()->validate(["procedureId" => "required"]);

            $procedure = Procedures::find(request()->procedureId);

            if ($procedure) {
                $procedure->delete();

                return $this->customSuccessResponseWithPayload(Procedures::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());
            }

            return $this->customFailResponseWithPayload("Procedure was not found");
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }
}
