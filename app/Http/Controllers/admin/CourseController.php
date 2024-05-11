<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;

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

    public function course_details($id){
        $course=Course::find($id);
        
        return view('admin.course_details',compact('course'));
    }
}
