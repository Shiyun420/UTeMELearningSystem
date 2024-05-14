<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AttendanceController;
use App\Models\Attendance;
use App\Models\Quiz;

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

Route::get('/list_course', [StudentController::class, 'listCourses'])->name('list_course');
Route::get('/search_course', [StudentController::class, 'searchCourses'])->name('search_course');

Route::get('/lesson', [StudentController::class, 'showLesson'])->name('lesson');

Route::get('/lessons/lesson_detail', [LessonController::class, 'show'])->name('lesson_detail');



Route::get('/add-submission', [AssignmentController::class, 'showSubmissionForm'])->name('add_submission');
Route::post('/submit-assignment', [AssignmentController::class, 'submitAssignment'])->name('submit_assignment');
Route::get('/assignment', [StudentController::class, 'showAssignment'])->name('assignment');
Route::get('/assignments/tobe-completed', [AssignmentController::class, 'showToBeCompleted'])->name('tobe_completed');
Route::get('/assignments/completed', [AssignmentController::class, 'showCompleted'])->name('completed_assignments');
Route::get('/assignments/completed/feedback/{id}', [AssignmentController::class, 'viewFeedback'])->name('view_feedback');

Route::get('/quizzes/tobe-completed', [QuizController::class, 'toBeCompleted'])->name('tobe_quiz');
Route::get('/quizzes/completed', [QuizController::class, 'completed'])->name('completed_quiz');
Route::get('/quiz/start/{id}', [QuizController::class, 'start'])->name('start_quiz');
Route::post('/quizzes/submit/{id}', [QuizController::class, 'submitQuiz'])->name('submit_quiz');

Route::get('/attendance', [AttendanceController::class, 'showAttendance'])->name('attendance');
