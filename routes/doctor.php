<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Doctor\PatientController;
use App\Http\Controllers\Doctor\AccountReports;

Route::get('/',[AccountReports::class,'analysis'])->name('analysis');
Route::get('/login',[DoctorController::class,'login']);
Route::post('/login',[DoctorController::class,'loginPost'])->name('doctor_login');

//navbar links
Route::get('/all-messages',[DoctorController::class,'allMessages'])->name('all_messages');

//message_body
Route::get('/message-body/{id}',[DoctorController::class,'messageBody']);
Route::post('/reply-message',[DoctorController::class,'replyMessage'])->name('reply_message');

//admin-message_body
Route::get('/admin-message-body/{id}',[DoctorController::class,'adminMessageBody']);
Route::post('/reply-message-admin',[DoctorController::class,'replyMessageFromAdmin'])->name('reply_message_from_admin');

//notifications
Route::get('/notifications',[DoctorController::class,'notifications'])->name('notifications');

//add_patient
Route::get('/add-patient',[PatientController::class,'addPatient'])->name('add-patient');
Route::post('/add-patient',[PatientController::class,'addPatientPost'])->name('doctor_add_patient');

//doctor's_settings
Route::get('/settings',[DoctorController::class,'settings'])->name('settings');
Route::post('/settings',[DoctorController::class,'settingsPost'])->name('settingsPost');

//edit_patient
Route::get('/edit-patient',[PatientController::class,'editPage'])->name('edit_page');
Route::post('/edit-profile',[PatientController::class,'editProfile'])->name('edit_profile');
Route::post('/edit-diagnosis',[PatientController::class,'editDiagnosis'])->name('edit_diagnosis');
Route::post('/prescription-insert',[PatientController::class,'prescriptionInsert'])->name('prescription_insert');

//following_up
Route::get('/following-up',[PatientController::class,'followingUpView'])->name('followingUpView');
Route::get('/paying-page',[PatientController::class,'payingFor'])->name('payingPage');
Route::post('/paying-page-post',[PatientController::class,'payingForPost'])->name('payingPagePost');

//mini
Route::get('/mini',[PatientController::class,'miniView'])->name('mini');
Route::post('/mini',[PatientController::class,'miniPost'])->name('mini_post');
Route::get('/prescription-print/{id}',[PatientController::class,'prescriptionPrint'])->name('print');
//new
Route::get('/new',[PatientController::class,'newView'])->name('patient_new');

//resumption
Route::get('/resumption',[PatientController::class,'resumptionView'])->name('patient_resumption');

//Waiting
Route::get('/waiting',[PatientController::class,'waitingView'])->name('today_waiting');

//examination_page
Route::get('/examination-page',[PatientController::class,'examinationView'])->name('examination_page');

//ajax_search
Route::get('/live',[PatientController::class,'liveSearch']);

//Account Reports
Route::get('/reports',[AccountReports::class,'allReports'])->name('all_reports');
Route::get('/reports-this-month',[AccountReports::class,'reportsForThisMonth'])->name('reports_this_month');
Route::get('/reports-today',[AccountReports::class,'reportsForToDay'])->name('reports_for_today');
Route::get('/day-closing',[AccountReports::class,'dayClosing'])->name('day_closing');




Route::get('/logout',[DoctorController::class,'logout'])->name('doctor_logout');