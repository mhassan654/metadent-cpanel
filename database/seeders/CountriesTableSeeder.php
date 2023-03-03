<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('countries')->delete();

        \DB::table('countries')->insert(array (
            0 =>
            array (
                'id' => 1,
                'country' => 'Afghanistan',
                'code' => 'AFG',
                'emoji' => '🇦🇫',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            1 =>
            array (
                'id' => 2,
                'country' => 'Aland Islands',
                'code' => 'ALA',
                'emoji' => '🇦🇽',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            2 =>
            array (
                'id' => 3,
                'country' => 'Albania',
                'code' => 'ALB',
                'emoji' => '🇦🇱',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            3 =>
            array (
                'id' => 4,
                'country' => 'Algeria',
                'code' => 'DZA',
                'emoji' => '🇩🇿',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            4 =>
            array (
                'id' => 5,
                'country' => 'American Samoa',
                'code' => 'ASM',
                'emoji' => '🇦🇸',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            5 =>
            array (
                'id' => 6,
                'country' => 'Andorra',
                'code' => 'AND',
                'emoji' => '🇦🇩',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            6 =>
            array (
                'id' => 7,
                'country' => 'Angola',
                'code' => 'AGO',
                'emoji' => '🇦🇴',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            7 =>
            array (
                'id' => 8,
                'country' => 'Anguilla',
                'code' => 'AIA',
                'emoji' => '🇦🇮',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            8 =>
            array (
                'id' => 9,
                'country' => 'Antarctica',
                'code' => 'ATA',
                'emoji' => '🇦🇶',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            9 =>
            array (
                'id' => 10,
                'country' => 'Antigua And Barbuda',
                'code' => 'ATG',
                'emoji' => '🇦🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            10 =>
            array (
                'id' => 11,
                'country' => 'Argentina',
                'code' => 'ARG',
                'emoji' => '🇦🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            11 =>
            array (
                'id' => 12,
                'country' => 'Armenia',
                'code' => 'ARM',
                'emoji' => '🇦🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            12 =>
            array (
                'id' => 13,
                'country' => 'Aruba',
                'code' => 'ABW',
                'emoji' => '🇦🇼',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            13 =>
            array (
                'id' => 14,
                'country' => 'Australia',
                'code' => 'AUS',
                'emoji' => '🇦🇺',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            14 =>
            array (
                'id' => 15,
                'country' => 'Austria',
                'code' => 'AUT',
                'emoji' => '🇦🇹',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            15 =>
            array (
                'id' => 16,
                'country' => 'Azerbaijan',
                'code' => 'AZE',
                'emoji' => '🇦🇿',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            16 =>
            array (
                'id' => 17,
                'country' => 'The Bahamas',
                'code' => 'BHS',
                'emoji' => '🇧🇸',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:06:00',
            ),
            17 =>
            array (
                'id' => 18,
                'country' => 'Bahrain',
                'code' => 'BHR',
                'emoji' => '🇧🇭',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            18 =>
            array (
                'id' => 19,
                'country' => 'Bangladesh',
                'code' => 'BGD',
                'emoji' => '🇧🇩',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            19 =>
            array (
                'id' => 20,
                'country' => 'Barbados',
                'code' => 'BRB',
                'emoji' => '🇧🇧',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            20 =>
            array (
                'id' => 21,
                'country' => 'Belarus',
                'code' => 'BLR',
                'emoji' => '🇧🇾',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            21 =>
            array (
                'id' => 22,
                'country' => 'Belgium',
                'code' => 'BEL',
                'emoji' => '🇧🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            22 =>
            array (
                'id' => 23,
                'country' => 'Belize',
                'code' => 'BLZ',
                'emoji' => '🇧🇿',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            23 =>
            array (
                'id' => 24,
                'country' => 'Benin',
                'code' => 'BEN',
                'emoji' => '🇧🇯',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            24 =>
            array (
                'id' => 25,
                'country' => 'Bermuda',
                'code' => 'BMU',
                'emoji' => '🇧🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            25 =>
            array (
                'id' => 26,
                'country' => 'Bhutan',
                'code' => 'BTN',
                'emoji' => '🇧🇹',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            26 =>
            array (
                'id' => 27,
                'country' => 'Bolivia',
                'code' => 'BOL',
                'emoji' => '🇧🇴',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            27 =>
            array (
                'id' => 28,
                'country' => 'Bosnia and Herzegovina',
                'code' => 'BIH',
                'emoji' => '🇧🇦',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            28 =>
            array (
                'id' => 29,
                'country' => 'Botswana',
                'code' => 'BWA',
                'emoji' => '🇧🇼',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            29 =>
            array (
                'id' => 30,
                'country' => 'Bouvet Island',
                'code' => 'BVT',
                'emoji' => '🇧🇻',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            30 =>
            array (
                'id' => 31,
                'country' => 'Brazil',
                'code' => 'BRA',
                'emoji' => '🇧🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            31 =>
            array (
                'id' => 32,
                'country' => 'British Indian Ocean Territory',
                'code' => 'IOT',
                'emoji' => '🇮🇴',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            32 =>
            array (
                'id' => 33,
                'country' => 'Brunei',
                'code' => 'BRN',
                'emoji' => '🇧🇳',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            33 =>
            array (
                'id' => 34,
                'country' => 'Bulgaria',
                'code' => 'BGR',
                'emoji' => '🇧🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            34 =>
            array (
                'id' => 35,
                'country' => 'Burkina Faso',
                'code' => 'BFA',
                'emoji' => '🇧🇫',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            35 =>
            array (
                'id' => 36,
                'country' => 'Burundi',
                'code' => 'BDI',
                'emoji' => '🇧🇮',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            36 =>
            array (
                'id' => 37,
                'country' => 'Cambodia',
                'code' => 'KHM',
                'emoji' => '🇰🇭',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            37 =>
            array (
                'id' => 38,
                'country' => 'Cameroon',
                'code' => 'CMR',
                'emoji' => '🇨🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            38 =>
            array (
                'id' => 39,
                'country' => 'Canada',
                'code' => 'CAN',
                'emoji' => '🇨🇦',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            39 =>
            array (
                'id' => 40,
                'country' => 'Cape Verde',
                'code' => 'CPV',
                'emoji' => '🇨🇻',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            40 =>
            array (
                'id' => 41,
                'country' => 'Cayman Islands',
                'code' => 'CYM',
                'emoji' => '🇰🇾',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            41 =>
            array (
                'id' => 42,
                'country' => 'Central African Republic',
                'code' => 'CAF',
                'emoji' => '🇨🇫',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            42 =>
            array (
                'id' => 43,
                'country' => 'Chad',
                'code' => 'TCD',
                'emoji' => '🇹🇩',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            43 =>
            array (
                'id' => 44,
                'country' => 'Chile',
                'code' => 'CHL',
                'emoji' => '🇨🇱',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            44 =>
            array (
                'id' => 45,
                'country' => 'China',
                'code' => 'CHN',
                'emoji' => '🇨🇳',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            45 =>
            array (
                'id' => 46,
                'country' => 'Christmas Island',
                'code' => 'CXR',
                'emoji' => '🇨🇽',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            46 =>
            array (
                'id' => 47,
            'country' => 'Cocos (Keeling) Islands',
                'code' => 'CCK',
                'emoji' => '🇨🇨',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            47 =>
            array (
                'id' => 48,
                'country' => 'Colombia',
                'code' => 'COL',
                'emoji' => '🇨🇴',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            48 =>
            array (
                'id' => 49,
                'country' => 'Comoros',
                'code' => 'COM',
                'emoji' => '🇰🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            49 =>
            array (
                'id' => 50,
                'country' => 'Congo',
                'code' => 'COG',
                'emoji' => '🇨🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:11:20',
            ),
            50 =>
            array (
                'id' => 51,
                'country' => 'Democratic Republic of the Congo',
                'code' => 'COD',
                'emoji' => '🇨🇩',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:13:35',
            ),
            51 =>
            array (
                'id' => 52,
                'country' => 'Cook Islands',
                'code' => 'COK',
                'emoji' => '🇨🇰',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:13:35',
            ),
            52 =>
            array (
                'id' => 53,
                'country' => 'Costa Rica',
                'code' => 'CRI',
                'emoji' => '🇨🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:13:35',
            ),
            53 =>
            array (
                'id' => 54,
            'country' => 'Cote D\'Ivoire (Ivory Coast)',
                'code' => 'CIV',
                'emoji' => '🇨🇮',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:13:35',
            ),
            54 =>
            array (
                'id' => 55,
                'country' => 'Croatia',
                'code' => 'HRV',
                'emoji' => '🇭🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:13:35',
            ),
            55 =>
            array (
                'id' => 56,
                'country' => 'Cuba',
                'code' => 'CUB',
                'emoji' => '🇨🇺',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:13:35',
            ),
            56 =>
            array (
                'id' => 57,
                'country' => 'Cyprus',
                'code' => 'CYP',
                'emoji' => '🇨🇾',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:13:35',
            ),
            57 =>
            array (
                'id' => 58,
                'country' => 'Czech Republic',
                'code' => 'CZE',
                'emoji' => '🇨🇿',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:13:35',
            ),
            58 =>
            array (
                'id' => 59,
                'country' => 'Denmark',
                'code' => 'DNK',
                'emoji' => '🇩🇰',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:13:35',
            ),
            59 =>
            array (
                'id' => 60,
                'country' => 'Djibouti',
                'code' => 'DJI',
                'emoji' => '🇩🇯',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:17:53',
            ),
            60 =>
            array (
                'id' => 61,
                'country' => 'Dominica',
                'code' => 'DMA',
                'emoji' => '🇩🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:17:53',
            ),
            61 =>
            array (
                'id' => 62,
                'country' => 'Dominican Republic',
                'code' => 'DOM',
                'emoji' => '🇩🇴',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:17:53',
            ),
            62 =>
            array (
                'id' => 63,
                'country' => 'East Timor',
                'code' => 'TLS',
                'emoji' => '🇹🇱',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:17:53',
            ),
            63 =>
            array (
                'id' => 64,
                'country' => 'Ecuador',
                'code' => 'ECU',
                'emoji' => '🇪🇨',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:17:53',
            ),
            64 =>
            array (
                'id' => 65,
                'country' => 'Egypt',
                'code' => 'EGY',
                'emoji' => '🇪🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:17:53',
            ),
            65 =>
            array (
                'id' => 66,
                'country' => 'El Salvador',
                'code' => 'SLV',
                'emoji' => '🇸🇻',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:17:53',
            ),
            66 =>
            array (
                'id' => 67,
                'country' => 'Equatorial Guinea',
                'code' => 'GNQ',
                'emoji' => '🇬🇶',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:17:53',
            ),
            67 =>
            array (
                'id' => 68,
                'country' => 'Eritrea',
                'code' => 'ERI',
                'emoji' => '🇪🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:17:53',
            ),
            68 =>
            array (
                'id' => 69,
                'country' => 'Estonia',
                'code' => 'EST',
                'emoji' => '🇪🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:17:53',
            ),
            69 =>
            array (
                'id' => 70,
                'country' => 'Ethiopia',
                'code' => 'ETH',
                'emoji' => '🇪🇹',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            70 =>
            array (
                'id' => 71,
                'country' => 'Falkland Islands',
                'code' => 'FLK',
                'emoji' => '🇫🇰',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            71 =>
            array (
                'id' => 72,
                'country' => 'Faroe Islands',
                'code' => 'FRO',
                'emoji' => '🇫🇴',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            72 =>
            array (
                'id' => 73,
                'country' => 'Fiji Islands',
                'code' => 'FJI',
                'emoji' => '🇫🇯',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            73 =>
            array (
                'id' => 74,
                'country' => 'Finland',
                'code' => 'FIN',
                'emoji' => '🇫🇮',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            74 =>
            array (
                'id' => 75,
                'country' => 'France',
                'code' => 'FRA',
                'emoji' => '🇫🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            75 =>
            array (
                'id' => 76,
                'country' => 'French Guiana',
                'code' => 'GUF',
                'emoji' => '🇬🇫',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            76 =>
            array (
                'id' => 77,
                'country' => 'French Polynesia',
                'code' => 'PYF',
                'emoji' => '🇵🇫',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            77 =>
            array (
                'id' => 78,
                'country' => 'French Southern Territories',
                'code' => 'ATF',
                'emoji' => '🇹🇫',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            78 =>
            array (
                'id' => 79,
                'country' => 'Gabon',
                'code' => 'GAB',
                'emoji' => '🇬🇦',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            79 =>
            array (
                'id' => 80,
                'country' => 'Gambia The',
                'code' => 'GMB',
                'emoji' => '🇬🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            80 =>
            array (
                'id' => 81,
                'country' => 'Georgia',
                'code' => 'GEO',
                'emoji' => '🇬🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            81 =>
            array (
                'id' => 82,
                'country' => 'Germany',
                'code' => 'DEU',
                'emoji' => '🇩🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            82 =>
            array (
                'id' => 83,
                'country' => 'Ghana',
                'code' => 'GHA',
                'emoji' => '🇬🇭',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            83 =>
            array (
                'id' => 84,
                'country' => 'Gibraltar',
                'code' => 'GIB',
                'emoji' => '🇬🇮',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            84 =>
            array (
                'id' => 85,
                'country' => 'Greece',
                'code' => 'GRC',
                'emoji' => '🇬🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            85 =>
            array (
                'id' => 86,
                'country' => 'Greenland',
                'code' => 'GRL',
                'emoji' => '🇬🇱',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            86 =>
            array (
                'id' => 87,
                'country' => 'Grenada',
                'code' => 'GRD',
                'emoji' => '🇬🇩',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            87 =>
            array (
                'id' => 88,
                'country' => 'Guadeloupe',
                'code' => 'GLP',
                'emoji' => '🇬🇵',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            88 =>
            array (
                'id' => 89,
                'country' => 'Guam',
                'code' => 'GUM',
                'emoji' => '🇬🇺',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            89 =>
            array (
                'id' => 90,
                'country' => 'Guatemala',
                'code' => 'GTM',
                'emoji' => '🇬🇹',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:20:25',
            ),
            90 =>
            array (
                'id' => 91,
                'country' => 'Guernsey and Alderney',
                'code' => 'GGY',
                'emoji' => '🇬🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            91 =>
            array (
                'id' => 92,
                'country' => 'Guinea',
                'code' => 'GIN',
                'emoji' => '🇬🇳',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            92 =>
            array (
                'id' => 93,
                'country' => 'Guinea-Bissau',
                'code' => 'GNB',
                'emoji' => '🇬🇼',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            93 =>
            array (
                'id' => 94,
                'country' => 'Guyana',
                'code' => 'GUY',
                'emoji' => '🇬🇾',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            94 =>
            array (
                'id' => 95,
                'country' => 'Haiti',
                'code' => 'HTI',
                'emoji' => '🇭🇹',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            95 =>
            array (
                'id' => 96,
                'country' => 'Heard Island and McDonald Islands',
                'code' => 'HMD',
                'emoji' => '🇭🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            96 =>
            array (
                'id' => 97,
                'country' => 'Honduras',
                'code' => 'HND',
                'emoji' => '🇭🇳',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            97 =>
            array (
                'id' => 98,
                'country' => 'Hong Kong S.A.R.',
                'code' => 'HKG',
                'emoji' => '🇭🇰',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            98 =>
            array (
                'id' => 99,
                'country' => 'Hungary',
                'code' => 'HUN',
                'emoji' => '🇭🇺',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            99 =>
            array (
                'id' => 100,
                'country' => 'Iceland',
                'code' => 'ISL',
                'emoji' => '🇮🇸',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            100 =>
            array (
                'id' => 101,
                'country' => 'India',
                'code' => 'IND',
                'emoji' => '🇮🇳',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            101 =>
            array (
                'id' => 102,
                'country' => 'Indonesia',
                'code' => 'IDN',
                'emoji' => '🇮🇩',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            102 =>
            array (
                'id' => 103,
                'country' => 'Iran',
                'code' => 'IRN',
                'emoji' => '🇮🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            103 =>
            array (
                'id' => 104,
                'country' => 'Iraq',
                'code' => 'IRQ',
                'emoji' => '🇮🇶',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            104 =>
            array (
                'id' => 105,
                'country' => 'Ireland',
                'code' => 'IRL',
                'emoji' => '🇮🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            105 =>
            array (
                'id' => 106,
                'country' => 'Israel',
                'code' => 'ISR',
                'emoji' => '🇮🇱',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            106 =>
            array (
                'id' => 107,
                'country' => 'Italy',
                'code' => 'ITA',
                'emoji' => '🇮🇹',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            107 =>
            array (
                'id' => 108,
                'country' => 'Jamaica',
                'code' => 'JAM',
                'emoji' => '🇯🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            108 =>
            array (
                'id' => 109,
                'country' => 'Japan',
                'code' => 'JPN',
                'emoji' => '🇯🇵',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            109 =>
            array (
                'id' => 110,
                'country' => 'Jersey',
                'code' => 'JEY',
                'emoji' => '🇯🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            110 =>
            array (
                'id' => 111,
                'country' => 'Jordan',
                'code' => 'JOR',
                'emoji' => '🇯🇴',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            111 =>
            array (
                'id' => 112,
                'country' => 'Kazakhstan',
                'code' => 'KAZ',
                'emoji' => '🇰🇿',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            112 =>
            array (
                'id' => 113,
                'country' => 'Kenya',
                'code' => 'KEN',
                'emoji' => '🇰🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            113 =>
            array (
                'id' => 114,
                'country' => 'Kiribati',
                'code' => 'KIR',
                'emoji' => '🇰🇮',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            114 =>
            array (
                'id' => 115,
                'country' => 'North Korea',
                'code' => 'PRK',
                'emoji' => '🇰🇵',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            115 =>
            array (
                'id' => 116,
                'country' => 'South Korea',
                'code' => 'KOR',
                'emoji' => '🇰🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            116 =>
            array (
                'id' => 117,
                'country' => 'Kuwait',
                'code' => 'KWT',
                'emoji' => '🇰🇼',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            117 =>
            array (
                'id' => 118,
                'country' => 'Kyrgyzstan',
                'code' => 'KGZ',
                'emoji' => '🇰🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            118 =>
            array (
                'id' => 119,
                'country' => 'Laos',
                'code' => 'LAO',
                'emoji' => '🇱🇦',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            119 =>
            array (
                'id' => 120,
                'country' => 'Latvia',
                'code' => 'LVA',
                'emoji' => '🇱🇻',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            120 =>
            array (
                'id' => 121,
                'country' => 'Lebanon',
                'code' => 'LBN',
                'emoji' => '🇱🇧',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            121 =>
            array (
                'id' => 122,
                'country' => 'Lesotho',
                'code' => 'LSO',
                'emoji' => '🇱🇸',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            122 =>
            array (
                'id' => 123,
                'country' => 'Liberia',
                'code' => 'LBR',
                'emoji' => '🇱🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            123 =>
            array (
                'id' => 124,
                'country' => 'Libya',
                'code' => 'LBY',
                'emoji' => '🇱🇾',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            124 =>
            array (
                'id' => 125,
                'country' => 'Liechtenstein',
                'code' => 'LIE',
                'emoji' => '🇱🇮',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            125 =>
            array (
                'id' => 126,
                'country' => 'Lithuania',
                'code' => 'LTU',
                'emoji' => '🇱🇹',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            126 =>
            array (
                'id' => 127,
                'country' => 'Luxembourg',
                'code' => 'LUX',
                'emoji' => '🇱🇺',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            127 =>
            array (
                'id' => 128,
                'country' => 'Macau S.A.R.',
                'code' => 'MAC',
                'emoji' => '🇲🇴',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            128 =>
            array (
                'id' => 129,
                'country' => 'Macedonia',
                'code' => 'MKD',
                'emoji' => '🇲🇰',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            129 =>
            array (
                'id' => 130,
                'country' => 'Madagascar',
                'code' => 'MDG',
                'emoji' => '🇲🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            130 =>
            array (
                'id' => 131,
                'country' => 'Malawi',
                'code' => 'MWI',
                'emoji' => '🇲🇼',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            131 =>
            array (
                'id' => 132,
                'country' => 'Malaysia',
                'code' => 'MYS',
                'emoji' => '🇲🇾',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            132 =>
            array (
                'id' => 133,
                'country' => 'Maldives',
                'code' => 'MDV',
                'emoji' => '🇲🇻',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            133 =>
            array (
                'id' => 134,
                'country' => 'Mali',
                'code' => 'MLI',
                'emoji' => '🇲🇱',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            134 =>
            array (
                'id' => 135,
                'country' => 'Malta',
                'code' => 'MLT',
                'emoji' => '🇲🇹',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            135 =>
            array (
                'id' => 136,
            'country' => 'Man (Isle of)',
                'code' => 'IMN',
                'emoji' => '🇮🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            136 =>
            array (
                'id' => 137,
                'country' => 'Marshall Islands',
                'code' => 'MHL',
                'emoji' => '🇲🇭',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            137 =>
            array (
                'id' => 138,
                'country' => 'Martinique',
                'code' => 'MTQ',
                'emoji' => '🇲🇶',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            138 =>
            array (
                'id' => 139,
                'country' => 'Mauritania',
                'code' => 'MRT',
                'emoji' => '🇲🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            139 =>
            array (
                'id' => 140,
                'country' => 'Mauritius',
                'code' => 'MUS',
                'emoji' => '🇲🇺',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            140 =>
            array (
                'id' => 141,
                'country' => 'Mayotte',
                'code' => 'MYT',
                'emoji' => '🇾🇹',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            141 =>
            array (
                'id' => 142,
                'country' => 'Mexico',
                'code' => 'MEX',
                'emoji' => '🇲🇽',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            142 =>
            array (
                'id' => 143,
                'country' => 'Micronesia',
                'code' => 'FSM',
                'emoji' => '🇫🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            143 =>
            array (
                'id' => 144,
                'country' => 'Moldova',
                'code' => 'MDA',
                'emoji' => '🇲🇩',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            144 =>
            array (
                'id' => 145,
                'country' => 'Monaco',
                'code' => 'MCO',
                'emoji' => '🇲🇨',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            145 =>
            array (
                'id' => 146,
                'country' => 'Mongolia',
                'code' => 'MNG',
                'emoji' => '🇲🇳',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            146 =>
            array (
                'id' => 147,
                'country' => 'Montenegro',
                'code' => 'MNE',
                'emoji' => '🇲🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            147 =>
            array (
                'id' => 148,
                'country' => 'Montserrat',
                'code' => 'MSR',
                'emoji' => '🇲🇸',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            148 =>
            array (
                'id' => 149,
                'country' => 'Morocco',
                'code' => 'MAR',
                'emoji' => '🇲🇦',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            149 =>
            array (
                'id' => 150,
                'country' => 'Mozambique',
                'code' => 'MOZ',
                'emoji' => '🇲🇿',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            150 =>
            array (
                'id' => 151,
                'country' => 'Myanmar',
                'code' => 'MMR',
                'emoji' => '🇲🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            151 =>
            array (
                'id' => 152,
                'country' => 'Namibia',
                'code' => 'NAM',
                'emoji' => '🇳🇦',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            152 =>
            array (
                'id' => 153,
                'country' => 'Nauru',
                'code' => 'NRU',
                'emoji' => '🇳🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            153 =>
            array (
                'id' => 154,
                'country' => 'Nepal',
                'code' => 'NPL',
                'emoji' => '🇳🇵',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            154 =>
            array (
                'id' => 155,
                'country' => 'Bonaire, Sint Eustatius and Saba',
                'code' => 'BES',
                'emoji' => '🇧🇶',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            155 =>
            array (
                'id' => 156,
                'country' => 'Netherlands',
                'code' => 'NLD',
                'emoji' => '🇳🇱',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            156 =>
            array (
                'id' => 157,
                'country' => 'New Caledonia',
                'code' => 'NCL',
                'emoji' => '🇳🇨',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            157 =>
            array (
                'id' => 158,
                'country' => 'New Zealand',
                'code' => 'NZL',
                'emoji' => '🇳🇿',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            158 =>
            array (
                'id' => 159,
                'country' => 'Nicaragua',
                'code' => 'NIC',
                'emoji' => '🇳🇮',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            159 =>
            array (
                'id' => 160,
                'country' => 'Niger',
                'code' => 'NER',
                'emoji' => '🇳🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            160 =>
            array (
                'id' => 161,
                'country' => 'Nigeria',
                'code' => 'NGA',
                'emoji' => '🇳🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            161 =>
            array (
                'id' => 162,
                'country' => 'Niue',
                'code' => 'NIU',
                'emoji' => '🇳🇺',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            162 =>
            array (
                'id' => 163,
                'country' => 'Norfolk Island',
                'code' => 'NFK',
                'emoji' => '🇳🇫',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            163 =>
            array (
                'id' => 164,
                'country' => 'Northern Mariana Islands',
                'code' => 'MNP',
                'emoji' => '🇲🇵',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            164 =>
            array (
                'id' => 165,
                'country' => 'Norway',
                'code' => 'NOR',
                'emoji' => '🇳🇴',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            165 =>
            array (
                'id' => 166,
                'country' => 'Oman',
                'code' => 'OMN',
                'emoji' => '🇴🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            166 =>
            array (
                'id' => 167,
                'country' => 'Pakistan',
                'code' => 'PAK',
                'emoji' => '🇵🇰',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            167 =>
            array (
                'id' => 168,
                'country' => 'Palau',
                'code' => 'PLW',
                'emoji' => '🇵🇼',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            168 =>
            array (
                'id' => 169,
                'country' => 'Palestinian Territory Occupied',
                'code' => 'PSE',
                'emoji' => '🇵🇸',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            169 =>
            array (
                'id' => 170,
                'country' => 'Panama',
                'code' => 'PAN',
                'emoji' => '🇵🇦',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            170 =>
            array (
                'id' => 171,
                'country' => 'Papua new Guinea',
                'code' => 'PNG',
                'emoji' => '🇵🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            171 =>
            array (
                'id' => 172,
                'country' => 'Paraguay',
                'code' => 'PRY',
                'emoji' => '🇵🇾',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            172 =>
            array (
                'id' => 173,
                'country' => 'Peru',
                'code' => 'PER',
                'emoji' => '🇵🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            173 =>
            array (
                'id' => 174,
                'country' => 'Philippines',
                'code' => 'PHL',
                'emoji' => '🇵🇭',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            174 =>
            array (
                'id' => 175,
                'country' => 'Pitcairn Island',
                'code' => 'PCN',
                'emoji' => '🇵🇳',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            175 =>
            array (
                'id' => 176,
                'country' => 'Poland',
                'code' => 'POL',
                'emoji' => '🇵🇱',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            176 =>
            array (
                'id' => 177,
                'country' => 'Portugal',
                'code' => 'PRT',
                'emoji' => '🇵🇹',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            177 =>
            array (
                'id' => 178,
                'country' => 'Puerto Rico',
                'code' => 'PRI',
                'emoji' => '🇵🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            178 =>
            array (
                'id' => 179,
                'country' => 'Qatar',
                'code' => 'QAT',
                'emoji' => '🇶🇦',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            179 =>
            array (
                'id' => 180,
                'country' => 'Reunion',
                'code' => 'REU',
                'emoji' => '🇷🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            180 =>
            array (
                'id' => 181,
                'country' => 'Romania',
                'code' => 'ROU',
                'emoji' => '🇷🇴',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            181 =>
            array (
                'id' => 182,
                'country' => 'Russia',
                'code' => 'RUS',
                'emoji' => '🇷🇺',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            182 =>
            array (
                'id' => 183,
                'country' => 'Rwanda',
                'code' => 'RWA',
                'emoji' => '🇷🇼',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            183 =>
            array (
                'id' => 184,
                'country' => 'Saint Helena',
                'code' => 'SHN',
                'emoji' => '🇸🇭',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            184 =>
            array (
                'id' => 185,
                'country' => 'Saint Kitts And Nevis',
                'code' => 'KNA',
                'emoji' => '🇰🇳',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            185 =>
            array (
                'id' => 186,
                'country' => 'Saint Lucia',
                'code' => 'LCA',
                'emoji' => '🇱🇨',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            186 =>
            array (
                'id' => 187,
                'country' => 'Saint Pierre and Miquelon',
                'code' => 'SPM',
                'emoji' => '🇵🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:32:07',
            ),
            187 =>
            array (
                'id' => 188,
                'country' => 'Saint Vincent And The Grenadines',
                'code' => 'VCT',
                'emoji' => '🇻🇨',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            188 =>
            array (
                'id' => 189,
                'country' => 'Saint-Barthelemy',
                'code' => 'BLM',
                'emoji' => '🇧🇱',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            189 =>
            array (
                'id' => 190,
            'country' => 'Saint-Martin (French part)',
                'code' => 'MAF',
                'emoji' => '🇲🇫',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            190 =>
            array (
                'id' => 191,
                'country' => 'Samoa',
                'code' => 'WSM',
                'emoji' => '🇼🇸',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            191 =>
            array (
                'id' => 192,
                'country' => 'San Marino',
                'code' => 'SMR',
                'emoji' => '🇸🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            192 =>
            array (
                'id' => 193,
                'country' => 'Sao Tome and Principe',
                'code' => 'STP',
                'emoji' => '🇸🇹',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            193 =>
            array (
                'id' => 194,
                'country' => 'Saudi Arabia',
                'code' => 'SAU',
                'emoji' => '🇸🇦',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            194 =>
            array (
                'id' => 195,
                'country' => 'Senegal',
                'code' => 'SEN',
                'emoji' => '🇸🇳',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            195 =>
            array (
                'id' => 196,
                'country' => 'Serbia',
                'code' => 'SRB',
                'emoji' => '🇷🇸',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            196 =>
            array (
                'id' => 197,
                'country' => 'Seychelles',
                'code' => 'SYC',
                'emoji' => '🇸🇨',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            197 =>
            array (
                'id' => 198,
                'country' => 'Sierra Leone',
                'code' => 'SLE',
                'emoji' => '🇸🇱',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            198 =>
            array (
                'id' => 199,
                'country' => 'Singapore',
                'code' => 'SGP',
                'emoji' => '🇸🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            199 =>
            array (
                'id' => 200,
                'country' => 'Slovakia',
                'code' => 'SVK',
                'emoji' => '🇸🇰',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            200 =>
            array (
                'id' => 201,
                'country' => 'Slovenia',
                'code' => 'SVN',
                'emoji' => '🇸🇮',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            201 =>
            array (
                'id' => 202,
                'country' => 'Solomon Islands',
                'code' => 'SLB',
                'emoji' => '🇸🇧',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            202 =>
            array (
                'id' => 203,
                'country' => 'Somalia',
                'code' => 'SOM',
                'emoji' => '🇸🇴',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            203 =>
            array (
                'id' => 204,
                'country' => 'South Africa',
                'code' => 'ZAF',
                'emoji' => '🇿🇦',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            204 =>
            array (
                'id' => 205,
                'country' => 'South Georgia',
                'code' => 'SGS',
                'emoji' => '🇬🇸',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            205 =>
            array (
                'id' => 206,
                'country' => 'South Sudan',
                'code' => 'SSD',
                'emoji' => '🇸🇸',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            206 =>
            array (
                'id' => 207,
                'country' => 'Spain',
                'code' => 'ESP',
                'emoji' => '🇪🇸',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            207 =>
            array (
                'id' => 208,
                'country' => 'Sri Lanka',
                'code' => 'LKA',
                'emoji' => '🇱🇰',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            208 =>
            array (
                'id' => 209,
                'country' => 'Sudan',
                'code' => 'SDN',
                'emoji' => '🇸🇩',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            209 =>
            array (
                'id' => 210,
                'country' => 'Suricountry',
                'code' => 'SUR',
                'emoji' => '🇸🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            210 =>
            array (
                'id' => 211,
                'country' => 'Svalbard And Jan Mayen Islands',
                'code' => 'SJM',
                'emoji' => '🇸🇯',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            211 =>
            array (
                'id' => 212,
                'country' => 'Swaziland',
                'code' => 'SWZ',
                'emoji' => '🇸🇿',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            212 =>
            array (
                'id' => 213,
                'country' => 'Sweden',
                'code' => 'SWE',
                'emoji' => '🇸🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            213 =>
            array (
                'id' => 214,
                'country' => 'Switzerland',
                'code' => 'CHE',
                'emoji' => '🇨🇭',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            214 =>
            array (
                'id' => 215,
                'country' => 'Syria',
                'code' => 'SYR',
                'emoji' => '🇸🇾',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            215 =>
            array (
                'id' => 216,
                'country' => 'Taiwan',
                'code' => 'TWN',
                'emoji' => '🇹🇼',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            216 =>
            array (
                'id' => 217,
                'country' => 'Tajikistan',
                'code' => 'TJK',
                'emoji' => '🇹🇯',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            217 =>
            array (
                'id' => 218,
                'country' => 'Tanzania',
                'code' => 'TZA',
                'emoji' => '🇹🇿',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            218 =>
            array (
                'id' => 219,
                'country' => 'Thailand',
                'code' => 'THA',
                'emoji' => '🇹🇭',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            219 =>
            array (
                'id' => 220,
                'country' => 'Togo',
                'code' => 'TGO',
                'emoji' => '🇹🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            220 =>
            array (
                'id' => 221,
                'country' => 'Tokelau',
                'code' => 'TKL',
                'emoji' => '🇹🇰',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            221 =>
            array (
                'id' => 222,
                'country' => 'Tonga',
                'code' => 'TON',
                'emoji' => '🇹🇴',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            222 =>
            array (
                'id' => 223,
                'country' => 'Trinidad And Tobago',
                'code' => 'TTO',
                'emoji' => '🇹🇹',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            223 =>
            array (
                'id' => 224,
                'country' => 'Tunisia',
                'code' => 'TUN',
                'emoji' => '🇹🇳',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            224 =>
            array (
                'id' => 225,
                'country' => 'Turkey',
                'code' => 'TUR',
                'emoji' => '🇹🇷',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            225 =>
            array (
                'id' => 226,
                'country' => 'Turkmenistan',
                'code' => 'TKM',
                'emoji' => '🇹🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            226 =>
            array (
                'id' => 227,
                'country' => 'Turks And Caicos Islands',
                'code' => 'TCA',
                'emoji' => '🇹🇨',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            227 =>
            array (
                'id' => 228,
                'country' => 'Tuvalu',
                'code' => 'TUV',
                'emoji' => '🇹🇻',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            228 =>
            array (
                'id' => 229,
                'country' => 'Uganda',
                'code' => 'UGA',
                'emoji' => '🇺🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            229 =>
            array (
                'id' => 230,
                'country' => 'Ukraine',
                'code' => 'UKR',
                'emoji' => '🇺🇦',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            230 =>
            array (
                'id' => 231,
                'country' => 'United Arab Emirates',
                'code' => 'ARE',
                'emoji' => '🇦🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            231 =>
            array (
                'id' => 232,
                'country' => 'United Kingdom',
                'code' => 'GBR',
                'emoji' => '🇬🇧',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            232 =>
            array (
                'id' => 233,
                'country' => 'United States',
                'code' => 'USA',
                'emoji' => '🇺🇸',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            233 =>
            array (
                'id' => 234,
                'country' => 'United States Minor Outlying Islands',
                'code' => 'UMI',
                'emoji' => '🇺🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            234 =>
            array (
                'id' => 235,
                'country' => 'Uruguay',
                'code' => 'URY',
                'emoji' => '🇺🇾',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            235 =>
            array (
                'id' => 236,
                'country' => 'Uzbekistan',
                'code' => 'UZB',
                'emoji' => '🇺🇿',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            236 =>
            array (
                'id' => 237,
                'country' => 'Vanuatu',
                'code' => 'VUT',
                'emoji' => '🇻🇺',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            237 =>
            array (
                'id' => 238,
            'country' => 'Vatican City State (Holy See)',
                'code' => 'VAT',
                'emoji' => '🇻🇦',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            238 =>
            array (
                'id' => 239,
                'country' => 'Venezuela',
                'code' => 'VEN',
                'emoji' => '🇻🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            239 =>
            array (
                'id' => 240,
                'country' => 'Vietnam',
                'code' => 'VNM',
                'emoji' => '🇻🇳',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            240 =>
            array (
                'id' => 241,
            'country' => 'Virgin Islands (British)',
                'code' => 'VGB',
                'emoji' => '🇻🇬',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            241 =>
            array (
                'id' => 242,
            'country' => 'Virgin Islands (US)',
                'code' => 'VIR',
                'emoji' => '🇻🇮',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            242 =>
            array (
                'id' => 243,
                'country' => 'Wallis And Futuna Islands',
                'code' => 'WLF',
                'emoji' => '🇼🇫',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            243 =>
            array (
                'id' => 244,
                'country' => 'Western Sahara',
                'code' => 'ESH',
                'emoji' => '🇪🇭',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            244 =>
            array (
                'id' => 245,
                'country' => 'Yemen',
                'code' => 'YEM',
                'emoji' => '🇾🇪',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            245 =>
            array (
                'id' => 246,
                'country' => 'Zambia',
                'code' => 'ZMB',
                'emoji' => '🇿🇲',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            246 =>
            array (
                'id' => 247,
                'country' => 'Zimbabwe',
                'code' => 'ZWE',
                'emoji' => '🇿🇼',
                'created_at' => '2018-07-21 10:11:03',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            247 =>
            array (
                'id' => 248,
                'country' => 'Kosovo',
                'code' => 'XKX',
                'emoji' => '🇽🇰',
                'created_at' => '2020-08-16 05:33:50',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            248 =>
            array (
                'id' => 249,
                'country' => 'Curaçao',
                'code' => 'CUW',
                'emoji' => '🇨🇼',
                'created_at' => '2020-10-26 04:54:20',
                'updated_at' => '2022-05-22 00:39:27',
            ),
            249 =>
            array (
                'id' => 250,
            'country' => 'Sint Maarten (Dutch part)',
                'code' => 'SXM',
                'emoji' => '🇸🇽',
                'created_at' => '2020-12-06 03:03:39',
                'updated_at' => '2022-05-22 00:39:27',
            ),
        ));


    }
}
