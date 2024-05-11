<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LecturerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home',[HomeController::class,'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::get('/showcourses', [CourseController::class, 'showcourses'])->name('showcourses'); 
    Route::get('/showlecturers', [LecturerController::class, 'showlecturers'])->name('showlecturers'); 
    Route::get('/add_lecturer',[LecturerController::class,'add_lecturer'])->name('add_lecturer');
    Route::get('/add_course',[CourseController::class,'add_course'])->name('add_course');
    Route::post('register_lecturer', [LecturerController::class, 'register_lecturer'])->name('register_lecturer');
    Route::post('register_course', [CourseController::class, 'register_course'])->name('register_course');
    Route::get('course_details/{id}', [CourseController::class, 'course_details'])->name('course_details');

});