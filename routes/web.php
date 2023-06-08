<?php

use App\Http\Controllers\admin\AboutUsController;
use App\Http\Controllers\admin\AppointmentController;
use App\Http\Controllers\admin\ArticleCategoryController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\ContactMessageController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SpecialityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangePassController;
use App\Http\Controllers\doctor\AppointmentController as DoctorAppointmentController;
use App\Http\Controllers\doctor\ChatController;
use App\Http\Controllers\doctor\DoctorDashboardController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\patient\ContactController;
use App\Http\Controllers\patient\DoctorController as PatientDoctorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Admin Routes
 */
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth:sanctum,admin', 'verified', 'isAdmin'], 'as' => 'admin.'],
    function () {

        Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');

        Route::resource('doctor', DoctorController::class);
        Route::resource('patient', PatientController::class);
        Route::resource('speciality', SpecialityController::class);
        Route::resource('appointment', AppointmentController::class);
        Route::resource('setting', SettingController::class);
        Route::resource('service', ServiceController::class);
        Route::resource('contact', ContactMessageController::class);
        Route::resource('article', ArticleController::class);
        Route::resource('articleCategory', ArticleCategoryController::class);

        Route::get('/about-us/edit', [AboutUsController::class, 'edit'])->name('aboutUs.edit');
        Route::put('/about-us/update', [AboutUsController::class, 'update'])->name('aboutUs.update');

    }
);
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

/**
 * Doctor Routes
 */
Route::group(
    ['prefix' => 'doctor', 'middleware' => ['auth:sanctum,web', 'verified', 'is_doctor'], 'as' => 'doctor.'],
    function () {

        Route::get('appointment', ['App\Http\Controllers\doctor\AppointmentController', 'getDoctorAppointment'])->name('appointment');
        Route::get('appointment/{id}/{status}', ['App\Http\Controllers\doctor\AppointmentController', 'ChangeAppoinmentStatus'])->name('appointment.status');
        Route::get('appointment/report/create/{id}', ['App\Http\Controllers\doctor\AppointmentReportController', 'create'])->name('appointment.report.create');
        Route::post('appointment/report/store', ['App\Http\Controllers\doctor\AppointmentReportController', 'store'])->name('appointment.report.store');
        Route::get('patient', ['App\Http\Controllers\doctor\PatientController', 'index'])->name('patient');
        Route::get('appointment/report/index/{id}', ['App\Http\Controllers\doctor\AppointmentReportController', 'index'])->name('appointment.report.index');
        Route::get('appointment/report/show/{id}', ['App\Http\Controllers\doctor\AppointmentReportController', 'show'])->name('appointment.report.show');
        Route::get('/chat/{id?}', [ChatController::class, 'showChat'])->name('chat.index');
        Route::post('/chat/store', [ChatController::class, 'sendMessage'])->name('chat.store');

    }
);
Route::middleware(['auth:sanctum,web', 'verified', 'is_doctor'])->get('/dashboard', [DoctorDashboardController::class, 'showDashboard'])->name('dashboard');


/**
 * Patient Routes
 */
Route::get('/', [MainUserController::class, 'showHome'])->name('patient.home');
Route::get('/about', [MainUserController::class, 'showAbout'])->name('patient.about');
Route::get('/contact', [ContactController::class, 'showContact'])->name('patient.contact');
Route::get('/blog', [MainUserController::class, 'showBlog'])->name('patient.blog.index');
Route::get('/blog/details/{id}', [MainUserController::class, 'showBlogData'])->name('patient.blog.details');

Route::post('/contact/store', [ContactController::class, 'storeMessage'])->name('patient.contact.message.store');

Route::get('/doctors/{speciality?}', [MainUserController::class, 'showDoctors'])->name('patient.doctors');
Route::get('/doctor/details/{id}', [MainUserController::class, 'showDoctorData'])->name('patient.doctor.details');

Route::middleware(['auth:sanctum,web', 'verified'])->group(
    function () {
        Route::get('/user/profile', [MainUserController::class, 'UserProfile'])->name('user.profile');
        Route::get('/user/profile/edit', [MainUserController::class, 'UserProfileEdit'])->name('profile.edit');
        Route::post('/user/profile/store', [MainUserController::class, 'UserProfileStore'])->name('profile.store');
        Route::get('/user/password/view', [MainUserController::class, 'UserPasswordView'])->name('user.password.view');
        Route::post('/user/password/update', [MainUserController::class, 'UserPasswordUpdate'])->name('password.update');


        Route::middleware(['is_patient'])->group(
            function () {
                Route::get('/user/appointment/view', [MainUserController::class, 'UserAppointments'])->name('user.appoinment.view');
                Route::get('/user/report/view', [MainUserController::class, 'UserReports'])->name('user.report.view');
                Route::get('/user/report/show/{id}', [MainUserController::class, 'UserShowReport'])->name('user.report.show');

                Route::get('/appointment/{id?}', [MainUserController::class, 'showAppointment'])->name('patient.doctor.appointoment');
                Route::post('/appointment/store', [MainUserController::class, 'storeAppointment'])->name('patient.appointment.store');
                Route::get('/appointment/video/{id?}', [MainUserController::class, 'showVideoAppointment'])->name('patient.doctor.video.appointoment');
                Route::post('/appointment/video/store', [MainUserController::class, 'storeVideoAppointment'])->name('patient.video.appointment.store');
                Route::get('/user/chat/{id?}', [MainUserController::class, 'showChat'])->name('patient.chat.index');
                Route::post('/chat/store', [MainUserController::class, 'sendMessage'])->name('patient.chat.store');

            }
        );
    }
);
Route::get('/user/logout', [MainUserController::class, 'Logout'])->name('user.logout');

Route::post('api/doctor/time', [PatientDoctorController::class, 'getDoctorAvailabilityHours']);
Route::post('api/doctor/working-hours', [PatientDoctorController::class, 'getDoctorAvailability']);
Route::post('api/doctor/video-time', [PatientDoctorController::class, 'getDoctorVideoAvailabilityHours']);
Route::post('api/doctor/video-working-hours', [PatientDoctorController::class, 'getDoctorVideoAvailability']);
Route::post('api/doctor/doctors', [PatientDoctorController::class, 'getSpecialityDoctors']);
Route::post('/password/update', [ChangePassController::class, 'UpdatePassword'])->name('password.update');
