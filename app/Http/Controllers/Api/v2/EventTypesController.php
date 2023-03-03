<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\EventType;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventTypesController extends BaseController
{
    public function construct()
    {
//        $this->middleware(["auth:api"]);
    }

    public function index()
    {
        return $this->allTypes();
    }

    public function create_event_type()
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required|string',
            'code' => 'required',
            'color' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }
        $new_event_type = EventType::create([
            'title' => request()->title,
            'code' => request()->code,
            'color' => request()->color,
            'facility_id' => Auth::user()->facility_id,
        ]);

        if ($new_event_type):
            return $this->customSuccessResponseWithPayload($new_event_type);
        endif;

        return $this->customFailResponseWithPayload('Event Type has not been created');
    }

    public function update()
    {
        $validator = Validator::make(request()->all(), [
            'eventId' => 'required|integer',
            'title' => 'required|string',
            'code' => 'required',
            'color' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        $type = EventType::find(request()->eventId);

        if($type)
        {
            $type->update([
                'title' => request()->title,
                'code' => request()->code,
                'color' => request()->color,
                'facility_id' => request()->facilityId,
            ]);

            return $this->customSuccessResponseWithPayload($type);
        }

        return $this->customFailResponseWithPayload("event type not found");
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'eventTypeId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        $type = EventType::find(request()->eventTypeId);

        if($type->title == "Callback Patient" || $type->title == "Callback (InHouse)")
        {

            return $this->customFailResponseWithPayload('Default Event types cannot be deleted');
        }else{
            $type->delete();

            return $this->customSuccessResponseWithPayload('Event Type has been deleted');
        }

        return $this->customFailResponseWithPayload("Event type not found");
    }

    private function allTypes()
    {
        $all_appointment_types = EventType::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get();

        return $this->customSuccessResponseWithPayload($all_appointment_types);
    }
}
