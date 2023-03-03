<?php

namespace App\Http\Resources;

use App\Models\Treatment;
use App\Models\TreatmentSubCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class TreatmentChildCategoryresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // $child = TreatmentSubCategory::find(4);

        // dd(TreatmentResource::collection($child->treatments()->latest()->get()));
        // return parent::toArray($request);
        // $treatments = $this->treatments()->latest()->get();
        $treatments = Treatment::where('subcategory',$this->id)->get();
        // dump($treatments);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'treatments'=>TreatmentResource::collection($treatments)
        ];
    }
}
