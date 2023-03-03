<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use Illuminate\Http\Request;
use App\Models\DoctorQuestion;
use Illuminate\Support\Facades\Validator;

class DoctorQuestionsController extends BaseController
{
    public function __construct()
    {
//        $this->middleware(['auth:api']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $validator = Validator::make(request()->all(),[
            'patientId' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        }
        $questions = DoctorQuestion::with('doctor')->latest()->where('patient_id', request()->patientId)->get();
        return $this->customSuccessResponseWithPayload($questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $validator = Validator::make($request->all(),[
                'patientId' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            }
            $question = new DoctorQuestion;
            $question->patient_id = $request->patientId;
            $question->doctor_id = auth()->user()->id;
            $question->risks = json_encode($request->risks);
            $question->questions = json_encode($request->questions);
            $question->save();
            if($question){
                return $this->customSuccessResponseWithPayload($question);
            }
            return $this->customFailResponseWithPayload('Not Created');
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
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'date' => 'string|date_format:d-m-Y',
                'questionId' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            }
            $question = DoctorQuestion::find(request()->questionId);
            $question->date = $request->date;
            $question->patient_id = $request->patientId;
            $question->doctor_id = auth()->user()->id;
            $question->risks = json_encode($request->risks);
            $question->questions = json_encode($request->questions);
            $question->update();
            if($question){
                return $this->customSuccessResponseWithPayload($question);
            }
            return $this->customFailResponseWithPayload('Not Updated');
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
        //
    }
}
