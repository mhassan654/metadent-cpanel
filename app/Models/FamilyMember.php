<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'family_members';

    protected $appends = [
        'image'
    ];

    public function getImageAttribute()
    {
        if ($this->member_image_path !== null) {
            return route('fetch.photo', ['file' => $this->member_image_path, 'folder' => 'patients']);
        }
        return null;
    }

    protected $fillable = [
        'member_first_name',
        'member_middle_name',
        'member_last_name',
        'patient_id',
        'member_email',
        'member_date_of_birth',
        'member_gender',
        'member_image_path',
        'member_marital_status',
        'member_phone_number',
        'member_second_phone_number',
        'member_citizen_service_number',
        'member_nationality',
        'member_country',
        'member_region',
        'member_postal_code',
        'member_home_address',
        'member_state',
        'member_street',
        'member_relationship',
        'member_category'
    ];

    protected $dates = [
        'deleted_at'
    ];
}