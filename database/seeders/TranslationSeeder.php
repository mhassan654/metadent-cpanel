<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('translations')->delete();
        Translation::create([
            'title' => 'Appointment Button',
            'source_text' => 'appointment_btn_text',
            "translation_text" => 'Afspraak',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Appointment Type',
            'source_text' => 'appointment_type_text',
            "translation_text" => 'Afspraaktype',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Event Types',
            'source_text' => 'event_type_text',
            "translation_text" => 'Evenementtype',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Doctor slots',
            'source_text' => 'doctor_slots_text',
            "translation_text" => 'Dokter slots',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Treatments',
            'source_text' => 'treatments_text',
            "translation_text" => 'behandelingen',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Treatment',
            'source_text' => 'treatment_text',
            "translation_text" => 'Behandeling',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Configuration Button',
            'source_text' => 'configuration_btn_text',
            "translation_text" => 'CONFIGURATIES',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Branch A Doctor',
            'source_text' => 'branch_a_doctors',
            "translation_text" => 'Tak A-artsen',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Day',
            'source_text' => 'day_text',
            "translation_text" => 'Dag',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Week',
            'source_text' => 'week_text',
            "translation_text" => 'Week',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Work Week',
            'source_text' => 'work_week_text',
            "translation_text" => 'Werkweek',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Day of Month week',
            'source_text' => 'day_of_month_week_text',
            "translation_text" => 'Dag van de maand week',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Select event days',
            'source_text' => 'select_event_days_text',
            "translation_text" => 'Selecteer evenementendagen',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Occurs every',
            'source_text' => 'occurs_every_text',
            "translation_text" => 'Komt elke keer voor',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Until',
            'source_text' => 'until_text',
            "translation_text" => 'Tot',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Day(s) of the week',
            'source_text' => 'day_of_week_text',
            "translation_text" => 'Dagen van de week',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Month',
            'source_text' => 'month_text',
            "translation_text" => 'Maand',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Appointment Details',
            'source_text' => 'appointment_details_text',
            "translation_text" => 'Afspraakdetails',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Tracking',
            'source_text' => 'tracking_title_text',
            "translation_text" => 'Volgen',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Add Doctor',
            'source_text' => 'add_doctor_text',
            "translation_text" => 'Dokter toevoegen',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Archive',
            'source_text' => 'archive_text',
            "translation_text" => 'Archief',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Suggestions',
            'source_text' => 'suggestions_text',
            "translation_text" => 'Suggesties voor',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'View Occurrences Series',
            'source_text' => 'view_occurance_series_text',
            "translation_text" => 'Je bekijkt een exemplaar van een serie',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'view Series',
            'source_text' => 'view_series_text',
            "translation_text" => 'Bekijk serie',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Data Loading Text',
            'source_text' => 'data_loading_text',
            "translation_text" => 'Gegevens worden geladen..Een ogenblik geduld!!!',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Search by name',
            'source_text' => 'search_by_name_text',
            "translation_text" => 'Zoek op naame',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Reset Text',
            'source_text' => 'reset_text',
            "translation_text" => 'Resetten',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Appointment Type title',
            'source_text' => 'appointment_type_title_text',
            "translation_text" => 'Afspraaktypes',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Title',
            'source_text' => 'title_text',
            "translation_text" => 'Titel',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Code',
            'source_text' => 'code_title_text',
            "translation_text" => 'Code',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Color',
            'source_text' => 'color_title_text',
            "translation_text" => 'Kleur',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Duration',
            'source_text' => 'duration_text',
            "translation_text" => 'Looptijd',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Action',
            'source_text' => 'action_text',
            "translation_text" => 'Actie',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Appointment',
            'source_text' => 'appointment_text',
            "translation_text" => 'Afspraak',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Loading Doctors Calendar',
            'source_text' => 'loading_doctors_calendar',
            "translation_text" => 'Dokterskalender laden',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Please wait',
            'source_text' => 'please_wait_text',
            "translation_text" => 'Even geduld aub',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Event code',
            'source_text' => 'event_code_text',
            "translation_text" => 'Evenementcode',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Event Title',
            'source_text' => 'event_title_text',
            "translation_text" => 'Titel van het evenement',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'CANCEL',
            'source_text' => 'cancel_text',
            "translation_text" => 'ANNULEREN',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'SAVE',
            'source_text' => 'save_text',
            "translation_text" => 'OPSLAAN',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Select Color',
            'source_text' => 'select_color_text',
            "translation_text" => 'Selecteer kleur',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'New Type',
            'source_text' => 'new_type_text',
            "translation_text" => 'Nieuw type',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Type List',
            'source_text' => 'type_list_text',
            "translation_text" => 'Typ Lijst',
            "lang" => 'nl',
        ]);

        // calendar appoinmtnets form
        Translation::create([
            'title' => 'Scheduling Assistant',
            'source_text' => 'scheduling_assistant_text',
            "translation_text" => 'Planningsassistent',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Select Patient',
            'source_text' => 'select_patient_text',
            "translation_text" => 'Zoek patiënt',
            "lang" => 'nl',
        ]);
        Translation::create([
            'title' => 'Patient Name',
            'source_text' => 'patient_name_text',
            "translation_text" => 'Patient naam',
            "lang" => 'nl',
        ]);
        Translation::create([
            'title' => 'Main Doctor',
            'source_text' => 'main_doctor_text',
            "translation_text" => 'hoofddokter',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Select Treatment',
            'source_text' => 'select_treament_text',
            "translation_text" => 'Selecteer behandeling',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Select Type',
            'source_text' => 'select_type_text',
            "translation_text" => 'Selecteer type',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Add Required Doctors',
            'source_text' => 'add_required_doctor_text',
            "translation_text" => 'Vereiste artsen toevoegen',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Required Doctors',
            'source_text' => 'required_doctor_text',
            "translation_text" => 'Vereiste artsen',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Doctor Not Found',
            'source_text' => 'doctor_not_found_text',
            "translation_text" => 'Dokter niet gevonden',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Procedures',
            'source_text' => 'procedures_text',
            "translation_text" => 'Procedures',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Add Other Attendees',
            'source_text' => 'add_other_attendees_text',
            "translation_text" => 'Andere deelnemers toevoegen',
            "lang" => 'nl',
        ]);
        Translation::create([
            'title' => 'No Results Found',
            'source_text' => 'no_results_found_text',
            "translation_text" => 'Geen resultaten gevonden',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Cancel Attendees',
            'source_text' => 'cancel_attendees_text',
            "translation_text" => 'Deelnemers annuleren',
            "lang" => 'nl',
        ]);
        Translation::create([
            'title' => 'Other Attendees',
            'source_text' => 'other_attendees_text',
            "translation_text" => 'Andere deelnemers',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Apply slot filters',
            'source_text' => 'apply_slot_filters_text',
            "translation_text" => 'Slotfilters toepassen',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'clear slot filters',
            'source_text' => 'clear_slot_filters_text',
            "translation_text" => 'sleuffilters wissen',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Frequency',
            'source_text' => 'frequency_text',
            "translation_text" => 'Frequentie',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Set Frequency',
            'source_text' => 'set_frequency_text',
            "translation_text" => 'Frequentie instellen',
            "lang" => 'nl',
        ]);

        // required fields texts
        Translation::create([
            'title' => 'This field is required',
            'source_text' => 'required_field_text',
            "translation_text" => 'dit veld is verplicht',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Doctor Available Days',
            'source_text' => 'doctor_available_days_text',
            "translation_text" => 'Dokter Beschikbare Dagen',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Period',
            'source_text' => 'period_text',
            "translation_text" => 'Periode',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Start Time',
            'source_text' => 'start_time_text',
            "translation_text" => 'Starttijd',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Start',
            'source_text' => 'start_text',
            "translation_text" => 'Begin',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'End',
            'source_text' => 'end_text',
            "translation_text" => 'Einde',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'End Time',
            'source_text' => 'end_time_text',
            "translation_text" => 'Eindtijd',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Start Date',
            'source_text' => 'start_date_text',
            "translation_text" => 'Startdatum',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'End Date',
            'source_text' => 'end_date_text',
            "translation_text" => 'Einddatum',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Select End Date',
            'source_text' => 'select_end_date_text',
            "translation_text" => 'Selecteer Einddatum',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Does not repeat',
            'source_text' => 'does_not_repeat_text',
            "translation_text" => 'herhaalt niet',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Every',
            'source_text' => 'every_text',
            "translation_text" => 'Elk',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'No patient found',
            'source_text' => 'no_patient_found_text',
            "translation_text" => 'Geen patiënt gevonden',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Expected material',
            'source_text' => 'expected_material_text',
            "translation_text" => 'Verwacht materiaal',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Expected Date',
            'source_text' => 'expected_date_text',
            "translation_text" => 'Verwachte datum',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Technical Work (TW)',
            'source_text' => 'technical_work_text',
            "translation_text" => 'Technisch Werk (TW)',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Required Doctors',
            'source_text' => 'required_doctors_text',
            "translation_text" => 'Vereiste artsen',
            "lang" => 'nl',
        ]);

        // =========================================Event Creation Form=========================
        Translation::create([
            'title' => 'Event Title',
            'source_text' => 'event_title_text',
            "translation_text" => 'Titel van het evenement',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Title',
            'source_text' => 'title_text',
            "translation_text" => 'Titel',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Enter Code',
            'source_text' => 'event_code_text',
            "translation_text" => 'Voer code in',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Event Code',
            'source_text' => 'event_code_text',
            "translation_text" => 'Voer code in',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Select Duration',
            'source_text' => 'select_duration_text',
            "translation_text" => 'Selecteer Duur',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Contact name',
            'source_text' => 'contact_name_text',
            "translation_text" => 'Contactnaam',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Phone Number',
            'source_text' => 'phone_number_text',
            "translation_text" => 'Telefoonnummer',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Email Address',
            'source_text' => 'email_address_text',
            "translation_text" => 'E-mailadres',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Physical Address',
            'source_text' => 'physical_address_text',
            "translation_text" => 'E-Fysiek adres',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Name',
            'source_text' => 'name_text',
            "translation_text" => 'Naam',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Select Start time',
            'source_text' => 'select_start_time_text',
            "translation_text" => 'Selecteer Starttijd',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Set Recurrence',
            'source_text' => 'set_recurrence_text',
            "translation_text" => 'Herhaling instellen',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'On',
            'source_text' => 'on_text',
            "translation_text" => 'Aan',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Monday',
            'source_text' => 'monday_text',
            "translation_text" => 'Maandag',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Third',
            'source_text' => 'third_text',
            "translation_text" => 'Derde',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'On the',
            'source_text' => 'on_the_text',
            "translation_text" => 'op de',
            "lang" => 'nl',
        ]);

        Translation::create([
            'title' => 'Technical Work (TW)',
            'source_text' => 'technical_work_text',
            "translation_text" => 'Technisch Werk (TW)',
            "lang" => 'nl',
        ]);
        //appointments/events form translations end

        Artisan::call('cache:clear');
    }
}
