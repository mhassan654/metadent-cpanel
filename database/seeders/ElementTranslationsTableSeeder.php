<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ElementTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('element_translations')->delete();
        
        \DB::table('element_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'element_id' => 1,
                'language_id' => 1,
                'translation' => 'Das',
                'created_by' => 1,
                'created_at' => '2022-10-19 06:08:26',
                'updated_at' => '2022-10-19 06:08:26',
            ),
            1 => 
            array (
                'id' => 2,
                'element_id' => 1,
                'language_id' => 1,
                'translation' => 'Dashboard',
                'created_by' => 1,
                'created_at' => '2022-10-19 06:08:41',
                'updated_at' => '2022-10-19 06:08:41',
            ),
            2 => 
            array (
                'id' => 3,
                'element_id' => 66,
                'language_id' => 1,
                'translation' => 'Tijd',
                'created_by' => 1,
                'created_at' => '2022-10-19 08:20:40',
                'updated_at' => '2022-10-19 08:20:40',
            ),
            3 => 
            array (
                'id' => 4,
                'element_id' => 66,
                'language_id' => 1,
                'translation' => 'Tijd',
                'created_by' => 1,
                'created_at' => '2022-10-19 08:20:43',
                'updated_at' => '2022-10-19 08:20:43',
            ),
            4 => 
            array (
                'id' => 5,
                'element_id' => 66,
                'language_id' => 1,
                'translation' => 'Tijd',
                'created_by' => 1,
                'created_at' => '2022-10-19 08:20:47',
                'updated_at' => '2022-10-19 08:20:47',
            ),
            5 => 
            array (
                'id' => 6,
                'element_id' => 66,
                'language_id' => 1,
                'translation' => 'Tijd',
                'created_by' => 1,
                'created_at' => '2022-10-19 08:21:06',
                'updated_at' => '2022-10-19 08:21:06',
            ),
            6 => 
            array (
                'id' => 7,
                'element_id' => 13,
                'language_id' => 1,
                'translation' => 'Totaal Patient',
                'created_by' => 1,
                'created_at' => '2022-10-19 08:21:22',
                'updated_at' => '2022-10-19 08:21:22',
            ),
            7 => 
            array (
                'id' => 8,
                'element_id' => 67,
                'language_id' => 1,
                'translation' => 'Dag',
                'created_by' => 1,
                'created_at' => '2022-10-19 08:22:03',
                'updated_at' => '2022-10-19 08:22:03',
            ),
            8 => 
            array (
                'id' => 9,
                'element_id' => 13,
                'language_id' => 1,
                'translation' => 'Totaal Patient',
                'created_by' => 1,
                'created_at' => '2022-10-19 08:22:30',
                'updated_at' => '2022-10-19 08:22:30',
            ),
            9 => 
            array (
                'id' => 10,
                'element_id' => 13,
                'language_id' => 1,
                'translation' => 'Totaal Patient',
                'created_by' => 1,
                'created_at' => '2022-10-19 08:23:23',
                'updated_at' => '2022-10-19 08:23:23',
            ),
            10 => 
            array (
                'id' => 11,
                'element_id' => 30,
                'language_id' => 1,
                'translation' => 'Mijn Taak',
                'created_by' => 1,
                'created_at' => '2022-10-19 08:24:08',
                'updated_at' => '2022-10-19 08:24:08',
            ),
            11 => 
            array (
                'id' => 12,
                'element_id' => 20,
                'language_id' => 1,
                'translation' => 'Afdeling',
                'created_by' => 1,
                'created_at' => '2022-10-19 09:19:08',
                'updated_at' => '2022-10-19 09:19:08',
            ),
            12 => 
            array (
                'id' => 13,
                'element_id' => 45,
                'language_id' => 1,
                'translation' => 'PLANNING ASSISTENT',
                'created_by' => 1,
                'created_at' => '2022-10-19 14:59:41',
                'updated_at' => '2022-10-19 14:59:41',
            ),
            13 => 
            array (
                'id' => 14,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-19 15:00:43',
                'updated_at' => '2022-10-19 15:00:43',
            ),
            14 => 
            array (
                'id' => 15,
                'element_id' => 19,
                'language_id' => 1,
                'translation' => 'Zoek Op Trefwoord',
                'created_by' => 1,
                'created_at' => '2022-10-19 15:02:34',
                'updated_at' => '2022-10-19 15:02:34',
            ),
            15 => 
            array (
                'id' => 16,
                'element_id' => 19,
                'language_id' => 1,
                'translation' => 'Zoek Op Trefwoord',
                'created_by' => 1,
                'created_at' => '2022-10-19 15:02:35',
                'updated_at' => '2022-10-19 15:02:35',
            ),
            16 => 
            array (
                'id' => 17,
                'element_id' => 19,
                'language_id' => 1,
                'translation' => 'Zoek Op Trefwoord',
                'created_by' => 1,
                'created_at' => '2022-10-19 15:02:40',
                'updated_at' => '2022-10-19 15:02:40',
            ),
            17 => 
            array (
                'id' => 18,
                'element_id' => 69,
                'language_id' => 1,
                'translation' => 'Vandaag',
                'created_by' => 1,
                'created_at' => '2022-10-20 07:30:30',
                'updated_at' => '2022-10-20 07:30:30',
            ),
            18 => 
            array (
                'id' => 19,
                'element_id' => 69,
                'language_id' => 1,
                'translation' => 'Vandaag',
                'created_by' => 1,
                'created_at' => '2022-10-20 07:30:32',
                'updated_at' => '2022-10-20 07:30:32',
            ),
            19 => 
            array (
                'id' => 20,
                'element_id' => 1,
                'language_id' => 1,
                'translation' => 'instrumenten bord',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:43:07',
                'updated_at' => '2022-10-20 09:43:07',
            ),
            20 => 
            array (
                'id' => 21,
                'element_id' => 1,
                'language_id' => 1,
                'translation' => 'instrumenten bord',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:43:13',
                'updated_at' => '2022-10-20 09:43:13',
            ),
            21 => 
            array (
                'id' => 22,
                'element_id' => 1,
                'language_id' => 1,
                'translation' => 'instrumenten bord',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:43:23',
                'updated_at' => '2022-10-20 09:43:23',
            ),
            22 => 
            array (
                'id' => 23,
                'element_id' => 1,
                'language_id' => 1,
                'translation' => 'instrumenten bord',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:43:49',
                'updated_at' => '2022-10-20 09:43:49',
            ),
            23 => 
            array (
                'id' => 24,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:44:03',
                'updated_at' => '2022-10-20 09:44:03',
            ),
            24 => 
            array (
                'id' => 25,
                'element_id' => 3,
                'language_id' => 1,
                'translation' => 'receptie',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:44:17',
                'updated_at' => '2022-10-20 09:44:17',
            ),
            25 => 
            array (
                'id' => 26,
                'element_id' => 8,
                'language_id' => 1,
                'translation' => 'verzekering',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:44:35',
                'updated_at' => '2022-10-20 09:44:35',
            ),
            26 => 
            array (
                'id' => 27,
                'element_id' => 8,
                'language_id' => 1,
                'translation' => 'verzekering',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:44:36',
                'updated_at' => '2022-10-20 09:44:36',
            ),
            27 => 
            array (
                'id' => 28,
                'element_id' => 8,
                'language_id' => 1,
                'translation' => 'verzekering',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:44:37',
                'updated_at' => '2022-10-20 09:44:37',
            ),
            28 => 
            array (
                'id' => 29,
                'element_id' => 8,
                'language_id' => 1,
                'translation' => 'verzekering',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:44:39',
                'updated_at' => '2022-10-20 09:44:39',
            ),
            29 => 
            array (
                'id' => 30,
                'element_id' => 8,
                'language_id' => 1,
                'translation' => 'verzekering',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:44:50',
                'updated_at' => '2022-10-20 09:44:50',
            ),
            30 => 
            array (
                'id' => 31,
                'element_id' => 1,
                'language_id' => 1,
                'translation' => 'Instrumenten bord',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:45:07',
                'updated_at' => '2022-10-20 09:45:07',
            ),
            31 => 
            array (
                'id' => 32,
                'element_id' => 8,
                'language_id' => 1,
                'translation' => 'Verzekering',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:45:14',
                'updated_at' => '2022-10-20 09:45:14',
            ),
            32 => 
            array (
                'id' => 33,
                'element_id' => 9,
                'language_id' => 1,
                'translation' => 'Beeldweergave',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:45:58',
                'updated_at' => '2022-10-20 09:45:58',
            ),
            33 => 
            array (
                'id' => 34,
                'element_id' => 3,
                'language_id' => 1,
                'translation' => 'Receptie',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:46:17',
                'updated_at' => '2022-10-20 09:46:17',
            ),
            34 => 
            array (
                'id' => 35,
                'element_id' => 10,
                'language_id' => 1,
                'translation' => 'Personeelszaken',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:46:34',
                'updated_at' => '2022-10-20 09:46:34',
            ),
            35 => 
            array (
                'id' => 36,
                'element_id' => 4,
                'language_id' => 1,
                'translation' => 'Patienten',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:46:50',
                'updated_at' => '2022-10-20 09:46:50',
            ),
            36 => 
            array (
                'id' => 37,
                'element_id' => 11,
                'language_id' => 1,
                'translation' => 'Instellingen',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:47:00',
                'updated_at' => '2022-10-20 09:47:00',
            ),
            37 => 
            array (
                'id' => 38,
                'element_id' => 5,
                'language_id' => 1,
                'translation' => 'Kalender',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:47:09',
                'updated_at' => '2022-10-20 09:47:09',
            ),
            38 => 
            array (
                'id' => 39,
                'element_id' => 12,
                'language_id' => 1,
                'translation' => 'Uitloggen',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:47:40',
                'updated_at' => '2022-10-20 09:47:40',
            ),
            39 => 
            array (
                'id' => 40,
                'element_id' => 6,
                'language_id' => 1,
                'translation' => 'Facturering',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:48:17',
                'updated_at' => '2022-10-20 09:48:17',
            ),
            40 => 
            array (
                'id' => 41,
                'element_id' => 7,
                'language_id' => 1,
                'translation' => 'Rapportage',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:48:29',
                'updated_at' => '2022-10-20 09:48:29',
            ),
            41 => 
            array (
                'id' => 42,
                'element_id' => 68,
                'language_id' => 1,
                'translation' => 'Dagen',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:48:45',
                'updated_at' => '2022-10-20 09:48:45',
            ),
            42 => 
            array (
                'id' => 43,
                'element_id' => 70,
                'language_id' => 1,
                'translation' => 'Week',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:49:00',
                'updated_at' => '2022-10-20 09:49:00',
            ),
            43 => 
            array (
                'id' => 44,
                'element_id' => 71,
                'language_id' => 1,
                'translation' => 'Werkweek',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:49:07',
                'updated_at' => '2022-10-20 09:49:07',
            ),
            44 => 
            array (
                'id' => 45,
                'element_id' => 72,
                'language_id' => 1,
                'translation' => 'Weken',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:49:14',
                'updated_at' => '2022-10-20 09:49:14',
            ),
            45 => 
            array (
                'id' => 46,
                'element_id' => 73,
                'language_id' => 1,
                'translation' => 'Maand',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:49:21',
                'updated_at' => '2022-10-20 09:49:21',
            ),
            46 => 
            array (
                'id' => 47,
                'element_id' => 74,
                'language_id' => 1,
                'translation' => 'Maanden',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:49:30',
                'updated_at' => '2022-10-20 09:49:30',
            ),
            47 => 
            array (
                'id' => 48,
                'element_id' => 75,
                'language_id' => 1,
                'translation' => 'Jaar',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:49:38',
                'updated_at' => '2022-10-20 09:49:38',
            ),
            48 => 
            array (
                'id' => 49,
                'element_id' => 75,
                'language_id' => 1,
                'translation' => 'Jaar',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:49:38',
                'updated_at' => '2022-10-20 09:49:38',
            ),
            49 => 
            array (
                'id' => 50,
                'element_id' => 76,
                'language_id' => 1,
                'translation' => 'Jaren',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:49:45',
                'updated_at' => '2022-10-20 09:49:45',
            ),
            50 => 
            array (
                'id' => 51,
                'element_id' => 77,
                'language_id' => 1,
                'translation' => 'Patient',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:49:55',
                'updated_at' => '2022-10-20 09:49:55',
            ),
            51 => 
            array (
                'id' => 52,
                'element_id' => 78,
                'language_id' => 1,
                'translation' => 'Patienten',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:50:07',
                'updated_at' => '2022-10-20 09:50:07',
            ),
            52 => 
            array (
                'id' => 53,
                'element_id' => 79,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:50:18',
                'updated_at' => '2022-10-20 09:50:18',
            ),
            53 => 
            array (
                'id' => 54,
                'element_id' => 80,
                'language_id' => 1,
                'translation' => 'Doctoren',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:50:25',
                'updated_at' => '2022-10-20 09:50:25',
            ),
            54 => 
            array (
                'id' => 55,
                'element_id' => 81,
                'language_id' => 1,
                'translation' => 'Behandeling',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:50:37',
                'updated_at' => '2022-10-20 09:50:37',
            ),
            55 => 
            array (
                'id' => 56,
                'element_id' => 82,
                'language_id' => 1,
                'translation' => 'Behandelingen',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:50:46',
                'updated_at' => '2022-10-20 09:50:46',
            ),
            56 => 
            array (
                'id' => 57,
                'element_id' => 83,
                'language_id' => 1,
                'translation' => 'Afspraak',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:50:58',
                'updated_at' => '2022-10-20 09:50:58',
            ),
            57 => 
            array (
                'id' => 58,
                'element_id' => 84,
                'language_id' => 1,
                'translation' => 'Afspraken',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:51:27',
                'updated_at' => '2022-10-20 09:51:27',
            ),
            58 => 
            array (
                'id' => 59,
                'element_id' => 85,
                'language_id' => 1,
                'translation' => 'Kalender',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:51:36',
                'updated_at' => '2022-10-20 09:51:36',
            ),
            59 => 
            array (
                'id' => 60,
                'element_id' => 86,
                'language_id' => 1,
                'translation' => 'Naam',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:51:44',
                'updated_at' => '2022-10-20 09:51:44',
            ),
            60 => 
            array (
                'id' => 61,
                'element_id' => 87,
                'language_id' => 1,
                'translation' => 'Adres',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:51:54',
                'updated_at' => '2022-10-20 09:51:54',
            ),
            61 => 
            array (
                'id' => 62,
                'element_id' => 88,
                'language_id' => 1,
                'translation' => 'Reset',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:54:00',
                'updated_at' => '2022-10-20 09:54:00',
            ),
            62 => 
            array (
                'id' => 63,
                'element_id' => 89,
                'language_id' => 1,
                'translation' => 'Annuleren',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:54:21',
                'updated_at' => '2022-10-20 09:54:21',
            ),
            63 => 
            array (
                'id' => 64,
                'element_id' => 90,
                'language_id' => 1,
                'translation' => 'Opslaan',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:54:33',
                'updated_at' => '2022-10-20 09:54:33',
            ),
            64 => 
            array (
                'id' => 65,
                'element_id' => 91,
                'language_id' => 1,
                'translation' => 'Konfiguratie',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:54:51',
                'updated_at' => '2022-10-20 09:54:51',
            ),
            65 => 
            array (
                'id' => 66,
                'element_id' => 91,
                'language_id' => 1,
                'translation' => 'Konfiguraties',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:55:05',
                'updated_at' => '2022-10-20 09:55:05',
            ),
            66 => 
            array (
                'id' => 67,
                'element_id' => 91,
                'language_id' => 1,
                'translation' => 'Konfiguraties',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:55:07',
                'updated_at' => '2022-10-20 09:55:07',
            ),
            67 => 
            array (
                'id' => 68,
                'element_id' => 92,
                'language_id' => 1,
                'translation' => 'Adres',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:55:16',
                'updated_at' => '2022-10-20 09:55:16',
            ),
            68 => 
            array (
                'id' => 69,
                'element_id' => 13,
                'language_id' => 1,
                'translation' => 'Totaal Aantal Patienten',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:55:38',
                'updated_at' => '2022-10-20 09:55:38',
            ),
            69 => 
            array (
                'id' => 70,
                'element_id' => 14,
                'language_id' => 1,
                'translation' => 'Vandaag Te Verwachten Patienten',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:56:09',
                'updated_at' => '2022-10-20 09:56:09',
            ),
            70 => 
            array (
                'id' => 71,
                'element_id' => 15,
                'language_id' => 1,
                'translation' => 'Openstaande Facturen',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:56:32',
                'updated_at' => '2022-10-20 09:56:32',
            ),
            71 => 
            array (
                'id' => 72,
                'element_id' => 16,
                'language_id' => 1,
                'translation' => 'Voltooide Afspraken',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:56:48',
                'updated_at' => '2022-10-20 09:56:48',
            ),
            72 => 
            array (
                'id' => 73,
                'element_id' => 17,
                'language_id' => 1,
                'translation' => 'Afspraak Kalender',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:57:06',
                'updated_at' => '2022-10-20 09:57:06',
            ),
            73 => 
            array (
                'id' => 74,
                'element_id' => 18,
                'language_id' => 1,
                'translation' => 'Aanstaande Afspraken',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:57:33',
                'updated_at' => '2022-10-20 09:57:33',
            ),
            74 => 
            array (
                'id' => 75,
                'element_id' => 21,
                'language_id' => 1,
                'translation' => 'Soort Afspraak',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:58:11',
                'updated_at' => '2022-10-20 09:58:11',
            ),
            75 => 
            array (
                'id' => 76,
                'element_id' => 22,
                'language_id' => 1,
                'translation' => 'Toegewezen aan',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:58:55',
                'updated_at' => '2022-10-20 09:58:55',
            ),
            76 => 
            array (
                'id' => 77,
                'element_id' => 23,
                'language_id' => 1,
                'translation' => 'Nieuwe Afspraak',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:59:07',
                'updated_at' => '2022-10-20 09:59:07',
            ),
            77 => 
            array (
                'id' => 78,
                'element_id' => 24,
                'language_id' => 1,
                'translation' => 'Aanstaande',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:59:23',
                'updated_at' => '2022-10-20 09:59:23',
            ),
            78 => 
            array (
                'id' => 79,
                'element_id' => 25,
                'language_id' => 1,
                'translation' => 'Wachtende Patienten',
                'created_by' => 1,
                'created_at' => '2022-10-20 09:59:49',
                'updated_at' => '2022-10-20 09:59:49',
            ),
            79 => 
            array (
                'id' => 80,
                'element_id' => 26,
                'language_id' => 1,
                'translation' => 'In Behandeling',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:00:00',
                'updated_at' => '2022-10-20 10:00:00',
            ),
            80 => 
            array (
                'id' => 81,
                'element_id' => 27,
                'language_id' => 1,
                'translation' => 'Voltooide Behandeling',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:00:12',
                'updated_at' => '2022-10-20 10:00:12',
            ),
            81 => 
            array (
                'id' => 82,
                'element_id' => 28,
                'language_id' => 1,
                'translation' => 'Inchecken',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:00:39',
                'updated_at' => '2022-10-20 10:00:39',
            ),
            82 => 
            array (
                'id' => 83,
                'element_id' => 29,
                'language_id' => 1,
                'translation' => 'Mijn Wachtrij',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:00:55',
                'updated_at' => '2022-10-20 10:00:55',
            ),
            83 => 
            array (
                'id' => 84,
                'element_id' => 30,
                'language_id' => 1,
                'translation' => 'Mijn Taken',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:01:07',
                'updated_at' => '2022-10-20 10:01:07',
            ),
            84 => 
            array (
                'id' => 85,
                'element_id' => 31,
                'language_id' => 1,
                'translation' => 'Telefoon',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:01:18',
                'updated_at' => '2022-10-20 10:01:18',
            ),
            85 => 
            array (
                'id' => 86,
                'element_id' => 32,
                'language_id' => 1,
                'translation' => 'Gast',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:01:26',
                'updated_at' => '2022-10-20 10:01:26',
            ),
            86 => 
            array (
                'id' => 87,
                'element_id' => 32,
                'language_id' => 1,
                'translation' => 'Gast',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:01:27',
                'updated_at' => '2022-10-20 10:01:27',
            ),
            87 => 
            array (
                'id' => 88,
                'element_id' => 33,
                'language_id' => 1,
                'translation' => 'In Behandeling',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:01:37',
                'updated_at' => '2022-10-20 10:01:37',
            ),
            88 => 
            array (
                'id' => 89,
                'element_id' => 34,
                'language_id' => 1,
                'translation' => 'Reden',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:01:50',
                'updated_at' => '2022-10-20 10:01:50',
            ),
            89 => 
            array (
                'id' => 90,
                'element_id' => 35,
                'language_id' => 1,
                'translation' => 'Tijdlijn',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:02:12',
                'updated_at' => '2022-10-20 10:02:12',
            ),
            90 => 
            array (
                'id' => 91,
                'element_id' => 36,
                'language_id' => 1,
                'translation' => 'Terug In de Wachtrij',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:02:30',
                'updated_at' => '2022-10-20 10:02:30',
            ),
            91 => 
            array (
                'id' => 92,
                'element_id' => 37,
                'language_id' => 1,
                'translation' => 'Beeindigd',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:02:45',
                'updated_at' => '2022-10-20 10:02:45',
            ),
            92 => 
            array (
                'id' => 93,
                'element_id' => 38,
                'language_id' => 1,
                'translation' => 'Dagelijkse Wachtrij',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:03:42',
                'updated_at' => '2022-10-20 10:03:42',
            ),
            93 => 
            array (
                'id' => 94,
                'element_id' => 39,
                'language_id' => 1,
                'translation' => 'De Dokter s Schema',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:04:15',
                'updated_at' => '2022-10-20 10:04:15',
            ),
            94 => 
            array (
                'id' => 95,
                'element_id' => 40,
                'language_id' => 1,
                'translation' => 'Wachtlijst',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:04:25',
                'updated_at' => '2022-10-20 10:04:25',
            ),
            95 => 
            array (
                'id' => 96,
                'element_id' => 41,
                'language_id' => 1,
                'translation' => 'Open',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:04:34',
                'updated_at' => '2022-10-20 10:04:34',
            ),
            96 => 
            array (
                'id' => 97,
                'element_id' => 42,
                'language_id' => 1,
                'translation' => 'Annuleren',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:05:03',
                'updated_at' => '2022-10-20 10:05:03',
            ),
            97 => 
            array (
                'id' => 98,
                'element_id' => 43,
                'language_id' => 1,
                'translation' => 'Afspraak Verzetten',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:05:45',
                'updated_at' => '2022-10-20 10:05:45',
            ),
            98 => 
            array (
                'id' => 99,
                'element_id' => 44,
                'language_id' => 1,
                'translation' => 'Staat',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:05:54',
                'updated_at' => '2022-10-20 10:05:54',
            ),
            99 => 
            array (
                'id' => 100,
                'element_id' => 45,
                'language_id' => 1,
                'translation' => 'PLANNING ASSISTENT',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:06:11',
                'updated_at' => '2022-10-20 10:06:11',
            ),
            100 => 
            array (
                'id' => 101,
                'element_id' => 46,
                'language_id' => 1,
                'translation' => 'Afspraak Patient',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:06:29',
                'updated_at' => '2022-10-20 10:06:29',
            ),
            101 => 
            array (
                'id' => 102,
                'element_id' => 47,
                'language_id' => 1,
                'translation' => 'Selecteer Patient',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:06:38',
                'updated_at' => '2022-10-20 10:06:38',
            ),
            102 => 
            array (
                'id' => 103,
                'element_id' => 48,
                'language_id' => 1,
                'translation' => 'Hoofd Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:06:55',
                'updated_at' => '2022-10-20 10:06:55',
            ),
            103 => 
            array (
                'id' => 104,
                'element_id' => 49,
                'language_id' => 1,
                'translation' => 'Selecteer Behandeling',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:07:12',
                'updated_at' => '2022-10-20 10:07:12',
            ),
            104 => 
            array (
                'id' => 105,
                'element_id' => 50,
                'language_id' => 1,
                'translation' => 'Selecteer Soort',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:07:22',
                'updated_at' => '2022-10-20 10:07:22',
            ),
            105 => 
            array (
                'id' => 106,
                'element_id' => 50,
                'language_id' => 1,
                'translation' => 'Selecteer Soort',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:07:23',
                'updated_at' => '2022-10-20 10:07:23',
            ),
            106 => 
            array (
                'id' => 107,
                'element_id' => 51,
                'language_id' => 1,
                'translation' => 'Voeg Benodigde Doktoren toe',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:07:38',
                'updated_at' => '2022-10-20 10:07:38',
            ),
            107 => 
            array (
                'id' => 108,
                'element_id' => 52,
                'language_id' => 1,
                'translation' => 'Andere Aanwezigen',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:07:53',
                'updated_at' => '2022-10-20 10:07:53',
            ),
            108 => 
            array (
                'id' => 109,
                'element_id' => 53,
                'language_id' => 1,
                'translation' => 'Begin',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:08:01',
                'updated_at' => '2022-10-20 10:08:01',
            ),
            109 => 
            array (
                'id' => 110,
                'element_id' => 54,
                'language_id' => 1,
                'translation' => 'Einde',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:08:09',
                'updated_at' => '2022-10-20 10:08:09',
            ),
            110 => 
            array (
                'id' => 111,
                'element_id' => 55,
                'language_id' => 1,
            'translation' => 'Technisch Werk (TW)',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:08:29',
                'updated_at' => '2022-10-20 10:08:29',
            ),
            111 => 
            array (
                'id' => 112,
                'element_id' => 56,
                'language_id' => 1,
                'translation' => 'Ja',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:08:36',
                'updated_at' => '2022-10-20 10:08:36',
            ),
            112 => 
            array (
                'id' => 113,
                'element_id' => 57,
                'language_id' => 1,
                'translation' => 'Nee',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:08:40',
                'updated_at' => '2022-10-20 10:08:40',
            ),
            113 => 
            array (
                'id' => 114,
                'element_id' => 58,
                'language_id' => 1,
                'translation' => 'Kies Frequentie',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:09:34',
                'updated_at' => '2022-10-20 10:09:34',
            ),
            114 => 
            array (
                'id' => 115,
                'element_id' => 56,
                'language_id' => 1,
                'translation' => 'Ja',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:09:42',
                'updated_at' => '2022-10-20 10:09:42',
            ),
            115 => 
            array (
                'id' => 116,
                'element_id' => 59,
                'language_id' => 1,
                'translation' => 'Komt Elke',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:10:20',
                'updated_at' => '2022-10-20 10:10:20',
            ),
            116 => 
            array (
                'id' => 117,
                'element_id' => 60,
                'language_id' => 1,
                'translation' => 'Toegewezen Aan',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:10:49',
                'updated_at' => '2022-10-20 10:10:49',
            ),
            117 => 
            array (
                'id' => 118,
                'element_id' => 61,
                'language_id' => 1,
                'translation' => 'Patient',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:10:58',
                'updated_at' => '2022-10-20 10:10:58',
            ),
            118 => 
            array (
                'id' => 119,
                'element_id' => 62,
                'language_id' => 1,
                'translation' => 'Behandeling',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:11:05',
                'updated_at' => '2022-10-20 10:11:05',
            ),
            119 => 
            array (
                'id' => 120,
                'element_id' => 63,
                'language_id' => 1,
            'translation' => 'Doktor (en)',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:11:17',
                'updated_at' => '2022-10-20 10:11:17',
            ),
            120 => 
            array (
                'id' => 121,
                'element_id' => 64,
                'language_id' => 1,
                'translation' => 'Afdeling',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:11:26',
                'updated_at' => '2022-10-20 10:11:26',
            ),
            121 => 
            array (
                'id' => 122,
                'element_id' => 65,
                'language_id' => 1,
                'translation' => 'Afdeling ld',
                'created_by' => 1,
                'created_at' => '2022-10-20 10:11:42',
                'updated_at' => '2022-10-20 10:11:42',
            ),
            122 => 
            array (
                'id' => 123,
                'element_id' => 93,
                'language_id' => 1,
                'translation' => 'mijn dashboard',
                'created_by' => 1,
                'created_at' => '2022-10-22 07:43:36',
                'updated_at' => '2022-10-22 07:43:36',
            ),
            123 => 
            array (
                'id' => 124,
                'element_id' => 99,
                'language_id' => 1,
                'translation' => 'Paro',
                'created_by' => 1,
                'created_at' => '2022-10-23 18:38:25',
                'updated_at' => '2022-10-23 18:38:25',
            ),
            124 => 
            array (
                'id' => 125,
                'element_id' => 99,
                'language_id' => 1,
                'translation' => 'Paro',
                'created_by' => 1,
                'created_at' => '2022-10-23 18:38:27',
                'updated_at' => '2022-10-23 18:38:27',
            ),
            125 => 
            array (
                'id' => 126,
                'element_id' => 93,
                'language_id' => 1,
                'translation' => 'Mijn dashboard',
                'created_by' => 1,
                'created_at' => '2022-10-23 18:39:54',
                'updated_at' => '2022-10-23 18:39:54',
            ),
            126 => 
            array (
                'id' => 127,
                'element_id' => 103,
                'language_id' => 1,
                'translation' => 'Zorg Plan',
                'created_by' => 1,
                'created_at' => '2022-10-23 18:41:04',
                'updated_at' => '2022-10-23 18:41:04',
            ),
            127 => 
            array (
                'id' => 128,
                'element_id' => 103,
                'language_id' => 1,
                'translation' => 'Zorg Plan',
                'created_by' => 1,
                'created_at' => '2022-10-23 18:41:36',
                'updated_at' => '2022-10-23 18:41:36',
            ),
            128 => 
            array (
                'id' => 129,
                'element_id' => 103,
                'language_id' => 1,
                'translation' => 'Zorg Plan',
                'created_by' => 1,
                'created_at' => '2022-10-23 18:41:36',
                'updated_at' => '2022-10-23 18:41:36',
            ),
            129 => 
            array (
                'id' => 130,
                'element_id' => 117,
                'language_id' => 1,
                'translation' => 'Datum',
                'created_by' => 1,
                'created_at' => '2022-10-23 18:41:50',
                'updated_at' => '2022-10-23 18:41:50',
            ),
            130 => 
            array (
                'id' => 131,
                'element_id' => 104,
                'language_id' => 1,
                'translation' => 'Behandel Plan',
                'created_by' => 1,
                'created_at' => '2022-10-23 18:42:34',
                'updated_at' => '2022-10-23 18:42:34',
            ),
            131 => 
            array (
                'id' => 132,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 12:23:45',
                'updated_at' => '2022-10-24 12:23:45',
            ),
            132 => 
            array (
                'id' => 133,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 12:24:07',
                'updated_at' => '2022-10-24 12:24:07',
            ),
            133 => 
            array (
                'id' => 134,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 12:27:05',
                'updated_at' => '2022-10-24 12:27:05',
            ),
            134 => 
            array (
                'id' => 135,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 12:27:34',
                'updated_at' => '2022-10-24 12:27:34',
            ),
            135 => 
            array (
                'id' => 136,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 12:28:01',
                'updated_at' => '2022-10-24 12:28:01',
            ),
            136 => 
            array (
                'id' => 137,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 12:29:16',
                'updated_at' => '2022-10-24 12:29:16',
            ),
            137 => 
            array (
                'id' => 138,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 12:32:15',
                'updated_at' => '2022-10-24 12:32:15',
            ),
            138 => 
            array (
                'id' => 139,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 12:34:30',
                'updated_at' => '2022-10-24 12:34:30',
            ),
            139 => 
            array (
                'id' => 140,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 12:34:38',
                'updated_at' => '2022-10-24 12:34:38',
            ),
            140 => 
            array (
                'id' => 141,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 12:34:51',
                'updated_at' => '2022-10-24 12:34:51',
            ),
            141 => 
            array (
                'id' => 142,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 12:34:53',
                'updated_at' => '2022-10-24 12:34:53',
            ),
            142 => 
            array (
                'id' => 143,
                'element_id' => 93,
                'language_id' => 1,
                'translation' => 'Mijn Dashboard',
                'created_by' => 1,
                'created_at' => '2022-10-24 13:06:00',
                'updated_at' => '2022-10-24 13:06:00',
            ),
            143 => 
            array (
                'id' => 144,
                'element_id' => 93,
                'language_id' => 1,
                'translation' => 'Mijn Dashboard',
                'created_by' => 1,
                'created_at' => '2022-10-24 13:06:00',
                'updated_at' => '2022-10-24 13:06:00',
            ),
            144 => 
            array (
                'id' => 145,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 15:27:36',
                'updated_at' => '2022-10-24 15:27:36',
            ),
            145 => 
            array (
                'id' => 146,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 15:27:38',
                'updated_at' => '2022-10-24 15:27:38',
            ),
            146 => 
            array (
                'id' => 147,
                'element_id' => 12,
                'language_id' => 1,
                'translation' => 'Uitloggen',
                'created_by' => 1,
                'created_at' => '2022-10-24 16:02:46',
                'updated_at' => '2022-10-24 16:02:46',
            ),
            147 => 
            array (
                'id' => 148,
                'element_id' => 2,
                'language_id' => 1,
                'translation' => 'Dokter',
                'created_by' => 1,
                'created_at' => '2022-10-24 16:18:09',
                'updated_at' => '2022-10-24 16:18:09',
            ),
            148 => 
            array (
                'id' => 149,
                'element_id' => 88,
                'language_id' => 1,
                'translation' => 'resetten',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:01:39',
                'updated_at' => '2022-10-25 18:01:39',
            ),
            149 => 
            array (
                'id' => 150,
                'element_id' => 100,
                'language_id' => 1,
                'translation' => 'afbeelding',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:02:20',
                'updated_at' => '2022-10-25 18:02:20',
            ),
            150 => 
            array (
                'id' => 151,
                'element_id' => 101,
                'language_id' => 1,
                'translation' => 'historie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:02:34',
                'updated_at' => '2022-10-25 18:02:34',
            ),
            151 => 
            array (
                'id' => 152,
                'element_id' => 102,
                'language_id' => 1,
                'translation' => 'facturering',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:02:45',
                'updated_at' => '2022-10-25 18:02:45',
            ),
            152 => 
            array (
                'id' => 153,
                'element_id' => 106,
                'language_id' => 1,
                'translation' => 'geslacht',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:03:01',
                'updated_at' => '2022-10-25 18:03:01',
            ),
            153 => 
            array (
                'id' => 154,
                'element_id' => 107,
                'language_id' => 1,
                'translation' => 'soort afspraak',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:03:12',
                'updated_at' => '2022-10-25 18:03:12',
            ),
            154 => 
            array (
                'id' => 155,
                'element_id' => 108,
                'language_id' => 1,
                'translation' => 'afspraak tijd',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:03:26',
                'updated_at' => '2022-10-25 18:03:26',
            ),
            155 => 
            array (
                'id' => 156,
                'element_id' => 109,
                'language_id' => 1,
                'translation' => 'afspraak tijdstip',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:04:34',
                'updated_at' => '2022-10-25 18:04:34',
            ),
            156 => 
            array (
                'id' => 157,
                'element_id' => 110,
                'language_id' => 1,
                'translation' => 'activiteit',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:04:49',
                'updated_at' => '2022-10-25 18:04:49',
            ),
            157 => 
            array (
                'id' => 158,
                'element_id' => 111,
                'language_id' => 1,
                'translation' => 'patient ingecheckt',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:05:41',
                'updated_at' => '2022-10-25 18:05:41',
            ),
            158 => 
            array (
                'id' => 159,
                'element_id' => 112,
                'language_id' => 1,
                'translation' => 'behandeling begonnen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:05:55',
                'updated_at' => '2022-10-25 18:05:55',
            ),
            159 => 
            array (
                'id' => 160,
                'element_id' => 116,
                'language_id' => 1,
                'translation' => 'algemeen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:06:06',
                'updated_at' => '2022-10-25 18:06:06',
            ),
            160 => 
            array (
                'id' => 161,
                'element_id' => 116,
                'language_id' => 1,
                'translation' => 'Algemeen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:06:18',
                'updated_at' => '2022-10-25 18:06:18',
            ),
            161 => 
            array (
                'id' => 162,
                'element_id' => 118,
                'language_id' => 1,
                'translation' => 'Beschrijving',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:06:40',
                'updated_at' => '2022-10-25 18:06:40',
            ),
            162 => 
            array (
                'id' => 163,
                'element_id' => 119,
                'language_id' => 1,
                'translation' => 'Tand',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:06:49',
                'updated_at' => '2022-10-25 18:06:49',
            ),
            163 => 
            array (
                'id' => 164,
                'element_id' => 120,
                'language_id' => 1,
                'translation' => 'Aktie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:06:58',
                'updated_at' => '2022-10-25 18:06:58',
            ),
            164 => 
            array (
                'id' => 165,
                'element_id' => 123,
                'language_id' => 1,
                'translation' => 'Vol',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:07:05',
                'updated_at' => '2022-10-25 18:07:05',
            ),
            165 => 
            array (
                'id' => 166,
                'element_id' => 124,
                'language_id' => 1,
                'translation' => 'Afdrukken',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:07:17',
                'updated_at' => '2022-10-25 18:07:17',
            ),
            166 => 
            array (
                'id' => 167,
                'element_id' => 133,
                'language_id' => 1,
                'translation' => 'Opmerkingen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:07:32',
                'updated_at' => '2022-10-25 18:07:32',
            ),
            167 => 
            array (
                'id' => 168,
                'element_id' => 137,
                'language_id' => 1,
                'translation' => 'Door',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:07:40',
                'updated_at' => '2022-10-25 18:07:40',
            ),
            168 => 
            array (
                'id' => 169,
                'element_id' => 163,
                'language_id' => 1,
                'translation' => 'Terug',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:07:48',
                'updated_at' => '2022-10-25 18:07:48',
            ),
            169 => 
            array (
                'id' => 170,
                'element_id' => 170,
                'language_id' => 1,
                'translation' => 'Gedaan',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:07:56',
                'updated_at' => '2022-10-25 18:07:56',
            ),
            170 => 
            array (
                'id' => 171,
                'element_id' => 173,
                'language_id' => 1,
                'translation' => 'Details',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:08:11',
                'updated_at' => '2022-10-25 18:08:11',
            ),
            171 => 
            array (
                'id' => 172,
                'element_id' => 174,
                'language_id' => 1,
                'translation' => 'Verwijderen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:08:39',
                'updated_at' => '2022-10-25 18:08:39',
            ),
            172 => 
            array (
                'id' => 173,
                'element_id' => 176,
                'language_id' => 1,
                'translation' => 'Overzicht',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:09:16',
                'updated_at' => '2022-10-25 18:09:16',
            ),
            173 => 
            array (
                'id' => 174,
                'element_id' => 188,
                'language_id' => 1,
                'translation' => 'Helder',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:09:32',
                'updated_at' => '2022-10-25 18:09:32',
            ),
            174 => 
            array (
                'id' => 175,
                'element_id' => 214,
                'language_id' => 1,
                'translation' => 'Kleuren',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:09:45',
                'updated_at' => '2022-10-25 18:09:45',
            ),
            175 => 
            array (
                'id' => 176,
                'element_id' => 216,
                'language_id' => 1,
                'translation' => 'Uren',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:09:53',
                'updated_at' => '2022-10-25 18:09:53',
            ),
            176 => 
            array (
                'id' => 177,
                'element_id' => 217,
                'language_id' => 1,
                'translation' => 'Minuten',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:10:01',
                'updated_at' => '2022-10-25 18:10:01',
            ),
            177 => 
            array (
                'id' => 178,
                'element_id' => 218,
                'language_id' => 1,
                'translation' => 'Check in tijd',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:10:13',
                'updated_at' => '2022-10-25 18:10:13',
            ),
            178 => 
            array (
                'id' => 179,
                'element_id' => 219,
                'language_id' => 1,
                'translation' => 'Wacht tijd',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:10:22',
                'updated_at' => '2022-10-25 18:10:22',
            ),
            179 => 
            array (
                'id' => 180,
                'element_id' => 220,
                'language_id' => 1,
                'translation' => 'Hallo',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:10:30',
                'updated_at' => '2022-10-25 18:10:30',
            ),
            180 => 
            array (
                'id' => 181,
                'element_id' => 221,
                'language_id' => 1,
                'translation' => 'Je hebt geen in gecheckte afspraken vandaag',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:10:54',
                'updated_at' => '2022-10-25 18:10:54',
            ),
            181 => 
            array (
                'id' => 182,
                'element_id' => 223,
                'language_id' => 1,
                'translation' => 'Of',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:11:04',
                'updated_at' => '2022-10-25 18:11:04',
            ),
            182 => 
            array (
                'id' => 183,
                'element_id' => 225,
                'language_id' => 1,
                'translation' => 'Laden',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:11:12',
                'updated_at' => '2022-10-25 18:11:12',
            ),
            183 => 
            array (
                'id' => 184,
                'element_id' => 232,
                'language_id' => 1,
                'translation' => 'Commentaar',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:11:24',
                'updated_at' => '2022-10-25 18:11:24',
            ),
            184 => 
            array (
                'id' => 185,
                'element_id' => 234,
                'language_id' => 1,
                'translation' => 'Faktuur',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:11:39',
                'updated_at' => '2022-10-25 18:11:39',
            ),
            185 => 
            array (
                'id' => 186,
                'element_id' => 235,
                'language_id' => 1,
                'translation' => 'Nee',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:11:47',
                'updated_at' => '2022-10-25 18:11:47',
            ),
            186 => 
            array (
                'id' => 187,
                'element_id' => 236,
                'language_id' => 1,
                'translation' => 'Onderhoud',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:12:19',
                'updated_at' => '2022-10-25 18:12:19',
            ),
            187 => 
            array (
                'id' => 188,
                'element_id' => 237,
                'language_id' => 1,
                'translation' => 'Prijs',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:12:33',
                'updated_at' => '2022-10-25 18:12:33',
            ),
            188 => 
            array (
                'id' => 189,
                'element_id' => 239,
                'language_id' => 1,
                'translation' => 'Geen informatie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:12:47',
                'updated_at' => '2022-10-25 18:12:47',
            ),
            189 => 
            array (
                'id' => 190,
                'element_id' => 240,
                'language_id' => 1,
                'translation' => 'Eindtotaal',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:13:24',
                'updated_at' => '2022-10-25 18:13:24',
            ),
            190 => 
            array (
                'id' => 191,
                'element_id' => 241,
                'language_id' => 1,
                'translation' => 'Opslaan en checkout',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:14:00',
                'updated_at' => '2022-10-25 18:14:00',
            ),
            191 => 
            array (
                'id' => 192,
                'element_id' => 241,
                'language_id' => 1,
                'translation' => 'Opslaan en check uit',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:14:07',
                'updated_at' => '2022-10-25 18:14:07',
            ),
            192 => 
            array (
                'id' => 193,
                'element_id' => 242,
                'language_id' => 1,
                'translation' => 'Gefactureerd',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:14:16',
                'updated_at' => '2022-10-25 18:14:16',
            ),
            193 => 
            array (
                'id' => 194,
                'element_id' => 243,
                'language_id' => 1,
                'translation' => 'Opslaan',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:14:25',
                'updated_at' => '2022-10-25 18:14:25',
            ),
            194 => 
            array (
                'id' => 195,
                'element_id' => 244,
                'language_id' => 1,
                'translation' => 'Onderzocht',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:14:50',
                'updated_at' => '2022-10-25 18:14:50',
            ),
            195 => 
            array (
                'id' => 196,
                'element_id' => 246,
                'language_id' => 1,
                'translation' => 'Prijzen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:14:59',
                'updated_at' => '2022-10-25 18:14:59',
            ),
            196 => 
            array (
                'id' => 197,
                'element_id' => 247,
                'language_id' => 1,
                'translation' => 'Betalings status',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:15:28',
                'updated_at' => '2022-10-25 18:15:28',
            ),
            197 => 
            array (
                'id' => 198,
                'element_id' => 248,
                'language_id' => 1,
                'translation' => 'Uitgevoerd door',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:15:38',
                'updated_at' => '2022-10-25 18:15:38',
            ),
            198 => 
            array (
                'id' => 199,
                'element_id' => 249,
                'language_id' => 1,
                'translation' => 'Gemaakt',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:16:08',
                'updated_at' => '2022-10-25 18:16:08',
            ),
            199 => 
            array (
                'id' => 200,
                'element_id' => 249,
                'language_id' => 1,
                'translation' => 'Gemaakt om',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:16:13',
                'updated_at' => '2022-10-25 18:16:13',
            ),
            200 => 
            array (
                'id' => 201,
                'element_id' => 250,
                'language_id' => 1,
                'translation' => 'Bijgewerkt',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:16:50',
                'updated_at' => '2022-10-25 18:16:50',
            ),
            201 => 
            array (
                'id' => 202,
                'element_id' => 252,
                'language_id' => 1,
                'translation' => 'Resultaten',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:17:05',
                'updated_at' => '2022-10-25 18:17:05',
            ),
            202 => 
            array (
                'id' => 203,
                'element_id' => 253,
                'language_id' => 1,
                'translation' => 'Bereik',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:17:48',
                'updated_at' => '2022-10-25 18:17:48',
            ),
            203 => 
            array (
                'id' => 204,
                'element_id' => 277,
                'language_id' => 1,
                'translation' => 'Configureer',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:18:04',
                'updated_at' => '2022-10-25 18:18:04',
            ),
            204 => 
            array (
                'id' => 205,
                'element_id' => 282,
                'language_id' => 1,
                'translation' => 'Opties',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:18:12',
                'updated_at' => '2022-10-25 18:18:12',
            ),
            205 => 
            array (
                'id' => 206,
                'element_id' => 290,
                'language_id' => 1,
                'translation' => 'Activeer notificaties',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:18:38',
                'updated_at' => '2022-10-25 18:18:38',
            ),
            206 => 
            array (
                'id' => 207,
                'element_id' => 291,
                'language_id' => 1,
                'translation' => 'Voeg configuratie toe',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:18:54',
                'updated_at' => '2022-10-25 18:18:54',
            ),
            207 => 
            array (
                'id' => 208,
                'element_id' => 292,
                'language_id' => 1,
                'translation' => 'Bekijk configuraties',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:19:06',
                'updated_at' => '2022-10-25 18:19:06',
            ),
            208 => 
            array (
                'id' => 209,
                'element_id' => 294,
                'language_id' => 1,
                'translation' => 'Regeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:19:35',
                'updated_at' => '2022-10-25 18:19:35',
            ),
            209 => 
            array (
                'id' => 210,
                'element_id' => 295,
                'language_id' => 1,
                'translation' => 'Bestelling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:19:55',
                'updated_at' => '2022-10-25 18:19:55',
            ),
            210 => 
            array (
                'id' => 211,
                'element_id' => 297,
                'language_id' => 1,
                'translation' => 'Bestellingen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:20:06',
                'updated_at' => '2022-10-25 18:20:06',
            ),
            211 => 
            array (
                'id' => 212,
                'element_id' => 300,
                'language_id' => 1,
                'translation' => 'Weet je het zeker?',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:20:22',
                'updated_at' => '2022-10-25 18:20:22',
            ),
            212 => 
            array (
                'id' => 213,
                'element_id' => 301,
                'language_id' => 1,
                'translation' => 'Je kunt deze aktie niet annuleren of terugdraaien',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:20:48',
                'updated_at' => '2022-10-25 18:20:48',
            ),
            213 => 
            array (
                'id' => 214,
                'element_id' => 302,
                'language_id' => 1,
                'translation' => 'Ja ga door',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:20:59',
                'updated_at' => '2022-10-25 18:20:59',
            ),
            214 => 
            array (
                'id' => 215,
                'element_id' => 303,
                'language_id' => 1,
                'translation' => 'Nee annuleer',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:21:28',
                'updated_at' => '2022-10-25 18:21:28',
            ),
            215 => 
            array (
                'id' => 216,
                'element_id' => 304,
                'language_id' => 1,
                'translation' => 'Waarschuwing',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:21:40',
                'updated_at' => '2022-10-25 18:21:40',
            ),
            216 => 
            array (
                'id' => 217,
                'element_id' => 305,
                'language_id' => 1,
                'translation' => 'Fout',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:21:47',
                'updated_at' => '2022-10-25 18:21:47',
            ),
            217 => 
            array (
                'id' => 218,
                'element_id' => 306,
                'language_id' => 1,
                'translation' => 'succes',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:22:01',
                'updated_at' => '2022-10-25 18:22:01',
            ),
            218 => 
            array (
                'id' => 219,
                'element_id' => 306,
                'language_id' => 1,
                'translation' => 'Succes',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:22:06',
                'updated_at' => '2022-10-25 18:22:06',
            ),
            219 => 
            array (
                'id' => 220,
                'element_id' => 307,
                'language_id' => 1,
                'translation' => 'Aktie met succes uitgevoerd',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:22:39',
                'updated_at' => '2022-10-25 18:22:39',
            ),
            220 => 
            array (
                'id' => 221,
                'element_id' => 308,
                'language_id' => 1,
                'translation' => 'Er ging iets mis neem kontakt op met ondersteuning',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:23:08',
                'updated_at' => '2022-10-25 18:23:08',
            ),
            221 => 
            array (
                'id' => 222,
                'element_id' => 309,
                'language_id' => 1,
                'translation' => 'Aktie geannuleerd',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:23:22',
                'updated_at' => '2022-10-25 18:23:22',
            ),
            222 => 
            array (
                'id' => 223,
                'element_id' => 311,
                'language_id' => 1,
                'translation' => 'Kategorie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:23:34',
                'updated_at' => '2022-10-25 18:23:34',
            ),
            223 => 
            array (
                'id' => 224,
                'element_id' => 312,
                'language_id' => 1,
                'translation' => 'Algemene kategorie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:23:46',
                'updated_at' => '2022-10-25 18:23:46',
            ),
            224 => 
            array (
                'id' => 225,
                'element_id' => 313,
                'language_id' => 1,
                'translation' => 'Tand element',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:23:55',
                'updated_at' => '2022-10-25 18:23:55',
            ),
            225 => 
            array (
                'id' => 226,
                'element_id' => 314,
                'language_id' => 1,
                'translation' => 'Actualisering',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:24:59',
                'updated_at' => '2022-10-25 18:24:59',
            ),
            226 => 
            array (
                'id' => 227,
                'element_id' => 315,
                'language_id' => 1,
                'translation' => 'Actualiseren',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:25:18',
                'updated_at' => '2022-10-25 18:25:18',
            ),
            227 => 
            array (
                'id' => 228,
                'element_id' => 316,
                'language_id' => 1,
                'translation' => 'Bedrag',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:25:27',
                'updated_at' => '2022-10-25 18:25:27',
            ),
            228 => 
            array (
                'id' => 229,
                'element_id' => 317,
                'language_id' => 1,
                'translation' => 'Status behandeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:25:40',
                'updated_at' => '2022-10-25 18:25:40',
            ),
            229 => 
            array (
                'id' => 230,
                'element_id' => 318,
                'language_id' => 1,
                'translation' => 'Voeg algeme opmerkingen toe',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:25:56',
                'updated_at' => '2022-10-25 18:25:56',
            ),
            230 => 
            array (
                'id' => 231,
                'element_id' => 319,
                'language_id' => 1,
                'translation' => 'Selecteer een kategorie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:26:07',
                'updated_at' => '2022-10-25 18:26:07',
            ),
            231 => 
            array (
                'id' => 232,
                'element_id' => 320,
                'language_id' => 1,
                'translation' => 'Selecteer een tand',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:26:16',
                'updated_at' => '2022-10-25 18:26:16',
            ),
            232 => 
            array (
                'id' => 233,
                'element_id' => 321,
                'language_id' => 1,
                'translation' => 'Algemene aantekeningen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:26:29',
                'updated_at' => '2022-10-25 18:26:29',
            ),
            233 => 
            array (
                'id' => 234,
                'element_id' => 322,
                'language_id' => 1,
                'translation' => 'Diagnose',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:26:41',
                'updated_at' => '2022-10-25 18:26:41',
            ),
            234 => 
            array (
                'id' => 235,
                'element_id' => 323,
                'language_id' => 1,
                'translation' => 'Andere',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:26:52',
                'updated_at' => '2022-10-25 18:26:52',
            ),
            235 => 
            array (
                'id' => 236,
                'element_id' => 324,
                'language_id' => 1,
                'translation' => 'Vul de algemene opmerking in aub',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:27:23',
                'updated_at' => '2022-10-25 18:27:23',
            ),
            236 => 
            array (
                'id' => 237,
                'element_id' => 327,
                'language_id' => 1,
                'translation' => 'Nieuw',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:27:34',
                'updated_at' => '2022-10-25 18:27:34',
            ),
            237 => 
            array (
                'id' => 238,
                'element_id' => 328,
                'language_id' => 1,
                'translation' => 'Beoordeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:27:47',
                'updated_at' => '2022-10-25 18:27:47',
            ),
            238 => 
            array (
                'id' => 239,
                'element_id' => 329,
                'language_id' => 1,
                'translation' => 'Opnieuw bekijken',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:28:17',
                'updated_at' => '2022-10-25 18:28:17',
            ),
            239 => 
            array (
                'id' => 240,
                'element_id' => 330,
                'language_id' => 1,
                'translation' => 'Risico beoordeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:28:27',
                'updated_at' => '2022-10-25 18:28:27',
            ),
            240 => 
            array (
                'id' => 241,
                'element_id' => 331,
                'language_id' => 1,
                'translation' => 'Aangeraden behandeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:28:46',
                'updated_at' => '2022-10-25 18:28:46',
            ),
            241 => 
            array (
                'id' => 242,
                'element_id' => 332,
                'language_id' => 1,
                'translation' => 'Rechts',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:28:55',
                'updated_at' => '2022-10-25 18:28:55',
            ),
            242 => 
            array (
                'id' => 243,
                'element_id' => 333,
                'language_id' => 1,
                'translation' => 'Links',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:29:03',
                'updated_at' => '2022-10-25 18:29:03',
            ),
            243 => 
            array (
                'id' => 244,
                'element_id' => 334,
                'language_id' => 1,
                'translation' => 'Vorige',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:29:14',
                'updated_at' => '2022-10-25 18:29:14',
            ),
            244 => 
            array (
                'id' => 245,
                'element_id' => 335,
                'language_id' => 1,
                'translation' => 'Volgende',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:29:29',
                'updated_at' => '2022-10-25 18:29:29',
            ),
            245 => 
            array (
                'id' => 246,
                'element_id' => 336,
                'language_id' => 1,
                'translation' => 'Waarde',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:29:37',
                'updated_at' => '2022-10-25 18:29:37',
            ),
            246 => 
            array (
                'id' => 247,
                'element_id' => 337,
                'language_id' => 1,
                'translation' => 'Lager',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:29:56',
                'updated_at' => '2022-10-25 18:29:56',
            ),
            247 => 
            array (
                'id' => 248,
                'element_id' => 338,
                'language_id' => 1,
                'translation' => 'Bovenste',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:30:12',
                'updated_at' => '2022-10-25 18:30:12',
            ),
            248 => 
            array (
                'id' => 249,
                'element_id' => 339,
                'language_id' => 1,
                'translation' => 'Aantekeningen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:30:23',
                'updated_at' => '2022-10-25 18:30:23',
            ),
            249 => 
            array (
                'id' => 250,
                'element_id' => 340,
                'language_id' => 1,
                'translation' => 'Geen PPS informatie gevonden per de laatste afspraak',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:30:49',
                'updated_at' => '2022-10-25 18:30:49',
            ),
            250 => 
            array (
                'id' => 251,
                'element_id' => 341,
                'language_id' => 1,
                'translation' => 'Aangeraden beoordeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:31:11',
                'updated_at' => '2022-10-25 18:31:11',
            ),
            251 => 
            array (
                'id' => 252,
                'element_id' => 342,
                'language_id' => 1,
                'translation' => 'Sluiten',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:31:20',
                'updated_at' => '2022-10-25 18:31:20',
            ),
            252 => 
            array (
                'id' => 253,
                'element_id' => 343,
                'language_id' => 1,
                'translation' => 'Xray details',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:31:38',
                'updated_at' => '2022-10-25 18:31:38',
            ),
            253 => 
            array (
                'id' => 254,
                'element_id' => 344,
                'language_id' => 1,
                'translation' => 'Afspraak datum',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:31:51',
                'updated_at' => '2022-10-25 18:31:51',
            ),
            254 => 
            array (
                'id' => 255,
                'element_id' => 345,
                'language_id' => 1,
                'translation' => 'Geen risico beoordeling historie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:32:12',
                'updated_at' => '2022-10-25 18:32:12',
            ),
            255 => 
            array (
                'id' => 256,
                'element_id' => 346,
                'language_id' => 1,
                'translation' => 'Ja',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:32:18',
                'updated_at' => '2022-10-25 18:32:18',
            ),
            256 => 
            array (
                'id' => 257,
                'element_id' => 347,
                'language_id' => 1,
                'translation' => 'Pathologie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:32:27',
                'updated_at' => '2022-10-25 18:32:27',
            ),
            257 => 
            array (
                'id' => 258,
                'element_id' => 348,
                'language_id' => 1,
                'translation' => 'Periodontie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:32:38',
                'updated_at' => '2022-10-25 18:32:38',
            ),
            258 => 
            array (
                'id' => 259,
                'element_id' => 348,
                'language_id' => 1,
                'translation' => 'Periodontie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:32:49',
                'updated_at' => '2022-10-25 18:32:49',
            ),
            259 => 
            array (
                'id' => 260,
                'element_id' => 349,
                'language_id' => 1,
                'translation' => 'Aanwezig',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:33:03',
                'updated_at' => '2022-10-25 18:33:03',
            ),
            260 => 
            array (
                'id' => 261,
                'element_id' => 350,
                'language_id' => 1,
                'translation' => 'Niet aanwezig',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:33:12',
                'updated_at' => '2022-10-25 18:33:12',
            ),
            261 => 
            array (
                'id' => 262,
                'element_id' => 351,
                'language_id' => 1,
                'translation' => 'Tand mist',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:33:24',
                'updated_at' => '2022-10-25 18:33:24',
            ),
            262 => 
            array (
                'id' => 263,
                'element_id' => 352,
                'language_id' => 1,
                'translation' => 'Informatie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:33:31',
                'updated_at' => '2022-10-25 18:33:31',
            ),
            263 => 
            array (
                'id' => 264,
                'element_id' => 353,
                'language_id' => 1,
                'translation' => 'Gegevens',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:33:43',
                'updated_at' => '2022-10-25 18:33:43',
            ),
            264 => 
            array (
                'id' => 265,
                'element_id' => 354,
                'language_id' => 1,
                'translation' => 'Factuur betaling grafiek',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:34:02',
                'updated_at' => '2022-10-25 18:34:02',
            ),
            265 => 
            array (
                'id' => 266,
                'element_id' => 355,
                'language_id' => 1,
                'translation' => 'Status',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:34:11',
                'updated_at' => '2022-10-25 18:34:11',
            ),
            266 => 
            array (
                'id' => 267,
                'element_id' => 356,
                'language_id' => 1,
                'translation' => 'Recente facturen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:34:22',
                'updated_at' => '2022-10-25 18:34:22',
            ),
            267 => 
            array (
                'id' => 268,
                'element_id' => 357,
                'language_id' => 1,
                'translation' => 'Zenden',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:34:31',
                'updated_at' => '2022-10-25 18:34:31',
            ),
            268 => 
            array (
                'id' => 269,
                'element_id' => 358,
                'language_id' => 1,
                'translation' => 'Diensten',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:35:23',
                'updated_at' => '2022-10-25 18:35:23',
            ),
            269 => 
            array (
                'id' => 270,
                'element_id' => 359,
                'language_id' => 1,
                'translation' => 'Alle facturen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:35:34',
                'updated_at' => '2022-10-25 18:35:34',
            ),
            270 => 
            array (
                'id' => 271,
                'element_id' => 360,
                'language_id' => 1,
                'translation' => 'Betaalde facturen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:35:44',
                'updated_at' => '2022-10-25 18:35:44',
            ),
            271 => 
            array (
                'id' => 272,
                'element_id' => 361,
                'language_id' => 1,
                'translation' => 'Openstaande facturen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:36:02',
                'updated_at' => '2022-10-25 18:36:02',
            ),
            272 => 
            array (
                'id' => 273,
                'element_id' => 362,
                'language_id' => 1,
                'translation' => 'Prive facturen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:36:12',
                'updated_at' => '2022-10-25 18:36:12',
            ),
            273 => 
            array (
                'id' => 274,
                'element_id' => 363,
                'language_id' => 1,
                'translation' => 'Verzekering facturen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:36:27',
                'updated_at' => '2022-10-25 18:36:27',
            ),
            274 => 
            array (
                'id' => 275,
                'element_id' => 364,
                'language_id' => 1,
                'translation' => 'Aankomende afspraken',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:36:45',
                'updated_at' => '2022-10-25 18:36:45',
            ),
            275 => 
            array (
                'id' => 276,
                'element_id' => 365,
                'language_id' => 1,
                'translation' => 'Afspraak verplaatsen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:36:58',
                'updated_at' => '2022-10-25 18:36:58',
            ),
            276 => 
            array (
                'id' => 277,
                'element_id' => 366,
                'language_id' => 1,
                'translation' => 'Open',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:37:06',
                'updated_at' => '2022-10-25 18:37:06',
            ),
            277 => 
            array (
                'id' => 278,
                'element_id' => 367,
                'language_id' => 1,
                'translation' => 'Taart grafiek',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:37:20',
                'updated_at' => '2022-10-25 18:37:20',
            ),
            278 => 
            array (
                'id' => 279,
                'element_id' => 368,
                'language_id' => 1,
                'translation' => 'Begin',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:37:28',
                'updated_at' => '2022-10-25 18:37:28',
            ),
            279 => 
            array (
                'id' => 280,
                'element_id' => 369,
                'language_id' => 1,
                'translation' => 'Einde',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:37:34',
                'updated_at' => '2022-10-25 18:37:34',
            ),
            280 => 
            array (
                'id' => 281,
                'element_id' => 370,
                'language_id' => 1,
                'translation' => 'Interval',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:37:42',
                'updated_at' => '2022-10-25 18:37:42',
            ),
            281 => 
            array (
                'id' => 282,
                'element_id' => 371,
                'language_id' => 1,
                'translation' => 'Volgende beschikbare datum',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:37:57',
                'updated_at' => '2022-10-25 18:37:57',
            ),
            282 => 
            array (
                'id' => 283,
                'element_id' => 372,
                'language_id' => 1,
                'translation' => 'Suggesties',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:38:09',
                'updated_at' => '2022-10-25 18:38:09',
            ),
            283 => 
            array (
                'id' => 284,
                'element_id' => 373,
                'language_id' => 1,
                'translation' => 'Laat suggesties zien',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:38:21',
                'updated_at' => '2022-10-25 18:38:21',
            ),
            284 => 
            array (
                'id' => 285,
                'element_id' => 374,
                'language_id' => 1,
                'translation' => 'Suggesties voor',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:38:31',
                'updated_at' => '2022-10-25 18:38:31',
            ),
            285 => 
            array (
                'id' => 286,
                'element_id' => 375,
                'language_id' => 1,
                'translation' => 'Periode',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:38:38',
                'updated_at' => '2022-10-25 18:38:38',
            ),
            286 => 
            array (
                'id' => 287,
                'element_id' => 376,
                'language_id' => 1,
                'translation' => 'Aktieve afspraken',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:38:53',
                'updated_at' => '2022-10-25 18:38:53',
            ),
            287 => 
            array (
                'id' => 288,
                'element_id' => 377,
                'language_id' => 1,
                'translation' => 'Bedienen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:39:04',
                'updated_at' => '2022-10-25 18:39:04',
            ),
            288 => 
            array (
                'id' => 289,
                'element_id' => 377,
                'language_id' => 1,
                'translation' => 'In behandeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:39:24',
                'updated_at' => '2022-10-25 18:39:24',
            ),
            289 => 
            array (
                'id' => 290,
                'element_id' => 378,
                'language_id' => 1,
                'translation' => 'Tijdslijn',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:39:40',
                'updated_at' => '2022-10-25 18:39:40',
            ),
            290 => 
            array (
                'id' => 291,
                'element_id' => 379,
                'language_id' => 1,
                'translation' => 'Ingecheckt',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:39:51',
                'updated_at' => '2022-10-25 18:39:51',
            ),
            291 => 
            array (
                'id' => 292,
                'element_id' => 380,
                'language_id' => 1,
                'translation' => 'Behandeld om',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:40:02',
                'updated_at' => '2022-10-25 18:40:02',
            ),
            292 => 
            array (
                'id' => 293,
                'element_id' => 381,
                'language_id' => 1,
                'translation' => 'Bron',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:40:09',
                'updated_at' => '2022-10-25 18:40:09',
            ),
            293 => 
            array (
                'id' => 294,
                'element_id' => 382,
                'language_id' => 1,
                'translation' => 'Rede',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:40:14',
                'updated_at' => '2022-10-25 18:40:14',
            ),
            294 => 
            array (
                'id' => 295,
                'element_id' => 383,
                'language_id' => 1,
                'translation' => 'Medewerkers',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:40:24',
                'updated_at' => '2022-10-25 18:40:24',
            ),
            295 => 
            array (
                'id' => 296,
                'element_id' => 384,
                'language_id' => 1,
                'translation' => 'Vakantie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:40:31',
                'updated_at' => '2022-10-25 18:40:31',
            ),
            296 => 
            array (
                'id' => 297,
                'element_id' => 385,
                'language_id' => 1,
                'translation' => 'Aanwezig',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:40:43',
                'updated_at' => '2022-10-25 18:40:43',
            ),
            297 => 
            array (
                'id' => 298,
                'element_id' => 386,
                'language_id' => 1,
                'translation' => 'Afdelingen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:40:54',
                'updated_at' => '2022-10-25 18:40:54',
            ),
            298 => 
            array (
                'id' => 299,
                'element_id' => 387,
                'language_id' => 1,
                'translation' => 'Leidinggevende',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:41:43',
                'updated_at' => '2022-10-25 18:41:43',
            ),
            299 => 
            array (
                'id' => 300,
                'element_id' => 388,
                'language_id' => 1,
                'translation' => 'Medewerker aanwezigheid',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:41:56',
                'updated_at' => '2022-10-25 18:41:56',
            ),
            300 => 
            array (
                'id' => 301,
                'element_id' => 389,
                'language_id' => 1,
                'translation' => 'Zie alle',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:42:03',
                'updated_at' => '2022-10-25 18:42:03',
            ),
            301 => 
            array (
                'id' => 302,
                'element_id' => 390,
                'language_id' => 1,
                'translation' => 'Medewerker',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:42:13',
                'updated_at' => '2022-10-25 18:42:13',
            ),
            302 => 
            array (
                'id' => 303,
                'element_id' => 391,
                'language_id' => 1,
                'translation' => 'Begin datum',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:42:25',
                'updated_at' => '2022-10-25 18:42:25',
            ),
            303 => 
            array (
                'id' => 304,
                'element_id' => 392,
                'language_id' => 1,
                'translation' => 'Eind datum',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:42:34',
                'updated_at' => '2022-10-25 18:42:34',
            ),
            304 => 
            array (
                'id' => 305,
                'element_id' => 393,
                'language_id' => 1,
                'translation' => 'Soort verlof',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:42:45',
                'updated_at' => '2022-10-25 18:42:45',
            ),
            305 => 
            array (
                'id' => 306,
                'element_id' => 394,
                'language_id' => 1,
                'translation' => 'Voeg de aanwezigheids tijden toe',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:43:02',
                'updated_at' => '2022-10-25 18:43:02',
            ),
            306 => 
            array (
                'id' => 307,
                'element_id' => 395,
                'language_id' => 1,
                'translation' => 'Aanwezigheid tijden',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:43:19',
                'updated_at' => '2022-10-25 18:43:19',
            ),
            307 => 
            array (
                'id' => 308,
                'element_id' => 395,
                'language_id' => 1,
                'translation' => 'Aanwezigheids tijden',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:43:28',
                'updated_at' => '2022-10-25 18:43:28',
            ),
            308 => 
            array (
                'id' => 309,
                'element_id' => 396,
                'language_id' => 1,
                'translation' => 'Aanwezige naam',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:43:49',
                'updated_at' => '2022-10-25 18:43:49',
            ),
            309 => 
            array (
                'id' => 310,
                'element_id' => 396,
                'language_id' => 1,
                'translation' => 'Aanwezige naam',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:44:03',
                'updated_at' => '2022-10-25 18:44:03',
            ),
            310 => 
            array (
                'id' => 311,
                'element_id' => 397,
                'language_id' => 1,
                'translation' => 'Begin tijd',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:44:14',
                'updated_at' => '2022-10-25 18:44:14',
            ),
            311 => 
            array (
                'id' => 312,
                'element_id' => 398,
                'language_id' => 1,
                'translation' => 'Eind tijd',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:44:22',
                'updated_at' => '2022-10-25 18:44:22',
            ),
            312 => 
            array (
                'id' => 313,
                'element_id' => 399,
                'language_id' => 1,
                'translation' => 'Volledige naam',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:44:33',
                'updated_at' => '2022-10-25 18:44:33',
            ),
            313 => 
            array (
                'id' => 314,
                'element_id' => 400,
                'language_id' => 1,
                'translation' => 'Onder afdeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:44:47',
                'updated_at' => '2022-10-25 18:44:47',
            ),
            314 => 
            array (
                'id' => 315,
                'element_id' => 401,
                'language_id' => 1,
                'translation' => 'Afdeling naam',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:44:58',
                'updated_at' => '2022-10-25 18:44:58',
            ),
            315 => 
            array (
                'id' => 316,
                'element_id' => 402,
                'language_id' => 1,
                'translation' => 'Voeg afdeling toe',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:45:12',
                'updated_at' => '2022-10-25 18:45:12',
            ),
            316 => 
            array (
                'id' => 317,
                'element_id' => 403,
                'language_id' => 1,
                'translation' => 'Bekijk afdeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:45:32',
                'updated_at' => '2022-10-25 18:45:32',
            ),
            317 => 
            array (
                'id' => 318,
                'element_id' => 404,
                'language_id' => 1,
                'translation' => 'Verander afdeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:46:06',
                'updated_at' => '2022-10-25 18:46:06',
            ),
            318 => 
            array (
                'id' => 319,
                'element_id' => 405,
                'language_id' => 1,
                'translation' => 'Bekijk afdelingen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:46:20',
                'updated_at' => '2022-10-25 18:46:20',
            ),
            319 => 
            array (
                'id' => 320,
                'element_id' => 406,
                'language_id' => 1,
                'translation' => 'Afdeling actualiseren',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:46:49',
                'updated_at' => '2022-10-25 18:46:49',
            ),
            320 => 
            array (
                'id' => 321,
                'element_id' => 407,
                'language_id' => 1,
                'translation' => 'Naam medewerker',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:47:02',
                'updated_at' => '2022-10-25 18:47:02',
            ),
            321 => 
            array (
                'id' => 322,
                'element_id' => 408,
                'language_id' => 1,
                'translation' => 'Voeg medewerker toe',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:47:16',
                'updated_at' => '2022-10-25 18:47:16',
            ),
            322 => 
            array (
                'id' => 323,
                'element_id' => 409,
                'language_id' => 1,
                'translation' => 'Bekijk medewerker',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:47:26',
                'updated_at' => '2022-10-25 18:47:26',
            ),
            323 => 
            array (
                'id' => 324,
                'element_id' => 410,
                'language_id' => 1,
                'translation' => 'Bewerk medewerker',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:47:42',
                'updated_at' => '2022-10-25 18:47:42',
            ),
            324 => 
            array (
                'id' => 325,
                'element_id' => 411,
                'language_id' => 1,
                'translation' => 'Bekijk medewerkers',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:47:55',
                'updated_at' => '2022-10-25 18:47:55',
            ),
            325 => 
            array (
                'id' => 326,
                'element_id' => 412,
                'language_id' => 1,
                'translation' => 'Medewerker actualiseren',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:48:35',
                'updated_at' => '2022-10-25 18:48:35',
            ),
            326 => 
            array (
                'id' => 327,
                'element_id' => 413,
                'language_id' => 1,
                'translation' => 'Roepnaam',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:48:49',
                'updated_at' => '2022-10-25 18:48:49',
            ),
            327 => 
            array (
                'id' => 328,
                'element_id' => 413,
                'language_id' => 1,
                'translation' => 'Voornaam',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:48:59',
                'updated_at' => '2022-10-25 18:48:59',
            ),
            328 => 
            array (
                'id' => 329,
                'element_id' => 414,
                'language_id' => 1,
                'translation' => 'Achternaam',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:49:08',
                'updated_at' => '2022-10-25 18:49:08',
            ),
            329 => 
            array (
                'id' => 330,
                'element_id' => 415,
                'language_id' => 1,
                'translation' => 'Middelste naam',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:49:20',
                'updated_at' => '2022-10-25 18:49:20',
            ),
            330 => 
            array (
                'id' => 331,
                'element_id' => 416,
                'language_id' => 1,
                'translation' => 'Email',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:49:32',
                'updated_at' => '2022-10-25 18:49:32',
            ),
            331 => 
            array (
                'id' => 332,
                'element_id' => 417,
                'language_id' => 1,
                'translation' => 'Telefoon nummer',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:49:43',
                'updated_at' => '2022-10-25 18:49:43',
            ),
            332 => 
            array (
                'id' => 333,
                'element_id' => 418,
                'language_id' => 1,
                'translation' => 'Mobiel nummer',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:49:52',
                'updated_at' => '2022-10-25 18:49:52',
            ),
            333 => 
            array (
                'id' => 334,
                'element_id' => 419,
                'language_id' => 1,
                'translation' => 'Familielid',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:50:05',
                'updated_at' => '2022-10-25 18:50:05',
            ),
            334 => 
            array (
                'id' => 335,
                'element_id' => 420,
                'language_id' => 1,
                'translation' => 'Telefoon nummer familielid',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:50:26',
                'updated_at' => '2022-10-25 18:50:26',
            ),
            335 => 
            array (
                'id' => 336,
                'element_id' => 421,
                'language_id' => 1,
                'translation' => 'Email familielid',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:50:36',
                'updated_at' => '2022-10-25 18:50:36',
            ),
            336 => 
            array (
                'id' => 337,
                'element_id' => 422,
                'language_id' => 1,
                'translation' => 'Optioneel',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:50:47',
                'updated_at' => '2022-10-25 18:50:47',
            ),
            337 => 
            array (
                'id' => 338,
                'element_id' => 423,
                'language_id' => 1,
                'translation' => 'Soort medewerker',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:51:00',
                'updated_at' => '2022-10-25 18:51:00',
            ),
            338 => 
            array (
                'id' => 339,
                'element_id' => 424,
                'language_id' => 1,
                'translation' => 'Toegangs code',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:51:17',
                'updated_at' => '2022-10-25 18:51:17',
            ),
            339 => 
            array (
                'id' => 340,
                'element_id' => 425,
                'language_id' => 1,
                'translation' => 'Soort medewerkers',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:51:34',
                'updated_at' => '2022-10-25 18:51:34',
            ),
            340 => 
            array (
                'id' => 341,
                'element_id' => 426,
                'language_id' => 1,
                'translation' => 'Beheer medewerkers',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:51:45',
                'updated_at' => '2022-10-25 18:51:45',
            ),
            341 => 
            array (
                'id' => 342,
                'element_id' => 427,
                'language_id' => 1,
                'translation' => 'Functies',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:51:54',
                'updated_at' => '2022-10-25 18:51:54',
            ),
            342 => 
            array (
                'id' => 343,
                'element_id' => 428,
                'language_id' => 1,
                'translation' => 'Selecteer afdeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:52:05',
                'updated_at' => '2022-10-25 18:52:05',
            ),
            343 => 
            array (
                'id' => 344,
                'element_id' => 429,
                'language_id' => 1,
                'translation' => 'Afdeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:52:14',
                'updated_at' => '2022-10-25 18:52:14',
            ),
            344 => 
            array (
                'id' => 345,
                'element_id' => 430,
                'language_id' => 1,
                'translation' => 'Voeg soort medewerker toe',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:52:32',
                'updated_at' => '2022-10-25 18:52:32',
            ),
            345 => 
            array (
                'id' => 346,
                'element_id' => 431,
                'language_id' => 1,
                'translation' => 'Bewerk soort medewerkers',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:53:09',
                'updated_at' => '2022-10-25 18:53:09',
            ),
            346 => 
            array (
                'id' => 347,
                'element_id' => 432,
                'language_id' => 1,
                'translation' => 'Bewerk type medewerkers',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:53:26',
                'updated_at' => '2022-10-25 18:53:26',
            ),
            347 => 
            array (
                'id' => 348,
                'element_id' => 433,
                'language_id' => 1,
                'translation' => 'Positie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:54:05',
                'updated_at' => '2022-10-25 18:54:05',
            ),
            348 => 
            array (
                'id' => 349,
                'element_id' => 434,
                'language_id' => 1,
                'translation' => 'Rol',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:54:15',
                'updated_at' => '2022-10-25 18:54:15',
            ),
            349 => 
            array (
                'id' => 350,
                'element_id' => 435,
                'language_id' => 1,
                'translation' => 'Verwijder medewerker',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:54:26',
                'updated_at' => '2022-10-25 18:54:26',
            ),
            350 => 
            array (
                'id' => 351,
                'element_id' => 436,
                'language_id' => 1,
                'translation' => 'Deze aktie kan niet worden teruggedraaid',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:54:46',
                'updated_at' => '2022-10-25 18:54:46',
            ),
            351 => 
            array (
                'id' => 352,
                'element_id' => 437,
                'language_id' => 1,
                'translation' => 'Bevestig',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:54:55',
                'updated_at' => '2022-10-25 18:54:55',
            ),
            352 => 
            array (
                'id' => 353,
                'element_id' => 438,
                'language_id' => 1,
                'translation' => 'Bewerk positie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:55:05',
                'updated_at' => '2022-10-25 18:55:05',
            ),
            353 => 
            array (
                'id' => 354,
                'element_id' => 439,
                'language_id' => 1,
                'translation' => 'Voeg positie toe',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:55:15',
                'updated_at' => '2022-10-25 18:55:15',
            ),
            354 => 
            array (
                'id' => 355,
                'element_id' => 440,
                'language_id' => 1,
                'translation' => 'Bekijk positie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:55:24',
                'updated_at' => '2022-10-25 18:55:24',
            ),
            355 => 
            array (
                'id' => 356,
                'element_id' => 441,
                'language_id' => 1,
                'translation' => 'Bekijk posities',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:55:38',
                'updated_at' => '2022-10-25 18:55:38',
            ),
            356 => 
            array (
                'id' => 357,
                'element_id' => 442,
                'language_id' => 1,
                'translation' => 'Bewerk positie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:55:50',
                'updated_at' => '2022-10-25 18:55:50',
            ),
            357 => 
            array (
                'id' => 358,
                'element_id' => 443,
                'language_id' => 1,
                'translation' => 'Naam onderafdeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:56:01',
                'updated_at' => '2022-10-25 18:56:01',
            ),
            358 => 
            array (
                'id' => 359,
                'element_id' => 444,
                'language_id' => 1,
                'translation' => 'Voeg onderafdeling toe',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:56:16',
                'updated_at' => '2022-10-25 18:56:16',
            ),
            359 => 
            array (
                'id' => 360,
                'element_id' => 445,
                'language_id' => 1,
                'translation' => 'Bekijk onderafdeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:56:32',
                'updated_at' => '2022-10-25 18:56:32',
            ),
            360 => 
            array (
                'id' => 361,
                'element_id' => 446,
                'language_id' => 1,
                'translation' => 'Bewerk onderafdeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:56:46',
                'updated_at' => '2022-10-25 18:56:46',
            ),
            361 => 
            array (
                'id' => 362,
                'element_id' => 447,
                'language_id' => 1,
                'translation' => 'Bekijk onder afdelingen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:56:59',
                'updated_at' => '2022-10-25 18:56:59',
            ),
            362 => 
            array (
                'id' => 363,
                'element_id' => 448,
                'language_id' => 1,
                'translation' => 'Bewerk onder afdeling',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:57:11',
                'updated_at' => '2022-10-25 18:57:11',
            ),
            363 => 
            array (
                'id' => 364,
                'element_id' => 449,
                'language_id' => 1,
                'translation' => 'Bewerk profiel foto',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:57:32',
                'updated_at' => '2022-10-25 18:57:32',
            ),
            364 => 
            array (
                'id' => 365,
                'element_id' => 449,
                'language_id' => 1,
                'translation' => 'Vervang profiel foto',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:57:41',
                'updated_at' => '2022-10-25 18:57:41',
            ),
            365 => 
            array (
                'id' => 366,
                'element_id' => 450,
                'language_id' => 1,
                'translation' => 'Opladen',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:57:47',
                'updated_at' => '2022-10-25 18:57:47',
            ),
            366 => 
            array (
                'id' => 367,
                'element_id' => 451,
                'language_id' => 1,
                'translation' => 'Bewerk basis informatie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:58:03',
                'updated_at' => '2022-10-25 18:58:03',
            ),
            367 => 
            array (
                'id' => 368,
                'element_id' => 452,
                'language_id' => 1,
                'translation' => 'Selecteer soort medewerker',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:58:24',
                'updated_at' => '2022-10-25 18:58:24',
            ),
            368 => 
            array (
                'id' => 369,
                'element_id' => 453,
                'language_id' => 1,
                'translation' => 'Alternatief nummer',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:58:36',
                'updated_at' => '2022-10-25 18:58:36',
            ),
            369 => 
            array (
                'id' => 370,
                'element_id' => 454,
                'language_id' => 1,
                'translation' => 'Land',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:58:45',
                'updated_at' => '2022-10-25 18:58:45',
            ),
            370 => 
            array (
                'id' => 371,
                'element_id' => 455,
                'language_id' => 1,
                'translation' => 'Selecteer land',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:58:53',
                'updated_at' => '2022-10-25 18:58:53',
            ),
            371 => 
            array (
                'id' => 372,
                'element_id' => 456,
                'language_id' => 1,
                'translation' => 'Stad',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:59:00',
                'updated_at' => '2022-10-25 18:59:00',
            ),
            372 => 
            array (
                'id' => 373,
                'element_id' => 457,
                'language_id' => 1,
                'translation' => 'Selecteer stad',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:59:08',
                'updated_at' => '2022-10-25 18:59:08',
            ),
            373 => 
            array (
                'id' => 374,
                'element_id' => 458,
                'language_id' => 1,
                'translation' => 'Post code',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:59:22',
                'updated_at' => '2022-10-25 18:59:22',
            ),
            374 => 
            array (
                'id' => 375,
                'element_id' => 459,
                'language_id' => 1,
                'translation' => 'Selecteer de aanwezigheid tijden',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:59:38',
                'updated_at' => '2022-10-25 18:59:38',
            ),
            375 => 
            array (
                'id' => 376,
                'element_id' => 460,
                'language_id' => 1,
                'translation' => 'Bewerk de basis informatie',
                'created_by' => 1,
                'created_at' => '2022-10-25 18:59:52',
                'updated_at' => '2022-10-25 18:59:52',
            ),
            376 => 
            array (
                'id' => 377,
                'element_id' => 461,
                'language_id' => 1,
                'translation' => 'Aanwezigheids tijd',
                'created_by' => 1,
                'created_at' => '2022-10-25 19:00:03',
                'updated_at' => '2022-10-25 19:00:03',
            ),
            377 => 
            array (
                'id' => 378,
                'element_id' => 462,
                'language_id' => 1,
                'translation' => 'Selecteer aanwezigheids tijd',
                'created_by' => 1,
                'created_at' => '2022-10-25 19:00:16',
                'updated_at' => '2022-10-25 19:00:16',
            ),
            378 => 
            array (
                'id' => 379,
                'element_id' => 463,
                'language_id' => 1,
                'translation' => 'Bewerk de biografie',
                'created_by' => 1,
                'created_at' => '2022-10-25 19:00:32',
                'updated_at' => '2022-10-25 19:00:32',
            ),
            379 => 
            array (
                'id' => 380,
                'element_id' => 93,
                'language_id' => 1,
                'translation' => 'Mijn Dashboard',
                'created_by' => 1,
                'created_at' => '2022-10-26 09:26:23',
                'updated_at' => '2022-10-26 09:26:23',
            ),
        ));
        
        
    }
}