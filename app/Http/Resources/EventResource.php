<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->id,
            "frequency" => new FrequencyResource($this->frequency),
            "title" => $this->title,
            "duration" => $this->duration,
            "recurrence" => $this->recurrence,
            "color" => $this->color,
            "code" => $this->code,
            "doctors" => EmployeeResource::collection($this->employees()->whereIn('employees.id',$this->doctors)->get())   ,
            "days" => $this->days,
            "attendees" => EmployeeResource::collection($this->employees()->whereIn('employees.id',$this->attendees)->get()) ,
            "start_time" => $this->start_time,
            "end_time" => $this->end_time,
            "contact_name" => $this->contact_name,
            "contact_email" => $this->contact_email,
            "contact_phone" => $this->contact_phone,
            "contact_address" => $this->contact_address,
            "comments" => $this->comments,
            "date" => $this->date,
            'day'=>Carbon::parse($this->date)->dayOfWeek
        ];
    }
}
