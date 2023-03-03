<?php

namespace App\Models;

use App\Mail\SendCodeMail;
use App\Models\FamilyMember;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Patient extends Authenticatable implements JWTSubject
{
    use Notifiable, softDeletes, HasFactory;
    // Rest omitted for brevity

    protected $appends = [
        "image",
        "agb",
        "agb_code",
        "agb_number",
    ];
    public function getImageAttribute()
    {
        if ($this->photo !== null) {
            return route('fetch.photo', ['file' => $this->photo, 'folder' => 'patients']);
        }
        return null;

    }

    public function getAgb()
    {
        return is_null(auth()->user()) ? null : get_facility_setting("agb");
    }

    public function getAgbAttribute()
    {
        $agb = $this->getAgb();

        return $agb;
    }

    public function getAgbCodeAttribute()
    {
        $agb = $this->getAgb();

        $agb_code = is_null($agb) ? null : substr($agb, 0, 2);

        return $agb_code;
    }

    public function getAgbNumberAttribute()
    {
        $agb = $this->getAgb();

        $agb_number = is_null($agb) ? null : substr($agb, -6);

        return $agb_number;
    }
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function routeNotificationForMail()
    {
        return $this->email; //You e-mail property here
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    public function invoices()
    {
        return $this->hasMany(Invoice::class, "patient_id", "id");
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    protected $guard = "patient";

    protected $fillable = [
        "unique_identifier",
        "first_name",
        "last_name",
        "middle_name",
        "gender",
        "marital_status",
        "birth_date",
        "email",
        "home_phone",
        "home_address",
        "nationality",
        "country",
        "id_number",
        "state",
        "city",
        "street",
        "postalcode",
        "insurer",
        "insurance_policy_number",
        "guardian_name",
        "guardian_phone",
        "guardian_email",
        "guardian_address",
        "facility_id",
        "fm_relationship",
        "fm_name",
        "fm_email",
        "fm_phone_number",
        'photo',
        "patient_email",
        "patient_phone",
        "patient_insurer",
        "nok_name",
        "nok_email",
        "nok_phone_number",
        "referree_email",
        "referree_phone",
        "referred_by",
        "citizen_service_number",
        "fill_if_not_filled",
        "reviews",
        "main_doctor_id",
        "secondary_doctor_id",
        "is_disabled",
        "defaulter",
        "no_appointment_creation",
        "no_payment_reminder",
        "no_insurance_claims",
        "customer_in_arrears",
        "send_direct_invoice_to_patient",
        "automated_payment",
        "first_letter_of",
        "deactivation_date",
        "work_number",
        "mobile_number",
        "ppspp_total_score",
        "ppspp_score_four_quadrants",
        "ppspp_date",
        "last_recall_date",
        "country_code",
        "gp_code",
        "total_outstanding_invoice",
        "total_outstanding_personal_amt",
        "work_mail",
        "private_mail",
        "invoice_mail",
        "document_directory",
        "date_of_death",
        "date_of_first_treatment",
        "date_of_last_treatment",
        "profession",
        "automatic_payment_type",
        "reason_for_archiving",
        "asa_qns_date",
        "additional_insurance",
        "additional_insurance_type",
        "additional_insurance_policy_no",
        "dentist",
        "mouth_hygienist",
        "preventive_assistant",
        "orthodontist",
        "recall_dentist_duration",
        "recall_mouth_hygienist_duration",
        "recall_preventive_assistant_duration",
        "recall_orthodontist_duration",
        "general_practitioner",
        "next_dentist_visit",
        "next_mouth_hygienist_visit",
        "next_orthodontist_visit",
        "next_preventive_assistant_visit",
        "BSN",
        "WLZ",
        "title",
        "is_serving",
        "language",
        "secondary_email",
        "insurance_from_date",
        "receive_sms",
        "receive_system_emails",
        "receive_newsletters",
        "do_not_receive_emails",
        "do_not_receive_email_declarations",
        "do_not_send_declaration_to_insurance_company",
        "email_salutation",
        "confirm_dentist_visit",
        "confirm_mouth_hygienist_visit",
        "confirm_preventive_assistant_visit",
        "confirm_orthodontist_visit",
        "ext",
        "landline_phone",
        "insurance_uzovi_code",
        "additional_insurance_uzovi_code",
        "receive_physical_mails",
        "account_status",
        "account_status_reason",
        "account_number_iban",
        "last_dentist_recall",
        "last_mouth_hygienist_recall",
        "last_preventive_assistant_recall",
        "last_orthodontist_recall",
        "account_status_reason_text",
        "insurance_type",
        "house_number",
        "self_registration",
        "private_number",
        "secret_number",
        "address",
        "pps_date",
        "access_portal",
        "approved",
        "reference_date",
        "insured_number",
        "general_practitioner_pharmacy",
        "province",
        "region",
    ];

    /**
     * Get the mainDoctor that owns the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mainDoctor()
    {
        return $this->belongsTo(Employee::class, 'main_doctor_id', 'id');
    }

    /**
     * Get the SecondDoctor that owns the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function SecondDoctor()
    {
        return $this->belongsTo(Employee::class, 'secondary_doctor_id', 'id');
    }

    /**
     * Accessor that mimics Eloquent dynamic property.
     *
     * @return IlluminateDatabaseEloquentCollection
     */
    public function getPatientsAttribute()
    {
        if (!$this->relationLoaded('secondaryDoctors')) {
            $secondaryDoctors = \App\Models\Employee::whereIn('id', $this->secondary_doctor_id)->get();

            $this->setRelation('secondaryDoctors', $secondaryDoctors);
        }

        return $this->getRelation('secondaryDoctors');
    }

    /**
     * Access layers relation query.
     *
     * @return IlluminateDatabaseEloquentBuilder
     */
    public function secondaryDoctors()
    {
        return \App\Models\Employee::whereIn('id', $this->secondary_doctor_id);
    }

    /**
     * Get all of the familyMembers for the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class, 'patient_id', 'id');
    }

    /**
     * Accessor for layer_ids property.
     *
     * @return array
     */
    public function getDoctorIdsAttribute($commaSeparatedIds)
    {
        return explode(',', $commaSeparatedIds);
    }

    /**
     * Mutator for layer_ids property.
     *
     * @param  array|string $ids
     * @return void
     */
    public function setDoctorIdsAttribute($ids)
    {
        $this->attributes['secondary_doctor_id'] = is_string($ids) ? $ids : implode(',', $ids);
    }

    public static function verificationCode($patient)
    {
        $code = random_int(1000, 9999);

        PatientCode::updateOrCreate(
            ['patient_id' => $patient->id],
            ['code' => $code]
        );
        try {

            $details = [
                'title' => '',
                'code' => $code,
                'firstName' => $patient->first_name,
                'lastName' => $patient->last_name,
            ];

            Mail::to($patient->email)->send(new SendCodeMail($details));
        } catch (Exception $e) {
            info("Error: " . $e->getMessage());
        }
    }

    public function scopeInfo($query)
    {
        return $query->select('id', 'email', 'first_name', 'patient_phone', 'last_name');
    }

    public function preferredAppointmentTime()
    {
        return $this->hasOne(Period::class, 'id', 'preferred_appointment_time');
    }

    public function logs()
    {
        return $this->hasOne(LogActivity::class, 'patient_id', 'id')->latestOfMany();
    }

    public function latestTreatment()
    {
        return $this->hasOne(DoneTreatment::class, 'patient_id', 'id')->latestOfMany();
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $patient_code_format = null;
            if (!is_null(auth()->user())) {
                $patient_code_format = get_facility_setting('patient_string');
            } elseif (!is_null(auth('patient')->user())) {
                $patient_code_format = get_facility_setting_patient_portal('patient_string');
            } else {
                $patient_code_format = 'MDT';
            }

            $string = $patient_code_format . '-' . "00000000";

            $patient_id = isset($model->attributes['id']) ? $model->attributes['id'] : rand();

            $unique_id = substr($string, -8, 8) + $patient_id;

            $unique_id = str_pad($unique_id, 8, '0', STR_PAD_LEFT);

            $model->attributes['unique_identifier'] = $patient_code_format . '-' . $unique_id;

        });

        static::created(function ($model) {

            $patient_code_format = null;
            if (!is_null(auth()->user())) {
                $patient_code_format = get_facility_setting('patient_string');
            } elseif (!is_null(auth('patient')->user())) {
                $patient_code_format = get_facility_setting_patient_portal('patient_string');
            } else {
                $patient_code_format = 'MDT';
            }

            $string = $patient_code_format . '-' . "00000000";

            $patient_id = isset($model->attributes['id']) ? $model->attributes['id'] : rand();

            $unique_id = substr($string, -8, 8) + $patient_id;

            $unique_id = str_pad($unique_id, 8, '0', STR_PAD_LEFT);

            $model->attributes['unique_identifier'] = $patient_code_format . '-' . $unique_id;

            $model->save();

        });
    }

    protected $casts = [
        'defaulter' => 'boolean',
        'no_appointment_creation' => 'boolean',
        'no_payment_reminder' => 'boolean',
        'no_insurance_claims' => 'boolean',
        'customer_in_arrears' => 'boolean',
        'receive_sms' => 'boolean',
        'receive_system_emails' => 'boolean',
        'receive_newsletters' => 'boolean',
        'do_not_receive_emails' => 'boolean',
        'do_not_receive_email_declarations' => 'boolean',
        'do_not_send_declaration_to_insurance_company' => 'boolean',
        'send_direct_invoice_to_patient' => 'boolean',
        'automated_payment' => 'boolean',
        'confirm_orthodontist_visit' => 'boolean',
        'confirm_preventive_assistant_visit' => 'boolean',
        'confirm_mouth_hygienist_visit' => 'boolean',
        'confirm_dentist_visit' => 'boolean',
        'is_serving' => 'boolean',
        'receive_physical_mails' => 'boolean',
        'self_registration' => 'boolean',
        'access_portal' => 'boolean',
        'approved' => 'boolean'
    ];

}
