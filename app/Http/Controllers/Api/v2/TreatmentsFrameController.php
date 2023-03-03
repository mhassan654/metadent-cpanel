<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\CompositeType;
use App\Models\TreatmentFrame;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TreatmentsFrameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(TreatmentFrame::all());
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
            "frameName" => "required|string|unique:treatment_frames,frame_name",
            "frameCode" => "required|regex:/^[a-zA-Z0-9\s]+$/",
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
            $new_frame = new TreatmentFrame;
            $new_frame->facility_id = 1;
            $new_frame->frame_name = $request->frameName;
            $new_frame->frame_code= $request->frameCode;
            $new_frame->save();

            if ($new_frame):
                return $this->customSuccessResponseWithPayload($new_frame);
            else:
               return  $this->customFailResponseWithPayload('Could create frame');
            endif;

        }catch (\Throwable $th)
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

        $type = TreatmentFrame::find($id);

        if($type)
        {
            return $this->customSuccessResponseWithPayload($type);
        }

        return $this->customFailResponseWithPayload("Frame not found");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $type = TreatmentFrame::find($id);

        $validator = Validator::make(request()->all(), [
            "frameName" => "required|string",
            "frameCode" => "required|regex:/^[a-zA-Z0-9\s]+$/",
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
            if(isset($type))
            {
                if ($type->id === 1 || $type->id === 2 ||  $type->id === 3 ) {
                    return $this->customFailResponseWithPayload("Default Frames cannot be updated");
                }
                $type->frame_name = $request->frameName;
                $type->frame_code= $request->frameCode;
                $type->save();

                return $this->customSuccessResponseWithPayload($type);
            }

            return $this->customFailResponseWithPayload("Frame not found");

        }catch(\Throwable $th)
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

        $type = TreatmentFrame::find($id);

        try {
            if(isset($type))
            {
                if ($type->id === 1 || $type->id === 2 ||  $type->id === 3 ) {
                    return $this->customFailResponseWithPayload("Default Frames cannot be deleted");
                }
                $type->forceDelete();

                return $this->customSuccessResponseWithPayload('Frame  has been deleted');
            }

            return $this->customFailResponseWithPayload("Frame  not found");

        }catch(\Throwable $th)
        {
            return $this->customFailResponseWithPayload($th->getMessage(),200);
        }
    }
}
