<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('elements')->truncate();
        $translations = [
            [
                'view_id' => 1,
                'label' => 'Dashboard'
            ],
            [
                'view_id' => 1,
                'label' => 'Doctor'
            ],
            [
                'view_id' => 1,
                'label' => 'Front Office'
            ],
            [
                'view_id' => 1,
                'label' => 'Patients'
            ],
            [
                'view_id' => 1,
                'label' => 'Calendar'
            ],
            [
                'view_id' => 1,
                'label' => 'Billing'
            ],
            [
                'view_id' => 1,
                'label' => 'Reports'
            ],
            [
                'view_id' => 1,
                'label' => 'Insurance'
            ],
            [
                'view_id' => 1,
                'label' => 'Imaging'
            ],
            [
                'view_id' => 1,
                'label' => 'Human Resources'
            ],
            [
                'view_id' => 1,
                'label' => 'Settings'
            ],
            [
                'view_id' => 1,
                'label' => 'Logout'
            ],
            // DASHBOARD LANDING PAGE
            [
                'view_id' => 2,
                'label' => 'Total Patients'
            ],
            [
                'view_id' => 2,
                'label' => 'Expected Patients Today'
            ],
            [
                'view_id' => 2,
                'label' => 'Outstanding Invoices'
            ],
            [
                'view_id' => 2,
                'label' => 'Completed Appointments'
            ],
            [
                'view_id' => 2,
                'label' => 'Appointments Calendar'
            ],
            [
                'view_id' => 2,
                'label' => 'Upcoming Appointments'
            ],
            // FRONTOFFICE FILTERS
            [
                'view_id' => 3,
                'label' => 'Search by keyword'
            ],
            [
                'view_id' => 3,
                'label' => 'Department'
            ],
            [
                'view_id' => 3,
                'label' => 'Appointment Type'
            ],
            [
                'view_id' => 3,
                'label' => 'Assigned To'
            ],
            // CREATE NEW APPOINTMENT BUTTON
            [
                'view_id' => 3,
                'label' => 'New Appointment'
            ],
            // FRONT OFFICE CATEGORY HEADERS
            [
                'view_id' => 3,
                'label' => 'Upcoming'
            ],
            [
                'view_id' => 3,
                'label' => 'Waiting'
            ],
            [
                'view_id' => 3,
                'label' => 'Serving'
            ],
            [
                'view_id' => 3,
                'label' => 'Completed'
            ],
            // FRONTOFFICE CHECKIN AREA
            [
                'view_id' => 3,
                'label' => 'Check in'
            ],
            [
                'view_id' => 3,
                'label' => 'My Queue'
            ],
            [
                'view_id' => 3,
                'label' => 'My Tasks'
            ],
            [
                'view_id' => 3,
                'label' => 'Telephone'
            ],
            [
                'view_id' => 3,
                'label' => 'Guest'
            ],
            [
                'view_id' => 3,
                'label' => 'Serving'
            ],
            [
                'view_id' => 3,
                'label' => 'Reason'
            ],
            [
                'view_id' => 3,
                'label' => 'Timeline'
            ],
            [
                'view_id' => 3,
                'label' => 'RETURN TO QUEUE'
            ],
            [
                'view_id' => 3,
                'label' => 'FINISH'
            ],
            // FRONTOFFICE BOTTOM NAVIGATION
            [
                'view_id' => 3,
                'label' => 'Daily Queue'
            ],
            [
                'view_id' => 3,
                'label' => 'Doctor Schedule'
            ],
            [
                'view_id' => 3,
                'label' => 'Waiting List'
            ],
            // FRONTOFFICE APPOINTMENT CARD OPTIONS MODAL
            [
                'view_id' => 3,
                'label' => 'Open'
            ],
            [
                'view_id' => 3,
                'label' => 'Cancel'
            ],
            [
                'view_id' => 3,
                'label' => 'Reschedule'
            ],
            [
                'view_id' => 3,
                'label' => 'State'
            ],
            // FRONTOFFICE APPOINTMENT CREATION MODAL
            [
                'view_id' => 4,
                'label' => 'SCHEDULING ASSISTANT'
            ],
            [
                'view_id' => 4,
                'label' => 'Patient Appointment'
            ],
            [
                'view_id' => 4,
                'label' => 'Select Patient'
            ],
            [
                'view_id' => 4,
                'label' => 'Main Doctor'
            ],
            [
                'view_id' => 4,
                'label' => 'Select Treatment'
            ],
            [
                'view_id' => 4,
                'label' => 'Select Type'
            ],
            [
                'view_id' => 4,
                'label' => 'Add required doctors'
            ],
            [
                'view_id' => 4,
                'label' => 'Other attendees'
            ],
            [
                'view_id' => 4,
                'label' => 'Start'
            ],
            [
                'view_id' => 4,
                'label' => 'End'
            ],
            [
                'view_id' => 4,
                'label' => 'Technical Work (TW)'
            ],
            [
                'view_id' => 5,
                'label' => 'Yes'
            ],
            [
                'view_id' => 5,
                'label' => 'No'
            ],
            [
                'view_id' => 4,
                'label' => 'Select Frequency'
            ],
            [
                'view_id' => 4,
                'label' => 'occurs every'
            ],
            // DOCTOR SCHEDULE
            [
                'view_id' => 4,
                'label' => 'Assigned To'
            ],
            // WAITING LIST
            [
                'view_id' => 4,
                'label' => 'Patient'
            ],
            [
                'view_id' => 4,
                'label' => 'Treatment'
            ],
            [
                'view_id' => 4,
                'label' => 'Doctor(s)'
            ],
            [
                'view_id' => 4,
                'label' => 'Department'
            ],
            [
                'view_id' => 4,
                'label' => 'Appointment Id'
            ],
            // COMMON WORDS
            [
                'view_id' => 5,
                'label' => 'Time'
            ],
            [
                'view_id' => 5,
                'label' => 'Day'
            ],
            [
                'view_id' => 5,
                'label' => 'Days'
            ],
            [
                'view_id' => 5,
                'label' => 'Today'
            ],
            [
                'view_id' => 5,
                'label' => 'Week'
            ],
            [
                'view_id' => 5,
                'label' => 'Work Week'
            ],
            [
                'view_id' => 5,
                'label' => 'Weeks'
            ],
            [
                'view_id' => 5,
                'label' => 'Month'
            ],
            [
                'view_id' => 5,
                'label' => 'Months'
            ],
            [
                'view_id' => 5,
                'label' => 'Year'
            ],
            [
                'view_id' => 5,
                'label' => 'Years'
            ],
            [
                'view_id' => 5,
                'label' => 'Patient'
            ],
            [
                'view_id' => 5,
                'label' => 'Patients'
            ],
            [
                'view_id' => 5,
                'label' => 'Doctor'
            ],
            [
                'view_id' => 5,
                'label' => 'Doctors'
            ],
            [
                'view_id' => 5,
                'label' => 'Treatment'
            ],
            [
                'view_id' => 5,
                'label' => 'Treatments'
            ],
            [
                'view_id' => 5,
                'label' => 'Appointment'
            ],
            [
                'view_id' => 5,
                'label' => 'Appointments'
            ],
            [
                'view_id' => 5,
                'label' => 'Calendar'
            ],
            [
                'view_id' => 5,
                'label' => 'Name'
            ],
            [
                'view_id' => 5,
                'label' => 'Address'
            ],
            [
                'view_id' => 5,
                'label' => 'Reset'
            ],
            [
                'view_id' => 5,
                'label' => 'Cancel'
            ],
            [
                'view_id' => 5,
                'label' => 'Save'
            ],
            [
                'view_id' => 5,
                'label' => 'CONFIGURATIONS'
            ],
            // CALENDAR LANDING
            [
                'view_id' => 5,
                'label' => 'Address'
            ],
            // DOCTOR LANDING VIEW
            [
                'view_id' => 7,
                'label' => 'My Dashboard'
            ],
            [
                'view_id' => 7,
                'label' => 'Audio switched off'
            ],
            [
                'view_id' => 7,
                'label' => 'Schedule'
            ],
            [
                'view_id' => 7,
                'label' => 'Waiting Room'
            ],
            [
                'view_id' => 7,
                'label' => 'Appointment for'
            ],
            [
                'view_id' => 7,
                'label' => 'Chart'
            ],
            [
                'view_id' => 7,
                'label' => 'Perio'
            ],
            [
                'view_id' => 5,
                'label' => 'Imaging'
            ],
            [
                'view_id' => 5,
                'label' => 'History'
            ],
            [
                'view_id' => 5,
                'label' => 'Billing'
            ],
            [
                'view_id' => 5,
                'label' => 'Care Plan'
            ],
            [
                'view_id' => 5,
                'label' => 'Treatment Plan'
            ],
            [
                'view_id' => 5,
                'label' => 'DOB'
            ],
            [
                'view_id' => 5,
                'label' => 'Gender'
            ],
            [
                'view_id' => 5,
                'label' => 'Appointment Type'
            ],
            [
                'view_id' => 5,
                'label' => 'Appointment Time'
            ],
            [
                'view_id' => 5,
                'label' => 'Appointment Slots'
            ],
            [
                'view_id' => 5,
                'label' => 'ACTIVITY'
            ],
            [
                'view_id' => 5,
                'label' => 'Patient checked in'
            ],
            [
                'view_id' => 5,
                'label' => 'Serving begun'
            ],
            [
                'view_id' => 7,
                'label' => 'Endo'
            ],
            [
                'view_id' => 7,
                'label' => 'Dental'
            ],
            [
                'view_id' => 7,
                'label' => 'PPS'
            ],
            [
                'view_id' => 5,
                'label' => 'General'
            ],
            [
                'view_id' => 5,
                'label' => 'Date'
            ],
            [
                'view_id' => 5,
                'label' => 'Description'
            ],
            [
                'view_id' => 5,
                'label' => 'Tooth'
            ],
            [
                'view_id' => 5,
                'label' => 'Action'
            ],
            [
                'view_id' => 7,
                'label' => 'Patient has not treatment plan'
            ],
            [
                'view_id' => 7,
                'label' => 'Vektis'
            ],
            [
                'view_id' => 5,
                'label' => 'Full'
            ],
            [
                'view_id' => 5,
                'label' => 'PRINT'
            ],
            [
                'view_id' => 7,
                'label' => 'Mobility'
            ],
            [
                'view_id' => 7,
                'label' => 'Furcation'
            ],
            [
                'view_id' => 7,
                'label' => 'Implant'
            ],
            [
                'view_id' => 7,
                'label' => 'Bleeding on Probing'
            ],
            [
                'view_id' => 7,
                'label' => 'Plaque'
            ],
            [
                'view_id' => 7,
                'label' => 'Gingival Margin'
            ],
            [
                'view_id' => 7,
                'label' => 'Probing Depth'
            ],
            [
                'view_id' => 7,
                'label' => 'Buccal'
            ],
            [
                'view_id' => 5,
                'label' => 'Comments'
            ],
            [
                'view_id' => 7,
                'label' => 'Treatment Information'
            ],
            [
                'view_id' => 7,
                'label' => 'Dental Anamnese'
            ],
            [
                'view_id' => 7,
                'label' => 'Risk assesment history'
            ],
            [
                'view_id' => 5,
                'label' => 'By'
            ],
            [
                'view_id' => 7,
                'label' => 'No risk assement available for'
            ],
            // Dental Questions
            [
                'view_id' => 7,
                'label' => 'Dental questions'
            ],
            [
                'view_id' => 7,
                'label' => 'Are you having dental pain or discomfort'
            ],
            [
                'view_id' => 7,
                'label' => 'Are your teeth sensitive to heat, cold, or pressure'
            ],
            [
                'view_id' => 7,
                'label' => 'Do your gums bleed while brushing or flossing'
            ],
            [
                'view_id' => 7,
                'label' => 'How often do you brush? Floss'
            ],
            [
                'view_id' => 7,
                'label' => 'Do you use an electric toothbrush'
            ],
            [
                'view_id' => 7,
                'label' => 'Do you clench or grind your teeth'
            ],
            [
                'view_id' => 7,
                'label' => 'Have you ever had orthodontic treatment/braces'
            ],
            [
                'view_id' => 7,
                'label' => 'Do you wear removable dentures or partials? If so, how old are they'
            ],
            [
                'view_id' => 7,
                'label' => 'Do you wish your teeth looked better'
            ],
            [
                'view_id' => 7,
                'label' => 'Do you use anti-anxiety medications or nitrous oxide (laughing gas) for dental visits'
            ],
            [
                'view_id' => 7,
                'label' => 'Have you ever experienced any of the following problems with your jaw'
            ],
            [
                'view_id' => 7,
                'label' => 'Noise/Popping_pain'
            ],
            [
                'view_id' => 7,
                'label' => 'Difficult Chewing'
            ],
            [
                'view_id' => 7,
                'label' => 'Locking'
            ],
            [
                'view_id' => 7,
                'label' => 'Headaches'
            ],
            [
                'view_id' => 7,
                'label' => 'Have you seen other dental specialists'
            ],
            [
                'view_id' => 7,
                'label' => 'None'
            ],
            [
                'view_id' => 7,
                'label' => 'Periodontist'
            ],
            [
                'view_id' => 7,
                'label' => 'Prosthodontist'
            ],
            [
                'view_id' => 7,
                'label' => 'Orthodontist'
            ],
            [
                'view_id' => 7,
                'label' => 'Oral Surgeon'
            ],
            [
                'view_id' => 7,
                'label' => 'Endodontist'
            ],
            [
                'view_id' => 7,
                'label' => 'Appointments chart'
            ],
            [
                'view_id' => 5,
                'label' => 'Back'
            ],
            [
                'view_id' => 7,
                'label' => 'TREAT'
            ],
            [
                'view_id' => 7,
                'label' => 'MONITOR'
            ],
            [
                'view_id' => 7,
                'label' => 'PLANNED'
            ],
            [
                'view_id' => 7,
                'label' => 'HISTORY'
            ],
            [
                'view_id' => 7,
                'label' => 'MISSING'
            ],
            [
                'view_id' => 7,
                'label' => 'RESTORATION'
            ],
            [
                'view_id' => 5,
                'label' => 'DONE'
            ],
            [
                'view_id' => 7,
                'label' => 'areas diagnosed'
            ],
            [
                'view_id' => 7,
                'label' => 'areas diagnosed'
            ],
            [
                'view_id' => 5,
                'label' => 'details'
            ],
            [
                'view_id' => 5,
                'label' => 'delete'
            ],
            [
                'view_id' => 7,
                'label' => 'Endodontic'
            ],
            [
                'view_id' => 5,
                'label' => 'Summaries'
            ],
            [
                'view_id' => 7,
                'label' => 'No data recorded'
            ],
            [
                'view_id' => 7,
                'label' => 'Cold'
            ],
            [
                'view_id' => 7,
                'label' => 'Cold Test'
            ],
            [
                'view_id' => 7,
                'label' => 'Percussion'
            ],
            [
                'view_id' => 7,
                'label' => 'Percussion Test'
            ],
            [
                'view_id' => 7,
                'label' => 'Palpation'
            ],
            [
                'view_id' => 7,
                'label' => 'Palpation Test'
            ],
            [
                'view_id' => 7,
                'label' => 'Heat'
            ],
            [
                'view_id' => 7,
                'label' => 'Heat Test'
            ],
            [
                'view_id' => 7,
                'label' => 'Electricity'
            ],
            [
                'view_id' => 7,
                'label' => 'Electricity Test'
            ],
            [
                'view_id' => 5,
                'label' => 'Clear'
            ],
            [
                'view_id' => 7,
                'label' => 'No treatments  available'
            ],
            [
                'view_id' => 7,
                'label' => 'Loading treatments'
            ],
            [
                'view_id' => 7,
                'label' => 'Tooth Selectable Surfaces'
            ],
            [
                'view_id' => 7,
                'label' => 'Selectable Restoration Procedures'
            ],
            [
                'view_id' => 7,
                'label' => 'You need to select a Restoration Procedure to activate tooth surfaces and proceed with the Tooth Surface Selection'
            ],
            [
                'view_id' => 7,
                'label' => 'Filling'
            ],
            [
                'view_id' => 7,
                'label' => 'Partial Crown'
            ],
            [
                'view_id' => 7,
                'label' => 'Crown'
            ],
            [
                'view_id' => 7,
                'label' => 'Bridges'
            ],
            [
                'view_id' => 7,
                'label' => 'Treatment Cost'
            ],
            [
                'view_id' => 7,
                'label' => 'Technical Cost'
            ],
            [
                'view_id' => 7,
                'label' => 'Total Cost'
            ],
            [
                'view_id' => 7,
                'label' => 'Filling Treatments'
            ],
            [
                'view_id' => 7,
                'label' => 'Select treatment'
            ],
            [
                'view_id' => 7,
                'label' => 'Filling Material'
            ],
            [
                'view_id' => 7,
                'label' => 'Composite'
            ],
            [
                'view_id' => 7,
                'label' => 'Amalgam'
            ],
            [
                'view_id' => 7,
                'label' => 'Glasionomer'
            ],
            [
                'view_id' => 7,
                'label' => 'Composite Types'
            ],
            [
                'view_id' => 7,
                'label' => 'Composite Type'
            ],
            [
                'view_id' => 5,
                'label' => 'Code'
            ],
            [
                'view_id' => 7,
                'label' => 'Type Name'
            ],
            [
                'view_id' => 7,
                'label' => 'Adhesive'
            ],
            [
                'view_id' => 7,
                'label' => 'Adhesive Types'
            ],
            [
                'view_id' => 7,
                'label' => 'Adhesive Type'
            ],
            [
                'view_id' => 5,
                'label' => 'Colors'
            ],


            [
                'view_id' => 7,
                'label' => 'No Patients are in the waiting room'
            ],
            [
                'view_id' => 5,
                'label' => 'hrs'
            ],
            [
                'view_id' => 5,
                'label' => 'mins'
            ],
            [
                'view_id' => 5,
                'label' => 'Checkin Time'
            ],
            [
                'view_id' => 5,
                'label' => 'Waiting Time'
            ],
            [
                'view_id' => 5,
                'label' => 'Hello'
            ],
            [
                'view_id' => 5,
                'label' => 'You have no checked in appointments today'
            ],
            [
                'view_id' => 7,
                'label' => 'Please click on patient card in waiting room to view details and call-in patient'
            ],
            [
                'view_id' => 5,
                'label' => 'or'
            ],
            [
                'view_id' => 7,
                'label' => 'Simply click on button below to call next'
            ],
            [
                'view_id' => 5,
                'label' => 'Loading'
            ],
            [
                'view_id' => 7,
                'label' => 'Treatment Already Listed'
            ],
            [
                'view_id' => 7,
                'label' => 'Upper Jaw'
            ],
            [
                'view_id' => 7,
                'label' => 'Lower Jaw'
            ],
            [
                'view_id' => 7,
                'label' => 'Selected Tooth'
            ],
            [
                'view_id' => 7,
                'label' => 'No Treatment Found'
            ],
            [
                'view_id' => 7,
                'label' => 'Selected Treatments'
            ],
            [
                'view_id' => 5,
                'label' => 'Comment'
            ],
            [
                'view_id' => 7,
                'label' => 'Select treatments to proceed'
            ],
            [
                'view_id' => 5,
                'label' => 'Invoice'
            ],
            [
                'view_id' => 5,
                'label' => 'No'
            ],
            [
                'view_id' => 5,
                'label' => 'Service'
            ],
            [
                'view_id' => 5,
                'label' => 'Price'
            ],
            [
                'view_id' => 7,
                'label' => 'Areas received'
            ],
            [
                'view_id' => 5,
                'label' => 'No Data'
            ],
            [
                'view_id' => 5,
                'label' => 'Grand Total'
            ],
            [
                'view_id' => 5,
                'label' => 'Save & Checkout'
            ],
            [
                'view_id' => 5,
                'label' => 'Billed'
            ],
            [
                'view_id' => 5,
                'label' => 'Saving'
            ],
            [
                'view_id' => 5,
                'label' => 'Examined'
            ],
            [
                'view_id' => 7,
                'label' => 'Treated'
            ],
            [
                'view_id' => 5,
                'label' => 'Prices'
            ],
            [
                'view_id' => 5,
                'label' => 'Payment Status'
            ],
            [
                'view_id' => 5,
                'label' => 'Performed By'
            ],
            [
                'view_id' => 5,
                'label' => 'Created At'
            ],
            [
                'view_id' => 5,
                'label' => 'Updated On'
            ],
            [
                'view_id' => 5,
                'label' => 'Test'
            ],
            [
                'view_id' => 5,
                'label' => 'Results'
            ],
            [
                'view_id' => 5,
                'label' => 'Range'
            ],
            [
                'view_id' => 7,
                'label' => 'Positive'
            ],
            [
                'view_id' => 7,
                'label' => 'Negative'
            ],
            [
                'view_id' => 7,
                'label' => 'Uncertain'
            ],
            [
                'view_id' => 7,
                'label' => 'Not-application'
            ],
            [
                'view_id' => 7,
                'label' => 'Within limits'
            ],
            [
                'view_id' => 7,
                'label' => 'Unpleasant'
            ],
            [
                'view_id' => 7,
                'label' => 'Pain Stimulus'
            ],
            [
                'view_id' => 7,
                'label' => 'Pain Lingering'
            ],
            [
                'view_id' => 7,
                'label' => 'Existing root canal treatment'
            ],
            [
                'view_id' => 7,
                'label' => 'Previously initiated therapy'
            ],
            [
                'view_id' => 7,
                'label' => 'Materials'
            ],
            [
                'view_id' => 7,
                'label' => 'Partial Crown Materials'
            ],
            [
                'view_id' => 7,
                'label' => 'You need to select atleast'
            ],
            [
                'view_id' => 7,
                'label' => '4 (FOUR)'
            ],
            [
                'view_id' => 7,
                'label' => 'tooth surfaces to proceed with the'
            ],
            [
                'view_id' => 7,
                'label' => 'Procedures'
            ],
            [
                'view_id' => 7,
                'label' => 'Metal'
            ],
            [
                'view_id' => 7,
                'label' => 'Porcelain'
            ],
            [
                'view_id' => 7,
                'label' => 'Lithiumdicilicaat Material'
            ],
            [
                'view_id' => 7,
                'label' => 'Ziroconia Material'
            ],
            [
                'view_id' => 7,
                'label' => 'Jaw'
            ],
            [
                'view_id' => 7,
                'label' => 'Sections'
            ],
            [
                'view_id' => 7,
                'label' => 'Material'
            ],
            [
                'view_id' => 5,
                'label' => 'CONFIGURE'
            ],
            [
                'view_id' => 7,
                'label' => 'No Composite Types'
            ],
            [
                'view_id' => 7,
                'label' => 'Click on configure to add Composite types'
            ],
            [
                'view_id' => 7,
                'label' => 'Glasionomer'
            ],
            [
                'view_id' => 7,
                'label' => 'No Adhesive Types'
            ],
            [
                'view_id' => 5,
                'label' => 'Options'
            ],
            [
                'view_id' => 7,
                'label' => 'Bridge Connectors'
            ],
            [
                'view_id' => 7,
                'label' => 'Bridge connector not found.'
            ],
            [
                'view_id' => 7,
                'label' => 'Bridge'
            ],
            [
                'view_id' => 7,
                'label' => 'Additional'
            ],
            [
                'view_id' => 7,
                'label' => 'PLAN'
            ],
            [
                'view_id' => 7,
                'label' => 'No options'
            ],
            [
                'view_id' => 7,
                'label' => 'Click on configure to add options.'
            ],
            [
                'view_id' => 5,
                'label' => 'Enable Notifications.'
            ],
            [
                'view_id' => 5,
                'label' => 'Add Configurations'
            ],
            [
                'view_id' => 5,
                'label' => 'View Configurations'
            ],
            [
                'view_id' => 7,
                'label' => 'Configure your preferrect teeth quadrant sequence.'
            ],
            [
                'view_id' => 5,
                'label' => 'Arrangement'
            ],
            [
                'view_id' => 5,
                'label' => 'Order'
            ],
            [
                'view_id' => 7,
                'label' => 'Available perio-chart quadrant sequence'
            ],
            [
                'view_id' => 5,
                'label' => 'Orders'
            ],
            [
                'view_id' => 7,
                'label' => 'Please be sure to select the four quadrants in a preferred sequence before hitting SAVE.'
            ],
            [
                'view_id' => 7,
                'label' => 'Please be sure to enter the name pf the sequence before hitting SAVE.'
            ],
            [
                'view_id' => 5,
                'label' => 'Are you sure ?'
            ],
            [
                'view_id' => 5,
                'label' => "you won't be able to revert this action after confirming."
            ],
            [
                'view_id' => 5,
                'label' => "Yes, Proceed"
            ],
            [
                'view_id' => 5,
                'label' => "No, Cancel"
            ],
            [
                'view_id' => 5,
                'label' => "warning"
            ],
            [
                'view_id' => 5,
                'label' => "error"
            ],
            [
                'view_id' => 5,
                'label' => "success"
            ],
            [
                'view_id' => 5,
                'label' => "Action performed successfully."
            ],
            [
                'view_id' => 5,
                'label' => "Something went wrong, please contact Support."
            ],
            [
                'view_id' => 5,
                'label' => "Action cancelled."
            ],
            [
                'view_id' => 7,
                'label' => "Lingual"
            ],
            [
                'view_id' => 5,
                'label' => "Category."
            ],
            [
                'view_id' => 5,
                'label' => "General Category"
            ],
            [
                'view_id' => 5,
                'label' => "Tooth Element"
            ],
            [
                'view_id' => 5,
                'label' => "Update"
            ],
            [
                'view_id' => 5,
                'label' => "Updating"
            ],
            [
                'view_id' => 5,
                'label' => "Amount"
            ],
            [
                'view_id' => 5,
                'label' => "Treatment Status"
            ],
            [
                'view_id' => 5,
                'label' => "Add General Notes"
            ],
            [
                'view_id' => 5,
                'label' => "Select a category"
            ],
            [
                'view_id' => 5,
                'label' => "Select a tooth"
            ],
            [
                'view_id' => 5,
                'label' => "General Notes"
            ],
            [
                'view_id' => 5,
                'label' => "Diagnosis"
            ],
            [
                'view_id' => 5,
                'label' => "Other"
            ],
            [
                'view_id' => 5,
                'label' => "Please enter the general remark description."
            ],
            [
                'view_id' => 7,
                'label' => "Periodic Periodontal Screening [PPS]"
            ],
            [
                'view_id' => 7,
                'label' => "Click to add"
            ],
            [
                'view_id' => 5,
                'label' => "New"
            ],
            [
                'view_id' => 5,
                'label' => "Assessment"
            ],
            [
                'view_id' => 5,
                'label' => "Review"
            ],
            [
                'view_id' => 5,
                'label' => "Risk Assessment"
            ],
            [
                'view_id' => 5,
                'label' => "Recommended Treatment"
            ],
            [
                'view_id' => 5,
                'label' => "Right"
            ],
            [
                'view_id' => 5,
                'label' => "Left"
            ],
            [
                'view_id' => 5,
                'label' => "Previous"
            ],
            [
                'view_id' => 5,
                'label' => "Next"
            ],
            [
                'view_id' => 5,
                'label' => "Value"
            ],
            [
                'view_id' => 5,
                'label' => "Lower"
            ],
            [
                'view_id' => 5,
                'label' => "Upper"
            ],
            [
                'view_id' => 5,
                'label' => "Notes"
            ],
            [
                'view_id' => 5,
                'label' => "No pps data found as per last the appointment."
            ],
            [
                'view_id' => 5,
                'label' => "Recommended Assessment"
            ],
            [
                'view_id' => 5,
                'label' => "Close"
            ],
            [
                'view_id' => 5,
                'label' => "Xray Details"
            ],
            [
                'view_id' => 5,
                'label' => "Appointment Date"
            ],
            [
                'view_id' => 5,
                'label' => "No risk assesment history"
            ],
            [
                'view_id' => 5,
                'label' => "Yes"
            ],
            [
                'view_id' => 5,
                'label' => "Pathology"
            ],
            [
                'view_id' => 5,
                'label' => "Periodontics"
            ],
            [
                'view_id' => 5,
                'label' => "Present"
            ],
            [
                'view_id' => 5,
                'label' => "Not Present"
            ],
            [
                'view_id' => 5,
                'label' => "Missing Teeth"
            ],
            [
                'view_id' => 5,
                'label' => "Data"
            ],
            [
                'view_id' => 5,
                'label' => "Data"
            ],
            [
                'view_id' => 5,
                'label' => "Invoice Payment Chart"
            ],
            [
                'view_id' => 5,
                'label' => "Status"
            ],
            [
                'view_id' => 5,
                'label' => "Recent Invoices"
            ],
            [
                'view_id' => 5,
                'label' => "Sending"
            ],
            [
                'view_id' => 5,
                'label' => "Services"
            ],
            [
                'view_id' => 5,
                'label' => "All Invoices"
            ],
            [
                'view_id' => 5,
                'label' => "Paid Bills"
            ],
            [
                'view_id' => 5,
                'label' => "Unpaid Bills"
            ],
            [
                'view_id' => 5,
                'label' => "Private Bills"
            ],
            [
                'view_id' => 5,
                'label' => "Insurance Bills"
            ],
            [
                'view_id' => 5,
                'label' => "Pending Appointments"
            ],
            [
                'view_id' => 5,
                'label' => "Reschedule Appointment"
            ],
            [
                'view_id' => 5,
                'label' => "Open"
            ],
            [
                'view_id' => 5,
                'label' => "Pie Charts"
            ],
            [
                'view_id' => 5,
                'label' => "Start"
            ],
            [
                'view_id' => 5,
                'label' => "End"
            ],
            [
                'view_id' => 5,
                'label' => "Interval"
            ],
            [
                'view_id' => 5,
                'label' => "Next available date"
            ],
            [
                'view_id' => 5,
                'label' => "Suggestions"
            ],
            [
                'view_id' => 5,
                'label' => "Show Suggestions"
            ],
            [
                'view_id' => 5,
                'label' => "Suggestions for"
            ],
            [
                'view_id' => 5,
                'label' => "Period"
            ],
            [
                'view_id' => 5,
                'label' => "Ongoing Appointments"
            ],
            [
                'view_id' => 5,
                'label' => "Serving"
            ],
            [
                'view_id' => 5,
                'label' => "Timeline"
            ],
            [
                'view_id' => 5,
                'label' => "Checkedin"
            ],
            [
                'view_id' => 5,
                'label' => "Served At"
            ],
            [
                'view_id' => 5,
                'label' => "Source"
            ],
            [
                'view_id' => 5,
                'label' => "Reason"
            ],
            [
                'view_id' => 5,
                'label' => "Employees"
            ],
            [
                'view_id' => 5,
                'label' => "Leave"
            ],
            [
                'view_id' => 5,
                'label' => "Attendance"
            ],
            [
                'view_id' => 5,
                'label' => "Departments"
            ],
            [
                'view_id' => 5,
                'label' => "Supervisor"
            ],
            [
                'view_id' => 5,
                'label' => "Employee attendance"
            ],
            [
                'view_id' => 5,
                'label' => "View All"
            ],
            [
                'view_id' => 5,
                'label' => "Employee"
            ],
            [
                'view_id' => 5,
                'label' => "Start Date"
            ],
            [
                'view_id' => 5,
                'label' => "End Date"
            ],
            [
                'view_id' => 5,
                'label' => "Leave Type"
            ],
            [
                'view_id' => 5,
                'label' => "Add Attendance Times"
            ],
            [
                'view_id' => 5,
                'label' => "Attendance Times"
            ],
            [
                'view_id' => 5,
                'label' => "Attendance Name"
            ],
            [
                'view_id' => 5,
                'label' => "Start Time"
            ],
            [
                'view_id' => 5,
                'label' => "End Time"
            ],
            [
                'view_id' => 5,
                'label' => "Full Name"
            ],
            [
                'view_id' => 5,
                'label' => "Sub Departments"
            ],
            [
                'view_id' => 5,
                'label' => "Department Name"
            ],
            [
                'view_id' => 5,
                'label' => "Add Department"
            ],
            [
                'view_id' => 5,
                'label' => "View Department"
            ],
            [
                'view_id' => 5,
                'label' => "Edit Department"
            ],
            [
                'view_id' => 5,
                'label' => "View Departments"
            ],
            [
                'view_id' => 5,
                'label' => "Update Department"
            ],
            [
                'view_id' => 5,
                'label' => "Employee Name"
            ],
            [
                'view_id' => 5,
                'label' => "Add Employee"
            ],
            [
                'view_id' => 5,
                'label' => "View Employee"
            ],
            [
                'view_id' => 5,
                'label' => "Edit Employee"
            ],
            [
                'view_id' => 5,
                'label' => "View Employees"
            ],
            [
                'view_id' => 5,
                'label' => "Update Employee"
            ],
            [
                'view_id' => 5,
                'label' => "First Name"
            ],
            [
                'view_id' => 5,
                'label' => "Last Name"
            ],
            [
                'view_id' => 5,
                'label' => "Middle Name"
            ],
            [
                'view_id' => 5,
                'label' => "Email"
            ],
            [
                'view_id' => 5,
                'label' => "Phone Number"
            ],
            [
                'view_id' => 5,
                'label' => "Mobile Number"
            ],
            [
                'view_id' => 5,
                'label' => "Next of Kin"
            ],
            [
                'view_id' => 5,
                'label' => "Next of Kin Phone Number"
            ],
            [
                'view_id' => 5,
                'label' => "Next of Kin email"
            ],
            [
                'view_id' => 5,
                'label' => "Optional"
            ],
            [
                'view_id' => 5,
                'label' => "Employee type"
            ],
            [
                'view_id' => 5,
                'label' => "Password"
            ],
            [
                'view_id' => 5,
                'label' => "Employee Types"
            ],
            [
                'view_id' => 5,
                'label' => "Manage Employees"
            ],
            [
                'view_id' => 5,
                'label' => "Positions"
            ],
            [
                'view_id' => 5,
                'label' => "Select Department"
            ],
            [
                'view_id' => 5,
                'label' => "Department"
            ],
            [
                'view_id' => 5,
                'label' => "Add Employee Type"
            ],
            [
                'view_id' => 5,
                'label' => "Edit Employee Types"
            ],
            [
                'view_id' => 5,
                'label' => "Update Employee Types"
            ],
            [
                'view_id' => 5,
                'label' => "Position"
            ],
            [
                'view_id' => 5,
                'label' => "Role"
            ],
            [
                'view_id' => 5,
                'label' => "Delete Employee"
            ],
            [
                'view_id' => 5,
                'label' => "This Action can't be reverted"
            ],
            [
                'view_id' => 5,
                'label' => "Confirm"
            ],
            [
                'view_id' => 5,
                'label' => "Edit Position"
            ],
            [
                'view_id' => 5,
                'label' => "Add Position"
            ],
            [
                'view_id' => 5,
                'label' => "View Position"
            ],
            [
                'view_id' => 5,
                'label' => "View Positions"
            ],
            [
                'view_id' => 5,
                'label' => "Update Position"
            ],
            [
                'view_id' => 5,
                'label' => "Sub Department Name"
            ],
            [
                'view_id' => 5,
                'label' => "Add Sub Department"
            ],
            [
                'view_id' => 5,
                'label' => "View Sub Department"
            ],
            [
                'view_id' => 5,
                'label' => "Edit Sub Department"
            ],
            [
                'view_id' => 5,
                'label' => "View Sub Departments"
            ],
            [
                'view_id' => 5,
                'label' => "Update Sub Department"
            ],
            [
                'view_id' => 5,
                'label' => "Update Profile Picture"
            ],
            [
                'view_id' => 5,
                'label' => "Upload"
            ],
            [
                'view_id' => 5,
                'label' => "Edit Basic Information"
            ],
            [
                'view_id' => 5,
                'label' => "Select Employee Type"
            ],
            [
                'view_id' => 5,
                'label' => "Alternative Number"
            ],
            [
                'view_id' => 5,
                'label' => "Country"
            ],
            [
                'view_id' => 5,
                'label' => "Select Country"
            ],
            [
                'view_id' => 5,
                'label' => "City"
            ],
            [
                'view_id' => 5,
                'label' => "Select City"
            ],
            [
                'view_id' => 5,
                'label' => "Zip Code"
            ],
            [
                'view_id' => 5,
                'label' => "Select Attendance Times"
            ],
            [
                'view_id' => 5,
                'label' => "Update Basic Information"
            ],
            [
                'view_id' => 5,
                'label' => "Attendance Time"
            ],
            [
                'view_id' => 5,
                'label' => "Select Attendance Time"
            ],
            [
                'view_id' => 5,
                'label' => "Edit Biography"
            ],
            [
                'view_id' => 5,
                'label' => "Patients List"
            ],
            [
                'view_id' => 5,
                'label' => "Search Patients"
            ],
            [
                'view_id' => 5,
                'label' => "Sort by"
            ],
            [
                'view_id' => 5,
                'label' => "Latest"
            ],
            [
                'view_id' => 5,
                'label' => "Oldest"
            ],
            [
                'view_id' => 5,
                'label' => "Create Patient"
            ],
            [
                'view_id' => 5,
                'label' => "Loading Patients"
            ],
            [
                'view_id' => 5,
                'label' => "Treatment Files"
            ],
            [
                'view_id' => 5,
                'label' => "N/A"
            ],
            [
                'view_id' => 5,
                'label' => "Xray Files"
            ],
            [
                'view_id' => 5,
                'label' => "Referal Files"
            ],
            [
                'view_id' => 5,
                'label' => "Billing Files"
            ],
            [
                'view_id' => 5,
                'label' => "Billing Document"
            ],
            [
                'view_id' => 5,
                'label' => "Take Photo"
            ],
            [
                'view_id' => 5,
                'label' => "Clear Photo"
            ],
            [
                'view_id' => 5,
                'label' => "Patient Insurance Information"
            ],
            [
                'view_id' => 5,
                'label' => "Fill in all the patient's insurance information"
            ],
            [
                'view_id' => 5,
                'label' => "Patient Insurer"
            ],
            [
                'view_id' => 5,
                'label' => "Required"
            ],
            [
                'view_id' => 5,
                'label' => "Fill in here if patient's insurer is not listed"
            ],
            [
                'view_id' => 5,
                'label' => "Insurance Policy Number"
            ],
            [
                'view_id' => 5,
                'label' => "General Information"
            ],
            [
                'view_id' => 5,
                'label' => "Patient General Overview"
            ],
            [
                'view_id' => 5,
                'label' => "Referred By"
            ],
            [
                'view_id' => 5,
                'label' => "Referee Phone"
            ],
            [
                'view_id' => 5,
                'label' => "Referee Email"
            ],
            [
                'view_id' => 5,
                'label' => "Preview Data"
            ],
            [
                'view_id' => 5,
                'label' => "Field"
            ],
            [
                'view_id' => 5,
                'label' => "Photo"
            ],
            [
                'view_id' => 5,
                'label' => "CSN"
            ],
            [
                'view_id' => 5,
                'label' => "Phone"
            ],
            [
                'view_id' => 5,
                'label' => "Home"
            ],
            [
                'view_id' => 5,
                'label' => "Marital Status"
            ],
            [
                'view_id' => 5,
                'label' => "Private Number"
            ],
            [
                'view_id' => 5,
                'label' => "Secret Number"
            ],
            [
                'view_id' => 5,
                'label' => "Postal Code"
            ],
            [
                'view_id' => 5,
                'label' => "Nationality"
            ],
            [
                'view_id' => 5,
                'label' => "Street"
            ],
            [
                'view_id' => 5,
                'label' => "Emergency Name"
            ],
            [
                'view_id' => 5,
                'label' => "Emergency Email"
            ],
            [
                'view_id' => 5,
                'label' => "Emergency Phone Number"
            ],
            [
                'view_id' => 5,
                'label' => "Emergency Home Address"
            ],
            [
                'view_id' => 5,
                'label' => "Fill If Other"
            ],
            [
                'view_id' => 5,
                'label' => "Submit"
            ],
            [
                'view_id' => 5,
                'label' => "State"
            ],
            [
                'view_id' => 5,
                'label' => "Patient Biography"
            ],
            [
                'view_id' => 5,
                'label' => "Fill in all the patient's biography information"
            ],
            [
                'view_id' => 5,
                'label' => "Disabled"
            ],
            [
                'view_id' => 5,
                'label' => "Date Of Birth"
            ],
            [
                'view_id' => 5,
                'label' => "Male"
            ],
            [
                'view_id' => 5,
                'label' => "Female"
            ],
            [
                'view_id' => 5,
                'label' => "Select marital status"
            ],
            [
                'view_id' => 5,
                'label' => "Single"
            ],
            [
                'view_id' => 5,
                'label' => "Married"
            ],
            [
                'view_id' => 5,
                'label' => "Divorced"
            ],
            [
                'view_id' => 5,
                'label' => "Engaged"
            ],
            [
                'view_id' => 5,
                'label' => "Separated"
            ],
            [
                'view_id' => 5,
                'label' => "Next of kin information"
            ],
            [
                'view_id' => 5,
                'label' => "Fill in all the details of the patient's next of kin"
            ],
            [
                'view_id' => 5,
                'label' => "N.O.K Fullname"
            ],
            [
                'view_id' => 5,
                'label' => "N.O.K Phone Number"
            ],
            [
                'view_id' => 5,
                'label' => "N.O.K Email Address"
            ],
            [
                'view_id' => 5,
                'label' => "Minor, Please fill the Family Member section"
            ],
            [
                'view_id' => 5,
                'label' => "Choose Family Member"
            ],
            [
                'view_id' => 5,
                'label' => "Select A Family Member"
            ],
            [
                'view_id' => 5,
                'label' => "Member Name"
            ],
            [
                'view_id' => 5,
                'label' => "Member Contact"
            ],
            [
                'view_id' => 5,
                'label' => "Member Insurance Company"
            ],
            [
                'view_id' => 5,
                'label' => "Member Insurance Policy Number"
            ],
            [
                'view_id' => 5,
                'label' => "Member Email"
            ],
            [
                'view_id' => 5,
                'label' => "Continue to Address"
            ],
            [
                'view_id' => 5,
                'label' => "Next Of Kin Contact"
            ],
            [
                'view_id' => 5,
                'label' => "check schedule"
            ],
            [
                'view_id' => 5,
                'label' => "checking patient appointments"
            ],
            [
                'view_id' => 5,
                'label' => "Patient has no prior scheduled appointments"
            ],
            [
                'view_id' => 5,
                'label' => "create appointment"
            ],
            [
                'view_id' => 3,
                'label' => "fetching patient...Please wait!!!"
            ],
            [
                'view_id' => 3,
                'label' => "Add Task"
            ],
            [
                'view_id' => 3,
                'label' => "fetching tasks"
            ],
            [
                'view_id' => 5,
                'label' => "Task"
            ],
            [
                'view_id' => 3,
                'label' => "token"
            ],
            [
                'view_id' => 3,
                'label' => "Do you have any tasks or creative ideas, this tool will be your safe space"
            ],
            [
                'view_id' => 3,
                'label' => "Press the add task button below to add new notes."
            ],
            [
                'view_id' => 3,
                'label' => "edit task"
            ],
            [
                'view_id' => 3,
                'label' => "add reply"
            ],
            [
                'view_id' => 3,
                'label' => "Task Title"
            ],
            [
                'view_id' => 3,
                'label' => "Due date"
            ],
            [
                'view_id'=>5,
                'label'=>'No Results Found'
            ],
            [
                'view_id'=>5,
                'label'=>'Discussion'
            ],
            [
                'view_id'=>5,
                'label'=>'Loading messages...'
            ],
            [
                'view_id'=>5,
                'label'=>'Task updated Successfully!'
            ],
            [
                'view_id'=>5,
                'label'=>'Task title is required'
            ]
            ,
            [
                'view_id'=>5,
                'label'=>'Task date is required'
            ]
        ];

//        DB::table('elements')->insert([
//
//        ]);
        foreach ($translations as $translation):
            DB::table('elements')->insert([
                'label' => $translation['label'],
                'view_id' => $translation['view_id'],
                // 'slug' =>  str_replace(' ', '_', strtolower($translation['label']))."_text",
            ]);
        endforeach;
    }
}
