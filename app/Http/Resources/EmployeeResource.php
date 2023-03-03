<?php

namespace App\Http\Resources;

use App\Traits\FrontOfficeTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    use FrontOfficeTrait;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        // $roles = $this->getEmployeeRoles($this->id);
        return [
            'id'=>$this->id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'interval'=>$this->interval,
             'department'=> new DepartmentResource($this->department),
            //  'department'=> new DepartmentResource($this->department),
             'week_days'=>$this->week_days,
             'weeks'=>$this->weeks,
             'employee_type' => new EmployeeTypeResource($this->employeeType)
            //  'roles'=>$roles,
        ];
    }
}
