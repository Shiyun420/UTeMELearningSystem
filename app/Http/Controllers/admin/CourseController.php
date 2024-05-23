<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\LecturerCourse;

class CourseController extends Controller
{
    public function showcourses(){
        $courses=Course::all();

        return view('admin.course',compact('courses'));

    }

    public function add_course(){
        return view('admin.add_course');

    }

    public function register_course(Request $request)
    {
        $course=new Course;

        $course->name=$request->name;
        $course->code=$request->code;
        $course->description=$request->description;

        $course->save();

        return redirect()->back();
    }

    // Method for displaying all lecturers assigned to a course
    public function course_details($id){
        $course=Course::find($id);
        $lecturers=User::where('usertype', 'lecturer')->get();
        $assigned_lecturers = User::whereIn('id', function($query) use ($id) {
            $query->select('lecturerID')
                  ->from('lecturer_courses')
                  ->where('courseID', $id);
        })->get();

        return view('admin.course_details',compact('course', 'lecturers', 'assigned_lecturers'));
    }

    // Method (post) to add LecturerCourse
    public function assign_lecturer(Request $request)
    {
        $data = new LecturerCourse;
        $data->lecturerID = $request->lecturerID;
        $data->courseID = $request->courseID;

        $data->save();

        return redirect()->back();
    }
}
