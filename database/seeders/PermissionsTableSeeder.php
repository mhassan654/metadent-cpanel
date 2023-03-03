<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent' => 'Users',
                'name' => 'Create Users',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            1 => 
            array (
                'id' => 2,
                'parent' => 'Users',
                'name' => 'View Users',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            2 => 
            array (
                'id' => 3,
                'parent' => 'Users',
                'name' => 'Delete Users',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            3 => 
            array (
                'id' => 4,
                'parent' => 'Users',
                'name' => 'Update User',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            4 => 
            array (
                'id' => 5,
                'parent' => 'Patients',
                'name' => 'Create Patient',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            5 => 
            array (
                'id' => 6,
                'parent' => 'Patients',
                'name' => 'Update Patient',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            6 => 
            array (
                'id' => 7,
                'parent' => 'Patients',
                'name' => 'Delete Patient',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            7 => 
            array (
                'id' => 8,
                'parent' => 'Patients',
                'name' => 'View Patients',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            8 => 
            array (
                'id' => 9,
                'parent' => 'Appointment',
                'name' => 'View Appointments',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            9 => 
            array (
                'id' => 10,
                'parent' => 'Appointment',
                'name' => 'Create Appointments',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            10 => 
            array (
                'id' => 11,
                'parent' => 'Appointment',
                'name' => 'Update Appointments',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            11 => 
            array (
                'id' => 12,
                'parent' => 'Appointment',
                'name' => 'Delete Appointments',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            12 => 
            array (
                'id' => 13,
                'parent' => 'Treatments',
                'name' => 'View Treatments',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            13 => 
            array (
                'id' => 14,
                'parent' => 'Treatments',
                'name' => 'Create Treatments',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            14 => 
            array (
                'id' => 15,
                'parent' => 'Treatments',
                'name' => 'Update Treatments',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            15 => 
            array (
                'id' => 16,
                'parent' => 'Treatments',
                'name' => 'Delete Treatments',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            16 => 
            array (
                'id' => 17,
                'parent' => 'Department',
                'name' => 'View Departments',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            17 => 
            array (
                'id' => 18,
                'parent' => 'Department',
                'name' => 'Create Department',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            18 => 
            array (
                'id' => 19,
                'parent' => 'Department',
                'name' => 'Update Department',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            19 => 
            array (
                'id' => 20,
                'parent' => 'Department',
                'name' => 'Delete Department',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            20 => 
            array (
                'id' => 21,
                'parent' => 'Charting',
                'name' => 'Manage Charting',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            21 => 
            array (
                'id' => 22,
                'parent' => 'Transactions',
                'name' => 'Manage Transactions',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            22 => 
            array (
                'id' => 23,
                'parent' => 'Invoices',
                'name' => 'Create Invoice',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            23 => 
            array (
                'id' => 24,
                'parent' => 'Invoices',
                'name' => 'Delete Invoice',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            24 => 
            array (
                'id' => 25,
                'parent' => 'Invoices',
                'name' => 'View Invoices',
                'guard_name' => 'api',
                'created_at' => '2022-12-01 16:26:54',
                'updated_at' => '2022-12-01 16:26:54',
            ),
            25 => 
            array (
                'id' => 26,
                'parent' => 'endodontic_treatment_results',
                'name' => 'endodontic_treatment_results.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            26 => 
            array (
                'id' => 27,
                'parent' => 'endodontic_treatment_results',
                'name' => 'endodontic_treatment_results.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            27 => 
            array (
                'id' => 28,
                'parent' => 'endodontic_treatment_results',
                'name' => 'endodontic_treatment_results.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            28 => 
            array (
                'id' => 29,
                'parent' => 'endodontic_treatment_results',
                'name' => 'endodontic_treatment_results.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            29 => 
            array (
                'id' => 30,
                'parent' => 'endodontic_treatment_results',
                'name' => 'endodontic_treatment_results.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            30 => 
            array (
                'id' => 31,
                'parent' => 'roles',
                'name' => 'roles.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            31 => 
            array (
                'id' => 32,
                'parent' => 'roles',
                'name' => 'roles.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            32 => 
            array (
                'id' => 33,
                'parent' => 'roles',
                'name' => 'roles.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            33 => 
            array (
                'id' => 34,
                'parent' => 'roles',
                'name' => 'roles.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            34 => 
            array (
                'id' => 35,
                'parent' => 'roles',
                'name' => 'roles.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            35 => 
            array (
                'id' => 36,
                'parent' => 'roles',
                'name' => 'roles.revoke_user_role',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            36 => 
            array (
                'id' => 37,
                'parent' => 'roles',
                'name' => 'roles.revoke_role_permission',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            37 => 
            array (
                'id' => 38,
                'parent' => 'roles',
                'name' => 'roles.revoke_user_permission',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            38 => 
            array (
                'id' => 39,
                'parent' => 'roles',
                'name' => 'roles.assign_permission_to_role',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            39 => 
            array (
                'id' => 40,
                'parent' => 'roles',
                'name' => 'roles.assign_permission_to_user',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            40 => 
            array (
                'id' => 41,
                'parent' => 'roles',
                'name' => 'roles.give_role_to_user',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            41 => 
            array (
                'id' => 42,
                'parent' => 'roles',
                'name' => 'roles.assign_multi_roles_to_user',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            42 => 
            array (
                'id' => 43,
                'parent' => 'agendas',
                'name' => 'agendas.all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            43 => 
            array (
                'id' => 44,
                'parent' => 'agendas',
                'name' => 'agendas.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            44 => 
            array (
                'id' => 45,
                'parent' => 'agendas',
                'name' => 'agendas.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:46',
                'updated_at' => '2023-01-10 08:28:46',
            ),
            45 => 
            array (
                'id' => 46,
                'parent' => 'agendas',
                'name' => 'agendas.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            46 => 
            array (
                'id' => 47,
                'parent' => 'agendas',
                'name' => 'agendas.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            47 => 
            array (
                'id' => 48,
                'parent' => 'treatment_plan',
                'name' => 'treatment_plan.view_treatment_plans_by_patient',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            48 => 
            array (
                'id' => 49,
                'parent' => 'treatment_plan',
                'name' => 'treatment_plan.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            49 => 
            array (
                'id' => 50,
                'parent' => 'treatment_plan',
                'name' => 'treatment_plan.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            50 => 
            array (
                'id' => 51,
                'parent' => 'treatment_plan',
                'name' => 'treatment_plan.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            51 => 
            array (
                'id' => 52,
                'parent' => 'treatment_plan',
                'name' => 'treatment_plan.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            52 => 
            array (
                'id' => 53,
                'parent' => 'treatment_plan',
                'name' => 'treatment_plan.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            53 => 
            array (
                'id' => 54,
                'parent' => 'care_plan',
                'name' => 'care_plan.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            54 => 
            array (
                'id' => 55,
                'parent' => 'care_plan',
                'name' => 'care_plan.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            55 => 
            array (
                'id' => 56,
                'parent' => 'care_plan',
                'name' => 'care_plan.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            56 => 
            array (
                'id' => 57,
                'parent' => 'care_plan',
                'name' => 'care_plan.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            57 => 
            array (
                'id' => 58,
                'parent' => 'care_plan',
                'name' => 'care_plan.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            58 => 
            array (
                'id' => 59,
                'parent' => 'care_plan',
                'name' => 'care_plan.get_care_plans_by_patient',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            59 => 
            array (
                'id' => 60,
                'parent' => 'general_remarks',
                'name' => 'general_remarks.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            60 => 
            array (
                'id' => 61,
                'parent' => 'general_remarks',
                'name' => 'general_remarks.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            61 => 
            array (
                'id' => 62,
                'parent' => 'general_remarks',
                'name' => 'general_remarks.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            62 => 
            array (
                'id' => 63,
                'parent' => 'general_remarks',
                'name' => 'general_remarks.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            63 => 
            array (
                'id' => 64,
                'parent' => 'general_remarks',
                'name' => 'general_remarks.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            64 => 
            array (
                'id' => 65,
                'parent' => 'general_remarks',
                'name' => 'general_remarks.view_patient_remarks',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            65 => 
            array (
                'id' => 66,
                'parent' => 'general_remarks',
                'name' => 'general_remarks.archive_patient_remarks',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            66 => 
            array (
                'id' => 67,
                'parent' => 'perio_configurations',
                'name' => 'perio_configurations.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            67 => 
            array (
                'id' => 68,
                'parent' => 'perio_configurations',
                'name' => 'perio_configurations.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            68 => 
            array (
                'id' => 69,
                'parent' => 'perio_configurations',
                'name' => 'perio_configurations.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            69 => 
            array (
                'id' => 70,
                'parent' => 'perio_configurations',
                'name' => 'perio_configurations.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            70 => 
            array (
                'id' => 71,
                'parent' => 'perio_configurations',
                'name' => 'perio_configurations.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            71 => 
            array (
                'id' => 72,
                'parent' => 'perio_configurations',
                'name' => 'perio_configurations.achive',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            72 => 
            array (
                'id' => 73,
                'parent' => 'vecozo',
                'name' => 'vecozo.view_insurance_data',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            73 => 
            array (
                'id' => 74,
                'parent' => 'vecozo',
                'name' => 'vecozo.update_agb_code',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            74 => 
            array (
                'id' => 75,
                'parent' => 'xray_images',
                'name' => 'xray_images.upload',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            75 => 
            array (
                'id' => 76,
                'parent' => 'xray_images',
                'name' => 'xray_images.view_all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            76 => 
            array (
                'id' => 77,
                'parent' => 'treatments',
                'name' => 'treatments.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            77 => 
            array (
                'id' => 78,
                'parent' => 'treatments',
                'name' => 'treatments.categories',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            78 => 
            array (
                'id' => 79,
                'parent' => 'treatments',
                'name' => 'treatments.paginated',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            79 => 
            array (
                'id' => 80,
                'parent' => 'treatments',
                'name' => 'treatments.treatment',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            80 => 
            array (
                'id' => 81,
                'parent' => 'treatments',
                'name' => 'treatments.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            81 => 
            array (
                'id' => 82,
                'parent' => 'treatments',
                'name' => 'treatments.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            82 => 
            array (
                'id' => 83,
                'parent' => 'treatments',
                'name' => 'treatments.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            83 => 
            array (
                'id' => 84,
                'parent' => 'treatments',
                'name' => 'treatments.delete_all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            84 => 
            array (
                'id' => 85,
                'parent' => 'treatments',
                'name' => 'treatments.import',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            85 => 
            array (
                'id' => 86,
                'parent' => 'treatments',
                'name' => 'treatments.export',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            86 => 
            array (
                'id' => 87,
                'parent' => 'treatments',
                'name' => 'treatments.treatment_doctors',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            87 => 
            array (
                'id' => 88,
                'parent' => 'treatments_nonspecified',
                'name' => 'treatments_nonspecified.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            88 => 
            array (
                'id' => 89,
                'parent' => 'treatments_nonspecified',
                'name' => 'treatments_nonspecified.list',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:47',
                'updated_at' => '2023-01-10 08:28:47',
            ),
            89 => 
            array (
                'id' => 90,
                'parent' => 'treatments_nonspecified',
                'name' => 'treatments_nonspecified.treatment',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            90 => 
            array (
                'id' => 91,
                'parent' => 'treatments_nonspecified',
                'name' => 'treatments_nonspecified.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            91 => 
            array (
                'id' => 92,
                'parent' => 'treatments_nonspecified',
                'name' => 'treatments_nonspecified.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            92 => 
            array (
                'id' => 93,
                'parent' => 'treatments_nonspecified',
                'name' => 'treatments_nonspecified.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            93 => 
            array (
                'id' => 94,
                'parent' => 'treatments_nonspecified',
                'name' => 'treatments_nonspecified.delete_all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            94 => 
            array (
                'id' => 95,
                'parent' => 'treatments_nonspecified',
                'name' => 'treatments_nonspecified.treatment_list',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            95 => 
            array (
                'id' => 96,
                'parent' => 'doneprocedures',
                'name' => 'doneprocedures.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            96 => 
            array (
                'id' => 97,
                'parent' => 'procedures',
                'name' => 'procedures.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            97 => 
            array (
                'id' => 98,
                'parent' => 'procedures',
                'name' => 'procedures.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            98 => 
            array (
                'id' => 99,
                'parent' => 'procedures',
                'name' => 'procedures.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            99 => 
            array (
                'id' => 100,
                'parent' => 'procedures',
                'name' => 'procedures.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            100 => 
            array (
                'id' => 101,
                'parent' => 'procedures',
                'name' => 'procedures.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            101 => 
            array (
                'id' => 102,
                'parent' => 'treatment_procedures',
                'name' => 'treatment_procedures.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            102 => 
            array (
                'id' => 103,
                'parent' => 'treatment_procedures',
                'name' => 'treatment_procedures.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            103 => 
            array (
                'id' => 104,
                'parent' => 'treatment_procedures',
                'name' => 'treatment_procedures.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            104 => 
            array (
                'id' => 105,
                'parent' => 'treatment_procedures',
                'name' => 'treatment_procedures.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            105 => 
            array (
                'id' => 106,
                'parent' => 'treatment_procedures',
                'name' => 'treatment_procedures.procedures',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            106 => 
            array (
                'id' => 107,
                'parent' => 'specializations',
                'name' => 'specializations.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            107 => 
            array (
                'id' => 108,
                'parent' => 'specializations',
                'name' => 'specializations.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            108 => 
            array (
                'id' => 109,
                'parent' => 'specializations',
                'name' => 'specializations.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            109 => 
            array (
                'id' => 110,
                'parent' => 'specializations',
                'name' => 'specializations.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            110 => 
            array (
                'id' => 111,
                'parent' => 'specializations',
                'name' => 'specializations.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            111 => 
            array (
                'id' => 112,
                'parent' => 'tasks',
                'name' => 'tasks.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            112 => 
            array (
                'id' => 113,
                'parent' => 'tasks',
                'name' => 'tasks.view_doctor_tasks',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            113 => 
            array (
                'id' => 114,
                'parent' => 'tasks',
                'name' => 'tasks.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            114 => 
            array (
                'id' => 115,
                'parent' => 'tasks',
                'name' => 'tasks.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            115 => 
            array (
                'id' => 116,
                'parent' => 'tasks',
                'name' => 'tasks.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            116 => 
            array (
                'id' => 117,
                'parent' => 'appointments',
                'name' => 'appointments.all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            117 => 
            array (
                'id' => 118,
                'parent' => 'appointments',
                'name' => 'appointments.today',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            118 => 
            array (
                'id' => 119,
                'parent' => 'appointments',
                'name' => 'appointments.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            119 => 
            array (
                'id' => 120,
                'parent' => 'appointments',
                'name' => 'appointments.doctor_appointments',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            120 => 
            array (
                'id' => 121,
                'parent' => 'appointments',
                'name' => 'appointments.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            121 => 
            array (
                'id' => 122,
                'parent' => 'appointments',
                'name' => 'appointments.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            122 => 
            array (
                'id' => 123,
                'parent' => 'appointments',
                'name' => 'appointments.rescheduling',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            123 => 
            array (
                'id' => 124,
                'parent' => 'appointments',
                'name' => 'appointments.change_status',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            124 => 
            array (
                'id' => 125,
                'parent' => 'appointments',
                'name' => 'appointments.extend',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            125 => 
            array (
                'id' => 126,
                'parent' => 'appointments',
                'name' => 'appointments.status_list',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            126 => 
            array (
                'id' => 127,
                'parent' => 'appointments',
                'name' => 'appointments.confirm',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            127 => 
            array (
                'id' => 128,
                'parent' => 'appointments',
                'name' => 'appointments.cancel',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            128 => 
            array (
                'id' => 129,
                'parent' => 'appointments',
                'name' => 'appointments.close',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            129 => 
            array (
                'id' => 130,
                'parent' => 'appointments',
                'name' => 'appointments.waitingroom',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            130 => 
            array (
                'id' => 131,
                'parent' => 'appointments',
                'name' => 'appointments.doctor_waitingroom',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            131 => 
            array (
                'id' => 132,
                'parent' => 'appointments',
                'name' => 'appointments.servingroom',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            132 => 
            array (
                'id' => 133,
                'parent' => 'appointments',
                'name' => 'appointments.closed',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            133 => 
            array (
                'id' => 134,
                'parent' => 'appointments',
                'name' => 'appointments.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            134 => 
            array (
                'id' => 135,
                'parent' => 'appointments',
                'name' => 'appointments.doctor_serve_patient',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            135 => 
            array (
                'id' => 136,
                'parent' => 'appointments',
                'name' => 'appointments.completed_appointment_today',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            136 => 
            array (
                'id' => 137,
                'parent' => 'appointments',
                'name' => 'appointments.update_with_recurrency',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            137 => 
            array (
                'id' => 138,
                'parent' => 'appointments',
                'name' => 'appointments.patient',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            138 => 
            array (
                'id' => 139,
                'parent' => 'appointments',
                'name' => 'appointments.cancel_recurring',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            139 => 
            array (
                'id' => 140,
                'parent' => 'appointments',
                'name' => 'appointments.archive_recurring',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            140 => 
            array (
                'id' => 141,
                'parent' => 'appointments',
                'name' => 'appointments.restore',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            141 => 
            array (
                'id' => 142,
                'parent' => 'appointments',
                'name' => 'appointments.waiting_patient_list',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            142 => 
            array (
                'id' => 143,
                'parent' => 'appointments',
                'name' => 'appointments.latest_serving_front_office',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            143 => 
            array (
                'id' => 144,
                'parent' => 'appointments',
                'name' => 'appointments.counter',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            144 => 
            array (
                'id' => 145,
                'parent' => 'appointments',
                'name' => 'appointments.update_waiting_to_missed',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            145 => 
            array (
                'id' => 146,
                'parent' => 'appointments',
                'name' => 'appointments.paginated',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:48',
                'updated_at' => '2023-01-10 08:28:48',
            ),
            146 => 
            array (
                'id' => 147,
                'parent' => 'appointments',
                'name' => 'appointments.dashboard_upcoming',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            147 => 
            array (
                'id' => 148,
                'parent' => 'appointments',
                'name' => 'appointments.today_total',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            148 => 
            array (
                'id' => 149,
                'parent' => 'appointments',
                'name' => 'appointments.download_pdf',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            149 => 
            array (
                'id' => 150,
                'parent' => 'appointments',
                'name' => 'appointments.download_excel',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            150 => 
            array (
                'id' => 151,
                'parent' => 'appointments',
                'name' => 'appointments.download_csv',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            151 => 
            array (
                'id' => 152,
                'parent' => 'appointments',
                'name' => 'appointments.upcoming',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            152 => 
            array (
                'id' => 153,
                'parent' => 'appointments',
                'name' => 'appointments.past',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            153 => 
            array (
                'id' => 154,
                'parent' => 'appointmenttypes',
                'name' => 'appointmenttypes.all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            154 => 
            array (
                'id' => 155,
                'parent' => 'appointmenttypes',
                'name' => 'appointmenttypes.type',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            155 => 
            array (
                'id' => 156,
                'parent' => 'appointmenttypes',
                'name' => 'appointmenttypes.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            156 => 
            array (
                'id' => 157,
                'parent' => 'appointmenttypes',
                'name' => 'appointmenttypes.attach_doctors',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            157 => 
            array (
                'id' => 158,
                'parent' => 'appointmenttypes',
                'name' => 'appointmenttypes.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            158 => 
            array (
                'id' => 159,
                'parent' => 'appointmenttypes',
                'name' => 'appointmenttypes.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            159 => 
            array (
                'id' => 160,
                'parent' => 'appointmentreasons',
                'name' => 'appointmentreasons.all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            160 => 
            array (
                'id' => 161,
                'parent' => 'appointmentreasons',
                'name' => 'appointmentreasons.reason',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            161 => 
            array (
                'id' => 162,
                'parent' => 'appointmentreasons',
                'name' => 'appointmentreasons.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            162 => 
            array (
                'id' => 163,
                'parent' => 'appointmentreasons',
                'name' => 'appointmentreasons.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            163 => 
            array (
                'id' => 164,
                'parent' => 'appointmentreasons',
                'name' => 'appointmentreasons.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            164 => 
            array (
                'id' => 165,
                'parent' => 'invoices',
                'name' => 'invoices.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            165 => 
            array (
                'id' => 166,
                'parent' => 'invoices',
                'name' => 'invoices.view_latest_invoices',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            166 => 
            array (
                'id' => 167,
                'parent' => 'invoices',
                'name' => 'invoices.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            167 => 
            array (
                'id' => 168,
                'parent' => 'invoices',
                'name' => 'invoices.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            168 => 
            array (
                'id' => 169,
                'parent' => 'invoices',
                'name' => 'invoices.view_patient_invoices',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            169 => 
            array (
                'id' => 170,
                'parent' => 'invoices',
                'name' => 'invoices.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            170 => 
            array (
                'id' => 171,
                'parent' => 'invoices',
                'name' => 'invoices.view_paid',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            171 => 
            array (
                'id' => 172,
                'parent' => 'invoices',
                'name' => 'invoices.view_unpaid',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            172 => 
            array (
                'id' => 173,
                'parent' => 'invoices',
                'name' => 'invoices.send_reminder',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            173 => 
            array (
                'id' => 174,
                'parent' => 'invoices',
                'name' => 'invoices.view_invoice_details',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            174 => 
            array (
                'id' => 175,
                'parent' => 'invoices',
                'name' => 'invoices.view_overdue_invoices',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            175 => 
            array (
                'id' => 176,
                'parent' => 'invoices',
                'name' => 'invoices.view_recent_invoices',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            176 => 
            array (
                'id' => 177,
                'parent' => 'invoices',
                'name' => 'invoices.view_daily_invoices',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            177 => 
            array (
                'id' => 178,
                'parent' => 'invoices',
                'name' => 'invoices.download_pdf',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            178 => 
            array (
                'id' => 179,
                'parent' => 'invoices',
                'name' => 'invoices.download_excel',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            179 => 
            array (
                'id' => 180,
                'parent' => 'invoices',
                'name' => 'invoices.download_csv',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            180 => 
            array (
                'id' => 181,
                'parent' => 'invoices',
                'name' => 'invoices.download_invoice_details_pdf',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            181 => 
            array (
                'id' => 182,
                'parent' => 'events',
                'name' => 'events.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            182 => 
            array (
                'id' => 183,
                'parent' => 'events',
                'name' => 'events.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            183 => 
            array (
                'id' => 184,
                'parent' => 'events',
                'name' => 'events.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            184 => 
            array (
                'id' => 185,
                'parent' => 'events',
                'name' => 'events.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            185 => 
            array (
                'id' => 186,
                'parent' => 'events',
                'name' => 'events.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            186 => 
            array (
                'id' => 187,
                'parent' => 'events_types',
                'name' => 'events_types.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            187 => 
            array (
                'id' => 188,
                'parent' => 'events_types',
                'name' => 'events_types.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            188 => 
            array (
                'id' => 189,
                'parent' => 'events_types',
                'name' => 'events_types.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            189 => 
            array (
                'id' => 190,
                'parent' => 'events_types',
                'name' => 'events_types.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            190 => 
            array (
                'id' => 191,
                'parent' => 'events_types',
                'name' => 'events_types.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            191 => 
            array (
                'id' => 192,
                'parent' => 'adhesive_types',
                'name' => 'adhesive_types.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            192 => 
            array (
                'id' => 193,
                'parent' => 'adhesive_types',
                'name' => 'adhesive_types.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            193 => 
            array (
                'id' => 194,
                'parent' => 'adhesive_types',
                'name' => 'adhesive_types.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            194 => 
            array (
                'id' => 195,
                'parent' => 'adhesive_types',
                'name' => 'adhesive_types.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            195 => 
            array (
                'id' => 196,
                'parent' => 'adhesive_types',
                'name' => 'adhesive_types.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            196 => 
            array (
                'id' => 197,
                'parent' => 'adhesive_types',
                'name' => 'adhesive_types.restore_all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:49',
                'updated_at' => '2023-01-10 08:28:49',
            ),
            197 => 
            array (
                'id' => 198,
                'parent' => 'composite_type',
                'name' => 'composite_type.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            198 => 
            array (
                'id' => 199,
                'parent' => 'composite_type',
                'name' => 'composite_type.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            199 => 
            array (
                'id' => 200,
                'parent' => 'composite_type',
                'name' => 'composite_type.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            200 => 
            array (
                'id' => 201,
                'parent' => 'composite_type',
                'name' => 'composite_type.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            201 => 
            array (
                'id' => 202,
                'parent' => 'composite_type',
                'name' => 'composite_type.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            202 => 
            array (
                'id' => 203,
                'parent' => 'composite_type',
                'name' => 'composite_type.restore_all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            203 => 
            array (
                'id' => 204,
                'parent' => 'treatmentframes',
                'name' => 'treatmentframes.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            204 => 
            array (
                'id' => 205,
                'parent' => 'treatmentframes',
                'name' => 'treatmentframes.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            205 => 
            array (
                'id' => 206,
                'parent' => 'treatmentframes',
                'name' => 'treatmentframes.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            206 => 
            array (
                'id' => 207,
                'parent' => 'treatmentframes',
                'name' => 'treatmentframes.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            207 => 
            array (
                'id' => 208,
                'parent' => 'treatmentframes',
                'name' => 'treatmentframes.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            208 => 
            array (
                'id' => 209,
                'parent' => 'treatmentframes',
                'name' => 'treatmentframes.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            209 => 
            array (
                'id' => 210,
                'parent' => 'treatmentframes',
                'name' => 'treatmentframes.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            210 => 
            array (
                'id' => 211,
                'parent' => 'bridgesconnectors',
                'name' => 'bridgesconnectors.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            211 => 
            array (
                'id' => 212,
                'parent' => 'bridgesconnectors',
                'name' => 'bridgesconnectors.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            212 => 
            array (
                'id' => 213,
                'parent' => 'bridgesconnectors',
                'name' => 'bridgesconnectors.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            213 => 
            array (
                'id' => 214,
                'parent' => 'bridgesconnectors',
                'name' => 'bridgesconnectors.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            214 => 
            array (
                'id' => 215,
                'parent' => 'bridgesconnectors',
                'name' => 'bridgesconnectors.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            215 => 
            array (
                'id' => 216,
                'parent' => 'bridgesconnectors',
                'name' => 'bridgesconnectors.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            216 => 
            array (
                'id' => 217,
                'parent' => 'bridgesconnectors',
                'name' => 'bridgesconnectors.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            217 => 
            array (
                'id' => 218,
                'parent' => 'calendar_frequencies',
                'name' => 'calendar_frequencies.all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            218 => 
            array (
                'id' => 219,
                'parent' => 'treatment_categories',
                'name' => 'treatment_categories.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            219 => 
            array (
                'id' => 220,
                'parent' => 'treatment_categories',
                'name' => 'treatment_categories.list',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            220 => 
            array (
                'id' => 221,
                'parent' => 'treatment_categories',
                'name' => 'treatment_categories.treatment',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            221 => 
            array (
                'id' => 222,
                'parent' => 'treatment_categories',
                'name' => 'treatment_categories.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            222 => 
            array (
                'id' => 223,
                'parent' => 'treatment_categories',
                'name' => 'treatment_categories.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            223 => 
            array (
                'id' => 224,
                'parent' => 'treatment_categories',
                'name' => 'treatment_categories.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            224 => 
            array (
                'id' => 225,
                'parent' => 'treatment_categories',
                'name' => 'treatment_categories.delete_all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            225 => 
            array (
                'id' => 226,
                'parent' => 'treatment_categories',
                'name' => 'treatment_categories.treatment_list',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            226 => 
            array (
                'id' => 227,
                'parent' => 'treatment_types',
                'name' => 'treatment_types.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            227 => 
            array (
                'id' => 228,
                'parent' => 'treatment_types',
                'name' => 'treatment_types.type',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            228 => 
            array (
                'id' => 229,
                'parent' => 'treatment_types',
                'name' => 'treatment_types.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            229 => 
            array (
                'id' => 230,
                'parent' => 'treatment_types',
                'name' => 'treatment_types.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            230 => 
            array (
                'id' => 231,
                'parent' => 'treatment_types',
                'name' => 'treatment_types.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            231 => 
            array (
                'id' => 232,
                'parent' => 'treatment_types',
                'name' => 'treatment_types.restore_all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            232 => 
            array (
                'id' => 233,
                'parent' => 'bundled_treatments',
                'name' => 'bundled_treatments.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            233 => 
            array (
                'id' => 234,
                'parent' => 'bundled_treatments',
                'name' => 'bundled_treatments.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            234 => 
            array (
                'id' => 235,
                'parent' => 'bundled_treatments',
                'name' => 'bundled_treatments.paginate',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            235 => 
            array (
                'id' => 236,
                'parent' => 'bundled_treatments',
                'name' => 'bundled_treatments.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            236 => 
            array (
                'id' => 237,
                'parent' => 'bundled_treatments',
                'name' => 'bundled_treatments.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:50',
                'updated_at' => '2023-01-10 08:28:50',
            ),
            237 => 
            array (
                'id' => 238,
                'parent' => 'bundled_treatments',
                'name' => 'bundled_treatments.search',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            238 => 
            array (
                'id' => 239,
                'parent' => 'bundled_treatments',
                'name' => 'bundled_treatments.archive',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            239 => 
            array (
                'id' => 240,
                'parent' => 'bundled_treatments',
                'name' => 'bundled_treatments.archive_all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            240 => 
            array (
                'id' => 241,
                'parent' => 'bundled_treatments',
                'name' => 'bundled_treatments.archive_selected',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            241 => 
            array (
                'id' => 242,
                'parent' => 'bundled_treatments',
                'name' => 'bundled_treatments.restore_all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            242 => 
            array (
                'id' => 243,
                'parent' => 'bundled_treatments',
                'name' => 'bundled_treatments.delete_all',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            243 => 
            array (
                'id' => 244,
                'parent' => 'bundled_treatments',
                'name' => 'bundled_treatments.delete_selected',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            244 => 
            array (
                'id' => 245,
                'parent' => 'toggle',
                'name' => 'toggle.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            245 => 
            array (
                'id' => 246,
                'parent' => 'translations',
                'name' => 'translations.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            246 => 
            array (
                'id' => 247,
                'parent' => 'translations',
                'name' => 'translations.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            247 => 
            array (
                'id' => 248,
                'parent' => 'translations',
                'name' => 'translations.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            248 => 
            array (
                'id' => 249,
                'parent' => 'transactions',
                'name' => 'transactions.view_invoice_transactions',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            249 => 
            array (
                'id' => 250,
                'parent' => 'transactions',
                'name' => 'transactions.download_pdf',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            250 => 
            array (
                'id' => 251,
                'parent' => 'quickappointments',
                'name' => 'quickappointments.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            251 => 
            array (
                'id' => 252,
                'parent' => 'quickappointments',
                'name' => 'quickappointments.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            252 => 
            array (
                'id' => 253,
                'parent' => 'quickappointments',
                'name' => 'quickappointments.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            253 => 
            array (
                'id' => 254,
                'parent' => 'quickappointments',
                'name' => 'quickappointments.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            254 => 
            array (
                'id' => 255,
                'parent' => 'languages',
                'name' => 'languages.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            255 => 
            array (
                'id' => 256,
                'parent' => 'languages',
                'name' => 'languages.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            256 => 
            array (
                'id' => 257,
                'parent' => 'languages',
                'name' => 'languages.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            257 => 
            array (
                'id' => 258,
                'parent' => 'languages',
                'name' => 'languages.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            258 => 
            array (
                'id' => 259,
                'parent' => 'languages',
                'name' => 'languages.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            259 => 
            array (
                'id' => 260,
                'parent' => 'languages',
                'name' => 'languages.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            260 => 
            array (
                'id' => 261,
                'parent' => 'languages',
                'name' => 'languages.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            261 => 
            array (
                'id' => 262,
                'parent' => 'currencies',
                'name' => 'currencies.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            262 => 
            array (
                'id' => 263,
                'parent' => 'currencies',
                'name' => 'currencies.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:51',
                'updated_at' => '2023-01-10 08:28:51',
            ),
            263 => 
            array (
                'id' => 264,
                'parent' => 'currencies',
                'name' => 'currencies.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            264 => 
            array (
                'id' => 265,
                'parent' => 'currencies',
                'name' => 'currencies.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            265 => 
            array (
                'id' => 266,
                'parent' => 'currencies',
                'name' => 'currencies.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            266 => 
            array (
                'id' => 267,
                'parent' => 'currencies',
                'name' => 'currencies.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            267 => 
            array (
                'id' => 268,
                'parent' => 'currencies',
                'name' => 'currencies.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            268 => 
            array (
                'id' => 269,
                'parent' => 'doctor_questions',
                'name' => 'doctor_questions.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            269 => 
            array (
                'id' => 270,
                'parent' => 'doctor_questions',
                'name' => 'doctor_questions.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            270 => 
            array (
                'id' => 271,
                'parent' => 'doctor_questions',
                'name' => 'doctor_questions.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            271 => 
            array (
                'id' => 272,
                'parent' => 'doctor_questions',
                'name' => 'doctor_questions.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            272 => 
            array (
                'id' => 273,
                'parent' => 'doctor_questions',
                'name' => 'doctor_questions.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            273 => 
            array (
                'id' => 274,
                'parent' => 'doctor_questions',
                'name' => 'doctor_questions.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            274 => 
            array (
                'id' => 275,
                'parent' => 'doctor_questions',
                'name' => 'doctor_questions.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            275 => 
            array (
                'id' => 276,
                'parent' => 'reports',
                'name' => 'reports.counters',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            276 => 
            array (
                'id' => 277,
                'parent' => 'reports',
                'name' => 'reports.patients_annual_graph',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            277 => 
            array (
                'id' => 278,
                'parent' => 'reports',
                'name' => 'reports.appointments_graph',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            278 => 
            array (
                'id' => 279,
                'parent' => 'reports',
                'name' => 'reports.employees_graph',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            279 => 
            array (
                'id' => 280,
                'parent' => 'reports',
                'name' => 'reports.treatments_graph',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            280 => 
            array (
                'id' => 281,
                'parent' => 'reports',
                'name' => 'reports.invoices_graph',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            281 => 
            array (
                'id' => 282,
                'parent' => 'task_messages',
                'name' => 'task_messages.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            282 => 
            array (
                'id' => 283,
                'parent' => 'task_messages',
                'name' => 'task_messages.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            283 => 
            array (
                'id' => 284,
                'parent' => 'task_messages',
                'name' => 'task_messages.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:52',
                'updated_at' => '2023-01-10 08:28:52',
            ),
            284 => 
            array (
                'id' => 285,
                'parent' => 'task_messages',
                'name' => 'task_messages.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            285 => 
            array (
                'id' => 286,
                'parent' => 'task_messages',
                'name' => 'task_messages.view_task_messages',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            286 => 
            array (
                'id' => 287,
                'parent' => 'log_activities',
                'name' => 'log_activities.view_patient_logs',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            287 => 
            array (
                'id' => 288,
                'parent' => 'log_activities',
                'name' => 'log_activities.view_user_system_logs',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            288 => 
            array (
                'id' => 289,
                'parent' => 'log_activities',
                'name' => 'log_activities.view_user_auth_logs',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            289 => 
            array (
                'id' => 290,
                'parent' => 'log_activities',
                'name' => 'log_activities.download_user_activities_pdf',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            290 => 
            array (
                'id' => 291,
                'parent' => 'log_activities',
                'name' => 'log_activities.download_user_activities_excel',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            291 => 
            array (
                'id' => 292,
                'parent' => 'log_activities',
                'name' => 'log_activities.download_user_activities_csv',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            292 => 
            array (
                'id' => 293,
                'parent' => 'log_activities',
                'name' => 'log_activities.patient_activities_download_pdf',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            293 => 
            array (
                'id' => 294,
                'parent' => 'log_activities',
                'name' => 'log_activities.patient_activities_download_excel',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            294 => 
            array (
                'id' => 295,
                'parent' => 'log_activities',
                'name' => 'log_activities.patient_activities_download_csv',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            295 => 
            array (
                'id' => 296,
                'parent' => 'system_codes',
                'name' => 'system_codes.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            296 => 
            array (
                'id' => 297,
                'parent' => 'system_codes',
                'name' => 'system_codes.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            297 => 
            array (
                'id' => 298,
                'parent' => 'system_codes',
                'name' => 'system_codes.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            298 => 
            array (
                'id' => 299,
                'parent' => 'employees',
                'name' => 'employees.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            299 => 
            array (
                'id' => 300,
                'parent' => 'employees',
                'name' => 'employees.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:53',
                'updated_at' => '2023-01-10 08:28:53',
            ),
            300 => 
            array (
                'id' => 301,
                'parent' => 'employees',
                'name' => 'employees.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            301 => 
            array (
                'id' => 302,
                'parent' => 'employees',
                'name' => 'employees.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            302 => 
            array (
                'id' => 303,
                'parent' => 'employees',
                'name' => 'employees.update_status',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            303 => 
            array (
                'id' => 304,
                'parent' => 'employees',
                'name' => 'employees.update_image',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            304 => 
            array (
                'id' => 305,
                'parent' => 'employees',
                'name' => 'employees.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            305 => 
            array (
                'id' => 306,
                'parent' => 'employees',
                'name' => 'employees.download_pdf',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            306 => 
            array (
                'id' => 307,
                'parent' => 'employees',
                'name' => 'employees.download_excel',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            307 => 
            array (
                'id' => 308,
                'parent' => 'employees',
                'name' => 'employees.download_csv',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            308 => 
            array (
                'id' => 309,
                'parent' => 'duty_types',
                'name' => 'duty_types.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            309 => 
            array (
                'id' => 310,
                'parent' => 'duty_types',
                'name' => 'duty_types.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            310 => 
            array (
                'id' => 311,
                'parent' => 'duty_types',
                'name' => 'duty_types.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            311 => 
            array (
                'id' => 312,
                'parent' => 'duty_types',
                'name' => 'duty_types.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            312 => 
            array (
                'id' => 313,
                'parent' => 'duty_types',
                'name' => 'duty_types.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            313 => 
            array (
                'id' => 314,
                'parent' => 'duty_types',
                'name' => 'duty_types.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            314 => 
            array (
                'id' => 315,
                'parent' => 'duty_types',
                'name' => 'duty_types.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            315 => 
            array (
                'id' => 316,
                'parent' => 'positions',
                'name' => 'positions.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            316 => 
            array (
                'id' => 317,
                'parent' => 'positions',
                'name' => 'positions.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            317 => 
            array (
                'id' => 318,
                'parent' => 'positions',
                'name' => 'positions.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            318 => 
            array (
                'id' => 319,
                'parent' => 'positions',
                'name' => 'positions.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            319 => 
            array (
                'id' => 320,
                'parent' => 'positions',
                'name' => 'positions.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            320 => 
            array (
                'id' => 321,
                'parent' => 'positions',
                'name' => 'positions.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            321 => 
            array (
                'id' => 322,
                'parent' => 'positions',
                'name' => 'positions.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            322 => 
            array (
                'id' => 323,
                'parent' => 'rate_types',
                'name' => 'rate_types.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            323 => 
            array (
                'id' => 324,
                'parent' => 'rate_types',
                'name' => 'rate_types.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            324 => 
            array (
                'id' => 325,
                'parent' => 'rate_types',
                'name' => 'rate_types.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            325 => 
            array (
                'id' => 326,
                'parent' => 'rate_types',
                'name' => 'rate_types.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            326 => 
            array (
                'id' => 327,
                'parent' => 'rate_types',
                'name' => 'rate_types.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            327 => 
            array (
                'id' => 328,
                'parent' => 'rate_types',
                'name' => 'rate_types.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:54',
                'updated_at' => '2023-01-10 08:28:54',
            ),
            328 => 
            array (
                'id' => 329,
                'parent' => 'rate_types',
                'name' => 'rate_types.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            329 => 
            array (
                'id' => 330,
                'parent' => 'supervisors',
                'name' => 'supervisors.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            330 => 
            array (
                'id' => 331,
                'parent' => 'supervisors',
                'name' => 'supervisors.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            331 => 
            array (
                'id' => 332,
                'parent' => 'supervisors',
                'name' => 'supervisors.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            332 => 
            array (
                'id' => 333,
                'parent' => 'supervisors',
                'name' => 'supervisors.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            333 => 
            array (
                'id' => 334,
                'parent' => 'supervisors',
                'name' => 'supervisors.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            334 => 
            array (
                'id' => 335,
                'parent' => 'supervisors',
                'name' => 'supervisors.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            335 => 
            array (
                'id' => 336,
                'parent' => 'supervisors',
                'name' => 'supervisors.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            336 => 
            array (
                'id' => 337,
                'parent' => 'employee_types',
                'name' => 'employee_types.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            337 => 
            array (
                'id' => 338,
                'parent' => 'employee_types',
                'name' => 'employee_types.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            338 => 
            array (
                'id' => 339,
                'parent' => 'employee_types',
                'name' => 'employee_types.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            339 => 
            array (
                'id' => 340,
                'parent' => 'employee_types',
                'name' => 'employee_types.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            340 => 
            array (
                'id' => 341,
                'parent' => 'employee_types',
                'name' => 'employee_types.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            341 => 
            array (
                'id' => 342,
                'parent' => 'employee_types',
                'name' => 'employee_types.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            342 => 
            array (
                'id' => 343,
                'parent' => 'employee_types',
                'name' => 'employee_types.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            343 => 
            array (
                'id' => 344,
                'parent' => 'pay_frequencies',
                'name' => 'pay_frequencies.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            344 => 
            array (
                'id' => 345,
                'parent' => 'pay_frequencies',
                'name' => 'pay_frequencies.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            345 => 
            array (
                'id' => 346,
                'parent' => 'pay_frequencies',
                'name' => 'pay_frequencies.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            346 => 
            array (
                'id' => 347,
                'parent' => 'pay_frequencies',
                'name' => 'pay_frequencies.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            347 => 
            array (
                'id' => 348,
                'parent' => 'pay_frequencies',
                'name' => 'pay_frequencies.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            348 => 
            array (
                'id' => 349,
                'parent' => 'pay_frequencies',
                'name' => 'pay_frequencies.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            349 => 
            array (
                'id' => 350,
                'parent' => 'pay_frequencies',
                'name' => 'pay_frequencies.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            350 => 
            array (
                'id' => 351,
                'parent' => 'attendance_times',
                'name' => 'attendance_times.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            351 => 
            array (
                'id' => 352,
                'parent' => 'attendance_times',
                'name' => 'attendance_times.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            352 => 
            array (
                'id' => 353,
                'parent' => 'attendance_times',
                'name' => 'attendance_times.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            353 => 
            array (
                'id' => 354,
                'parent' => 'attendance_times',
                'name' => 'attendance_times.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            354 => 
            array (
                'id' => 355,
                'parent' => 'attendance_times',
                'name' => 'attendance_times.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            355 => 
            array (
                'id' => 356,
                'parent' => 'attendance_times',
                'name' => 'attendance_times.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            356 => 
            array (
                'id' => 357,
                'parent' => 'attendance_times',
                'name' => 'attendance_times.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            357 => 
            array (
                'id' => 358,
                'parent' => 'leave_applications',
                'name' => 'leave_applications.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            358 => 
            array (
                'id' => 359,
                'parent' => 'leave_applications',
                'name' => 'leave_applications.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            359 => 
            array (
                'id' => 360,
                'parent' => 'leave_applications',
                'name' => 'leave_applications.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            360 => 
            array (
                'id' => 361,
                'parent' => 'leave_applications',
                'name' => 'leave_applications.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:55',
                'updated_at' => '2023-01-10 08:28:55',
            ),
            361 => 
            array (
                'id' => 362,
                'parent' => 'leave_applications',
                'name' => 'leave_applications.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            362 => 
            array (
                'id' => 363,
                'parent' => 'leave_applications',
                'name' => 'leave_applications.approve',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            363 => 
            array (
                'id' => 364,
                'parent' => 'leave_applications',
                'name' => 'leave_applications.cancel_leave',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            364 => 
            array (
                'id' => 365,
                'parent' => 'leave_applications',
                'name' => 'leave_applications.leave_list',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            365 => 
            array (
                'id' => 366,
                'parent' => 'leave_applications',
                'name' => 'leave_applications.call_back_from_leave',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            366 => 
            array (
                'id' => 367,
                'parent' => 'leave_applications',
                'name' => 'leave_applications.download_employees_on_leave_pdf',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            367 => 
            array (
                'id' => 368,
                'parent' => 'leave_applications',
                'name' => 'leave_applications.download_employees_on_leave_csv',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            368 => 
            array (
                'id' => 369,
                'parent' => 'leave_applications',
                'name' => 'leave_applications.download_employees_on_leave_excel',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            369 => 
            array (
                'id' => 370,
                'parent' => 'leave_types',
                'name' => 'leave_types.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            370 => 
            array (
                'id' => 371,
                'parent' => 'leave_types',
                'name' => 'leave_types.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            371 => 
            array (
                'id' => 372,
                'parent' => 'leave_types',
                'name' => 'leave_types.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            372 => 
            array (
                'id' => 373,
                'parent' => 'leave_types',
                'name' => 'leave_types.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            373 => 
            array (
                'id' => 374,
                'parent' => 'leave_types',
                'name' => 'leave_types.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            374 => 
            array (
                'id' => 375,
                'parent' => 'leave_types',
                'name' => 'leave_types.approve',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            375 => 
            array (
                'id' => 376,
                'parent' => 'leave_types',
                'name' => 'leave_types.employee_leave_types',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            376 => 
            array (
                'id' => 377,
                'parent' => 'employee_leaves',
                'name' => 'employee_leaves.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            377 => 
            array (
                'id' => 378,
                'parent' => 'employee_leaves',
                'name' => 'employee_leaves.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            378 => 
            array (
                'id' => 379,
                'parent' => 'employee_leaves',
                'name' => 'employee_leaves.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            379 => 
            array (
                'id' => 380,
                'parent' => 'employee_leaves',
                'name' => 'employee_leaves.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            380 => 
            array (
                'id' => 381,
                'parent' => 'employee_leaves',
                'name' => 'employee_leaves.change_status',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            381 => 
            array (
                'id' => 382,
                'parent' => 'employee_leaves',
                'name' => 'employee_leaves.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            382 => 
            array (
                'id' => 383,
                'parent' => 'departments',
                'name' => 'departments.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            383 => 
            array (
                'id' => 384,
                'parent' => 'departments',
                'name' => 'departments.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            384 => 
            array (
                'id' => 385,
                'parent' => 'departments',
                'name' => 'departments.update_parent',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            385 => 
            array (
                'id' => 386,
                'parent' => 'departments',
                'name' => 'departments.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            386 => 
            array (
                'id' => 387,
                'parent' => 'sub_departments',
                'name' => 'sub_departments.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            387 => 
            array (
                'id' => 388,
                'parent' => 'sub_departments',
                'name' => 'sub_departments.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            388 => 
            array (
                'id' => 389,
                'parent' => 'sub_departments',
                'name' => 'sub_departments.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            389 => 
            array (
                'id' => 390,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.history',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:56',
                'updated_at' => '2023-01-10 08:28:56',
            ),
            390 => 
            array (
                'id' => 391,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            391 => 
            array (
                'id' => 392,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.check_in',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            392 => 
            array (
                'id' => 393,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.check_out',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            393 => 
            array (
                'id' => 394,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.import',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            394 => 
            array (
                'id' => 395,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.download',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            395 => 
            array (
                'id' => 396,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.view_monthly_attendance',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            396 => 
            array (
                'id' => 397,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.view_employee_attendance',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            397 => 
            array (
                'id' => 398,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.history_date_wise',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            398 => 
            array (
                'id' => 399,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.lateness',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            399 => 
            array (
                'id' => 400,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.missing',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            400 => 
            array (
                'id' => 401,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            401 => 
            array (
                'id' => 402,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.update_status',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            402 => 
            array (
                'id' => 403,
                'parent' => 'employees_attendances',
                'name' => 'employees_attendances.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            403 => 
            array (
                'id' => 404,
                'parent' => 'salary_types',
                'name' => 'salary_types.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            404 => 
            array (
                'id' => 405,
                'parent' => 'salary_types',
                'name' => 'salary_types.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            405 => 
            array (
                'id' => 406,
                'parent' => 'salary_types',
                'name' => 'salary_types.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            406 => 
            array (
                'id' => 407,
                'parent' => 'salary_types',
                'name' => 'salary_types.delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            407 => 
            array (
                'id' => 408,
                'parent' => 'employee_salary_setup',
                'name' => 'employee_salary_setup.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            408 => 
            array (
                'id' => 409,
                'parent' => 'employee_salary_setup',
                'name' => 'employee_salary_setup.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            409 => 
            array (
                'id' => 410,
                'parent' => 'employee_salary_setup',
                'name' => 'employee_salary_setup.check_in',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            410 => 
            array (
                'id' => 411,
                'parent' => 'employee_salary_setup',
                'name' => 'employee_salary_setup.check_out',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            411 => 
            array (
                'id' => 412,
                'parent' => 'employee_salary_setup',
                'name' => 'employee_salary_setup.bulk_upload',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            412 => 
            array (
                'id' => 413,
                'parent' => 'salary_advance',
                'name' => 'salary_advance.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            413 => 
            array (
                'id' => 414,
                'parent' => 'salary_advance',
                'name' => 'salary_advance.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            414 => 
            array (
                'id' => 415,
                'parent' => 'salary_advance',
                'name' => 'salary_advance.list',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            415 => 
            array (
                'id' => 416,
                'parent' => 'salary_advance',
                'name' => 'salary_advance.unpaid',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            416 => 
            array (
                'id' => 417,
                'parent' => 'salary_advance',
                'name' => 'salary_advance.check_out',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            417 => 
            array (
                'id' => 418,
                'parent' => 'salary_advance',
                'name' => 'salary_advance.bulk_upload',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            418 => 
            array (
                'id' => 419,
                'parent' => 'salary_sheet_generator',
                'name' => 'salary_sheet_generator.generate',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            419 => 
            array (
                'id' => 420,
                'parent' => 'salary_sheet_generator',
                'name' => 'salary_sheet_generator.show_list',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:57',
                'updated_at' => '2023-01-10 08:28:57',
            ),
            420 => 
            array (
                'id' => 421,
                'parent' => 'salary_sheet_generator',
                'name' => 'salary_sheet_generator.approve',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            421 => 
            array (
                'id' => 422,
                'parent' => 'salary_sheet_generator',
                'name' => 'salary_sheet_generator.gmb_employee_salary_approval',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            422 => 
            array (
                'id' => 423,
                'parent' => 'salary_sheet_generator',
                'name' => 'salary_sheet_generator.salary_advance_deduction',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            423 => 
            array (
                'id' => 424,
                'parent' => 'salary_sheet_generator',
                'name' => 'salary_sheet_generator.salary_generate_delete',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            424 => 
            array (
                'id' => 425,
                'parent' => 'salary_sheet_generator',
                'name' => 'salary_sheet_generator.gmb_employee_salary_chart',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            425 => 
            array (
                'id' => 426,
                'parent' => 'salary_sheet_generator',
                'name' => 'salary_sheet_generator.salary_generate_delete_download',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            426 => 
            array (
                'id' => 427,
                'parent' => 'bulk_imports',
                'name' => 'bulk_imports.import_patients',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            427 => 
            array (
                'id' => 428,
                'parent' => 'insurances',
                'name' => 'insurances.index',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            428 => 
            array (
                'id' => 429,
                'parent' => 'insurances',
                'name' => 'insurances.create',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            429 => 
            array (
                'id' => 430,
                'parent' => 'insurances',
                'name' => 'insurances.store',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            430 => 
            array (
                'id' => 431,
                'parent' => 'insurances',
                'name' => 'insurances.show',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            431 => 
            array (
                'id' => 432,
                'parent' => 'insurances',
                'name' => 'insurances.edit',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            432 => 
            array (
                'id' => 433,
                'parent' => 'insurances',
                'name' => 'insurances.update',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            433 => 
            array (
                'id' => 434,
                'parent' => 'insurances',
                'name' => 'insurances.destroy',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
            434 => 
            array (
                'id' => 435,
                'parent' => 'fetch',
                'name' => 'fetch.photo',
                'guard_name' => 'api',
                'created_at' => '2023-01-10 08:28:58',
                'updated_at' => '2023-01-10 08:28:58',
            ),
        ));
        
        
    }
}