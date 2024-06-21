<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\LecturerCourse;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Announcement;

class StudentController extends Controller
{
    public function listCourses()
    {
        $enrolledCourses = Enrollment::join('lecturer_courses as lc', 'enrollments.courseID', '=', 'lc.id')
            ->join('courses as c', 'c.id', '=', 'lc.courseID')
            ->join('users as u', 'u.id', '=', 'lc.lecturerID')
            ->where('enrollments.studentID', Auth::user()->id)
            ->select('lc.id as courseID', 'c.code as course_code', 'c.name as course_name', 'u.name as lecturer_name')
            ->get();

        return view('student.list_course', compact('enrolledCourses'));
    }

    //Method to show all courses and allow user to search course
    public function searchCourses(Request $request)
    {
        $input = $request->input('search');

        //if user enters data in the search bar
        if ($input) {
            $courses = Course::join('lecturer_courses as lc', 'courses.id', '=', 'lc.courseID')
                ->join('users as u', 'u.id', '=', 'lc.lecturerID')
                ->select('lc.id as lecturer_courses_id', 'courses.code as course_code', 'courses.name as course_name', 'u.name as lecturer_name')
                ->where('courses.code', 'LIKE', '%' . $input . '%')
                ->orWhere('courses.name', 'LIKE', '%' . $input . '%')
                ->orWhere('u.name', 'LIKE', '%' . $input . '%')
                ->get();
        }
        else //show all courses
        {
            $courses = Course::join('lecturer_courses as lc', 'courses.id', '=', 'lc.courseID')
                ->join('users as u', 'u.id', '=', 'lc.lecturerID')
                ->select('lc.id as lecturer_courses_id', 'courses.code as course_code', 'courses.name as course_name', 'u.name as lecturer_name')
                ->get();
        }

        return view('student.search_course', compact('courses'));
    }

    // Method to show the course details after clicking "Enroll"
    public function course_details($id)
    {
        $lecturercourse = LecturerCourse::find($id);

        $lecturer = User::find($lecturercourse->lecturerID);
        $course = Course::find($lecturercourse->courseID);

        //Retrieve the LecturerCourse that user has enrolled
        $enrolledCourses = LecturerCourse::whereIn('id', function($query) {
            $query->select('courseID')
                  ->from('enrollments')
                  ->where('studentID', Auth::user()->id);
            })->get();

        return view('student.course_details',compact('lecturercourse', 'lecturer', 'course', 'enrolledCourses'));
    }

    // Method (post) to add enrollment
    public function enroll_course(Request $request)
    {
        $data = new Enrollment;
        $data->studentID = Auth::user()->id;
        $data->courseID = $request->courseID;

        $data->save();

        return redirect()->route('student.list_course');
    }

    //from student list_couse.blade.php {{route('student.lesson', ['id' => $enrolledCourse->courseID])
    public function showLesson($id)
    {

        //dont delete these lines, to populate navbar
        session(['lecturerCourseID' => $id]);
        $lecturerCourse = LecturerCourse::where('id', $id)
                                ->with('course')
                                ->first();
        $course = $lecturerCourse->course;
        session(['course' => $course]);
        $lessons = Lesson::where('courseID', $id)->get();
        $announcements=Announcement::where('courseID', $id)->get();
        return view('student.lesson.lesson',compact('lessons'),compact('announcements'));

    }


    // Method to show assignment page
    public function showAssignment($id)
    {
        $courseID=$id;
        return view('student.assignment.tobe_assignment',compact('courseID'));
    }

    // Method to show attendance page


}
