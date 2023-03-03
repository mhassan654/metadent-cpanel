<?php

use App\Http\Controllers\Api\v2\AppointmentsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'appointments', 'middleware' => ['api']], function () {
//Route::group(['prefix' => 'appointments', 'middleware' => ['role:Doctor|Super-Admin|Front-Office', api]], function () {

  // All the appointment route
  // Route::group(['middleware' => ['permission:View Appointments']], function () {

  Route::post('all', [AppointmentsController::class, 'index'])->name('appointments.all');

  Route::post('appointments-today', [AppointmentsController::class, 'current_day_appointments'])->name('appointments.today');

  // Specific appointment record route
  Route::post('appointment', [AppointmentsController::class, 'show'])->name('appointments.show');

  // doctor appointments
  Route::post('doctor_appointments', [AppointmentsController::class, 'single_doctor_appointments'])->name('appointments.doctor_appointments');


  // Create new appointment record route
  Route::post('create', [AppointmentsController::class, 'create_appointment'])->name('appointments.create');

  // Edit appointment details route
  Route::post('update', [AppointmentsController::class, 'update_with_recurrence'])->name('appointments.update');

  Route::post('rescheduling', [AppointmentsController::class, 'rescheduling'])->name('appointments.rescheduling');

  // Edit appointment status route
  Route::post('update/status', [AppointmentsController::class, 'updateStatus'])->name('appointments.change_status');

  // Edit appointment status route
  Route::post('extend', [AppointmentsController::class, 'extend_appointment'])->name('appointments.extend');

  // All the appointment route
  Route::post('status/all', [AppointmentsController::class, 'getStatus'])->name('appointments.status_list');

  Route::post('confirm', [AppointmentsController::class, 'confirm_appointment'])->name('appointments.confirm');

  Route::post('cancel', [AppointmentsController::class, 'cancel_appointment'])->name('appointments.cancel');

  Route::post('close', [AppointmentsController::class, 'close_appointment'])->name('appointments.close');

  Route::post('waitingroom', [AppointmentsController::class, 'waiting_room'])->name('appointments.waitingroom');

  Route::post('doctor/waitingroom', [AppointmentsController::class, 'waiting_room_doctor'])->name('appointments.doctor_waitingroom');

  Route::post('servingroom', [AppointmentsController::class, 'serving_room'])->name('appointments.servingroom');

  Route::post('closed', [AppointmentsController::class, 'closed_appointments'])->name('appointments.closed');

  Route::post('delete', [AppointmentsController::class, 'destroy'])->name('appointments.delete');

  Route::post('doctor/serve-patient', [AppointmentsController::class, 'serving_time'])->name('appointments.doctor_serve_patient');

  Route::post('completed-appointments-today', [AppointmentsController::class, 'completed_appointments_today'])->name('appointments.completed_appointment_today');


  Route::post('update-with-recurrency', [AppointmentsController::class, 'update_with_recurrence'])->name('appointments.update_with_recurrency');

  Route::post('patient-appointments', [AppointmentsController::class, 'patient_appointments'])->name('appointments.patient');

  Route::post('cancel-recurring-appointments', [AppointmentsController::class, 'cancel_recurring_appointments'])->name('appointments.cancel_recurring');

  Route::post('archive-recurring-appointments', [AppointmentsController::class, 'archive_recurring_appointments'])->name('appointments.archive_recurring');

  Route::post('restore-appointments', [AppointmentsController::class, 'restore_appointments'])->name('appointments.restore');

  //waiting patient list
  Route::post('waiting-patient-list', [AppointmentsController::class, 'waiting_patient_list'])->name('appointments.waiting_patient_list');

  //latest serving appointment
  Route::post('latest-serving-front-office-appointment', [AppointmentsController::class, 'front_office_department_appointment'])->name('appointments.latest_serving_front_office');

  Route::post('appointments-counter', [AppointmentsController::class, 'appointments_counter'])->name('appointments.counter');

  Route::post('update-overdue-waiting-to missed', [AppointmentsController::class, 'update_waiting_appointments_to_missed'])->name('appointments.update_waiting_to_missed');

  Route::post('paginated-appointments', [AppointmentsController::class, 'paginated_appointments'])->name('appointments.paginated');

  Route::post('dashboard-upcoming-appointments', [AppointmentsController::class, 'dashboard_upcoming_appointments'])->name('appointments.dashboard_upcoming');


  Route::post('number-today-appointments', [AppointmentsController::class, 'number_current_day_appointments'])->name('appointments.today_total');

  Route::get('download-pdf', [AppointmentsController::class, 'download_pdf'])->name('appointments.download_pdf');

  Route::get('download-excel', [AppointmentsController::class, 'download_excel'])->name('appointments.download_excel');

  Route::get('download-csv', [AppointmentsController::class, 'download_csv'])->name('appointments.download_csv');

  Route::post('upcoming-appointments', [AppointmentsController::class, 'upcoming_appointments'])->name('appointments.upcoming');

  Route::post('past-appointments', [AppointmentsController::class, 'past_appointments'])->name('appointments.past');
});
