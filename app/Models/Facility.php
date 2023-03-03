<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "location",
        "email",
        "phonenumber",
        "city",
        "country",
        "subscription_id",
        "facility_status_id",
        "treatment_category",
    ];

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    public function treamentCategory()
    {
        return $this->hasMany(TreatmentCategory::class, 'id', 'treatment_category');
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }


    /**
     * Validation rules
     *
     * @var array
     */
    public static $facilityRules = [
        'name' => 'required|string|max:255|unique',
        'location'         => 'required|string',
        'email'      => 'required|email:filter|unique:users,email',
        'phonenumber'      => 'required',
        'city'         => 'nullable',
        'country'         => 'nullable',
        'subscription_id'         => 'nullable|numeric',
        'facility_status_id'         => 'nullable|numeric',
        'treatment_category'         => 'nullable|numeric',
    ];

    public function events(){
        return $this->hasMany(Event::class);
    }
}
