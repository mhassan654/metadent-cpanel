<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OtherSpecifiedTreatment;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class OtherSpecifiedTreatmentsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(OtherSpecifiedTreatment::all());
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
            "name" => "required|string|unique:other_specified_treatments,name",
            "code" => "required|regex:/^[a-zA-Z0-9\s]+$/",
            "treatments"=>'required|array'
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
            $new_frame = new OtherSpecifiedTreatment;
            $new_frame->facility_id = 1;
            $new_frame->name = $request->name;
            $new_frame->code= $request->code;
            $new_frame->treatments= $request->treatments;
            $new_frame->save();

            if ($new_frame):
                return $this->customSuccessResponseWithPayload($new_frame);
            else:
                return  $this->customFailResponseWithPayload('Could not create other specified');
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

        $type = OtherSpecifiedTreatment::find($id);

        if($type)
        {
            return $this->customSuccessResponseWithPayload($type);
        }

        return $this->customFailResponseWithPayload("item not found");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $type = OtherSpecifiedTreatment::find($id);

        $validator = Validator::make(request()->all(), [
            "name" => "required|string",
            "code" => "required|regex:/^[a-zA-Z0-9\s]+$/",
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
                $type->name = $request->name;
                $type->code= $request->code;
                $type->treatments= $request->treatments;
                $type->save();

                return $this->customSuccessResponseWithPayload($type);
            }

            return $this->customFailResponseWithPayload("Item not found");

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

        $type = OtherSpecifiedTreatment::find($id);

        try {
            if(isset($type))
            {
                $type->forceDelete();

                return $this->customSuccessResponseWithPayload('item  has been deleted');
            }

            return $this->customFailResponseWithPayload("item  not found");

        }catch(Throwable $th)
        {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
