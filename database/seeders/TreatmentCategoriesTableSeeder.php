<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TreatmentCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('treatment_categories')->delete();
        
        \DB::table('treatment_categories')->insert(array (
            0 => 
            array (
                'created_at' => '2022-03-30 16:38:59',
                'facility_id' => NULL,
                'id' => 3,
                'name' => 'Consultation and diagnostics',
                'parent_id' => 0,
                'updated_at' => '2022-03-30 16:38:59',
            ),
            1 => 
            array (
                'created_at' => '2022-03-30 16:39:28',
                'facility_id' => NULL,
                'id' => 4,
                'name' => 'Diagnostic examination',
                'parent_id' => 3,
                'updated_at' => '2022-03-30 16:39:28',
            ),
            2 => 
            array (
                'created_at' => '2022-03-30 16:40:00',
                'facility_id' => NULL,
                'id' => 5,
                'name' => 'Additional diagnostic examination, general',
                'parent_id' => 3,
                'updated_at' => '2022-03-30 16:40:00',
            ),
            3 => 
            array (
                'created_at' => '2022-03-30 16:40:17',
                'facility_id' => NULL,
                'id' => 6,
                'name' => 'Surcharges and miscellaneous',
                'parent_id' => 3,
                'updated_at' => '2022-03-30 16:40:17',
            ),
            4 => 
            array (
                'created_at' => '2022-03-30 16:41:48',
                'facility_id' => NULL,
                'id' => 8,
            'name' => 'Taking and/or reviewing photos (X)',
                'parent_id' => 0,
                'updated_at' => '2022-03-30 16:41:48',
            ),
            5 => 
            array (
                'created_at' => '2022-03-30 16:42:03',
                'facility_id' => NULL,
                'id' => 9,
            'name' => 'Preventive Oral Care (M)',
                'parent_id' => 0,
                'updated_at' => '2022-03-30 16:42:03',
            ),
            6 => 
            array (
                'created_at' => '2022-03-30 16:42:17',
                'facility_id' => NULL,
                'id' => 10,
            'name' => 'Anesthetic (A)',
                'parent_id' => 0,
                'updated_at' => '2022-03-30 16:42:17',
            ),
            7 => 
            array (
                'created_at' => '2022-03-30 16:42:44',
                'facility_id' => NULL,
                'id' => 11,
            'name' => 'Anesthesia by means of a sedative (B)',
                'parent_id' => 0,
                'updated_at' => '2022-03-30 16:42:44',
            ),
            8 => 
            array (
                'created_at' => '2022-03-30 16:43:42',
                'facility_id' => NULL,
                'id' => 12,
            'name' => 'Fillings (V)',
                'parent_id' => 0,
                'updated_at' => '2022-03-30 16:43:42',
            ),
            9 => 
            array (
                'created_at' => '2022-03-30 16:44:05',
                'facility_id' => NULL,
                'id' => 13,
            'name' => 'Root Canal Treatments (E)',
                'parent_id' => 0,
                'updated_at' => '2022-03-30 16:44:05',
            ),
            10 => 
            array (
                'created_at' => '2022-03-30 16:44:31',
                'facility_id' => NULL,
                'id' => 14,
                'name' => 'Research, diagnostics and treatment planning',
                'parent_id' => 13,
                'updated_at' => '2022-03-30 16:44:31',
            ),
            11 => 
            array (
                'created_at' => '2022-03-30 16:45:13',
                'facility_id' => NULL,
                'id' => 15,
            'name' => 'Crown and bridge (R)',
                'parent_id' => 0,
                'updated_at' => '2022-03-30 16:45:13',
            ),
            12 => 
            array (
                'created_at' => '2022-03-30 16:45:34',
                'facility_id' => NULL,
                'id' => 16,
                'name' => 'Inlays and crowns',
                'parent_id' => 15,
                'updated_at' => '2022-03-30 16:45:34',
            ),
            13 => 
            array (
                'created_at' => '2022-03-30 16:46:28',
                'facility_id' => NULL,
                'id' => 17,
                'name' => 'idge work',
                'parent_id' => 15,
                'updated_at' => '2022-03-30 16:46:28',
            ),
            14 => 
            array (
                'created_at' => '2022-03-30 16:46:52',
                'facility_id' => NULL,
                'id' => 18,
                'name' => 'Restorations miscellaneous',
                'parent_id' => 15,
                'updated_at' => '2022-03-30 16:46:52',
            ),
            15 => 
            array (
                'created_at' => '2022-03-30 16:47:19',
                'facility_id' => NULL,
                'id' => 19,
                'name' => 'Ceramic or plastic shield',
                'parent_id' => 15,
                'updated_at' => '2022-03-30 16:47:19',
            ),
            16 => 
            array (
                'created_at' => '2022-03-30 16:48:02',
                'facility_id' => NULL,
                'id' => 20,
            'name' => 'Treatment of the masticatory system (G)',
                'parent_id' => 0,
                'updated_at' => '2022-03-30 16:48:02',
            ),
            17 => 
            array (
                'created_at' => '2022-03-30 16:48:22',
                'facility_id' => NULL,
                'id' => 21,
            'name' => ' Pain and movement disorders (Orofacial Pain and Dysfunction, OPD)',
                'parent_id' => 20,
                'updated_at' => '2022-03-30 16:48:22',
            ),
            18 => 
            array (
                'created_at' => '2022-03-30 16:51:20',
                'facility_id' => NULL,
                'id' => 22,
                'name' => 'Bite registrations',
                'parent_id' => 20,
                'updated_at' => '2022-03-30 16:51:20',
            ),
            19 => 
            array (
                'created_at' => '2022-03-30 16:52:12',
                'facility_id' => NULL,
                'id' => 23,
                'name' => 'Snoring and sleep disorder braces',
                'parent_id' => 20,
                'updated_at' => '2022-03-30 16:52:12',
            ),
            20 => 
            array (
                'created_at' => '2022-03-30 16:52:51',
                'facility_id' => NULL,
                'id' => 24,
                'name' => 'Myofunctional equipment',
                'parent_id' => 20,
                'updated_at' => '2022-03-30 16:52:51',
            ),
            21 => 
            array (
                'created_at' => '2022-03-30 16:53:28',
                'facility_id' => NULL,
                'id' => 25,
            'name' => 'Surgical procedures (including anesthesia) (H)',
                'parent_id' => 0,
                'updated_at' => '2022-03-30 16:53:28',
            ),
            22 => 
            array (
                'created_at' => '2022-03-30 16:54:01',
                'facility_id' => NULL,
                'id' => 26,
                'name' => 'Part A',
                'parent_id' => 25,
                'updated_at' => '2022-03-30 16:54:01',
            ),
            23 => 
            array (
                'created_at' => '2022-03-30 16:55:11',
                'facility_id' => NULL,
                'id' => 27,
                'name' => 'Part B',
                'parent_id' => 25,
                'updated_at' => '2022-03-30 16:55:11',
            ),
            24 => 
            array (
                'created_at' => '2022-03-30 16:55:36',
                'facility_id' => NULL,
                'id' => 28,
            'name' => 'Dentures (P)',
                'parent_id' => 0,
                'updated_at' => '2022-03-30 16:55:36',
            ),
            25 => 
            array (
                'created_at' => '2022-03-30 16:56:12',
                'facility_id' => NULL,
                'id' => 29,
                'name' => 'Full dentures',
                'parent_id' => 28,
                'updated_at' => '2022-03-30 16:56:12',
            ),
            26 => 
            array (
                'created_at' => '2022-03-30 19:35:22',
                'facility_id' => NULL,
                'id' => 30,
                'name' => 'Root canal treatment',
                'parent_id' => 13,
                'updated_at' => '2022-03-30 19:35:22',
            ),
        ));
        
        
    }
}