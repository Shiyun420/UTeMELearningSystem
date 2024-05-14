<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Lecturer\LessonController;
use App\Http\Controllers\Lecturer\QuizController;
use App\Http\Controllers\Lecturer\AttendanceController;
use App\Http\Controllers\Lecturer\AnnouncementController;
use App\Http\Controllers\Lecturer\AssignmentController;

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

Route::group([
    'prefix' => 'lecturer',
    'as' => 'lecturer.',
    'namespace' => 'Lecturer'
], function () {
    Route::get('/view_lesson', [LessonController::class, 'view_lesson'])->name('view_lesson');
    Route::get('/add_lesson', [LessonController::class, 'add_lesson'])->name('add_lesson');
    Route::get('/quiz_index', [QuizController::class, 'index'])->name('quiz_index');
    Route::get('/quiz_details', [QuizController::class, 'details'])->name('quiz_details');
    Route::get('/add_question', [QuizController::class, 'add_question'])->name('add_question');
    Route::get('/attendance_index', [AttendanceController::class, 'index'])->name('attendance_index');
    Route::get('/announcement_index', [AnnouncementController::class, 'index'])->name('announcement_index');
    Route::get('/assignment_index', [AssignmentController::class, 'index'])->name('assignment_index');
    Route::get('/assignment_submission', [AssignmentController::class, 'assignment_submission'])->name('assignment_submission');
    Route::get('/assignment_give_feedback', [AssignmentController::class, 'give_feedback'])->name('assignment_give_feedback');
});