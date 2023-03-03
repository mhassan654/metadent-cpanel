<?php
/**
 *
 * @Author: Wavamuno Brandon Elijah
 * @Email: brandonelijah099@gmail.com
 * @Github: Elijahwb
 * @Tel: +256753659098 / +256770944854
 *
 */

namespace App\Models;

use Exception;
use App\Mail\SendCodeMail;
use App\Models\Department;
use App\Models\EmployeeCode;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use App\Http\Permissions\HasPermissionsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        HasRoles,
        softDeletes,
        Notifiable;
//    use HasApiTokens, HasFactory, Notifiable, HasPermissionsTrait;

    public function getJWTIdentifier(){
        return$this->getKey();
    }

    public function getJWTCustomClaims(){
        return[];
    }

    public function routeNotificationForMail()
    {
        return $this->email; //You e-mail property here
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "first_name",
        "last_name",
        "birth_date",
        "gender",
        "address",
        "phonenumber",
        "role_id",
        "frequency_id",
        "department_id",
        "interval",
        "contract_start_date",
        "contract_end_date",
        "availability",
        "account_status_id",
        "facility_id",
        "specializations",
        "password",
        "email",
        "week_days",
        "weeks",
        "treatment_id",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'week_days' => 'array',
        'weeks' => 'array',
        'availability' => 'array',
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }


    public function treatments()
    {
        return $this->hasOne(Treatment::class, 'id', 'treatment_id');
    }

    public  function verificationCode()
    {
        $code = random_int(1000, 9999);

        UserCode::updateOrCreate(
//            [ 'user_id' => auth()->user()->id ],
//            [ 'code' => $code ],
//            ['credentials'=>'testing']
        );

        try {

            $details = [
                'title' => 'Your two factor authentication code is:',
                'code' => $code
            ];

            Mail::to(auth()->user()->email)->send(new SendCodeMail($details));

        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }

    public static function userVerificationCode($user,$credentials)
    {
        $code = random_int(1000, 9999);
        $user_code = EmployeeCode::where('employee_id', $user->id)->first();

        if ($user_code !== null) {

            $user_code->update([
                'code' => $code,
                'employee_id'=> $user->id,
                'credentials' => json_encode($credentials)
            ]);

        } else {

            EmployeeCode::create([
                'code' => $code,
                'employee_id'=> $user->id,
                'credentials'=>json_encode($credentials)

            ]);

        }

        try {

            $details = [
                'title' => '',
                'code' => $code,
                'firstName' => $user->first_name,
                'lastName' => $user->last_name
            ];

            Mail::to($user->email)->send(new SendCodeMail($details));

        } catch (Exception $e) {
            return "Error: ". $e->getMessage();
        }
    }


    public function appointments(){
        return $this->belongsToMany(Appointment::class, 'doctors_appointments');
    }

    public function agendas()
    {
        return $this->belongsToMany(Agenda::class, 'doctors_agendas');
    }

    public function scopeInfo($query)
    {
        return $query->select('id', 'email', 'first_name', 'phonenumber', 'last_name');
    }

    protected $appends = ['permissions'];

    public function getPermissionsAttribute()
    {
        return $this->roles->map(function ($role) {
            return $role->permissions;
        })->collapse()->pluck('name')->unique();
    }

}
