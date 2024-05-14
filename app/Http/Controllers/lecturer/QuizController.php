<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;

class QuizController extends Controller
{

    public function index(){
              
        return view('lecturer.quiz.index');             
    }

    public function details(){
              
        return view('lecturer.quiz.details');             
    }

    public function add_question(){
              
        return view('lecturer.quiz.add_question');             
    }

    
}
