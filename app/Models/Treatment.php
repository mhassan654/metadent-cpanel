<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TreatmentCategory;

class Treatment extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "treatment",
        "treatment_category",
        "code",
        "price",
        'subcategory',
        "facility_id",
        "procedures"
    ];

    protected $casts=[
        'procedures' => 'json'
    ];

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    /**
     * Get the treatmentCategory that owns the Treatment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function treatmentCategory()
    {
        return $this->belongsTo(TreatmentCategory::class, 'treatment_category');
    }

    /**
     * Get the treatmentCategory that owns the Treatment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subCategory()
    {
        return $this->belongsTo(TreatmentCategory::class, 'subcategory');
    }

    public function doctors()
    {
        return $this->belongsToMany(Employee::class, 'employees_treatments');
    }

    public function procedures()
    {
        return $this->hasMany(TreatmentProcedure::class);
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }


}
