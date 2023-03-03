<?php
/*
 *
 * @Author: Wavamuno Brandon Elijah
 * @Email: brandonelijah099@gmail.com
 * @Github: Elijahwb
 * @Tel: +256 753 659 098 / +256 770 944 854
 *
 */

namespace Database\Seeders;

//use App\Models\Role;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make("password");
        $faker = Faker::create('en_UG');
        $genders = ["Male", "Female"];

        $role = Role::findByName('Doctor');
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        $user = User::create([
            "first_name" => "Hugo",
            "last_name" => "Jan",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Utrecht",
            "phonenumber" => "+03153659098",
            "role_id" => 3,
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => "admin@metadent.nl",
            "week_days" => [2, 3, 4, 5],
            "weeks" => [1, 2, 3, 4],
            "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-01-2022',
            "contract_end_date" => '31-12-2022',
            "frequency_id" => 2,
            "interval" => 10,
            "availability" => [
                [
                    'week' => 1,
                    'days' => [
                        [
                            'day' => 2,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 3,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 4,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 5,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'week' => 2,
                    'days' => [
                        [
                            'day' => 2,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 3,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 4,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 5,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'week' => 3,
                    'days' => [
                        [
                            'day' => 2,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 3,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 4,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '11:00',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 5,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'week' => 4,
                    'days' => [
                        [
                            'day' => 2,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 3,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 4,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 5,
                            'start-time' => '08:00',
                            'end-time' => '13:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);

        $user->assignRole('Doctor', 'Super-Admin');

        $doctor = User::create([
            "first_name" => "Daan",
            "last_name" => "Daley",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Rotterdam",
            "phonenumber" => "+03153659098",
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => 'doctor@metadent.nl',
            "week_days" => [1, 3, 4, 5],
            "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-06-2022',
            "contract_end_date" => '31-12-2022',
            "frequency_id" => 2,
            "interval" => 10,
            "weeks" => [1, 2, 3, 4],
            "availability" => [
                [
                    'week' => 1,
                    'days' => [
                        [
                            'day' => 1,
                            'start-time' => '09:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 3,
                            'start-time' => '08:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 4,
                            'start-time' => '09:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 5,
                            'start-time' => '09:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'week' => 2,
                    'days' => [
                        [
                            'day' => 1,
                            'start-time' => '09:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 3,
                            'start-time' => '08:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 4,
                            'start-time' => '09:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 5,
                            'start-time' => '09:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'week' => 3,
                    'days' => [
                        [
                            'day' => 1,
                            'start-time' => '09:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 3,
                            'start-time' => '08:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 4,
                            'start-time' => '09:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 5,
                            'start-time' => '09:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'week' => 4,
                    'days' => [
                        [
                            'day' => 1,
                            'start-time' => '09:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 3,
                            'start-time' => '08:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 4,
                            'start-time' => '09:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                        [
                            'day' => 5,
                            'start-time' => '09:00',
                            'end-time' => '15:00',
                            'break_time' => [
                                [
                                    'start-time' => '10:00',
                                    'end-time' => '10:30',
                                ],
                                [
                                    'start-time' => '13:00',
                                    'end-time' => '14:00',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
        $doctor->assignRole('Doctor');

    }
}
