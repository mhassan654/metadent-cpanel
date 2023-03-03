<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait FrontOfficeTrait
{
    //fetch a doctors details for frontoffice 
    public function get_doctor_details($id){
        $doctor = DB::table('employees')
                ->select(['id', 'first_name', 'last_name', 'interval', 'department_id', 'week_days', 'weeks','employee_type_id'])
                ->orderBy('created_at', 'desc')
                ->find($id);
        // if (!$doctor) continue;
        if($doctor){
            $doctor->week_days = json_decode($doctor->week_days);
            $doctor->weeks = json_decode($doctor->weeks);
            $doctor->roles = $this->getEmployeeRoles($doctor->id);
            return $doctor;
        }
        return null;
    }

    public function get_family_members($id){
        $family_members = DB::table('family_members')->where('patient_id',$id)->get();
        return $family_members;
    }

    public function getEmployeeRoles($id){
        $roles = DB::table('model_has_roles')->where('model_id', $id)
                    ->select('role_id')->get()->map(function($role_pivot) {
                    $role = DB::table('roles')->select(['id', 'name'])->find($role_pivot->role_id);
                    return $role;
                });

        return $roles;
    }


}