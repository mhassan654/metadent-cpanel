<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class PositionController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(Position::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePositionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            'name' => 'required|string',
            'details' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        try {
            if (auth()->check()) {
                $position = new Position();
                $position->name = request()->name;
                $position->details = request()->details;
                $position->facility_id = Auth::user()->facility_id;
                $position->save();

                if ($position):
                    return $this->customSuccessResponseWithPayload($position);
                endif;
            } else {
                return $this->customSuccessResponseWithPayload('You need to log in first');
            }

        } catch (\Throwable$th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string',
            'details' => 'required',
            'positionId' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        try {
            if (auth()->check()) {
                $position = Position::find(request()->positionId);
                $position->name = request()->name;
                $position->details = request()->details;
                $position->update();

                if ($position):
                    return $this->customSuccessResponseWithPayload($position);
                endif;
            } else {
                return $this->customSuccessResponseWithPayload('You need to log in first');
            }

        } catch (\Throwable$th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    // function for deleting an adhesive type
    public function destroy()
    {
       $validator = Validator::make(request()->all(), [
           'positionId' => 'required|integer',
       ]);

       if ($validator->fails()) {
           return $this->customFailResponseMessage($validator->messages(), 200);
       }

        $position = Position::find(request()->positionId);

        if($position)
        {
            $position->Delete();

            return $this->customSuccessResponseWithPayload('Position  has been archived');
        }

        return $this->customFailResponseWithPayload("Position  not found");
    }
    /**
     * restore all post
     *
     * @return \Illuminate\Http\JsonResponse()
     */
    public function restoreAll()
    {
        $restored= Position::onlyTrashed()->restore();

        return $this->customSuccessResponseWithPayload($restored);
    }
}
