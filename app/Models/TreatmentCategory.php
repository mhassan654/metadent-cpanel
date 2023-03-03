<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentCategory extends Model
{
    use HasFactory;
    protected $table = 'treatment_categories';
    protected $fillable = ['name', 'parent_id'];

    /**
     * Get the facility that owns the TreatmentCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facility()
    {
        return $this->belongsTo(Facility::class, 'id', 'facility_id');
    }

    public function categories()
    {
        return $this->hasMany(TreatmentCategory::class, 'parent_id');
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class,'treatment_category');
    }

    public function parentCategory()
    {
        return $this->belongsTo(TreatmentCategory::class, 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(TreatmentCategory::class, 'parent_id')->with('categories');
    }
}
