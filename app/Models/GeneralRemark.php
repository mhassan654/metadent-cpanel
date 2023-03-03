<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralRemark extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'treatment_ids',
        'treatment_codes',
        'treatment_amounts',
        'tooth_element',
        'treatment_status',
        'created_by',
        'updated_by',
        'general_remark_category',
        'general_remark_description',
    ];

    public function created_by()
    {
        return $this->hasOne(User::class, "id", "created_by");
    }

    public function updated_by()
    {
        return $this->hasOne(User::class, "id", "updated_by");
    }
}
