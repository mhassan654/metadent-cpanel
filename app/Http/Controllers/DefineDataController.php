<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DefineDataController extends Controller
{
    public function define_users(){

        $password = Hash::make("password");
        $faker = Faker::create('en_UG');
        $genders = ["Male", "Female"];

       $user = User::create([
            "first_name" => "Mariate",
            "last_name" => "Ndagire",
            "birth_date" => null,
            "gender" => "Female",
            "address" => "Kasubi",
            "phonenumber" => "0753659058",
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => 'mndagire@projectcode.ug',
            "week_days" => [1,3,4,5],
            "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-01-2022',
            "contract_end_date" => '31-07-2022',
            "frequency_id" => 2,
            "interval" => 25,
            "weeks" => [1,2,3,4],
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
            ]
        ]);

        $user->assignRole('Doctor');
        $user->assignRole('Front-Office');

        $user2 = User::create([
            "first_name" => "Ismail",
            "last_name" => "Asegga",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Kisasi",
            "phonenumber" => "0753659098",
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => 'idasega@projectcode.ug',
            "week_days" => [1,3,4,5],
            "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-05-2022',
            "contract_end_date" => '31-12-2022',
            "frequency_id" => 2,
            "interval" => 10,
            "weeks" => [1,2,3,4],
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
            ]
        ]);
        $user2->assignRole('Doctor');
        $user2->assignRole('Super-Admin');

       $user3 = User::create([
            "first_name" => "Muwonge",
            "last_name" => "Hassan",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Kawempe",
            "phonenumber" => "0753659098",
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => 'hmuwonge@projectcode.ug',
            "week_days" => [1,3,4,5],
           "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-06-2022',
            "contract_end_date" => '31-12-2022',
            "frequency_id" => 2,
            "interval" => 10,
            "weeks" => [1,2,3,4],
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
            ]
        ]);
        $user3->assignRole('Finance');
        $user3->assignRole('Super-Admin');

        $user4 = User::create([
            "first_name" => "Benjamin",
            "last_name" => "Kooma",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Kasangati",
            "phonenumber" => "0753659098",
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => 'bkooma@projectcode.ug',
            "week_days" => [1,3,4,5],
           "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-06-2022',
            "contract_end_date" => '31-12-2022',
            "frequency_id" => 2,
            "interval" => 10,
            "weeks" => [1,2,3,4],
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
            ]
        ]);
        $user4->assignRole('Doctor');
        $user4->assignRole('Super-Admin');

        $user5 = User::create([
            "first_name" => "Andrew",
            "last_name" => "Onyango",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Dutch",
            "phonenumber" => "0753659098",
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => 'aonyango@projectcode.ug',
            "week_days" => [1,3,4,5],
            "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-06-2022',
            "contract_end_date" => '31-12-2022',
            "frequency_id" => 2,
            "interval" => 10,
            "weeks" => [1,2,3,4],
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
            ]
        ]);
        $user5->assignRole('Doctor');
        $user5->assignRole('Super-Admin');

        $user6 = User::create([
            "first_name" => "Denis",
            "last_name" => "Mulindwa",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Dutch",
            "phonenumber" => "0753659098",
            "role_id" => 1,
            "account_status_id" => 1,
            "facility_id" => 2,
            "specializations" => null,
            "password" => $password,
            "email" => 'DMulindwa@projectcode.ug',
            "week_days" => [1,3,4,5],
            "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-06-2022',
            "contract_end_date" => '31-12-2022',
            "frequency_id" => 2,
            "interval" => 10,
            "weeks" => [1,2,3,4],
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
            ]
        ]);
        $user6->assignRole('Doctor');

        $user7 = User::create([
            "first_name" => "Robert",
            "last_name" => "Omeny",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Dutch",
            "phonenumber" => "0753659098",
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => 'ROmeny@projectcode.ug',
            "week_days" => [1,3,4,5],
            "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-06-2022',
            "contract_end_date" => '31-12-2022',
            "frequency_id" => 2,
            "interval" => 10,
            "weeks" => [1,2,3,4],
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
            ]
        ]);
        $user7->assignRole('Doctor');

        $user8 = User::create([
            "first_name" => "Samuel",
            "last_name" => "Lubowa",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Dutch",
            "phonenumber" => "0753659098",
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => 'slubowa@projectcode.ug',
            "week_days" => [1,3,4,5],
            "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-06-2022',
            "contract_end_date" => '31-12-2022',
            "frequency_id" => 2,
            "interval" => 10,
            "weeks" => [1,2,3,4],
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
            ]
        ]);
        $user8->assignRole('Super-Admin');

        $user9 = User::create([
            "first_name" => "Nobert",
            "last_name" => "Luwayi",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Dutch",
            "phonenumber" => "0753659098",
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => 'nlukwayi@projectcode.ug',
            "week_days" => [1,3,4,5],
            "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-06-2022',
            "contract_end_date" => '31-12-2022',
            "frequency_id" => 2,
            "interval" => 10,
            "weeks" => [1,2,3,4],
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
            ]
        ]);
        $user9->assignRole('Super-Admin');

        $user10 = User::create([
            "first_name" => "Henry",
            "last_name" => "Assimwe",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Dutch",
            "phonenumber" => "0753659098",
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => 'hndyabagye@projectcode.ug',
            "week_days" => [1,3,4,5],
            "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-06-2022',
            "contract_end_date" => '31-12-2022',
            "frequency_id" => 2,
            "interval" => 10,
            "weeks" => [1,2,3,4],
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
            ]
        ]);
        $user10->assignRole('Super-Admin');

        $user11 = User::create([
            "first_name" => "Ola",
            "last_name" => "Assimwe",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Dutch",
            "phonenumber" => "0753659098",
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => 'oasiimwe@projectcode.ug',
            "week_days" => [1,3,4,5],
            "treatment_id" => '11,12,45,67,23,24',
            "contract_start_date" => '01-06-2022',
            "contract_end_date" => '31-12-2022',
            "frequency_id" => 2,
            "interval" => 10,
            "weeks" => [1,2,3,4],
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
            ]
        ]);
        $user11->assignRole('Doctor');

        return response()->json('Done Successfully',200);

    }
}
