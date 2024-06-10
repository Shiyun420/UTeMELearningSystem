<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;

class LessonController extends Controller
{
    public function view_lesson($id){
        //dont delete this 4 lines
        $courseID=$id;
        $course = Course::findOrFail($courseID);
        session(['courseID' => $id]);
        session(['course' => $course]);


        return view('lecturer.lesson.view', compact('courseID'));             
    }

    public function add_lesson(){
              
        return view('lecturer.lesson.add');             
    }

    
}
