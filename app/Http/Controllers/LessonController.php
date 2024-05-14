<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show()
    {

        // Pass the lesson data to the view
        return view('student.lesson_detail');
    }
}

