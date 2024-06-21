<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($id)
    {
        $lessons = Lesson::where('id', $id)->get();
        return view('student.lesson.lesson_detail',compact('lessons'));
    }
}

