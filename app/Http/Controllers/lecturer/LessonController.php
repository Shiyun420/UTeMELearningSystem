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
        $courseID=$id;
        
        return view('lecturer.lesson.view', compact('courseID'));             
    }

    public function add_lesson(){
              
        return view('lecturer.lesson.add');             
    }

    
}
