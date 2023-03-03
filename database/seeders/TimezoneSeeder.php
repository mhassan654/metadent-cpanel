<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Timezone;

class TimezoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Timezone::truncate();

        Timezone::create([
            'time_zone_key' => '(GMT-12:00) International Date Line West',
            'time_zone_value' => 'Pacific/Kwajalein'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-11:00) Midway Island',
            'time_zone_value' => 'Pacific/Midway'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-11:00) Samoa',
            'time_zone_value' => 'Pacific/Apia'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-10:00) Hawaii',
            'time_zone_value' => 'Pacific/Honolulu'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-09:00) Alaska',
            'time_zone_value' => 'America/Anchorage'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-08:00) Pacific Time (US & Canada)',
            'time_zone_value' => 'America/Los_Angeles'
        ]);

        Timezone::create([
            'time_zone_key' => 'GMT-08:00) Tijuana',
            'time_zone_value' => 'America/Tijuana'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-07:00) Arizona',
            'time_zone_value' => 'America/Phoenix'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-07:00) Mountain Time (US & Canada)',
            'time_zone_value' => 'America/Denver'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-07:00) Chihuahua',
            'time_zone_value' => 'America/Chihuahua'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-07:00) La Paz',
            'time_zone_value' => 'America/Chihuahua'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-07:00) Mazatlan',
            'time_zone_value' => 'America/Mazatlan'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-06:00) Central Time (US & Canada)',
            'time_zone_value' => 'America/Chicago'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-06:00) Central America',
            'time_zone_value' => 'America/Managua'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-06:00) Guadalajara',
            'time_zone_value' => 'America/Mexico_City'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-06:00) Mexico City',
            'time_zone_value' => 'America/Mexico_City'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-06:00) Monterrey',
            'time_zone_value' => 'America/Monterrey'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-06:00) Saskatchewan',
            'time_zone_value' => 'America/Regina'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-05:00) Eastern Time (US & Canada)',
            'time_zone_value' => 'America/New_York'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-05:00) Indiana (East)',
            'time_zone_value' => 'America/Indiana/Indianapolis'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-05:00) Bogota',
            'time_zone_value' => 'America/Bogota'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-05:00) Lima',
            'time_zone_value' => 'America/Lima'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-05:00) Quito',
            'time_zone_value' => 'America/Bogota'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-04:00) Atlantic Time (Canada)',
            'time_zone_value' => 'America/Halifax'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-04:00) Caracas',
            'time_zone_value' => 'America/Caracas'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-04:00) La Paz',
            'time_zone_value' => 'America/La_Paz'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-04:00) Santiago',
            'time_zone_value' => 'America/Santiago'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-03:30) Newfoundland',
            'time_zone_value' => 'America/St_Johns'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-03:00) Brasilia',
            'time_zone_value' => 'America/Sao_Paulo'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-03:00) Buenos Aires',
            'time_zone_value' => 'America/Argentina/Buenos_Aires'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-03:00) Georgetown',
            'time_zone_value' => 'America/Argentina/Buenos_Aires'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-03:00) Greenland',
            'time_zone_value' => 'America/Godthab'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-02:00) Mid-Atlantic',
            'time_zone_value' => 'America/Noronha'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-01:00) Azores',
            'time_zone_value' => 'Atlantic/Azores'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT-01:00) Cape Verde Is.',
            'time_zone_value' => 'Atlantic/Cape_Verde'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT) Casablanca',
            'time_zone_value' => 'Africa/Casablanca'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT) Dublin',
            'time_zone_value' => 'Europe/London'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT) Edinburgh',
            'time_zone_value' => 'Europe/London'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT) Lisbon',
            'time_zone_value' => 'Europe/Lisbon'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT) London',
            'time_zone_value' => 'Europe/London'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT)',
            'time_zone_value' => 'UTC'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT) Monrovia',
            'time_zone_value' => 'Africa/Monrovia'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Amsterdam',
            'time_zone_value' => 'Europe/Amsterdam'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Belgrade',
            'time_zone_value' => 'Europe/Belgrade'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Berlin',
            'time_zone_value' => 'Europe/Berlin'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Bern',
            'time_zone_value' => 'Europe/Berlin'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Bratislava',
            'time_zone_value' => 'Europe/Bratislava'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Brussels',
            'time_zone_value' => 'Europe/Brussels'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Budapest',
            'time_zone_value' => 'Europe/Budapest'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Copenhagen',
            'time_zone_value' => 'Europe/Copenhagen'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Ljubljana',
            'time_zone_value' => 'Europe/Ljubljana'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Madrid',
            'time_zone_value' => 'Europe/Madrid'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Paris',
            'time_zone_value' => 'Europe/Paris'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Prague',
            'time_zone_value' => 'Europe/Prague'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Rome',
            'time_zone_value' => 'Europe/Rome'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Sarajevo',
            'time_zone_value' => 'Europe/Sarajevo'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Skopje',
            'time_zone_value' => 'Europe/Skopje'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Stockholm',
            'time_zone_value' => 'Europe/Stockholm'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Vienna',
            'time_zone_value' => 'Europe/Vienna'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Warsaw',
            'time_zone_value' => 'Europe/Warsaw'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) West Central Africa',
            'time_zone_value' => 'Africa/Lagos'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+01:00) Zagreb',
            'time_zone_value' => 'Europe/Zagreb'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Athens',
            'time_zone_value' => 'Europe/Athens'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Bucharest',
            'time_zone_value' => 'Europe/Bucharest'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Cairo',
            'time_zone_value' => 'Africa/Cairo'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Harare',
            'time_zone_value' => 'Africa/Harare'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Helsinki',
            'time_zone_value' => 'Europe/Helsinki'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Istanbul',
            'time_zone_value' => 'Europe/Istanbul'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Jerusalem',
            'time_zone_value' => 'Asia/Jerusalem'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Kyev',
            'time_zone_value' => 'Europe/Kiev'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Minsk',
            'time_zone_value' => 'Europe/Minsk'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Pretoria',
            'time_zone_value' => 'Africa/Johannesburg'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Riga',
            'time_zone_value' => 'Europe/Riga'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Sofia',
            'time_zone_value' => 'Europe/Sofia'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Tallinn',
            'time_zone_value' => 'Europe/Tallinn'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+02:00) Vilnius',
            'time_zone_value' => 'Europe/Vilnius'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+03:00) Baghdad',
            'time_zone_value' => 'Asia/Baghdad'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+03:00) Kuwait',
            'time_zone_value' => 'Asia/Kuwait'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+03:00) Moscow',
            'time_zone_value' => 'Europe/Moscow'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+03:00) Nairobi',
            'time_zone_value' => 'Africa/Nairobi'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+03:00) Riyadh',
            'time_zone_value' => 'Asia/Riyadh'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+03:00) St. Petersburg',
            'time_zone_value' => 'Europe/Moscow'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+03:00) Volgograd',
            'time_zone_value' => 'Europe/Volgograd'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+03:30) Tehran',
            'time_zone_value' => 'Asia/Tehran'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+04:00) Abu Dhabi',
            'time_zone_value' => 'Asia/Muscat'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+04:00) Baku',
            'time_zone_value' => 'Asia/Baku'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+04:00) Muscat',
            'time_zone_value' => 'Asia/Muscat'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+04:00) Tbilisi',
            'time_zone_value' => 'Asia/Tbilisi'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+04:00) Yerevan',
            'time_zone_value' => 'Asia/Yerevan'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+04:30) Kabul',
            'time_zone_value' => 'Asia/Kabul'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+05:00) Ekaterinburg',
            'time_zone_value' => 'Asia/Yekaterinburg'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+05:00) Islamabad',
            'time_zone_value' => 'Asia/Karachi'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+05:00) Karachi',
            'time_zone_value' => 'Asia/Karachi'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+05:00) Tashkent',
            'time_zone_value' => 'Asia/Tashkent'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+05:30) Chennai',
            'time_zone_value' => 'Asia/Kolkata'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+05:30) Kolkata',
            'time_zone_value' => 'Asia/Kolkata'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+05:30) Mumbai',
            'time_zone_value' => 'Asia/Kolkata'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+05:30) New Delhi',
            'time_zone_value' => 'Asia/Kolkata'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+05:45) Kathmandu',
            'time_zone_value' => 'Asia/Kathmandu'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+06:00) Almaty',
            'time_zone_value' => 'Asia/Almaty'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+06:00) Astana',
            'time_zone_value' => 'Asia/Dhaka'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+06:00) Dhaka',
            'time_zone_value' => 'Asia/Dhaka'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+06:00) Novosibirsk',
            'time_zone_value' => 'Asia/Novosibirsk'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+06:00) Sri Jayawardenepura',
            'time_zone_value' => 'Asia/Colombo'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+06:30) Rangoon',
            'time_zone_value' => 'Asia/Rangoon'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+07:00) Bangkok',
            'time_zone_value' => 'Asia/Bangkok'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+07:00) Hanoi',
            'time_zone_value' => 'Asia/Bangkok'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+07:00) Jakarta',
            'time_zone_value' => 'Asia/Jakarta'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+07:00) Krasnoyarsk',
            'time_zone_value' => 'Asia/Krasnoyarsk'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+08:00) Beijing',
            'time_zone_value' => 'Asia/Beijing'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+08:00) Chongqing',
            'time_zone_value' => 'Asia/Chongqing'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+08:00) Hong Kong',
            'time_zone_value' => 'Asia/Hong Kong'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+08:00) Irkutsk',
            'time_zone_value' => 'Asia/Irkutsk'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+08:00) Kuala Lumpur',
            'time_zone_value' => 'Asia/Kuala_Lumpur'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+08:00) Perth',
            'time_zone_value' => 'Australia/Perth'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+08:00) Singapore',
            'time_zone_value' => 'Asia/Singapore'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+08:00) Taipei',
            'time_zone_value' => 'Asia/Taipei'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+08:00) Ulaan Bataar',
            'time_zone_value' => 'Asia/Irkutsk'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+08:00) Urumqi',
            'time_zone_value' => 'Asia/Urumqi'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+09:00) Osaka',
            'time_zone_value' => 'Asia/Tokyo'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+09:00) Sapporo',
            'time_zone_value' => 'Asia/Tokyo'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+09:00) Seoul',
            'time_zone_value' => 'Asia/Seoul'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+09:00) Tokyo',
            'time_zone_value' => 'Asia/Tokyo'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+09:00) Yakutsk',
            'time_zone_value' => 'Asia/Yakutsk'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+09:30) Adelaide',
            'time_zone_value' => 'Australia/Adelaide'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+09:30) Darwin',
            'time_zone_value' => 'Australia/Darwin'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+10:00) Brisbane',
            'time_zone_value' => 'Australia/Brisbane'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+10:00) Canberra',
            'time_zone_value' => 'Australia/Sydney'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+10:00) Guam',
            'time_zone_value' => 'Pacific/Guam'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+10:00) Hobart',
            'time_zone_value' => 'Australia/Hobart'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+10:00) Melbourne',
            'time_zone_value' => 'Australia/Melbourne'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+10:00) Port Moresby',
            'time_zone_value' => 'Pacific/Port_Moresby'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+10:00) Sydney',
            'time_zone_value' => 'Australia/Sydney'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+10:00) Vladivostok',
            'time_zone_value' => 'Asia/Vladivostok'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+11:00) Magadan',
            'time_zone_value' => 'Asia/Magadan'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+11:00) Solomon Is.',
            'time_zone_value' => 'Asia/Magadan'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+12:00) Auckland',
            'time_zone_value' => 'Pacific/Auckland'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+12:00) Fiji',
            'time_zone_value' => 'Pacific/Fiji'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+12:00) Kamchatka',
            'time_zone_value' => 'Asia/Kamchatka'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+12:00) Marshall Is.',
            'time_zone_value' => 'Pacific/Fiji'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+12:00) Wellington',
            'time_zone_value' => 'Pacific/Auckland'
        ]);

        Timezone::create([
            'time_zone_key' => '(GMT+13:00) Nuku\'alofa',
            'time_zone_value' => 'Pacific/Tongatapu'
        ]);

    }
}
