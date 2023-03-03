<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\MedicalHistory;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ApiBaseController;

class MedicalHistoryController extends ApiBaseController
{
    public function __construct()
    {
//        $this->middleware(["auth:api"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $validator = Validator::make(request()->all(), [
            'patientId' => 'required|integer|exists:App\Models\Patient,id'
        ]);
        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        }
        $histories = MedicalHistory::where('patient_id', request()->patientId)->get();
        $final_history_container = [];
        foreach ($histories as $history) {
            $history_container = (object) [];
            $history_container->questions = json_decode($history->questions);
            $history_container->approved = $history->approved;
            $history_container->approved_at = $history->approved_at;
            $history_container->date = \Carbon\Carbon::parse($history->created_at)->format('d-m-Y');
            $history_container->approved_by = !is_null($history->approved_by) ? Employee::where('id', $history->approved_by)->first(['id', 'first_name', 'last_name'])->makeHidden(['roles', 'permissions']) : null;
            $final_history_container[] = $history_container;
        }
        return $this->customSuccessResponseWithPayload($final_history_container);
    }

    // $id = "PO-".date('my') . substr(uniqid(), 9, 12);

    // https://laravelarticle.com/laravel-custom-id-generator

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "questions" => "required",
                "patientId" => "required"
            ]);

            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            } else {
                MedicalHistory::create([
                    'patient_id' => request()->patientId,
                    'questions' => json_encode($request->questions),
                    'approved' => true,
                    'approved_by' => auth()->user()->id,
                    'approved_at' => \Carbon\Carbon::now()->format('d-m-Y')
                ]);
                return $this->customSuccessResponseWithPayload('History Added Successfully');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "questions" => "required",
                "patientId" => "required"
            ]);

            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            } else {
                $info = MedicalHistory::find($id);
                if ($info) {
                    $info->update([
                        'patient_id' => request()->patientId,
                        'questions' => json_encode($request->questions),
                        'approved' => true,
                        'approved_by' => auth()->user()->id,
                        'approved_at' => \Carbon\Carbon::now()->format('d-m-Y')
                    ]);
                    return $this->customSuccessResponseWithPayload('History Updated Successfully');
                }
                return $this->customFailResponseWithPayload('Information Not Foumd');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $info = MedicalHistory::find($id);
            if ($info) {
                $info->delete();
                return $this->customSuccessResponseWithPayload('History Deleted Successfully');
            }
            return $this->customFailResponseWithPayload('Info Not Deleted');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
