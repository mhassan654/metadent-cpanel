<?php

namespace Database\Seeders;

use App\Models\Period;
use App\Models\Language;
use App\Models\Patients;
use App\Models\Appointment;
use App\Models\AppointmentType;
use Illuminate\Database\Seeder;
use App\Models\UserAvailability;
use Database\Seeders\CountryCitySqlSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            CalendarFrequenciesSeeder::class,
            AutoMailCategorySeeder::class,
            RolesSeeder::class,
            FrequenciesSeeder::class,
            AppointmentsTypeSeeder::class,
            FacilitySeeder::class,
            SettingSeeder::class,
            FacilityStatusesSeeder::class,
            AccountStatusesSeeder::class,
            AppointmentStatusSeeder::class,
            AppointmentsSourceSeeder::class,
            ProcedureSeeder::class,
            HealthHistorySeeder::class,
            LanguageSeeder::class,
            TreatmentCategoriesTableSeeder::class,
            TreatmentsTableSeeder::class,
            AppointmentReasonsSeeder::class,
            UserAvailabilitySeeder::class,
            EndodonticTreatmentSeeder::class,
            BridgeConnectorsTableSeeder::class,
            TreatmentProcedureSeeder::class,
            EventTypesSeeder::class,
            PeriodsSeeder::class,
            TreatmentsTableSeeder::class,
            TreatmentCategoriesTableSeeder::class,
            ToggleSeeder::class,
            TranslationSeeder::class,
            DutyTypeSeeder::class,
            RateTypeSeeder::class,
            PositionSeeder::class,
            EmployeeTypeSeeder::class,
            SupervisorSeeder::class,
            PayFrequencySeeder::class,
            AccCoaTableSeeder::class,
            TranslationsTableSeeder::class,
            // TreatmentTypeSeeder::class,
            TreatmentsTableSeeder::class,
            DepartmentsSeeder::class,
            EmployeeFileSeeder::class,
            EmployeesTableSeeder::class,
            CountryCitySqlSeeder::class,
            TranslationLanguageSeeder::class,
            ModuleSeeder::class,
            ModuleViewSeeder::class,
            ElementSeeder::class,
            ElementTranslationSeeder::class,
            PatientsTableSeeder::class,
            TranslationsTableSeeder::class,
            TimezoneSeeder::class
        ]);
        $this->call(ElementsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
