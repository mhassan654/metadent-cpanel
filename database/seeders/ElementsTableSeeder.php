<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ElementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('elements')->delete();
        
        \DB::table('elements')->insert(array (
            0 => 
            array (
                'id' => 1,
                'label' => 'Dashboard',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'dashboard_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'label' => 'Doctor',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'doctor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'label' => 'Front Office',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'front_office_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'label' => 'Patients',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'patients_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'label' => 'Calendar',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'calendar_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'label' => 'Billing',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'billing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'label' => 'Reports',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'reports_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'label' => 'Insurance',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'insurance_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'label' => 'Imaging',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'imaging_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'label' => 'Human Resources',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'human_resources_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'label' => 'Settings',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'label' => 'Logout',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'logout_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'label' => 'Total Patients',
                'view_id' => 2,
                'icon' => '',
                'slug' => 'total_patients_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'label' => 'Expected Patients Today',
                'view_id' => 2,
                'icon' => '',
                'slug' => 'expected_patients_today_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'label' => 'Outstanding Invoices',
                'view_id' => 2,
                'icon' => '',
                'slug' => 'outstanding_invoices_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'label' => 'Completed Appointments',
                'view_id' => 2,
                'icon' => '',
                'slug' => 'completed_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'label' => 'Appointments Calendar',
                'view_id' => 2,
                'icon' => '',
                'slug' => 'appointments_calendar_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'label' => 'Upcoming Appointments',
                'view_id' => 2,
                'icon' => '',
                'slug' => 'upcoming_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'label' => 'Search by keyword',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'search_by_keyword_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'label' => 'Department',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'label' => 'Appointment Type',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'appointment_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'label' => 'Assigned To',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'assigned_to_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'label' => 'New Appointment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'new_appointment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'label' => 'Upcoming',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'upcoming_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'label' => 'Waiting',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'waiting_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'label' => 'Serving',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'serving_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'label' => 'Completed',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'completed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'label' => 'Check in',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'check_in_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'label' => 'My Queue',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'my_queue_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'label' => 'My Tasks',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'my_tasks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'label' => 'Missing value',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'missing_value_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'label' => 'Guest',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'guest_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'label' => 'Serving',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'serving_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'label' => 'Reason',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'reason_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'label' => 'Timeline',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'timeline_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'label' => 'RETURN TO QUEUE',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'return_to_queue_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'label' => 'FINISH',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'finish_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'label' => 'Daily Queue',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'daily_queue_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'label' => 'Doctor Schedule',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'doctor_schedule_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'label' => 'Waiting List',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'waiting_list_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'label' => 'Open',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'open_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'label' => 'Cancel',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'cancel_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'label' => 'Reschedule',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'reschedule_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'label' => 'State',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'state_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'label' => 'SCHEDULING ASSISTANT',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'scheduling_assistant_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'label' => 'Patient Appointment',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'patient_appointment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'label' => 'Select Patient',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'select_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'label' => 'Main Doctor',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'main_doctor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'label' => 'Select Treatment',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'select_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'label' => 'Select Type',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'select_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'label' => 'Add required doctors',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'add_required_doctors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'label' => 'Other attendees',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'other_attendees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'label' => 'Start',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'start_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'label' => 'End',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'end_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
            'label' => 'Technical Work (TW)',
                'view_id' => 4,
                'icon' => '',
            'slug' => 'technical_work_(tw)_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'label' => 'Yes',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'yes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'label' => 'No',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'no_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'label' => 'Select Frequency',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'select_frequency_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'label' => 'occurs every',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'occurs_every_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'label' => 'Assigned To',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'assigned_to_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'label' => 'Patient',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'label' => 'Treatment',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
            'label' => 'Doctor(s)',
                'view_id' => 4,
                'icon' => '',
            'slug' => 'doctor(s)_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'label' => 'Department',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'label' => 'Appointment Id',
                'view_id' => 4,
                'icon' => '',
                'slug' => 'appointment_id_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'label' => 'Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'label' => 'Day',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'day_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'label' => 'Days',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'days_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'label' => 'Today',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'today_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'label' => 'Week',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'week_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'label' => 'Work Week',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'work_week_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'label' => 'Weeks',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'weeks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'label' => 'Month',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'month_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'label' => 'Months',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'months_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'label' => 'Year',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'year_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'label' => 'Years',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'years_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'label' => 'Patient',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'label' => 'Patients',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patients_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'label' => 'Doctor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'doctor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'label' => 'Doctors',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'doctors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'label' => 'Treatment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'label' => 'Treatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'label' => 'Appointment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'appointment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'label' => 'Appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'label' => 'Calendar',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'calendar_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'label' => 'Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'label' => 'Address',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'label' => 'Reset',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'reset_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'label' => 'Cancel',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'cancel_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'label' => 'Save',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'save_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'label' => 'CONFIGURATIONS',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'configurations_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'label' => 'Address',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'label' => 'My Dashboard',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'my_dashboard_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'label' => 'Audio switched off',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'audio_switched_off_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'label' => 'Schedule',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'schedule_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'label' => 'Waiting Room',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'waiting_room_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'label' => 'Appointment for',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'appointment_for_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'label' => 'Chart',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'chart_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'label' => 'Perio',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'perio_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'label' => 'Imaging',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'imaging_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'label' => 'History',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'history_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'label' => 'Billing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'billing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'label' => 'Care Plan',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'care_plan_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'label' => 'Treatment Plan',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'treatment_plan_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'label' => 'DOB',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'dob_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'label' => 'Gender',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'gender_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'label' => 'Appointment Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'appointment_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'label' => 'Appointment Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'appointment_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'label' => 'Appointment Slots',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'appointment_slots_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'label' => 'ACTIVITY',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'activity_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'label' => 'Patient checked in',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_checked_in_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'label' => 'Serving begun',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'serving_begun_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'label' => 'Endo',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'endo_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'label' => 'Dental',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'dental_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'label' => 'PPS',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'pps_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'label' => 'General',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'general_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'label' => 'Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'label' => 'Description',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'description_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'label' => 'Tooth',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'tooth_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'label' => 'Action',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'action_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'label' => 'Patient has not treatment plan',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'patient_has_not_treatment_plan_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'label' => 'Vektis',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'vektis_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'label' => 'Full',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'full_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'label' => 'PRINT',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'print_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'label' => 'Mobility',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'mobility_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'label' => 'Furcation',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'furcation_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'label' => 'Implant',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'implant_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'label' => 'Bleeding on Probing',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'bleeding_on_probing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'label' => 'Plaque',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'plaque_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'label' => 'Gingival Margin',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'gingival_margin_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'label' => 'Probing Depth',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'probing_depth_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'label' => 'Buccal',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'buccal_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'label' => 'Comments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'comments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'label' => 'Treatment Information',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'treatment_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'label' => 'Dental Anamnese',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'dental_anamnese_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'label' => 'Risk assesment history',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'risk_assesment_history_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'label' => 'By',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'by_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'label' => 'No risk assement available for',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'no_risk_assement_available_for_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
                'label' => 'Dental questions',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'dental_questions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'label' => 'Are you having dental pain or discomfort',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'are_you_having_dental_pain_or_discomfort_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'label' => 'Are your teeth sensitive to heat, cold, or pressure',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'are_your_teeth_sensitive_to_heat,_cold,_or_pressure_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'label' => 'Do your gums bleed while brushing or flossing',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'do_your_gums_bleed_while_brushing_or_flossing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'label' => 'How often do you brush? Floss',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'how_often_do_you_brush?_floss_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'label' => 'Do you use an electric toothbrush',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'do_you_use_an_electric_toothbrush_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'label' => 'Do you clench or grind your teeth',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'do_you_clench_or_grind_your_teeth_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'label' => 'Have you ever had orthodontic treatment/braces',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'have_you_ever_had_orthodontic_treatment/braces_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'label' => 'Do you wear removable dentures or partials If so how old are they',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'do_you_wear_removable_dentures_or_partials_if_so_how_old_are_they_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'label' => 'Do you wish your teeth looked better',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'do_you_wish_your_teeth_looked_better_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'label' => 'Do you use anti-anxiety medications or nitrous oxide laughing gas for dental visits',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'do_you_use_anti-anxiety_medications_or_nitrous_oxide_laughing_gas_for_dental_visits_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'label' => 'Have you ever experienced any of the following problems with your jaw',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'have_you_ever_experienced_any_of_the_following_problems_with_your_jaw_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'label' => 'Noise/Popping_pain',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'noise/popping_pain_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
                'label' => 'Difficult Chewing',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'difficult_chewing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
                'label' => 'Locking',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'locking_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
                'label' => 'Headaches',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'headaches_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'label' => 'Have you seen other dental specialists',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'have_you_seen_other_dental_specialists_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'label' => 'None',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'none_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'label' => 'Periodontist',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'periodontist_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
                'label' => 'Prosthodontist',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'prosthodontist_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
                'label' => 'Orthodontist',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'orthodontist_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
                'label' => 'Oral Surgeon',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'oral_surgeon_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'label' => 'Endodontist',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'endodontist_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'label' => 'Appointments chart',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'appointments_chart_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'label' => 'Back',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'back_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
                'label' => 'TREAT',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'treat_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'label' => 'MONITOR',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'monitor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'label' => 'PLANNED',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'planned_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'label' => 'HISTORY',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'history_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'label' => 'MISSING',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'missing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'label' => 'RESTORATION',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'restoration_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'label' => 'DONE',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'done_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'label' => 'areas diagnosed',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'areas_diagnosed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'label' => 'areas diagnosed',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'areas_diagnosed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'label' => 'details',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'details_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'label' => 'delete',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'delete_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
                'label' => 'Endodontic',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'endodontic_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'label' => 'Summaries',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'summaries_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'label' => 'No data recorded',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'no_data_recorded_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
                'label' => 'Cold',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'cold_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'label' => 'Cold Test',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'cold_test_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
                'label' => 'Percussion',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'percussion_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'label' => 'Percussion Test',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'percussion_test_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'label' => 'Palpation',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'palpation_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'label' => 'Palpation Test',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'palpation_test_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
                'label' => 'Heat',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'heat_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
                'label' => 'Heat Test',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'heat_test_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
                'label' => 'Electricity',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'electricity_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
                'label' => 'Electricity Test',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'electricity_test_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
                'label' => 'Clear',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'clear_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
                'label' => 'No treatments available',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'no_treatments_available_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
                'label' => 'Loading treatments',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'loading_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
                'label' => 'Tooth Selectable Surfaces',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'tooth_selectable_surfaces_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
                'label' => 'Selectable Restoration Procedures',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'selectable_restoration_procedures_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
                'label' => 'You need to select a Restoration Procedure to activate tooth surfaces and proceed with the Tooth Surface Selection',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'you_need_to_select_a_restoration_procedure_to_activate_tooth_surfaces_and_proceed_with_the_tooth_surface_selection_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'label' => 'Filling',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'filling_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'label' => 'Partial Crown',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'partial_crown_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'label' => 'Crown',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'crown_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'label' => 'Bridges',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'bridges_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'label' => 'Treatment Cost',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'treatment_cost_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'label' => 'Technical Cost',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'technical_cost_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'label' => 'Total Cost',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'total_cost_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
                'label' => 'Filling Treatments',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'filling_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
                'label' => 'Select treatment',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'select_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'label' => 'Filling Material',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'filling_material_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 204,
                'label' => 'Composite',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'composite_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'label' => 'Amalgam',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'amalgam_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'label' => 'Glasionomer',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'glasionomer_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'label' => 'Composite Types',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'composite_types_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 208,
                'label' => 'Composite Type',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'composite_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 209,
                'label' => 'Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 210,
                'label' => 'Type Name',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'type_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 211,
                'label' => 'Adhesive',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'adhesive_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 212,
                'label' => 'Adhesive Types',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'adhesive_types_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 213,
                'label' => 'Adhesive Type',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'adhesive_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 214,
                'label' => 'Colors',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'colors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 215,
                'label' => 'No Patients are in the waiting room',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'no_patients_are_in_the_waiting_room_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 216,
                'label' => 'hrs',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'hrs_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 217,
                'label' => 'mins',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mins_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 218,
                'label' => 'Checkin Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'checkin_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 219,
                'label' => 'Waiting Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'waiting_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 220,
                'label' => 'Hello',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'hello_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 221,
                'label' => 'You have no checked in appointments today',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'you_have_no_checked_in_appointments_today_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 222,
                'label' => 'Please click on patient card in waiting room to view details and call-in patient',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'please_click_on_patient_card_in_waiting_room_to_view_details_and_call-in_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 223,
                'label' => 'or',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'or_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 224,
                'label' => 'Simply click on button below to call next',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'simply_click_on_button_below_to_call_next_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 225,
                'label' => 'Loading',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 226,
                'label' => 'Treatment Already Listed',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'treatment_already_listed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 227,
                'label' => 'Upper Jaw',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'upper_jaw_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 228,
                'label' => 'Lower Jaw',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'lower_jaw_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 229,
                'label' => 'Selected Tooth',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'selected_tooth_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 230,
                'label' => 'No Treatment Found',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'no_treatment_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 231,
                'label' => 'Selected Treatments',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'selected_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 232,
                'label' => 'Comment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'comment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 233,
                'label' => 'Select treatments to proceed',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'select_treatments_to_proceed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 234,
                'label' => 'Invoice',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'invoice_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 235,
                'label' => 'No',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 236,
                'label' => 'Service',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'service_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 237,
                'label' => 'Price',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'price_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 238,
                'label' => 'Areas received',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'areas_received_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 239,
                'label' => 'No Data',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_data_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 240,
                'label' => 'Grand Total',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'grand_total_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 241,
                'label' => 'Save & Checkout',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'save_&_checkout_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 242,
                'label' => 'Billed',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'billed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 243,
                'label' => 'Saving',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'saving_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 244,
                'label' => 'Examined',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'examined_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 245,
                'label' => 'Treated',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'treated_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 246,
                'label' => 'Prices',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'prices_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 247,
                'label' => 'Payment Status',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'payment_status_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 248,
                'label' => 'Performed By',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'performed_by_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 249,
                'label' => 'Created At',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'created_at_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 250,
                'label' => 'Updated On',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'updated_on_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 251,
                'label' => 'Test',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'test_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 252,
                'label' => 'Results',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'results_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 253,
                'label' => 'Range',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'range_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 254,
                'label' => 'Positive',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'positive_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 255,
                'label' => 'Negative',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'negative_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 256,
                'label' => 'Uncertain',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'uncertain_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 257,
                'label' => 'Not-application',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'not-application_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 258,
                'label' => 'Within limits',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'within_limits_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 259,
                'label' => 'Unpleasant',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'unpleasant_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 260,
                'label' => 'Pain Stimulus',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'pain_stimulus_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 261,
                'label' => 'Pain Lingering',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'pain_lingering_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 262,
                'label' => 'Existing root canal treatment',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'existing_root_canal_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 263,
                'label' => 'Previously initiated therapy',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'previously_initiated_therapy_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 264,
                'label' => 'Materials',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'materials_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 265,
                'label' => 'Partial Crown Materials',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'partial_crown_materials_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 266,
                'label' => 'You need to select atleast',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'you_need_to_select_atleast_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 267,
            'label' => '4 (FOUR)',
                'view_id' => 7,
                'icon' => '',
            'slug' => '4_(four)_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 268,
                'label' => 'tooth surfaces to proceed with the',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'tooth_surfaces_to_proceed_with_the_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 269,
                'label' => 'Procedures',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'procedures_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 270,
                'label' => 'Metal',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'metal_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 271,
                'label' => 'Porcelain',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'porcelain_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 272,
                'label' => 'Lithiumdicilicaat Material',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'lithiumdicilicaat_material_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 273,
                'label' => 'Ziroconia Material',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'ziroconia_material_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 274,
                'label' => 'Jaw',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'jaw_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 275,
                'label' => 'Sections',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'sections_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 276,
                'label' => 'Material',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'material_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 277,
                'label' => 'CONFIGURE',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'configure_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 278,
                'label' => 'No Composite Types',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'no_composite_types_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 279,
                'label' => 'Click on configure to add Composite types',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'click_on_configure_to_add_composite_types_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 280,
                'label' => 'Glasionomer',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'glasionomer_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 281,
                'label' => 'No Adhesive Types',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'no_adhesive_types_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 282,
                'label' => 'Options',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'options_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 283,
                'label' => 'Bridge Connectors',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'bridge_connectors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 284,
                'label' => 'Bridge connector not found.',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'bridge_connector_not_found._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 285,
                'label' => 'Bridge',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'bridge_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 286,
                'label' => 'Additional',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'additional_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 287,
                'label' => 'PLAN',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'plan_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 288,
                'label' => 'No options',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'no_options_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 289,
                'label' => 'Click on configure to add options.',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'click_on_configure_to_add_options._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 290,
                'label' => 'Enable Notifications.',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'enable_notifications._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 291,
                'label' => 'Add Configurations',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_configurations_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 292,
                'label' => 'View Configurations',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_configurations_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 293,
                'label' => 'Configure your preferrect teeth quadrant sequence.',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'configure_your_preferrect_teeth_quadrant_sequence._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 294,
                'label' => 'Arrangement',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'arrangement_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 295,
                'label' => 'Order',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'order_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 296,
                'label' => 'Available perio-chart quadrant sequence',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'available_perio-chart_quadrant_sequence_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 297,
                'label' => 'Orders',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'orders_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 298,
                'label' => 'Please be sure to select the four quadrants in a preferred sequence before hitting SAVE.',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'please_be_sure_to_select_the_four_quadrants_in_a_preferred_sequence_before_hitting_save._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 299,
                'label' => 'Please be sure to enter the name pf the sequence before hitting SAVE.',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'please_be_sure_to_enter_the_name_pf_the_sequence_before_hitting_save._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 300,
                'label' => 'Are you sure ?',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'are_you_sure_?_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 301,
                'label' => 'you won\'t be able to revert this action after confirming.',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'you_won\'t_be_able_to_revert_this_action_after_confirming._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 302,
                'label' => 'Yes, Proceed',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'yes,_proceed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 303,
                'label' => 'No, Cancel',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no,_cancel_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 304,
                'label' => 'warning',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'warning_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 305,
                'label' => 'error',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'error_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 306,
                'label' => 'success',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'success_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 307,
                'label' => 'Action performed successfully.',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'action_performed_successfully._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 308,
                'label' => 'Something went wrong, please contact Support.',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'something_went_wrong,_please_contact_support._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 309,
                'label' => 'Action cancelled.',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'action_cancelled._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 310,
                'label' => 'Lingual',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'lingual_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 311,
                'label' => 'Category',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'category_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 312,
                'label' => 'General Category',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'general_category_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 313,
                'label' => 'Tooth Element',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'tooth_element_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 314,
                'label' => 'Update',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 315,
                'label' => 'Updating',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'updating_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 316,
                'label' => 'Amount',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'amount_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 317,
                'label' => 'Treatment Status',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'treatment_status_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 318,
                'label' => 'Add General Notes',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_general_notes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 319,
                'label' => 'Select a category',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_a_category_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 320,
                'label' => 'Select a tooth',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_a_tooth_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 321,
                'label' => 'General Notes',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'general_notes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 322,
                'label' => 'Diagnosis',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'diagnosis_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 323,
                'label' => 'Other',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'other_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 324,
                'label' => 'Please enter the general remark description.',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'please_enter_the_general_remark_description._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 325,
                'label' => 'Periodic Periodontal Screening [PPS]',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'periodic_periodontal_screening_[pps]_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 326,
                'label' => 'Click to add',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'click_to_add_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 327,
                'label' => 'New',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'new_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 328,
                'label' => 'Assessment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'assessment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 329,
                'label' => 'Review',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'review_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 330,
                'label' => 'Risk Assessment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'risk_assessment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 331,
                'label' => 'Recommended Treatment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'recommended_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 332,
                'label' => 'Right',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'right_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 333,
                'label' => 'Left',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'left_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 334,
                'label' => 'Previous',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'previous_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 335,
                'label' => 'Next',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'next_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 336,
                'label' => 'Value',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'value_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 337,
                'label' => 'Lower',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'lower_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 338,
                'label' => 'Upper',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'upper_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 339,
                'label' => 'Notes',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'notes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 340,
                'label' => 'No pps data found as per last the appointment.',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_pps_data_found_as_per_last_the_appointment._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 341,
                'label' => 'Recommended Assessment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'recommended_assessment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 342,
                'label' => 'Close',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'close_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 343,
                'label' => 'Xray Details',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'xray_details_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 344,
                'label' => 'Appointment Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'appointment_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 345,
                'label' => 'No risk assesment history',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_risk_assesment_history_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 346,
                'label' => 'Yes',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'yes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 => 
            array (
                'id' => 347,
                'label' => 'Pathology',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'pathology_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 => 
            array (
                'id' => 348,
                'label' => 'Periodontics',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'periodontics_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 => 
            array (
                'id' => 349,
                'label' => 'Present',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'present_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            349 => 
            array (
                'id' => 350,
                'label' => 'Not Present',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'not_present_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            350 => 
            array (
                'id' => 351,
                'label' => 'Missing Teeth',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'missing_teeth_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            351 => 
            array (
                'id' => 352,
                'label' => 'Data',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'data_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            352 => 
            array (
                'id' => 353,
                'label' => 'Data',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'data_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            353 => 
            array (
                'id' => 354,
                'label' => 'Invoice Payment Chart',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'invoice_payment_chart_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            354 => 
            array (
                'id' => 355,
                'label' => 'Status',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'status_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            355 => 
            array (
                'id' => 356,
                'label' => 'Recent Invoices',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'recent_invoices_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            356 => 
            array (
                'id' => 357,
                'label' => 'Sending',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'sending_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            357 => 
            array (
                'id' => 358,
                'label' => 'Services',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'services_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            358 => 
            array (
                'id' => 359,
                'label' => 'All Invoices',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'all_invoices_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            359 => 
            array (
                'id' => 360,
                'label' => 'Paid Bills',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'paid_bills_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            360 => 
            array (
                'id' => 361,
                'label' => 'Unpaid Bills',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'unpaid_bills_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            361 => 
            array (
                'id' => 362,
                'label' => 'Private Bills',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'private_bills_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            362 => 
            array (
                'id' => 363,
                'label' => 'Insurance Bills',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'insurance_bills_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            363 => 
            array (
                'id' => 364,
                'label' => 'Pending Appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'pending_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            364 => 
            array (
                'id' => 365,
                'label' => 'Reschedule Appointment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'reschedule_appointment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            365 => 
            array (
                'id' => 366,
                'label' => 'Open',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'open_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            366 => 
            array (
                'id' => 367,
                'label' => 'Pie Charts',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'pie_charts_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            367 => 
            array (
                'id' => 368,
                'label' => 'Start',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'start_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            368 => 
            array (
                'id' => 369,
                'label' => 'End',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'end_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            369 => 
            array (
                'id' => 370,
                'label' => 'Interval',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'interval_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            370 => 
            array (
                'id' => 371,
                'label' => 'Next available date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'next_available_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            371 => 
            array (
                'id' => 372,
                'label' => 'Suggestions',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'suggestions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            372 => 
            array (
                'id' => 373,
                'label' => 'Show Suggestions',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'show_suggestions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            373 => 
            array (
                'id' => 374,
                'label' => 'Suggestions for',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'suggestions_for_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            374 => 
            array (
                'id' => 375,
                'label' => 'Period',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'period_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            375 => 
            array (
                'id' => 376,
                'label' => 'Ongoing Appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'ongoing_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            376 => 
            array (
                'id' => 377,
                'label' => 'Serving',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'serving_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            377 => 
            array (
                'id' => 378,
                'label' => 'Timeline',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'timeline_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            378 => 
            array (
                'id' => 379,
                'label' => 'Checked in',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'checked_in_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            379 => 
            array (
                'id' => 380,
                'label' => 'Served At',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'served_at_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            380 => 
            array (
                'id' => 381,
                'label' => 'Source',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'source_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            381 => 
            array (
                'id' => 382,
                'label' => 'Reason',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'reason_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            382 => 
            array (
                'id' => 383,
                'label' => 'Employees',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'employees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            383 => 
            array (
                'id' => 384,
                'label' => 'Leave',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'leave_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            384 => 
            array (
                'id' => 385,
                'label' => 'Attendance',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'attendance_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            385 => 
            array (
                'id' => 386,
                'label' => 'Departments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'departments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            386 => 
            array (
                'id' => 387,
                'label' => 'Supervisor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'supervisor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            387 => 
            array (
                'id' => 388,
                'label' => 'Employee attendance',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'employee_attendance_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            388 => 
            array (
                'id' => 389,
                'label' => 'View All',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_all_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            389 => 
            array (
                'id' => 390,
                'label' => 'Employee',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'employee_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            390 => 
            array (
                'id' => 391,
                'label' => 'Start Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'start_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            391 => 
            array (
                'id' => 392,
                'label' => 'End Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'end_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            392 => 
            array (
                'id' => 393,
                'label' => 'Leave Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'leave_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            393 => 
            array (
                'id' => 394,
                'label' => 'Add Attendance Times',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_attendance_times_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            394 => 
            array (
                'id' => 395,
                'label' => 'Attendance Times',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'attendance_times_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            395 => 
            array (
                'id' => 396,
                'label' => 'Attendance Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'attendance_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            396 => 
            array (
                'id' => 397,
                'label' => 'Start Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'start_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            397 => 
            array (
                'id' => 398,
                'label' => 'End Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'end_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            398 => 
            array (
                'id' => 399,
                'label' => 'Full Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'full_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            399 => 
            array (
                'id' => 400,
                'label' => 'Sub Departments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'sub_departments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            400 => 
            array (
                'id' => 401,
                'label' => 'Department Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'department_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            401 => 
            array (
                'id' => 402,
                'label' => 'Add Department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            402 => 
            array (
                'id' => 403,
                'label' => 'View Department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            403 => 
            array (
                'id' => 404,
                'label' => 'Edit Department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            404 => 
            array (
                'id' => 405,
                'label' => 'View Departments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_departments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            405 => 
            array (
                'id' => 406,
                'label' => 'Update Department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            406 => 
            array (
                'id' => 407,
                'label' => 'Employee Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'employee_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            407 => 
            array (
                'id' => 408,
                'label' => 'Add Employee',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_employee_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            408 => 
            array (
                'id' => 409,
                'label' => 'View Employee',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_employee_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            409 => 
            array (
                'id' => 410,
                'label' => 'Edit Employee',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_employee_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            410 => 
            array (
                'id' => 411,
                'label' => 'View Employees',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_employees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            411 => 
            array (
                'id' => 412,
                'label' => 'Update Employee',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_employee_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            412 => 
            array (
                'id' => 413,
                'label' => 'First Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'first_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            413 => 
            array (
                'id' => 414,
                'label' => 'Last Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'last_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            414 => 
            array (
                'id' => 415,
                'label' => 'Middle Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'middle_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            415 => 
            array (
                'id' => 416,
                'label' => 'Email',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            416 => 
            array (
                'id' => 417,
                'label' => 'Phone Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'phone_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            417 => 
            array (
                'id' => 418,
                'label' => 'Mobile Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mobile_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            418 => 
            array (
                'id' => 419,
                'label' => 'Next of Kin',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'next_of_kin_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            419 => 
            array (
                'id' => 420,
                'label' => 'Next of Kin Phone Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'next_of_kin_phone_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            420 => 
            array (
                'id' => 421,
                'label' => 'Next of Kin email',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'next_of_kin_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            421 => 
            array (
                'id' => 422,
                'label' => 'Optional',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'optional_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            422 => 
            array (
                'id' => 423,
                'label' => 'Employee type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'employee_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            423 => 
            array (
                'id' => 424,
                'label' => 'Password',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'password_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            424 => 
            array (
                'id' => 425,
                'label' => 'Employee Types',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'employee_types_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            425 => 
            array (
                'id' => 426,
                'label' => 'Manage Employees',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_employees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            426 => 
            array (
                'id' => 427,
                'label' => 'Positions',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'positions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            427 => 
            array (
                'id' => 428,
                'label' => 'Select Department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            428 => 
            array (
                'id' => 429,
                'label' => 'Department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            429 => 
            array (
                'id' => 430,
                'label' => 'Add Employee Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_employee_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            430 => 
            array (
                'id' => 431,
                'label' => 'Edit Employee Types',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_employee_types_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            431 => 
            array (
                'id' => 432,
                'label' => 'Update Employee Types',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_employee_types_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            432 => 
            array (
                'id' => 433,
                'label' => 'Position',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'position_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            433 => 
            array (
                'id' => 434,
                'label' => 'Role',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'role_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            434 => 
            array (
                'id' => 435,
                'label' => 'Delete Employee',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'delete_employee_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            435 => 
            array (
                'id' => 436,
                'label' => 'This Action can\'t be reverted',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'this_action_can\'t_be_reverted_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            436 => 
            array (
                'id' => 437,
                'label' => 'Confirm',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'confirm_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            437 => 
            array (
                'id' => 438,
                'label' => 'Edit Position',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_position_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            438 => 
            array (
                'id' => 439,
                'label' => 'Add Position',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_position_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            439 => 
            array (
                'id' => 440,
                'label' => 'View Position',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_position_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            440 => 
            array (
                'id' => 441,
                'label' => 'View Positions',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_positions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            441 => 
            array (
                'id' => 442,
                'label' => 'Update Position',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_position_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            442 => 
            array (
                'id' => 443,
                'label' => 'Sub Department Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'sub_department_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            443 => 
            array (
                'id' => 444,
                'label' => 'Add Sub Department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_sub_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            444 => 
            array (
                'id' => 445,
                'label' => 'View Sub Department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_sub_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            445 => 
            array (
                'id' => 446,
                'label' => 'Edit Sub Department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_sub_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            446 => 
            array (
                'id' => 447,
                'label' => 'View Sub Departments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_sub_departments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            447 => 
            array (
                'id' => 448,
                'label' => 'Update Sub Department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_sub_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            448 => 
            array (
                'id' => 449,
                'label' => 'Update Profile Picture',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_profile_picture_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            449 => 
            array (
                'id' => 450,
                'label' => 'Upload',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'upload_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            450 => 
            array (
                'id' => 451,
                'label' => 'Edit Basic Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_basic_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            451 => 
            array (
                'id' => 452,
                'label' => 'Select Employee Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_employee_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            452 => 
            array (
                'id' => 453,
                'label' => 'Alternative Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'alternative_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            453 => 
            array (
                'id' => 454,
                'label' => 'Country',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'country_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            454 => 
            array (
                'id' => 455,
                'label' => 'Select Country',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_country_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            455 => 
            array (
                'id' => 456,
                'label' => 'City',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'city_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            456 => 
            array (
                'id' => 457,
                'label' => 'Select City',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_city_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            457 => 
            array (
                'id' => 458,
                'label' => 'Zip Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'zip_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            458 => 
            array (
                'id' => 459,
                'label' => 'Select Attendance Times',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_attendance_times_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            459 => 
            array (
                'id' => 460,
                'label' => 'Update Basic Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_basic_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            460 => 
            array (
                'id' => 461,
                'label' => 'Attendance Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'attendance_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            461 => 
            array (
                'id' => 462,
                'label' => 'Select Attendance Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_attendance_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            462 => 
            array (
                'id' => 463,
                'label' => 'Edit Biography',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_biography_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            463 => 
            array (
                'id' => 464,
                'label' => 'Patients List',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patients_list_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            464 => 
            array (
                'id' => 465,
                'label' => 'Search Patients',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_patients_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            465 => 
            array (
                'id' => 466,
                'label' => 'Sort by',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'sort_by_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            466 => 
            array (
                'id' => 467,
                'label' => 'Latest',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'latest_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            467 => 
            array (
                'id' => 468,
                'label' => 'Oldest',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'oldest_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            468 => 
            array (
                'id' => 469,
                'label' => 'Create Patient',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'create_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            469 => 
            array (
                'id' => 470,
                'label' => 'Loading Patients',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_patients_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            470 => 
            array (
                'id' => 471,
                'label' => 'Treatment Files',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'treatment_files_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            471 => 
            array (
                'id' => 472,
                'label' => 'N/A',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'n/a_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            472 => 
            array (
                'id' => 473,
                'label' => 'Xray Files',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'xray_files_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            473 => 
            array (
                'id' => 474,
                'label' => 'Referal Files',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'referal_files_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            474 => 
            array (
                'id' => 475,
                'label' => 'Billing Files',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'billing_files_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            475 => 
            array (
                'id' => 476,
                'label' => 'Billing Document',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'billing_document_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            476 => 
            array (
                'id' => 477,
                'label' => 'Take Photo',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'take_photo_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            477 => 
            array (
                'id' => 478,
                'label' => 'Clear Photo',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'clear_photo_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            478 => 
            array (
                'id' => 479,
                'label' => 'Patient Insurance Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_insurance_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            479 => 
            array (
                'id' => 480,
                'label' => 'Fill in all the patient\'s insurance information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'fill_in_all_the_patient\'s_insurance_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            480 => 
            array (
                'id' => 481,
                'label' => 'Patient Insurer',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_insurer_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            481 => 
            array (
                'id' => 482,
                'label' => 'Required',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            482 => 
            array (
                'id' => 483,
                'label' => 'Fill in here if patient\'s insurer is not listed',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'fill_in_here_if_patient\'s_insurer_is_not_listed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            483 => 
            array (
                'id' => 484,
                'label' => 'Insurance Policy Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'insurance_policy_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            484 => 
            array (
                'id' => 485,
                'label' => 'General Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'general_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            485 => 
            array (
                'id' => 486,
                'label' => 'Patient General Overview',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_general_overview_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            486 => 
            array (
                'id' => 487,
                'label' => 'Referred By',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'referred_by_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            487 => 
            array (
                'id' => 488,
                'label' => 'Referee Phone',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'referee_phone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            488 => 
            array (
                'id' => 489,
                'label' => 'Referee Email',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'referee_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            489 => 
            array (
                'id' => 490,
                'label' => 'Preview Data',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'preview_data_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            490 => 
            array (
                'id' => 491,
                'label' => 'Field',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'field_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            491 => 
            array (
                'id' => 492,
                'label' => 'Photo',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'photo_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            492 => 
            array (
                'id' => 493,
                'label' => 'CSN',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'csn_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            493 => 
            array (
                'id' => 494,
                'label' => 'Phone',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'phone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            494 => 
            array (
                'id' => 495,
                'label' => 'Home',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'home_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            495 => 
            array (
                'id' => 496,
                'label' => 'Marital Status',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'marital_status_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            496 => 
            array (
                'id' => 497,
                'label' => 'Private Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'private_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            497 => 
            array (
                'id' => 498,
                'label' => 'Secret Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'secret_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            498 => 
            array (
                'id' => 499,
                'label' => 'Postal Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'postal_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            499 => 
            array (
                'id' => 500,
                'label' => 'Nationality',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'nationality_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('elements')->insert(array (
            0 => 
            array (
                'id' => 501,
                'label' => 'Street',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'street_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 502,
                'label' => 'Emergency Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'emergency_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 503,
                'label' => 'Emergency Email',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'emergency_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 504,
                'label' => 'Emergency Phone Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'emergency_phone_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 505,
                'label' => 'Emergency Home Address',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'emergency_home_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 506,
                'label' => 'Fill If Other',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'fill_if_other_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 507,
                'label' => 'Submit',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'submit_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 508,
                'label' => 'State',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'state_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 509,
                'label' => 'Patient Biography',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_biography_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 510,
                'label' => 'Fill in all the patient\'s biography information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'fill_in_all_the_patient\'s_biography_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 511,
                'label' => 'Disabled',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'disabled_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 512,
                'label' => 'Date Of Birth',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'date_of_birth_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 513,
                'label' => 'Male',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'male_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 514,
                'label' => 'Female',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'female_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 515,
                'label' => 'Select marital status',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_marital_status_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 516,
                'label' => 'Single',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'single_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 517,
                'label' => 'Married',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'married_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 518,
                'label' => 'Divorced',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'divorced_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 519,
                'label' => 'Engaged',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'engaged_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 520,
                'label' => 'Separated',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'separated_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 521,
                'label' => 'Next of kin information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'next_of_kin_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 522,
                'label' => 'Fill in all the details of the patient\'s next of kin',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'fill_in_all_the_details_of_the_patient\'s_next_of_kin_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 523,
                'label' => 'N.O.K Fullname',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'n.o.k_fullname_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 524,
                'label' => 'N.O.K Phone Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'n.o.k_phone_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 525,
                'label' => 'N.O.K Email Address',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'n.o.k_email_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 526,
                'label' => 'Minor, Please fill the Family Member section',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'minor,_please_fill_the_family_member_section_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 527,
                'label' => 'Choose Family Member',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_family_member_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 528,
                'label' => 'Select A Family Member',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_a_family_member_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 529,
                'label' => 'Member Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'member_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 530,
                'label' => 'Member Contact',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'member_contact_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 531,
                'label' => 'Member Insurance Company',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'member_insurance_company_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 532,
                'label' => 'Member Insurance Policy Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'member_insurance_policy_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 533,
                'label' => 'Member Email',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'member_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 534,
                'label' => 'Continue to Address',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'continue_to_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 535,
                'label' => 'Next Of Kin Contact',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'next_of_kin_contact_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 536,
                'label' => 'check schedule',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'check_schedule_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 537,
                'label' => 'checking patient appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'checking_patient_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 538,
                'label' => 'Patient has no prior scheduled appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_has_no_prior_scheduled_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 539,
                'label' => 'create appointment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'create_appointment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 540,
                'label' => 'fetching patient...Please wait!!!',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'fetching_patient...please_wait!!!_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 541,
                'label' => 'Add Task',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'add_task_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 542,
                'label' => 'fetching tasks',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'fetching_tasks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 543,
                'label' => 'Task',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'task_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 544,
                'label' => 'token',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'token_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 545,
                'label' => 'Do you have any tasks or creative ideas, this tool will be your safe space',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'do_you_have_any_tasks_or_creative_ideas,_this_tool_will_be_your_safe_space_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 546,
                'label' => 'Press the add task button below to add new notes.',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'press_the_add_task_button_below_to_add_new_notes._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 547,
                'label' => 'edit task',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'edit_task_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 548,
                'label' => 'add reply',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'add_reply_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 549,
                'label' => 'Task Title',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'task_title_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 550,
                'label' => 'Due date',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'due_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 551,
                'label' => 'No Results Found',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_results_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 552,
                'label' => 'Discussion',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'discussion_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 553,
                'label' => 'Loading messages...',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_messages..._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 554,
                'label' => 'Task updated Successfully!',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'task_updated_successfully!_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 555,
                'label' => 'Task title is required',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'task_title_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 556,
                'label' => 'Task date is required',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'task_date_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 557,
                'label' => 'Edit Supervisor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_supervisor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 558,
                'label' => 'Add Supervisor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_supervisor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 559,
                'label' => 'Update Supervisor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_supervisor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 560,
                'label' => 'No supervisors',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_supervisors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 561,
                'label' => 'Doctor Not Found',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'doctor_not_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 562,
                'label' => 'Patient',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 563,
                'label' => 'Invoice No',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'invoice_no_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 564,
                'label' => 'Treatment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 565,
                'label' => 'Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 566,
                'label' => 'Loading invoices...Please wait!!!',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_invoices...please_wait!!!_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 567,
                'label' => 'There are no',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'there_are_no_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 568,
                'label' => 'at the moment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'at_the_moment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 569,
                'label' => 'Clear Filter',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'clear_filter_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 570,
                'label' => 'Localisation and Translation',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'localisation_and_translation_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 571,
                'label' => 'Roles and Permissions',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'roles_and_permissions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 572,
                'label' => 'Showing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'showing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 573,
                'label' => 'Compose',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'compose_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 574,
                'label' => 'to',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'to_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 575,
                'label' => 'of',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'of_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 576,
                'label' => 'Selected',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'selected_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 577,
                'label' => 'Uncheck all',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'uncheck_all_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 578,
                'label' => 'Loading treatments... Please wait!!!',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_treatments..._please_wait!!!_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 579,
                'label' => 'Recent Employees on Leave',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'recent_employees_on_leave_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 580,
                'label' => 'Facility Setting',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'facility_setting_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 581,
                'label' => 'sent',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'sent_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 582,
                'label' => 'Treatment Not Found',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'treatment_not_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 583,
                'label' => 'No Employees on Leave',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_employees_on_leave_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 584,
                'label' => 'Queuing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'queuing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 585,
                'label' => 'All Employees',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'all_employees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 586,
                'label' => 'Custom Settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'custom_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 587,
                'label' => 'snoozed',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'snoozed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 588,
                'label' => 'Employees On Leave',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'employees_on_leave_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 589,
                'label' => 'Loading doctors... Please wait!!!',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_doctors..._please_wait!!!_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 590,
                'label' => 'Draft',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'draft_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 591,
                'label' => 'Trash',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'trash_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 592,
                'label' => 'Supervisors',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'supervisors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 593,
                'label' => 'Pie Chart Data is not available',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'pie_chart_data_is_not_available_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 594,
                'label' => 'Manage front office settings, mails and appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_front_office_settings,_mails_and_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 595,
                'label' => 'New Recruits',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'new_recruits_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 596,
                'label' => 'work',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'work_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 597,
                'label' => 'Quick Appointment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'quick_appointment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 598,
                'label' => 'Social',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'social_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 599,
                'label' => 'Duration',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'duration_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 600,
                'label' => 'Manage patients information and settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_patients_information_and_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 601,
                'label' => 'Private',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'private_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 602,
                'label' => 'Time Unit',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'time_unit_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 603,
                'label' => 'Settings and management for imaging',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'settings_and_management_for_imaging_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 604,
                'label' => 'Support',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'support_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 605,
                'label' => 'Manage doctors slots and settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_doctors_slots_and_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 606,
                'label' => 'Generate Codes',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'generate_codes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 607,
                'label' => 'Manage procedures and other settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_procedures_and_other_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 608,
                'label' => 'Forward to front-office',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'forward_to_front-office_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 609,
                'label' => 'Manage human resource and other employees',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_human_resource_and_other_employees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 610,
                'label' => 'Generate QR',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'generate_qr_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 611,
                'label' => 'Manage billing controls, currency, amounts',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_billing_controls,_currency,_amounts_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 612,
                'label' => 'Propose Appointment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'propose_appointment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 613,
                'label' => 'Manage treatments and other settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_treatments_and_other_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 614,
                'label' => 'Manage patients flow in waiting room',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_patients_flow_in_waiting_room_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 615,
                'label' => 'Manage location settings and languages',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_location_settings_and_languages_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 616,
                'label' => 'Applied Day',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'applied_day_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 617,
                'label' => 'Print Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'print_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 618,
                'label' => 'Holiday Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'holiday_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 619,
                'label' => 'From',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'from_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 620,
                'label' => 'Manage insurance claims and payments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_insurance_claims_and_payments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 621,
                'label' => 'No Appointment Title',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_appointment_title_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 622,
                'label' => 'No leaves Available',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_leaves_available_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 623,
                'label' => 'No status',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_status_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 624,
                'label' => 'No Start Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_start_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 625,
                'label' => 'No End Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_end_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 626,
                'label' => 'Assign roles, delete and view employees',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'assign_roles,_delete_and_view_employees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 627,
                'label' => 'Creation Source',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'creation_source_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 628,
                'label' => 'Number Of Days',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'number_of_days_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 629,
                'label' => 'Edit Holiday',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_holiday_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 630,
                'label' => 'No Creation Source',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_creation_source_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 631,
                'label' => 'Patient Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 632,
                'label' => 'Update Holiday',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_holiday_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 633,
                'label' => 'No Comments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_comments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 634,
                'label' => 'No Date Set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_date_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 635,
                'label' => 'Leave Management',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'leave_management_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 636,
                'label' => 'Add Holiday',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_holiday_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 637,
                'label' => 'No Interval',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_interval_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 638,
                'label' => 'Add Leave Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_leave_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 639,
                'label' => 'Minutes',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'minutes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 640,
                'label' => 'Leave Application Form',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'leave_application_form_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 641,
                'label' => 'Manage Holiday',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_holiday_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 642,
                'label' => 'Serving Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'serving_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 643,
                'label' => 'Manage leave Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_leave_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 644,
                'label' => 'Leaves Applied',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'leaves_applied_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 645,
                'label' => 'No Appointment Title',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_appointment_title_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 646,
                'label' => 'Material Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'material_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 647,
                'label' => 'No Material Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_material_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 648,
                'label' => 'No Procedures',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'no_procedures_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 649,
                'label' => 'Number Of Leave Days',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'number_of_leave_days_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 650,
                'label' => 'Invoices Chart',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'invoices_chart_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 651,
                'label' => 'Pie Chart Data is not available',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'pie_chart_data_is_not_available_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 652,
                'label' => 'Age',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'age_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 653,
                'label' => 'Number Of Working Days',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'number_of_working_days_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 654,
                'label' => 'Apply for a leave',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'apply_for_a_leave_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 655,
                'label' => 'Choose Employee',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_employee_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 656,
                'label' => 'Choose Leave Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_leave_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 657,
                'label' => 'Create New Invoice ',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'create_new_invoice__text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 658,
                'label' => 'Select Treatment Plan',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_treatment_plan_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 659,
                'label' => 'No Treatment Plan',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_treatment_plan_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 660,
                'label' => 'VAT',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'vat_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 661,
                'label' => 'Treatment Category',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'treatment_category_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 662,
                'label' => 'Select Treatment Category',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_treatment_category_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 663,
                'label' => 'No Treatment Category',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_treatment_category_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 664,
                'label' => 'Choose Doctor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_doctor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 665,
                'label' => 'No Doctor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_doctor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 666,
                'label' => 'Applied by',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'applied_by_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 667,
                'label' => 'Invoice Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'invoice_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 668,
                'label' => 'Attachment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'attachment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 669,
                'label' => 'Approved',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'approved_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 670,
                'label' => 'Pending',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'pending_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 671,
                'label' => 'Patients Report',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patients_report_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 672,
                'label' => 'No leaves Applied',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_leaves_applied_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 673,
                'label' => 'Edit Leave Application',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_leave_application_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 674,
                'label' => 'Application Start Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'application_start_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 675,
                'label' => 'Applied End Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'applied_end_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 676,
                'label' => 'Shedule Send',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'shedule_send_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 677,
                'label' => 'Approved Start Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'approved_start_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 678,
                'label' => 'Approved End Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'approved_end_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 679,
                'label' => 'Approved By',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'approved_by_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 680,
                'label' => 'No Invoice Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_invoice_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 681,
                'label' => 'Approve Leave Application',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'approve_leave_application_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 682,
                'label' => 'Internal Notes',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'internal_notes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 683,
                'label' => 'Update Leave Application',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_leave_application_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 684,
                'label' => 'No data',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_data_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 685,
                'label' => 'SubTotal',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'subtotal_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 686,
                'label' => 'Approve Leave',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'approve_leave_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 687,
                'label' => 'Holiday Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'holiday_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 688,
                'label' => 'Payment Avenues',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'payment_avenues_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 689,
                'label' => 'Appointments Report',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'appointments_report_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 690,
                'label' => 'Invoice Status',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'invoice_status_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 691,
                'label' => 'Card / Visa',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'card_/_visa_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 692,
                'label' => 'Edit Leave Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_leave_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 693,
                'label' => 'Discard',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'discard_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 694,
                'label' => 'Update Leave Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_leave_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 695,
                'label' => 'Add',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 696,
                'label' => 'Billing Report',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'billing_report_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 697,
                'label' => 'Paid',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'paid_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 698,
                'label' => 'Unpaid',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'unpaid_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 699,
                'label' => 'Edit Biographical Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_biographical_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 700,
                'label' => 'Treatments Report',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'treatments_report_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 701,
                'label' => 'Employees Report',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'employees_report_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 702,
                'label' => 'Subject',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'subject_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 703,
                'label' => 'Activity Logs',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'activity_logs_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 704,
                'label' => 'Message',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'message_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 705,
                'label' => 'Patient audit logs',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_audit_logs_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 706,
                'label' => 'Place of Residence',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'place_of_residence_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 707,
                'label' => 'Select Gender',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_gender_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 708,
                'label' => 'Work in City',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'work_in_city_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 709,
                'label' => 'Choose Yes or No',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_yes_or_no_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 710,
                'label' => 'Ethnic Group',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'ethnic_group_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 711,
                'label' => 'Work Permit',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'work_permit_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 712,
                'label' => 'Update Biographical Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_biographical_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 713,
                'label' => 'Edit Bank Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_bank_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 714,
                'label' => 'Account Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'account_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 715,
                'label' => 'Bank Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'bank_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 716,
                'label' => 'BBAN Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'bban_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 717,
                'label' => 'Branch Address',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'branch_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 718,
                'label' => 'Basic Salary',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'basic_salary_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 719,
                'label' => 'Choose Basic Salary',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_basic_salary_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 720,
                'label' => 'Net Salary',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'net_salary_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 721,
                'label' => 'Tax Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'tax_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 722,
                'label' => 'Monthly Work Hours',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'monthly_work_hours_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 723,
                'label' => 'More',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'more_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 724,
                'label' => 'move to social',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'move_to_social_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 725,
                'label' => 'Choose Sub Department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_sub_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 726,
                'label' => 'No Sub departments created Under this departed yet',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_sub_departments_created_under_this_departed_yet_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 727,
                'label' => 'Choose Position',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_position_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 728,
                'label' => 'move to private',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'move_to_private_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 729,
                'label' => 'Duty Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'duty_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 730,
                'label' => 'Choose Duty Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_duty_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 731,
                'label' => 'Hire Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'hire_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 732,
                'label' => 'Recent Patients',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'recent_patients_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 733,
                'label' => 'Rate Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'rate_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 734,
                'label' => 'Choose Rate Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_rate_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 735,
                'label' => 'Rate',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'rate_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 736,
                'label' => 'IMPORT',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'import_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 737,
                'label' => 'move to social',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'move_to_social_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 738,
                'label' => 'Update Bank Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_bank_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 739,
                'label' => 'Edit Benefit Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_benefit_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 740,
                'label' => 'Edit Benefit Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_benefit_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 741,
                'label' => 'Family',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'family_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 742,
                'label' => 'Categories',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'categories_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 743,
                'label' => 'Kind Regards',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'kind_regards_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 744,
                'label' => 'Past Appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'past_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 745,
                'label' => 'Defaulted Invoice Report',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'defaulted_invoice_report_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 746,
                'label' => 'Cleared Invoice Report',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'cleared_invoice_report_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 747,
                'label' => 'To',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'to_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 748,
                'label' => 'Private Invoice Reports',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'private_invoice_reports_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 749,
                'label' => 'Transport Allowance',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'transport_allowance_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 750,
                'label' => 'Insurance Invoice Report',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'insurance_invoice_report_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 751,
                'label' => 'Education Award',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'education_award_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 752,
                'label' => 'Choose Education Award',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_education_award_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 753,
                'label' => 'Awarding Institution',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'awarding_institution_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 754,
                'label' => 'Manage System roles, manage users',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_system_roles,_manage_users_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 755,
                'label' => 'Class of Award',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'class_of_award_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 756,
                'label' => 'Choose Class of Award',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_class_of_award_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 757,
                'label' => 'Manage Timezones, Application names and Others',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_timezones,_application_names_and_others_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 758,
                'label' => 'Awarding date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'awarding_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 759,
                'label' => 'First Supervisor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'first_supervisor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 760,
                'label' => 'Choose First Supervisor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_first_supervisor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 761,
                'label' => 'Second Supervisor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'second_supervisor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 762,
                'label' => 'Choose Second Supervisor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_second_supervisor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 763,
                'label' => 'Reporting To',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'reporting_to_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 764,
                'label' => 'Choose Reporting To',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_reporting_to_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 765,
                'label' => 'Update Benefit Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_benefit_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 766,
                'label' => 'Mails',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mails_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 767,
                'label' => 'Loading employees',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_employees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 768,
                'label' => 'Emergency Contact',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'emergency_contact_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 769,
                'label' => 'Home Email',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'home_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 770,
                'label' => 'Business Email',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'business_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 771,
                'label' => 'Home Phone',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'home_phone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 772,
                'label' => 'Business Phone',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'business_phone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 773,
                'label' => 'Paid Invoices',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'paid_invoices_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 774,
                'label' => 'Relationship',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'relationship_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 775,
                'label' => 'Another Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'another_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 776,
                'label' => 'There are no mails',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'there_are_no_mails_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 777,
                'label' => 'Work Phone',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'work_phone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 778,
                'label' => 'Update Emergency Contact',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_emergency_contact_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 779,
                'label' => 'Basic Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'basic_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 780,
                'label' => 'Please Wait',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'please_wait_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 781,
                'label' => 'Edit',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 782,
                'label' => 'Last Date of Treatment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'last_date_of_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 783,
                'label' => 'Invoice Payment Trends',
                'view_id' => 2,
                'icon' => '',
                'slug' => 'invoice_payment_trends_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 784,
                'label' => 'Edit Emergency Contact',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_emergency_contact_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 785,
                'label' => 'Body',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'body_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 786,
                'label' => 'Add Mail Content',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_mail_content_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 787,
                'label' => 'Benefits',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'benefits_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 788,
                'label' => 'Salary Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'salary_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 789,
                'label' => 'Scheduled Appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'scheduled_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 790,
                'label' => 'MAILING',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mailing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 791,
                'label' => 'Gross Salary',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'gross_salary_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 792,
                'label' => 'Positional Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'positional_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 793,
                'label' => 'Select Category',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_category_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 794,
                'label' => 'Update Mail Content',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_mail_content_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 795,
                'label' => 'Sub Category',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'sub_category_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 796,
                'label' => 'Filter by gender',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'filter_by_gender_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 797,
                'label' => 'Filter by age range',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'filter_by_age_range_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 798,
                'label' => 'Medical',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'medical_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 799,
                'label' => 'Export',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'export_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 800,
                'label' => 'Slots',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'slots_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 801,
                'label' => 'No name set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_name_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 802,
                'label' => 'Filter by treatment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'filter_by_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 803,
                'label' => 'Only xls, xlsx, csv files are allowed',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'only_xls,_xlsx,_csv_files_are_allowed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 804,
                'label' => 'No date of birth set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_date_of_birth_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 805,
                'label' => 'Uploading in progress...',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'uploading_in_progress..._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 806,
                'label' => 'No phone set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_phone_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 807,
                'label' => 'Marital Status',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'marital_status_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 808,
                'label' => 'No marital status set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_marital_status_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 809,
                'label' => 'No home phone set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_home_phone_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 810,
                'label' => 'Cell Phone',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'cell_phone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 811,
                'label' => 'No cell phone set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_cell_phone_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 812,
                'label' => 'No business phone set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_business_phone_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 813,
                'label' => 'No position set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_position_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 814,
                'label' => 'No department set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_department_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 815,
                'label' => 'Edit Invoice',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_invoice_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 816,
                'label' => 'Patient ID',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_id_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 817,
                'label' => 'Location',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'location_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 818,
                'label' => 'Quantity',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'quantity_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 819,
                'label' => 'Charges',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'charges_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 820,
                'label' => 'No email set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_email_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 821,
                'label' => 'No gender set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_gender_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 822,
                'label' => 'Debit',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'debit_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 823,
                'label' => 'Balance Due',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'balance_due_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 824,
                'label' => 'No home email set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_home_email_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 825,
                'label' => 'Total Including VAT',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'total_including_vat_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 826,
                'label' => 'Alternative phone',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'alternative_phone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 827,
                'label' => 'No alternative phone set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_alternative_phone_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 828,
                'label' => 'No business email set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_business_email_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 829,
                'label' => 'No person set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_person_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 830,
                'label' => 'Address Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'address_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 831,
                'label' => 'No city set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_city_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 832,
                'label' => 'Add Family Member Who Is An Exisiting Patient',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_family_member_who_is_an_exisiting_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 833,
                'label' => 'No zipcode set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_zipcode_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 834,
                'label' => 'Selected Patient',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'selected_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 835,
                'label' => 'Add Custodian As Family Member',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_custodian_as_family_member_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 836,
                'label' => 'Brief Chart',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'brief_chart_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 837,
                'label' => 'First Name Is Missing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'first_name_is_missing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 838,
                'label' => 'Last Name Is Missing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'last_name_is_missing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 839,
                'label' => 'No branch address set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_branch_address_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 840,
                'label' => 'Phone Number Is Missing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'phone_number_is_missing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 841,
                'label' => 'No Salary Types',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_salary_types_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 842,
                'label' => 'Secondary Phone Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'secondary_phone_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 843,
                'label' => 'No country set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_country_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 844,
                'label' => 'Please Wait',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'please_wait_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 845,
                'label' => 'Email Is Missing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'email_is_missing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 846,
                'label' => 'Choose Relationship',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_relationship_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 => 
            array (
                'id' => 847,
                'label' => 'No place of residence set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_place_of_residence_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 => 
            array (
                'id' => 848,
                'label' => 'Profile Image',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'profile_image_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 => 
            array (
                'id' => 849,
                'label' => 'Clear Image',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'clear_image_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            349 => 
            array (
                'id' => 850,
                'label' => 'More Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'more_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            350 => 
            array (
                'id' => 851,
                'label' => 'Date Of Birth Is Missing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'date_of_birth_is_missing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            351 => 
            array (
                'id' => 852,
                'label' => 'Emergency Address',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'emergency_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            352 => 
            array (
                'id' => 853,
                'label' => 'Citizen Service Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'citizen_service_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            353 => 
            array (
                'id' => 854,
                'label' => 'Citizen Service Number Is Missing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'citizen_service_number_is_missing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            354 => 
            array (
                'id' => 855,
                'label' => 'No emergency address set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_emergency_address_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            355 => 
            array (
                'id' => 856,
                'label' => 'Choose a Nationality',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_a_nationality_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            356 => 
            array (
                'id' => 857,
                'label' => 'Select A Region',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_a_region_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            357 => 
            array (
                'id' => 858,
                'label' => 'No gross salary set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_gross_salary_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            358 => 
            array (
                'id' => 859,
                'label' => 'Street Is Missing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'street_is_missing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            359 => 
            array (
                'id' => 860,
                'label' => 'Home Address Is Missing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'home_address_is_missing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            360 => 
            array (
                'id' => 861,
                'label' => 'State Is Missing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'state_is_missing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            361 => 
            array (
                'id' => 862,
                'label' => 'No monthly work hours set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_monthly_work_hours_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            362 => 
            array (
                'id' => 863,
                'label' => 'Tin number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'tin_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            363 => 
            array (
                'id' => 864,
                'label' => 'No tin number set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_tin_number_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            364 => 
            array (
                'id' => 865,
                'label' => 'No bank name set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_bank_name_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            365 => 
            array (
                'id' => 866,
                'label' => 'No net salary set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_net_salary_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            366 => 
            array (
                'id' => 867,
                'label' => 'No basic salary set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_basic_salary_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            367 => 
            array (
                'id' => 868,
                'label' => 'No account number set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_account_number_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            368 => 
            array (
                'id' => 869,
                'label' => 'Bank ban number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'bank_ban_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            369 => 
            array (
                'id' => 870,
                'label' => 'No bank ban number set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_bank_ban_number_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            370 => 
            array (
                'id' => 871,
                'label' => 'No role set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_role_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            371 => 
            array (
                'id' => 872,
                'label' => 'Postal Code Is Missing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'postal_code_is_missing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            372 => 
            array (
                'id' => 873,
                'label' => '4 numbers 2 letters',
                'view_id' => 5,
                'icon' => '',
                'slug' => '4_numbers_2_letters_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            373 => 
            array (
                'id' => 874,
                'label' => 'Salary Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'salary_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            374 => 
            array (
                'id' => 875,
                'label' => 'Salary Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'salary_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            375 => 
            array (
                'id' => 876,
                'label' => 'Default Amount',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'default_amount_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            376 => 
            array (
                'id' => 877,
                'label' => 'Actions',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'actions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            377 => 
            array (
                'id' => 878,
                'label' => 'Add Salary Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_salary_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            378 => 
            array (
                'id' => 879,
                'label' => 'Past Treatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'past_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            379 => 
            array (
                'id' => 880,
                'label' => 'Filter by department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'filter_by_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            380 => 
            array (
                'id' => 881,
                'label' => 'Search by name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_by_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            381 => 
            array (
                'id' => 882,
                'label' => 'Edit Salary Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_salary_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            382 => 
            array (
                'id' => 883,
                'label' => 'Filter by position',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'filter_by_position_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            383 => 
            array (
                'id' => 884,
                'label' => 'Filter by role',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'filter_by_role_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            384 => 
            array (
                'id' => 885,
                'label' => 'Select date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            385 => 
            array (
                'id' => 886,
                'label' => 'Date range',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'date_range_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            386 => 
            array (
                'id' => 887,
                'label' => 'Month range',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'month_range_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            387 => 
            array (
                'id' => 888,
                'label' => 'Currencies',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'currencies_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            388 => 
            array (
                'id' => 889,
                'label' => 'Currency',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'currency_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            389 => 
            array (
                'id' => 890,
                'label' => 'Currency Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'currency_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            390 => 
            array (
                'id' => 891,
                'label' => 'Exchange Rate',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'exchange_rate_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            391 => 
            array (
                'id' => 892,
                'label' => 'Add Currency',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_currency_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            392 => 
            array (
                'id' => 893,
                'label' => 'There are no currencies',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'there_are_no_currencies_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            393 => 
            array (
                'id' => 894,
                'label' => 'No Treatments Data Found',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_treatments_data_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            394 => 
            array (
                'id' => 895,
                'label' => 'Week range',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'week_range_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            395 => 
            array (
                'id' => 896,
                'label' => 'Page',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'page_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            396 => 
            array (
                'id' => 897,
                'label' => 'Year range',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'year_range_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            397 => 
            array (
                'id' => 898,
                'label' => 'Choose fil',
                'view_id' => 2,
                'icon' => '',
                'slug' => 'choose_fil_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            398 => 
            array (
                'id' => 899,
                'label' => 'Filter by status',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'filter_by_status_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            399 => 
            array (
                'id' => 900,
                'label' => 'Edit Currency',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_currency_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            400 => 
            array (
                'id' => 901,
                'label' => 'PDF',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'pdf_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            401 => 
            array (
                'id' => 902,
                'label' => 'EXCEL',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'excel_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            402 => 
            array (
                'id' => 903,
                'label' => 'CSV',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'csv_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            403 => 
            array (
                'id' => 904,
                'label' => 'Bundled Treatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'bundled_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            404 => 
            array (
                'id' => 905,
                'label' => 'Add Treatment Bundle',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_treatment_bundle_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            405 => 
            array (
                'id' => 906,
                'label' => 'Archive',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'archive_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            406 => 
            array (
                'id' => 907,
                'label' => 'View Subtreatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_subtreatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            407 => 
            array (
                'id' => 908,
                'label' => 'There are no treatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'there_are_no_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            408 => 
            array (
                'id' => 909,
                'label' => 'Archive All',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'archive_all_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            409 => 
            array (
                'id' => 910,
                'label' => 'Detailed Chart',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'detailed_chart_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            410 => 
            array (
                'id' => 911,
                'label' => 'Archive Selected',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'archive_selected_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            411 => 
            array (
                'id' => 912,
                'label' => 'Delete All',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'delete_all_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            412 => 
            array (
                'id' => 913,
                'label' => 'Loading positions',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_positions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            413 => 
            array (
                'id' => 914,
                'label' => 'Delete Selected',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'delete_selected_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            414 => 
            array (
                'id' => 915,
                'label' => 'Restore All',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'restore_all_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            415 => 
            array (
                'id' => 916,
                'label' => 'Loading departments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_departments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            416 => 
            array (
                'id' => 917,
                'label' => 'Color',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'color_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            417 => 
            array (
                'id' => 918,
                'label' => 'Loading roles',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_roles_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            418 => 
            array (
                'id' => 919,
                'label' => 'Add New Treatment Bundle',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_new_treatment_bundle_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            419 => 
            array (
                'id' => 920,
                'label' => 'No role ',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_role__text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            420 => 
            array (
                'id' => 921,
                'label' => 'Edit Treatment Bundle',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_treatment_bundle_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            421 => 
            array (
                'id' => 922,
                'label' => 'Sub Treatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'sub_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            422 => 
            array (
                'id' => 923,
                'label' => 'to',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'to_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            423 => 
            array (
                'id' => 924,
                'label' => 'of',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'of_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            424 => 
            array (
                'id' => 925,
                'label' => 'Select Date Range',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_date_range_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            425 => 
            array (
                'id' => 926,
                'label' => 'Filter by doctors',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'filter_by_doctors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            426 => 
            array (
                'id' => 927,
                'label' => 'Loading doctors',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_doctors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            427 => 
            array (
                'id' => 928,
                'label' => 'There are no Procedures',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'there_are_no_procedures_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            428 => 
            array (
                'id' => 929,
                'label' => 'You are not authorized to see procedures',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'you_are_not_authorized_to_see_procedures_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            429 => 
            array (
                'id' => 930,
                'label' => 'Procedure',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'procedure_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            430 => 
            array (
                'id' => 931,
                'label' => 'Add Procedure',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_procedure_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            431 => 
            array (
                'id' => 932,
                'label' => 'Edit Produre',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_produre_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            432 => 
            array (
                'id' => 933,
                'label' => 'Available Roles',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'available_roles_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            433 => 
            array (
                'id' => 934,
                'label' => 'Assign Roles',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'assign_roles_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            434 => 
            array (
                'id' => 935,
                'label' => 'No serving time set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_serving_time_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            435 => 
            array (
                'id' => 936,
                'label' => 'No doctors',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_doctors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            436 => 
            array (
                'id' => 937,
                'label' => 'Manage System',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_system_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            437 => 
            array (
                'id' => 938,
                'label' => 'Company Favicon',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'company_favicon_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            438 => 
            array (
                'id' => 939,
                'label' => 'Company Logo',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'company_logo_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            439 => 
            array (
                'id' => 940,
                'label' => 'No Timezone Found',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_timezone_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            440 => 
            array (
                'id' => 941,
                'label' => 'Search Timezone',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_timezone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            441 => 
            array (
                'id' => 942,
                'label' => 'Timezone',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'timezone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            442 => 
            array (
                'id' => 943,
                'label' => 'No Language Found',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_language_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            443 => 
            array (
                'id' => 944,
                'label' => 'No checkin time set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_checkin_time_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            444 => 
            array (
                'id' => 945,
                'label' => 'Language',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'language_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            445 => 
            array (
                'id' => 946,
                'label' => 'Search Language',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_language_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            446 => 
            array (
                'id' => 947,
                'label' => 'No Currency Found',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_currency_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            447 => 
            array (
                'id' => 948,
                'label' => 'Search Currency',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_currency_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            448 => 
            array (
                'id' => 949,
                'label' => 'Pricing Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'pricing_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            449 => 
            array (
                'id' => 950,
                'label' => 'This name field is required',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'this_name_field_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            450 => 
            array (
                'id' => 951,
                'label' => 'VAT Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'vat_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            451 => 
            array (
                'id' => 952,
                'label' => 'Invoice Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'invoice_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            452 => 
            array (
                'id' => 953,
                'label' => 'This code field is required',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'this_code_field_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            453 => 
            array (
                'id' => 954,
                'label' => 'Patient Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            454 => 
            array (
                'id' => 955,
                'label' => 'Working Days',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'working_days_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            455 => 
            array (
                'id' => 956,
                'label' => 'Working Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'working_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            456 => 
            array (
                'id' => 957,
                'label' => 'Facility Address',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'facility_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            457 => 
            array (
                'id' => 958,
                'label' => 'Appointment Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'appointment_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            458 => 
            array (
                'id' => 959,
                'label' => 'Maximum Checkin Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'maximum_checkin_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            459 => 
            array (
                'id' => 960,
                'label' => 'Minimum Checkin Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'minimum_checkin_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            460 => 
            array (
                'id' => 961,
                'label' => 'Application Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'application_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            461 => 
            array (
                'id' => 962,
                'label' => 'Company Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'company_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            462 => 
            array (
                'id' => 963,
                'label' => 'Update Settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            463 => 
            array (
                'id' => 964,
                'label' => 'Enter Your Language',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'enter_your_language_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            464 => 
            array (
                'id' => 965,
                'label' => 'Select your language of translation',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_your_language_of_translation_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            465 => 
            array (
                'id' => 966,
                'label' => 'Update Profile Photo',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_profile_photo_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            466 => 
            array (
                'id' => 967,
                'label' => 'Parent Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'parent_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            467 => 
            array (
                'id' => 968,
                'label' => 'View activity logs',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_activity_logs_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            468 => 
            array (
                'id' => 969,
                'label' => 'Read/Write',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'read/write_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            469 => 
            array (
                'id' => 970,
                'label' => 'Write/Create',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'write/create_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            470 => 
            array (
                'id' => 971,
                'label' => 'Treatment Categories',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'treatment_categories_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            471 => 
            array (
                'id' => 972,
                'label' => 'Apply',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'apply_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            472 => 
            array (
                'id' => 973,
                'label' => 'Parent Category',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'parent_category_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            473 => 
            array (
                'id' => 974,
                'label' => 'Loading Categories..',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_categories.._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            474 => 
            array (
                'id' => 975,
                'label' => 'Testing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'testing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            475 => 
            array (
                'id' => 976,
                'label' => 'No Categories Found',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_categories_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            476 => 
            array (
                'id' => 977,
                'label' => 'Monthly scheduled appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'monthly_scheduled_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            477 => 
            array (
                'id' => 978,
                'label' => 'New Category',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'new_category_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            478 => 
            array (
                'id' => 979,
                'label' => 'Leave empty if category is parent/main',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'leave_empty_if_category_is_parent/main_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            479 => 
            array (
                'id' => 980,
                'label' => 'This price field is requsired',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'this_price_field_is_requsired_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            480 => 
            array (
                'id' => 981,
                'label' => 'Week days time settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'week_days_time_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            481 => 
            array (
                'id' => 982,
                'label' => 'Cost',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'cost_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            482 => 
            array (
                'id' => 983,
                'label' => 'Loading',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            483 => 
            array (
                'id' => 984,
                'label' => 'Number of appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'number_of_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            484 => 
            array (
                'id' => 985,
                'label' => 'Trends of scheduled appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'trends_of_scheduled_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            485 => 
            array (
                'id' => 986,
                'label' => 'Trends of done treatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'trends_of_done_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            486 => 
            array (
                'id' => 987,
                'label' => 'Add New',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_new_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            487 => 
            array (
                'id' => 988,
                'label' => 'Monthly done treatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'monthly_done_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            488 => 
            array (
                'id' => 989,
                'label' => 'Add Required Treatment plan',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_required_treatment_plan_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            489 => 
            array (
                'id' => 990,
                'label' => 'Monthly registered patients',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'monthly_registered_patients_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            490 => 
            array (
                'id' => 991,
                'label' => 'Number of patients',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'number_of_patients_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            491 => 
            array (
                'id' => 992,
                'label' => 'Trends of registered patients',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'trends_of_registered_patients_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            492 => 
            array (
                'id' => 993,
                'label' => 'Monthly invoices',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'monthly_invoices_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            493 => 
            array (
                'id' => 994,
                'label' => 'Grand Total',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'grand_total_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            494 => 
            array (
                'id' => 995,
                'label' => 'Calculate final values',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'calculate_final_values_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            495 => 
            array (
                'id' => 996,
                'label' => 'Registered patients according to gender',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'registered_patients_according_to_gender_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            496 => 
            array (
                'id' => 997,
                'label' => 'Trends of registered employees',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'trends_of_registered_employees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            497 => 
            array (
                'id' => 998,
                'label' => 'Select Invoice Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_invoice_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            498 => 
            array (
                'id' => 999,
                'label' => 'Registered employees',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'registered_employees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            499 => 
            array (
                'id' => 1000,
                'label' => 'Process Payment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'process_payment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('elements')->insert(array (
            0 => 
            array (
                'id' => 1001,
                'label' => 'Balance Due Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'balance_due_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 1002,
                'label' => 'No Materials Found',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_materials_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 1003,
                'label' => 'Public',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'public_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 1004,
                'label' => 'Label Translation',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'label_translation_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 1005,
                'label' => 'Enter Your Translation',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'enter_your_translation_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 1006,
                'label' => 'Default Label',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'default_label_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 1007,
                'label' => 'Select Doctor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_doctor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 1008,
                'label' => 'Contract Start Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'contract_start_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 1009,
                'label' => 'Contract End Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'contract_end_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 1010,
                'label' => 'TREATMENT PRICES',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'treatment_prices_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 1011,
                'label' => 'Choose Day',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_day_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 1012,
                'label' => 'Auth Logs',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'auth_logs_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 1013,
                'label' => 'Pending Patients List',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'pending_patients_list_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 1014,
                'label' => 'Add Patient',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'add_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 1015,
                'label' => 'Contact Information',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'contact_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 1016,
                'label' => 'Practice Information',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'practice_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 1017,
                'label' => 'No title provided',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_title_provided_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 1018,
                'label' => 'No title found',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_title_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 1019,
                'label' => 'Mark as',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'mark_as_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 1020,
                'label' => 'Insurance Type',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'insurance_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 1021,
                'label' => 'Insurance Policy Number',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'insurance_policy_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 1022,
                'label' => 'Insurance UZOVI Code',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'insurance_uzovi_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 1023,
                'label' => 'Additional Insurance',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'additional_insurance_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 1024,
                'label' => 'Additional Insurance Type',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'additional_insurance_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 1025,
                'label' => 'Additional Insurance Policy Number',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'additional_insurance_policy_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 1026,
                'label' => 'Additional Insurance UZOVI Code',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'additional_insurance_uzovi_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 1027,
                'label' => 'No Insurance Type',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_insurance_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 1028,
                'label' => 'No Insurance Policy Number',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_insurance_policy_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 1029,
                'label' => 'No UZOVI Code ',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_uzovi_code__text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 1030,
                'label' => 'No Additional Insurance',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_additional_insurance_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 1031,
                'label' => 'No Additional Insurance Type',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_additional_insurance_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 1032,
                'label' => 'No Additional Insurance Policy Number',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_additional_insurance_policy_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 1033,
                'label' => 'No Additional Insurance UZOVI Code',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_additional_insurance_uzovi_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 1034,
                'label' => 'Check Insurance Data',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'check_insurance_data_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 1035,
                'label' => 'Check WLZ Indication',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'check_wlz_indication_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 1036,
                'label' => 'Insurance Based on Insurance Info',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'insurance_based_on_insurance_info_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 1037,
                'label' => 'Edit WLZ Information',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'edit_wlz_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 1038,
                'label' => 'History of Insurance',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'history_of_insurance_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 1039,
                'label' => 'Do not email declaration',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'do_not_email_declaration_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 1040,
                'label' => 'Do not send declaration to insurance company',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'do_not_send_declaration_to_insurance_company_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 1041,
                'label' => 'Print Patient Card',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'print_patient_card_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 1042,
                'label' => 'Defaulter',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'defaulter_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 1043,
                'label' => 'Cannot Make Appointments Anymore ',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'cannot_make_appointments_anymore__text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 1044,
                'label' => 'No Payment Reminder',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_payment_reminder_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 1045,
                'label' => 'Exclude from Insurance Claim',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'exclude_from_insurance_claim_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 1046,
                'label' => 'Customer in Arrears',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'customer_in_arrears_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 1047,
                'label' => 'Receive Physical Mail',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'receive_physical_mail_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 1048,
                'label' => 'Date Registered',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'date_registered_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 1049,
                'label' => 'Referred By',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'referred_by_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 1050,
                'label' => 'Status',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'status_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 1051,
                'label' => 'Date of Death',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'date_of_death_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 1052,
                'label' => 'Any Other Reason',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'any_other_reason_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 1053,
                'label' => 'Type Other Reason Here',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'type_other_reason_here_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 1054,
                'label' => 'Other Reason',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'other_reason_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 1055,
                'label' => 'Edit Contact Information',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'edit_contact_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 1056,
                'label' => 'Secondary Email',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'secondary_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 1057,
                'label' => 'Email Options',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'email_options_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 1058,
                'label' => 'No Secondary Email',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_secondary_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 1059,
                'label' => 'No Option Selected',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_option_selected_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 1060,
                'label' => 'Work Email',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'work_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 1061,
                'label' => 'No Work Email',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_work_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 1062,
                'label' => 'Email Salutation',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'email_salutation_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 1063,
                'label' => 'No Email Salutation',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_email_salutation_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 1064,
                'label' => 'Invoice Email',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'invoice_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 1065,
                'label' => 'No Invoice Email',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_invoice_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 1066,
                'label' => 'No Work Telephone',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_work_telephone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 1067,
                'label' => 'Work Telephone',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'work_telephone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 1068,
                'label' => 'Landline phone',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'landline_phone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 1069,
                'label' => 'No Landline phone',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_landline_phone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 1070,
                'label' => 'Private Number',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'private_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 1071,
                'label' => 'Secret Number',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'secret_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 1072,
                'label' => 'No Secret Number',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_secret_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 1073,
                'label' => 'No Private Number',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_private_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 1074,
                'label' => 'House Ext',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'house_ext_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 1075,
                'label' => 'No House Ext',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_house_ext_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 1076,
                'label' => 'House Number',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'house_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 1077,
                'label' => 'No House Number ',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_house_number__text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 1078,
                'label' => 'Post Code',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'post_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 1079,
                'label' => 'No Post Code',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_post_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 1080,
                'label' => 'Street Name',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'street_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 1081,
                'label' => 'No Street Name',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_street_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 1082,
                'label' => 'Country Code',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'country_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 1083,
                'label' => 'No Country Code',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_country_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 1084,
                'label' => 'Province',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'province_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 1085,
                'label' => 'No Province',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_province_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 1086,
                'label' => 'System Emails',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'system_emails_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 1087,
                'label' => 'Invoice Emails',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'invoice_emails_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 1088,
                'label' => 'NewsLetters',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'newsletters_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 1089,
                'label' => 'Do not receive Emails',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'do_not_receive_emails_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 1090,
                'label' => 'Editing',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'editing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 1091,
                'label' => 'Dentist',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'dentist_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 1092,
                'label' => 'Mouth Hygienist',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'mouth_hygienist_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 1093,
                'label' => 'Preventive Assistant',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'preventive_assistant_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 1094,
                'label' => 'Orthodontist',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'orthodontist_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 1095,
                'label' => 'No Dentist Selected',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_dentist_selected_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 1096,
                'label' => 'No Hygienist Selected',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_hygienist_selected_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 1097,
                'label' => 'No Preventive Assistant',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_preventive_assistant_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 1098,
                'label' => 'No Orthodontist',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_orthodontist_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 1099,
                'label' => 'Recall Frequency',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'recall_frequency_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 1100,
                'label' => 'Next Recall',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'next_recall_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 1101,
                'label' => 'Pending',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'pending_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 1102,
                'label' => 'Confirmed',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'confirmed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 1103,
                'label' => 'No Recall',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_recall_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 1104,
                'label' => 'Date Of First Treatment',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'date_of_first_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 1105,
                'label' => 'Date Of Last Treatment',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'date_of_last_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 1106,
                'label' => 'Automatic Payment',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'automatic_payment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 1107,
                'label' => 'Automated Payment',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'automated_payment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 1108,
                'label' => 'General Practitioner',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'general_practitioner_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 1109,
                'label' => 'General Practitioner Pharmacy',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'general_practitioner_pharmacy_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 1110,
                'label' => 'No General Practitioner Registered',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_general_practitioner_registered_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 1111,
                'label' => 'No General Practitioner Pharmacy',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_general_practitioner_pharmacy_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 1112,
                'label' => 'Preferred Appointment Time',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'preferred_appointment_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 1113,
                'label' => 'No Time Selected',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_time_selected_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 1114,
                'label' => 'No A.E.T selected',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_a.e.t_selected_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 1115,
                'label' => 'No pharmacy registered',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_pharmacy_registered_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 1116,
                'label' => 'No Date Of First Treatment',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_date_of_first_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 1117,
                'label' => 'No Date Of Last Treatment',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_date_of_last_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 1118,
                'label' => 'No Account Number',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_account_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 1119,
                'label' => 'No Automatic Payment',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_automatic_payment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 1120,
                'label' => 'No Automated Payment',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_automated_payment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 1121,
                'label' => 'Add New Member',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'add_new_member_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 1122,
                'label' => 'Add New Family Member',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'add_new_family_member_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 1123,
                'label' => 'Family',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'family_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 1124,
                'label' => 'Add Existing Patient',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'add_existing_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 1125,
                'label' => 'Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 1126,
                'label' => 'No Family Members',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_family_members_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 1127,
                'label' => 'House Ext',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'house_ext_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 1128,
                'label' => 'No Language Chosen',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_language_chosen_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 1129,
                'label' => 'Select Any Extra Time',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'select_any_extra_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 1130,
                'label' => 'Finish Patient Biography Form First',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'finish_patient_biography_form_first_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 1131,
                'label' => 'Finish Patient Address Form First',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'finish_patient_address_form_first_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 1132,
                'label' => 'Patients Module',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'patients_module_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 1133,
                'label' => 'Human Resource Module',
                'view_id' => 11,
                'icon' => '',
                'slug' => 'human_resource_module_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 1134,
                'label' => 'Imaging Module',
                'view_id' => 15,
                'icon' => '',
                'slug' => 'imaging_module_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 1135,
                'label' => 'Settings Module',
                'view_id' => 12,
                'icon' => '',
                'slug' => 'settings_module_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 1136,
                'label' => 'Billing Module',
                'view_id' => 10,
                'icon' => '',
                'slug' => 'billing_module_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 1137,
                'label' => 'Insurance Module',
                'view_id' => 14,
                'icon' => '',
                'slug' => 'insurance_module_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 1138,
                'label' => 'Reports Module',
                'view_id' => 13,
                'icon' => '',
                'slug' => 'reports_module_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 1139,
                'label' => 'Receive System emails',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'receive_system_emails_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 1140,
                'label' => 'Receive Newsletters',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'receive_newsletters_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 1141,
                'label' => 'Receive Invoice Emails',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'receive_invoice_emails_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 1142,
                'label' => 'Passant Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'passant_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 1143,
                'label' => 'BSN is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'bsn_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 1144,
                'label' => 'Home Phone Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'home_phone_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 1145,
                'label' => 'Should Be Less Than 50 Characters',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'should_be_less_than_50_characters_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 1146,
                'label' => 'Invalid Email',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'invalid_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 1147,
                'label' => 'Date Of Birth Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'date_of_birth_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 1148,
                'label' => 'Patient Phone Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'patient_phone_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 1149,
                'label' => 'First Name Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'first_name_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 1150,
                'label' => 'Last Name Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'last_name_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 1151,
                'label' => 'Marital Status Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'marital_status_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 1152,
                'label' => 'Gender Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'gender_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 1153,
                'label' => 'Name Of Next Of Kin Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'name_of_next_of_kin_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 1154,
                'label' => 'Phone Number Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'phone_number_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 1155,
                'label' => 'Invalid NOK Email',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'invalid_nok_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 1156,
                'label' => 'Nationality Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'nationality_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 1157,
                'label' => 'Guardian Email Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'guardian_email_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 1158,
                'label' => 'Guardian Phone Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'guardian_phone_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 1159,
                'label' => 'Must be maximum 50 characters',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'must_be_maximum_50_characters_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 1160,
                'label' => 'Guardian Email is invalid',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'guardian_email_is_invalid_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 1161,
                'label' => 'Guardian name is required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'guardian_name_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 1162,
                'label' => 'Guardian Address is required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'guardian_address_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 1163,
                'label' => 'State is required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'state_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 1164,
                'label' => 'Home address is required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'home_address_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 1165,
                'label' => 'Postal code is required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'postal_code_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 1166,
                'label' => 'Four numbers two letters',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'four_numbers_two_letters_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 1167,
                'label' => 'Insurance Policy Number is required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'insurance_policy_number_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 1168,
                'label' => 'Referer Name is required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'referer_name_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 1169,
                'label' => 'Patients Notes',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'patients_notes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 1170,
                'label' => 'Referer Email is required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'referer_email_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 1171,
                'label' => 'Referer Phone is required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'referer_phone_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 1172,
                'label' => 'Patient Created Successfuly',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'patient_created_successfuly_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 1173,
                'label' => 'Treatment Information',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'treatment_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 1174,
                'label' => 'Dental Information',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'dental_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 1175,
                'label' => 'Dental Anamnese',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'dental_anamnese_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 1176,
                'label' => 'No risk assessment history',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_risk_assessment_history_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 1177,
                'label' => 'No risk assessment available for',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'no_risk_assessment_available_for_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 1178,
                'label' => 'Dental questions',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'dental_questions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 1179,
                'label' => 'Risk assessment history',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'risk_assessment_history_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 1180,
                'label' => 'Element',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'element_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 1181,
                'label' => 'Probing',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'probing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 1182,
                'label' => 'move to support',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'move_to_support_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 1183,
                'label' => 'Qualification Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'qualification_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 1184,
                'label' => 'Add Treatment',
                'view_id' => 2,
                'icon' => '',
                'slug' => 'add_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 1185,
                'label' => 'System Codes',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'system_codes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 1186,
                'label' => 'Manage Code that explain long descriptions',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_code_that_explain_long_descriptions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 1187,
                'label' => 'Codes',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'codes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 1188,
                'label' => 'Add Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 1189,
                'label' => 'Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 1190,
                'label' => 'There are no System Codes',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'there_are_no_system_codes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 1191,
                'label' => 'Edit Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'edit_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 1192,
                'label' => 'Disability Status Is Required',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'disability_status_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 1193,
                'label' => 'Token Expire',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'token_expire_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 1194,
                'label' => 'Check BSN',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'check_bsn_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 1195,
                'label' => 'Check WIZ',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'check_wiz_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 1196,
                'label' => 'Navigation',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'navigation_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 1197,
                'label' => 'Common Phrases',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'common_phrases_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 1198,
                'label' => 'Medical Questions',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'medical_questions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 1199,
                'label' => 'Add Medical Questions',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'add_medical_questions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 1200,
                'label' => 'communication',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'communication_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 1201,
                'label' => 'send',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'send_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 1202,
                'label' => 'No message',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_message_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 1203,
                'label' => 'message',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'message_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 1204,
                'label' => 'RESET',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'reset_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 1205,
                'label' => 'Junk',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'junk_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 1206,
                'label' => 'Other',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'other_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 1207,
                'label' => 'Patient info',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_info_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 1208,
                'label' => 'Phone Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'phone_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 1209,
                'label' => 'SEND SMS',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'send_sms_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 1210,
                'label' => 'inbox',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'inbox_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 1211,
                'label' => 'Back',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'back_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 1212,
                'label' => 'work',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'work_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 1213,
                'label' => 'Open Camera',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'open_camera_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 1214,
                'label' => 'Close Camera',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'close_camera_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 1215,
                'label' => 'Upload Image',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'upload_image_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 1216,
                'label' => 'Select Phase',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_phase_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 1217,
                'label' => 'Mark As Tentative',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'mark_as_tentative_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 1218,
                'label' => 'Cancel Attendees',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'cancel_attendees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 1219,
                'label' => 'Add Assistants',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'add_assistants_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 1220,
                'label' => 'Loading Assistants',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'loading_assistants_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 1221,
                'label' => 'Apply Slot Filters',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'apply_slot_filters_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 1222,
                'label' => 'Frequency',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'frequency_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 1223,
                'label' => 'Select Event Days',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_event_days_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 1224,
                'label' => 'until',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'until_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 1225,
                'label' => 'Expected Material',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'expected_material_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 1226,
                'label' => 'Expected Date',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'expected_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 1227,
                'label' => 'Next Treatment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'next_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 1228,
                'label' => 'Cancel Treatment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'cancel_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 1229,
            'label' => 'View Availability Suggestion(s)',
                'view_id' => 3,
                'icon' => '',
            'slug' => 'view_availability_suggestion(s)_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 1230,
                'label' => 'Available slots for the selected doctors',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'available_slots_for_the_selected_doctors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 1231,
                'label' => 'Filter Appointments',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'filter_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 1232,
                'label' => 'fetching time slots',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'fetching_time_slots_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 1233,
                'label' => 'APPOINTMENT DETAILS',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'appointment_details_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 1234,
                'label' => 'Title',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'title_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 1235,
                'label' => 'Select Color',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_color_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 1236,
                'label' => 'Color',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'color_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 1237,
                'label' => 'Physical Address',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'physical_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 1238,
                'label' => 'Add other attendees',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'add_other_attendees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 1239,
                'label' => 'Day of  week',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'day_of__week_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 1240,
                'label' => 'Doctor not available at this time of day',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'doctor_not_available_at_this_time_of_day_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 1241,
                'label' => 'Schedule Appointment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'schedule_appointment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 1242,
                'label' => 'busy',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'busy_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 1243,
                'label' => 'Mark as Private',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'mark_as_private_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 1244,
                'label' => 'Attendee Options',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'attendee_options_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 1245,
                'label' => 'This field is required',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'this_field_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 1246,
                'label' => 'Tentative',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'tentative_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 1247,
                'label' => 'Free',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'free_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 1248,
                'label' => 'Optional Doctors',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'optional_doctors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 1249,
                'label' => 'asc',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'asc_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 1250,
                'label' => 'desc',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'desc_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 1251,
                'label' => 'add family',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'add_family_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 1252,
                'label' => 'Add Family Members',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'add_family_members_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 1253,
                'label' => 'Family Members',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'family_members_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 1254,
                'label' => 'Use a Treatment Plan',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'use_a_treatment_plan_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 1255,
                'label' => 'Plan phase',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'plan_phase_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 1256,
                'label' => 'Assistants',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'assistants_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 1257,
                'label' => 'third',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'third_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 1258,
                'label' => 'on the',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'on_the_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 1259,
                'label' => 'Technical work details',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'technical_work_details_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 1260,
                'label' => 'Available slots for the selected doctor will appear here',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'available_slots_for_the_selected_doctor_will_appear_here_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 1261,
                'label' => 'Loading available slots',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'loading_available_slots_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 1262,
                'label' => 'on the',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'on_the_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 1263,
                'label' => 'System log report',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'system_log_report_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 1264,
                'label' => 'every',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'every_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 1265,
                'label' => 'Set Recurrence',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'set_recurrence_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 1266,
                'label' => 'Table View',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'table_view_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 1267,
                'label' => 'Card View',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'card_view_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 1268,
                'label' => 'Contact name',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'contact_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 1269,
                'label' => 'Type ',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'type__text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 1270,
                'label' => 'select start date',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_start_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 1271,
                'label' => 'Select end date',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_end_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 1272,
                'label' => 'select start time',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_start_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 1273,
                'label' => 'select end time',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_end_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 1274,
                'label' => 'Select Agenda Days',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_agenda_days_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 1275,
                'label' => 'Days of the week',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'days_of_the_week_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 1276,
                'label' => 'View availability suggestions',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'view_availability_suggestions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 1277,
                'label' => 'week',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'week_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 1278,
                'label' => 'Cancel Next Treatment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'cancel_next_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 1279,
                'label' => 'Add Next Treatment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'add_next_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 1280,
                'label' => 'checkin',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'checkin_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 1281,
                'label' => 'Conversation thread is empty',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'conversation_thread_is_empty_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 1282,
                'label' => 'User not found',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'user_not_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 1283,
                'label' => 'Coming Soon ',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'coming_soon__text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 1284,
                'label' => 'Loading actions',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_actions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 1285,
                'label' => 'Filter by action',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'filter_by_action_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 1286,
                'label' => 'log date filter',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'log_date_filter_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 1287,
                'label' => 'birth date filter',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'birth_date_filter_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 1288,
                'label' => 'Doctor Available Days',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'doctor_available_days_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 1289,
                'label' => 'search by BSN',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_by_bsn_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 1290,
                'label' => 'No patient found',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'no_patient_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 1291,
                'label' => 'Filters',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'filters_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 1292,
                'label' => 'New waiting appointment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'new_waiting_appointment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 1293,
                'label' => 'Press the call next button below to serve your next visitor',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'press_the_call_next_button_below_to_serve_your_next_visitor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 1294,
                'label' => 'visitors waiting in your queue',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'visitors_waiting_in_your_queue_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 1295,
                'label' => 'you have',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'you_have_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 1296,
                'label' => 'fetching patient',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'fetching_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 1297,
                'label' => 'No patients Found',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'no_patients_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 1298,
                'label' => 'BSN',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'bsn_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 1299,
                'label' => 'All appointments slotted for',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'all_appointments_slotted_for_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 1300,
                'label' => 'New Patient',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'new_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 1301,
                'label' => 'Patients Today',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'patients_today_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 1302,
                'label' => 'Overdue Appointments',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'overdue_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 1303,
                'label' => 'Cancelled Appointments',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'cancelled_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 1304,
                'label' => 'No doctors found',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'no_doctors_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 1305,
                'label' => 'Loading doctors',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'loading_doctors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 1306,
                'label' => 'filter',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'filter_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 1307,
                'label' => 'logs',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'logs_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 1308,
                'label' => 'department filter',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'department_filter_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 1309,
                'label' => 'Branch A Doctor',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'branch_a_doctor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 1310,
                'label' => 'Update Biography',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'update_biography_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 1311,
                'label' => 'Update Address',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'update_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 1312,
                'label' => 'Update Insurance',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'update_insurance_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 1313,
                'label' => 'Bio Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'bio_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 1314,
                'label' => 'Occupation',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'occupation_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 1315,
                'label' => 'Home Address ',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'home_address__text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 1316,
                'label' => 'No home address set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_home_address_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 1317,
                'label' => 'No state set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_state_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 1318,
                'label' => 'Mon',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'mon_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 1319,
                'label' => 'Tue',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'tue_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 1320,
                'label' => 'Wed',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'wed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 1321,
                'label' => 'Thur',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'thur_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 1322,
                'label' => 'Fri',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'fri_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 1323,
                'label' => 'Sat',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'sat_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 1324,
                'label' => 'Sun',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'sun_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 1325,
                'label' => 'Section',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'section_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 1326,
                'label' => 'Action',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'action_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 1327,
                'label' => 'Loading logs',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_logs_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 1328,
                'label' => 'Session Settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'session_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 1329,
                'label' => 'Login session',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'login_session_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 1330,
                'label' => 'Max Login Attempts',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'max_login_attempts_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 1331,
                'label' => 'Advanced Reports',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'advanced_reports_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 1332,
                'label' => 'Error Opening Camera, Please Enable Permissions To Continue',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'error_opening_camera,_please_enable_permissions_to_continue_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 1333,
                'label' => 'No postalcode set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_postalcode_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 1334,
                'label' => 'Leave applications',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'leave_applications_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 1335,
                'label' => 'Other Information',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'other_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 1336,
                'label' => 'Loading leave applications',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_leave_applications_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 1337,
                'label' => 'Application Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'application_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 1338,
                'label' => 'Default Facility Time Interval',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'default_facility_time_interval_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 1339,
                'label' => 'Backup Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'backup_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 1340,
                'label' => 'Download',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'download_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 1341,
                'label' => 'No Database Backups found',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_database_backups_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 1342,
                'label' => 'No other details found',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_other_details_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 1343,
                'label' => 'Confidentiality Warning',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'confidentiality_warning_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 1344,
                'label' => 'Database backup Settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'database_backup_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 1345,
                'label' => 'Backup Rentention',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'backup_rentention_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 1346,
                'label' => 'Notification Email',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'notification_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 => 
            array (
                'id' => 1347,
                'label' => 'Period to keep all backups',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'period_to_keep_all_backups_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 => 
            array (
                'id' => 1348,
                'label' => 'Keep daily backups for days',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'keep_daily_backups_for_days_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 => 
            array (
                'id' => 1349,
                'label' => 'Keep weekly backups for weeks',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'keep_weekly_backups_for_weeks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            349 => 
            array (
                'id' => 1350,
                'label' => 'Keep monthly backups for months',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'keep_monthly_backups_for_months_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            350 => 
            array (
                'id' => 1351,
                'label' => 'Keep yearly backups for years',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'keep_yearly_backups_for_years_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            351 => 
            array (
                'id' => 1352,
                'label' => 'Delete oldest backups when using more megabytes greater than 5000',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'delete_oldest_backups_when_using_more_megabytes_greater_than_5000_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            352 => 
            array (
                'id' => 1353,
                'label' => 'Storage disk',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'storage_disk_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            353 => 
            array (
                'id' => 1354,
                'label' => 'Instructions',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'instructions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            354 => 
            array (
                'id' => 1355,
                'label' => 'Please be carefull when you are configuring Retention Period For incorrect configuration you will get error at the time of order place new registration sending newsletter',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'please_be_carefull_when_you_are_configuring_retention_period_for_incorrect_configuration_you_will_get_error_at_the_time_of_order_place_new_registration_sending_newsletter_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            355 => 
            array (
                'id' => 1356,
                'label' => 'Select a retention period for which backups should be run',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_a_retention_period_for_which_backups_should_be_run_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            356 => 
            array (
                'id' => 1357,
                'label' => 'Set the admin email address that will receive backed up details',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'set_the_admin_email_address_that_will_receive_backed_up_details_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            357 => 
            array (
                'id' => 1358,
                'label' => 'Set the period for which weekly backups should last',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'set_the_period_for_which_weekly_backups_should_last_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            358 => 
            array (
                'id' => 1359,
                'label' => 'Set the period for which monthly backups should last',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'set_the_period_for_which_monthly_backups_should_last_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            359 => 
            array (
                'id' => 1360,
                'label' => 'Set the period for which annual backups should last',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'set_the_period_for_which_annual_backups_should_last_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            360 => 
            array (
                'id' => 1361,
                'label' => 'Set the email address that will receive backup information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'set_the_email_address_that_will_receive_backup_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            361 => 
            array (
                'id' => 1362,
                'label' => 'Daily',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'daily_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            362 => 
            array (
                'id' => 1363,
                'label' => 'Weekly',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'weekly_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            363 => 
            array (
                'id' => 1364,
                'label' => 'Monthly',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'monthly_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            364 => 
            array (
                'id' => 1365,
                'label' => 'Annually',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'annually_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            365 => 
            array (
                'id' => 1366,
                'label' => 'Azure File Storage Configurations',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'azure_file_storage_configurations_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            366 => 
            array (
                'id' => 1367,
                'label' => 'Third Party Settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'third_party_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            367 => 
            array (
                'id' => 1368,
                'label' => 'File System Settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'file_system_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            368 => 
            array (
                'id' => 1369,
                'label' => 'Payment methods Settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'payment_methods_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            369 => 
            array (
                'id' => 1370,
                'label' => 'SMTP Settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'smtp_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            370 => 
            array (
                'id' => 1371,
                'label' => 'Database backup',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'database_backup_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            371 => 
            array (
                'id' => 1372,
                'label' => 'SMTP Settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'smtp_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            372 => 
            array (
                'id' => 1373,
                'label' => 'MAIL HOST',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mail_host_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            373 => 
            array (
                'id' => 1374,
                'label' => 'MAIL PORT',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mail_port_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            374 => 
            array (
                'id' => 1375,
                'label' => 'MAIL USERNAME',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mail_username_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            375 => 
            array (
                'id' => 1376,
                'label' => 'MAIL PASSWORD',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mail_password_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            376 => 
            array (
                'id' => 1377,
                'label' => 'MAIL ENCRYPTION',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mail_encryption_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            377 => 
            array (
                'id' => 1378,
                'label' => 'MAIL FROM ADDRESS',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mail_from_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            378 => 
            array (
                'id' => 1379,
                'label' => 'MAIL FROM NAME',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mail_from_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            379 => 
            array (
                'id' => 1380,
                'label' => 'For Non SSL',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'for_non_ssl_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            380 => 
            array (
                'id' => 1381,
                'label' => 'For SSL',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'for_ssl_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            381 => 
            array (
                'id' => 1382,
                'label' => 'Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Drivern',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_sendmail_for_mail_driver_if_you_face_any_issue_after_configuring_smtp_as_mail_drivern_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            382 => 
            array (
                'id' => 1383,
                'label' => 'Set Mail Host according to your server Mail Client Manual Settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'set_mail_host_according_to_your_server_mail_client_manual_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            383 => 
            array (
                'id' => 1384,
                'label' => 'Set Mail port as 587',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'set_mail_port_as_587_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            384 => 
            array (
                'id' => 1385,
                'label' => 'Set Mail Encryption as ssl if you face issue with tls',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'set_mail_encryption_as_ssl_if_you_face_issue_with_tls_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            385 => 
            array (
                'id' => 1386,
                'label' => 'Set Mail port as 465',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'set_mail_port_as_465_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            386 => 
            array (
                'id' => 1387,
                'label' => 'Set Mail Encryption as ssl',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'set_mail_encryption_as_ssl_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            387 => 
            array (
                'id' => 1388,
                'label' => 'Decline',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'decline_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            388 => 
            array (
                'id' => 1389,
                'label' => 'System Settings',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'system_settings_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            389 => 
            array (
                'id' => 1390,
                'label' => 'Manage Database backup settings and more other configs',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_database_backup_settings_and_more_other_configs_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            390 => 
            array (
                'id' => 1391,
                'label' => 'Display Database Backup List Download etc',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'display_database_backup_list_download_etc_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            391 => 
            array (
                'id' => 1392,
                'label' => 'Manage Database backup settings smtp payment methods file systems etc',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manage_database_backup_settings_smtp_payment_methods_file_systems_etc_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            392 => 
            array (
                'id' => 1393,
                'label' => 'This Invoice Is Already Paid',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'this_invoice_is_already_paid_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            393 => 
            array (
                'id' => 1394,
                'label' => 'Emergency Contact Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'emergency_contact_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            394 => 
            array (
                'id' => 1395,
                'label' => 'Emergency Contact Email Address',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'emergency_contact_email_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            395 => 
            array (
                'id' => 1396,
                'label' => 'Emergency Contact Phone Number',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'emergency_contact_phone_number_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            396 => 
            array (
                'id' => 1397,
                'label' => 'Emergency Contact Home Address',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'emergency_contact_home_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            397 => 
            array (
                'id' => 1398,
                'label' => 'Loading Codes',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_codes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            398 => 
            array (
                'id' => 1399,
                'label' => 'Search by Code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_by_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            399 => 
            array (
                'id' => 1400,
                'label' => 'Loading appointments',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'loading_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            400 => 
            array (
                'id' => 1401,
                'label' => 'Continue To',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'continue_to_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            401 => 
            array (
                'id' => 1402,
                'label' => 'Back To',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'back_to_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            402 => 
            array (
                'id' => 1403,
                'label' => 'Extension',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'extension_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            403 => 
            array (
                'id' => 1404,
                'label' => 'Accept',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'accept_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            404 => 
            array (
                'id' => 1405,
                'label' => 'Sub',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'sub_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            405 => 
            array (
                'id' => 1406,
                'label' => 'SignIn',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'signin_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            406 => 
            array (
                'id' => 1407,
                'label' => 'Street Address',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'street_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            407 => 
            array (
                'id' => 1408,
                'label' => 'Province is required',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'province_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            408 => 
            array (
                'id' => 1409,
                'label' => 'City is required',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'city_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            409 => 
            array (
                'id' => 1410,
                'label' => 'House Number is Required',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'house_number_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            410 => 
            array (
                'id' => 1411,
                'label' => 'Extension is required',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'extension_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            411 => 
            array (
                'id' => 1412,
                'label' => 'Update Log Channel',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_log_channel_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            412 => 
            array (
                'id' => 1413,
                'label' => 'Level Name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'level_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            413 => 
            array (
                'id' => 1414,
                'label' => 'Level',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'level_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            414 => 
            array (
                'id' => 1415,
                'label' => 'Adding',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'adding_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            415 => 
            array (
                'id' => 1416,
                'label' => 'Add',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            416 => 
            array (
                'id' => 1417,
                'label' => 'Invalid Phone Number Format',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'invalid_phone_number_format_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            417 => 
            array (
                'id' => 1418,
                'label' => 'Invalid Characters',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'invalid_characters_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            418 => 
            array (
                'id' => 1419,
                'label' => 'Available slots for the selected doctor will appear here',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'available_slots_for_the_selected_doctor_will_appear_here_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            419 => 
            array (
                'id' => 1420,
                'label' => 'clear slot filters',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'clear_slot_filters_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            420 => 
            array (
                'id' => 1421,
                'label' => 'Select Appointment Type',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_appointment_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            421 => 
            array (
                'id' => 1422,
                'label' => 'You do not have anyone in your waiting room',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'you_do_not_have_anyone_in_your_waiting_room_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            422 => 
            array (
                'id' => 1423,
                'label' => 'good morning',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'good_morning_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            423 => 
            array (
                'id' => 1424,
                'label' => 'good afternoon',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'good_afternoon_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            424 => 
            array (
                'id' => 1425,
                'label' => 'good evening',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'good_evening_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            425 => 
            array (
                'id' => 1426,
                'label' => 'well done!',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'well_done!_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            426 => 
            array (
                'id' => 1427,
                'label' => 'You do not have anyone in your queue',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'you_do_not_have_anyone_in_your_queue_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            427 => 
            array (
                'id' => 1428,
                'label' => 'calling patient',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'calling_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            428 => 
            array (
                'id' => 1429,
                'label' => 'visitors waiting in your queue',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'visitors_waiting_in_your_queue_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            429 => 
            array (
                'id' => 1430,
                'label' => 'set tasks or reminders',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'set_tasks_or_reminders_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            430 => 
            array (
                'id' => 1431,
                'label' => 'Task description',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'task_description_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            431 => 
            array (
                'id' => 1432,
                'label' => 'Save Task',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'save_task_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            432 => 
            array (
                'id' => 1433,
                'label' => 'Call Back',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'call_back_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            433 => 
            array (
                'id' => 1434,
                'label' => 'Public Holidays',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'public_holidays_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            434 => 
            array (
                'id' => 1435,
                'label' => 'Choose the leave dates',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'choose_the_leave_dates_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            435 => 
            array (
                'id' => 1436,
                'label' => 'Update Zorgmail Address book credentials',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'update_zorgmail_address_book_credentials_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            436 => 
            array (
                'id' => 1437,
                'label' => 'Username',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'username_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            437 => 
            array (
                'id' => 1438,
                'label' => 'Reason For rejecting',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'reason_for_rejecting_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            438 => 
            array (
                'id' => 1439,
                'label' => 're-submit',
                'view_id' => 5,
                'icon' => '',
                'slug' => 're-submit_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            439 => 
            array (
                'id' => 1440,
                'label' => 'Approve',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'approve_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            440 => 
            array (
                'id' => 1441,
                'label' => 'No leave Types Available',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_leave_types_available_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            441 => 
            array (
                'id' => 1442,
                'label' => 'Configure',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'configure_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            442 => 
            array (
                'id' => 1443,
                'label' => 'Choose file',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_file_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            443 => 
            array (
                'id' => 1444,
                'label' => 'Upload Data File',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'upload_data_file_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            444 => 
            array (
                'id' => 1445,
                'label' => 'File',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'file_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            445 => 
            array (
                'id' => 1446,
                'label' => 'Hint',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'hint_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            446 => 
            array (
                'id' => 1447,
                'label' => 'Add Pricing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'add_pricing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            447 => 
            array (
                'id' => 1448,
                'label' => 'search category',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_category_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            448 => 
            array (
                'id' => 1449,
                'label' => 'Enter item code',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'enter_item_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            449 => 
            array (
                'id' => 1450,
                'label' => 'This price field is required',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'this_price_field_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            450 => 
            array (
                'id' => 1451,
                'label' => 'Registration Date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'registration_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            451 => 
            array (
                'id' => 1452,
                'label' => 'Important Dates',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'important_dates_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            452 => 
            array (
                'id' => 1453,
                'label' => 'Modified',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'modified_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            453 => 
            array (
                'id' => 1454,
                'label' => 'Bulk Action',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'bulk_action_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            454 => 
            array (
                'id' => 1455,
                'label' => 'Invoices History',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'invoices_history_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            455 => 
            array (
                'id' => 1456,
                'label' => 'Patient Profile',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_profile_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            456 => 
            array (
                'id' => 1457,
                'label' => 'NEW INVOICE',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'new_invoice_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            457 => 
            array (
                'id' => 1458,
                'label' => 'checking queue',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'checking_queue_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            458 => 
            array (
                'id' => 1459,
                'label' => 'no BSN set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_bsn_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            459 => 
            array (
                'id' => 1460,
                'label' => 'System logs',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'system_logs_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            460 => 
            array (
                'id' => 1461,
                'label' => 'View Tasks',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'view_tasks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            461 => 
            array (
                'id' => 1462,
                'label' => 'Loading Tasks',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'loading_tasks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            462 => 
            array (
                'id' => 1463,
                'label' => 'Guardian Information',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'guardian_information_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            463 => 
            array (
                'id' => 1464,
                'label' => 'Guardian name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'guardian_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            464 => 
            array (
                'id' => 1465,
                'label' => 'No guardian name set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_guardian_name_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            465 => 
            array (
                'id' => 1466,
                'label' => 'Guardian phone',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'guardian_phone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            466 => 
            array (
                'id' => 1467,
                'label' => 'No guardian phone set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_guardian_phone_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            467 => 
            array (
                'id' => 1468,
                'label' => 'Guardian email',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'guardian_email_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            468 => 
            array (
                'id' => 1469,
                'label' => 'No guardian email set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_guardian_email_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            469 => 
            array (
                'id' => 1470,
                'label' => 'Guardian Address',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'guardian_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            470 => 
            array (
                'id' => 1471,
                'label' => 'No guardian address set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_guardian_address_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            471 => 
            array (
                'id' => 1472,
                'label' => 'Next of kin name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'next_of_kin_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            472 => 
            array (
                'id' => 1473,
                'label' => 'No next of kin name set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_next_of_kin_name_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            473 => 
            array (
                'id' => 1474,
                'label' => 'No next of kin email set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_next_of_kin_email_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            474 => 
            array (
                'id' => 1475,
                'label' => 'No next of kin phone set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_next_of_kin_phone_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            475 => 
            array (
                'id' => 1476,
                'label' => 'Refered by',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'refered_by_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            476 => 
            array (
                'id' => 1477,
                'label' => 'Referee name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'referee_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            477 => 
            array (
                'id' => 1478,
                'label' => 'No referee name set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_referee_name_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            478 => 
            array (
                'id' => 1479,
                'label' => 'no referee email set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_referee_email_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            479 => 
            array (
                'id' => 1480,
                'label' => 'No referee phone set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_referee_phone_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            480 => 
            array (
                'id' => 1481,
                'label' => 'First treatment date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'first_treatment_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            481 => 
            array (
                'id' => 1482,
                'label' => 'No first treatment date set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_first_treatment_date_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            482 => 
            array (
                'id' => 1483,
                'label' => 'Last treatment date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'last_treatment_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            483 => 
            array (
                'id' => 1484,
                'label' => 'no last treatment date set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_last_treatment_date_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            484 => 
            array (
                'id' => 1485,
                'label' => 'Delete Supervisor',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'delete_supervisor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            485 => 
            array (
                'id' => 1486,
                'label' => 'This action cannot be reverted',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'this_action_cannot_be_reverted_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            486 => 
            array (
                'id' => 1487,
                'label' => 'delete department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'delete_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            487 => 
            array (
                'id' => 1488,
                'label' => 'delete sub department',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'delete_sub_department_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            488 => 
            array (
                'id' => 1489,
                'label' => 'Delete Attendance Time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'delete_attendance_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            489 => 
            array (
                'id' => 1490,
                'label' => 'Ended',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'ended_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            490 => 
            array (
                'id' => 1491,
                'label' => 'Delete Leave Type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'delete_leave_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            491 => 
            array (
                'id' => 1492,
                'label' => 'Employee audit logs',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'employee_audit_logs_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            492 => 
            array (
                'id' => 1493,
                'label' => 'Search key word',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_key_word_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            493 => 
            array (
                'id' => 1494,
                'label' => 'User',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'user_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            494 => 
            array (
                'id' => 1495,
                'label' => 'Last activity',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'last_activity_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            495 => 
            array (
                'id' => 1496,
                'label' => 'Last activity date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'last_activity_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            496 => 
            array (
                'id' => 1497,
                'label' => 'Filter by date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'filter_by_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            497 => 
            array (
                'id' => 1498,
                'label' => 'Delete Position',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'delete_position_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            498 => 
            array (
                'id' => 1499,
                'label' => 'Delete Employee Types',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'delete_employee_types_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            499 => 
            array (
                'id' => 1500,
                'label' => 'January',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'january_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('elements')->insert(array (
            0 => 
            array (
                'id' => 1501,
                'label' => 'February',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'february_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 1502,
                'label' => 'March',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'march_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 1503,
                'label' => 'April',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'april_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 1504,
                'label' => 'May',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'may_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 1505,
                'label' => 'June',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'june_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 1506,
                'label' => 'July',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'july_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 1507,
                'label' => 'August',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'august_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 1508,
                'label' => 'September',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'september_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 1509,
                'label' => 'October',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'october_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 1510,
                'label' => 'November',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'november_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 1511,
                'label' => 'December',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'december_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 1512,
                'label' => 'Mother',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mother_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 1513,
                'label' => 'Father',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'father_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 1514,
                'label' => 'Brother',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'brother_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 1515,
                'label' => 'Sister',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'sister_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 1516,
                'label' => 'Spouse',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'spouse_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 1517,
                'label' => 'Cousin',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'cousin_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 1518,
                'label' => 'Daughter',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'daughter_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 1519,
                'label' => 'Son',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'son_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 1520,
                'label' => 'Uncle',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'uncle_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 1521,
                'label' => 'Aunt',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'aunt_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 1522,
                'label' => 'Grandparent',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'grandparent_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 1523,
                'label' => 'As Non Patient Family Memer',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'as_non_patient_family_memer_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 1524,
                'label' => 'As New Patient',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'as_new_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 1525,
                'label' => 'As Custodian',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'as_custodian_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 1526,
                'label' => 'Unassigned Tasks',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'unassigned_tasks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 1527,
                'label' => 'Completed Tasks',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'completed_tasks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 1528,
                'label' => 'OverDue Tasks',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'overdue_tasks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 1529,
                'label' => 'Archived Patients List',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'archived_patients_list_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 1530,
                'label' => 'fetching tasks',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'fetching_tasks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 1531,
                'label' => 'Are you sure you want to archive this patient',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'are_you_sure_you_want_to_archive_this_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 1532,
                'label' => 'You can revert this action',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'you_can_revert_this_action_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 1533,
                'label' => 'Yes archive the patient',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'yes_archive_the_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 1534,
                'label' => 'Archived Patients List',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'archived_patients_list_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 1535,
                'label' => 'Patient has been archived',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_has_been_archived_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 1536,
                'label' => 'Are you sure you want to restore this patient',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'are_you_sure_you_want_to_restore_this_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 1537,
                'label' => 'Patient has been restored',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patient_has_been_restored_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 1538,
                'label' => 'Restored',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'restored_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 1539,
                'label' => 'Exporting',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'exporting_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 1540,
                'label' => 'Module reports',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'module_reports_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 1541,
                'label' => 'Keyword',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'keyword_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 1542,
                'label' => 'Password Strength Configurations',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'password_strength_configurations_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 1543,
                'label' => 'Allow Numbers',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'allow_numbers_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 1544,
                'label' => 'Allow Symbols',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'allow_symbols_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 1545,
                'label' => 'Allow Uppercase Characters',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'allow_uppercase_characters_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 1546,
                'label' => 'Minimum Password Length',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'minimum_password_length_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 1547,
                'label' => 'Ask a question or post an update',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'ask_a_question_or_post_an_update_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 1548,
                'label' => 'Log date',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'log_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 1549,
                'label' => 'Telephone services coming soon.',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'telephone_services_coming_soon._text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 1550,
                'label' => 'weldone',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'weldone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 1551,
                'label' => 'You do not have anyone in your waiting room',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'you_do_not_have_anyone_in_your_waiting_room_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 1552,
                'label' => 'waiting queue',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'waiting_queue_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 1553,
                'label' => 'Tasks',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'tasks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 1554,
                'label' => 'loading leave type',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_leave_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 1555,
                'label' => 'leave type not found',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'leave_type_not_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 1556,
                'label' => 'No number set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_number_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 1557,
                'label' => 'Error Creating new Task',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'error_creating_new_task_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 1558,
                'label' => 'No employee is set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_employee_is_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 1559,
                'label' => 'Task due date is required',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'task_due_date_is_required_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 1560,
                'label' => 'Number of invoices',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'number_of_invoices_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 1561,
                'label' => 'Date submitted',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'date_submitted_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 1562,
                'label' => 'Unpaid Invoices',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'unpaid_invoices_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 1563,
                'label' => 'System Default Currency',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'system_default_currency_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 1564,
                'label' => 'Symbol Format',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'symbol_format_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 1565,
                'label' => 'Set Currency Formats',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'set_currency_formats_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 1566,
                'label' => 'Decimal Separator',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'decimal_separator_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 1567,
                'label' => 'No of decimals',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_of_decimals_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 1568,
                'label' => 'Shorten Large Price',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'shorten_large_price_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 1569,
                'label' => 'Loading appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 1570,
                'label' => 'Loading treatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 1571,
                'label' => 'monthly registered employees',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'monthly_registered_employees_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 1572,
                'label' => 'SET REMINDERS',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'set_reminders_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 1573,
                'label' => 'Payment Mode',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'payment_mode_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 1574,
                'label' => 'Select Payment Mode',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_payment_mode_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 1575,
                'label' => 'Bachelors',
                'view_id' => 6,
                'icon' => '',
                'slug' => 'bachelors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 1576,
                'label' => 'Masters',
                'view_id' => 7,
                'icon' => '',
                'slug' => 'masters_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 1577,
                'label' => 'Credit Card',
                'view_id' => 8,
                'icon' => '',
                'slug' => 'credit_card_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 1578,
                'label' => 'Diploma',
                'view_id' => 9,
                'icon' => '',
                'slug' => 'diploma_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 1579,
                'label' => 'Certificate',
                'view_id' => 10,
                'icon' => '',
                'slug' => 'certificate_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 1580,
                'label' => 'phd',
                'view_id' => 11,
                'icon' => '',
                'slug' => 'phd_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 1581,
                'label' => 'Due',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'due_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 1582,
                'label' => 'Send',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'send_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 1583,
                'label' => 'dismissing patient',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'dismissing_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 1584,
                'label' => 'returning patient',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'returning_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 1585,
                'label' => 'Add required doctors',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'add_required_doctors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 1586,
                'label' => 'Event Title',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'event_title_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 1587,
                'label' => 'Event Code',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'event_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 1588,
                'label' => 'email address',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'email_address_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 1589,
                'label' => 'Week of the month',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'week_of_the_month_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 1590,
                'label' => 'Event Days ',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'event_days__text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 1591,
                'label' => 'Select event days',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_event_days_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 1592,
                'label' => 'and',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'and_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 1593,
                'label' => 'on',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'on_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 1594,
                'label' => 'Selected Color',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'selected_color_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 1595,
                'label' => 'Schedule Appointment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'schedule_appointment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 1596,
                'label' => 'type',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 1597,
                'label' => 'am',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'am_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 1598,
                'label' => 'pm',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'pm_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 1599,
                'label' => 'ok',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'ok_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 1600,
                'label' => 'Assigned Doctor',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'assigned_doctor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 1601,
                'label' => 'search patients',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'search_patients_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 1602,
                'label' => 'Required Doctors',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'required_doctors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 1603,
                'label' => 'Total Amount',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'total_amount_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 1604,
                'label' => 'No total amount set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_total_amount_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 1605,
                'label' => 'Calendar View',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'calendar_view_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 1606,
                'label' => 'Event Type',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'event_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 1607,
                'label' => 'Amount Paid',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'amount_paid_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 1608,
                'label' => 'Doctor slots',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'doctor_slots_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 1609,
                'label' => 'No amount paid is set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_amount_paid_is_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 1610,
                'label' => '',
                'view_id' => 6,
                'icon' => '',
                'slug' => '_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 1611,
                'label' => 'Branch A Doctors',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'branch_a_doctors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 1612,
                'label' => 'search by name or type',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'search_by_name_or_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 1613,
                'label' => 'Doctor Not Found',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'doctor_not_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 1614,
                'label' => 'Reset',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'reset_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 1615,
                'label' => 'Select Patient',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 1616,
                'label' => 'Loading Patients',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'loading_patients_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 1617,
                'label' => 'Loading Treatments',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'loading_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 1618,
                'label' => 'select treatment plan',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_treatment_plan_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 1619,
                'label' => 'treatment plan',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'treatment_plan_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 1620,
                'label' => 'Main Doctor',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'main_doctor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 1621,
                'label' => 'Amount due',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'amount_due_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 1622,
                'label' => 'No amount due is set',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_amount_due_is_set_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 1623,
                'label' => 'procedures',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'procedures_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 1624,
                'label' => 'Select Frequency',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_frequency_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 1625,
                'label' => 'Does not repeat',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'does_not_repeat_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 1626,
                'label' => 'Next Treatment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'next_treatment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 1627,
                'label' => 'Appointment Types',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'appointment_types_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 1628,
                'label' => 'No VAT is set ',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_vat_is_set__text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 1629,
                'label' => 'Title',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'title_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 1630,
                'label' => 'code',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 1631,
                'label' => 'Event Types',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'event_types_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 1632,
                'label' => 'New Type',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'new_type_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 1633,
                'label' => 'Types List',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'types_list_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 1634,
                'label' => 'Configuration Details',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'configuration_details_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 1635,
                'label' => 'Enter Duration',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'enter_duration_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 1636,
                'label' => 'duration',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'duration_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 1637,
                'label' => 'minutes',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'minutes_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 1638,
                'label' => 'mins',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'mins_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 1639,
                'label' => 'Select Doctor',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_doctor_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 1640,
                'label' => 'Loading Users',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'loading_users_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 1641,
                'label' => 'Contract start date',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'contract_start_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 1642,
                'label' => 'Contract end date',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'contract_end_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 1643,
                'label' => 'No results found or All the week days have been chosen',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'no_results_found_or_all_the_week_days_have_been_chosen_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 1644,
                'label' => 'Search week days',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'search_week_days_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 1645,
                'label' => 'monday',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'monday_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 1646,
                'label' => 'tuesday',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'tuesday_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 1647,
                'label' => 'wednesday',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'wednesday_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 1648,
                'label' => 'thursday',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'thursday_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 1649,
                'label' => 'friday',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'friday_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 1650,
                'label' => 'saturday',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'saturday_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 1651,
                'label' => 'sunday',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'sunday_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 1652,
                'label' => 'Breaks',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'breaks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 1653,
                'label' => 'done',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'done_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 1654,
                'label' => 'No week selected yet',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'no_week_selected_yet_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 1655,
                'label' => 'Bi working weeks',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'bi_working_weeks_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 1656,
                'label' => 'No results found',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'no_results_found_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 1657,
                'label' => 'after',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'after_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 1658,
                'label' => 'Appointment stages',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'appointment_stages_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 1659,
                'label' => 'Duration from previous',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'duration_from_previous_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 1660,
                'label' => 'waiting time',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'waiting_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 1661,
                'label' => 'time unit',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'time_unit_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 1662,
                'label' => 'Back to calendar',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'back_to_calendar_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 1663,
                'label' => 'clear filter',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'clear_filter_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 1664,
                'label' => 'There are no',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'there_are_no_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 1665,
                'label' => 'scheduled at the moment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'scheduled_at_the_moment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 1666,
                'label' => 'Recent Treatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'recent_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 1667,
                'label' => 'APPOINTMENT DETAILS',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'appointment_details_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 1668,
                'label' => 'Next Available Date',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'next_available_date_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 1669,
                'label' => 'select a valid time slot to save',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'select_a_valid_time_slot_to_save_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 1670,
                'label' => 'interval',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'interval_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 1671,
                'label' => 'fetching available  slots',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'fetching_available__slots_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 1672,
                'label' => 'Search by Name',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'search_by_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 1673,
                'label' => 'search for report',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_for_report_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 1674,
                'label' => 'Tracking',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'tracking_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 1675,
                'label' => 'Position filter',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'position_filter_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 1676,
                'label' => 'Search by position name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_by_position_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 1677,
                'label' => 'Waiting',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'waiting_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 1678,
                'label' => 'Missed',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'missed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 1679,
                'label' => 'Confirmed',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'confirmed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 1680,
                'label' => 'Completed',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'completed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 1681,
                'label' => 'Canceled',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'canceled_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 1682,
                'label' => 'Upcoming appointments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'upcoming_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 1683,
                'label' => 'Closed',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'closed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 1684,
                'label' => 'Manual',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'manual_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 1685,
                'label' => 'Online',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'online_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 1686,
                'label' => 'Phone',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'phone_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 1687,
                'label' => 'Patients Treatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'patients_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 1688,
                'label' => 'Select Payment Option',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_payment_option_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 1689,
                'label' => 'Cash',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'cash_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 1690,
                'label' => 'Mollie',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'mollie_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 1691,
                'label' => 'Select Currency',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_currency_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 1692,
                'label' => 'EURO',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'euro_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 1693,
                'label' => 'USD',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'usd_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 1694,
                'label' => 'Search for keyword',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_for_keyword_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 1695,
                'label' => 'Search for patient name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_for_patient_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 1696,
                'label' => 'View all treatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_all_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 1697,
                'label' => 'View profile',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_profile_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 1698,
                'label' => 'Patient ',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'patient__text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 1699,
                'label' => 'status',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'status_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 1700,
                'label' => 'Recall Appointments',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'recall_appointments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 1701,
                'label' => 'No recall appointments scheduled at the moment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'no_recall_appointments_scheduled_at_the_moment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 1702,
                'label' => 'No waiting appointments scheduled at the moment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'no_waiting_appointments_scheduled_at_the_moment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 1703,
                'label' => 'Recall Appointment',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'recall_appointment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 1704,
                'label' => 'Remove Payment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'remove_payment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 1705,
                'label' => 'Doctors Treatments',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'doctors_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 1706,
                'label' => 'Archived List',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'archived_list_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 1707,
                'label' => 'search for doctor name',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'search_for_doctor_name_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 1708,
                'label' => 'Available slots for the selected doctor will appear here',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'available_slots_for_the_selected_doctor_will_appear_here_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 1709,
                'label' => 'Autofill',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'autofill_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 1710,
                'label' => 'treatments configurations',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'treatments_configurations_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 1711,
                'label' => 'treatment code',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'treatment_code_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 1712,
                'label' => 'Documents ',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'documents__text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 1713,
                'label' => 'Receive SMS',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'receive_sms_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 1714,
                'label' => 'No GP registered',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'no_gp_registered_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 1715,
                'label' => 'Select General Practitioner',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_general_practitioner_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 1716,
                'label' => 'Doctor doesnt work on',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'doctor_doesnt_work_on_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 1717,
                'label' => 'error loading treatments',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'error_loading_treatments_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 1718,
                'label' => 'error loading doctors',
                'view_id' => 1,
                'icon' => '',
                'slug' => 'error_loading_doctors_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 1719,
                'label' => 'error loading users',
                'view_id' => 2,
                'icon' => '',
                'slug' => 'error_loading_users_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 1720,
                'label' => 'Sign in',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'sign_in_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 1721,
                'label' => 'Remember me',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'remember_me_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 1722,
                'label' => 'Forgot password',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'forgot_password_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 1723,
                'label' => 'Sign up',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'sign_up_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 1724,
                'label' => 'Login',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'login_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 1725,
                'label' => 'Do not have an account',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'do_not_have_an_account_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 1726,
                'label' => 'Register',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'register_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 1727,
                'label' => 'Password Confirmation',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'password_confirmation_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 1728,
                'label' => 'Choose gender',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'choose_gender_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 1729,
                'label' => 'Already have an account',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'already_have_an_account_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 1730,
                'label' => 'View more',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'view_more_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 1731,
                'label' => 'Recent messages',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'recent_messages_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 1732,
                'label' => 'Select time',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'select_time_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 1733,
                'label' => 'Loading slots',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_slots_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 1734,
                'label' => 'enter comment',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'enter_comment_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 1735,
                'label' => 'Loading invoices',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_invoices_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 1736,
                'label' => 'Invoices',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'invoices_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 1737,
                'label' => 'Communications',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'communications_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 1738,
                'label' => 'Profile',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'profile_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 1739,
                'label' => 'Perio Chart',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'perio_chart_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 1740,
                'label' => 'Approve Patient',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'approve_patient_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 1741,
                'label' => 'Printing',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'printing_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 1742,
                'label' => 'Transactions',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'transactions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 1743,
                'label' => 'Loading transactions',
                'view_id' => 5,
                'icon' => '',
                'slug' => 'loading_transactions_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 1744,
                'label' => 'Task updated Successfully',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'task_updated_successfully_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 1745,
                'label' => 'new',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'new_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 1746,
                'label' => 'completed',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'completed_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 1747,
                'label' => 'overdue',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'overdue_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 1748,
                'label' => 'done',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'done_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 1749,
                'label' => 'An error occured, Please try again',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'an_error_occured,_please_try_again_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 1750,
                'label' => 'appointment created',
                'view_id' => 3,
                'icon' => '',
                'slug' => 'appointment_created_text',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}