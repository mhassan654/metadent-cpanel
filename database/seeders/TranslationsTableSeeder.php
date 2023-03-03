<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('translations')->delete();

        \DB::table('translations')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'Appointment Button',
                'source_text' => 'appointment_btn_text',
                'translation_text' => 'Afspraak',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            1 =>
            array (
                'id' => 2,
                'title' => 'Appointment Type',
                'source_text' => 'appointment_type_text',
                'translation_text' => 'Afspraaktype',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            2 =>
            array (
                'id' => 3,
                'title' => 'Event Types',
                'source_text' => 'event_type_text',
                'translation_text' => 'Evenementtype',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            3 =>
            array (
                'id' => 4,
                'title' => 'Doctor slots',
                'source_text' => 'doctor_slots_text',
                'translation_text' => 'Dokter slots',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            4 =>
            array (
                'id' => 5,
                'title' => 'Treatments',
                'source_text' => 'treatments_text',
                'translation_text' => 'behandelingen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            5 =>
            array (
                'id' => 6,
                'title' => 'Treatment',
                'source_text' => 'treatment_text',
                'translation_text' => 'Behandeling',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            6 =>
            array (
                'id' => 7,
                'title' => 'Configuration Button',
                'source_text' => 'configuration_btn_text',
                'translation_text' => 'CONFIGURATIES',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            7 =>
            array (
                'id' => 8,
                'title' => 'Branch A Doctor',
                'source_text' => 'branch_a_doctors',
                'translation_text' => 'Arts',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-09-02 12:14:23',
            ),
            8 =>
            array (
                'id' => 9,
                'title' => 'Day',
                'source_text' => 'day_text',
                'translation_text' => 'Dag',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            9 =>
            array (
                'id' => 10,
                'title' => 'Week',
                'source_text' => 'week_text',
                'translation_text' => 'Week',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            10 =>
            array (
                'id' => 11,
                'title' => 'Work Week',
                'source_text' => 'work_week_text',
                'translation_text' => 'Werkweek',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            11 =>
            array (
                'id' => 12,
                'title' => 'Day of Month week',
                'source_text' => 'day_of_month_week_text',
                'translation_text' => 'Dag van de maand week',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            12 =>
            array (
                'id' => 13,
                'title' => 'Select event days',
                'source_text' => 'select_event_days_text',
                'translation_text' => 'Selecteer evenementendagen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            13 =>
            array (
                'id' => 14,
                'title' => 'Occurs every',
                'source_text' => 'occurs_every_text',
                'translation_text' => 'Komt elke keer voor',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            14 =>
            array (
                'id' => 15,
                'title' => 'Until',
                'source_text' => 'until_text',
                'translation_text' => 'Tot',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            15 =>
            array (
                'id' => 16,
            'title' => 'Day(s) of the week',
                'source_text' => 'day_of_week_text',
                'translation_text' => 'Dagen van de week',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            16 =>
            array (
                'id' => 17,
                'title' => 'Month',
                'source_text' => 'month_text',
                'translation_text' => 'Maand',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            17 =>
            array (
                'id' => 18,
                'title' => 'Appointment Details',
                'source_text' => 'appointment_details_text',
                'translation_text' => 'Afspraakdetails',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            18 =>
            array (
                'id' => 19,
                'title' => 'Tracking',
                'source_text' => 'tracking_title_text',
                'translation_text' => 'Volgen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            19 =>
            array (
                'id' => 20,
                'title' => 'Add Doctor',
                'source_text' => 'add_doctor_text',
                'translation_text' => 'Dokter toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            20 =>
            array (
                'id' => 21,
                'title' => 'Archive',
                'source_text' => 'archive_text',
                'translation_text' => 'Archief',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            21 =>
            array (
                'id' => 22,
                'title' => 'Suggestions',
                'source_text' => 'suggestions_text',
                'translation_text' => 'Suggesties voor',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            22 =>
            array (
                'id' => 23,
                'title' => 'View Occurrences Series',
                'source_text' => 'view_occurance_series_text',
                'translation_text' => 'Je bekijkt een exemplaar van een serie',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            23 =>
            array (
                'id' => 24,
                'title' => 'view Series',
                'source_text' => 'view_series_text',
                'translation_text' => 'Bekijk serie',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            24 =>
            array (
                'id' => 25,
                'title' => 'Data Loading Text',
                'source_text' => 'data_loading_text',
                'translation_text' => 'Gegevens worden geladen..Een ogenblik geduld!!!',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            25 =>
            array (
                'id' => 26,
                'title' => 'Search by name',
                'source_text' => 'search_by_name_text',
                'translation_text' => 'Zoek op naam',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-09-05 12:40:25',
            ),
            26 =>
            array (
                'id' => 27,
                'title' => 'Reset Text',
                'source_text' => 'reset_text',
                'translation_text' => 'Resetten',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            27 =>
            array (
                'id' => 28,
                'title' => 'Appointment Type title',
                'source_text' => 'appointment_type_title_text',
                'translation_text' => 'Afspraaktypes',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            28 =>
            array (
                'id' => 29,
                'title' => 'Title',
                'source_text' => 'title_text',
                'translation_text' => 'Titel',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            29 =>
            array (
                'id' => 30,
                'title' => 'Code',
                'source_text' => 'code_title_text',
                'translation_text' => 'Code',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            30 =>
            array (
                'id' => 31,
                'title' => 'Color',
                'source_text' => 'color_title_text',
                'translation_text' => 'Kleur',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            31 =>
            array (
                'id' => 32,
                'title' => 'Duration',
                'source_text' => 'duration_text',
                'translation_text' => 'Looptijd',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            32 =>
            array (
                'id' => 33,
                'title' => 'Action',
                'source_text' => 'action_text',
                'translation_text' => 'Actie',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            33 =>
            array (
                'id' => 34,
                'title' => 'Appointment',
                'source_text' => 'appointment_text',
                'translation_text' => 'Afspraak',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            34 =>
            array (
                'id' => 35,
                'title' => 'Loading Doctors Calendar',
                'source_text' => 'loading_doctors_calendar',
                'translation_text' => 'Dokterskalender laden',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            35 =>
            array (
                'id' => 36,
                'title' => 'Please wait',
                'source_text' => 'please_wait_text',
                'translation_text' => 'Even geduld aub',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            36 =>
            array (
                'id' => 37,
                'title' => 'Event code',
                'source_text' => 'event_code_text',
                'translation_text' => 'Evenementcode',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            37 =>
            array (
                'id' => 38,
                'title' => 'Event Title',
                'source_text' => 'event_title_text',
                'translation_text' => 'Titel van het evenement',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            38 =>
            array (
                'id' => 39,
                'title' => 'CANCEL',
                'source_text' => 'cancel_text',
                'translation_text' => 'ANNULEREN',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            39 =>
            array (
                'id' => 40,
                'title' => 'SAVE',
                'source_text' => 'save_text',
                'translation_text' => 'OPSLAAN',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            40 =>
            array (
                'id' => 41,
                'title' => 'Select Color',
                'source_text' => 'select_color_text',
                'translation_text' => 'Selecteer kleur',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            41 =>
            array (
                'id' => 42,
                'title' => 'New Type',
                'source_text' => 'new_type_text',
                'translation_text' => 'Nieuw type',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            42 =>
            array (
                'id' => 43,
                'title' => 'Type List',
                'source_text' => 'type_list_text',
                'translation_text' => 'Type Lijst',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-09-05 12:39:42',
            ),
            43 =>
            array (
                'id' => 44,
                'title' => 'Scheduling Assistant',
                'source_text' => 'scheduling_assistant_text',
                'translation_text' => 'Planningsassistent',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            44 =>
            array (
                'id' => 45,
                'title' => 'Select Patient',
                'source_text' => 'select_patient_text',
                'translation_text' => 'Zoek patiënt',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            45 =>
            array (
                'id' => 46,
                'title' => 'Patient Name',
                'source_text' => 'patient_name_text',
                'translation_text' => 'Patient naam',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            46 =>
            array (
                'id' => 47,
                'title' => 'Main Doctor',
                'source_text' => 'main_doctor_text',
                'translation_text' => 'hoofddokter',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            47 =>
            array (
                'id' => 48,
                'title' => 'Select Treatment',
                'source_text' => 'select_treament_text',
                'translation_text' => 'Selecteer behandeling',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            48 =>
            array (
                'id' => 49,
                'title' => 'Select Type',
                'source_text' => 'select_type_text',
                'translation_text' => 'Selecteer type',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            49 =>
            array (
                'id' => 50,
                'title' => 'Add Required Doctors',
                'source_text' => 'add_required_doctor_text',
                'translation_text' => 'Vereiste artsen toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            50 =>
            array (
                'id' => 51,
                'title' => 'Required Doctors',
                'source_text' => 'required_doctor_text',
                'translation_text' => 'Vereiste artsen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            51 =>
            array (
                'id' => 52,
                'title' => 'Doctor Not Found',
                'source_text' => 'doctor_not_found_text',
                'translation_text' => 'Dokter niet gevonden',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            52 =>
            array (
                'id' => 53,
                'title' => 'Procedures',
                'source_text' => 'procedures_text',
                'translation_text' => 'Procedures',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            53 =>
            array (
                'id' => 54,
                'title' => 'Add Other Attendees',
                'source_text' => 'add_other_attendees_text',
                'translation_text' => 'Andere deelnemers toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            54 =>
            array (
                'id' => 55,
                'title' => 'No Results Found',
                'source_text' => 'no_results_found_text',
                'translation_text' => 'Geen resultaten gevonden',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            55 =>
            array (
                'id' => 56,
                'title' => 'Cancel Attendees',
                'source_text' => 'cancel_attendees_text',
                'translation_text' => 'Deelnemers verwijderen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-09-05 12:38:49',
            ),
            56 =>
            array (
                'id' => 57,
                'title' => 'Other Attendees',
                'source_text' => 'other_attendees_text',
                'translation_text' => 'Andere deelnemers',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            57 =>
            array (
                'id' => 58,
                'title' => 'Apply slot filters',
                'source_text' => 'apply_slot_filters_text',
                'translation_text' => 'Slotfilters toepassen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            58 =>
            array (
                'id' => 59,
                'title' => 'clear slot filters',
                'source_text' => 'clear_slot_filters_text',
                'translation_text' => 'filters wissen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-09-02 12:18:46',
            ),
            59 =>
            array (
                'id' => 60,
                'title' => 'Frequency',
                'source_text' => 'frequency_text',
                'translation_text' => 'Frequentie',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            60 =>
            array (
                'id' => 61,
                'title' => 'Set Frequency',
                'source_text' => 'set_frequency_text',
                'translation_text' => 'Frequentie instellen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            61 =>
            array (
                'id' => 62,
                'title' => 'This field is required',
                'source_text' => 'required_field_text',
                'translation_text' => 'dit veld is verplicht',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            62 =>
            array (
                'id' => 63,
                'title' => 'Doctor Available Days',
                'source_text' => 'doctor_available_days_text',
                'translation_text' => 'Dokter Beschikbare Dagen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            63 =>
            array (
                'id' => 64,
                'title' => 'Period',
                'source_text' => 'period_text',
                'translation_text' => 'Periode',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            64 =>
            array (
                'id' => 65,
                'title' => 'Start Time',
                'source_text' => 'start_time_text',
                'translation_text' => 'Starttijd',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            65 =>
            array (
                'id' => 66,
                'title' => 'Start',
                'source_text' => 'start_text',
                'translation_text' => 'Begin',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            66 =>
            array (
                'id' => 67,
                'title' => 'End',
                'source_text' => 'end_text',
                'translation_text' => 'Einde',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            67 =>
            array (
                'id' => 68,
                'title' => 'End Time',
                'source_text' => 'end_time_text',
                'translation_text' => 'Eindtijd',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            68 =>
            array (
                'id' => 69,
                'title' => 'Start Date',
                'source_text' => 'start_date_text',
                'translation_text' => 'Startdatum',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            69 =>
            array (
                'id' => 70,
                'title' => 'End Date',
                'source_text' => 'end_date_text',
                'translation_text' => 'Einddatum',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            70 =>
            array (
                'id' => 71,
                'title' => 'Select End Date',
                'source_text' => 'select_end_date_text',
                'translation_text' => 'Selecteer Einddatum',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            71 =>
            array (
                'id' => 72,
                'title' => 'Does not repeat',
                'source_text' => 'does_not_repeat_text',
                'translation_text' => 'herhaalt niet',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            72 =>
            array (
                'id' => 73,
                'title' => 'Every',
                'source_text' => 'every_text',
                'translation_text' => 'Ieder',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-09-06 15:23:51',
            ),
            73 =>
            array (
                'id' => 74,
                'title' => 'No patient found',
                'source_text' => 'no_patient_found_text',
                'translation_text' => 'Geen patiënt gevonden',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            74 =>
            array (
                'id' => 75,
                'title' => 'Expected material',
                'source_text' => 'expected_material_text',
                'translation_text' => 'Verwacht materiaal',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            75 =>
            array (
                'id' => 76,
                'title' => 'Expected Date',
                'source_text' => 'expected_date_text',
                'translation_text' => 'Verwachte datum',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            76 =>
            array (
                'id' => 77,
            'title' => 'Technical Work (TW)',
                'source_text' => 'technical_work_text',
            'translation_text' => 'Technisch Werk (TW)',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            77 =>
            array (
                'id' => 78,
                'title' => 'Required Doctors',
                'source_text' => 'required_doctors_text',
                'translation_text' => 'Vereiste artsen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            78 =>
            array (
                'id' => 79,
                'title' => 'Event Title',
                'source_text' => 'event_title_text',
                'translation_text' => 'Titel van het evenement',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            79 =>
            array (
                'id' => 80,
                'title' => 'Title',
                'source_text' => 'title_text',
                'translation_text' => 'Titel',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            80 =>
            array (
                'id' => 81,
                'title' => 'Enter Code',
                'source_text' => 'event_code_text',
                'translation_text' => 'Voer code in',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            81 =>
            array (
                'id' => 82,
                'title' => 'Event Code',
                'source_text' => 'event_code_text',
                'translation_text' => 'Voer code in',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            82 =>
            array (
                'id' => 83,
                'title' => 'Select Duration',
                'source_text' => 'select_duration_text',
                'translation_text' => 'Selecteer Duur',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            83 =>
            array (
                'id' => 84,
                'title' => 'Contact name',
                'source_text' => 'contact_name_text',
                'translation_text' => 'Contactnaam',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            84 =>
            array (
                'id' => 85,
                'title' => 'Phone Number',
                'source_text' => 'phone_number_text',
                'translation_text' => 'Telefoonnummer',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            85 =>
            array (
                'id' => 86,
                'title' => 'Email Address',
                'source_text' => 'email_address_text',
                'translation_text' => 'E-mailadres',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            86 =>
            array (
                'id' => 87,
                'title' => 'Physical Address',
                'source_text' => 'physical_address_text',
                'translation_text' => 'Feitelijk adres',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-09-02 12:14:58',
            ),
            87 =>
            array (
                'id' => 88,
                'title' => 'Name',
                'source_text' => 'name_text',
                'translation_text' => 'Naam',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            88 =>
            array (
                'id' => 89,
                'title' => 'Select Start time',
                'source_text' => 'select_start_time_text',
                'translation_text' => 'Selecteer Starttijd',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            89 =>
            array (
                'id' => 90,
                'title' => 'Set Recurrence',
                'source_text' => 'set_recurrence_text',
                'translation_text' => 'Herhaling instellen',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            90 =>
            array (
                'id' => 91,
                'title' => 'On',
                'source_text' => 'on_text',
                'translation_text' => 'Aan',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            91 =>
            array (
                'id' => 92,
                'title' => 'Monday',
                'source_text' => 'monday_text',
                'translation_text' => 'Maandag',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            92 =>
            array (
                'id' => 93,
                'title' => 'Third',
                'source_text' => 'third_text',
                'translation_text' => 'Derde',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            93 =>
            array (
                'id' => 94,
                'title' => 'On the',
                'source_text' => 'on_the_text',
                'translation_text' => 'op de',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            94 =>
            array (
                'id' => 95,
            'title' => 'Technical Work (TW)',
                'source_text' => 'technical_work_text',
            'translation_text' => 'Technisch Werk (TW)',
                'lang' => 'nl',
                'created_at' => '2022-08-16 13:52:15',
                'updated_at' => '2022-08-16 13:52:15',
            ),
            95 =>
            array (
                'id' => 96,
                'title' => 'Translation',
                'source_text' => 'translation_text',
                'translation_text' => 'Vertaling',
                'lang' => 'nl',
                'created_at' => '2022-08-25 08:43:00',
                'updated_at' => '2022-08-25 08:43:00',
            ),
            96 =>
            array (
                'id' => 97,
                'title' => 'Care Plan',
                'source_text' => 'careplan_text',
                'translation_text' => 'Zorg Plan',
                'lang' => 'nl',
                'created_at' => '2022-08-25 12:55:00',
                'updated_at' => '2022-08-25 12:55:00',
            ),
            97 =>
            array (
                'id' => 98,
                'title' => 'Perio',
                'source_text' => 'perio_text',
                'translation_text' => 'Periode',
                'lang' => 'nl',
                'created_at' => '2022-08-25 12:57:32',
                'updated_at' => '2022-08-25 12:57:32',
            ),
            98 =>
            array (
                'id' => 99,
                'title' => 'Imaging',
                'source_text' => 'imaging_text',
                'translation_text' => 'Beelden',
                'lang' => 'nl',
                'created_at' => '2022-08-25 12:58:38',
                'updated_at' => '2022-09-03 09:53:05',
            ),
            99 =>
            array (
                'id' => 100,
                'title' => 'History',
                'source_text' => 'history_text',
                'translation_text' => 'Historie',
                'lang' => 'nl',
                'created_at' => '2022-08-25 12:59:46',
                'updated_at' => '2022-09-03 10:23:30',
            ),
            100 =>
            array (
                'id' => 101,
                'title' => 'Billing',
                'source_text' => 'billing_text',
                'translation_text' => 'Facturering',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:00:50',
                'updated_at' => '2022-08-25 13:00:50',
            ),
            101 =>
            array (
                'id' => 102,
                'title' => 'TreatmentPlan',
                'source_text' => 'treatmentplan_text',
                'translation_text' => 'Behandel Plan',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:01:36',
                'updated_at' => '2022-08-25 13:01:36',
            ),
            102 =>
            array (
                'id' => 103,
                'title' => 'Chart',
                'source_text' => 'chart_text',
                'translation_text' => 'Grafiek',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:03:19',
                'updated_at' => '2022-08-25 13:03:19',
            ),
            103 =>
            array (
                'id' => 104,
                'title' => 'My Tasks',
                'source_text' => 'my_tasks_text',
                'translation_text' => 'Mijn taken',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:06:22',
                'updated_at' => '2022-08-25 13:06:22',
            ),
            104 =>
            array (
                'id' => 105,
                'title' => 'My Dashboard',
                'source_text' => 'my_dashboard_text',
                'translation_text' => 'MIJN DASHBOARD',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:07:29',
                'updated_at' => '2022-08-25 13:07:29',
            ),
            105 =>
            array (
                'id' => 106,
                'title' => 'Waiting time',
                'source_text' => 'waiting_time_text',
                'translation_text' => 'Wachttijd',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:40:51',
                'updated_at' => '2022-08-25 13:40:51',
            ),
            106 =>
            array (
                'id' => 107,
                'title' => 'Checkin time',
                'source_text' => 'checkin_time_text',
                'translation_text' => 'Inchecktijd',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:42:17',
                'updated_at' => '2022-08-25 13:42:17',
            ),
            107 =>
            array (
                'id' => 108,
                'title' => 'Reason',
                'source_text' => 'reason_text',
                'translation_text' => 'Reden',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:43:25',
                'updated_at' => '2022-08-25 13:43:25',
            ),
            108 =>
            array (
                'id' => 109,
                'title' => 'Patient Checked In',
                'source_text' => 'patient_checked_in',
                'translation_text' => 'Patiënt ingecheckt',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:47:51',
                'updated_at' => '2022-08-25 13:47:51',
            ),
            109 =>
            array (
                'id' => 110,
                'title' => 'Serving begun',
                'source_text' => 'serving_begun_text',
                'translation_text' => 'Behandeling begonnen',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:48:56',
                'updated_at' => '2022-09-02 12:18:06',
            ),
            110 =>
            array (
                'id' => 111,
                'title' => 'Timeline',
                'source_text' => 'timeline_text',
                'translation_text' => 'Tijdslijn',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:49:50',
                'updated_at' => '2022-09-05 12:41:09',
            ),
            111 =>
            array (
                'id' => 112,
                'title' => 'For',
                'source_text' => 'for_text',
                'translation_text' => 'voor',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:52:46',
                'updated_at' => '2022-08-25 13:52:46',
            ),
            112 =>
            array (
                'id' => 113,
                'title' => 'Serving',
                'source_text' => 'serving_text',
                'translation_text' => 'Behandeling',
                'lang' => 'nl',
                'created_at' => '2022-08-25 13:55:10',
                'updated_at' => '2022-09-05 12:43:29',
            ),
            113 =>
            array (
                'id' => 114,
                'title' => 'Finish',
                'source_text' => 'finish_text',
                'translation_text' => 'Af hebben',
                'lang' => 'nl',
                'created_at' => '2022-08-25 14:22:55',
                'updated_at' => '2022-08-25 14:22:55',
            ),
            114 =>
            array (
                'id' => 115,
                'title' => 'Return to Queue',
                'source_text' => 'return_to_queue',
                'translation_text' => 'terug naar wachtrij',
                'lang' => 'nl',
                'created_at' => '2022-08-25 14:24:09',
                'updated_at' => '2022-08-25 14:24:09',
            ),
            115 =>
            array (
                'id' => 116,
                'title' => 'Audio switched off',
                'source_text' => 'audio_switched_off_text',
                'translation_text' => 'Audio uitgeschakeld',
                'lang' => 'nl',
                'created_at' => '2022-08-25 14:27:54',
                'updated_at' => '2022-08-25 14:27:54',
            ),
            116 =>
            array (
                'id' => 117,
                'title' => 'Ready to receive command',
                'source_text' => 'ready_to_receive_command_text',
                'translation_text' => 'Klaar voor bevel',
                'lang' => 'nl',
                'created_at' => '2022-08-25 14:29:27',
                'updated_at' => '2022-09-05 12:44:14',
            ),
            117 =>
            array (
                'id' => 118,
                'title' => 'General',
                'source_text' => 'general_text',
                'translation_text' => 'Algemeen',
                'lang' => 'nl',
                'created_at' => '2022-08-25 14:31:10',
                'updated_at' => '2022-08-25 14:31:10',
            ),
            118 =>
            array (
                'id' => 119,
                'title' => 'Schedule',
                'source_text' => 'schedule_text',
                'translation_text' => 'Schema',
                'lang' => 'nl',
                'created_at' => '2022-08-25 14:36:50',
                'updated_at' => '2022-08-25 14:36:50',
            ),
            119 =>
            array (
                'id' => 120,
                'title' => 'Waiting Room',
                'source_text' => 'waiting_room_text',
                'translation_text' => 'Wachtkamer',
                'lang' => 'nl',
                'created_at' => '2022-08-25 14:38:15',
                'updated_at' => '2022-08-25 14:38:15',
            ),
            120 =>
            array (
                'id' => 121,
                'title' => 'Activity',
                'source_text' => 'activity_text',
                'translation_text' => 'Werkzaamheid',
                'lang' => 'nl',
                'created_at' => '2022-08-25 14:49:33',
                'updated_at' => '2022-08-25 14:49:33',
            ),
            121 =>
            array (
                'id' => 122,
                'title' => 'Time',
                'source_text' => 'time_text',
                'translation_text' => 'Tijd',
                'lang' => 'nl',
                'created_at' => '2022-08-25 14:55:09',
                'updated_at' => '2022-08-25 14:55:09',
            ),
            122 =>
            array (
                'id' => 123,
                'title' => 'Call Next',
                'source_text' => 'call_next',
                'translation_text' => 'Bel volgende',
                'lang' => 'nl',
                'created_at' => '2022-08-25 15:06:22',
                'updated_at' => '2022-08-25 15:06:22',
            ),
            123 =>
            array (
                'id' => 124,
                'title' => 'Slots',
                'source_text' => 'slots_text',
                'translation_text' => 'afspraak',
                'lang' => 'nl',
                'created_at' => '2022-08-25 15:26:54',
                'updated_at' => '2022-09-05 16:19:08',
            ),
            124 =>
            array (
                'id' => 125,
                'title' => 'Today',
                'source_text' => 'today_text',
                'translation_text' => 'Vandaag',
                'lang' => 'nl',
                'created_at' => '2022-08-26 05:01:17',
                'updated_at' => '2022-08-30 13:14:53',
            ),
            125 =>
            array (
                'id' => 127,
                'title' => 'Patient Appointment',
                'source_text' => 'patient_appointment_text',
                'translation_text' => 'patiënt afspraak',
                'lang' => 'nl',
                'created_at' => '2022-08-26 05:29:35',
                'updated_at' => '2022-08-26 05:29:35',
            ),
            126 =>
            array (
                'id' => 128,
                'title' => 'Cancel Occurrence',
                'source_text' => 'cancel_occurrence_text',
                'translation_text' => 'Annuleer gebeurtenis',
                'lang' => 'nl',
                'created_at' => '2022-08-26 05:57:56',
                'updated_at' => '2022-08-26 05:57:56',
            ),
            127 =>
            array (
                'id' => 129,
                'title' => 'Cancel series',
                'source_text' => 'cancel_series_text',
                'translation_text' => 'Serie annuleren',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:09:26',
                'updated_at' => '2022-08-26 07:09:26',
            ),
            128 =>
            array (
                'id' => 130,
                'title' => 'Archiving',
                'source_text' => 'archiving_text',
                'translation_text' => 'Archiveren',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:10:41',
                'updated_at' => '2022-08-26 07:10:41',
            ),
            129 =>
            array (
                'id' => 131,
                'title' => 'RESTORATION',
                'source_text' => 'restoration_text',
                'translation_text' => 'RESTAURATIE',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:24:14',
                'updated_at' => '2022-08-26 07:24:14',
            ),
            130 =>
            array (
                'id' => 132,
                'title' => 'PATHOLOGY',
                'source_text' => 'pathology_text',
                'translation_text' => 'PATHOLOGIE',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:27:11',
                'updated_at' => '2022-08-26 07:27:11',
            ),
            131 =>
            array (
                'id' => 133,
                'title' => 'MISSING',
                'source_text' => 'missing_text',
                'translation_text' => 'MIST',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:28:18',
                'updated_at' => '2022-09-05 12:36:29',
            ),
            132 =>
            array (
                'id' => 134,
                'title' => 'PLANNED',
                'source_text' => 'planned_text',
                'translation_text' => 'GEPLAND',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:31:31',
                'updated_at' => '2022-08-26 07:31:31',
            ),
            133 =>
            array (
                'id' => 135,
                'title' => 'BACK',
                'source_text' => 'back_text',
                'translation_text' => 'TERUG',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:36:35',
                'updated_at' => '2022-09-02 12:13:04',
            ),
            134 =>
            array (
                'id' => 136,
                'title' => 'Series',
                'source_text' => 'series_text',
                'translation_text' => 'serie',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:37:46',
                'updated_at' => '2022-08-26 07:37:46',
            ),
            135 =>
            array (
                'id' => 137,
                'title' => 'Tooth Selectable Surfaces',
                'source_text' => 'tooth_selectable_surfaces_text',
                'translation_text' => 'Tand Selecteerbare Oppervlakken',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:40:39',
                'updated_at' => '2022-08-26 07:40:39',
            ),
            136 =>
            array (
                'id' => 138,
                'title' => 'You must select a restoration procedure to activate tooth surfaces and proceed with tooth surface selection',
                'source_text' => 'proceed_restoration_text',
                'translation_text' => 'U moet een restauratie procedure selecteren om tand oppervlakken te activeren en doorgaan met de selectie van tandoppervlak',
                'lang' => 'en',
                'created_at' => '2022-08-26 07:45:59',
                'updated_at' => '2022-08-26 07:45:59',
            ),
            137 =>
            array (
                'id' => 139,
                'title' => 'Selectable Restoration Procedures',
                'source_text' => 'selectable_restoration_procedures_text',
                'translation_text' => 'Selecteerbare Restauratie Procedures',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:49:43',
                'updated_at' => '2022-09-06 13:58:50',
            ),
            138 =>
            array (
                'id' => 140,
                'title' => 'Cost',
                'source_text' => 'cost_text',
                'translation_text' => 'Kosten',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:53:48',
                'updated_at' => '2022-08-26 07:53:48',
            ),
            139 =>
            array (
                'id' => 141,
                'title' => 'Technical',
                'source_text' => 'technical_text',
                'translation_text' => 'Technisch',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:55:37',
                'updated_at' => '2022-08-26 07:55:37',
            ),
            140 =>
            array (
                'id' => 142,
                'title' => 'Total',
                'source_text' => 'total_text',
                'translation_text' => 'Totaal',
                'lang' => 'nl',
                'created_at' => '2022-08-26 07:56:29',
                'updated_at' => '2022-08-26 07:56:29',
            ),
            141 =>
            array (
                'id' => 143,
                'title' => 'Pathology Diagnosis',
                'source_text' => 'pathology_diagnoses_text',
                'translation_text' => 'Pathologie Diagnose',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:11:59',
                'updated_at' => '2022-08-26 08:11:59',
            ),
            142 =>
            array (
                'id' => 144,
                'title' => 'Occurrence',
                'source_text' => 'occurrence_text',
                'translation_text' => 'voorval',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:12:15',
                'updated_at' => '2022-08-26 08:12:15',
            ),
            143 =>
            array (
                'id' => 145,
                'title' => 'department',
                'source_text' => 'department_text',
                'translation_text' => 'afdeling',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:13:14',
                'updated_at' => '2022-08-26 08:13:14',
            ),
            144 =>
            array (
                'id' => 146,
                'title' => 'Question',
                'source_text' => 'question_text',
                'translation_text' => 'Vraag',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:33:12',
                'updated_at' => '2022-08-26 08:33:12',
            ),
            145 =>
            array (
                'id' => 147,
                'title' => 'Answers',
                'source_text' => 'answers_text',
                'translation_text' => 'Antwoorden',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:34:28',
                'updated_at' => '2022-08-26 08:34:28',
            ),
            146 =>
            array (
                'id' => 148,
                'title' => 'Patient has No Care Plan',
                'source_text' => 'patient_no_careplan_text',
                'translation_text' => 'Patiënt heeft geen zorgplan',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:36:57',
                'updated_at' => '2022-08-26 08:36:57',
            ),
            147 =>
            array (
                'id' => 149,
                'title' => 'Start New Care Plan',
                'source_text' => 'new_care_plan_text',
                'translation_text' => 'Nieuw Zorg Plan',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:40:22',
                'updated_at' => '2022-08-26 08:40:22',
            ),
            148 =>
            array (
                'id' => 150,
                'title' => 'Dates',
                'source_text' => 'dates_text',
                'translation_text' => 'Data',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:41:53',
                'updated_at' => '2022-09-05 12:33:34',
            ),
            149 =>
            array (
                'id' => 151,
                'title' => 'Goal',
                'source_text' => 'goal_text',
                'translation_text' => 'Doel',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:44:33',
                'updated_at' => '2022-08-26 08:44:33',
            ),
            150 =>
            array (
                'id' => 152,
                'title' => 'Care',
                'source_text' => 'care_text',
                'translation_text' => 'Zorg',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:45:00',
                'updated_at' => '2022-08-26 08:45:00',
            ),
            151 =>
            array (
                'id' => 153,
                'title' => 'Caries',
                'source_text' => 'caries_text',
                'translation_text' => 'Cariës',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:46:21',
                'updated_at' => '2022-08-26 08:46:21',
            ),
            152 =>
            array (
                'id' => 154,
                'title' => 'Risk',
                'source_text' => 'risk_text',
                'translation_text' => 'Risico',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:47:18',
                'updated_at' => '2022-08-26 08:47:18',
            ),
            153 =>
            array (
                'id' => 155,
                'title' => 'Periodontal',
                'source_text' => 'periodontal_text',
                'translation_text' => 'Parodontaal',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:49:56',
                'updated_at' => '2022-08-26 08:49:56',
            ),
            154 =>
            array (
                'id' => 156,
                'title' => 'Score',
                'source_text' => 'score_text',
                'translation_text' => 'Uitslag',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:50:58',
                'updated_at' => '2022-09-05 12:56:28',
            ),
            155 =>
            array (
                'id' => 157,
                'title' => 'Bleeding',
                'source_text' => 'bleeding_text',
                'translation_text' => 'Bloeden',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:52:34',
                'updated_at' => '2022-08-26 08:52:34',
            ),
            156 =>
            array (
                'id' => 158,
                'title' => 'Wear',
                'source_text' => 'wear_text',
                'translation_text' => 'Dragen',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:53:43',
                'updated_at' => '2022-08-26 08:53:43',
            ),
            157 =>
            array (
                'id' => 159,
                'title' => 'Soft Tissue',
                'source_text' => 'soft_tissue_text',
                'translation_text' => 'Zacht Weefsel',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:55:15',
                'updated_at' => '2022-08-26 08:55:15',
            ),
            158 =>
            array (
                'id' => 160,
                'title' => 'Medical',
                'source_text' => 'medical_text',
                'translation_text' => 'Medisch',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:56:26',
                'updated_at' => '2022-08-26 08:56:26',
            ),
            159 =>
            array (
                'id' => 161,
                'title' => 'Hygiene',
                'source_text' => 'hygiene_text',
                'translation_text' => 'Hygiëne',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:58:00',
                'updated_at' => '2022-08-26 08:58:00',
            ),
            160 =>
            array (
                'id' => 162,
                'title' => 'Mouth',
                'source_text' => 'mouth_tex',
                'translation_text' => 'Mond',
                'lang' => 'nl',
                'created_at' => '2022-08-26 08:58:38',
                'updated_at' => '2022-08-26 08:58:38',
            ),
            161 =>
            array (
                'id' => 163,
                'title' => 'High',
                'source_text' => 'high_text',
                'translation_text' => 'Hoog',
                'lang' => 'nl',
                'created_at' => '2022-08-26 09:00:33',
                'updated_at' => '2022-08-26 09:00:33',
            ),
            162 =>
            array (
                'id' => 164,
                'title' => 'Low',
                'source_text' => 'low_text',
                'translation_text' => 'Laag',
                'lang' => 'nl',
                'created_at' => '2022-08-26 09:01:56',
                'updated_at' => '2022-08-26 09:01:56',
            ),
            163 =>
            array (
                'id' => 165,
                'title' => 'Poor',
                'source_text' => 'poor_text',
                'translation_text' => 'Arm',
                'lang' => 'nl',
                'created_at' => '2022-08-26 09:04:30',
                'updated_at' => '2022-08-26 09:04:30',
            ),
            164 =>
            array (
                'id' => 166,
                'title' => 'Normal',
                'source_text' => 'normal_text',
                'translation_text' => 'Normaal',
                'lang' => 'nl',
                'created_at' => '2022-08-26 09:05:31',
                'updated_at' => '2022-08-26 09:05:31',
            ),
            165 =>
            array (
                'id' => 167,
                'title' => 'Good',
                'source_text' => 'good_text',
                'translation_text' => 'Goed',
                'lang' => 'nl',
                'created_at' => '2022-08-26 09:06:17',
                'updated_at' => '2022-09-05 12:37:27',
            ),
            166 =>
            array (
                'id' => 168,
                'title' => 'New',
                'source_text' => 'new_text',
                'translation_text' => 'Nieuw',
                'lang' => 'nl',
                'created_at' => '2022-08-26 09:15:18',
                'updated_at' => '2022-09-07 11:27:09',
            ),
            167 =>
            array (
                'id' => 169,
                'title' => 'COPY',
                'source_text' => 'copy_text',
                'translation_text' => 'KOPIËREN',
                'lang' => 'nl',
                'created_at' => '2022-08-26 09:16:10',
                'updated_at' => '2022-08-26 09:16:10',
            ),
            168 =>
            array (
                'id' => 170,
                'title' => 'PRINT',
                'source_text' => 'print_text',
                'translation_text' => 'AFDRUKKEN',
                'lang' => 'nl',
                'created_at' => '2022-08-26 09:17:06',
                'updated_at' => '2022-08-26 09:17:06',
            ),
            169 =>
            array (
                'id' => 171,
                'title' => 'Price',
                'source_text' => 'price_text',
                'translation_text' => 'Prijs',
                'lang' => 'nl',
                'created_at' => '2022-08-26 09:37:31',
                'updated_at' => '2022-08-26 09:37:31',
            ),
            170 =>
            array (
                'id' => 172,
                'title' => 'Description',
                'source_text' => 'description_text',
                'translation_text' => 'Beschrijving',
                'lang' => 'nl',
                'created_at' => '2022-08-26 10:00:38',
                'updated_at' => '2022-08-26 10:00:38',
            ),
            171 =>
            array (
                'id' => 173,
                'title' => 'Patient has No Treatment Plan',
                'source_text' => 'no_treatment_plan',
                'translation_text' => 'Patiënt heeft Geen Behandel Plan',
                'lang' => 'nl',
                'created_at' => '2022-08-26 10:02:50',
                'updated_at' => '2022-08-26 10:02:50',
            ),
            172 =>
            array (
                'id' => 174,
                'title' => 'CONFIRM',
                'source_text' => 'confirm_text',
                'translation_text' => 'BEVESTIGEN',
                'lang' => 'nl',
                'created_at' => '2022-08-26 11:36:09',
                'updated_at' => '2022-08-26 11:36:09',
            ),
            173 =>
            array (
                'id' => 175,
                'title' => 'New Treatment Plan',
                'source_text' => 'new_treatment_plan_text',
                'translation_text' => 'Nieuw Behandel Plan',
                'lang' => 'nl',
                'created_at' => '2022-08-26 11:37:52',
                'updated_at' => '2022-08-26 11:37:52',
            ),
            174 =>
            array (
                'id' => 176,
                'title' => 'Enter',
                'source_text' => 'enter_text',
                'translation_text' => 'Binnenkomen',
                'lang' => 'nl',
                'created_at' => '2022-08-26 11:53:57',
                'updated_at' => '2022-08-26 11:53:57',
            ),
            175 =>
            array (
                'id' => 177,
                'title' => 'Date',
                'source_text' => 'date_text',
                'translation_text' => 'Datum',
                'lang' => 'nl',
                'created_at' => '2022-08-26 12:09:24',
                'updated_at' => '2022-08-26 12:09:24',
            ),
            176 =>
            array (
                'id' => 178,
                'title' => 'No Recorded General Remarks',
                'source_text' => 'general_remarks_text',
                'translation_text' => 'Geen algemene opmerkingen',
                'lang' => 'nl',
                'created_at' => '2022-08-26 12:12:59',
                'updated_at' => '2022-09-02 12:17:26',
            ),
            177 =>
            array (
                'id' => 179,
                'title' => 'Sign in',
                'source_text' => 'sign_in_txt',
                'translation_text' => 'Log in',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:00:56',
                'updated_at' => '2022-08-29 08:00:56',
            ),
            178 =>
            array (
                'id' => 180,
                'title' => 'Password',
                'source_text' => 'password_txt',
                'translation_text' => 'Wachtwoord',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:03:16',
                'updated_at' => '2022-08-29 08:03:16',
            ),
            179 =>
            array (
                'id' => 181,
                'title' => 'Email',
                'source_text' => 'email_txt',
                'translation_text' => 'E-mail',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:04:01',
                'updated_at' => '2022-08-29 08:04:01',
            ),
            180 =>
            array (
                'id' => 182,
                'title' => 'Forgot Password?',
                'source_text' => 'forgot_password_txt',
                'translation_text' => 'Wachtwoord vergeten?',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:05:26',
                'updated_at' => '2022-08-29 08:05:26',
            ),
            181 =>
            array (
                'id' => 183,
                'title' => 'Remember me',
                'source_text' => 'remember_txt',
                'translation_text' => 'Onthoud mij',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:07:14',
                'updated_at' => '2022-08-29 08:07:14',
            ),
            182 =>
            array (
                'id' => 184,
                'title' => 'Don\'t have an account?',
                'source_text' => 'dont_have_an_account_txt',
                'translation_text' => 'Heb je geen account?',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:10:05',
                'updated_at' => '2022-08-29 08:10:05',
            ),
            183 =>
            array (
                'id' => 185,
                'title' => 'Sign Up',
                'source_text' => 'sign_up_txt',
                'translation_text' => 'Aanmelden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:11:03',
                'updated_at' => '2022-08-29 08:11:03',
            ),
            184 =>
            array (
                'id' => 186,
                'title' => 'By Signing in',
                'source_text' => 'by_signing_in_txt',
                'translation_text' => 'Door in te loggen, gaat u akkoord met onze',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:15:31',
                'updated_at' => '2022-08-29 08:15:31',
            ),
            185 =>
            array (
                'id' => 187,
                'title' => 'Terms and Conditions',
                'source_text' => 'terms_and_conditions_txt',
                'translation_text' => 'Voorwaarden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:16:50',
                'updated_at' => '2022-08-29 08:16:50',
            ),
            186 =>
            array (
                'id' => 188,
                'title' => 'Privacy Policy',
                'source_text' => 'privacy_policy_txt',
                'translation_text' => 'Privacybeleid',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:17:54',
                'updated_at' => '2022-08-29 08:17:54',
            ),
            187 =>
            array (
                'id' => 189,
                'title' => 'Successfully Logged In',
                'source_text' => 'success_login_txt',
                'translation_text' => 'Succesvol ingelogd',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:19:13',
                'updated_at' => '2022-08-29 08:19:13',
            ),
            188 =>
            array (
                'id' => 190,
                'title' => 'Required',
                'source_text' => 'required_text',
                'translation_text' => 'verplicht',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:26:41',
                'updated_at' => '2022-08-29 08:26:41',
            ),
            189 =>
            array (
                'id' => 191,
                'title' => 'First Name',
                'source_text' => 'first_name_text',
                'translation_text' => 'Voornaam',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:31:56',
                'updated_at' => '2022-08-29 08:31:56',
            ),
            190 =>
            array (
                'id' => 192,
                'title' => 'Employees On Leave',
                'source_text' => 'employees_on_leave_text',
                'translation_text' => 'Werknemers met verlof',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:42:37',
                'updated_at' => '2022-08-29 08:42:37',
            ),
            191 =>
            array (
                'id' => 193,
                'title' => 'Absent Employees',
                'source_text' => 'absent_employee_text',
                'translation_text' => 'Afwezige medewerkers',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:44:03',
                'updated_at' => '2022-08-29 08:44:03',
            ),
            192 =>
            array (
                'id' => 194,
                'title' => 'New Recruits',
                'source_text' => 'new_recuits_text',
                'translation_text' => 'Nieuwe recruten',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:45:59',
                'updated_at' => '2022-08-29 08:45:59',
            ),
            193 =>
            array (
                'id' => 195,
                'title' => 'Upcoming Payments',
                'source_text' => 'upcoming_payments_text',
                'translation_text' => 'Aankomende betalingen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:47:00',
                'updated_at' => '2022-08-29 08:47:00',
            ),
            194 =>
            array (
                'id' => 196,
                'title' => 'DASHBOARD',
                'source_text' => 'dashboard_text',
                'translation_text' => 'dashboard',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:51:12',
                'updated_at' => '2022-08-29 08:51:12',
            ),
            195 =>
            array (
                'id' => 197,
                'title' => 'Employees',
                'source_text' => 'employees_text',
                'translation_text' => 'Medewerkers',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:52:29',
                'updated_at' => '2022-08-29 08:52:29',
            ),
            196 =>
            array (
                'id' => 198,
                'title' => 'Leave',
                'source_text' => 'leave_text',
                'translation_text' => 'Vertrekken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 08:55:44',
                'updated_at' => '2022-08-29 08:55:44',
            ),
            197 =>
            array (
                'id' => 199,
                'title' => 'Attendance',
                'source_text' => 'attendance_text',
                'translation_text' => 'Aanwezigheid',
                'lang' => 'nl',
                'created_at' => '2022-08-29 09:00:18',
                'updated_at' => '2022-08-29 09:00:18',
            ),
            198 =>
            array (
                'id' => 200,
                'title' => 'DEPARTMENTS',
                'source_text' => 'departments_text',
                'translation_text' => 'AFDELINGEN',
                'lang' => 'nl',
                'created_at' => '2022-08-29 09:04:21',
                'updated_at' => '2022-08-29 09:04:21',
            ),
            199 =>
            array (
                'id' => 201,
                'title' => 'Jan',
                'source_text' => 'jan_text',
                'translation_text' => 'Jan',
                'lang' => 'nl',
                'created_at' => '2022-08-29 09:22:01',
                'updated_at' => '2022-08-29 09:22:01',
            ),
            200 =>
            array (
                'id' => 202,
                'title' => 'Feb',
                'source_text' => 'feb_text',
                'translation_text' => 'februari',
                'lang' => 'nl',
                'created_at' => '2022-08-29 09:22:54',
                'updated_at' => '2022-08-29 09:22:54',
            ),
            201 =>
            array (
                'id' => 203,
                'title' => 'Mar',
                'source_text' => 'mar_text',
                'translation_text' => 'Mar',
                'lang' => 'nl',
                'created_at' => '2022-08-29 09:30:32',
                'updated_at' => '2022-08-29 09:30:32',
            ),
            202 =>
            array (
                'id' => 204,
                'title' => 'Apr',
                'source_text' => 'apr_text',
                'translation_text' => 'April',
                'lang' => 'nl',
                'created_at' => '2022-08-29 09:31:16',
                'updated_at' => '2022-08-29 09:31:16',
            ),
            203 =>
            array (
                'id' => 205,
                'title' => 'May',
                'source_text' => 'may_text',
                'translation_text' => 'Mei',
                'lang' => 'nl',
                'created_at' => '2022-08-29 09:32:06',
                'updated_at' => '2022-09-02 19:18:39',
            ),
            204 =>
            array (
                'id' => 206,
                'title' => 'Jul',
                'source_text' => 'jul_text',
                'translation_text' => 'juli',
                'lang' => 'nl',
                'created_at' => '2022-08-29 09:36:03',
                'updated_at' => '2022-08-29 09:36:03',
            ),
            205 =>
            array (
                'id' => 207,
                'title' => 'Jun',
                'source_text' => 'jun_text',
                'translation_text' => 'juni',
                'lang' => 'nl',
                'created_at' => '2022-08-29 09:36:58',
                'updated_at' => '2022-08-29 09:36:58',
            ),
            206 =>
            array (
                'id' => 208,
                'title' => 'Aug',
                'source_text' => 'aug_text',
                'translation_text' => 'Aug',
                'lang' => 'nl',
                'created_at' => '2022-08-29 09:43:11',
                'updated_at' => '2022-08-29 09:43:11',
            ),
            207 =>
            array (
                'id' => 209,
                'title' => 'Salary Type',
                'source_text' => 'salary_type_text',
                'translation_text' => 'Salaristype',
                'lang' => 'nl',
                'created_at' => '2022-08-29 10:00:56',
                'updated_at' => '2022-08-29 10:00:56',
            ),
            208 =>
            array (
                'id' => 210,
                'title' => 'Salary Type Name',
                'source_text' => 'salary_type_name_text',
                'translation_text' => 'Naam salaristype',
                'lang' => 'nl',
                'created_at' => '2022-08-29 10:02:52',
                'updated_at' => '2022-08-29 10:02:52',
            ),
            209 =>
            array (
                'id' => 211,
                'title' => 'Employee',
                'source_text' => 'employee_text',
                'translation_text' => 'Medewerker',
                'lang' => 'nl',
                'created_at' => '2022-08-29 10:10:12',
                'updated_at' => '2022-08-29 10:10:12',
            ),
            210 =>
            array (
                'id' => 212,
                'title' => 'Leave type',
                'source_text' => 'leave_type_text',
                'translation_text' => 'soort verlof',
                'lang' => 'nl',
                'created_at' => '2022-08-29 10:11:20',
                'updated_at' => '2022-09-05 12:34:25',
            ),
            211 =>
            array (
                'id' => 213,
                'title' => 'Employees on Leave loading',
                'source_text' => 'employees_on_leave_loading_text',
                'translation_text' => 'Werknemers met verlof aan het laden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:02:19',
                'updated_at' => '2022-08-29 11:02:19',
            ),
            212 =>
            array (
                'id' => 214,
                'title' => 'No Employees on Leave',
                'source_text' => 'no_employees_on_leave_text',
                'translation_text' => 'Geen werknemers met verlof',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:03:18',
                'updated_at' => '2022-08-29 11:03:18',
            ),
            213 =>
            array (
                'id' => 215,
                'title' => 'View All',
                'source_text' => 'view_all_text',
                'translation_text' => 'Bekijk alles',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:04:41',
                'updated_at' => '2022-08-29 11:04:41',
            ),
            214 =>
            array (
                'id' => 216,
                'title' => 'Supervisor',
                'source_text' => 'supervisor_text',
                'translation_text' => 'Leidinggevende',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:05:30',
                'updated_at' => '2022-08-29 11:05:30',
            ),
            215 =>
            array (
                'id' => 217,
                'title' => 'Edit Supervisor',
                'source_text' => 'edit_supervisor_text',
                'translation_text' => 'leidinggevende bewerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:06:28',
                'updated_at' => '2022-09-06 12:50:08',
            ),
            216 =>
            array (
                'id' => 218,
                'title' => 'Supervisor Name',
                'source_text' => 'supervisor_name_text',
                'translation_text' => 'Naam leidinggevende',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:07:35',
                'updated_at' => '2022-09-07 08:44:18',
            ),
            217 =>
            array (
                'id' => 219,
                'title' => 'Close',
                'source_text' => 'close_text',
                'translation_text' => 'Dichtbij',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:08:20',
                'updated_at' => '2022-08-29 11:08:20',
            ),
            218 =>
            array (
                'id' => 220,
                'title' => 'Update Supervisor',
                'source_text' => 'update_supervisor_text',
                'translation_text' => 'Supervisor bijwerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:09:17',
                'updated_at' => '2022-08-29 11:09:17',
            ),
            219 =>
            array (
                'id' => 221,
                'title' => 'add Supervisor',
                'source_text' => 'add_supervisor_text',
                'translation_text' => 'Supervisor toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:10:48',
                'updated_at' => '2022-08-29 11:10:48',
            ),
            220 =>
            array (
                'id' => 222,
                'title' => 'Supervisor Loading',
                'source_text' => 'supervisor_loading_text',
                'translation_text' => 'Leiding gevende word geladen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:13:24',
                'updated_at' => '2022-09-07 08:45:26',
            ),
            221 =>
            array (
                'id' => 223,
                'title' => 'There are no Supervisors',
                'source_text' => 'there_are_no_supervisors_text',
                'translation_text' => 'Er zijn geen leidinggevenden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:16:13',
                'updated_at' => '2022-09-06 12:58:42',
            ),
            222 =>
            array (
                'id' => 224,
                'title' => 'Manage Departments',
                'source_text' => 'manage_departments_text',
                'translation_text' => 'Afdelingen beheren',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:18:03',
                'updated_at' => '2022-08-29 11:18:03',
            ),
            223 =>
            array (
                'id' => 225,
                'title' => 'Add Departments',
                'source_text' => 'add_departments_text',
                'translation_text' => 'Afdelingen toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:20:31',
                'updated_at' => '2022-08-29 11:20:31',
            ),
            224 =>
            array (
                'id' => 226,
                'title' => 'Manage Sub Department',
                'source_text' => 'manage_sub_department_text',
                'translation_text' => 'onderafdeling beheren',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:21:46',
                'updated_at' => '2022-09-07 08:52:00',
            ),
            225 =>
            array (
                'id' => 227,
                'title' => 'Add Sub Department',
                'source_text' => 'add_sub_department_text',
                'translation_text' => 'Onderafdeling toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:22:38',
                'updated_at' => '2022-09-02 08:43:19',
            ),
            226 =>
            array (
                'id' => 228,
                'title' => 'Edit Department',
                'source_text' => 'edit_department_text',
                'translation_text' => 'Afdeling bewerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:23:42',
                'updated_at' => '2022-08-29 11:23:42',
            ),
            227 =>
            array (
                'id' => 229,
                'title' => 'Department Name',
                'source_text' => 'department_name_text',
                'translation_text' => 'Afdelingsnaam',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:24:29',
                'updated_at' => '2022-08-29 11:24:29',
            ),
            228 =>
            array (
                'id' => 230,
                'title' => 'Update Department',
                'source_text' => 'update_department_text',
                'translation_text' => 'Afdeling bijwerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:25:30',
                'updated_at' => '2022-08-29 11:25:30',
            ),
            229 =>
            array (
                'id' => 231,
                'title' => 'Add Department',
                'source_text' => 'add_department_text',
                'translation_text' => 'Afdeling toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:26:43',
                'updated_at' => '2022-08-29 11:26:43',
            ),
            230 =>
            array (
                'id' => 232,
                'title' => 'Department Loading',
                'source_text' => 'department_loading_text',
                'translation_text' => 'Afdeling laden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:27:44',
                'updated_at' => '2022-08-29 11:27:44',
            ),
            231 =>
            array (
                'id' => 233,
                'title' => 'No Departments Available',
                'source_text' => 'no_departments_available_text',
                'translation_text' => 'Geen afdelingen beschikbaar',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:28:44',
                'updated_at' => '2022-08-29 11:28:44',
            ),
            232 =>
            array (
                'id' => 234,
                'title' => 'Sub Departments',
                'source_text' => 'sub_departments_text',
                'translation_text' => 'Subafdelingen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:29:43',
                'updated_at' => '2022-08-29 11:29:43',
            ),
            233 =>
            array (
                'id' => 235,
                'title' => 'Edit Sub Department',
                'source_text' => 'edit_sub_departments_text',
                'translation_text' => 'Subafdeling bewerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:30:38',
                'updated_at' => '2022-08-29 11:30:38',
            ),
            234 =>
            array (
                'id' => 236,
                'title' => 'Sub Department Name',
                'source_text' => 'sub_department_name_text',
                'translation_text' => 'Naam subafdeling',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:32:17',
                'updated_at' => '2022-08-29 11:32:17',
            ),
            235 =>
            array (
                'id' => 237,
                'title' => 'Update Sub Department',
                'source_text' => 'update_sub_department_text',
                'translation_text' => 'Subafdeling bijwerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:33:19',
                'updated_at' => '2022-08-29 11:33:19',
            ),
            236 =>
            array (
                'id' => 238,
                'title' => 'Choose Department',
                'source_text' => 'choose_department_text',
                'translation_text' => 'Kies Afdeling',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:35:57',
                'updated_at' => '2022-08-29 11:35:57',
            ),
            237 =>
            array (
                'id' => 239,
                'title' => 'Sub departments loading',
                'source_text' => 'sub_departments_loading_text',
                'translation_text' => 'onder afdelingen laden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:36:54',
                'updated_at' => '2022-09-07 08:40:51',
            ),
            238 =>
            array (
                'id' => 240,
                'title' => 'No Sub departments',
                'source_text' => 'no_sub_departments_text',
                'translation_text' => 'Geen onderafdelingen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:37:38',
                'updated_at' => '2022-09-06 13:09:02',
            ),
            239 =>
            array (
                'id' => 241,
                'title' => 'Add Attendance times',
                'source_text' => 'add_attendance_times_text',
                'translation_text' => 'Aanwezigheidstijden toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:41:19',
                'updated_at' => '2022-08-29 11:41:19',
            ),
            240 =>
            array (
                'id' => 242,
                'title' => 'Attendance times',
                'source_text' => 'attendance_times_text',
                'translation_text' => 'Aanwezigheidstijden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:43:30',
                'updated_at' => '2022-08-29 11:43:30',
            ),
            241 =>
            array (
                'id' => 243,
                'title' => 'Edit Salary',
                'source_text' => 'edit_salary_text',
                'translation_text' => 'Salaris bewerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:44:20',
                'updated_at' => '2022-08-29 11:44:20',
            ),
            242 =>
            array (
                'id' => 244,
                'title' => 'Attendance time',
                'source_text' => 'attendance_time_text',
                'translation_text' => 'Aankomsttijd',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:45:11',
                'updated_at' => '2022-09-05 12:45:36',
            ),
            243 =>
            array (
                'id' => 245,
                'title' => 'No Salary Types Available',
                'source_text' => 'no_salary_types_available_text',
                'translation_text' => 'Geen salaristypes beschikbaar',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:45:58',
                'updated_at' => '2022-08-29 11:45:58',
            ),
            244 =>
            array (
                'id' => 246,
                'title' => 'Salary Types Loading',
                'source_text' => 'salary_types_loading_text',
                'translation_text' => 'Salaristypes aan het laden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:47:43',
                'updated_at' => '2022-08-29 11:47:43',
            ),
            245 =>
            array (
                'id' => 247,
                'title' => 'Amount',
                'source_text' => 'amount_text',
                'translation_text' => 'Hoeveelheid',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:49:03',
                'updated_at' => '2022-08-29 11:49:03',
            ),
            246 =>
            array (
                'id' => 248,
                'title' => 'Salary Types',
                'source_text' => 'salary_types_text',
                'translation_text' => 'Salarissoorten',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:50:03',
                'updated_at' => '2022-08-29 11:50:03',
            ),
            247 =>
            array (
                'id' => 249,
                'title' => 'Choose Sub Department',
                'source_text' => 'choose_sub_department_text',
                'translation_text' => 'Kies subafdeling',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:51:12',
                'updated_at' => '2022-08-29 11:51:12',
            ),
            248 =>
            array (
                'id' => 250,
                'title' => 'Choose City',
                'source_text' => 'choose_city_text',
                'translation_text' => 'Kies Stad',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:52:25',
                'updated_at' => '2022-08-29 11:52:25',
            ),
            249 =>
            array (
                'id' => 251,
                'title' => 'Update Position',
                'source_text' => 'update_position_text',
                'translation_text' => 'Positie bijwerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 11:54:23',
                'updated_at' => '2022-08-29 11:54:23',
            ),
            250 =>
            array (
                'id' => 252,
                'title' => 'Position Loading',
                'source_text' => 'position_loading_text',
                'translation_text' => 'Positie laden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:00:47',
                'updated_at' => '2022-08-29 12:00:47',
            ),
            251 =>
            array (
                'id' => 253,
                'title' => 'All Employees',
                'source_text' => 'all_employees_text',
                'translation_text' => 'Alle werknemers',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:09:29',
                'updated_at' => '2022-08-29 12:09:29',
            ),
            252 =>
            array (
                'id' => 254,
                'title' => 'Generate',
                'source_text' => 'generate_text',
                'translation_text' => 'Genereren',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:11:27',
                'updated_at' => '2022-08-29 12:11:27',
            ),
            253 =>
            array (
                'id' => 255,
                'title' => 'Choose Employee',
                'source_text' => 'choose_employee_text',
                'translation_text' => 'Kies werknemer',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:12:12',
                'updated_at' => '2022-08-29 12:12:12',
            ),
            254 =>
            array (
                'id' => 256,
                'title' => 'Attendance Between Dates',
                'source_text' => 'attendance_between_dates_text',
                'translation_text' => 'Aanwezigheid tussen data',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:13:01',
                'updated_at' => '2022-08-29 12:13:01',
            ),
            255 =>
            array (
                'id' => 257,
                'title' => 'Attendance History For',
                'source_text' => 'attendance_history_for_text',
                'translation_text' => 'presentie historie voor',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:14:35',
                'updated_at' => '2022-09-06 11:23:44',
            ),
            256 =>
            array (
                'id' => 258,
                'title' => 'checkin',
                'source_text' => 'checkin_text',
                'translation_text' => 'Check in',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:15:40',
                'updated_at' => '2022-08-29 12:15:40',
            ),
            257 =>
            array (
                'id' => 259,
                'title' => 'Full Name',
                'source_text' => 'full_name_text',
                'translation_text' => 'Voor-en achternaam',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:17:10',
                'updated_at' => '2022-08-29 12:17:10',
            ),
            258 =>
            array (
                'id' => 260,
                'title' => 'Details',
                'source_text' => 'details_text',
                'translation_text' => 'Details',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:17:30',
                'updated_at' => '2022-08-29 12:17:30',
            ),
            259 =>
            array (
                'id' => 261,
                'title' => 'All Positions',
                'source_text' => 'all_positions_text',
                'translation_text' => 'Alle posities',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:18:42',
                'updated_at' => '2022-08-29 12:18:42',
            ),
            260 =>
            array (
                'id' => 262,
                'title' => 'Positional Information',
                'source_text' => 'positional_information_text',
                'translation_text' => 'Positionele informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:19:32',
                'updated_at' => '2022-08-29 12:19:32',
            ),
            261 =>
            array (
                'id' => 263,
                'title' => 'Total Time',
                'source_text' => 'Total_time_text',
                'translation_text' => 'Totale tijd',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:19:40',
                'updated_at' => '2022-08-29 12:19:40',
            ),
            262 =>
            array (
                'id' => 264,
                'title' => 'Checkout Time',
                'source_text' => 'checkout_time_text',
                'translation_text' => 'Check-uit tijd',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:20:21',
                'updated_at' => '2022-08-29 12:20:21',
            ),
            263 =>
            array (
                'id' => 265,
                'title' => 'Biographical Information',
                'source_text' => 'biographical_information_text',
                'translation_text' => 'Biografische informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:21:15',
                'updated_at' => '2022-08-29 12:21:15',
            ),
            264 =>
            array (
                'id' => 266,
                'title' => 'Basic Information',
                'source_text' => 'basic_information_text',
                'translation_text' => 'Basis informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:22:29',
                'updated_at' => '2022-08-29 12:22:29',
            ),
            265 =>
            array (
                'id' => 267,
                'title' => 'Checkout',
                'source_text' => 'checkout_text',
                'translation_text' => 'Uitchecken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:22:55',
                'updated_at' => '2022-08-29 12:22:55',
            ),
            266 =>
            array (
                'id' => 268,
                'title' => 'Emergency Contact',
                'source_text' => 'emergency_contact_text',
                'translation_text' => 'noodcontact',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:23:32',
                'updated_at' => '2022-08-29 12:23:32',
            ),
            267 =>
            array (
                'id' => 269,
                'title' => 'Attendance Loading',
                'source_text' => 'attendance_loading_text',
                'translation_text' => 'Aanwezigheid wordt geladen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:23:37',
                'updated_at' => '2022-08-29 12:23:37',
            ),
            268 =>
            array (
                'id' => 270,
                'title' => 'There are no attendance records today',
                'source_text' => 'there_are_no_attendance_records_today_text',
                'translation_text' => 'Er zijn vandaag geen presentielijsten',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:24:22',
                'updated_at' => '2022-08-29 12:24:22',
            ),
            269 =>
            array (
                'id' => 271,
                'title' => 'Upload',
                'source_text' => 'upload_text',
                'translation_text' => 'Laden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:24:50',
                'updated_at' => '2022-09-06 12:16:05',
            ),
            270 =>
            array (
                'id' => 272,
                'title' => 'Choose checkin Time',
                'source_text' => 'choose_checkin_time_text',
                'translation_text' => 'Kies inchecktijd',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:24:54',
                'updated_at' => '2022-08-29 12:24:54',
            ),
            271 =>
            array (
                'id' => 273,
                'title' => 'Save Checkin',
                'source_text' => 'save_checkin_text',
                'translation_text' => 'Opslaan inchecken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:25:44',
                'updated_at' => '2022-08-29 12:25:44',
            ),
            272 =>
            array (
                'id' => 274,
                'title' => 'Update Profile Picture',
                'source_text' => 'update_profile_picture_text',
                'translation_text' => 'Profielfoto bijwerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:26:15',
                'updated_at' => '2022-08-29 12:26:15',
            ),
            273 =>
            array (
                'id' => 275,
                'title' => 'Choose checkout Time',
                'source_text' => 'choose_checkout_time_text',
                'translation_text' => 'Kies tijd einde werk',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:26:17',
                'updated_at' => '2022-09-05 12:49:04',
            ),
            274 =>
            array (
                'id' => 276,
                'title' => 'Password',
                'source_text' => 'password_text',
                'translation_text' => 'wachtwoord',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:27:00',
                'updated_at' => '2022-08-29 12:27:00',
            ),
            275 =>
            array (
                'id' => 277,
                'title' => 'Save Checkout',
                'source_text' => 'save_checkout_text',
                'translation_text' => 'Afrekenen opslaan',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:27:05',
                'updated_at' => '2022-08-29 12:27:05',
            ),
            276 =>
            array (
                'id' => 278,
                'title' => 'Choose Dates',
                'source_text' => 'choose_dates_text',
                'translation_text' => 'Kies data',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:27:36',
                'updated_at' => '2022-08-29 12:27:36',
            ),
            277 =>
            array (
                'id' => 279,
                'title' => 'Username',
                'source_text' => 'username_text',
                'translation_text' => 'gebruikersnaam',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:27:49',
                'updated_at' => '2022-08-29 12:27:49',
            ),
            278 =>
            array (
                'id' => 280,
                'title' => 'Next To Login Info',
                'source_text' => 'next_to_login_info_text',
                'translation_text' => 'Naar inloggegevens',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:28:58',
                'updated_at' => '2022-09-06 12:17:14',
            ),
            279 =>
            array (
                'id' => 281,
                'title' => 'Generate Attendance',
                'source_text' => 'generate_attendance_text',
                'translation_text' => 'Aanwezigheid genereren',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:29:05',
                'updated_at' => '2022-08-29 12:29:05',
            ),
            280 =>
            array (
                'id' => 282,
                'title' => 'Add Attendance Time',
                'source_text' => 'add_attendance_time_text',
                'translation_text' => 'Aanwezigheidstijd toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:29:42',
                'updated_at' => '2022-08-29 12:29:42',
            ),
            281 =>
            array (
                'id' => 283,
                'title' => 'Work Phone',
                'source_text' => 'work_phone_text',
                'translation_text' => 'werktelefoon',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:29:47',
                'updated_at' => '2022-08-29 12:29:47',
            ),
            282 =>
            array (
                'id' => 284,
                'title' => 'Attendance Name',
                'source_text' => 'attendance_name_text',
                'translation_text' => 'Aanwezigheidsnaam:',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:30:13',
                'updated_at' => '2022-08-29 12:30:13',
            ),
            283 =>
            array (
                'id' => 285,
                'title' => 'Home Phone',
                'source_text' => 'home_phone_text',
                'translation_text' => 'huistelefoon',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:30:41',
                'updated_at' => '2022-08-29 12:30:41',
            ),
            284 =>
            array (
                'id' => 286,
                'title' => 'Update Attendance Time',
                'source_text' => 'update_attendance_time_text',
                'translation_text' => 'Aanwezigheidstijd bijwerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:31:07',
                'updated_at' => '2022-08-29 12:31:07',
            ),
            285 =>
            array (
                'id' => 287,
                'title' => 'Address',
                'source_text' => 'address_text',
                'translation_text' => 'adres',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:31:23',
                'updated_at' => '2022-08-29 12:31:23',
            ),
            286 =>
            array (
                'id' => 288,
                'title' => 'Leave Management',
                'source_text' => 'leave_management_text',
                'translation_text' => 'Verlofbeheer',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:31:44',
                'updated_at' => '2022-08-29 12:31:44',
            ),
            287 =>
            array (
                'id' => 289,
                'title' => 'Add More Holiday',
                'source_text' => 'add_more_holiday_text',
                'translation_text' => 'Voeg meer vakantie toe',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:32:57',
                'updated_at' => '2022-08-29 12:32:57',
            ),
            288 =>
            array (
                'id' => 290,
                'title' => 'Next To Emergency Contact',
                'source_text' => 'next_to_emergency_contact_text',
                'translation_text' => 'Naast contact voor noodgevallen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:33:21',
                'updated_at' => '2022-08-29 12:33:21',
            ),
            289 =>
            array (
                'id' => 291,
                'title' => 'Business Phone',
                'source_text' => 'business_phone_text',
                'translation_text' => 'bedrijf\'s telefoon',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:34:09',
                'updated_at' => '2022-08-29 12:34:09',
            ),
            290 =>
            array (
                'id' => 292,
                'title' => 'Add Leave Type',
                'source_text' => 'add_leave_type_text',
                'translation_text' => 'Verloftype toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:34:33',
                'updated_at' => '2022-08-29 12:34:33',
            ),
            291 =>
            array (
                'id' => 293,
                'title' => 'Choose Home Phone',
                'source_text' => 'choose_home_phone_text',
                'translation_text' => 'Kies Thuistelefoon',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:34:57',
                'updated_at' => '2022-08-29 12:34:57',
            ),
            292 =>
            array (
                'id' => 294,
                'title' => 'Leave Application Form',
                'source_text' => 'leave_application_form_text',
                'translation_text' => 'Aanvraagformulier verlaten',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:36:18',
                'updated_at' => '2022-08-29 12:36:18',
            ),
            293 =>
            array (
                'id' => 295,
                'title' => 'Choose Home Email',
                'source_text' => 'choose_home_email_text',
                'translation_text' => 'Kies Thuis-e-mail',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:36:38',
                'updated_at' => '2022-08-29 12:36:38',
            ),
            294 =>
            array (
                'id' => 296,
                'title' => 'Manage Holiday',
                'source_text' => 'manage_holiday_text',
                'translation_text' => 'Vakantie beheren',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:38:46',
                'updated_at' => '2022-08-29 12:38:46',
            ),
            295 =>
            array (
                'id' => 297,
                'title' => 'Manage leave Type',
                'source_text' => 'manage_leave_type_text',
                'translation_text' => 'Verloftype beheren',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:40:06',
                'updated_at' => '2022-08-29 12:40:06',
            ),
            296 =>
            array (
                'id' => 298,
                'title' => 'Leaves Applied',
                'source_text' => 'leaves_applied_text',
                'translation_text' => 'verlof gehad',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:40:46',
                'updated_at' => '2022-09-05 12:55:00',
            ),
            297 =>
            array (
                'id' => 299,
                'title' => 'Number Of Leave Days',
                'source_text' => 'number_of_leave_days_text',
                'translation_text' => 'Aantal verlofdagen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:43:09',
                'updated_at' => '2022-08-29 12:43:09',
            ),
            298 =>
            array (
                'id' => 300,
                'title' => 'Holiday Name',
                'source_text' => 'holiday_name_text',
                'translation_text' => 'Vakantie naam',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:43:59',
                'updated_at' => '2022-08-29 12:43:59',
            ),
            299 =>
            array (
                'id' => 301,
                'title' => 'From',
                'source_text' => 'from_text',
                'translation_text' => 'Van',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:44:33',
                'updated_at' => '2022-08-29 12:44:33',
            ),
            300 =>
            array (
                'id' => 302,
                'title' => 'To',
                'source_text' => 'to_text',
                'translation_text' => 'Tot',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:45:07',
                'updated_at' => '2022-08-29 12:45:07',
            ),
            301 =>
            array (
                'id' => 303,
                'title' => 'Number Of Days Without Weekend',
                'source_text' => 'number_of_days_without_weekend_text',
                'translation_text' => 'Aantal dagen zonder weekend',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:45:47',
                'updated_at' => '2022-08-29 12:45:47',
            ),
            302 =>
            array (
                'id' => 304,
                'title' => 'Add Holiday',
                'source_text' => 'add_holiday_text',
                'translation_text' => 'Vakantie toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:46:37',
                'updated_at' => '2022-08-29 12:46:37',
            ),
            303 =>
            array (
                'id' => 305,
                'title' => 'Apply for a leave',
                'source_text' => 'apply_for_a_leave_text',
                'translation_text' => 'Verlof aanvragen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:47:20',
                'updated_at' => '2022-08-29 12:47:20',
            ),
            304 =>
            array (
                'id' => 306,
                'title' => 'Employee Name',
                'source_text' => 'employee_name_text',
                'translation_text' => 'Naam werknemer',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:47:54',
                'updated_at' => '2022-08-29 12:47:54',
            ),
            305 =>
            array (
                'id' => 307,
                'title' => 'Choose Leave Type',
                'source_text' => 'choose_leave_type_text',
                'translation_text' => 'Kies Verloftype',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:48:40',
                'updated_at' => '2022-08-29 12:48:40',
            ),
            306 =>
            array (
                'id' => 308,
                'title' => 'Day Of Applying',
                'source_text' => 'day_of_applying_text',
                'translation_text' => 'Dag van aanmelding',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:49:48',
                'updated_at' => '2022-08-29 12:49:48',
            ),
            307 =>
            array (
                'id' => 309,
                'title' => 'Choose Day',
                'source_text' => 'choose_day_text',
                'translation_text' => 'Kies dag',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:50:29',
                'updated_at' => '2022-08-29 12:50:29',
            ),
            308 =>
            array (
                'id' => 310,
                'title' => 'Submit Application',
                'source_text' => 'submit_application_text',
                'translation_text' => 'Aanvraag indienen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:51:57',
                'updated_at' => '2022-08-29 12:51:57',
            ),
            309 =>
            array (
                'id' => 311,
                'title' => 'Number Of Days',
                'source_text' => 'number_of_days_text',
                'translation_text' => 'Aantal dagen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:52:27',
                'updated_at' => '2022-08-29 12:52:27',
            ),
            310 =>
            array (
                'id' => 312,
                'title' => 'Leave Holidays loading',
                'source_text' => 'leave_holidays_loading_text',
                'translation_text' => 'Vakantie dagen laden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:52:58',
                'updated_at' => '2022-09-06 12:14:46',
            ),
            311 =>
            array (
                'id' => 313,
                'title' => 'Edit Holiday',
                'source_text' => 'edit_holiday_text',
                'translation_text' => 'Feestdag bewerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:53:29',
                'updated_at' => '2022-08-29 12:53:29',
            ),
            312 =>
            array (
                'id' => 314,
                'title' => 'Update Holiday',
                'source_text' => 'update_holiday_text',
                'translation_text' => 'Vakantie bijwerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:54:03',
                'updated_at' => '2022-08-29 12:54:03',
            ),
            313 =>
            array (
                'id' => 315,
                'title' => 'Applied Day',
                'source_text' => 'applied_day_text',
                'translation_text' => 'Toegepaste dag',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:55:01',
                'updated_at' => '2022-08-29 12:55:01',
            ),
            314 =>
            array (
                'id' => 316,
                'title' => 'Approved By',
                'source_text' => 'approved_by_text',
                'translation_text' => 'Goedgekeurd door',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:55:33',
                'updated_at' => '2022-08-29 12:55:33',
            ),
            315 =>
            array (
                'id' => 317,
                'title' => 'Status',
                'source_text' => 'Status_text',
                'translation_text' => 'Status',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:56:23',
                'updated_at' => '2022-09-07 08:50:55',
            ),
            316 =>
            array (
                'id' => 318,
                'title' => 'Approved',
                'source_text' => 'approved_text',
                'translation_text' => 'Goedgekeurd',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:56:51',
                'updated_at' => '2022-08-29 12:56:51',
            ),
            317 =>
            array (
                'id' => 319,
                'title' => 'Pending',
                'source_text' => 'pending_text',
                'translation_text' => 'In afwachting',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:57:17',
                'updated_at' => '2022-08-29 12:57:17',
            ),
            318 =>
            array (
                'id' => 320,
                'title' => 'Applied Leaves loading',
                'source_text' => 'applied_leaves_loading_text',
                'translation_text' => 'Verlof aanvraag wordt geladen',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:57:54',
                'updated_at' => '2022-09-02 12:09:09',
            ),
            319 =>
            array (
                'id' => 321,
                'title' => 'No leaves Applied',
                'source_text' => 'no_leaves_applied_text',
                'translation_text' => 'Geen verlof toegestaan',
                'lang' => 'nl',
                'created_at' => '2022-08-29 12:58:22',
                'updated_at' => '2022-09-05 12:35:20',
            ),
            320 =>
            array (
                'id' => 322,
                'title' => 'Edit Leave Application',
                'source_text' => 'edit_leave_application_text',
                'translation_text' => 'Bewerk Verlofaanvraag',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:00:29',
                'updated_at' => '2022-08-29 13:00:29',
            ),
            321 =>
            array (
                'id' => 323,
                'title' => 'Update Leave Application',
                'source_text' => 'update_leave_application_text',
                'translation_text' => 'Bijwerken verlof aanvraag',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:01:26',
                'updated_at' => '2022-09-02 12:20:43',
            ),
            322 =>
            array (
                'id' => 324,
                'title' => 'Approve Leave',
                'source_text' => 'approve_leave_text',
                'translation_text' => 'Goedkeuren verlof',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:02:06',
                'updated_at' => '2022-08-29 13:02:06',
            ),
            323 =>
            array (
                'id' => 325,
                'title' => 'Application Start Date',
                'source_text' => 'application_start_date_text',
                'translation_text' => 'Startdatum toepassing:',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:02:50',
                'updated_at' => '2022-08-29 13:02:50',
            ),
            324 =>
            array (
                'id' => 326,
                'title' => 'Approved Start Date',
                'source_text' => 'approved_start_date_text',
                'translation_text' => 'Goedgekeurde startdatum',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:03:23',
                'updated_at' => '2022-08-29 13:03:23',
            ),
            325 =>
            array (
                'id' => 327,
                'title' => 'Approved End Date',
                'source_text' => 'approved_end_date_text',
                'translation_text' => 'Goedgekeurde einddatum',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:04:50',
                'updated_at' => '2022-08-29 13:04:50',
            ),
            326 =>
            array (
                'id' => 328,
                'title' => 'Approve Leave Application',
                'source_text' => 'approve_leave_application_text',
                'translation_text' => 'Verlofaanvraag goedkeuren',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:06:19',
                'updated_at' => '2022-08-29 13:06:19',
            ),
            327 =>
            array (
                'id' => 329,
                'title' => 'Holiday type',
                'source_text' => 'holiday_type_text',
                'translation_text' => 'Vakantietype',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:06:55',
                'updated_at' => '2022-08-29 13:06:55',
            ),
            328 =>
            array (
                'id' => 330,
                'title' => 'Edit leave type',
                'source_text' => 'edit_leave_type_text',
                'translation_text' => 'Verloftype bewerken',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:09:41',
                'updated_at' => '2022-08-29 13:09:41',
            ),
            329 =>
            array (
                'id' => 331,
                'title' => 'Role',
                'source_text' => 'role_text',
                'translation_text' => 'Rol',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:10:27',
                'updated_at' => '2022-08-29 13:10:27',
            ),
            330 =>
            array (
                'id' => 332,
                'title' => 'Email',
                'source_text' => 'email_text',
                'translation_text' => 'E-mail',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:13:24',
                'updated_at' => '2022-08-29 13:13:24',
            ),
            331 =>
            array (
                'id' => 333,
                'title' => 'Employees Loading',
                'source_text' => 'employees_loading_text',
                'translation_text' => 'werknemers laden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:14:24',
                'updated_at' => '2022-08-29 13:14:24',
            ),
            332 =>
            array (
                'id' => 334,
                'title' => 'There are no Employees',
                'source_text' => 'there_are_no_employees_text',
                'translation_text' => 'Er zijn geen medewerkers',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:15:15',
                'updated_at' => '2022-08-29 13:15:15',
            ),
            333 =>
            array (
                'id' => 335,
                'title' => 'Basic Info text',
                'source_text' => 'basic_info_text',
                'translation_text' => 'Basis info tekst',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:23:03',
                'updated_at' => '2022-08-29 13:23:03',
            ),
            334 =>
            array (
                'id' => 336,
                'title' => 'Bank',
                'source_text' => 'bank_text',
                'translation_text' => 'bank',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:23:58',
                'updated_at' => '2022-08-29 13:23:58',
            ),
            335 =>
            array (
                'id' => 337,
                'title' => 'Salary',
                'source_text' => 'salary_text',
                'translation_text' => 'Salaris',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:25:17',
                'updated_at' => '2022-08-29 13:25:17',
            ),
            336 =>
            array (
                'id' => 338,
                'title' => 'benefits Info',
                'source_text' => 'benefits_info_text',
                'translation_text' => 'secundaire arbeidsvoorwaarden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:26:30',
                'updated_at' => '2022-09-05 12:49:50',
            ),
            337 =>
            array (
                'id' => 339,
                'title' => 'Positional info',
                'source_text' => 'positional_info_text',
                'translation_text' => 'Positionele info',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:27:57',
                'updated_at' => '2022-08-29 13:27:57',
            ),
            338 =>
            array (
                'id' => 340,
                'title' => 'Grade Level and Supervisor',
                'source_text' => 'grade_level_and_supervisor_text',
                'translation_text' => 'Niveau en supervisor',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:29:18',
                'updated_at' => '2022-08-29 13:29:18',
            ),
            339 =>
            array (
                'id' => 341,
                'title' => 'Additional Address',
                'source_text' => 'additional_address_text',
                'translation_text' => 'Extra adres',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:50:21',
                'updated_at' => '2022-08-29 13:50:21',
            ),
            340 =>
            array (
                'id' => 342,
                'title' => 'login Info',
                'source_text' => 'login_info_text',
                'translation_text' => 'inloggegevens',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:52:33',
                'updated_at' => '2022-08-29 13:52:33',
            ),
            341 =>
            array (
                'id' => 343,
                'title' => 'Middle Name',
                'source_text' => 'middle_name_text',
                'translation_text' => 'middelste naam',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:53:24',
                'updated_at' => '2022-09-05 12:48:20',
            ),
            342 =>
            array (
                'id' => 344,
                'title' => 'Optional',
                'source_text' => 'optional_text',
                'translation_text' => 'Optioneel',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:54:21',
                'updated_at' => '2022-08-29 13:54:21',
            ),
            343 =>
            array (
                'id' => 345,
                'title' => 'Last Name',
                'source_text' => 'last_name_text',
                'translation_text' => 'Achternaam',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:55:12',
                'updated_at' => '2022-08-29 13:55:12',
            ),
            344 =>
            array (
                'id' => 346,
                'title' => 'Date of Birth',
                'source_text' => 'date_of_birth_text',
                'translation_text' => 'Geboortedatum',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:56:04',
                'updated_at' => '2022-08-29 13:56:04',
            ),
            345 =>
            array (
                'id' => 347,
                'title' => 'Gendar',
                'source_text' => 'gendar_text',
                'translation_text' => 'Geslacht',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:56:30',
                'updated_at' => '2022-09-02 12:07:20',
            ),
            346 =>
            array (
                'id' => 348,
                'title' => 'Choose gendar',
                'source_text' => 'choose_gendar_text',
                'translation_text' => 'Kies geslacht',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:57:05',
                'updated_at' => '2022-09-02 08:44:54',
            ),
            347 =>
            array (
                'id' => 349,
                'title' => 'Male',
                'source_text' => 'male_text',
                'translation_text' => 'Mannelijk',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:57:39',
                'updated_at' => '2022-08-29 13:57:39',
            ),
            348 =>
            array (
                'id' => 350,
                'title' => 'Female',
                'source_text' => 'female_text',
                'translation_text' => 'Vrouw',
                'lang' => 'nl',
                'created_at' => '2022-08-29 13:58:45',
                'updated_at' => '2022-08-29 13:58:45',
            ),
            349 =>
            array (
                'id' => 351,
                'title' => 'Marital Status',
                'source_text' => 'marital_status_text',
                'translation_text' => 'Burgerlijke staat',
                'lang' => 'nl',
                'created_at' => '2022-08-29 14:00:00',
                'updated_at' => '2022-08-29 14:00:00',
            ),
            350 =>
            array (
                'id' => 352,
                'title' => 'Choose Marital Status',
                'source_text' => 'choose_marital_status_text',
                'translation_text' => 'Kies burgerlijke staat',
                'lang' => 'nl',
                'created_at' => '2022-08-29 14:01:25',
                'updated_at' => '2022-08-29 14:01:25',
            ),
            351 =>
            array (
                'id' => 353,
                'title' => 'Single',
                'source_text' => 'single_text',
                'translation_text' => 'Alleenstaand',
                'lang' => 'nl',
                'created_at' => '2022-08-29 14:02:04',
                'updated_at' => '2022-09-01 18:40:08',
            ),
            352 =>
            array (
                'id' => 354,
                'title' => 'Married',
                'source_text' => 'married_text',
                'translation_text' => 'Getrouwd',
                'lang' => 'nl',
                'created_at' => '2022-08-29 14:02:36',
                'updated_at' => '2022-08-29 14:02:36',
            ),
            353 =>
            array (
                'id' => 355,
                'title' => 'devorced_text',
                'source_text' => 'Devorced',
                'translation_text' => 'gescheiden',
                'lang' => 'nl',
                'created_at' => '2022-08-29 14:03:09',
                'updated_at' => '2022-09-05 12:55:32',
            ),
            354 =>
            array (
                'id' => 356,
                'title' => 'Ethinic Group',
                'source_text' => 'Ethinic_group_text',
                'translation_text' => 'Etnische groep',
                'lang' => 'nl',
                'created_at' => '2022-08-29 14:03:43',
                'updated_at' => '2022-08-29 14:03:43',
            ),
            355 =>
            array (
                'id' => 357,
                'title' => 'Photograph',
                'source_text' => 'photograph_text',
                'translation_text' => 'Foto',
                'lang' => 'nl',
                'created_at' => '2022-08-29 14:04:09',
                'updated_at' => '2022-09-07 08:50:13',
            ),
            356 =>
            array (
                'id' => 358,
                'title' => 'Alternative Number',
                'source_text' => 'alternative_number_text',
                'translation_text' => 'alternatief nummer',
                'lang' => 'nl',
                'created_at' => '2022-08-29 14:05:37',
                'updated_at' => '2022-08-29 14:05:37',
            ),
            357 =>
            array (
                'id' => 359,
                'title' => 'Compose',
                'source_text' => 'compose_txt',
                'translation_text' => 'Samenstellen',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:39:31',
                'updated_at' => '2022-09-06 14:30:35',
            ),
            358 =>
            array (
                'id' => 360,
                'title' => 'Inbox',
                'source_text' => 'inbox_txt',
                'translation_text' => 'Postvak IN',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:41:05',
                'updated_at' => '2022-08-30 05:41:05',
            ),
            359 =>
            array (
                'id' => 361,
                'title' => 'Sent',
                'source_text' => 'sent_txt',
                'translation_text' => 'Verzonden',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:43:56',
                'updated_at' => '2022-08-30 05:43:56',
            ),
            360 =>
            array (
                'id' => 362,
                'title' => 'Snoozed',
                'source_text' => 'snoozed_txt',
                'translation_text' => 'Gesnoozed',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:45:26',
                'updated_at' => '2022-09-05 11:51:23',
            ),
            361 =>
            array (
                'id' => 363,
                'title' => 'Draft',
                'source_text' => 'draft_txt',
                'translation_text' => 'Voorlopige versie',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:46:39',
                'updated_at' => '2022-08-30 05:46:39',
            ),
            362 =>
            array (
                'id' => 364,
                'title' => 'Trash',
                'source_text' => 'trash_txt',
                'translation_text' => 'Afval',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:47:49',
                'updated_at' => '2022-08-30 05:47:49',
            ),
            363 =>
            array (
                'id' => 365,
                'title' => 'Country',
                'source_text' => 'country_text',
                'translation_text' => 'Land',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:48:32',
                'updated_at' => '2022-08-30 05:48:32',
            ),
            364 =>
            array (
                'id' => 366,
                'title' => 'Categories',
                'source_text' => 'categories_txt',
                'translation_text' => 'Categorieën',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:49:32',
                'updated_at' => '2022-08-30 05:49:32',
            ),
            365 =>
            array (
                'id' => 367,
                'title' => 'Work',
                'source_text' => 'work_txt',
                'translation_text' => 'Werk',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:51:07',
                'updated_at' => '2022-08-30 05:51:07',
            ),
            366 =>
            array (
                'id' => 368,
                'title' => 'choose country',
                'source_text' => 'choose_country_text',
                'translation_text' => 'kies land',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:51:56',
                'updated_at' => '2022-08-30 05:51:56',
            ),
            367 =>
            array (
                'id' => 369,
                'title' => 'Private',
                'source_text' => 'private_txt',
                'translation_text' => 'Prive',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:52:41',
                'updated_at' => '2022-09-06 14:11:57',
            ),
            368 =>
            array (
                'id' => 370,
                'title' => 'City',
                'source_text' => 'city_text',
                'translation_text' => 'stad',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:53:07',
                'updated_at' => '2022-08-30 05:53:07',
            ),
            369 =>
            array (
                'id' => 371,
                'title' => 'Support',
                'source_text' => 'support_txt',
                'translation_text' => 'Steun',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:54:33',
                'updated_at' => '2022-08-30 05:54:33',
            ),
            370 =>
            array (
                'id' => 372,
                'title' => 'Zip code',
                'source_text' => 'zip_code_text',
                'translation_text' => 'Postcode',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:54:41',
                'updated_at' => '2022-08-30 05:54:41',
            ),
            371 =>
            array (
                'id' => 373,
                'title' => 'Social',
                'source_text' => 'social_txt',
                'translation_text' => 'Sociaal',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:55:52',
                'updated_at' => '2022-08-30 05:55:52',
            ),
            372 =>
            array (
                'id' => 374,
                'title' => 'To',
                'source_text' => 'to_txt',
                'translation_text' => 'Tot',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:57:14',
                'updated_at' => '2022-08-30 05:57:14',
            ),
            373 =>
            array (
                'id' => 375,
                'title' => 'Next to bank Info',
                'source_text' => 'next_to_bank_info_text',
                'translation_text' => 'Naast bankinfo',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:57:36',
                'updated_at' => '2022-08-30 05:57:36',
            ),
            374 =>
            array (
                'id' => 376,
                'title' => 'Bank Information',
                'source_text' => 'bank_information_text',
                'translation_text' => 'Bank informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:58:36',
                'updated_at' => '2022-08-30 05:58:36',
            ),
            375 =>
            array (
                'id' => 377,
                'title' => 'search here',
                'source_text' => 'search_here_txt',
                'translation_text' => 'zoek hier',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:58:45',
                'updated_at' => '2022-08-30 05:58:45',
            ),
            376 =>
            array (
                'id' => 378,
                'title' => 'Account Number',
                'source_text' => 'account_number_text',
                'translation_text' => 'Rekeningnummer',
                'lang' => 'nl',
                'created_at' => '2022-08-30 05:59:38',
                'updated_at' => '2022-08-30 05:59:38',
            ),
            377 =>
            array (
                'id' => 379,
                'title' => 'Subject',
                'source_text' => 'subject_txt',
                'translation_text' => 'Onderwerp',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:00:18',
                'updated_at' => '2022-08-30 06:00:18',
            ),
            378 =>
            array (
                'id' => 380,
                'title' => 'Enter text',
                'source_text' => 'enter_text_txt',
                'translation_text' => 'Tekst invoeren',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:02:04',
                'updated_at' => '2022-08-30 06:02:04',
            ),
            379 =>
            array (
                'id' => 381,
                'title' => 'Attachment',
                'source_text' => 'attachment_txt',
                'translation_text' => 'Bijlage',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:03:26',
                'updated_at' => '2022-08-30 06:03:26',
            ),
            380 =>
            array (
                'id' => 382,
                'title' => 'Discard',
                'source_text' => 'discard_txt',
                'translation_text' => 'Weggooien',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:05:20',
                'updated_at' => '2022-08-30 06:05:20',
            ),
            381 =>
            array (
                'id' => 383,
                'title' => 'Send',
                'source_text' => 'send_txt',
                'translation_text' => 'Versturen',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:07:28',
                'updated_at' => '2022-08-30 06:07:28',
            ),
            382 =>
            array (
                'id' => 384,
                'title' => 'Bank Name',
                'source_text' => 'bank_name_text',
                'translation_text' => 'Banknaam',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:09:30',
                'updated_at' => '2022-08-30 06:09:30',
            ),
            383 =>
            array (
                'id' => 385,
                'title' => 'Schedule Send',
                'source_text' => 'schedule_send_txt',
                'translation_text' => 'Schema Verzenden',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:09:56',
                'updated_at' => '2022-08-30 06:09:56',
            ),
            384 =>
            array (
                'id' => 386,
                'title' => 'Branch Address',
                'source_text' => 'branch_address_text',
                'translation_text' => 'Vestigingsadres:',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:11:20',
                'updated_at' => '2022-08-30 06:11:20',
            ),
            385 =>
            array (
                'id' => 387,
                'title' => 'From',
                'source_text' => 'from_txt',
                'translation_text' => 'Van',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:11:26',
                'updated_at' => '2022-08-30 06:11:26',
            ),
            386 =>
            array (
                'id' => 388,
                'title' => 'AnyTime',
                'source_text' => 'anytime_txt',
                'translation_text' => 'Altijd',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:12:41',
                'updated_at' => '2022-08-30 06:12:41',
            ),
            387 =>
            array (
                'id' => 389,
                'title' => 'Latest',
                'source_text' => 'latest_txt',
                'translation_text' => 'Laatste',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:14:10',
                'updated_at' => '2022-08-30 06:14:10',
            ),
            388 =>
            array (
                'id' => 390,
                'title' => 'bban Number',
                'source_text' => 'bban_number_text',
                'translation_text' => 'Iban-nummer:',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:14:25',
                'updated_at' => '2022-09-05 12:50:42',
            ),
            389 =>
            array (
                'id' => 391,
                'title' => 'benefits',
                'source_text' => 'benefits_text',
                'translation_text' => 'een uitkering',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:15:04',
                'updated_at' => '2022-08-30 06:15:04',
            ),
            390 =>
            array (
                'id' => 392,
                'title' => 'Oldest',
                'source_text' => 'oldest_txt',
                'translation_text' => 'Oudste',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:15:42',
                'updated_at' => '2022-08-30 06:15:42',
            ),
            391 =>
            array (
                'id' => 393,
                'title' => 'More',
                'source_text' => 'more_txt',
                'translation_text' => 'Meer',
                'lang' => 'nl',
                'created_at' => '2022-08-30 06:16:38',
                'updated_at' => '2022-08-30 06:16:38',
            ),
            392 =>
            array (
                'id' => 394,
                'title' => 'Family',
                'source_text' => 'family_text',
                'translation_text' => 'familie',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:28:21',
                'updated_at' => '2022-09-06 14:08:55',
            ),
            393 =>
            array (
                'id' => 395,
                'title' => 'Transport Allowance',
                'source_text' => 'transport_allowance_text',
                'translation_text' => 'reis vergoeding',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:29:12',
                'updated_at' => '2022-09-06 14:04:22',
            ),
            394 =>
            array (
                'id' => 396,
                'title' => 'Others',
                'source_text' => 'others_text',
                'translation_text' => 'andere',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:29:49',
                'updated_at' => '2022-09-06 14:07:59',
            ),
            395 =>
            array (
                'id' => 397,
                'title' => 'Salary Information',
                'source_text' => 'salary_information_text',
                'translation_text' => 'salaris informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:31:13',
                'updated_at' => '2022-09-06 14:06:53',
            ),
            396 =>
            array (
                'id' => 398,
                'title' => 'Basic Salary',
                'source_text' => 'basic_salary',
                'translation_text' => 'basis salaris',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:31:44',
                'updated_at' => '2022-09-06 14:09:57',
            ),
            397 =>
            array (
                'id' => 399,
                'title' => 'Gross Salary',
                'source_text' => 'gross_salary_text',
                'translation_text' => 'Bruto salaris',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:32:15',
                'updated_at' => '2022-09-06 14:05:35',
            ),
            398 =>
            array (
                'id' => 400,
                'title' => 'Tax Information',
                'source_text' => 'tax_information_text',
                'translation_text' => 'Belasting informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:32:54',
                'updated_at' => '2022-09-06 14:11:09',
            ),
            399 =>
            array (
                'id' => 401,
                'title' => 'Net Salary',
                'source_text' => 'net_salary_text',
                'translation_text' => 'netto salaris',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:33:28',
                'updated_at' => '2022-09-06 14:13:54',
            ),
            400 =>
            array (
                'id' => 402,
                'title' => 'Previous',
                'source_text' => 'previous_text',
                'translation_text' => 'Vorige',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:34:20',
                'updated_at' => '2022-09-06 15:27:55',
            ),
            401 =>
            array (
                'id' => 403,
                'title' => 'Position',
                'source_text' => 'position_text',
                'translation_text' => 'Positie',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:34:57',
                'updated_at' => '2022-09-07 08:49:40',
            ),
            402 =>
            array (
                'id' => 404,
                'title' => 'Duty Type',
                'source_text' => 'duty_type_text',
                'translation_text' => 'soort werk',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:35:34',
                'updated_at' => '2022-09-06 19:19:58',
            ),
            403 =>
            array (
                'id' => 405,
                'title' => 'Choose Duty Type',
                'source_text' => 'choose_duty_type_text',
                'translation_text' => 'Kies type werk',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:36:21',
                'updated_at' => '2022-09-07 08:39:48',
            ),
            404 =>
            array (
                'id' => 406,
                'title' => 'Hire Date',
                'source_text' => 'hire_date_text',
                'translation_text' => 'Begin datum werkcontract',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:36:47',
                'updated_at' => '2022-09-07 08:38:56',
            ),
            405 =>
            array (
                'id' => 407,
                'title' => 'Choose Attendance Time',
                'source_text' => 'choose_attendance_time_text',
                'translation_text' => 'Kies de aanwezigheids tijd',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:37:48',
                'updated_at' => '2022-09-07 08:32:16',
            ),
            406 =>
            array (
                'id' => 408,
                'title' => 'Employee Type',
                'source_text' => 'employee_type_text',
                'translation_text' => 'soort employee',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:38:18',
                'updated_at' => '2022-09-07 08:41:58',
            ),
            407 =>
            array (
                'id' => 409,
                'title' => 'Choose Employee Type',
                'source_text' => 'choose_employee_type_text',
                'translation_text' => 'Kies soort employee',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:38:47',
                'updated_at' => '2022-09-07 08:31:28',
            ),
            408 =>
            array (
                'id' => 410,
                'title' => 'Rate',
                'source_text' => 'rate_text',
                'translation_text' => 'Prijs',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:39:06',
                'updated_at' => '2022-09-06 14:23:08',
            ),
            409 =>
            array (
                'id' => 411,
                'title' => 'Monthly Work hours',
                'source_text' => 'monthly_work_hours_text',
                'translation_text' => 'Werkuren per maand',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:39:37',
                'updated_at' => '2022-09-06 14:20:33',
            ),
            410 =>
            array (
                'id' => 412,
                'title' => 'Rate Type',
                'source_text' => 'rate_type_text',
                'translation_text' => 'Soort prijs',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:39:58',
                'updated_at' => '2022-09-06 14:20:01',
            ),
            411 =>
            array (
                'id' => 413,
                'title' => 'Choose rate type',
                'source_text' => 'choose_rate_type_text',
                'translation_text' => 'Kies prijs type',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:40:31',
                'updated_at' => '2022-09-06 14:00:46',
            ),
            412 =>
            array (
                'id' => 414,
                'title' => 'Next to grade',
                'source_text' => 'next_to_grade_text',
                'translation_text' => 'Next to grade',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:40:56',
                'updated_at' => '2022-08-30 12:40:56',
            ),
            413 =>
            array (
                'id' => 415,
                'title' => 'Education award',
                'source_text' => 'education_award_text',
                'translation_text' => 'Opleidings diploma',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:41:19',
                'updated_at' => '2022-09-06 12:54:01',
            ),
            414 =>
            array (
                'id' => 416,
                'title' => 'Awarding Institution',
                'source_text' => 'awarding_institution_text',
                'translation_text' => 'Opleiding instelling',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:41:44',
                'updated_at' => '2022-09-06 12:24:15',
            ),
            415 =>
            array (
                'id' => 417,
                'title' => 'Awarding date',
                'source_text' => 'awarding_date_text',
                'translation_text' => 'Examen datum',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:42:08',
                'updated_at' => '2022-09-06 12:30:38',
            ),
            416 =>
            array (
                'id' => 418,
                'title' => 'Class of award',
                'source_text' => 'class_of_award_text',
                'translation_text' => 'Soort prijs',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:42:34',
                'updated_at' => '2022-09-06 12:22:40',
            ),
            417 =>
            array (
                'id' => 419,
                'title' => 'Choose class of award',
                'source_text' => 'choose_class_of_award_text',
                'translation_text' => 'Kies soort prijs',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:43:45',
                'updated_at' => '2022-09-06 12:20:55',
            ),
            418 =>
            array (
                'id' => 420,
                'title' => 'First Supervisor',
                'source_text' => 'first_supervisor_text',
                'translation_text' => 'Eerste Leidinggevende',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:44:11',
                'updated_at' => '2022-09-06 12:19:19',
            ),
            419 =>
            array (
                'id' => 421,
                'title' => 'Choose first supervisor',
                'source_text' => 'choose_first_supervisor_text',
                'translation_text' => 'Kies eerste leidinggevende',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:44:48',
                'updated_at' => '2022-09-06 12:18:27',
            ),
            420 =>
            array (
                'id' => 422,
                'title' => 'Second supervisor',
                'source_text' => 'second_supervisor_text',
                'translation_text' => 'tweede manager',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:45:11',
                'updated_at' => '2022-09-05 12:31:39',
            ),
            421 =>
            array (
                'id' => 423,
                'title' => 'Choose second supervisor',
                'source_text' => 'choose_second_supervisor_text',
                'translation_text' => 'Kies tweede opzichter',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:45:48',
                'updated_at' => '2022-09-02 12:06:59',
            ),
            422 =>
            array (
                'id' => 424,
                'title' => 'Reporting to',
                'source_text' => 'reporting_to_text',
                'translation_text' => 'Rapporteert aan',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:46:18',
                'updated_at' => '2022-09-02 12:05:41',
            ),
            423 =>
            array (
                'id' => 425,
                'title' => 'Choose reporting to',
                'source_text' => 'choose_reporting_to_text',
                'translation_text' => 'Rapportage aan',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:46:48',
                'updated_at' => '2022-09-02 12:03:52',
            ),
            424 =>
            array (
                'id' => 426,
                'title' => 'Work in city',
                'source_text' => 'work_in_city_text',
                'translation_text' => 'Werk in de stad',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:47:21',
                'updated_at' => '2022-09-02 12:05:03',
            ),
            425 =>
            array (
                'id' => 427,
                'title' => 'Choose yes or no',
                'source_text' => 'choose_yes_or_no_text',
                'translation_text' => 'Kies ja of nee',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:47:59',
                'updated_at' => '2022-09-02 08:57:33',
            ),
            426 =>
            array (
                'id' => 428,
                'title' => 'Work Permit',
                'source_text' => 'work_permit_text',
                'translation_text' => 'Werkvergunning',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:48:25',
                'updated_at' => '2022-09-02 12:01:02',
            ),
            427 =>
            array (
                'id' => 429,
                'title' => 'Next to additional info',
                'source_text' => 'next_to_additional_info_text',
                'translation_text' => 'Additionele informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:48:59',
                'updated_at' => '2022-09-02 08:54:57',
            ),
            428 =>
            array (
                'id' => 430,
                'title' => 'Home email',
                'source_text' => 'home_email_text',
                'translation_text' => 'Email thuis',
                'lang' => 'nl',
                'created_at' => '2022-08-30 12:49:23',
                'updated_at' => '2022-09-02 08:53:28',
            ),
            429 =>
            array (
                'id' => 431,
                'title' => 'Minutes',
                'source_text' => 'minutes_text',
                'translation_text' => 'Minuten',
                'lang' => 'nl',
                'created_at' => '2022-08-30 13:29:13',
                'updated_at' => '2022-08-30 13:29:13',
            ),
            430 =>
            array (
                'id' => 432,
                'title' => 'Select a Date',
                'source_text' => 'select_a_date_text',
                'translation_text' => 'Selecteer een datum',
                'lang' => 'nl',
                'created_at' => '2022-08-30 13:30:42',
                'updated_at' => '2022-08-30 13:30:42',
            ),
            431 =>
            array (
                'id' => 433,
                'title' => 'Select End Time',
                'source_text' => 'select_end_time_text',
                'translation_text' => 'Selecteer Eindtijd',
                'lang' => 'nl',
                'created_at' => '2022-08-30 13:34:14',
                'updated_at' => '2022-08-30 13:34:14',
            ),
            432 =>
            array (
                'id' => 434,
                'title' => 'Select Agenda Days',
                'source_text' => 'select_agenda_days_text',
                'translation_text' => 'Selecteer Agendadagen',
                'lang' => 'nl',
                'created_at' => '2022-08-30 13:36:03',
                'updated_at' => '2022-08-30 13:36:03',
            ),
            433 =>
            array (
                'id' => 435,
                'title' => 'Saving',
                'source_text' => 'saving_text',
                'translation_text' => 'Besparing',
                'lang' => 'nl',
                'created_at' => '2022-08-30 13:37:06',
                'updated_at' => '2022-08-30 13:37:06',
            ),
            434 =>
            array (
                'id' => 436,
                'title' => 'Saved',
                'source_text' => 'saved_text',
                'translation_text' => 'Opgeslagen',
                'lang' => 'nl',
                'created_at' => '2022-08-30 13:38:24',
                'updated_at' => '2022-08-30 13:38:24',
            ),
            435 =>
            array (
                'id' => 437,
                'title' => 'Deleted',
                'source_text' => 'deleted_text',
                'translation_text' => 'verwijderd',
                'lang' => 'nl',
                'created_at' => '2022-08-30 13:44:38',
                'updated_at' => '2022-08-30 13:44:38',
            ),
            436 =>
            array (
                'id' => 438,
                'title' => 'Deleting',
                'source_text' => 'deleting_text',
                'translation_text' => 'Verwijderen',
                'lang' => 'nl',
                'created_at' => '2022-08-30 13:45:45',
                'updated_at' => '2022-08-30 13:45:45',
            ),
            437 =>
            array (
                'id' => 439,
                'title' => 'Types List',
                'source_text' => 'types_list_text',
                'translation_text' => 'Typen lijst',
                'lang' => 'nl',
                'created_at' => '2022-08-30 13:46:43',
                'updated_at' => '2022-08-30 13:46:43',
            ),
            438 =>
            array (
                'id' => 440,
                'title' => 'Doctor',
                'source_text' => 'doctor_text',
                'translation_text' => 'Dokter',
                'lang' => 'nl',
                'created_at' => '2022-08-30 13:48:04',
                'updated_at' => '2022-08-30 13:48:04',
            ),
            439 =>
            array (
                'id' => 441,
                'title' => 'Contract Start Date',
                'source_text' => 'contract_start_date_text',
                'translation_text' => 'Startdatum contract',
                'lang' => 'nl',
                'created_at' => '2022-08-30 13:49:25',
                'updated_at' => '2022-08-30 13:49:25',
            ),
            440 =>
            array (
                'id' => 442,
                'title' => 'Contract End Date',
                'source_text' => 'contract_end_date_text',
                'translation_text' => 'Einddatum contract',
                'lang' => 'nl',
                'created_at' => '2022-08-30 13:50:34',
                'updated_at' => '2022-08-30 13:50:34',
            ),
            441 =>
            array (
                'id' => 443,
                'title' => 'Select Frequency',
                'source_text' => 'select_frequency_text',
                'translation_text' => 'Selecteer Frequentie',
                'lang' => 'nl',
                'created_at' => '2022-08-30 14:02:47',
                'updated_at' => '2022-08-30 14:02:47',
            ),
            442 =>
            array (
                'id' => 444,
                'title' => 'Week Days Time Settings',
                'source_text' => 'week_days_time_settings_text',
                'translation_text' => 'Week Dagen Tijd Instellingen',
                'lang' => 'nl',
                'created_at' => '2022-08-30 14:07:22',
                'updated_at' => '2022-08-30 14:07:22',
            ),
            443 =>
            array (
                'id' => 445,
                'title' => 'No Week Selected yet',
                'source_text' => 'no_week_selected_yet_text',
                'translation_text' => 'Nog geen week geselecteerd',
                'lang' => 'nl',
                'created_at' => '2022-08-30 14:08:46',
                'updated_at' => '2022-08-30 14:08:46',
            ),
            444 =>
            array (
                'id' => 446,
                'title' => 'Search Week Days',
                'source_text' => 'search_week_days_text',
                'translation_text' => 'Zoek weekdagen',
                'lang' => 'nl',
                'created_at' => '2022-08-30 14:12:50',
                'updated_at' => '2022-08-30 14:12:50',
            ),
            445 =>
            array (
                'id' => 447,
                'title' => 'Breaks',
                'source_text' => 'breaks_text',
                'translation_text' => 'Pauzes',
                'lang' => 'nl',
                'created_at' => '2022-08-30 14:21:19',
                'updated_at' => '2022-08-30 14:21:19',
            ),
            446 =>
            array (
                'id' => 448,
                'title' => 'Done',
                'source_text' => 'done_text',
                'translation_text' => 'Gedaan',
                'lang' => 'nl',
                'created_at' => '2022-08-30 14:24:15',
                'updated_at' => '2022-08-30 14:24:15',
            ),
            447 =>
            array (
                'id' => 449,
                'title' => 'Back to Calendar',
                'source_text' => 'back_to_calendar_text',
                'translation_text' => 'Terug naar Kalender',
                'lang' => 'nl',
                'created_at' => '2022-08-30 14:25:32',
                'updated_at' => '2022-08-30 14:25:32',
            ),
            448 =>
            array (
                'id' => 450,
                'title' => 'Treatment Code',
                'source_text' => 'treatment_code_text',
                'translation_text' => 'Behandelcode',
                'lang' => 'nl',
                'created_at' => '2022-08-30 14:29:43',
                'updated_at' => '2022-08-30 14:29:43',
            ),
            449 =>
            array (
                'id' => 451,
                'title' => 'Treatment Configurations',
                'source_text' => 'treatment_configurations_text',
                'translation_text' => 'Behandelingsconfiguraties',
                'lang' => 'nl',
                'created_at' => '2022-08-30 14:34:31',
                'updated_at' => '2022-08-30 14:34:31',
            ),
            450 =>
            array (
                'id' => 452,
                'title' => 'No Treatments have been added',
                'source_text' => 'no_treatments_have_been_added_text',
                'translation_text' => 'Er zijn geen behandelingen toegevoegd',
                'lang' => 'nl',
                'created_at' => '2022-08-30 14:36:05',
                'updated_at' => '2022-08-30 14:36:05',
            ),
            451 =>
            array (
                'id' => 453,
                'title' => 'Click the add treatment button to treatments to the system',
                'source_text' => 'click_the_add_treatment_button_text',
                'translation_text' => 'Klik op de knop behandeling toevoegen aan behandelingen aan het systeem',
                'lang' => 'nl',
                'created_at' => '2022-08-30 14:38:28',
                'updated_at' => '2022-08-30 14:38:28',
            ),
            452 =>
            array (
                'id' => 454,
                'title' => 'Loading Treatments',
                'source_text' => 'loading_treatments_text',
                'translation_text' => 'Behandelingen laden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 05:37:46',
                'updated_at' => '2022-08-31 05:37:46',
            ),
            453 =>
            array (
                'id' => 455,
                'title' => 'Appointment Stages',
                'source_text' => 'appointment_stages_text',
                'translation_text' => 'Afspraakstadia',
                'lang' => 'nl',
                'created_at' => '2022-08-31 05:39:02',
                'updated_at' => '2022-08-31 05:39:02',
            ),
            454 =>
            array (
                'id' => 456,
                'title' => 'Duration from Previous',
                'source_text' => 'duration_from_previous_text',
                'translation_text' => 'Duur van vorige',
                'lang' => 'nl',
                'created_at' => '2022-08-31 05:40:21',
                'updated_at' => '2022-08-31 05:40:21',
            ),
            455 =>
            array (
                'id' => 457,
                'title' => 'Time Unit',
                'source_text' => 'time_unit_text',
                'translation_text' => 'Tijdseenheid',
                'lang' => 'nl',
                'created_at' => '2022-08-31 05:41:05',
                'updated_at' => '2022-08-31 05:41:05',
            ),
            456 =>
            array (
                'id' => 458,
                'title' => 'After',
                'source_text' => 'after_text',
                'translation_text' => 'Na',
                'lang' => 'nl',
                'created_at' => '2022-08-31 05:42:00',
                'updated_at' => '2022-08-31 05:42:00',
            ),
            457 =>
            array (
                'id' => 459,
                'title' => 'Procedure',
                'source_text' => 'procedure_text',
                'translation_text' => 'Procedure',
                'lang' => 'nl',
                'created_at' => '2022-08-31 05:42:43',
                'updated_at' => '2022-08-31 05:42:43',
            ),
            458 =>
            array (
                'id' => 460,
                'title' => 'Treatment Error',
                'source_text' => 'treatment_error_text',
                'translation_text' => 'Verkeerde behandeling',
                'lang' => 'nl',
                'created_at' => '2022-08-31 05:44:17',
                'updated_at' => '2022-09-05 12:51:20',
            ),
            459 =>
            array (
                'id' => 461,
                'title' => 'Add New Treatment',
                'source_text' => 'add_new_treatment_text',
                'translation_text' => 'Nieuwe behandeling toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 05:45:33',
                'updated_at' => '2022-08-31 05:45:33',
            ),
            460 =>
            array (
                'id' => 462,
                'title' => 'Add Treatment',
                'source_text' => 'add_treatment_text',
                'translation_text' => 'Behandeling toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 05:46:22',
                'updated_at' => '2022-08-31 05:46:22',
            ),
            461 =>
            array (
                'id' => 463,
                'title' => 'Calendar',
                'source_text' => 'calendar_text',
                'translation_text' => 'Kalender',
                'lang' => 'nl',
                'created_at' => '2022-08-31 05:47:36',
                'updated_at' => '2022-08-31 05:47:36',
            ),
            462 =>
            array (
                'id' => 464,
                'title' => 'Appointments',
                'source_text' => 'appointments_text',
                'translation_text' => 'Afspraken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 05:48:54',
                'updated_at' => '2022-08-31 05:48:54',
            ),
            463 =>
            array (
                'id' => 465,
                'title' => 'Loading Appointments',
                'source_text' => 'loading_appointments_text',
                'translation_text' => 'Afspraken laden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:03:08',
                'updated_at' => '2022-08-31 06:03:08',
            ),
            464 =>
            array (
                'id' => 466,
                'title' => 'Doctors',
                'source_text' => 'doctors_text',
                'translation_text' => 'dokters',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:04:21',
                'updated_at' => '2022-08-31 06:04:21',
            ),
            465 =>
            array (
                'id' => 467,
                'title' => 'Patient',
                'source_text' => 'patient_text',
                'translation_text' => 'Geduldig',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:05:19',
                'updated_at' => '2022-08-31 06:05:19',
            ),
            466 =>
            array (
                'id' => 468,
                'title' => 'Source',
                'source_text' => 'source_text',
                'translation_text' => 'Bron',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:06:17',
                'updated_at' => '2022-08-31 06:06:17',
            ),
            467 =>
            array (
                'id' => 469,
                'title' => 'Search by Keyword',
                'source_text' => 'search_by_keyword_text',
                'translation_text' => 'Zoeken op trefwoord',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:10:21',
                'updated_at' => '2022-08-31 06:10:21',
            ),
            468 =>
            array (
                'id' => 470,
                'title' => 'Filter Appointments',
                'source_text' => 'filter_appointments_text',
                'translation_text' => 'Afspraken filteren',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:11:42',
                'updated_at' => '2022-08-31 06:11:42',
            ),
            469 =>
            array (
                'id' => 471,
                'title' => 'There are no',
                'source_text' => 'there_are_no_text',
                'translation_text' => 'Er zijn geen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:13:23',
                'updated_at' => '2022-08-31 06:13:23',
            ),
            470 =>
            array (
                'id' => 472,
                'title' => 'Scheduled at the moment',
                'source_text' => 'scheduled_at_the_moment_text',
                'translation_text' => 'Op dit moment gepland',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:15:15',
                'updated_at' => '2022-08-31 06:15:15',
            ),
            471 =>
            array (
                'id' => 473,
                'title' => 'New Event',
                'source_text' => 'new_event_text',
                'translation_text' => 'Nieuw evenement',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:17:23',
                'updated_at' => '2022-08-31 06:17:23',
            ),
            472 =>
            array (
                'id' => 474,
                'title' => 'Yes',
                'source_text' => 'yes_text',
                'translation_text' => 'Ja',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:18:10',
                'updated_at' => '2022-08-31 06:18:10',
            ),
            473 =>
            array (
                'id' => 475,
                'title' => 'No',
                'source_text' => 'no_text',
                'translation_text' => 'Nee',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:18:37',
                'updated_at' => '2022-08-31 06:18:37',
            ),
            474 =>
            array (
                'id' => 476,
                'title' => 'Available slots for the selected doctors',
                'source_text' => 'available_slots_text',
                'translation_text' => 'Beschikbare slots voor de geselecteerde artsen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:19:24',
                'updated_at' => '2022-08-31 06:19:24',
            ),
            475 =>
            array (
                'id' => 477,
                'title' => 'Loading Available Slots',
                'source_text' => 'loading_available_slots_text',
                'translation_text' => 'Beschikbare slots laden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:20:34',
                'updated_at' => '2022-08-31 06:20:34',
            ),
            476 =>
            array (
                'id' => 478,
            'title' => 'Doctor(s) isn\'t available at the selected time',
                'source_text' => 'doctor_not_available_text',
            'translation_text' => 'Dokter(en) is niet beschikbaar op de geselecteerde tijd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:22:23',
                'updated_at' => '2022-08-31 06:22:23',
            ),
            477 =>
            array (
                'id' => 480,
                'title' => 'Patients list',
                'source_text' => 'patients_list_text',
                'translation_text' => 'Patienten lijst',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:25:43',
                'updated_at' => '2022-09-06 12:12:11',
            ),
            478 =>
            array (
                'id' => 481,
                'title' => 'Mobile number',
                'source_text' => 'mobile_number_text',
                'translation_text' => 'Mobiel telefoon nummer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:26:38',
                'updated_at' => '2022-09-06 14:12:49',
            ),
            479 =>
            array (
                'id' => 482,
                'title' => 'Create patient',
                'source_text' => 'create_patient_text',
                'translation_text' => 'patient aanmaken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:27:14',
                'updated_at' => '2022-09-06 14:15:09',
            ),
            480 =>
            array (
                'id' => 483,
                'title' => 'Table view',
                'source_text' => 'table_view_text',
                'translation_text' => 'Table view',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:27:39',
                'updated_at' => '2022-08-31 06:27:39',
            ),
            481 =>
            array (
                'id' => 484,
                'title' => 'Card view',
                'source_text' => 'card_view_text',
                'translation_text' => 'Card view',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:27:59',
                'updated_at' => '2022-08-31 06:27:59',
            ),
            482 =>
            array (
                'id' => 485,
                'title' => 'Latest',
                'source_text' => 'latest_text',
                'translation_text' => 'Laatste',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:28:23',
                'updated_at' => '2022-09-07 08:42:19',
            ),
            483 =>
            array (
                'id' => 486,
                'title' => 'Oldest',
                'source_text' => 'oldest_text',
                'translation_text' => 'Oudste',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:28:43',
                'updated_at' => '2022-09-07 08:33:53',
            ),
            484 =>
            array (
                'id' => 487,
                'title' => 'Edit basic information',
                'source_text' => 'edit_basic_information_text',
                'translation_text' => 'basis informatie bewerken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:29:07',
                'updated_at' => '2022-09-02 12:22:01',
            ),
            485 =>
            array (
                'id' => 488,
                'title' => 'BSN',
                'source_text' => 'bsn_text',
                'translation_text' => 'BSN',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:29:40',
                'updated_at' => '2022-08-31 06:29:40',
            ),
            486 =>
            array (
                'id' => 489,
                'title' => 'Wid',
                'source_text' => 'wid_text',
                'translation_text' => 'Wid',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:30:00',
                'updated_at' => '2022-08-31 06:30:00',
            ),
            487 =>
            array (
                'id' => 490,
                'title' => 'Select title',
                'source_text' => 'select_title_text',
                'translation_text' => 'Selecteer titel',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:30:20',
                'updated_at' => '2022-09-07 08:55:10',
            ),
            488 =>
            array (
                'id' => 491,
                'title' => 'Doctor Not Available Filter',
                'source_text' => 'doctor_not_available_filter_text',
            'translation_text' => 'Dokter(en) is niet beschikbaar bij de geselecteerde
tijd. Wis toegepaste filters en probeer het opnieuw',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:30:36',
                'updated_at' => '2022-08-31 06:30:36',
            ),
            489 =>
            array (
                'id' => 492,
                'title' => 'No title found',
                'source_text' => 'no_title_found_text',
                'translation_text' => 'No title found',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:30:43',
                'updated_at' => '2022-08-31 06:30:43',
            ),
            490 =>
            array (
                'id' => 493,
                'title' => 'Gender',
                'source_text' => 'gender_text',
                'translation_text' => 'Geslacht',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:31:00',
                'updated_at' => '2022-08-31 08:38:15',
            ),
            491 =>
            array (
                'id' => 494,
                'title' => 'No gender chosen',
                'source_text' => 'no_gender_chosen_text',
                'translation_text' => 'Geen geslacht gekozen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:31:23',
                'updated_at' => '2022-09-06 12:13:40',
            ),
            492 =>
            array (
                'id' => 495,
                'title' => 'View Suggestions',
                'source_text' => 'view_suggestions_text',
                'translation_text' => 'Suggesties bekijken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:32:01',
                'updated_at' => '2022-08-31 06:32:01',
            ),
            493 =>
            array (
                'id' => 496,
            'title' => 'Dob (Date of Birth)',
                'source_text' => 'dob_text',
                'translation_text' => 'Dob',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:32:10',
                'updated_at' => '2022-08-31 06:32:10',
            ),
            494 =>
            array (
                'id' => 497,
            'title' => 'No dob (no date of birth)',
                'source_text' => 'no_dob_text',
                'translation_text' => 'Geen geboorte datum',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:32:43',
                'updated_at' => '2022-09-06 14:23:52',
            ),
            495 =>
            array (
                'id' => 498,
                'title' => 'Language',
                'source_text' => 'language_text',
                'translation_text' => 'Taal',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:33:04',
                'updated_at' => '2022-09-01 13:36:24',
            ),
            496 =>
            array (
                'id' => 499,
                'title' => 'Occurence',
                'source_text' => 'occurence_text',
                'translation_text' => 'Voorkomen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:33:26',
                'updated_at' => '2022-08-31 06:33:26',
            ),
            497 =>
            array (
                'id' => 500,
                'title' => 'Select language',
                'source_text' => 'select_language_text',
                'translation_text' => 'Selecteer de taal',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:33:27',
                'updated_at' => '2022-09-06 14:31:17',
            ),
            498 =>
            array (
                'id' => 501,
                'title' => 'No language chosen',
                'source_text' => 'no_language_chosen_text',
                'translation_text' => 'geen taal gekozen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:33:51',
                'updated_at' => '2022-09-05 12:30:01',
            ),
            499 =>
            array (
                'id' => 502,
                'title' => 'No language found',
                'source_text' => 'no_language_found_text',
                'translation_text' => 'Geen taal gevonden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:34:26',
                'updated_at' => '2022-09-05 12:29:29',
            ),
        ));
        \DB::table('translations')->insert(array (
            0 =>
            array (
                'id' => 503,
                'title' => 'Fetching available slots',
                'source_text' => 'fetching_available_slots_text',
                'translation_text' => 'Beschikbare slots ophalen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:35:11',
                'updated_at' => '2022-08-31 06:35:11',
            ),
            1 =>
            array (
                'id' => 504,
                'title' => 'Insurance',
                'source_text' => 'insurance_text',
                'translation_text' => 'Verzekering',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:35:45',
                'updated_at' => '2022-09-06 13:04:50',
            ),
            2 =>
            array (
                'id' => 505,
                'title' => 'Company',
                'source_text' => 'company_text',
                'translation_text' => 'Company',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:36:07',
                'updated_at' => '2022-08-31 06:36:07',
            ),
            3 =>
            array (
                'id' => 506,
                'title' => 'Viewing Occurences',
                'source_text' => 'viewing_occurrences_text',
                'translation_text' => 'Gebeurtenissen bekijken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:36:07',
                'updated_at' => '2022-08-31 06:36:07',
            ),
            4 =>
            array (
                'id' => 507,
                'title' => 'No insurer regstered',
                'source_text' => 'no_insurer_regstered_text',
                'translation_text' => 'Geen verzekeraar geregistreerd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:36:37',
                'updated_at' => '2022-09-02 12:03:05',
            ),
            5 =>
            array (
                'id' => 508,
                'title' => 'select a time slot',
                'source_text' => 'select_slot_text',
                'translation_text' => 'selecteer een tijdslot',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:37:24',
                'updated_at' => '2022-08-31 06:37:24',
            ),
            6 =>
            array (
                'id' => 509,
                'title' => 'Suggestions for',
                'source_text' => 'suggestions_for_text',
                'translation_text' => 'Suggesties voor',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:38:25',
                'updated_at' => '2022-08-31 06:38:25',
            ),
            7 =>
            array (
                'id' => 510,
                'title' => 'No insurance number',
                'source_text' => 'no_insurance_number_text',
                'translation_text' => 'Geen polis nummer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:38:40',
                'updated_at' => '2022-09-07 08:34:30',
            ),
            8 =>
            array (
                'id' => 511,
                'title' => 'From date',
                'source_text' => 'from_date_text',
                'translation_text' => 'From date',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:39:54',
                'updated_at' => '2022-08-31 06:39:54',
            ),
            9 =>
            array (
                'id' => 512,
                'title' => 'No start date',
                'source_text' => 'no_start_date_text',
                'translation_text' => 'Geen begin datum',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:40:19',
                'updated_at' => '2022-09-06 14:28:02',
            ),
            10 =>
            array (
                'id' => 513,
                'title' => 'Check insurance information',
                'source_text' => 'check_insurance_information_text',
                'translation_text' => 'Controleer verzekerings informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:40:47',
                'updated_at' => '2022-09-02 08:58:28',
            ),
            11 =>
            array (
                'id' => 514,
                'title' => 'Next Available Date',
                'source_text' => 'next_available_date_text',
                'translation_text' => 'Volgende beschikbare datum',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:41:04',
                'updated_at' => '2022-08-31 06:41:04',
            ),
            12 =>
            array (
                'id' => 515,
                'title' => 'Check insurance data',
                'source_text' => 'check_insurance_data_text',
                'translation_text' => 'Controleer verzekerings informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:41:12',
                'updated_at' => '2022-09-07 08:33:01',
            ),
            13 =>
            array (
                'id' => 516,
                'title' => 'History of insurance',
                'source_text' => 'history_of_insurance_text',
                'translation_text' => 'Verzekerings historie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:41:37',
                'updated_at' => '2022-09-05 12:15:13',
            ),
            14 =>
            array (
                'id' => 517,
                'title' => 'Check wlz indication',
                'source_text' => 'check_wlz_indication_text',
                'translation_text' => 'Controleer wlz indicatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:42:05',
                'updated_at' => '2022-09-06 15:26:40',
            ),
            15 =>
            array (
                'id' => 518,
                'title' => 'Edit wlz information',
                'source_text' => 'edit_wlz_information_text',
                'translation_text' => 'Wlz informatie bewerken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:42:29',
                'updated_at' => '2022-09-06 12:56:14',
            ),
            16 =>
            array (
                'id' => 519,
                'title' => 'Technical Work Details',
                'source_text' => 'technical_work_details_text',
                'translation_text' => 'Technische werkdetails',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:42:41',
                'updated_at' => '2022-08-31 06:42:41',
            ),
            17 =>
            array (
                'id' => 520,
                'title' => 'Insurance based on insurace info',
                'source_text' => 'insurance_based_on_insurace_info_text',
                'translation_text' => 'Verzekering op basis van verzekering informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:43:04',
                'updated_at' => '2022-09-06 14:25:46',
            ),
            18 =>
            array (
                'id' => 521,
                'title' => 'Do not email declaration',
                'source_text' => 'do_not_email_declaration_text',
                'translation_text' => 'declaratie niet versturen per email',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:43:30',
                'updated_at' => '2022-09-07 08:30:44',
            ),
            19 =>
            array (
                'id' => 522,
                'title' => 'Do not send declaration to insurance company',
                'source_text' => 'do_not_send_declaration_to_insurance_company_text',
                'translation_text' => 'Stuur de declaratie niet naar de verzekeraar',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:44:11',
                'updated_at' => '2022-09-02 12:13:38',
            ),
            20 =>
            array (
                'id' => 523,
                'title' => 'Edit contact information',
                'source_text' => 'edit_contact_information_text',
                'translation_text' => 'Contact informatie bewerken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:44:39',
                'updated_at' => '2022-09-06 14:29:23',
            ),
            21 =>
            array (
                'id' => 524,
                'title' => 'No email provided',
                'source_text' => 'no_email_provided_text',
                'translation_text' => 'Geen email gegeven',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:45:02',
                'updated_at' => '2022-09-06 13:59:51',
            ),
            22 =>
            array (
                'id' => 525,
                'title' => 'Email options',
                'source_text' => 'email_options_text',
                'translation_text' => 'Email opties',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:45:23',
                'updated_at' => '2022-09-06 14:24:37',
            ),
            23 =>
            array (
                'id' => 526,
                'title' => 'System emails',
                'source_text' => 'system_emails_text',
                'translation_text' => 'Systeem emails',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:45:44',
                'updated_at' => '2022-09-06 14:26:45',
            ),
            24 =>
            array (
                'id' => 527,
                'title' => 'Appointment Notes',
                'source_text' => 'appointment_notes_text',
                'translation_text' => 'Afspraaknotities',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:45:50',
                'updated_at' => '2022-08-31 06:45:50',
            ),
            25 =>
            array (
                'id' => 528,
                'title' => 'Newsletters',
                'source_text' => 'newsletters_text',
                'translation_text' => 'Nieuwsbrieven',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:46:02',
                'updated_at' => '2022-09-06 11:56:17',
            ),
            26 =>
            array (
                'id' => 529,
                'title' => 'Do not receive emails',
                'source_text' => 'do_not_receive_emails_text',
                'translation_text' => 'Geen emails ontvangen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:46:33',
                'updated_at' => '2022-09-02 12:01:47',
            ),
            27 =>
            array (
                'id' => 530,
                'title' => 'Default Slot Message',
                'source_text' => 'default_slot_message',
                'translation_text' => 'Beschikbare slots voor de geselecteerde arts verschijnen
hier',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:47:09',
                'updated_at' => '2022-08-31 06:47:09',
            ),
            28 =>
            array (
                'id' => 531,
                'title' => 'Receive system emails',
                'source_text' => 'receive_system_emails_text',
                'translation_text' => 'Ontvang emails van het systeem',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:48:05',
                'updated_at' => '2022-09-02 08:55:32',
            ),
            29 =>
            array (
                'id' => 532,
                'title' => 'Reschedule Appointment',
                'source_text' => 'reschedule_appointment_text',
                'translation_text' => 'Afspraak verzetten',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:48:07',
                'updated_at' => '2022-08-31 06:48:07',
            ),
            30 =>
            array (
                'id' => 533,
                'title' => 'Receive newsletters',
                'source_text' => 'receive_newsletters_text',
                'translation_text' => 'Nieuwsbrief ontvangen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:48:42',
                'updated_at' => '2022-09-01 18:40:44',
            ),
            31 =>
            array (
                'id' => 534,
                'title' => 'Rescheduling',
                'source_text' => 'rescheduling_text',
                'translation_text' => 'Opnieuw plannen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:49:33',
                'updated_at' => '2022-08-31 06:49:33',
            ),
            32 =>
            array (
                'id' => 535,
                'title' => 'Rescheduling Appointment',
                'source_text' => 'rescheduling_appointment_text',
                'translation_text' => 'Afspraak verplaatsen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:50:39',
                'updated_at' => '2022-08-31 06:50:39',
            ),
            33 =>
            array (
                'id' => 536,
                'title' => 'Doctor Schedule',
                'source_text' => 'doctor_schedule_text',
                'translation_text' => 'Dokter schema',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:51:29',
                'updated_at' => '2022-08-31 06:51:29',
            ),
            34 =>
            array (
                'id' => 537,
                'title' => 'Waiting List',
                'source_text' => 'waiting_list_text',
                'translation_text' => 'Wachtlijst',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:52:46',
                'updated_at' => '2022-08-31 06:52:46',
            ),
            35 =>
            array (
                'id' => 538,
                'title' => 'Daily Queue',
                'source_text' => 'daily_queue_text',
                'translation_text' => 'Dagelijkse wachtrij',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:53:40',
                'updated_at' => '2022-08-31 06:53:40',
            ),
            36 =>
            array (
                'id' => 539,
                'title' => 'My Queue',
                'source_text' => 'my_queue_text',
                'translation_text' => 'Mijn wachtrij',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:54:18',
                'updated_at' => '2022-08-31 06:54:18',
            ),
            37 =>
            array (
                'id' => 540,
                'title' => 'Telephone',
                'source_text' => 'telephone_text',
                'translation_text' => 'Telefoon',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:55:45',
                'updated_at' => '2022-08-31 06:55:45',
            ),
            38 =>
            array (
                'id' => 541,
                'title' => 'No option selected',
                'source_text' => 'no_option_selected_text',
                'translation_text' => 'Geen optie geselecteerd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:56:27',
                'updated_at' => '2022-09-06 14:21:47',
            ),
            39 =>
            array (
                'id' => 542,
                'title' => 'Checked in',
                'source_text' => 'checked_in_text',
                'translation_text' => 'Ingecheckt',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:56:39',
                'updated_at' => '2022-08-31 06:56:39',
            ),
            40 =>
            array (
                'id' => 543,
                'title' => 'Secondary email',
                'source_text' => 'secondary_email_text',
                'translation_text' => 'Tweede email',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:57:04',
                'updated_at' => '2022-09-06 14:19:11',
            ),
            41 =>
            array (
                'id' => 544,
                'title' => 'Checking Queue',
                'source_text' => 'checking_queue_text',
                'translation_text' => 'Wachtrij controleren',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:57:29',
                'updated_at' => '2022-08-31 06:57:29',
            ),
            42 =>
            array (
                'id' => 545,
                'title' => 'No secondary email',
                'source_text' => 'no_secondary_email_text',
                'translation_text' => 'Geen tweede email',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:57:30',
                'updated_at' => '2022-09-06 14:17:29',
            ),
            43 =>
            array (
                'id' => 546,
                'title' => 'Add email',
                'source_text' => 'add_email_text',
                'translation_text' => 'Email toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:57:52',
                'updated_at' => '2022-09-06 12:45:39',
            ),
            44 =>
            array (
                'id' => 547,
                'title' => 'Add secondary email',
                'source_text' => 'add_secondary_email_text',
                'translation_text' => 'Voeg tweede email toe',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:58:16',
                'updated_at' => '2022-09-06 12:43:46',
            ),
            45 =>
            array (
                'id' => 548,
                'title' => 'Check-in',
                'source_text' => 'check_in_text',
                'translation_text' => 'Check in',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:58:37',
                'updated_at' => '2022-08-31 06:58:37',
            ),
            46 =>
            array (
                'id' => 549,
                'title' => 'Upcoming',
                'source_text' => 'upcoming_text',
                'translation_text' => 'Aanstaande',
                'lang' => 'nl',
                'created_at' => '2022-08-31 06:59:18',
                'updated_at' => '2022-08-31 06:59:18',
            ),
            47 =>
            array (
                'id' => 550,
                'title' => 'Waiting',
                'source_text' => 'waiting_text',
                'translation_text' => 'Aan het wachten',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:00:02',
                'updated_at' => '2022-08-31 07:00:02',
            ),
            48 =>
            array (
                'id' => 551,
                'title' => 'Completed',
                'source_text' => 'completed_text',
                'translation_text' => 'Voltooid',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:00:57',
                'updated_at' => '2022-08-31 07:00:57',
            ),
            49 =>
            array (
                'id' => 552,
                'title' => 'New Appointment',
                'source_text' => 'new_appointment_text',
                'translation_text' => 'Nieuwe afspraak',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:03:43',
                'updated_at' => '2022-08-31 07:03:43',
            ),
            50 =>
            array (
                'id' => 553,
                'title' => 'Assigned to',
                'source_text' => 'assigned_to_text',
                'translation_text' => 'Toegewezen aan',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:05:16',
                'updated_at' => '2022-08-31 07:05:16',
            ),
            51 =>
            array (
                'id' => 554,
                'title' => 'Good morning',
                'source_text' => 'good_morning_text',
                'translation_text' => 'Goedemorgen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:06:08',
                'updated_at' => '2022-08-31 07:06:08',
            ),
            52 =>
            array (
                'id' => 555,
                'title' => 'No phone number',
                'source_text' => 'no_phone_number_text',
                'translation_text' => 'Geen telefoon nummer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:06:31',
                'updated_at' => '2022-09-06 12:07:56',
            ),
            53 =>
            array (
                'id' => 556,
                'title' => 'Secondary phone',
                'source_text' => 'secondary_phone_text',
                'translation_text' => 'Tweede telefoon nummer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:06:54',
                'updated_at' => '2022-09-02 12:04:27',
            ),
            54 =>
            array (
                'id' => 557,
                'title' => 'Good Afternoon',
                'source_text' => 'good_afternoon_text',
                'translation_text' => 'Goedemiddag',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:07:12',
                'updated_at' => '2022-08-31 07:07:12',
            ),
            55 =>
            array (
                'id' => 558,
                'title' => 'No secondary phone',
                'source_text' => 'no_sec_phone_text',
                'translation_text' => 'Geen tweede telefoon nummer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:07:33',
                'updated_at' => '2022-09-02 12:02:31',
            ),
            56 =>
            array (
                'id' => 559,
                'title' => 'Receive sms',
                'source_text' => 'receive_sms_text',
                'translation_text' => 'Ontvang sms',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:07:56',
                'updated_at' => '2022-09-06 12:41:34',
            ),
            57 =>
            array (
                'id' => 560,
                'title' => 'Good Evening',
                'source_text' => 'good_evening_text',
                'translation_text' => 'Goedenavond',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:07:58',
                'updated_at' => '2022-09-06 14:18:18',
            ),
            58 =>
            array (
                'id' => 561,
                'title' => 'Post code',
                'source_text' => 'post_code_text',
                'translation_text' => 'Post code',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:08:29',
                'updated_at' => '2022-08-31 07:08:29',
            ),
            59 =>
            array (
                'id' => 562,
                'title' => 'No post code',
                'source_text' => 'no_post_code_text',
                'translation_text' => 'Geen postcode',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:09:12',
                'updated_at' => '2022-09-06 12:11:11',
            ),
            60 =>
            array (
                'id' => 563,
                'title' => 'You have no checked in appointments today',
                'source_text' => 'no_checkedin_appointment_text',
                'translation_text' => 'U heeft vandaag geen ingecheckte afspraken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:09:21',
                'updated_at' => '2022-08-31 07:09:21',
            ),
            61 =>
            array (
                'id' => 564,
                'title' => 'Street name',
                'source_text' => 'street_name_text',
                'translation_text' => 'Straat naam',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:09:33',
                'updated_at' => '2022-09-06 12:09:11',
            ),
            62 =>
            array (
                'id' => 565,
                'title' => 'You do not have anyone in your waiting room!',
                'source_text' => 'empty_waiting_room_text',
                'translation_text' => 'U heeft niemand in uw wachtkamer!',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:10:40',
                'updated_at' => '2022-08-31 07:10:40',
            ),
            63 =>
            array (
                'id' => 566,
                'title' => 'No street name',
                'source_text' => 'no_street_name_text',
                'translation_text' => 'Geen straat naam',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:10:57',
                'updated_at' => '2022-09-06 12:02:55',
            ),
            64 =>
            array (
                'id' => 567,
                'title' => 'well done! You do not have anyone in your queue!',
                'source_text' => 'well_done_text',
                'translation_text' => 'goed gedaan! U heeft niemand in uw wachtrij!',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:11:44',
                'updated_at' => '2022-08-31 07:11:44',
            ),
            65 =>
            array (
                'id' => 568,
                'title' => 'No country registered',
                'source_text' => 'no_country_registered_text',
                'translation_text' => 'Geen land geregistreerd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:11:45',
                'updated_at' => '2022-09-02 08:54:00',
            ),
            66 =>
            array (
                'id' => 569,
                'title' => 'Region',
                'source_text' => 'region_text',
                'translation_text' => 'Regio',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:12:08',
                'updated_at' => '2022-09-06 11:51:31',
            ),
            67 =>
            array (
                'id' => 570,
                'title' => 'State',
                'source_text' => 'state_text',
                'translation_text' => 'Staat',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:12:26',
                'updated_at' => '2022-08-31 07:12:26',
            ),
            68 =>
            array (
                'id' => 571,
                'title' => 'Appointment id',
                'source_text' => 'appointment_id_text',
                'translation_text' => 'Afspraak-ID',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:13:24',
                'updated_at' => '2022-08-31 07:13:24',
            ),
            69 =>
            array (
                'id' => 572,
                'title' => 'No region registered',
                'source_text' => 'no_region_registered_text',
                'translation_text' => 'Geen religie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:13:38',
                'updated_at' => '2022-09-01 18:11:48',
            ),
            70 =>
            array (
                'id' => 573,
                'title' => 'Waiting Appointment',
                'source_text' => 'waiting_appointment_text',
                'translation_text' => 'Wachtende Afspraak',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:14:08',
                'updated_at' => '2022-08-31 07:14:08',
            ),
            71 =>
            array (
                'id' => 574,
                'title' => 'Search Patient',
                'source_text' => 'search_patient_text',
                'translation_text' => 'Zoek patiënt',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:14:51',
                'updated_at' => '2022-08-31 07:14:51',
            ),
            72 =>
            array (
                'id' => 575,
                'title' => 'Print patient card',
                'source_text' => 'print_patient_card_text',
                'translation_text' => 'Print patient kaard',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:15:23',
                'updated_at' => '2022-09-05 12:26:26',
            ),
            73 =>
            array (
                'id' => 576,
                'title' => 'No waiting appointments',
                'source_text' => 'no_waiting_appointments_text',
                'translation_text' => 'Geen wachtafspraken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:15:47',
                'updated_at' => '2022-08-31 07:15:47',
            ),
            74 =>
            array (
                'id' => 577,
                'title' => 'Practice information',
                'source_text' => 'practice_information_text',
                'translation_text' => 'Praktijk informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:15:47',
                'updated_at' => '2022-09-02 08:45:27',
            ),
            75 =>
            array (
                'id' => 578,
                'title' => 'Dentist',
                'source_text' => 'dentist_text',
                'translation_text' => 'Tandarts',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:16:08',
                'updated_at' => '2022-09-07 08:41:18',
            ),
            76 =>
            array (
                'id' => 579,
                'title' => 'No dentist selected',
                'source_text' => 'no_dentist_selected_text',
                'translation_text' => 'Geen tandarts geselecteerd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:16:33',
                'updated_at' => '2022-09-06 11:57:50',
            ),
            77 =>
            array (
                'id' => 580,
                'title' => 'Select doctor',
                'source_text' => 'select_doctor_text',
                'translation_text' => 'Selecteer dokter',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:17:06',
                'updated_at' => '2022-09-05 08:48:12',
            ),
            78 =>
            array (
                'id' => 581,
                'title' => 'Any Tasks',
                'source_text' => 'any_tasks_text',
                'translation_text' => 'Heeft u taken of creatieve ideeën, deze tool zal uw
veilige ruimte',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:17:17',
                'updated_at' => '2022-08-31 07:17:17',
            ),
            79 =>
            array (
                'id' => 582,
                'title' => 'No dentist found',
                'source_text' => 'no_dentist_found_text',
                'translation_text' => 'Geen tandarts gevonden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:18:25',
                'updated_at' => '2022-09-02 12:00:14',
            ),
            80 =>
            array (
                'id' => 583,
                'title' => 'Press add Tasks',
                'source_text' => 'press_add_task_text',
                'translation_text' => 'Druk op de knop "Taak toevoegen" hieronder om nieuwe notities toe te voegen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:19:06',
                'updated_at' => '2022-08-31 07:19:06',
            ),
            81 =>
            array (
                'id' => 584,
                'title' => 'Recall',
                'source_text' => 'recall_text',
                'translation_text' => 'Terug roepen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:19:26',
                'updated_at' => '2022-09-02 08:59:11',
            ),
            82 =>
            array (
                'id' => 585,
                'title' => 'Fetching Tasks',
                'source_text' => 'fetching_tasks_text',
                'translation_text' => 'Taken ophalen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:19:57',
                'updated_at' => '2022-08-31 07:19:57',
            ),
            83 =>
            array (
                'id' => 586,
                'title' => 'Months',
                'source_text' => 'months_text',
                'translation_text' => 'Maanden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:20:12',
                'updated_at' => '2022-09-02 08:42:03',
            ),
            84 =>
            array (
                'id' => 587,
                'title' => 'No recall',
                'source_text' => 'no_recall_text',
                'translation_text' => 'niet oproepen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:20:39',
                'updated_at' => '2022-09-01 18:37:17',
            ),
            85 =>
            array (
                'id' => 588,
                'title' => 'Add Task',
                'source_text' => 'add_task_text',
                'translation_text' => 'Voeg taak toe',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:20:43',
                'updated_at' => '2022-08-31 07:20:43',
            ),
            86 =>
            array (
                'id' => 589,
                'title' => 'Next recall',
                'source_text' => 'next_recall_text',
                'translation_text' => 'Volgende oproep',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:21:11',
                'updated_at' => '2022-09-06 12:11:35',
            ),
            87 =>
            array (
                'id' => 590,
                'title' => 'Task date',
                'source_text' => 'task_date_text',
                'translation_text' => 'Taakdatum',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:21:33',
                'updated_at' => '2022-08-31 07:21:33',
            ),
            88 =>
            array (
                'id' => 591,
                'title' => 'Mouth hygienist',
                'source_text' => 'mouth_hygienist_text',
                'translation_text' => 'Mond hygienist',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:21:43',
                'updated_at' => '2022-09-02 19:11:52',
            ),
            89 =>
            array (
                'id' => 592,
                'title' => 'No hygienist selected',
                'source_text' => 'no_hygienist_selected_text',
                'translation_text' => 'Geen hygienist geselecteerd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:22:05',
                'updated_at' => '2022-09-06 11:52:45',
            ),
            90 =>
            array (
                'id' => 593,
                'title' => 'Task title',
                'source_text' => 'task_title_text',
                'translation_text' => 'Taak titel',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:22:18',
                'updated_at' => '2022-08-31 07:22:18',
            ),
            91 =>
            array (
                'id' => 594,
                'title' => 'No mouth hygienist found',
                'source_text' => 'no_mouth_hygienist_found_text',
                'translation_text' => 'Geen mondhygienist gevonden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:22:39',
                'updated_at' => '2022-09-02 08:47:45',
            ),
            92 =>
            array (
                'id' => 595,
                'title' => 'Preventive assistant',
                'source_text' => 'preventive_assistant_text',
                'translation_text' => 'Preventieve assistent',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:23:05',
                'updated_at' => '2022-09-06 11:54:38',
            ),
            93 =>
            array (
                'id' => 596,
                'title' => 'Task Description',
                'source_text' => 'task_description_text',
                'translation_text' => 'Taakomschrijving',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:24:36',
                'updated_at' => '2022-08-31 07:24:36',
            ),
            94 =>
            array (
                'id' => 597,
                'title' => 'No preventive assistant',
                'source_text' => 'no_preventive_assistant_text',
                'translation_text' => 'Geen assistent',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:26:42',
                'updated_at' => '2022-09-02 08:41:44',
            ),
            95 =>
            array (
                'id' => 598,
                'title' => 'No preventive assistant found',
                'source_text' => 'no_preventive_assistant_found_text',
                'translation_text' => 'Geen preventieve assistent gevonden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:27:29',
                'updated_at' => '2022-09-01 18:41:42',
            ),
            96 =>
            array (
                'id' => 599,
                'title' => 'Title Error',
                'source_text' => 'title_error_text',
                'translation_text' => 'titelveld is verplicht',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:27:43',
                'updated_at' => '2022-08-31 07:27:43',
            ),
            97 =>
            array (
                'id' => 600,
                'title' => 'Orthodontist',
                'source_text' => 'orthodontist_text',
                'translation_text' => 'Orthodontist',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:27:46',
                'updated_at' => '2022-08-31 07:27:46',
            ),
            98 =>
            array (
                'id' => 601,
                'title' => 'No orthodontist selected',
                'source_text' => 'no_orthodontist_selected_text',
                'translation_text' => 'Geen orthodontist geselecteerd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:28:08',
                'updated_at' => '2022-09-01 18:32:02',
            ),
            99 =>
            array (
                'id' => 602,
                'title' => 'No orthodontist found',
                'source_text' => 'no_orthodontist_found_text',
                'translation_text' => 'geen orthodontist gevonden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:28:59',
                'updated_at' => '2022-09-01 18:17:40',
            ),
            100 =>
            array (
                'id' => 603,
                'title' => 'General practitioner',
                'source_text' => 'general_practitioner_text',
                'translation_text' => 'Huisarts',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:29:17',
                'updated_at' => '2022-09-01 18:16:42',
            ),
            101 =>
            array (
                'id' => 604,
                'title' => 'Date Error',
                'source_text' => 'date_error_text',
                'translation_text' => 'verkeerde datum',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:30:03',
                'updated_at' => '2022-09-02 08:38:43',
            ),
            102 =>
            array (
                'id' => 605,
                'title' => 'Edit Task',
                'source_text' => 'edit_task_text',
                'translation_text' => 'Taak bewerken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:31:17',
                'updated_at' => '2022-08-31 07:31:17',
            ),
            103 =>
            array (
                'id' => 606,
                'title' => 'Patient has no prior scheduled appointments',
                'source_text' => 'no_patient_appointments_text',
                'translation_text' => 'Patiënt heeft geen eerdere geplande afspraken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:33:27',
                'updated_at' => '2022-08-31 07:33:27',
            ),
            104 =>
            array (
                'id' => 607,
                'title' => 'Create Appointment',
                'source_text' => 'create_appointment_text',
                'translation_text' => 'Afspraak maken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:34:36',
                'updated_at' => '2022-08-31 07:34:36',
            ),
            105 =>
            array (
                'id' => 608,
                'title' => 'No general practioner registered',
                'source_text' => 'no_gp_registered',
                'translation_text' => 'Geen huisarts geregistreerd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:37:11',
                'updated_at' => '2022-09-06 12:03:52',
            ),
            106 =>
            array (
                'id' => 609,
                'title' => 'Or',
                'source_text' => 'or_text',
                'translation_text' => 'of',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:37:55',
                'updated_at' => '2022-08-31 07:37:55',
            ),
            107 =>
            array (
                'id' => 610,
                'title' => 'Any extra time',
                'source_text' => 'aet_text',
                'translation_text' => 'Enige extra tijd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:42:14',
                'updated_at' => '2022-09-06 12:07:09',
            ),
            108 =>
            array (
                'id' => 611,
                'title' => 'Patients extra time',
                'source_text' => 'patients_extra_time_text',
                'translation_text' => 'Extra tijd patient',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:42:45',
                'updated_at' => '2022-09-06 12:05:35',
            ),
            109 =>
            array (
                'id' => 612,
                'title' => 'No any extra time selected',
                'source_text' => 'no_aet_selected',
                'translation_text' => 'Geen extra tijd geselecteerd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:43:21',
                'updated_at' => '2022-09-06 12:04:26',
            ),
            110 =>
            array (
                'id' => 613,
                'title' => 'Preferred appointment time',
                'source_text' => 'preferred_appointment_time_text',
                'translation_text' => 'gewenste afspraak tijd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:43:48',
                'updated_at' => '2022-09-06 12:00:30',
            ),
            111 =>
            array (
                'id' => 614,
                'title' => 'No time selected',
                'source_text' => 'no_time_selected_text',
                'translation_text' => 'Geen tijd geselecteerd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:44:16',
                'updated_at' => '2022-09-06 12:02:03',
            ),
            112 =>
            array (
                'id' => 615,
                'title' => 'Selected preffered time',
                'source_text' => 'selected_preffered_time',
                'translation_text' => 'Selecteer gewenste tijd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:44:46',
                'updated_at' => '2022-09-06 11:58:58',
            ),
            113 =>
            array (
                'id' => 616,
                'title' => 'No time found',
                'source_text' => 'no_time_found_text',
                'translation_text' => 'Geen tijd gevonden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:45:12',
                'updated_at' => '2022-09-06 11:50:14',
            ),
            114 =>
            array (
                'id' => 617,
                'title' => 'Main doctor found',
                'source_text' => 'main_doctor_found_text',
                'translation_text' => 'Hoofd arts gevonden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:45:38',
                'updated_at' => '2022-09-06 11:48:38',
            ),
            115 =>
            array (
                'id' => 618,
                'title' => 'No main doctor selected',
                'source_text' => 'no_main_doctor_selected_text',
                'translation_text' => 'Geen arts geselecteerd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:46:07',
                'updated_at' => '2022-09-06 11:42:12',
            ),
            116 =>
            array (
                'id' => 619,
                'title' => 'No main doctor found',
                'source_text' => 'no_main_doctor_found_text',
                'translation_text' => 'Geen dokter gevonden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:46:35',
                'updated_at' => '2022-09-05 12:25:51',
            ),
            117 =>
            array (
                'id' => 620,
                'title' => 'Loadng details',
                'source_text' => 'loadng_details_text',
                'translation_text' => 'Details laden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:46:58',
                'updated_at' => '2022-09-06 11:45:21',
            ),
            118 =>
            array (
                'id' => 621,
                'title' => 'Contact information',
                'source_text' => 'contact_information_text',
                'translation_text' => 'Contact informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:47:52',
                'updated_at' => '2022-09-02 19:15:26',
            ),
            119 =>
            array (
                'id' => 622,
                'title' => 'Add new member',
                'source_text' => 'add_new_member_text',
                'translation_text' => 'nieuw lid toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:48:28',
                'updated_at' => '2022-09-06 11:44:27',
            ),
            120 =>
            array (
                'id' => 623,
                'title' => 'Loading family members',
                'source_text' => 'loading_family_members_text',
                'translation_text' => 'Laden familieleden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:48:58',
                'updated_at' => '2022-09-02 08:41:03',
            ),
            121 =>
            array (
                'id' => 624,
                'title' => 'Child',
                'source_text' => 'child_text',
                'translation_text' => 'Kind',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:49:34',
                'updated_at' => '2022-09-02 08:40:11',
            ),
            122 =>
            array (
                'id' => 625,
                'title' => 'No family members',
                'source_text' => 'no_family_members_text',
                'translation_text' => 'Geen familieleden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:49:58',
                'updated_at' => '2022-09-02 08:39:32',
            ),
            123 =>
            array (
                'id' => 626,
                'title' => 'Add new family member',
                'source_text' => 'add_new_family_member_text',
                'translation_text' => 'Voeg nieuw familielid toe',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:50:22',
                'updated_at' => '2022-09-01 18:38:54',
            ),
            124 =>
            array (
                'id' => 627,
                'title' => 'Insurance Policy Number',
                'source_text' => 'insurancePolicyNumber_text',
                'translation_text' => 'Verzekeringspolisnummer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:50:50',
                'updated_at' => '2022-08-31 07:50:50',
            ),
            125 =>
            array (
                'id' => 628,
                'title' => 'As non patient family member',
                'source_text' => 'as_non_patient_family_member_text',
            'translation_text' => 'Familie lid (niet zijnde patient)',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:51:00',
                'updated_at' => '2022-09-01 18:44:57',
            ),
            126 =>
            array (
                'id' => 629,
                'title' => 'Next of Kin',
                'source_text' => 'next_of_kin_text',
                'translation_text' => 'Familie lid',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:51:38',
                'updated_at' => '2022-09-01 18:44:12',
            ),
            127 =>
            array (
                'id' => 630,
                'title' => 'Check Schedule',
                'source_text' => 'check_schedule_text',
                'translation_text' => 'Controleer schema',
                'lang' => 'nl',
                'created_at' => '2022-08-31 07:52:26',
                'updated_at' => '2022-08-31 07:52:26',
            ),
            128 =>
            array (
                'id' => 631,
                'title' => 'Who is a new patient',
                'source_text' => 'who_is_a_new_patient_text',
                'translation_text' => 'Wie is de nieuwe patient',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:14:19',
                'updated_at' => '2022-09-01 18:39:22',
            ),
            129 =>
            array (
                'id' => 632,
                'title' => 'Who is an existing patient',
                'source_text' => 'who_is_an_existing_patient_text',
                'translation_text' => 'Bestaande patienten',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:15:12',
                'updated_at' => '2022-09-02 12:33:39',
            ),
            130 =>
            array (
                'id' => 633,
                'title' => 'Who is a custodian',
                'source_text' => 'who_is_a_custodian_text',
                'translation_text' => 'Wie is de voogd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:15:37',
                'updated_at' => '2022-09-01 18:36:44',
            ),
            131 =>
            array (
                'id' => 634,
                'title' => 'Add custodian as family member',
                'source_text' => 'add_custodian_as_family_member_text',
                'translation_text' => 'Voogd als familielid toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:16:19',
                'updated_at' => '2022-09-01 18:29:54',
            ),
            132 =>
            array (
                'id' => 635,
                'title' => 'First name is missing',
                'source_text' => 'first_name_is_missing_text',
                'translation_text' => 'Naam mist',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:16:42',
                'updated_at' => '2022-09-01 18:23:41',
            ),
            133 =>
            array (
                'id' => 636,
                'title' => 'Last name is missing',
                'source_text' => 'last_name_is_missing_text',
                'translation_text' => 'Achternaam mist',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:18:32',
                'updated_at' => '2022-09-01 18:23:15',
            ),
            134 =>
            array (
                'id' => 637,
                'title' => 'Phone number is missing',
                'source_text' => 'phone_number_is_missing_text',
                'translation_text' => 'telefoon nummer mist',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:20:11',
                'updated_at' => '2022-09-01 18:17:04',
            ),
            135 =>
            array (
                'id' => 638,
                'title' => 'Secondary phone number',
                'source_text' => 'secondary_phone_number_text',
                'translation_text' => 'tweede telefoon nummer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:20:57',
                'updated_at' => '2022-09-01 18:16:03',
            ),
            136 =>
            array (
                'id' => 639,
                'title' => 'Explanation of',
                'source_text' => 'explanation_of_text',
                'translation_text' => 'Uitleg van',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:22:15',
                'updated_at' => '2022-08-31 08:22:15',
            ),
            137 =>
            array (
                'id' => 640,
                'title' => 'Plaque',
                'source_text' => 'plaque_text',
                'translation_text' => 'Plaque',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:22:56',
                'updated_at' => '2022-08-31 08:22:56',
            ),
            138 =>
            array (
                'id' => 641,
                'title' => 'Index',
                'source_text' => 'index_text',
                'translation_text' => 'Inhoudsopgave',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:23:27',
                'updated_at' => '2022-08-31 08:23:27',
            ),
            139 =>
            array (
                'id' => 642,
                'title' => 'Long term goal',
                'source_text' => 'long_term_goal_text',
                'translation_text' => 'Lange termijn doel',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:24:19',
                'updated_at' => '2022-08-31 08:24:19',
            ),
            140 =>
            array (
                'id' => 643,
                'title' => 'Bitewing',
                'source_text' => 'bitewing_text',
                'translation_text' => 'Bijten',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:24:58',
                'updated_at' => '2022-08-31 08:24:58',
            ),
            141 =>
            array (
                'id' => 644,
                'title' => 'Interval',
                'source_text' => 'interval_text',
                'translation_text' => 'Interval',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:25:50',
                'updated_at' => '2022-08-31 08:25:50',
            ),
            142 =>
            array (
                'id' => 645,
                'title' => 'For which period',
                'source_text' => 'for_which_period_text',
                'translation_text' => 'Voor welke periode?',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:26:42',
                'updated_at' => '2022-08-31 08:26:42',
            ),
            143 =>
            array (
                'id' => 646,
                'title' => 'Email is missing',
                'source_text' => 'email_is_missing_text',
                'translation_text' => 'Email mankeert',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:27:03',
                'updated_at' => '2022-09-06 11:43:47',
            ),
            144 =>
            array (
                'id' => 647,
                'title' => 'What is the long term goal',
                'source_text' => 'what_is_the_long_term_goal',
                'translation_text' => 'Wat is het doel op lange termijn?',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:27:41',
                'updated_at' => '2022-08-31 08:27:41',
            ),
            145 =>
            array (
                'id' => 648,
                'title' => 'Relationship',
                'source_text' => 'relationship_text',
                'translation_text' => 'Relatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:27:56',
                'updated_at' => '2022-09-05 12:24:44',
            ),
            146 =>
            array (
                'id' => 649,
                'title' => 'Choose relationship',
                'source_text' => 'choose_relationship_text',
                'translation_text' => 'Kies familierelatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:28:21',
                'updated_at' => '2022-09-05 12:22:33',
            ),
            147 =>
            array (
                'id' => 650,
                'title' => 'Select a relationship',
                'source_text' => 'select_a_relationship_text',
                'translation_text' => 'Kies relatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:28:46',
                'updated_at' => '2022-09-02 08:52:59',
            ),
            148 =>
            array (
                'id' => 651,
                'title' => 'Select a gender',
                'source_text' => 'select_a_gender_text',
                'translation_text' => 'Kies geslacht',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:29:15',
                'updated_at' => '2022-09-02 08:51:56',
            ),
            149 =>
            array (
                'id' => 652,
                'title' => 'Complete',
                'source_text' => 'complete_text',
                'translation_text' => 'Compleet',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:29:51',
                'updated_at' => '2022-08-31 08:29:51',
            ),
            150 =>
            array (
                'id' => 653,
                'title' => 'Select a marital status',
                'source_text' => 'select_a_marital_status_text',
                'translation_text' => 'Burgerlijke staat',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:30:01',
                'updated_at' => '2022-09-02 08:49:00',
            ),
            151 =>
            array (
                'id' => 654,
                'title' => 'Profile image',
                'source_text' => 'profile_image_text',
                'translation_text' => 'Profiel foto',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:30:25',
                'updated_at' => '2022-09-02 08:46:37',
            ),
            152 =>
            array (
                'id' => 655,
                'title' => 'Clear image',
                'source_text' => 'clear_image_text',
                'translation_text' => 'afbeelding verwijderen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:30:44',
                'updated_at' => '2022-09-02 08:42:45',
            ),
            153 =>
            array (
                'id' => 656,
                'title' => 'Phase',
                'source_text' => 'phase_text',
                'translation_text' => 'Fase',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:30:58',
                'updated_at' => '2022-08-31 08:30:58',
            ),
            154 =>
            array (
                'id' => 657,
                'title' => 'More information',
                'source_text' => 'more_information_text',
                'translation_text' => 'Meer informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:31:05',
                'updated_at' => '2022-09-02 08:46:01',
            ),
            155 =>
            array (
                'id' => 658,
                'title' => 'Date of birth is missing',
                'source_text' => 'date_of_birth_is_missing_text',
                'translation_text' => 'Geen geboorte datum',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:31:33',
                'updated_at' => '2022-09-01 18:14:48',
            ),
            156 =>
            array (
                'id' => 659,
                'title' => 'Draft',
                'source_text' => 'draft_text',
                'translation_text' => 'Voorlopige versie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:31:39',
                'updated_at' => '2022-08-31 08:31:39',
            ),
            157 =>
            array (
                'id' => 660,
                'title' => 'Citizen service number',
                'source_text' => 'citizen_service_number_text',
                'translation_text' => 'BSN nummer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:32:06',
                'updated_at' => '2022-09-02 08:38:05',
            ),
            158 =>
            array (
                'id' => 661,
                'title' => 'Upper',
                'source_text' => 'upper_text',
                'translation_text' => 'Bovenste',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:32:23',
                'updated_at' => '2022-08-31 08:32:23',
            ),
            159 =>
            array (
                'id' => 662,
                'title' => 'Citizen service number is missing',
                'source_text' => 'citizen_service_number_is_missing_text',
                'translation_text' => 'BSN nummer ontbreekt',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:32:36',
                'updated_at' => '2022-09-02 12:30:15',
            ),
            160 =>
            array (
                'id' => 663,
                'title' => 'Nationality',
                'source_text' => 'nationality_text',
                'translation_text' => 'Nationaliteit',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:32:57',
                'updated_at' => '2022-09-01 18:45:58',
            ),
            161 =>
            array (
                'id' => 664,
                'title' => 'Lower',
                'source_text' => 'lower_text',
                'translation_text' => 'Lager',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:32:59',
                'updated_at' => '2022-08-31 08:32:59',
            ),
            162 =>
            array (
                'id' => 665,
                'title' => 'Choose a nationality',
                'source_text' => 'choose_a_nationality_text',
                'translation_text' => 'Kies nationaliteit',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:33:21',
                'updated_at' => '2022-09-01 18:12:24',
            ),
            163 =>
            array (
                'id' => 666,
                'title' => 'Selected',
                'source_text' => 'selected_text',
                'translation_text' => 'Geselecteerd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:33:47',
                'updated_at' => '2022-08-31 08:33:47',
            ),
            164 =>
            array (
                'id' => 667,
                'title' => 'None',
                'source_text' => 'none_text',
                'translation_text' => 'Geen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:34:21',
                'updated_at' => '2022-08-31 08:34:21',
            ),
            165 =>
            array (
                'id' => 668,
                'title' => 'Search',
                'source_text' => 'search_text',
                'translation_text' => 'Zoeken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:35:04',
                'updated_at' => '2022-08-31 08:35:04',
            ),
            166 =>
            array (
                'id' => 669,
                'title' => 'Select a nationality',
                'source_text' => 'select_a_nationality_text',
                'translation_text' => 'Selecteer nationaliteit',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:35:54',
                'updated_at' => '2022-09-01 18:45:28',
            ),
            167 =>
            array (
                'id' => 670,
                'title' => 'Tooth',
                'source_text' => 'tooth_text',
                'translation_text' => 'Tand',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:35:54',
                'updated_at' => '2022-08-31 08:35:54',
            ),
            168 =>
            array (
                'id' => 671,
                'title' => 'Implant',
                'source_text' => 'implant_text',
                'translation_text' => 'implantaat',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:36:42',
                'updated_at' => '2022-08-31 08:36:42',
            ),
            169 =>
            array (
                'id' => 672,
                'title' => 'Select a country',
                'source_text' => 'select_a_country_text',
                'translation_text' => 'Selecteer land',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:36:42',
                'updated_at' => '2022-09-01 18:30:51',
            ),
            170 =>
            array (
                'id' => 673,
                'title' => 'Select a city',
                'source_text' => 'select_a_city_text',
                'translation_text' => 'Selecteer stad',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:37:03',
                'updated_at' => '2022-09-01 18:37:42',
            ),
            171 =>
            array (
                'id' => 674,
                'title' => 'Street',
                'source_text' => 'street_text',
                'translation_text' => 'Straat',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:37:30',
                'updated_at' => '2022-09-01 18:36:04',
            ),
            172 =>
            array (
                'id' => 675,
                'title' => 'Street is missing',
                'source_text' => 'street_is_missing_text',
                'translation_text' => 'Straat ontbreekt',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:37:52',
                'updated_at' => '2022-09-02 12:28:23',
            ),
            173 =>
            array (
                'id' => 676,
                'title' => 'Home address',
                'source_text' => 'home_address_text',
                'translation_text' => 'Huis adres',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:38:26',
                'updated_at' => '2022-09-01 18:35:15',
            ),
            174 =>
            array (
                'id' => 677,
                'title' => 'Home address is missing',
                'source_text' => 'home_address_is_missing_text',
                'translation_text' => 'Huis adres ontbreekt',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:38:49',
                'updated_at' => '2022-09-02 12:31:16',
            ),
            175 =>
            array (
                'id' => 678,
                'title' => 'To view Historical Data, Select a Date',
                'source_text' => 'to_view_history_text',
                'translation_text' => 'Selecteer een datum om historische gegevens te bekijken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:39:16',
                'updated_at' => '2022-08-31 08:39:16',
            ),
            176 =>
            array (
                'id' => 679,
                'title' => 'State is missing',
                'source_text' => 'state_is_missing_text',
                'translation_text' => 'Province ontbreekt',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:39:26',
                'updated_at' => '2022-09-02 12:31:42',
            ),
            177 =>
            array (
                'id' => 680,
                'title' => 'Left',
                'source_text' => 'left_text',
                'translation_text' => 'Links',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:39:51',
                'updated_at' => '2022-08-31 08:39:51',
            ),
            178 =>
            array (
                'id' => 681,
                'title' => 'Postal code',
                'source_text' => 'postal_code_text',
                'translation_text' => 'Postcode',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:40:19',
                'updated_at' => '2022-09-01 18:21:49',
            ),
            179 =>
            array (
                'id' => 682,
                'title' => 'Right',
                'source_text' => 'right_text',
                'translation_text' => 'Rechts',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:40:29',
                'updated_at' => '2022-08-31 08:40:29',
            ),
            180 =>
            array (
                'id' => 683,
                'title' => 'Postal code is missing',
                'source_text' => 'postal_code_is_missing_text',
                'translation_text' => 'Postcode ontbreekt',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:41:02',
                'updated_at' => '2022-09-02 12:32:27',
            ),
            181 =>
            array (
                'id' => 684,
                'title' => 'Choose',
                'source_text' => 'choose_text',
                'translation_text' => 'Kiezen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:41:12',
                'updated_at' => '2022-08-31 08:41:12',
            ),
            182 =>
            array (
                'id' => 685,
                'title' => 'Submit',
                'source_text' => 'submit_text',
                'translation_text' => 'Opslaan',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:41:29',
                'updated_at' => '2022-09-01 18:29:22',
            ),
            183 =>
            array (
                'id' => 686,
                'title' => 'Notes',
                'source_text' => 'notes_text',
                'translation_text' => 'Opmerkingen:',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:42:06',
                'updated_at' => '2022-08-31 08:42:06',
            ),
            184 =>
            array (
                'id' => 687,
                'title' => 'Select a region',
                'source_text' => 'select_a_region_text',
                'translation_text' => 'Selecteer regio',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:42:12',
                'updated_at' => '2022-09-01 18:21:25',
            ),
            185 =>
            array (
                'id' => 688,
                'title' => 'Selected patient',
                'source_text' => 'selected_patient_text',
                'translation_text' => 'Selecteer patient',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:42:33',
                'updated_at' => '2022-09-01 18:21:01',
            ),
            186 =>
            array (
                'id' => 689,
                'title' => 'Search patient here',
                'source_text' => 'search_patient_here_text',
                'translation_text' => 'Zoek patient',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:42:53',
                'updated_at' => '2022-09-01 18:20:36',
            ),
            187 =>
            array (
                'id' => 690,
                'title' => 'Loading patients',
                'source_text' => 'loading_patients_text',
                'translation_text' => 'Patienten laden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:43:13',
                'updated_at' => '2022-09-01 18:20:00',
            ),
            188 =>
            array (
                'id' => 691,
                'title' => 'Add non patient family member',
                'source_text' => 'add_non_patient_family_member_text',
            'translation_text' => 'Familie lid (geen patient)',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:43:37',
                'updated_at' => '2022-09-01 18:19:35',
            ),
            189 =>
            array (
                'id' => 692,
                'title' => 'Four numbers two letters',
                'source_text' => 'four_numbers_two_letters_text',
                'translation_text' => 'vier nummers en twee letters',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:44:08',
                'updated_at' => '2022-09-01 18:15:26',
            ),
            190 =>
            array (
                'id' => 693,
                'title' => 'Not Available',
                'source_text' => 'not_available_text',
                'translation_text' => 'Niet beschikbaar',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:44:15',
                'updated_at' => '2022-08-31 08:44:15',
            ),
            191 =>
            array (
                'id' => 694,
                'title' => 'Add family member who is a new patient',
                'source_text' => 'add_family_member_who_is_a_new_patient_text',
                'translation_text' => 'voeg familielid toe als nieuwe patient',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:44:41',
                'updated_at' => '2022-09-01 18:13:01',
            ),
            192 =>
            array (
                'id' => 695,
                'title' => 'Not',
                'source_text' => 'not_text',
                'translation_text' => 'Niet',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:44:57',
                'updated_at' => '2022-08-31 08:44:57',
            ),
            193 =>
            array (
                'id' => 696,
                'title' => 'Available',
                'source_text' => 'available_text',
                'translation_text' => 'beschikbaar',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:45:40',
                'updated_at' => '2022-08-31 08:45:40',
            ),
            194 =>
            array (
                'id' => 697,
                'title' => 'Profile',
                'source_text' => 'profile_text',
                'translation_text' => 'Profiel',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:45:49',
                'updated_at' => '2022-09-01 18:22:33',
            ),
            195 =>
            array (
                'id' => 698,
                'title' => 'Phone',
                'source_text' => 'phone_text',
                'translation_text' => 'Telefoon',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:46:05',
                'updated_at' => '2022-09-01 18:22:13',
            ),
            196 =>
            array (
                'id' => 699,
                'title' => 'Personal information',
                'source_text' => 'personal_information_text',
                'translation_text' => 'Persoonlijke informatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:46:24',
                'updated_at' => '2022-09-01 18:13:34',
            ),
            197 =>
            array (
                'id' => 700,
                'title' => 'Relation',
                'source_text' => 'relation_text',
                'translation_text' => 'Relatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:46:43',
                'updated_at' => '2022-09-01 18:07:43',
            ),
            198 =>
            array (
                'id' => 701,
                'title' => 'Assesment',
                'source_text' => 'assesment_text',
                'translation_text' => 'beoordeling',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:46:51',
                'updated_at' => '2022-08-31 08:46:51',
            ),
            199 =>
            array (
                'id' => 702,
                'title' => 'No relation registered',
                'source_text' => 'no_relation_registered_text',
                'translation_text' => 'geen relatie geregistreerd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:47:07',
                'updated_at' => '2022-09-01 18:14:20',
            ),
            200 =>
            array (
                'id' => 703,
                'title' => 'Mother',
                'source_text' => 'mother_text',
                'translation_text' => 'Moeder',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:47:24',
                'updated_at' => '2022-09-01 18:11:19',
            ),
            201 =>
            array (
                'id' => 704,
                'title' => 'Father',
                'source_text' => 'father_text',
                'translation_text' => 'vader',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:47:44',
                'updated_at' => '2022-09-01 18:04:49',
            ),
            202 =>
            array (
                'id' => 705,
                'title' => 'Recommend',
                'source_text' => 'recommend_text',
                'translation_text' => 'Adviseren',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:48:02',
                'updated_at' => '2022-08-31 08:48:02',
            ),
            203 =>
            array (
                'id' => 706,
                'title' => 'Brother',
                'source_text' => 'brother_text',
                'translation_text' => 'Broer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:48:05',
                'updated_at' => '2022-09-01 18:09:54',
            ),
            204 =>
            array (
                'id' => 707,
                'title' => 'Sister',
                'source_text' => 'sister_text',
                'translation_text' => 'zuster',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:48:22',
                'updated_at' => '2022-09-01 18:05:20',
            ),
            205 =>
            array (
                'id' => 708,
                'title' => 'Recommended',
                'source_text' => 'recommended_text',
                'translation_text' => 'Aanbevolen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:48:37',
                'updated_at' => '2022-08-31 08:48:37',
            ),
            206 =>
            array (
                'id' => 709,
                'title' => 'Spouse',
                'source_text' => 'spouse_text',
                'translation_text' => 'Echtgenoot',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:48:49',
                'updated_at' => '2022-09-01 18:08:46',
            ),
            207 =>
            array (
                'id' => 710,
                'title' => 'Cousin',
                'source_text' => 'cousin_text',
                'translation_text' => 'Neef/nicht',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:49:16',
                'updated_at' => '2022-09-01 18:50:25',
            ),
            208 =>
            array (
                'id' => 711,
                'title' => 'No PPS data found as per last appointment',
                'source_text' => 'no_pps_data_text',
                'translation_text' => 'Geen PPS-gegevens gevonden volgens laatste afspraak',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:49:25',
                'updated_at' => '2022-08-31 08:49:25',
            ),
            209 =>
            array (
                'id' => 712,
                'title' => 'Daughter',
                'source_text' => 'daughter_text',
                'translation_text' => 'Dochter',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:49:32',
                'updated_at' => '2022-09-01 18:06:54',
            ),
            210 =>
            array (
                'id' => 713,
                'title' => 'Son',
                'source_text' => 'son_text',
                'translation_text' => 'Zoon',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:49:51',
                'updated_at' => '2022-09-01 18:06:31',
            ),
            211 =>
            array (
                'id' => 714,
                'title' => 'Uncle',
                'source_text' => 'uncle_text',
                'translation_text' => 'Oom',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:50:08',
                'updated_at' => '2022-09-01 18:06:13',
            ),
            212 =>
            array (
                'id' => 715,
                'title' => 'Aunt',
                'source_text' => 'aunt_text',
                'translation_text' => 'tante',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:50:46',
                'updated_at' => '2022-09-01 18:05:49',
            ),
            213 =>
            array (
                'id' => 716,
                'title' => 'Review',
                'source_text' => 'review_text',
                'translation_text' => 'Opnieuw bekijken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:51:10',
                'updated_at' => '2022-08-31 08:51:10',
            ),
            214 =>
            array (
                'id' => 717,
                'title' => 'Jaw',
                'source_text' => 'jaw_text',
                'translation_text' => 'Kaak',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:51:44',
                'updated_at' => '2022-08-31 08:51:44',
            ),
            215 =>
            array (
                'id' => 718,
                'title' => 'Cold',
                'source_text' => 'cold_text',
                'translation_text' => 'Koud',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:52:19',
                'updated_at' => '2022-08-31 08:52:19',
            ),
            216 =>
            array (
                'id' => 719,
                'title' => 'Grand Parent',
                'source_text' => 'grandparent_text',
                'translation_text' => 'Groot ouder',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:52:27',
                'updated_at' => '2022-09-01 18:09:37',
            ),
            217 =>
            array (
                'id' => 720,
                'title' => 'Single',
                'source_text' => 'singe_text',
                'translation_text' => 'Alleenstaand',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:53:00',
                'updated_at' => '2022-09-01 18:10:51',
            ),
            218 =>
            array (
                'id' => 721,
                'title' => 'Percussion',
                'source_text' => 'percussion_text',
                'translation_text' => 'Percussie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:53:04',
                'updated_at' => '2022-08-31 08:53:04',
            ),
            219 =>
            array (
                'id' => 722,
                'title' => 'Palpation',
                'source_text' => 'palpation_text',
                'translation_text' => 'palpatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:53:52',
                'updated_at' => '2022-08-31 08:53:52',
            ),
            220 =>
            array (
                'id' => 723,
                'title' => 'Divorced',
                'source_text' => 'divorced_text',
                'translation_text' => 'Gescheiden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:54:09',
                'updated_at' => '2022-09-01 13:37:06',
            ),
            221 =>
            array (
                'id' => 724,
                'title' => 'Engaged',
                'source_text' => 'engaged_text',
                'translation_text' => 'verloofd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:54:33',
                'updated_at' => '2022-09-01 18:03:18',
            ),
            222 =>
            array (
                'id' => 725,
                'title' => 'Heat',
                'source_text' => 'heat_text',
                'translation_text' => 'Warmte',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:54:47',
                'updated_at' => '2022-08-31 08:54:47',
            ),
            223 =>
            array (
                'id' => 726,
                'title' => 'Separated',
                'source_text' => 'separated_text',
                'translation_text' => 'Gescheiden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:55:13',
                'updated_at' => '2022-09-01 14:18:16',
            ),
            224 =>
            array (
                'id' => 727,
                'title' => 'Electricity',
                'source_text' => 'electricity_text',
                'translation_text' => 'Elektriciteit',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:55:20',
                'updated_at' => '2022-08-31 08:55:20',
            ),
            225 =>
            array (
                'id' => 728,
                'title' => 'Added custodian sucessfully',
                'source_text' => 'added_custodian_sucessfully_text',
                'translation_text' => 'Voogd toegevoegd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:55:38',
                'updated_at' => '2022-09-01 18:09:16',
            ),
            226 =>
            array (
                'id' => 729,
                'title' => 'Test',
                'source_text' => 'test_text',
                'translation_text' => 'Testen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:55:48',
                'updated_at' => '2022-08-31 08:55:48',
            ),
            227 =>
            array (
                'id' => 730,
                'title' => 'Success',
                'source_text' => 'success_text',
                'translation_text' => 'Success',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:55:55',
                'updated_at' => '2022-08-31 08:55:55',
            ),
            228 =>
            array (
                'id' => 731,
                'title' => 'Patient added successfully',
                'source_text' => 'patient_added_successfully_text',
                'translation_text' => 'Patient toegevoegd',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:56:16',
                'updated_at' => '2022-09-02 16:22:57',
            ),
            229 =>
            array (
                'id' => 732,
                'title' => 'Distal',
                'source_text' => 'distal_text',
                'translation_text' => 'distaal',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:56:23',
                'updated_at' => '2022-08-31 08:56:23',
            ),
            230 =>
            array (
                'id' => 733,
                'title' => 'Ok',
                'source_text' => 'ok_text',
                'translation_text' => 'Ok',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:56:54',
                'updated_at' => '2022-08-31 08:56:54',
            ),
            231 =>
            array (
                'id' => 734,
                'title' => 'Patient biography',
                'source_text' => 'patient_biography_text',
                'translation_text' => 'Persoonlijke informatie patient',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:57:22',
                'updated_at' => '2022-09-01 18:08:23',
            ),
            232 =>
            array (
                'id' => 735,
                'title' => 'Fill in the patients biography information',
                'source_text' => 'fill_in_the_patients_biography_information_text',
                'translation_text' => 'persoonlijke informatie van de patient invullen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:57:51',
                'updated_at' => '2022-09-01 18:04:24',
            ),
            233 =>
            array (
                'id' => 736,
                'title' => 'Next of kin information',
                'source_text' => 'next_of_kin_information',
                'translation_text' => 'informatie van familielid',
                'lang' => 'nl',
                'created_at' => '2022-08-31 08:59:35',
                'updated_at' => '2022-09-01 18:02:40',
            ),
            234 =>
            array (
                'id' => 737,
                'title' => 'Fill in all the details of the patients next of kin text',
                'source_text' => 'fill_in_all_the_details_of_the_patients_next_of_kin_text',
                'translation_text' => 'informatie familielid invullen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:00:29',
                'updated_at' => '2022-09-01 18:02:04',
            ),
            235 =>
            array (
                'id' => 738,
            'title' => 'Nok fullname (next of kin)',
                'source_text' => 'nok_fullname_text',
                'translation_text' => 'volledige naam familielid',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:01:20',
                'updated_at' => '2022-09-01 18:00:37',
            ),
            236 =>
            array (
                'id' => 739,
                'title' => 'nok phone number',
                'source_text' => 'nok_phone_number_text',
                'translation_text' => 'Telefoon nummer familielid',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:01:52',
                'updated_at' => '2022-09-01 18:49:16',
            ),
            237 =>
            array (
                'id' => 740,
                'title' => 'nok email address',
                'source_text' => 'nok_email_address_text',
                'translation_text' => 'familielid email adres',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:04:02',
                'updated_at' => '2022-09-02 08:50:10',
            ),
            238 =>
            array (
                'id' => 741,
                'title' => 'Minor please fill in the family member section',
                'source_text' => 'minor_please_fill_in_the_family_member_section_text',
                'translation_text' => 'Minderjarig vul familie lid sectie in',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:04:39',
                'updated_at' => '2022-09-01 14:31:13',
            ),
            239 =>
            array (
                'id' => 742,
                'title' => 'Choose family member',
                'source_text' => 'choose_family_member_text',
                'translation_text' => 'Kies familie lid',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:05:00',
                'updated_at' => '2022-09-01 14:17:47',
            ),
            240 =>
            array (
                'id' => 743,
                'title' => 'Select a family member',
                'source_text' => 'select_a_family_member_text',
                'translation_text' => 'Selecteer familie lid',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:06:14',
                'updated_at' => '2022-09-01 14:15:50',
            ),
            241 =>
            array (
                'id' => 744,
                'title' => 'Member name',
                'source_text' => 'member_name_text',
                'translation_text' => 'Naam lid',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:06:33',
                'updated_at' => '2022-09-01 14:16:53',
            ),
            242 =>
            array (
                'id' => 745,
                'title' => 'nok member contact',
                'source_text' => 'nok_member_contact_text',
                'translation_text' => 'contact familielid',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:06:56',
                'updated_at' => '2022-09-01 18:01:05',
            ),
            243 =>
            array (
                'id' => 746,
                'title' => 'Member insurance company',
                'source_text' => 'member_insurance_company_text',
                'translation_text' => 'Verzekering maatschappij',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:07:18',
                'updated_at' => '2022-09-01 14:14:08',
            ),
            244 =>
            array (
                'id' => 747,
                'title' => 'Palatal',
                'source_text' => 'palatal_text',
                'translation_text' => 'Palataal',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:07:24',
                'updated_at' => '2022-08-31 09:07:24',
            ),
            245 =>
            array (
                'id' => 748,
                'title' => 'Member insurance policy number',
                'source_text' => 'member_insurance_policy_number_text',
                'translation_text' => 'Verzekerings polis nummer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:07:43',
                'updated_at' => '2022-09-01 14:13:33',
            ),
            246 =>
            array (
                'id' => 749,
                'title' => 'Mesio',
                'source_text' => 'mesio_text',
                'translation_text' => 'Mesio',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:07:58',
                'updated_at' => '2022-08-31 09:07:58',
            ),
            247 =>
            array (
                'id' => 750,
                'title' => 'Member email',
                'source_text' => 'member_email_text',
                'translation_text' => 'Email',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:08:06',
                'updated_at' => '2022-09-01 14:12:20',
            ),
            248 =>
            array (
                'id' => 751,
                'title' => 'Continue to address',
                'source_text' => 'continue_to_address_text',
                'translation_text' => 'Ga naar adres',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:08:30',
                'updated_at' => '2022-09-01 14:04:43',
            ),
            249 =>
            array (
                'id' => 752,
                'title' => 'Buccal',
                'source_text' => 'buccal_text',
                'translation_text' => 'Buccaal',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:08:43',
                'updated_at' => '2022-08-31 09:08:43',
            ),
            250 =>
            array (
                'id' => 753,
                'title' => 'Take photo',
                'source_text' => 'take_photo_text',
                'translation_text' => 'Neem een foto',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:08:52',
                'updated_at' => '2022-09-01 14:16:22',
            ),
            251 =>
            array (
                'id' => 754,
                'title' => 'Upload from device',
                'source_text' => 'upload_from_device_text',
                'translation_text' => 'Opladen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:09:18',
                'updated_at' => '2022-09-01 14:11:32',
            ),
            252 =>
            array (
                'id' => 755,
                'title' => 'Clear current photo',
                'source_text' => 'clear_current_photo_text',
                'translation_text' => 'foto verwijderen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:09:39',
                'updated_at' => '2022-09-01 14:10:56',
            ),
            253 =>
            array (
                'id' => 756,
                'title' => 'Treat',
                'source_text' => 'treat_text',
                'translation_text' => 'Behandel',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:11:41',
                'updated_at' => '2022-09-01 14:10:12',
            ),
            254 =>
            array (
                'id' => 757,
                'title' => 'Monitor',
                'source_text' => 'monitor_text',
                'translation_text' => 'blijven controleren',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:14:54',
                'updated_at' => '2022-09-01 14:07:01',
            ),
            255 =>
            array (
                'id' => 758,
                'title' => 'Decay',
                'source_text' => 'decay_text',
                'translation_text' => 'Tand bederf',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:17:52',
                'updated_at' => '2022-09-01 14:06:00',
            ),
            256 =>
            array (
                'id' => 759,
                'title' => 'Fracture',
                'source_text' => 'fracture_text',
                'translation_text' => 'Breuk',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:21:20',
                'updated_at' => '2022-08-31 09:21:20',
            ),
            257 =>
            array (
                'id' => 760,
                'title' => 'Apical',
                'source_text' => 'apical_text',
                'translation_text' => 'apicaal',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:21:54',
                'updated_at' => '2022-08-31 09:21:54',
            ),
            258 =>
            array (
                'id' => 761,
                'title' => 'Development',
                'source_text' => 'development_text',
                'translation_text' => 'Ontwikkeling',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:22:38',
                'updated_at' => '2022-08-31 09:22:38',
            ),
            259 =>
            array (
                'id' => 762,
                'title' => 'Discoloration',
                'source_text' => 'discoloration_text',
                'translation_text' => 'Verkleuring',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:26:14',
                'updated_at' => '2022-08-31 09:26:14',
            ),
            260 =>
            array (
                'id' => 763,
                'title' => 'Disorder',
                'source_text' => 'disorder_text',
                'translation_text' => 'Afwijking',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:26:59',
                'updated_at' => '2022-09-01 14:03:19',
            ),
            261 =>
            array (
                'id' => 764,
                'title' => 'Dentin',
                'source_text' => 'dentin_text',
                'translation_text' => 'Dentine',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:29:11',
                'updated_at' => '2022-08-31 09:29:11',
            ),
            262 =>
            array (
                'id' => 765,
                'title' => 'Enamel',
                'source_text' => 'enamel_text',
                'translation_text' => 'Glazuur',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:32:39',
                'updated_at' => '2022-08-31 09:32:39',
            ),
            263 =>
            array (
                'id' => 766,
                'title' => 'Caviation',
                'source_text' => 'caviation_text',
                'translation_text' => 'Cavitatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:33:21',
                'updated_at' => '2022-08-31 09:33:21',
            ),
            264 =>
            array (
                'id' => 767,
                'title' => 'Number',
                'source_text' => 'number_text',
                'translation_text' => 'Nummer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:39:20',
                'updated_at' => '2022-08-31 09:39:20',
            ),
            265 =>
            array (
                'id' => 768,
                'title' => 'Crown',
                'source_text' => 'crown_text',
                'translation_text' => 'Kroon',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:40:07',
                'updated_at' => '2022-08-31 09:40:07',
            ),
            266 =>
            array (
                'id' => 769,
                'title' => 'Root',
                'source_text' => 'root_text',
                'translation_text' => 'Wortel',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:41:24',
                'updated_at' => '2022-08-31 09:41:24',
            ),
            267 =>
            array (
                'id' => 770,
                'title' => 'Vertical',
                'source_text' => 'vertical_text',
                'translation_text' => 'Verticaal',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:42:09',
                'updated_at' => '2022-08-31 09:42:09',
            ),
            268 =>
            array (
                'id' => 771,
                'title' => 'Horizontal',
                'source_text' => 'horizontal_text',
                'translation_text' => 'Horizontaal',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:42:55',
                'updated_at' => '2022-08-31 09:42:55',
            ),
            269 =>
            array (
                'id' => 772,
                'title' => 'Gray',
                'source_text' => 'gray_text',
                'translation_text' => 'Grijs',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:48:50',
                'updated_at' => '2022-08-31 09:48:50',
            ),
            270 =>
            array (
                'id' => 773,
                'title' => 'Red',
                'source_text' => 'red_text',
                'translation_text' => 'Rood',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:56:02',
                'updated_at' => '2022-08-31 09:56:02',
            ),
            271 =>
            array (
                'id' => 774,
                'title' => 'Yellow',
                'source_text' => 'yellow_text',
                'translation_text' => 'Geel',
                'lang' => 'nl',
                'created_at' => '2022-08-31 09:56:45',
                'updated_at' => '2022-08-31 09:56:45',
            ),
            272 =>
            array (
                'id' => 775,
                'title' => 'Abrasion',
                'source_text' => 'abrasion_text',
                'translation_text' => 'Slijtage',
                'lang' => 'nl',
                'created_at' => '2022-08-31 10:01:26',
                'updated_at' => '2022-08-31 10:01:26',
            ),
            273 =>
            array (
                'id' => 776,
                'title' => 'Erosion',
                'source_text' => 'erosion_text',
                'translation_text' => 'Erosie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 10:03:02',
                'updated_at' => '2022-08-31 10:03:02',
            ),
            274 =>
            array (
                'id' => 777,
                'title' => 'Plan',
                'source_text' => 'plan_text',
                'translation_text' => 'Plan',
                'lang' => 'nl',
                'created_at' => '2022-08-31 10:04:35',
                'updated_at' => '2022-08-31 10:04:35',
            ),
            275 =>
            array (
                'id' => 778,
                'title' => 'Filling',
                'source_text' => 'filling_text',
                'translation_text' => 'Vulling',
                'lang' => 'nl',
                'created_at' => '2022-08-31 10:06:53',
                'updated_at' => '2022-08-31 10:06:53',
            ),
            276 =>
            array (
                'id' => 779,
                'title' => 'Partial',
                'source_text' => 'partial_text',
                'translation_text' => 'Gedeeltelijk',
                'lang' => 'nl',
                'created_at' => '2022-08-31 10:07:35',
                'updated_at' => '2022-08-31 10:07:35',
            ),
            277 =>
            array (
                'id' => 780,
                'title' => 'Bridges',
                'source_text' => 'bridges_text',
                'translation_text' => 'Bruggen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 10:13:33',
                'updated_at' => '2022-08-31 10:13:33',
            ),
            278 =>
            array (
                'id' => 781,
                'title' => 'Bridge',
                'source_text' => 'bridge_text',
                'translation_text' => 'Brug',
                'lang' => 'nl',
                'created_at' => '2022-08-31 10:18:33',
                'updated_at' => '2022-08-31 10:18:33',
            ),
            279 =>
            array (
                'id' => 782,
                'title' => 'Composite',
                'source_text' => 'composite_text',
                'translation_text' => 'Composiet',
                'lang' => 'nl',
                'created_at' => '2022-08-31 10:55:32',
                'updated_at' => '2022-08-31 10:55:32',
            ),
            280 =>
            array (
                'id' => 783,
                'title' => 'Amalgam',
                'source_text' => 'amalgam_text',
                'translation_text' => 'Amalgaam',
                'lang' => 'nl',
                'created_at' => '2022-08-31 10:56:24',
                'updated_at' => '2022-08-31 10:56:24',
            ),
            281 =>
            array (
                'id' => 784,
                'title' => 'Glasionomer',
                'source_text' => 'glasionomer_text',
                'translation_text' => 'Glasionomeer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:08:35',
                'updated_at' => '2022-08-31 11:08:35',
            ),
            282 =>
            array (
                'id' => 785,
                'title' => 'Material',
                'source_text' => 'material_text',
                'translation_text' => 'Materiaal',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:09:57',
                'updated_at' => '2022-08-31 11:09:57',
            ),
            283 =>
            array (
                'id' => 786,
                'title' => 'Configure',
                'source_text' => 'configure_text',
                'translation_text' => 'Configureren',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:11:24',
                'updated_at' => '2022-08-31 11:11:24',
            ),
            284 =>
            array (
                'id' => 787,
                'title' => 'Adhesive',
                'source_text' => 'adhesive_text',
                'translation_text' => 'Zelfklevend',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:12:08',
                'updated_at' => '2022-08-31 11:12:08',
            ),
            285 =>
            array (
                'id' => 788,
                'title' => 'Colors',
                'source_text' => 'colors_text',
                'translation_text' => 'Kleuren',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:12:58',
                'updated_at' => '2022-08-31 11:12:58',
            ),
            286 =>
            array (
                'id' => 789,
                'title' => 'Comments',
                'source_text' => 'comments_text',
                'translation_text' => 'Opmerkingen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:13:46',
                'updated_at' => '2022-08-31 11:13:46',
            ),
            287 =>
            array (
                'id' => 790,
                'title' => 'Comment',
                'source_text' => 'comment_text',
                'translation_text' => 'Opmerking',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:14:25',
                'updated_at' => '2022-08-31 11:14:25',
            ),
            288 =>
            array (
                'id' => 791,
                'title' => 'Metal',
                'source_text' => 'metal_text',
                'translation_text' => 'Metaal',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:15:26',
                'updated_at' => '2022-08-31 11:15:26',
            ),
            289 =>
            array (
                'id' => 792,
                'title' => 'Are you sure',
                'source_text' => 'are_you_sure_text',
                'translation_text' => 'Weet je het zeker',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:16:22',
                'updated_at' => '2022-08-31 11:16:22',
            ),
            290 =>
            array (
                'id' => 793,
                'title' => 'Proceed',
                'source_text' => 'proceed_text',
                'translation_text' => 'Doorgaan',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:17:00',
                'updated_at' => '2022-08-31 11:17:00',
            ),
            291 =>
            array (
                'id' => 794,
                'title' => 'You won\'t be able to revert this action after confirming',
                'source_text' => 'revert_blocked_text',
                'translation_text' => 'U kunt deze actie niet ongedaan maken na bevestiging',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:17:52',
                'updated_at' => '2022-08-31 11:17:52',
            ),
            292 =>
            array (
                'id' => 795,
                'title' => 'Patient Confirmation Signature',
                'source_text' => 'patient_confirmation_text',
                'translation_text' => 'Handtekening van de patiënt ter bevestiging',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:19:04',
                'updated_at' => '2022-09-01 14:01:49',
            ),
            293 =>
            array (
                'id' => 796,
                'title' => 'Clear',
                'source_text' => 'clear_text',
                'translation_text' => 'Duidelijk',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:19:49',
                'updated_at' => '2022-08-31 11:19:49',
            ),
            294 =>
            array (
                'id' => 797,
                'title' => 'Option',
                'source_text' => 'option_text',
                'translation_text' => 'Keuze',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:20:38',
                'updated_at' => '2022-08-31 11:20:38',
            ),
            295 =>
            array (
                'id' => 798,
                'title' => 'Notification',
                'source_text' => 'notification_text',
                'translation_text' => 'Kennisgeving',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:21:46',
                'updated_at' => '2022-08-31 11:21:46',
            ),
            296 =>
            array (
                'id' => 799,
                'title' => 'Sign',
                'source_text' => 'sign_text',
                'translation_text' => 'Tekenen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:22:45',
                'updated_at' => '2022-09-01 14:00:03',
            ),
            297 =>
            array (
                'id' => 800,
                'title' => 'Sign off',
                'source_text' => 'sign_off_text',
                'translation_text' => 'Afmelden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:23:26',
                'updated_at' => '2022-08-31 11:23:26',
            ),
            298 =>
            array (
                'id' => 801,
                'title' => 'Send',
                'source_text' => 'send_text',
                'translation_text' => 'Versturen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:24:59',
                'updated_at' => '2022-08-31 11:24:59',
            ),
            299 =>
            array (
                'id' => 802,
                'title' => 'Or notify patient by',
                'source_text' => 'notify_by_text',
                'translation_text' => 'Of verwittig de patiënt door',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:27:23',
                'updated_at' => '2022-08-31 11:27:23',
            ),
            300 =>
            array (
                'id' => 803,
                'title' => 'Bleeding on Probing',
                'source_text' => 'bleeding_probing_text',
                'translation_text' => 'Bloeden bij sonderen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:28:21',
                'updated_at' => '2022-08-31 11:28:21',
            ),
            301 =>
            array (
                'id' => 804,
                'title' => 'Gingival Margin',
                'source_text' => 'gingival_margin_text',
                'translation_text' => 'Gingivale marge',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:29:56',
                'updated_at' => '2022-08-31 11:29:56',
            ),
            302 =>
            array (
                'id' => 805,
                'title' => 'Probing Depth',
                'source_text' => 'probing_depth_text',
                'translation_text' => 'test diepte',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:31:16',
                'updated_at' => '2022-09-01 13:59:24',
            ),
            303 =>
            array (
                'id' => 806,
                'title' => 'Furcation',
                'source_text' => 'furcation_text',
                'translation_text' => 'Furcatie',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:32:05',
                'updated_at' => '2022-08-31 11:32:05',
            ),
            304 =>
            array (
                'id' => 807,
                'title' => 'Lingual',
                'source_text' => 'lingual_text',
                'translation_text' => 'Taal',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:33:22',
                'updated_at' => '2022-09-01 13:54:51',
            ),
            305 =>
            array (
                'id' => 808,
                'title' => 'Mobility',
                'source_text' => 'mobility_text',
                'translation_text' => 'Mobiliteit',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:34:09',
                'updated_at' => '2022-08-31 11:34:09',
            ),
            306 =>
            array (
                'id' => 809,
                'title' => 'No patients are in your waiting room',
                'source_text' => 'no_patients_waiting_text',
                'translation_text' => 'Er zijn geen patiënten in uw wachtkamer',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:35:05',
                'updated_at' => '2022-08-31 11:35:05',
            ),
            307 =>
            array (
                'id' => 810,
                'title' => 'Hello',
                'source_text' => 'hello_text',
                'translation_text' => 'Hallo',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:36:00',
                'updated_at' => '2022-08-31 11:36:00',
            ),
            308 =>
            array (
                'id' => 811,
                'title' => 'You have no checked in appointments today',
                'source_text' => 'no_checked_in_text',
                'translation_text' => 'Geen patient heeft ingecheckt vandaag',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:36:55',
                'updated_at' => '2022-09-01 13:55:37',
            ),
            309 =>
            array (
                'id' => 812,
                'title' => 'Total Patients',
                'source_text' => 'total_patients_text',
                'translation_text' => 'Totaal aantal patiënten',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:54:25',
                'updated_at' => '2022-08-31 11:54:25',
            ),
            310 =>
            array (
                'id' => 813,
                'title' => 'Expected Patients Today',
                'source_text' => 'expected_patients_today_text',
                'translation_text' => 'Verwachte patiënten vandaag',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:57:08',
                'updated_at' => '2022-08-31 11:57:08',
            ),
            311 =>
            array (
                'id' => 814,
                'title' => 'Outstanding Invoices',
                'source_text' => 'outstanding_invoices_text',
                'translation_text' => 'Openstaande facturen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 11:58:45',
                'updated_at' => '2022-08-31 11:58:45',
            ),
            312 =>
            array (
                'id' => 815,
                'title' => 'Completed Appointments',
                'source_text' => 'completed_appointments_text',
                'translation_text' => 'Voltooide afspraken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 12:00:23',
                'updated_at' => '2022-08-31 12:00:23',
            ),
            313 =>
            array (
                'id' => 816,
                'title' => 'Appointments Calendar',
                'source_text' => 'appointments_calendar_text',
                'translation_text' => 'Agenda',
                'lang' => 'nl',
                'created_at' => '2022-08-31 12:03:07',
                'updated_at' => '2022-09-01 13:50:48',
            ),
            314 =>
            array (
                'id' => 817,
                'title' => 'Upcoming Appointments',
                'source_text' => 'upcoming_appointments_text',
                'translation_text' => 'Volgende afspraken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 12:04:41',
                'updated_at' => '2022-09-01 14:03:54',
            ),
            315 =>
            array (
                'id' => 818,
                'title' => 'Edit Emergency Contact',
                'source_text' => 'edit_emergency_contact_text',
                'translation_text' => 'contact voor noodgevallen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 12:54:13',
                'updated_at' => '2022-09-01 13:49:20',
            ),
            316 =>
            array (
                'id' => 819,
                'title' => 'Update Emergency Contact',
                'source_text' => 'update_emergency_contact_text',
                'translation_text' => 'Contactpersoon voor noodgevallen bewerken',
                'lang' => 'nl',
                'created_at' => '2022-08-31 13:05:33',
                'updated_at' => '2022-09-01 13:48:01',
            ),
            317 =>
            array (
                'id' => 820,
                'title' => 'Add Employee',
                'source_text' => 'add_employee_text',
                'translation_text' => 'Werknemer toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 13:50:27',
                'updated_at' => '2022-08-31 13:50:27',
            ),
            318 =>
            array (
                'id' => 821,
                'title' => 'Rate Types',
                'source_text' => 'rate_types_text',
                'translation_text' => 'soort tarief',
                'lang' => 'nl',
                'created_at' => '2022-08-31 13:51:21',
                'updated_at' => '2022-09-01 13:47:01',
            ),
            319 =>
            array (
                'id' => 822,
                'title' => 'Duty Types',
                'source_text' => 'duty_types_text',
                'translation_text' => 'soort werkzaamheden',
                'lang' => 'nl',
                'created_at' => '2022-08-31 13:52:08',
                'updated_at' => '2022-09-01 13:40:10',
            ),
            320 =>
            array (
                'id' => 823,
                'title' => 'Manage Employees',
                'source_text' => 'manage_employees_text',
                'translation_text' => 'Beheer medewerkers',
                'lang' => 'nl',
                'created_at' => '2022-08-31 13:52:54',
                'updated_at' => '2022-08-31 13:52:54',
            ),
            321 =>
            array (
                'id' => 824,
                'title' => 'Manage Position',
                'source_text' => 'manage_position_text',
                'translation_text' => 'Positie beheren',
                'lang' => 'nl',
                'created_at' => '2022-08-31 13:53:34',
                'updated_at' => '2022-08-31 13:53:34',
            ),
            322 =>
            array (
                'id' => 825,
                'title' => 'Add Position',
                'source_text' => 'add_position_text',
                'translation_text' => 'Functie toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-08-31 13:54:12',
                'updated_at' => '2022-09-01 13:57:01',
            ),
            323 =>
            array (
                'id' => 826,
                'title' => 'Edit Bank Information',
                'source_text' => 'edit_bank_information_text',
                'translation_text' => 'Bankgegevens bewerken',
                'lang' => 'nl',
                'created_at' => '2022-09-01 05:48:50',
                'updated_at' => '2022-09-01 05:48:50',
            ),
            324 =>
            array (
                'id' => 827,
                'title' => 'Update Bank Information',
                'source_text' => 'update_bank_information_text',
                'translation_text' => 'Bankgegevens bijwerken',
                'lang' => 'nl',
                'created_at' => '2022-09-01 05:51:44',
                'updated_at' => '2022-09-01 13:46:11',
            ),
            325 =>
            array (
                'id' => 828,
                'title' => 'cancel treatment',
                'source_text' => 'cancel_treatment_text',
                'translation_text' => 'Annuleer Behandeling',
                'lang' => 'nl',
                'created_at' => '2022-09-01 06:54:13',
                'updated_at' => '2022-09-01 06:54:13',
            ),
            326 =>
            array (
                'id' => 829,
            'title' => 'next treatment (optional)',
                'source_text' => 'next_treatment_text',
            'translation_text' => 'volgende behandeling (optioneel)',
                'lang' => 'nl',
                'created_at' => '2022-09-01 06:56:37',
                'updated_at' => '2022-09-01 06:56:37',
            ),
            327 =>
            array (
                'id' => 830,
                'title' => 'days',
                'source_text' => 'days_text',
                'translation_text' => 'Dagen',
                'lang' => 'nl',
                'created_at' => '2022-09-01 07:53:12',
                'updated_at' => '2022-09-01 08:07:57',
            ),
            328 =>
            array (
                'id' => 831,
                'title' => 'Edit Benefit Information',
                'source_text' => 'edit_benefit_information_text',
                'translation_text' => 'Verzekerings gegevens bijwerken',
                'lang' => 'nl',
                'created_at' => '2022-09-01 09:30:28',
                'updated_at' => '2022-09-01 13:44:26',
            ),
            329 =>
            array (
                'id' => 832,
                'title' => 'Qualification Information',
                'source_text' => 'qualification_information_text',
                'translation_text' => 'Kwalificatie-informatie',
                'lang' => 'nl',
                'created_at' => '2022-09-01 11:28:42',
                'updated_at' => '2022-09-01 11:28:42',
            ),
            330 =>
            array (
                'id' => 833,
                'title' => 'weeks',
                'source_text' => 'weeks_text',
                'translation_text' => 'weken',
                'lang' => 'nl',
                'created_at' => '2022-09-01 11:40:16',
                'updated_at' => '2022-09-01 11:40:16',
            ),
            331 =>
            array (
                'id' => 834,
                'title' => 'years',
                'source_text' => 'years_text',
                'translation_text' => 'Jaren',
                'lang' => 'nl',
                'created_at' => '2022-09-01 11:41:47',
                'updated_at' => '2022-09-01 18:51:03',
            ),
            332 =>
            array (
                'id' => 835,
                'title' => 'Edit Biographical Information',
                'source_text' => 'edit_biographical_information_text',
                'translation_text' => 'Persoonsgegevens bewerken',
                'lang' => 'nl',
                'created_at' => '2022-09-01 12:41:53',
                'updated_at' => '2022-09-01 17:56:10',
            ),
            333 =>
            array (
                'id' => 836,
                'title' => 'Update Biographical Information',
                'source_text' => 'update_biographical_information_text',
                'translation_text' => 'Persoonlijke gegevens bewerken',
                'lang' => 'nl',
                'created_at' => '2022-09-01 12:58:16',
                'updated_at' => '2022-09-01 13:44:45',
            ),
            334 =>
            array (
                'id' => 837,
                'title' => 'Patients',
                'source_text' => 'patients_text',
                'translation_text' => 'Patiënten',
                'lang' => 'nl',
                'created_at' => '2022-09-02 07:09:06',
                'updated_at' => '2022-09-02 07:09:06',
            ),
            335 =>
            array (
                'id' => 838,
                'title' => 'Front Office',
                'source_text' => 'front_office_text',
                'translation_text' => 'Balie',
                'lang' => 'nl',
                'created_at' => '2022-09-02 07:26:29',
                'updated_at' => '2022-09-02 07:26:29',
            ),
            336 =>
            array (
                'id' => 839,
                'title' => 'Status',
                'source_text' => 'status_text',
                'translation_text' => 'Toestand',
                'lang' => 'en',
                'created_at' => '2022-09-02 07:45:12',
                'updated_at' => '2022-09-02 07:45:12',
            ),
            337 =>
            array (
                'id' => 840,
                'title' => 'Custom Settings',
                'source_text' => 'custom_settings_text',
                'translation_text' => 'speciale instellingen',
                'lang' => 'nl',
                'created_at' => '2022-09-02 07:58:14',
                'updated_at' => '2022-09-02 12:27:12',
            ),
            338 =>
            array (
                'id' => 841,
                'title' => 'Queuing',
                'source_text' => 'queuing_text',
                'translation_text' => 'In de rij staan',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:00:38',
                'updated_at' => '2022-09-02 08:00:38',
            ),
            339 =>
            array (
                'id' => 842,
                'title' => 'Localisation and Translation',
                'source_text' => 'localisation_translation_text',
                'translation_text' => 'Lokalisatie en vertaling',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:01:56',
                'updated_at' => '2022-09-02 08:01:56',
            ),
            340 =>
            array (
                'id' => 843,
                'title' => 'Users',
                'source_text' => 'users_text',
                'translation_text' => 'Gebruikers',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:03:28',
                'updated_at' => '2022-09-02 08:03:28',
            ),
            341 =>
            array (
                'id' => 844,
                'title' => 'Roles and Permissions',
                'source_text' => 'roles_permission_text',
                'translation_text' => 'Rollen en machtigingen',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:04:26',
                'updated_at' => '2022-09-02 08:04:26',
            ),
            342 =>
            array (
                'id' => 845,
                'title' => 'Facility Settings',
                'source_text' => 'facility_settings_text',
                'translation_text' => 'Praktijk Instellingen',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:06:15',
                'updated_at' => '2022-09-02 12:25:40',
            ),
            343 =>
            array (
                'id' => 846,
                'title' => 'Manage front office settings, mails and appointments',
                'source_text' => 'manage_front_office_text',
                'translation_text' => 'Beheer frontoffice-instellingen, e-mails en afspraken',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:07:31',
                'updated_at' => '2022-09-02 08:07:31',
            ),
            344 =>
            array (
                'id' => 847,
                'title' => 'Manage patients information and settings',
                'source_text' => 'manage_patients_text',
                'translation_text' => 'Patiënteninformatie en instellingen beheren',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:08:31',
                'updated_at' => '2022-09-02 08:08:31',
            ),
            345 =>
            array (
                'id' => 848,
                'title' => 'Settings and management for imaging',
                'source_text' => 'manage_imaging_text',
                'translation_text' => 'Instellingen en beheer van foto s',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:09:26',
                'updated_at' => '2022-09-05 12:14:03',
            ),
            346 =>
            array (
                'id' => 849,
                'title' => 'Manage doctors slots and settings',
                'source_text' => 'manage_doctors_text',
                'translation_text' => 'Beheer slots en instellingen voor artsen',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:10:37',
                'updated_at' => '2022-09-02 08:10:37',
            ),
            347 =>
            array (
                'id' => 850,
                'title' => 'Manage procedures and other settings',
                'source_text' => 'manage_custom_text',
                'translation_text' => 'Procedures en andere instellingen beheren',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:11:31',
                'updated_at' => '2022-09-02 08:11:31',
            ),
            348 =>
            array (
                'id' => 851,
                'title' => 'Manage billing controls, currency, amounts',
                'source_text' => 'manage_billing_text',
                'translation_text' => 'Beheer factureringscontroles, valuta, bedragen',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:12:18',
                'updated_at' => '2022-09-02 08:12:18',
            ),
            349 =>
            array (
                'id' => 852,
                'title' => 'Manage treatments and other settings',
                'source_text' => 'manage_treatments_text',
                'translation_text' => 'Behandelingen en andere instellingen beheren',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:13:12',
                'updated_at' => '2022-09-02 08:13:12',
            ),
            350 =>
            array (
                'id' => 853,
                'title' => 'Manage patients flow in waiting room',
                'source_text' => 'manage_queuing_text',
                'translation_text' => 'Beheer patiëntenstroom in wachtkamer',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:14:39',
                'updated_at' => '2022-09-02 08:14:39',
            ),
            351 =>
            array (
                'id' => 854,
                'title' => 'Manage location settings and languages',
                'source_text' => 'manage_localisation_text',
                'translation_text' => 'Locatie-instellingen en talen beheren',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:15:34',
                'updated_at' => '2022-09-02 08:15:34',
            ),
            352 =>
            array (
                'id' => 855,
                'title' => 'Manage insurance claims and payments',
                'source_text' => 'manage_insurance_text',
                'translation_text' => 'Beheer verzekeringsclaims en betalingen',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:16:29',
                'updated_at' => '2022-09-02 08:16:29',
            ),
            353 =>
            array (
                'id' => 856,
                'title' => 'Create new users, manage uses, edit and delete',
                'source_text' => 'manage_users_text',
                'translation_text' => 'Nieuwe gebruikers maken, gebruik beheren, bewerken en verwijderen',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:17:14',
                'updated_at' => '2022-09-02 08:17:14',
            ),
            354 =>
            array (
                'id' => 857,
                'title' => 'Manage System roles, manage users',
                'source_text' => 'manage_roles_text',
                'translation_text' => 'Systeemrollen beheren, gebruikers beheren',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:18:19',
                'updated_at' => '2022-09-02 08:18:19',
            ),
            355 =>
            array (
                'id' => 858,
                'title' => 'Manage timezones, Application names and Others',
                'source_text' => 'manage_facility_text',
                'translation_text' => 'Beheer tijdzones, applicatienamen en andere',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:19:05',
                'updated_at' => '2022-09-02 08:19:05',
            ),
            356 =>
            array (
                'id' => 859,
                'title' => 'Employee Attendance',
                'source_text' => 'employee_attendance_text',
                'translation_text' => 'Aanwezigheid van werknemers',
                'lang' => 'nl',
                'created_at' => '2022-09-02 08:50:20',
                'updated_at' => '2022-09-02 08:50:20',
            ),
            357 =>
            array (
                'id' => 860,
                'title' => 'Edit Basic Information',
                'source_text' => 'edit_basic_information',
                'translation_text' => 'Basisinformatie bewerken',
                'lang' => 'nl',
                'created_at' => '2022-09-02 09:00:12',
                'updated_at' => '2022-09-02 09:00:12',
            ),
            358 =>
            array (
                'id' => 861,
                'title' => 'Configurations',
                'source_text' => 'configurations_text',
                'translation_text' => 'Configuraties',
                'lang' => 'nl',
                'created_at' => '2022-09-02 09:24:50',
                'updated_at' => '2022-09-02 09:25:57',
            ),
            359 =>
            array (
                'id' => 862,
                'title' => 'Business Email',
                'source_text' => 'business_email_text',
                'translation_text' => 'zakelijke E-mail',
                'lang' => 'nl',
                'created_at' => '2022-09-02 09:28:06',
                'updated_at' => '2022-09-02 09:28:06',
            ),
            360 =>
            array (
                'id' => 863,
                'title' => 'Basic Salary',
                'source_text' => 'basic_salary_text',
                'translation_text' => 'Basis salaris',
                'lang' => 'nl',
                'created_at' => '2022-09-02 09:29:34',
                'updated_at' => '2022-09-02 09:29:34',
            ),
            361 =>
            array (
                'id' => 864,
                'title' => 'Mails',
                'source_text' => 'mails_text',
                'translation_text' => 'MAILS',
                'lang' => 'nl',
                'created_at' => '2022-09-02 13:11:29',
                'updated_at' => '2022-09-02 13:11:29',
            ),
            362 =>
            array (
                'id' => 865,
                'title' => 'Subject',
                'source_text' => 'subject_text',
                'translation_text' => 'ONDERWERP',
                'lang' => 'nl',
                'created_at' => '2022-09-02 13:12:46',
                'updated_at' => '2022-09-02 13:12:46',
            ),
            363 =>
            array (
                'id' => 866,
                'title' => 'Category',
                'source_text' => 'category_text',
                'translation_text' => 'CATEGORIE',
                'lang' => 'nl',
                'created_at' => '2022-09-02 13:13:44',
                'updated_at' => '2022-09-02 13:13:44',
            ),
            364 =>
            array (
                'id' => 867,
                'title' => 'BODY',
                'source_text' => 'body_text',
                'translation_text' => 'LICHAAM',
                'lang' => 'nl',
                'created_at' => '2022-09-02 13:14:32',
                'updated_at' => '2022-09-02 13:14:32',
            ),
            365 =>
            array (
                'id' => 868,
                'title' => 'There are no Mails',
                'source_text' => 'no_mails_text',
                'translation_text' => 'Er zijn geen e-mails',
                'lang' => 'nl',
                'created_at' => '2022-09-02 13:16:32',
                'updated_at' => '2022-09-02 13:16:32',
            ),
            366 =>
            array (
                'id' => 869,
                'title' => 'Place of Residence',
                'source_text' => 'place_of_residence_text',
                'translation_text' => 'Woonplaats',
                'lang' => 'nl',
                'created_at' => '2022-09-02 13:45:19',
                'updated_at' => '2022-09-02 13:45:19',
            ),
            367 =>
            array (
                'id' => 870,
                'title' => 'Options',
                'source_text' => 'options_text',
                'translation_text' => 'Opties',
                'lang' => 'nl',
                'created_at' => '2022-09-02 13:49:24',
                'updated_at' => '2022-09-02 13:49:24',
            ),
            368 =>
            array (
                'id' => 871,
                'title' => 'Sub Department',
                'source_text' => 'sub_department_text',
                'translation_text' => 'onder afdeling',
                'lang' => 'nl',
                'created_at' => '2022-09-02 13:49:56',
                'updated_at' => '2022-09-02 18:59:10',
            ),
            369 =>
            array (
                'id' => 872,
                'title' => 'Edit',
                'source_text' => 'edit_text',
                'translation_text' => 'Bewerk',
                'lang' => 'nl',
                'created_at' => '2022-09-03 06:35:23',
                'updated_at' => '2022-09-03 06:35:23',
            ),
            370 =>
            array (
                'id' => 873,
                'title' => 'Delete',
                'source_text' => 'delete_text',
                'translation_text' => 'Verwijderen',
                'lang' => 'nl',
                'created_at' => '2022-09-03 06:36:02',
                'updated_at' => '2022-09-03 06:36:02',
            ),
            371 =>
            array (
                'id' => 874,
                'title' => 'View',
                'source_text' => 'view_text',
                'translation_text' => 'Visie',
                'lang' => 'nl',
                'created_at' => '2022-09-03 06:48:25',
                'updated_at' => '2022-09-03 07:27:17',
            ),
            372 =>
            array (
                'id' => 875,
                'title' => 'Manage Permissions',
                'source_text' => 'manage_permissions_text',
                'translation_text' => 'Machtigingen beheren',
                'lang' => 'nl',
                'created_at' => '2022-09-03 06:49:21',
                'updated_at' => '2022-09-03 06:49:21',
            ),
            373 =>
            array (
                'id' => 876,
                'title' => 'There are no Users',
                'source_text' => 'no_users_text',
                'translation_text' => 'Er zijn geen gebruikers',
                'lang' => 'nl',
                'created_at' => '2022-09-03 09:55:06',
                'updated_at' => '2022-09-03 09:55:06',
            ),
            374 =>
            array (
                'id' => 877,
                'title' => 'ADD NEW AUTO MAIL CONTENT',
                'source_text' => 'create_mail_title_text',
                'translation_text' => 'NIEUWE AUTOMAIL-INHOUD TOEVOEGEN',
                'lang' => 'nl',
                'created_at' => '2022-09-05 07:22:00',
                'updated_at' => '2022-09-05 07:22:00',
            ),
            375 =>
            array (
                'id' => 878,
                'title' => 'Select Category',
                'source_text' => 'select_category_text',
                'translation_text' => 'Selecteer categorie',
                'lang' => 'nl',
                'created_at' => '2022-09-05 07:25:12',
                'updated_at' => '2022-09-05 11:48:37',
            ),
            376 =>
            array (
                'id' => 879,
                'title' => 'ADD MAIL CONTENT',
                'source_text' => 'add_mail_content_text',
                'translation_text' => 'MAILINHOUD TOEVOEGEN',
                'lang' => 'nl',
                'created_at' => '2022-09-05 07:40:32',
                'updated_at' => '2022-09-05 07:40:32',
            ),
            377 =>
            array (
                'id' => 880,
                'title' => 'Next To Positional Info',
                'source_text' => 'next_to_positional_info_text',
                'translation_text' => 'Naast positionele informatie',
                'lang' => 'nl',
                'created_at' => '2022-09-05 07:45:59',
                'updated_at' => '2022-09-05 07:45:59',
            ),
            378 =>
            array (
                'id' => 881,
                'title' => 'Configuration Details',
                'source_text' => 'configuration_detail_text',
                'translation_text' => 'Configuratiedetails',
                'lang' => 'nl',
                'created_at' => '2022-09-05 07:51:35',
                'updated_at' => '2022-09-05 07:51:35',
            ),
            379 =>
            array (
                'id' => 882,
                'title' => 'Update',
                'source_text' => 'update_text',
                'translation_text' => 'Update',
                'lang' => 'nl',
                'created_at' => '2022-09-05 08:35:19',
                'updated_at' => '2022-09-05 08:36:35',
            ),
            380 =>
            array (
                'id' => 883,
                'title' => 'Updating',
                'source_text' => 'updating_text',
                'translation_text' => 'Updaten',
                'lang' => 'nl',
                'created_at' => '2022-09-05 08:38:11',
                'updated_at' => '2022-09-05 08:38:11',
            ),
            381 =>
            array (
                'id' => 884,
                'title' => 'UPDATE AUTO MAIL CONTENT',
                'source_text' => 'update_mail_content_title_text',
                'translation_text' => 'MAIL BIJWERKEN',
                'lang' => 'nl',
                'created_at' => '2022-09-05 09:00:19',
                'updated_at' => '2022-09-05 12:11:55',
            ),
            382 =>
            array (
                'id' => 885,
                'title' => 'Add Procedure',
                'source_text' => 'add_procedure_text',
                'translation_text' => 'Procedure toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-09-05 09:05:39',
                'updated_at' => '2022-09-05 09:05:39',
            ),
            383 =>
            array (
                'id' => 886,
                'title' => 'Actions',
                'source_text' => 'actions_text',
                'translation_text' => 'Acties',
                'lang' => 'nl',
                'created_at' => '2022-09-05 09:17:03',
                'updated_at' => '2022-09-05 09:17:03',
            ),
            384 =>
            array (
                'id' => 887,
                'title' => 'There are no Procedures',
                'source_text' => 'no_procedure_text',
                'translation_text' => 'Er zijn geen procedures',
                'lang' => 'nl',
                'created_at' => '2022-09-05 09:55:17',
                'updated_at' => '2022-09-05 09:55:17',
            ),
            385 =>
            array (
                'id' => 888,
                'title' => 'You are not authorised to see Procedures',
                'source_text' => 'no_auth_procedure_text',
                'translation_text' => 'U bent niet bevoegd om Procedures te zien',
                'lang' => 'nl',
                'created_at' => '2022-09-05 09:56:37',
                'updated_at' => '2022-09-05 09:56:37',
            ),
            386 =>
            array (
                'id' => 889,
                'title' => 'EDIT PROCEDURE',
                'source_text' => 'edit_procedure_text',
                'translation_text' => 'BEWERKINGSPROCEDURE',
                'lang' => 'nl',
                'created_at' => '2022-09-05 10:04:39',
                'updated_at' => '2022-09-05 10:04:39',
            ),
            387 =>
            array (
                'id' => 890,
                'title' => 'BUNDLED TREATMENTS',
                'source_text' => 'bundled_treatments_text',
                'translation_text' => 'GEBUNDELDE BEHANDELINGEN',
                'lang' => 'nl',
                'created_at' => '2022-09-05 11:05:08',
                'updated_at' => '2022-09-05 11:05:08',
            ),
            388 =>
            array (
                'id' => 891,
                'title' => 'There are no Treatments',
                'source_text' => 'no_treatments_text',
                'translation_text' => 'Er zijn geen behandelingen',
                'lang' => 'nl',
                'created_at' => '2022-09-05 11:25:29',
                'updated_at' => '2022-09-05 11:25:29',
            ),
            389 =>
            array (
                'id' => 892,
                'title' => 'ADD TREATMENT BUNDLE',
                'source_text' => 'add_treatment_bundle_text',
                'translation_text' => 'BEHANDELINGSBUNDEL TOEVOEGEN',
                'lang' => 'nl',
                'created_at' => '2022-09-05 11:28:25',
                'updated_at' => '2022-09-05 11:28:25',
            ),
            390 =>
            array (
                'id' => 893,
                'title' => 'View SubTreatments',
                'source_text' => 'view_sub_treatments_text',
                'translation_text' => 'Subbehandelingen bekijken',
                'lang' => 'nl',
                'created_at' => '2022-09-06 06:37:26',
                'updated_at' => '2022-09-06 06:37:26',
            ),
            391 =>
            array (
                'id' => 894,
                'title' => 'ADD NEW TREATMENT BUNDLE',
                'source_text' => 'treatment_title_text',
                'translation_text' => 'NIEUWE BEHANDELINGSBUNDEL TOEVOEGEN',
                'lang' => 'nl',
                'created_at' => '2022-09-06 06:54:19',
                'updated_at' => '2022-09-06 06:54:19',
            ),
            392 =>
            array (
                'id' => 895,
                'title' => 'EDIT TREATMENT BUNDLE',
                'source_text' => 'treatment_title_edit_text',
                'translation_text' => 'BEHANDELINGSBUNDEL BEWERKEN',
                'lang' => 'nl',
                'created_at' => '2022-09-06 07:01:58',
                'updated_at' => '2022-09-06 07:01:58',
            ),
            393 =>
            array (
                'id' => 896,
                'title' => 'SUB TREATMENTS',
                'source_text' => 'sub_treatments_title',
                'translation_text' => 'SUBBEHANDELINGEN',
                'lang' => 'nl',
                'created_at' => '2022-09-06 07:15:09',
                'updated_at' => '2022-09-06 07:15:09',
            ),
            394 =>
            array (
                'id' => 897,
                'title' => 'Home',
                'source_text' => 'home_text',
                'translation_text' => 'Huis',
                'lang' => 'nl',
                'created_at' => '2022-09-06 07:16:23',
                'updated_at' => '2022-09-06 07:16:23',
            ),
            395 =>
            array (
                'id' => 898,
                'title' => 'TRANSLATIONS',
                'source_text' => 'translations_text',
                'translation_text' => 'VERTALINGEN',
                'lang' => 'nl',
                'created_at' => '2022-09-06 07:24:36',
                'updated_at' => '2022-09-06 07:24:36',
            ),
            396 =>
            array (
                'id' => 899,
                'title' => 'Employee Types',
                'source_text' => 'employee_types_text',
                'translation_text' => 'Employee Types',
                'lang' => 'nl',
                'created_at' => '2022-09-06 07:26:03',
                'updated_at' => '2022-09-06 07:26:03',
            ),
            397 =>
            array (
                'id' => 900,
                'title' => 'Manage Employee Types',
                'source_text' => 'manage_employee_types',
                'translation_text' => 'Manage Employee Types',
                'lang' => 'nl',
                'created_at' => '2022-09-06 07:27:42',
                'updated_at' => '2022-09-06 07:27:42',
            ),
            398 =>
            array (
                'id' => 901,
                'title' => 'Add Employee types',
                'source_text' => 'add_employee_types',
                'translation_text' => 'Add Employee types',
                'lang' => 'nl',
                'created_at' => '2022-09-06 07:31:14',
                'updated_at' => '2022-09-06 07:31:14',
            ),
            399 =>
            array (
                'id' => 902,
                'title' => 'Add Employee types',
                'source_text' => 'add_employee_types_text',
                'translation_text' => 'Add Employee types',
                'lang' => 'nl',
                'created_at' => '2022-09-06 07:32:34',
                'updated_at' => '2022-09-06 07:32:34',
            ),
            400 =>
            array (
                'id' => 903,
                'title' => 'source text',
                'source_text' => 'source_text_text',
                'translation_text' => 'brontekst',
                'lang' => 'nl',
                'created_at' => '2022-09-06 07:33:51',
                'updated_at' => '2022-09-06 07:33:51',
            ),
            401 =>
            array (
                'id' => 904,
                'title' => 'add translation',
                'source_text' => 'add_translation_text',
                'translation_text' => 'vertaling toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-09-06 07:36:32',
                'updated_at' => '2022-09-06 07:36:32',
            ),
            402 =>
            array (
                'id' => 905,
                'title' => 'Search Translation',
                'source_text' => 'search_translation_text',
                'translation_text' => 'Vertaling zoeken',
                'lang' => 'nl',
                'created_at' => '2022-09-06 07:39:48',
                'updated_at' => '2022-09-06 07:39:48',
            ),
            403 =>
            array (
                'id' => 906,
                'title' => 'There are no Translations',
                'source_text' => 'no_translations_text',
                'translation_text' => 'Er zijn geen vertalingen',
                'lang' => 'nl',
                'created_at' => '2022-09-06 07:55:04',
                'updated_at' => '2022-09-06 07:55:04',
            ),
            404 =>
            array (
                'id' => 907,
                'title' => 'Logout',
                'source_text' => 'logout_text',
                'translation_text' => 'Uitloggen',
                'lang' => 'nl',
                'created_at' => '2022-09-06 08:05:46',
                'updated_at' => '2022-09-06 08:05:46',
            ),
            405 =>
            array (
                'id' => 908,
                'title' => 'Search Language',
                'source_text' => 'search_language_text',
                'translation_text' => 'Zoektaal',
                'lang' => 'nl',
                'created_at' => '2022-09-06 08:15:40',
                'updated_at' => '2022-09-06 08:15:40',
            ),
            406 =>
            array (
                'id' => 909,
                'title' => 'Communications',
                'source_text' => 'communications_text',
                'translation_text' => 'communicatie',
                'lang' => 'nl',
                'created_at' => '2022-09-06 08:16:27',
                'updated_at' => '2022-09-06 08:16:27',
            ),
            407 =>
            array (
                'id' => 910,
                'title' => 'Employee Types Loading',
                'source_text' => 'employee_types_loading_text',
                'translation_text' => 'Employee Types Loading',
                'lang' => 'nl',
                'created_at' => '2022-09-06 08:18:09',
                'updated_at' => '2022-09-06 08:18:09',
            ),
            408 =>
            array (
                'id' => 911,
                'title' => 'Source Title',
                'source_text' => 'source_title_text',
                'translation_text' => 'Bron titel',
                'lang' => 'nl',
                'created_at' => '2022-09-06 08:24:34',
                'updated_at' => '2022-09-06 08:24:34',
            ),
            409 =>
            array (
                'id' => 912,
                'title' => 'Translation Text',
                'source_text' => 'translation_text_text',
                'translation_text' => 'Vertaaltekst',
                'lang' => 'nl',
                'created_at' => '2022-09-06 08:28:05',
                'updated_at' => '2022-09-06 08:28:05',
            ),
            410 =>
            array (
                'id' => 913,
                'title' => 'Manage System',
                'source_text' => 'manage_system_text',
                'translation_text' => 'Systeem beheren',
                'lang' => 'nl',
                'created_at' => '2022-09-06 08:33:45',
                'updated_at' => '2022-09-06 08:33:45',
            ),
            411 =>
            array (
                'id' => 914,
                'title' => 'Update Settings',
                'source_text' => 'update_settings_text',
                'translation_text' => 'Update-instellingen',
                'lang' => 'nl',
                'created_at' => '2022-09-06 09:20:58',
                'updated_at' => '2022-09-06 09:20:58',
            ),
            412 =>
            array (
                'id' => 915,
                'title' => 'Invoices',
                'source_text' => 'invoice_text',
                'translation_text' => 'Facturen',
                'lang' => 'nl',
                'created_at' => '2022-09-06 09:33:48',
                'updated_at' => '2022-09-06 09:33:48',
            ),
            413 =>
            array (
                'id' => 916,
                'title' => 'Company Name',
                'source_text' => 'company_name_text',
                'translation_text' => 'Bedrijfsnaam',
                'lang' => 'nl',
                'created_at' => '2022-09-06 10:42:06',
                'updated_at' => '2022-09-06 10:42:06',
            ),
            414 =>
            array (
                'id' => 917,
                'title' => 'Application Name',
                'source_text' => 'application_name_text',
                'translation_text' => 'Naam van de toepassing',
                'lang' => 'nl',
                'created_at' => '2022-09-06 10:44:39',
                'updated_at' => '2022-09-06 10:44:39',
            ),
            415 =>
            array (
                'id' => 918,
                'title' => 'Minimum Checkin Time',
                'source_text' => 'minimum_checkin_time_text',
                'translation_text' => 'Minimale inchecktijd',
                'lang' => 'nl',
                'created_at' => '2022-09-06 10:46:10',
                'updated_at' => '2022-09-06 10:46:10',
            ),
            416 =>
            array (
                'id' => 919,
                'title' => 'Maximum Checkin Time',
                'source_text' => 'maximum_checkin_time_text',
                'translation_text' => 'Maximale inchecktijd',
                'lang' => 'nl',
                'created_at' => '2022-09-06 10:47:21',
                'updated_at' => '2022-09-06 10:47:21',
            ),
            417 =>
            array (
                'id' => 920,
                'title' => 'Appointment Code Format',
                'source_text' => 'appointment_code_format_text',
                'translation_text' => 'Afspraakcode-indeling',
                'lang' => 'nl',
                'created_at' => '2022-09-06 10:48:29',
                'updated_at' => '2022-09-06 10:48:29',
            ),
            418 =>
            array (
                'id' => 921,
                'title' => 'Facility Address',
                'source_text' => 'facility_address_text',
                'translation_text' => 'Adres vestiging',
                'lang' => 'nl',
                'created_at' => '2022-09-06 10:49:56',
                'updated_at' => '2022-09-06 10:49:56',
            ),
            419 =>
            array (
                'id' => 922,
                'title' => 'Working Time',
                'source_text' => 'working_time_text',
                'translation_text' => 'Werktijd',
                'lang' => 'nl',
                'created_at' => '2022-09-06 10:51:16',
                'updated_at' => '2022-09-06 10:51:16',
            ),
            420 =>
            array (
                'id' => 923,
                'title' => 'Working Days',
                'source_text' => 'working_days_text',
                'translation_text' => 'Werkdagen',
                'lang' => 'nl',
                'created_at' => '2022-09-06 10:52:27',
                'updated_at' => '2022-09-06 10:52:27',
            ),
            421 =>
            array (
                'id' => 924,
                'title' => 'Patient Number Format',
                'source_text' => 'patient_number_format',
                'translation_text' => 'Patiëntnummernotatie',
                'lang' => 'nl',
                'created_at' => '2022-09-06 10:54:18',
                'updated_at' => '2022-09-06 10:54:18',
            ),
            422 =>
            array (
                'id' => 925,
                'title' => 'Invoice Number Format',
                'source_text' => 'invoice_number_format_text',
                'translation_text' => 'Factuurnummernotatie',
                'lang' => 'nl',
                'created_at' => '2022-09-06 10:56:01',
                'updated_at' => '2022-09-06 10:56:01',
            ),
            423 =>
            array (
                'id' => 926,
                'title' => 'Company Logo',
                'source_text' => 'company_logo_text',
                'translation_text' => 'Bedrijfslogo',
                'lang' => 'nl',
                'created_at' => '2022-09-06 10:57:18',
                'updated_at' => '2022-09-06 10:57:18',
            ),
            424 =>
            array (
                'id' => 927,
                'title' => 'Company Favicon',
                'source_text' => 'company_favicon_text',
                'translation_text' => 'Bedrijf Favicon',
                'lang' => 'nl',
                'created_at' => '2022-09-06 10:58:13',
                'updated_at' => '2022-09-06 10:58:13',
            ),
            425 =>
            array (
                'id' => 928,
                'title' => 'Apply',
                'source_text' => 'apply_text',
                'translation_text' => 'Van toepassing zijn',
                'lang' => 'nl',
                'created_at' => '2022-09-06 11:07:44',
                'updated_at' => '2022-09-06 11:07:44',
            ),
            426 =>
            array (
                'id' => 929,
                'title' => 'Services',
                'source_text' => 'services_text',
                'translation_text' => 'Diensten',
                'lang' => 'nl',
                'created_at' => '2022-09-06 13:38:34',
                'updated_at' => '2022-09-06 13:38:34',
            ),
            427 =>
            array (
                'id' => 930,
                'title' => 'Manage your appointments',
                'source_text' => 'manage_your_appointments',
                'translation_text' => 'Beheer uw afspraken',
                'lang' => 'nl',
                'created_at' => '2022-09-06 14:12:29',
                'updated_at' => '2022-09-06 14:14:48',
            ),
            428 =>
            array (
                'id' => 931,
                'title' => 'Statements',
                'source_text' => 'statements_text',
                'translation_text' => 'Verklaringen',
                'lang' => 'nl',
                'created_at' => '2022-09-06 14:20:43',
                'updated_at' => '2022-09-06 14:20:43',
            ),
            429 =>
            array (
                'id' => 932,
                'title' => 'Communicate to your doctor',
                'source_text' => 'communicate_to_your_doctor',
                'translation_text' => 'Communiceer met uw arts',
                'lang' => 'nl',
                'created_at' => '2022-09-06 14:31:07',
                'updated_at' => '2022-09-06 14:31:07',
            ),
            430 =>
            array (
                'id' => 933,
                'title' => 'Appointment types',
                'source_text' => 'appointment_types',
                'translation_text' => 'Afspraaktypes',
                'lang' => 'nl',
                'created_at' => '2022-09-06 14:32:42',
                'updated_at' => '2022-09-06 14:32:42',
            ),
            431 =>
            array (
                'id' => 934,
                'title' => 'We are loading your',
                'source_text' => 'we_are_loading_text',
                'translation_text' => 'We zijn je aan het laden',
                'lang' => 'nl',
                'created_at' => '2022-09-07 11:45:58',
                'updated_at' => '2022-09-07 11:45:58',
            ),
            432 =>
            array (
                'id' => 935,
                'title' => 'Dark Mode',
                'source_text' => 'dark_mode_text',
                'translation_text' => 'Dark Mode',
                'lang' => 'nl',
                'created_at' => '2022-09-08 07:03:23',
                'updated_at' => '2022-09-08 07:03:23',
            ),
            433 =>
            array (
                'id' => 936,
                'title' => 'Make Appointment',
                'source_text' => 'make_appointment_text',
                'translation_text' => 'Make Appointment',
                'lang' => 'nl',
                'created_at' => '2022-09-08 07:31:35',
                'updated_at' => '2022-09-08 07:31:35',
            ),
            434 =>
            array (
                'id' => 937,
                'title' => 'Select an appointment type',
                'source_text' => 'select_an_appointment_type',
                'translation_text' => 'Selecteer een afspraaktype',
                'lang' => 'nl',
                'created_at' => '2022-09-08 07:58:07',
                'updated_at' => '2022-09-08 07:58:07',
            ),
            435 =>
            array (
                'id' => 938,
                'title' => 'Select a date',
                'source_text' => 'select_a_date',
                'translation_text' => 'Selecteer een datum',
                'lang' => 'nl',
                'created_at' => '2022-09-08 08:25:24',
                'updated_at' => '2022-09-08 08:25:24',
            ),
            436 =>
            array (
                'id' => 939,
                'title' => 'Select Time Slot',
                'source_text' => 'select_time_slot',
                'translation_text' => 'Selecteer tijdslot',
                'lang' => 'nl',
                'created_at' => '2022-09-08 09:02:43',
                'updated_at' => '2022-09-08 09:02:43',
            ),
            437 =>
            array (
                'id' => 940,
                'title' => 'we are loading your appointments',
                'source_text' => 'we_are_loading_your_appointments',
                'translation_text' => 'we zijn je afspraken aan het laden',
                'lang' => 'nl',
                'created_at' => '2022-09-08 09:21:23',
                'updated_at' => '2022-09-08 09:21:23',
            ),
            438 =>
            array (
                'id' => 941,
                'title' => 'Date Created',
                'source_text' => 'date_created',
                'translation_text' => 'Datum gecreeërd',
                'lang' => 'nl',
                'created_at' => '2022-09-08 14:20:40',
                'updated_at' => '2022-09-08 14:20:40',
            ),
            439 =>
            array (
                'id' => 942,
                'title' => 'Appointment Date',
                'source_text' => 'appointment_date',
                'translation_text' => 'Afspraakdatum',
                'lang' => 'nl',
                'created_at' => '2022-09-08 14:33:19',
                'updated_at' => '2022-09-08 14:33:19',
            ),
            440 =>
            array (
                'id' => 943,
                'title' => 'Type',
                'source_text' => 'type_text',
                'translation_text' => 'Type',
                'lang' => 'nl',
                'created_at' => '2022-09-09 12:11:46',
                'updated_at' => '2022-09-09 12:11:46',
            ),
            441 =>
            array (
                'id' => 944,
                'title' => 'Mark As',
                'source_text' => 'marks_as_text',
                'translation_text' => 'Markeer als',
                'lang' => 'nl',
                'created_at' => '2022-09-15 07:56:37',
                'updated_at' => '2022-09-15 07:56:37',
            ),
            442 =>
            array (
                'id' => 945,
                'title' => 'Patient Address Information',
                'source_text' => 'patient_address_information_text',
                'translation_text' => 'Adresgegevens patiënt',
                'lang' => 'nl',
                'created_at' => '2022-09-15 07:57:49',
                'updated_at' => '2022-09-15 07:57:49',
            ),
            443 =>
            array (
                'id' => 946,
                'title' => 'Emergency',
                'source_text' => 'emergency_text',
                'translation_text' => 'Noodgeval',
                'lang' => 'nl',
                'created_at' => '2022-09-15 07:58:56',
                'updated_at' => '2022-09-15 07:58:56',
            ),
            444 =>
            array (
                'id' => 947,
                'title' => 'Disabled',
                'source_text' => 'disabled_text',
                'translation_text' => 'Gehandicapt',
                'lang' => 'nl',
                'created_at' => '2022-09-15 07:59:52',
                'updated_at' => '2022-09-15 07:59:52',
            ),
            445 =>
            array (
                'id' => 948,
                'title' => 'Fill in the patient address information',
                'source_text' => 'fill_in_the_patients_address_information_text',
                'translation_text' => 'Vul de adresgegevens van de patiënt in',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:00:52',
                'updated_at' => '2022-09-15 08:00:52',
            ),
            446 =>
            array (
                'id' => 949,
                'title' => 'Emergency Name',
                'source_text' => 'emergency_name_text',
                'translation_text' => 'Naam noodgeval',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:01:34',
                'updated_at' => '2022-09-15 08:01:34',
            ),
            447 =>
            array (
                'id' => 950,
                'title' => 'Emergency Email address',
                'source_text' => 'emergency_email_address_text',
                'translation_text' => 'E-mailadres voor noodgevallen',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:02:29',
                'updated_at' => '2022-09-15 08:02:29',
            ),
            448 =>
            array (
                'id' => 951,
                'title' => 'Emergency phone number',
                'source_text' => 'emergency_phone_number_text',
                'translation_text' => 'Telefoonnummer voor noodgevallen',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:03:39',
                'updated_at' => '2022-09-15 08:03:39',
            ),
            449 =>
            array (
                'id' => 952,
                'title' => 'Emergency home address',
                'source_text' => 'emergency_home_address_text',
                'translation_text' => 'Thuisadres voor noodgevallen',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:04:48',
                'updated_at' => '2022-09-15 08:04:48',
            ),
            450 =>
            array (
                'id' => 953,
                'title' => 'Continue to insurance',
                'source_text' => 'continue_to_insurance_text',
                'translation_text' => 'Ga verder naar verzekering',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:05:34',
                'updated_at' => '2022-09-15 08:05:34',
            ),
            451 =>
            array (
                'id' => 954,
                'title' => 'Patient Information',
                'source_text' => 'patient_information_text',
                'translation_text' => 'Patiënt informatie',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:06:33',
                'updated_at' => '2022-09-15 08:06:33',
            ),
            452 =>
            array (
                'id' => 955,
                'title' => 'Patient Insurer',
                'source_text' => 'patient_insurer_text',
                'translation_text' => 'Patiënt Verzekeraar',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:08:07',
                'updated_at' => '2022-09-15 08:08:07',
            ),
            453 =>
            array (
                'id' => 956,
                'title' => 'Fill in here if patients insurer is not listed',
                'source_text' => 'fill_in_here_if_patients_insurer_is_not_listed',
                'translation_text' => 'Vul hier in als patiëntenverzekeraar niet in de lijst staat',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:09:52',
                'updated_at' => '2022-09-15 08:09:52',
            ),
            454 =>
            array (
                'id' => 957,
                'title' => 'Insurance Policy Number',
                'source_text' => 'insurance_policy_number_text',
                'translation_text' => 'Verzekeringspolisnummer',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:10:58',
                'updated_at' => '2022-09-15 08:10:58',
            ),
            455 =>
            array (
                'id' => 958,
                'title' => 'Generation Information',
                'source_text' => 'generation_information_text',
                'translation_text' => 'Generatie-informatie',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:12:54',
                'updated_at' => '2022-09-15 08:12:54',
            ),
            456 =>
            array (
                'id' => 959,
                'title' => 'Patient General Overview',
                'source_text' => 'patient_general_overview_text',
                'translation_text' => 'Algemeen overzicht van de patiënt',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:16:53',
                'updated_at' => '2022-09-15 08:16:53',
            ),
            457 =>
            array (
                'id' => 960,
                'title' => 'Referred by',
                'source_text' => 'referred_by_text',
                'translation_text' => 'doorverwezen door',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:17:49',
                'updated_at' => '2022-09-15 08:17:49',
            ),
            458 =>
            array (
                'id' => 961,
                'title' => 'Refree phone',
                'source_text' => 'referee_phone_text',
                'translation_text' => 'Telefoon opnieuw vrijgeven',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:18:39',
                'updated_at' => '2022-09-15 08:18:39',
            ),
            459 =>
            array (
                'id' => 962,
                'title' => 'Referee email',
                'source_text' => 'referee_email_text',
                'translation_text' => 'Scheidsrechter e-mail',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:20:04',
                'updated_at' => '2022-09-15 08:20:04',
            ),
            460 =>
            array (
                'id' => 963,
                'title' => 'Preview',
                'source_text' => 'preview_text',
                'translation_text' => 'Voorbeeld',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:22:21',
                'updated_at' => '2022-09-15 08:22:21',
            ),
            461 =>
            array (
                'id' => 964,
                'title' => 'Preview data',
                'source_text' => 'preview_data_text',
                'translation_text' => 'Voorbeeldgegevens bekijken',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:23:30',
                'updated_at' => '2022-09-15 08:23:30',
            ),
            462 =>
            array (
                'id' => 965,
                'title' => 'Field',
                'source_text' => 'field_text',
                'translation_text' => 'Veld',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:24:53',
                'updated_at' => '2022-09-15 08:24:53',
            ),
            463 =>
            array (
                'id' => 966,
                'title' => 'Value',
                'source_text' => 'value_text',
                'translation_text' => 'Waarde',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:28:06',
                'updated_at' => '2022-09-15 08:28:06',
            ),
            464 =>
            array (
                'id' => 967,
                'title' => 'CSN',
                'source_text' => 'csn_text',
                'translation_text' => 'CSN',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:29:11',
                'updated_at' => '2022-09-15 08:29:11',
            ),
            465 =>
            array (
                'id' => 968,
                'title' => 'Patient Email',
                'source_text' => 'patient_email_text',
                'translation_text' => 'E-mail patiënt',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:31:18',
                'updated_at' => '2022-09-15 08:31:18',
            ),
            466 =>
            array (
                'id' => 969,
                'title' => 'Fill if other',
                'source_text' => 'fill_if_other_text',
                'translation_text' => 'Vul indien anders',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:32:59',
                'updated_at' => '2022-09-15 08:32:59',
            ),
            467 =>
            array (
                'id' => 970,
                'title' => 'Patient Onboarding Form',
                'source_text' => 'patient_onboarding_form_text',
                'translation_text' => 'Onboardingformulier voor patiënten',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:42:21',
                'updated_at' => '2022-09-15 08:42:21',
            ),
            468 =>
            array (
                'id' => 971,
                'title' => 'Patient Address',
                'source_text' => 'patient_address_text',
                'translation_text' => 'Patiëntadres:',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:44:37',
                'updated_at' => '2022-09-15 08:44:37',
            ),
            469 =>
            array (
                'id' => 972,
                'title' => 'Patient Insurance',
                'source_text' => 'patient_insurance_text',
                'translation_text' => 'Patiëntenverzekering',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:57:11',
                'updated_at' => '2022-09-15 08:57:11',
            ),
            470 =>
            array (
                'id' => 973,
                'title' => 'Patient Created Successfully',
                'source_text' => 'patient_created_successfully_text',
                'translation_text' => 'Patiënt succesvol aangemaakt',
                'lang' => 'nl',
                'created_at' => '2022-09-15 08:58:40',
                'updated_at' => '2022-09-15 08:58:40',
            ),
            471 =>
            array (
                'id' => 974,
                'title' => 'Finish patient biography form first text',
                'source_text' => 'finish_patient_biography_form_first_text',
                'translation_text' => 'Voltooi de biografie van de patiënt uit de eerste',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:01:00',
                'updated_at' => '2022-09-15 09:17:35',
            ),
            472 =>
            array (
                'id' => 975,
                'title' => 'Error',
                'source_text' => 'error_text',
                'translation_text' => 'Fout',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:02:10',
                'updated_at' => '2022-09-15 09:02:10',
            ),
            473 =>
            array (
                'id' => 976,
                'title' => 'Could not delete member',
                'source_text' => 'could_not_delete_member_text',
                'translation_text' => 'Kan lid niet verwijderen',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:02:56',
                'updated_at' => '2022-09-15 09:02:56',
            ),
            474 =>
            array (
                'id' => 977,
                'title' => 'Warning',
                'source_text' => 'warning_text',
                'translation_text' => 'Waarschuwing',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:03:54',
                'updated_at' => '2022-09-15 09:03:54',
            ),
            475 =>
            array (
                'id' => 978,
                'title' => 'Please Select an image',
                'source_text' => 'please_select_an_image_text',
                'translation_text' => 'Selecteer een afbeelding',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:05:14',
                'updated_at' => '2022-09-15 09:05:14',
            ),
            476 =>
            array (
                'id' => 979,
                'title' => 'Failed to update image',
                'source_text' => 'failed_to_update_image_text',
                'translation_text' => 'Kan afbeelding niet updaten',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:06:08',
                'updated_at' => '2022-09-15 09:06:08',
            ),
            477 =>
            array (
                'id' => 980,
                'title' => 'Patient Update Form',
                'source_text' => 'patient_update_form_text',
                'translation_text' => 'Formulier voor patiëntupdate',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:07:29',
                'updated_at' => '2022-09-15 09:07:29',
            ),
            478 =>
            array (
                'id' => 981,
                'title' => 'Personal details',
                'source_text' => 'personal_details_text',
                'translation_text' => 'Persoonlijke gegevens',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:09:12',
                'updated_at' => '2022-09-15 09:09:12',
            ),
            479 =>
            array (
                'id' => 982,
                'title' => 'Upload photo',
                'source_text' => 'upload_photo_text',
                'translation_text' => 'Upload foto',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:10:38',
                'updated_at' => '2022-09-15 09:10:38',
            ),
            480 =>
            array (
                'id' => 983,
                'title' => 'Capture',
                'source_text' => 'capture_text',
                'translation_text' => 'Vastleggen',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:11:22',
                'updated_at' => '2022-09-15 09:11:22',
            ),
            481 =>
            array (
                'id' => 984,
                'title' => 'Current date of birth',
                'source_text' => 'current_date_of_birth_text',
                'translation_text' => 'Huidige geboortedatum',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:12:11',
                'updated_at' => '2022-09-15 09:12:11',
            ),
            482 =>
            array (
                'id' => 985,
                'title' => 'Next of kin full name',
                'source_text' => 'next_of_kin_full_name_text',
                'translation_text' => 'Volledige naam nabestaande',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:13:00',
                'updated_at' => '2022-09-15 09:13:00',
            ),
            483 =>
            array (
                'id' => 986,
                'title' => 'Next of kin phone  number',
                'source_text' => 'next_of_kin_phone_number_text',
                'translation_text' => 'Telefoonnummer nabestaanden',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:14:10',
                'updated_at' => '2022-09-15 09:14:10',
            ),
            484 =>
            array (
                'id' => 987,
                'title' => 'Next of kin email address',
                'source_text' => 'next_of_kin_email_address_text',
                'translation_text' => 'E-mailadres van nabestaanden',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:15:01',
                'updated_at' => '2022-09-15 09:15:01',
            ),
            485 =>
            array (
                'id' => 988,
                'title' => 'Minor please fill in the family section',
                'source_text' => 'minor_please_fill_in_the_family_section_text',
                'translation_text' => 'Minderjarig gelieve het familiegedeelte in te vullen',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:16:28',
                'updated_at' => '2022-09-15 09:16:28',
            ),
            486 =>
            array (
                'id' => 989,
                'title' => 'Adult please continue to the other section',
                'source_text' => 'adult_please_continue_to_the_other_section_text',
                'translation_text' => 'Volwassen ga verder naar de andere sectie',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:18:38',
                'updated_at' => '2022-09-15 09:18:38',
            ),
            487 =>
            array (
                'id' => 990,
                'title' => 'Choose a family member to consider',
                'source_text' => 'choose_a_family_member_to_consider_text',
                'translation_text' => 'Kies een familielid om te overwegen',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:26:19',
                'updated_at' => '2022-09-15 09:26:19',
            ),
            488 =>
            array (
                'id' => 991,
                'title' => 'Member contact',
                'source_text' => 'member_contact_text',
                'translation_text' => 'Ledencontact',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:35:25',
                'updated_at' => '2022-09-15 09:35:25',
            ),
            489 =>
            array (
                'id' => 992,
                'title' => 'Guardian Information',
                'source_text' => 'guardian_information_text',
                'translation_text' => 'Informatie over de voogd',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:38:21',
                'updated_at' => '2022-09-15 09:38:21',
            ),
            490 =>
            array (
                'id' => 993,
                'title' => 'Guardian name',
                'source_text' => 'guardian_name_text',
                'translation_text' => 'naam voogd',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:39:06',
                'updated_at' => '2022-09-15 09:39:06',
            ),
            491 =>
            array (
                'id' => 994,
                'title' => 'Guardian email address',
                'source_text' => 'guardian_email_address_text',
                'translation_text' => 'E-mailadres van de voogd',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:39:41',
                'updated_at' => '2022-09-15 09:39:41',
            ),
            492 =>
            array (
                'id' => 995,
                'title' => 'Guardian phone number',
                'source_text' => 'guardian_phone_number_text',
                'translation_text' => 'Telefoonnummer voogd',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:40:54',
                'updated_at' => '2022-09-15 09:40:54',
            ),
            493 =>
            array (
                'id' => 996,
                'title' => 'Guardian home address',
                'source_text' => 'guardian_home_address_text',
                'translation_text' => 'Huisadres voogd',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:41:37',
                'updated_at' => '2022-09-15 09:41:37',
            ),
            494 =>
            array (
                'id' => 997,
                'title' => 'Preview before submit',
                'source_text' => 'preview_before_submit_text',
                'translation_text' => 'Voorbeeld voor verzenden',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:44:34',
                'updated_at' => '2022-09-15 09:44:34',
            ),
            495 =>
            array (
                'id' => 998,
                'title' => 'Reviews',
                'source_text' => 'reviews_text',
                'translation_text' => 'Beoordelingen',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:46:16',
                'updated_at' => '2022-09-15 09:46:16',
            ),
            496 =>
            array (
                'id' => 999,
                'title' => 'Update patient',
                'source_text' => 'update_patient_text',
                'translation_text' => 'Patiënt bijwerken',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:47:07',
                'updated_at' => '2022-09-15 09:47:07',
            ),
            497 =>
            array (
                'id' => 1000,
                'title' => 'Please check your validation mistakes',
                'source_text' => 'please_check_your_validation_mistakes_text',
                'translation_text' => 'Controleer uw validatiefouten',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:48:01',
                'updated_at' => '2022-09-15 09:48:01',
            ),
            498 =>
            array (
                'id' => 1001,
                'title' => 'Patient updated successfully',
                'source_text' => 'patient_updated_successfully_text',
                'translation_text' => 'Patiënt succesvol bijgewerkt',
                'lang' => 'nl',
                'created_at' => '2022-09-15 09:49:28',
                'updated_at' => '2022-09-15 09:49:28',
            ),
            499 =>
            array (
                'id' => 1002,
                'title' => 'Fill in here if patients insurer is not listed',
                'source_text' => 'fill_in_here_if_patients_insurer_is_not_listed_text',
                'translation_text' => 'Vul hier in als patiëntenverzekeraar niet in de lijst staat',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:08:18',
                'updated_at' => '2022-09-15 11:08:18',
            ),
        ));
        \DB::table('translations')->insert(array (
            0 =>
            array (
                'id' => 1003,
                'title' => 'Defaulter',
                'source_text' => 'defaulter_text',
                'translation_text' => 'wanbetaler',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:09:04',
                'updated_at' => '2022-09-15 11:09:04',
            ),
            1 =>
            array (
                'id' => 1004,
                'title' => 'Old Password',
                'source_text' => 'old_password',
                'translation_text' => 'Oud Wachtwoord',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:11:13',
                'updated_at' => '2022-09-15 11:11:13',
            ),
            2 =>
            array (
                'id' => 1005,
                'title' => 'Cannot make appointments anymore',
                'source_text' => 'cannot_make_appointments_anymore_text',
                'translation_text' => 'Kan geen afspraken meer maken',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:11:18',
                'updated_at' => '2022-09-15 11:11:18',
            ),
            3 =>
            array (
                'id' => 1006,
                'title' => 'New Password',
                'source_text' => 'new_password',
                'translation_text' => 'nieuw paswoord',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:12:01',
                'updated_at' => '2022-09-15 11:12:01',
            ),
            4 =>
            array (
                'id' => 1007,
                'title' => 'No payment reminder',
                'source_text' => 'no_payment_reminder_text',
                'translation_text' => 'Geen betalingsherinnering',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:12:27',
                'updated_at' => '2022-09-15 11:12:27',
            ),
            5 =>
            array (
                'id' => 1008,
                'title' => 'Confirm New Password',
                'source_text' => 'confirm_new_password',
                'translation_text' => 'Bevestig nieuw wachtwoord',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:12:45',
                'updated_at' => '2022-09-15 11:12:45',
            ),
            6 =>
            array (
                'id' => 1009,
                'title' => 'Exclude from insurance claim',
                'source_text' => 'exclude_from_insurance_claim_text',
                'translation_text' => 'Uitsluiten van verzekeringsclaim',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:13:44',
                'updated_at' => '2022-09-15 11:13:44',
            ),
            7 =>
            array (
                'id' => 1010,
                'title' => 'Customer in arrears',
                'source_text' => 'customer_in_arrears_text',
                'translation_text' => 'Achterstallige klant',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:14:35',
                'updated_at' => '2022-09-15 11:14:35',
            ),
            8 =>
            array (
                'id' => 1011,
                'title' => 'Password Reset Failed',
                'source_text' => 'password_reset_failed',
                'translation_text' => 'Wachtwoord opnieuw instellen mislukt',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:17:23',
                'updated_at' => '2022-09-15 11:17:23',
            ),
            9 =>
            array (
                'id' => 1012,
                'title' => 'Please check the filled form',
                'source_text' => 'please_check_form',
                'translation_text' => 'Controleer het ingevulde formulier',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:18:51',
                'updated_at' => '2022-09-15 11:18:51',
            ),
            10 =>
            array (
                'id' => 1013,
                'title' => 'Your Passsword has been Reset Successfully',
                'source_text' => 'password_reset_password',
                'translation_text' => 'Uw wachtwoord is succesvol gereset',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:23:12',
                'updated_at' => '2022-09-15 11:23:12',
            ),
            11 =>
            array (
                'id' => 1014,
                'title' => 'Change Password',
                'source_text' => 'change_password',
                'translation_text' => 'Verander wachtwoord',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:43:11',
                'updated_at' => '2022-09-15 11:43:11',
            ),
            12 =>
            array (
                'id' => 1015,
                'title' => 'Address Information',
                'source_text' => 'address_information',
                'translation_text' => 'adres informatie',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:45:04',
                'updated_at' => '2022-09-15 11:45:04',
            ),
            13 =>
            array (
                'id' => 1016,
                'title' => 'Update Profile',
                'source_text' => 'profile_update_text',
                'translation_text' => 'Profiel bijwerken',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:46:44',
                'updated_at' => '2022-09-15 11:46:44',
            ),
            14 =>
            array (
                'id' => 1017,
                'title' => 'Occupation',
                'source_text' => 'occupation_text',
                'translation_text' => 'Bezigheid',
                'lang' => 'nl',
                'created_at' => '2022-09-15 11:48:19',
                'updated_at' => '2022-09-15 11:48:19',
            ),
            15 =>
            array (
                'id' => 1018,
                'title' => 'We are loading your invoices',
                'source_text' => 'we_are_loading_your_invoices',
                'translation_text' => 'We zijn uw facturen aan het laden',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:05:14',
                'updated_at' => '2022-09-15 13:05:14',
            ),
            16 =>
            array (
                'id' => 1019,
                'title' => 'Invoice Number',
                'source_text' => 'invoice_number',
                'translation_text' => 'Factuurnummer',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:06:12',
                'updated_at' => '2022-09-15 13:06:12',
            ),
            17 =>
            array (
                'id' => 1020,
                'title' => 'Paid Amount',
                'source_text' => 'paid_amount',
                'translation_text' => 'Betaald bedrag',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:07:37',
                'updated_at' => '2022-09-15 13:07:37',
            ),
            18 =>
            array (
                'id' => 1021,
                'title' => 'Amount Due',
                'source_text' => 'amount_due',
                'translation_text' => 'Verschuldigd bedrag',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:09:07',
                'updated_at' => '2022-09-15 13:09:07',
            ),
            19 =>
            array (
                'id' => 1022,
                'title' => 'Total Amount',
                'source_text' => 'total_amount',
                'translation_text' => 'Totaalbedrag',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:09:58',
                'updated_at' => '2022-09-15 13:09:58',
            ),
            20 =>
            array (
                'id' => 1023,
                'title' => 'Print',
                'source_text' => 'text_print',
                'translation_text' => 'Afdrukken',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:12:38',
                'updated_at' => '2022-09-15 13:12:38',
            ),
            21 =>
            array (
                'id' => 1024,
                'title' => 'Search Invoices',
                'source_text' => 'search_invoices',
                'translation_text' => 'Facturen zoeken',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:13:32',
                'updated_at' => '2022-09-15 13:13:32',
            ),
            22 =>
            array (
                'id' => 1025,
                'title' => 'Copy',
                'source_text' => 'text_copy',
                'translation_text' => 'Kopiëren',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:14:12',
                'updated_at' => '2022-09-15 13:14:12',
            ),
            23 =>
            array (
                'id' => 1026,
                'title' => 'Excel',
                'source_text' => 'text_excel',
                'translation_text' => 'Excel',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:14:47',
                'updated_at' => '2022-09-15 13:14:47',
            ),
            24 =>
            array (
                'id' => 1027,
                'title' => 'Next page',
                'source_text' => 'next_page',
                'translation_text' => 'Volgende pagina',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:16:44',
                'updated_at' => '2022-09-15 13:16:44',
            ),
            25 =>
            array (
                'id' => 1028,
                'title' => 'Previous page',
                'source_text' => 'Vorige pagina',
                'translation_text' => 'Vorige pagina',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:17:37',
                'updated_at' => '2022-09-15 13:17:37',
            ),
            26 =>
            array (
                'id' => 1029,
                'title' => 'Previous Page',
                'source_text' => 'previous_page',
                'translation_text' => 'Vorige pagina',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:18:39',
                'updated_at' => '2022-09-15 13:18:39',
            ),
            27 =>
            array (
                'id' => 1030,
                'title' => 'Make Payment',
                'source_text' => 'make_payment',
                'translation_text' => 'Betaling maken',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:26:56',
                'updated_at' => '2022-09-15 13:26:56',
            ),
            28 =>
            array (
                'id' => 1031,
                'title' => 'We are loading your invoice details',
                'source_text' => 'loading_invoice_details',
                'translation_text' => 'We zijn uw factuurgegevens aan het laden',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:28:19',
                'updated_at' => '2022-09-15 13:28:19',
            ),
            29 =>
            array (
                'id' => 1032,
                'title' => 'Search Appointments',
                'source_text' => 'search_appointments',
                'translation_text' => 'Zoek afspraken',
                'lang' => 'nl',
                'created_at' => '2022-09-15 13:54:52',
                'updated_at' => '2022-09-15 13:54:52',
            ),
            30 =>
            array (
                'id' => 1033,
                'title' => 'TRANSACTIONS',
                'source_text' => 'text_transactions',
                'translation_text' => 'TRANSACTIES',
                'lang' => 'nl',
                'created_at' => '2022-09-15 14:06:36',
                'updated_at' => '2022-09-15 14:06:36',
            ),
            31 =>
            array (
                'id' => 1034,
                'title' => 'We are loading your transactions',
                'source_text' => 'we_loading_transactions',
                'translation_text' => 'We zijn uw transacties aan het laden',
                'lang' => 'nl',
                'created_at' => '2022-09-15 14:09:54',
                'updated_at' => '2022-09-15 14:09:54',
            ),
            32 =>
            array (
                'id' => 1035,
                'title' => 'Transactions',
                'source_text' => 'text_transaction',
                'translation_text' => 'Transacties',
                'lang' => 'nl',
                'created_at' => '2022-09-15 14:22:10',
                'updated_at' => '2022-09-15 14:22:10',
            ),
            33 =>
            array (
                'id' => 1036,
                'title' => 'Process Payment',
                'source_text' => 'process_payment',
                'translation_text' => 'Betaling verwerken',
                'lang' => 'nl',
                'created_at' => '2022-09-15 14:40:39',
                'updated_at' => '2022-09-15 14:40:39',
            ),
            34 =>
            array (
                'id' => 1037,
                'title' => 'Cancel',
                'source_text' => 'text_cancel',
                'translation_text' => 'Annuleren',
                'lang' => 'nl',
                'created_at' => '2022-09-19 06:00:15',
                'updated_at' => '2022-09-19 06:00:15',
            ),
            35 =>
            array (
                'id' => 1038,
                'title' => 'Treatment History',
                'source_text' => 'treatment_history',
                'translation_text' => 'Behandelingsgeschiedenis',
                'lang' => 'nl',
                'created_at' => '2022-09-20 14:24:23',
                'updated_at' => '2022-09-20 14:24:23',
            ),
            36 =>
            array (
                'id' => 1039,
                'title' => 'Payment Status',
                'source_text' => 'payment_status',
                'translation_text' => 'Betalingsstatus',
                'lang' => 'nl',
                'created_at' => '2022-09-21 07:56:34',
                'updated_at' => '2022-09-21 07:56:34',
            ),
            37 =>
            array (
                'id' => 1040,
                'title' => 'Tooth Element',
                'source_text' => 'tooth_element',
                'translation_text' => 'tand element',
                'lang' => 'nl',
                'created_at' => '2022-09-21 08:11:49',
                'updated_at' => '2022-09-21 08:11:49',
            ),
            38 =>
            array (
                'id' => 1041,
                'title' => 'Done By',
                'source_text' => 'done_by',
                'translation_text' => 'Gedaan door',
                'lang' => 'nl',
                'created_at' => '2022-09-21 08:18:08',
                'updated_at' => '2022-09-21 08:18:08',
            ),
            39 =>
            array (
                'id' => 1042,
                'title' => 'We are loading your Data',
                'source_text' => 'loading_data',
                'translation_text' => 'We zijn uw gegevens aan het laden',
                'lang' => 'nl',
                'created_at' => '2022-09-21 08:50:52',
                'updated_at' => '2022-09-21 08:50:52',
            ),
            40 =>
            array (
                'id' => 1043,
                'title' => 'No  Upcoming Appointments yet',
                'source_text' => 'no_upcoming_appointments',
                'translation_text' => 'Nog geen geplande afspraken',
                'lang' => 'nl',
                'created_at' => '2022-09-22 13:20:12',
                'updated_at' => '2022-09-22 13:20:12',
            ),
            41 =>
            array (
                'id' => 1044,
                'title' => 'Recent Invoices',
                'source_text' => 'recent_invoices',
                'translation_text' => 'Recente facturen',
                'lang' => 'nl',
                'created_at' => '2022-09-22 13:23:24',
                'updated_at' => '2022-09-22 13:23:24',
            ),
            42 =>
            array (
                'id' => 1045,
                'title' => 'Currency',
                'source_text' => 'currency_text',
                'translation_text' => 'Munteenheid',
                'lang' => 'nl',
                'created_at' => '2022-09-22 13:29:23',
                'updated_at' => '2022-09-22 13:29:23',
            ),
            43 =>
            array (
                'id' => 1046,
                'title' => 'Recent Messages',
                'source_text' => 'recent_messages',
                'translation_text' => 'Recente berichten',
                'lang' => 'nl',
                'created_at' => '2022-09-22 13:41:52',
                'updated_at' => '2022-09-22 13:41:52',
            ),
            44 =>
            array (
                'id' => 1047,
                'title' => 'We are loading your Emails',
                'source_text' => 'loading_emails',
                'translation_text' => 'We zijn uw e-mails aan het laden',
                'lang' => 'nl',
                'created_at' => '2022-09-22 14:02:02',
                'updated_at' => '2022-09-22 14:02:02',
            ),
            45 =>
            array (
                'id' => 1048,
                'title' => 'View All Invoices',
                'source_text' => 'view_all_invoices',
                'translation_text' => 'Bekijk alle facturen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),
            46 =>
            array (
                'id' => 1049,
                'title' => 'Outbox',
                'source_text' => 'outbox_text',
                'translation_text' => 'Outbox',
                'lang' => 'nl',
                'created_at' => '2022-09-26 14:00:45',
                'updated_at' => '2022-09-26 14:00:45',
            ),
            47 =>
            array (
                'id' => 1050,
                'title' => 'Sent To',
                'source_text' => 'sent_to',
                'translation_text' => 'Verzonden naar',
                'lang' => 'nl',
                'created_at' => '2022-09-26 14:14:40',
                'updated_at' => '2022-09-26 14:14:40',
            ),
            48 =>
            array (
                'id' => 1051,
                'title' => 'Message',
                'source_text' => 'text_message',
                'translation_text' => 'Bericht',
                'lang' => 'nl',
                'created_at' => '2022-09-26 14:20:37',
                'updated_at' => '2022-09-26 14:20:37',
            ),

            44 =>
            array (
                'id' => 1052,
                'title' => 'We are loading your Emails',
                'source_text' => 'loading_emails',
                'translation_text' => 'We zijn uw e-mails aan het laden',
                'lang' => 'nl',
                'created_at' => '2022-09-22 14:02:02',
                'updated_at' => '2022-09-22 14:02:02',
            ),
            45 =>
            array (
                'id' => 1053,
                'title' => 'View All Invoices',
                'source_text' => 'view_all_invoices',
                'translation_text' => 'Bekijk alle facturen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            46 =>
            array (
                'id' => 1054,
                'title' => 'All Invoices',
                'source_text' => 'all_invoices',
                'translation_text' => 'All Invoices',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            47 =>
            array (
                'id' => 1055,
                'title' => 'All Invoices',
                'source_text' => 'all_invoices',
                'translation_text' => 'Alle facturen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            48 =>
            array (
                'id' => 1056,
                'title' => 'Paid Blls',
                'source_text' => 'paid_bills',
                'translation_text' => 'Paid Blls',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            48 =>
            array (
                'id' => 1057,
                'title' => 'Paid Blls',
                'source_text' => 'paid_bills',
                'translation_text' => 'Betaalde rekeningen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),



            49 =>
            array (
                'id' => 1058,
                'title' => 'UnPaid Blls',
                'source_text' => 'un_paid_bills',
                'translation_text' => 'Onbetaalde rekeningen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            50 =>
            array (
                'id' => 1059,
                'title' => 'UnPaid Blls',
                'source_text' => 'un_paid_bills',
                'translation_text' => 'UnPaid Blls',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            51 =>
            array (
                'id' => 1060,
                'title' => 'Private Blls',
                'source_text' => 'private_bills',
                'translation_text' => 'Private Blls',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            52 =>
            array (
                'id' => 1061,
                'title' => 'Private Blls',
                'source_text' => 'private_bills',
                'translation_text' => 'Privé Blls',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            53 =>
            array (
                'id' => 1062,
                'title' => 'Insurance Blls',
                'source_text' => 'insurance_bills',
                'translation_text' => 'Verzekeringsrekeningen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            54 =>
            array (
                'id' => 1063,
                'title' => 'Insurance Blls',
                'source_text' => 'insurance_bills',
                'translation_text' => 'Insurance Blls',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            55 =>
            array (
                'id' => 1064,
                'title' => 'Pricings',
                'source_text' => 'pricings',
                'translation_text' => 'Pricings',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            56 =>
            array (
                'id' => 1065,
                'title' => 'Pricings',
                'source_text' => 'pricings',
                'translation_text' => 'Prijzen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            27 =>
            array (
                'id' => 1066,
                'title' => 'View All',
                'source_text' => 'view_all_text',
                'translation_text' => 'View All',
                'lang' => 'en',
                'created_at' => '2022-08-29 11:04:41',
                'updated_at' => '2022-08-29 11:04:41',
            ),

            412 =>
            array (
                'id' => 1067,
                'title' => 'Invoices',
                'source_text' => 'invoice_text',
                'translation_text' => 'Invoices',
                'lang' => 'en',
                'created_at' => '2022-09-06 09:33:48',
                'updated_at' => '2022-09-06 09:33:48',
            ),

            445 =>
            array (
                'id' => 1068,
                'title' => 'Paid Blls',
                'source_text' => 'paid_bills',
                'translation_text' => 'Betaalde rekeningen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            4578 =>
            array (
                'id' => 1069,
                'title' => 'New Invoice',
                'source_text' => 'new_invoice',
                'translation_text' => 'New Invoice',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            415 =>
            array (
                'id' => 1070,
                'title' => 'New Invoice',
                'source_text' => 'new_invoice',
                'translation_text' => 'Nieuwe factuur',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            413 =>
            array (
                'id' => 1071,
                'title' => 'Invoice Payment Trends',
                'source_text' => 'invoice_payment_trends',
                'translation_text' => 'Invoice Payment Trends',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            413 =>
            array (
                'id' => 1072,
                'title' => 'Invoice Payment Trends',
                'source_text' => 'invoice_payment_trends',
                'translation_text' => 'Trends in factuurbetalingen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            414 =>
            array (
                'id' => 1073,
                'title' => 'Paid',
                'source_text' => 'paid',
                'translation_text' => 'Betaald',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            414 =>
            array (
                'id' => 1074,
                'title' => 'Paid',
                'source_text' => 'paid',
                'translation_text' => 'Paid',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            414 =>
            array (
                'id' => 1075,
                'title' => 'UnPaid',
                'source_text' => 'unpaid',
                'translation_text' => 'Onbetaald',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            414 =>
            array (
                'id' => 1076,
                'title' => 'UnPaid',
                'source_text' => 'unpaid',
                'translation_text' => 'UnPaid',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            414 =>
            array (
                'id' => 1077,
                'title' => 'Code',
                'source_text' => 'code',
                'translation_text' => 'Code',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            414 =>
            array (
                'id' => 1078,
                'title' => 'Code',
                'source_text' => 'code',
                'translation_text' => 'Code',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            414 =>
            array (
                'id' => 1077,
                'title' => 'SubCategory',
                'source_text' => 'subcategory',
                'translation_text' => 'SubCategory',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            415 =>
            array (
                'id' => 1078,
                'title' => 'SubCategory',
                'source_text' => 'subcategory',
                'translation_text' => 'Subcategorie',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            416 =>
            array (
                'id' => 1079,
                'title' => 'Import',
                'source_text' => 'import',
                'translation_text' => 'Import',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            417 =>
            array (
                'id' => 1080,
                'title' => 'Import',
                'source_text' => 'import',
                'translation_text' => 'importeren',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),


            445 =>
            array (
                'id' => 1081,
                'title' => 'Add Treatment',
                'source_text' => 'add_treatment',
                'translation_text' => 'Add Treatment',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            567 =>
            array (
                'id' => 1082,
                'title' => 'Add Treatment',
                'source_text' => 'add_treatment',
                'translation_text' => 'Behandeling toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            418 =>
            array (
                'id' => 1083,
                'title' => 'Export',
                'source_text' => 'export',
                'translation_text' => 'Export',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            414 =>
            array (
                'id' => 1084,
                'title' => 'Export',
                'source_text' => 'export',
                'translation_text' => 'Exporteren',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            419=>
            array (
                'id' => 1085,
                'title' => 'Treatment Prices',
                'source_text' => 'treatment_prices',
                'translation_text' => 'Treatment Prices',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            420 =>
            array (
                'id' => 1087,
                'title' => 'Treatment Prices',
                'source_text' => 'treatment_prices',
                'translation_text' => 'Behandeling Prijzen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            421=>
            array (
                'id' => 1088,
                'title' => 'Treatment Prices',
                'source_text' => 'treatment_prices',
                'translation_text' => 'Treatment Prices',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            422 =>
            array (
                'id' => 1089,
                'title' => 'Treatment Prices',
                'source_text' => 'treatment_prices',
                'translation_text' => 'Behandeling Prijzen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            423=>
            array (
                'id' => 1090,
                'title' => 'Treatment Categories',
                'source_text' => 'treatment_categories',
                'translation_text' => 'Treatment Categories',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            424 =>
            array (
                'id' => 1091,
                'title' => 'Treatment Categories',
                'source_text' => 'treatment_categories',
                'translation_text' => 'Behandelingscategorieën',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            425=>
            array (
                'id' => 1092,
                'title' => 'Main Category',
                'source_text' => 'main_category',
                'translation_text' => 'Main Category',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            426 =>
            array (
                'id' => 1093,
                'title' => 'Main Category',
                'source_text' => 'main_category',
                'translation_text' => 'Hoofdcategorie',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            427=>
            array (
                'id' => 1094,
                'title' => 'Add New',
                'source_text' => 'add_new',
                'translation_text' => 'Add New',
                'lang' => 'en',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),

            426 =>
            array (
                'id' => 1095,
                'title' => 'Add New',
                'source_text' => 'add_new',
                'translation_text' => 'Nieuw toevoegen',
                'lang' => 'nl',
                'created_at' => '2022-09-23 08:34:58',
                'updated_at' => '2022-09-23 08:34:58',
            ),
        ));


    }
}
