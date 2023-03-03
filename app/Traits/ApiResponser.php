<?php

namespace App\Traits;

trait ApiResponser
{
    // private function successResponse($data, $code)
    // {
    //     return response()->json($data, $code);
    // }

    // protected function errorResponse($message, $code)
    // {
    //     return response()->json(['error'=>$message, 'code'=>$code],$code);
    // }

    // protected function showAll(Collection $collection, $status,$msg, $code =200)
    // {
    //     return $this->successResponse(['payload'=>$collection, 'success'=>$status, 'msg'=>$msg],$code);
    // }

    // protected function showOne(Model $model, $code =200)
    // {
    //     return $this->successResponse(['payload'=>$model],$code);
    // }

    public function customSuccessResponseWithPayload($data)
    {
        return response()
            ->json(
                [
                    "status" => "SUCCESS",
                    "payload" => $data,
                ]
            );
    }

    public function customSuccessResponseWithMessage($customMessage, $data = null)
    {
        return response()->json(
            [

                "status" => "SUCCESS",
                "payload" => $data, $customMessage,
            ]
        );
    }

    public function customFailResponseMessage($customMessage)
    {
        return response()->json(
            [
                "status" => "FAIL",
                "payload" => $customMessage,
            ]
        );
    }

    public function customFailResponseWithPayload($customMessage)
    {
        return response()->json(
            [
                "status" => "FAIL",
                "payload" => $customMessage,
            ]
        );
    }

    public function authUser()
    {
        $user = request()->user();
        return $user;
    }

    //for patient APIs
    public function customPatientErrorResponse($customMessage)
    {
        return response()->json([
            "status" => false,
            "error" => $customMessage,
        ]);
    }

    public function customPatientSuccessResponse($data, $message = null)
    {
        return response()->json([
            "status" => true,
            "payload" => $data,
            "message" => is_null($message) ? '' : $message,
        ]);
    }
}
