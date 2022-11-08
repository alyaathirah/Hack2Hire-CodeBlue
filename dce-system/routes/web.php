<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;    
use App\Http\Controllers\WelcomeController;            
use App\Http\Controllers\RegisterEventController;      
use App\Http\Controllers\RegisterDependantController;        
use App\Http\Controllers\ReportController;               
use App\Http\Controllers\ActivityController;   
use App\Http\Controllers\AnnouncementController;   
use App\Http\Controllers\PaymentPageController;          
        
use App\Http\Controllers\AttendanceController;      
use App\Http\Controllers\EventController;  
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\TicketController;  
use App\Http\Controllers\NgoController; 

	Route::get('/', function () {return redirect('/login');});
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
	Route::get('/register-event', [RegisterEventController::class, 'create'])->middleware('guest')->name('register-event');
	// Route::post('/register-event', [RegisterEventController::class, 'store'])->middleware('guest')->name('register2');
	// Route::post('/register-event', [RegisterDependantController::class, 'store'])->middleware('guest')->name('register-event.perform');
	Route::get('/register-dependant', [RegisterDependantController::class, 'create'])->middleware('guest')->name('register-dependant');
	Route::get('/register-event', [RegisterEventController::class, 'store'])->name('register-event');
	// Route::post('/register-event', [RegisterEventController::class, 'store'])->middleware('guest')->name('register2');
	// Route::post('/register-event', [RegisterDependantController::class, 'store'])->name('register-event.perform');
	Route::get('/register-dependant', [RegisterDependantController::class, 'create'])->name('register-dependant');
	Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');
	Route::get('/home', [WelcomeController::class, 'index'])->name('home');

	Route::get('/activity-list', [ActivityController::class, 'index'])->name('activity-list');
	Route::get('/ngo-list', [NgoController::class, 'index'])->name('ngo-list');
	Route::get('/register-activity/{id}', [ActivityController::class, 'show'])->name('register-activity');
	// Route::post('/register-activity/store', [ActivityController::class, 'store'])->name('register-activity');
	Route::get('/admin-activity-list', [ActivityController::class, 'getList'])->name('admin-activity-list');
	Route::get('/admin-activity-participant/{id}', [ActivityController::class, 'showParticipant'])->name('activity-participant-list');
	Route::get('/edit-activity/{id}', [ActivityController::class, 'editSession'])->name('edit-session');
	
	Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement');
	Route::get('/floor-plan', [WelcomeController::class, 'show'])->name('floor-plan');
	// Route::get('/payment-page', [PaymentPageController::class, 'show'])->name('payment-page');
	Route::get('/my-ticket', [TicketController::class, 'index'])->name('my-ticket');
	Route::get('/announcement-create', [AnnouncementController::class, 'index_admin'])->name('announcement-create');
	Route::post('/register-event-post', [RegisterEventController::class, 'add']);

	Route::get('/qr-scanner', [AttendanceController::class, 'qr_scanner'])->name('qr-scanner');
	Route::post('/qr-scanner-store', [AttendanceController::class, 'store']);
	Route::get('/attendance-list', [AttendanceController::class, 'show_list'])->name('attendance-list');


Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

	Route::get('/report/export', [ReportController::class, 'export'])->name('excel');

	Route::get('/nowhere/{code}', [AttendanceController::class, 'index']);
	
	// Route::post('/announcement-create-post', [AnnouncementController::class, 'create']);
	Route::post('/announcement-create-post', [App\Http\Controllers\AnnouncementController::class, 'create']);
	Route::get('/payment-page', [RegisterEventController::class, 'show']);
	Route::post('/register-event-post', [RegisterEventController::class, 'add']);

	Route::get('/event-create', [EventController::class, 'create_page'])->name('event-create');
	Route::post('/event-create-store', [EventController::class, 'store']);
	Route::get('/attendance-list', [AttendanceController::class, 'show_list'])->name('show_list');

	Route::get('image-upload', [ ImageUploadController::class, 'imageUpload' ])->name('image.upload');
	Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');

	Route::get('/qrcode', [QrCodeController::class, 'index']);


	Route::post('/add-activity', [ActivityController::class, 'create'])->name('add-activity');
	Route::post('/update-activity/{id}', [ActivityController::class, 'update'])->name('update-activity');

});




