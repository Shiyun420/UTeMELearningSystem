<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;

class AssignmentController extends Controller
{

    public function index($id){
        
        $courseID=$id;
        return view('lecturer.assignment.index',compact('courseID'));             
    }

    public function assignment_submission(){
              
        return view('lecturer.assignment.submission');             
    }

    public function give_feedback(){
              
        return view('lecturer.assignment.give_feedback');             
    }

    
}
