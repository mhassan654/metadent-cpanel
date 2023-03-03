<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\TreatmentBridgeConnector;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Throwable;

class TreatmentsBridgesConnectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->customSuccessResponseWithPayload(TreatmentBridgeConnector::all());
    }


//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return JsonResponse
//     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "connectorName" => "required|string|unique:treatment_bridge_connectors,connector_name",
            "connectorCode" => "required|regex:/^[a-zA-Z0-9\s]+$/",
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
            $new_frame = new TreatmentBridgeConnector;
            $new_frame->facility_id = 1;
            $new_frame->connector_name = $request->connectorName;
            $new_frame->connector_code= $request->connectorCode;
            $new_frame->save();

            if ($new_frame):
                return $this->customSuccessResponseWithPayload($new_frame);
            else:
                return  $this->customFailResponseWithPayload('Could create bridge connector');
            endif;

        }catch (Throwable $th)
        {
            $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {

        $type = TreatmentBridgeConnector::find($id);

        if($type)
        {
            return $this->customSuccessResponseWithPayload($type);
        }

        return $this->customFailResponseWithPayload("Bridge Connector not found");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $type = TreatmentBridgeConnector::find($id);

        $validator = Validator::make(request()->all(), [
            "connectorName" => "required|string",
            "connectorCode" => "required|regex:/^[a-zA-Z0-9\s]+$/",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(
                [
                    "status"=> "FAIL",
                    "payload" => ["message"=>$errors->all()]
                ]
            );
        }
        try {
            if(isset($type))
            {
                if ($type->id === 1) {
                    return $this->customFailResponseWithPayload("Default Bridge Conector cannot be updated");
                }
                $type->connector_name = $request->connectorName;
                $type->connector_code= $request->connectorCode;
                $type->save();

                return $this->customSuccessResponseWithPayload($type);
            }

            return $this->customFailResponseWithPayload("Bridge not found");

        }catch(Throwable $th)
        {
            $this->customSuccessResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
//        request()->validate(["typeId" => "required"]);

        $type = TreatmentBridgeConnector::find($id);

        try {
            if(isset($type))
            {
                if ($type->id === 1) {
                    return $this->customFailResponseWithPayload("Default Bridge Connector cannot be deleted");
                }
                $type->forceDelete();

                return $this->customSuccessResponseWithPayload('Connector  has been deleted');
            }

            return $this->customFailResponseWithPayload("Connector  not found");

        }catch(Throwable $th)
        {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
