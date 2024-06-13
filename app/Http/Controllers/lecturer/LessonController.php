<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    // In your controller
    public function view_lesson($id)
    {
         $courses = Course::find($id);
         $lessons = Lesson::where('courseID', $id)->get();

    return view('lecturer.lesson.view', compact('lessons', 'courses'));
    }
    public function add_lesson(){

        $courses = Course::all();

        return view('lecturer.lesson.add',compact('courses'));
    }
    public function store_lesson(Request $request){

        $lesson = new Lesson();
        $lesson->title = $request->input('title');
        $lesson->description = $request->input('description');

        if ($request->hasFile('fileLocation')) {
            $file = $request->file('fileLocation');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/lessons'), $filename);
            $lesson->fileLocation = $filename;
        }

        if ($request->hasFile('attribute')) {
            $file = $request->file('attribute');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/lessons'), $filename);
            $lesson->attribute = $filename;
        }

        $lesson->courseID = $request->input('courseID');
        $lesson->save();

        return redirect() ->back()-> with('message' ,'Lesson added successfuly');

    }
    public function lesson_detail($id)
    {
        $lessons = Lesson::where('id', $id)->get();

        return view('lecturer.lesson.detail',compact('lessons'));
    }




}
