<?php

namespace App\Models;

use App\Models\Agenda;
use App\Mail\SendCodeMail;
use App\Models\Department;
use App\Models\Appointment;
use App\Models\EmployeeCode;
use App\Models\LogActivity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Google\Service\Dfareporting\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable implements JWTSubject
{
    use HasFactory, HasRoles, Notifiable;

    protected $fillable = [
        'pay_frequency_id',
        'supervisor_id',
        'rate_type',
        'sub_department_id',
        'department_id',
        'country_id',
        'position_id',
        'duty_type_id',
        'hire_date',
        'first_name',
        'last_name',
        'middle_name',
        'maiden_name',
        'email',
        'date_of_birth',
        'gender',
        'marital_status',
        'home_email',
        'alternative_phone',
        'home_phone',
        'cell_phone',
        'place_of_residence',
        'business_email',
        'business_phone',
        'branch_address',
        'ethnic_group',
        'city_of_residence',
        'work_in_city',
        'work_permitt',
        'gross_salary',
        'phone',
        'zipcode',
        'basic_salary',
        'net_salary',
        'tin_number',
        'employee_type_id',
        'attendance_time',
        'account_number',
        'bank_name',
        'bank_ban_number',
        'transport_allowance',
        'pay_frequency_text',
        'rate',
        'rehire_date',
        'medical',
        'transportation',
        'monthly_working_hours',
        'family',
        'others_in_benefits',
        'edu_award',
        'edu_awarding_institution',
        'edu_awarding_date',
        'edu_class_of_award',
        'reporting_to',
        'first_supervisor',
        'emergency_person_name',
        'emergency_relationship',
        'emergency_phone',
        'emergency_another_phone',
        'emergency_home_phone',
        'emergency_address',
        'emergency_work_phone',
        'user_email',
        'password',
        'photo_url',
        'status',
        "interval",
        "contract_start_date",
        "contract_end_date",
        "availability",
        "week_days",
        "weeks",
        "frequency_id",
        "email_verified_at",
        "verification_code",
        "new_email_verification_cod,e",
        "is_temp_password_updated",
        "google2fa_secret",
        "login_2fa_method"
    ];

    /*
     *Manage Employee auth
     */

    protected $guard = 'employee';

    protected $hidden = [
        'password',
        'google2fa_secret'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'week_days' => 'array',
        'weeks' => 'array',
        'availability' => 'array',
        'is_temp_password_updated' => 'boolean'
    ];

    protected $appends = ["photo", 'permissions'];
    public function getPhotoAttribute()
    {
        return route('fetch.photo', ['file' => $this->photo_url, 'folder' => 'employees']);
    }

    /**
     * Get the employeeType that owns the Employee
     *
     * @return BelongsTo
     */
    public function employeeType()
    {
        return $this->belongsTo(EmployeeType::class, 'employee_type_id');
    }

    /**
     * Get the department that owns the Employee
     *
     * @return BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the department that owns the Employee
     *
     * @return BelongsTo
     */
    public function sub_department()
    {
        return $this->belongsTo(SubDepartment::class, 'sub_department_id');
    }

    /**
     * Get the position that owns the Employee
     *
     * @return BelongsTo
     */
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    /**
     * Get all of the leaveApplication for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leaveApplications()
    {
        return $this->hasMany(LeaveApplication::class, 'employee_id', 'id');
    }

    /**
     * Get the position that owns the Employee
     *
     * @return BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(CountryCity::class, 'city_id', 'id');
    }

    /**
     * Get the position that owns the Employee
     *
     * @return BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    /**
     * Get the position that owns the Employee
     *
     * @return BelongsTo
     */
    public function dutyType()
    {
        return $this->belongsTo(DutyType::class, 'duty_type_id', 'id');
    }

    /**
     * Get the position that owns the Employee
     *
     * @return BelongsTo
     */
    public function rateType()
    {
        return $this->belongsTo(RateType::class, 'rate_type_id', 'id');
    }

    /**
     * Get the attendances that owns the Employee
     *
     * @return BelongsTo
     */
    public function attendances()
    {
        return $this->belongsTo(AttendanceHistory::class, 'id', 'employee_id');
    }

    /**
     * Get the first_supervisor that owns the Employee
     *
     * @return BelongsTo
     */
    public function first_supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'first_supervisor_id', 'id');
    }

    /**
     * Get the first_supervisor that owns the Employee
     *
     * @return BelongsTo
     */
    public function second_supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'second_supervisor_id', 'id');
    }

    /**
     * Get the first_supervisor that owns the Employee
     *
     * @return BelongsTo
     */
    public function reportingTo()
    {
        return $this->belongsTo(Supervisor::class, 'reporting_to', 'id');
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class)->withTimestamps();
    }
    public function appointmentTypes()
    {
        return $this->belongsToMany(AppointmentType::class, 'appointment_type_employee')->withTimestamps();
    }

    public function agendas()
    {
        return $this->belongsToMany(Agenda::class, 'doctors_agendas');
    }

    public function scopeInfo($query)
    {
        return $query->select('id', 'email', 'first_name', 'phone', 'last_name');
    }

    // protected $appends = ['permissions'];

    public function getPermissionsAttribute()
    {
        return $this->roles->map(function ($role) {
            return $role->permissions;
        })->collapse()->pluck('name')->unique();
    }


    public static function sendCode($user, $credentials)
    {
        $code = random_int(1000, 9999);
        $user_code = EmployeeCode::where('employee_id', $user->id)->first();
        $expiry_minutes = (int) get_facility_setting("mfa_code_expiry_minutes", 15);

        $data = [
            'code' => $code,
            'employee_id' => $user->id,
            'credentials' => json_encode($credentials),
            'expire_time' => Carbon::now()->addMinutes($expiry_minutes)->toDateTimeString(),
            'is_used' => 0
        ];

        if (!is_null($user_code)) {
            $user_code->update($data);
        } else {
            EmployeeCode::create($data);
        }

        try {

            $details = [
                'title' => '',
                'code' => $code,
                'firstName' => $user->first_name,
                'lastName' => $user->last_name
            ];

            Mail::to($user->email)->send(new SendCodeMail($details));
        } catch (\Throwable $th) {
            Log::channel('db')->info("error" . print_r($th->getMessage(), true));
            return "Error: " . $th->getMessage();
        }
    }


    public static function storeLoginCode(Employee $employee, ?string $otpCode)
    {
        $code = $otpCode ?? random_int(1000, 9999);
        $user_code = EmployeeCode::where('employee_id', $employee->id)->first();
        $expiry_minutes = (int) get_facility_setting("mfa_code_expiry_minutes", 15);

        $data = [
            'code' => $code,
            'employee_id' => $employee->id,
            'credentials' => json_encode(['email' => $employee->email]),
            'expire_time' => Carbon::now()->addMinutes($expiry_minutes)->toDateTimeString(),
            'is_used' => 0
        ];

        if (!is_null($user_code)) {
            $user_code->update($data);
        } else {
            EmployeeCode::create($data);
        }

        if ($employee->login_2fa_method  == LOGIN_WITH_EMAIL) {
            try {
                $details = [
                    'title' => '',
                    'code' => $code,
                    'firstName' => $employee->first_name,
                    'lastName' => $employee->last_name
                ];

                Mail::to($employee->email)->send(new SendCodeMail($details));
            } catch (\Throwable $th) {
                Log::channel('db')->info("error" . print_r($th->getMessage(), true));
            }
        }
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function latestLog()
    {
        return $this->hasOne(LogActivity::class, 'user_id', 'id')->latestOfMany();
    }

    public function treatments()
    {
        return $this->belongsToMany(DoneTreatment::class)->orderBy('id', 'DESC');
    }

}
