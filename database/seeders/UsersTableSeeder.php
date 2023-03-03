<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed fileg
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'account_status_id' => 1,
                'address' => 'Kawaala',
                'availability' => '[{"days": [{"day": 2, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 3, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 5, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}], "week": 1}, {"days": [{"day": 2, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 3, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 5, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}], "week": 2}, {"days": [{"day": 2, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 3, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "13:00", "break_time": [{"end-time": "11:00", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 5, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}], "week": 3}, {"days": [{"day": 2, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 3, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 5, "end-time": "13:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}], "week": 4}]',
                'birth_date' => NULL,
                'contract_end_date' => '31-12-2022',
                'contract_start_date' => '01-01-2022',
                'created_at' => '2022-05-19 06:53:33',
                'deleted_at' => NULL,
                'department_id' => 1,
                'email' => 'admin@projectdental.nl',
                'email_verified_at' => NULL,
                'facility_id' => 1,
                'first_name' => 'Brandon',
                'frequency_id' => 2,
                'gender' => 'Male',
                'id' => 1,
                'interval' => 10,
                'last_name' => 'Wavamuno',
                'password' => '$2y$10$suuD73vZ2I7E/gdLGipo9ujMIcGgJcjDz9Jsj7N6VWOYpxjAwgn5a',
                'phonenumber' => '0753659098',
                'remember_token' => NULL,
                'role_id' => 3,
                'specializations' => NULL,
                'treatment_id' => '11,12,45,67,23,24',
                'updated_at' => '2022-05-19 06:53:33',
                'week_days' => '[2, 3, 4, 5]',
                'weeks' => '[1, 2, 3, 4]',
            ),
            1 =>
            array (
                'account_status_id' => 1,
                'address' => 'Kawaala',
                'availability' => '[{"days": [{"day": 1, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "09:00"}, {"day": 3, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "09:00"}, {"day": 5, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "09:00"}], "week": 1}, {"days": [{"day": 1, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "09:00"}, {"day": 3, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "09:00"}], "week": 2}, {"days": [{"day": 1, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "09:00"}, {"day": 3, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "09:00"}], "week": 3}, {"days": [{"day": 1, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "09:00"}, {"day": 3, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "08:00"}, {"day": 4, "end-time": "20:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "09:00"}], "week": 4}]',
                'birth_date' => NULL,
                'contract_end_date' => '31-12-2022',
                'contract_start_date' => '01-01-2022',
                'created_at' => '2022-05-19 06:53:33',
                'deleted_at' => NULL,
                'department_id' => 2,
                'email' => 'brandonelijah099@gmail.com',
                'email_verified_at' => NULL,
                'facility_id' => 1,
                'first_name' => 'Brandon3',
                'frequency_id' => 2,
                'gender' => 'Male',
                'id' => 2,
                'interval' => 10,
                'last_name' => 'Wavamuno3',
                'password' => '$2y$10$suuD73vZ2I7E/gdLGipo9ujMIcGgJcjDz9Jsj7N6VWOYpxjAwgn5a',
                'phonenumber' => '0753659098',
                'remember_token' => NULL,
                'role_id' => 1,
                'specializations' => NULL,
                'treatment_id' => '11,12,45,67,23,24',
                'updated_at' => '2022-05-19 06:53:33',
                'week_days' => '[1, 3, 4]',
                'weeks' => '[1, 2, 3, 4]',
            ),
            2 =>
            array (
                'account_status_id' => 1,
                'address' => 'Kawaala',
                'availability' => '[{"days": [{"day": 4, "end-time": "16:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "10:00"}, {"day": 5, "end-time": "16:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "10:00"}, {"day": 6, "end-time": "16:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "10:00"}], "week": 1}, {"days": [{"day": 4, "end-time": "16:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "10:00"}, {"day": 5, "end-time": "16:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "10:00"}, {"day": 6, "end-time": "16:00", "break_time": [{"end-time": "10:30", "start-time": "10:00"}, {"end-time": "14:00", "start-time": "13:00"}], "start-time": "10:00"}], "week": 3}]',
                'birth_date' => NULL,
                'contract_end_date' => '31-12-2022',
                'contract_start_date' => '01-03-2022',
                'created_at' => '2022-05-19 06:53:33',
                'deleted_at' => NULL,
                'department_id' => 3,
                'email' => 'admin@norvikhospital.ug',
                'email_verified_at' => NULL,
                'facility_id' => 2,
                'first_name' => 'Brandon',
                'frequency_id' => 2,
                'gender' => 'Male',
                'id' => 3,
                'interval' => 10,
                'last_name' => 'Wavamuno',
                'password' => '$2y$10$suuD73vZ2I7E/gdLGipo9ujMIcGgJcjDz9Jsj7N6VWOYpxjAwgn5a',
                'phonenumber' => '0753659098',
                'remember_token' => NULL,
                'role_id' => 1,
                'specializations' => NULL,
                'treatment_id' => '20,29',
                'updated_at' => '2022-05-19 06:53:33',
                'week_days' => '[4, 5, 6]',
                'weeks' => '[1, 3]',
            ),
        ));


    }
}
