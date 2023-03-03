<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoneTreatment extends Model
{
    use HasFactory;

    protected $fillable = [
        "patient_id",
        "visit_id",
        "treatment",
        "treatment_complete",
        "treatment_price",
        "facility_id",
        "payment_status",
        "tooth_sections",
        "invoice_ids",
        "doctors",
        "treatment_status"
    ];

    public $doctor_fields = [
        'employees.id',
        'first_name',
        'middle_name',
        'last_name',
        'maiden_name',
        'gender',
        'date_of_birth',
        'marital_status',
        'cell_phone',
        'email',
        'employee_type_id',
        'department_id',
        'position_id',
        'home_email',
        'country_id',
        'city_id',
        'place_of_residence',
        'reporting_to',
        'zipcode',
        'branch_address',
        'emergency_address',
        'monthly_working_hours',
        'gross_salary',
        'net_salary',
        'tin_number',
        'bank_ban_number',
        'account_number',
        'home_phone'
    ];

    public $patient_fields = [
        'id',
        'first_name',
        'last_name',
        'unique_identifier',
        'middle_name',
        'marital_status',
        'language',
        'patient_phone',
        'birth_date',
        'BSN',
        'home_phone',
        'email',
        'gender',
        'nok_name',
        'nok_email',
        'nok_phone_number',
        'referred_by',
        'referree_email',
        'referree_phone',
        'date_of_first_treatment',
        'date_of_last_treatment',
        'created_at',
        'updated_at',
        'guardian_name',
        'guardian_email',
        'guardian_phone',
        'guardian_address',
        'city',
        'province',
        'region',
        'home_address'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class)->select($this->patient_fields);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class)->select($this->doctor_fields);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'visit_id', 'id');
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }
}