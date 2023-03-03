<?php

namespace App\Http\Controllers;

class ApiBaseController extends Controller
{
    public function fileManager($file_name, $folder_path)
    {
        upload_file($file_name, $folder_path);
    }

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
                "payload" => $data,
                "message" => $customMessage
            ]
        );
    }

    public function customFailResponseMessage($customMessage)
    {
        return response()->json(
            [
                "status" => "FAIL",
                "payload" => $customMessage
            ],
            200
        );
    }

    public function customFailResponseWithPayload($customMessage)
    {
        return response()->json(
            [
                "status" => "FAIL",
                "payload" => $customMessage,
            ],
            200
        );
    }
    public function customSlotFailResponseWithPayload($customMessage)
    {
        return response()->json(
            [
                "status" => "FAIL",
                "payload" => $customMessage,
            ],
            200
        );
    }

    public function customSuccesResponseWithPayload($customMessage)
    {
        return response()->json(
            [
                "status" => $customMessage,
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
        ], 200);
    }

    public function customPatientSuccessResponse($data, $message = null)
    {
        return response()->json([
            "status" => true,
            "payload" => $data,
            "message" => is_null($message) ? '' : $message,
        ]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    protected function sendResponse($data = [], $message = "", string|int $success_code = "")
    {

        $response = ['status' => true, 'payload' => []];

        if (!empty($message)) {
            $response['message'] = $message;
        }

        if (!empty($success_code)) {
            $response['success_code'] = $success_code;
        }

        if (!empty($data)) {
            $response['payload'] = $data;
        }

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     *
     */
    protected function sendError($error, $error_code = 101, $error_data = [])
    {
        //
        $response = ['status' => false, 'error' => $error, 'error_code' => $error_code];

        if (!empty($error_data)) {
            $response['payload'] = $error_data;
        }

        return response()->json($response, 200);
    }

}
