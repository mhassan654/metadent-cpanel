<?php

namespace Database\Seeders;

use Metadent\AuthModule\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EmployeesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $role = Role::findByName('Doctor');
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        \DB::table('employees')->truncate();

        $user = Employee::create([
            'account_number' => '01255625688668',
            'alt_phone' => NULL,
            'alternative_phone' => NULL,
            'attendance_time_id' => 3,
            'availability' => '[{"days": [{"day": 2, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 3, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 5, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}], "week": 1}, {"days": [{"day": 2, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 3, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 5, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}], "week": 2}, {"days": [{"day": 2, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 3, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "13:00", "break_time": [{"end-time": "11:00", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 5, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}], "week": 3}, {"days": [{"day": 2, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 3, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 5, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}], "week": 4}]',
            'bank_ban_number' => 0,
            'bank_name' => 'DFCU',
            'basic_salary' => '1000000.00',
            'branch_address' => 'kampala',
            'business_email' => 'business@gmail.com',
            'business_phone' => '9865396954685',
            'cell_phone' => '385964994',
            'city_id' => 1,
            'contract_end_date' => '01-11-2022',
            'contract_start_date' => '01-01-2022',
            'country_id' => 6,
            'created_at' => '2022-09-12 10:48:28',
            'date_of_birth' => '09-07-1991',
            'department_id' => 2,
            'duty_type_id' => 2,
            'edu_award' => 'Diploma',
            'edu_awarding_date' => '2022-09-02',
            'edu_awarding_institution' => 'Makerere',
            'edu_class_of_award' => 'Second',
            'email' => 'admin@metadent.nl',
            'emergency_address' => 'kireka',
            'emergency_another_phone' => '45558',
            'emergency_home_phone' => '54688',
            'emergency_person_name' => 'Denis',
            'emergency_phone' => '56487568',
            'emergency_relationship' => 'brother',
            'emergency_work_phone' => '894330',
            'employee_type_id' => 6,
            'ethnic_group' => 'group one',
            'facility_id' => 1,
            'family' => 3,
            'first_name' => 'Hugo',
            'first_supervisor_id' => 1,
            'frequency_id' => 1,
            'gender' => 'male',
            'gross_salary' => '10000000.00',
            'hire_date' => '23-07-2022',
            'home_email' => 'home@gmail.com',
            'home_phone' => NULL,
            'id' => 3,
            'interval' => NULL,
            'last_name' => 'Van',
            'maiden_name' => 'Jokm',
            'marital_status' => 'married',
            'medical' => 100000,
            'middle_name' => NULL,
            'monthly_working_hours' => 732,
            'net_salary' => '1000.00',
            'others_in_benefits' => NULL,
            'password' => '$2y$10$dC5a0Wj7ppVy9HFNq7vXFeJmdQfMr9NCtAgFWmk7OdEIOWkVsej3W',
            'pay_frequency_id' => 1,
            'phone' => '9832458935',
            'photo_url' => NULL,
            'place_of_residence' => 'Katanga',
            'position_id' => 1,
            'rate' => 4,
            'rate_type' => 2,
            'reporting_to' => 1,
            'second_supervisor_id' => 4,
            'status' => NULL,
            'sub_department_id' => 1,
            'tin_number' => 'JKKHDJKF783489',
            'transport_allowance' => '120000.00',
            'transportation' => 10000,
            'updated_at' => '2022-09-12 10:50:18',
            'user_email' => 'andrew123@gmail.com',
            'week_days' => '[1, 2, 3, 4, 5, 6, 7]',
            'weeks' => '[1, 2, 3]',
            'work_in_city' => 'yes',
            'work_permitt' => 'yes',
            'zipcode' => '00256',
        ]);

        $user->assignRole('Doctor','Super-Admin');

        $doctor = Employee::create([
            'account_number' => '01255625688668',
            'alt_phone' => NULL,
            'alternative_phone' => NULL,
            'attendance_time_id' => 3,
            'availability' => '[{"days": [{"day": 2, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 3, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 5, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}], "week": 1}, {"days": [{"day": 2, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 3, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 5, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}], "week": 2}, {"days": [{"day": 2, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 3, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "13:00", "break_time": [{"end-time": "11:00", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 5, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}], "week": 3}, {"days": [{"day": 2, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 3, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 5, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}], "week": 4}]',
            'bank_ban_number' => 0,
            'bank_name' => 'DFCU',
            'basic_salary' => '1000000.00',
            'branch_address' => 'kampala',
            'business_email' => 'business@gmail.com',
            'business_phone' => '9865396954685',
            'cell_phone' => '385964994',
            'city_id' => 1,
            'contract_end_date' => '01-11-2022',
            'contract_start_date' => '01-01-2022',
            'country_id' => 6,
            'created_at' => '2022-09-12 10:49:10',
            'date_of_birth' => '09-07-1991',
            'department_id' => 2,
            'duty_type_id' => 2,
            'edu_award' => 'Diploma',
            'edu_awarding_date' => '2022-09-02',
            'edu_awarding_institution' => 'Makerere',
            'edu_class_of_award' => 'Second',
            'email' => 'hmuwonge@projectcode.ug',
            'emergency_address' => 'kireka',
            'emergency_another_phone' => '45558',
            'emergency_home_phone' => '54688',
            'emergency_person_name' => 'Denis',
            'emergency_phone' => '56487568',
            'emergency_relationship' => 'brother',
            'emergency_work_phone' => '894330',
            'employee_type_id' => 6,
            'ethnic_group' => 'group one',
            'facility_id' => 1,
            'family' => 3,
            'first_name' => 'Daan',
            'first_supervisor_id' => 1,
            'frequency_id' => 1,
            'gender' => 'male',
            'gross_salary' => '10000000.00',
            'hire_date' => '23-07-2022',
            'home_email' => 'home@gmail.com',
            'home_phone' => NULL,
            'id' => 4,
            'interval' => NULL,
            'last_name' => 'Van',
            'maiden_name' => 'Jokm',
            'marital_status' => 'married',
            'medical' => 100000,
            'middle_name' => NULL,
            'monthly_working_hours' => 732,
            'net_salary' => '1000.00',
            'others_in_benefits' => NULL,
            'password' => '$2y$10$8vkk27ni7.Qfnu3NQWwwE.tyfacY09y1vBg6cwiSkADDji46TKsRi',
            'pay_frequency_id' => 1,
            'phone' => '9832458935',
            'photo_url' => NULL,
            'place_of_residence' => 'Katanga',
            'position_id' => 1,
            'rate' => 4,
            'rate_type' => 2,
            'reporting_to' => 1,
            'second_supervisor_id' => 4,
            'status' => NULL,
            'sub_department_id' => 1,
            'tin_number' => 'JKKHDJKF783489',
            'transport_allowance' => '120000.00',
            'transportation' => 10000,
            'updated_at' => '2022-09-12 10:50:25',
            'user_email' => 'andrew123@gmail.com',
            'week_days' => '[1, 2, 3, 4, 5, 6, 7]',
            'weeks' => '[1, 2, 3]',
            'work_in_city' => 'yes',
            'work_permitt' => 'yes',
            'zipcode' => '00256',
        ]);

        $user->assignRole('Doctor','Super-Admin');

        Schema::enableForeignKeyConstraints();
    }
}
