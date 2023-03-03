<?php

namespace App\Http\Resources;

use App\Models\TreatmentCategory;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TreatmentChildCategoryresource;

class TreatmentCategoryResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'treatments'=>$this->treatments,
            'child_categories'=>TreatmentChildCategoryresource::collection($this->childrenCategories()->latest()->get())
        ];
    }
}
