<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentSubCategory extends Model
{
    use HasFactory;

    protected $table ='treatment_categories';

    /**
     * Get all of the treatments for the TreatmentSubCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function treatments()
    {
        return $this->hasMany(Treatment::class, 'subcategory','id');
    }
    

    public function subcategories()
    {
        
    }
}
