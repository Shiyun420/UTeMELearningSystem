<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show()
    {

        // Pass the lesson data to the view
        return view('student.lesson.lesson_detail');
    }
}

