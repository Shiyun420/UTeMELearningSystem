<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LecturerCourse;

class LessonController extends Controller
{

    //$id is from {{ route('lecturer.view_lesson', ['id' => $lecturerCourse->id]) }}
    //in lecturer>home.blade.php
    public function view_lesson($id){
        
        //dont delete $lecturerCourseID, $lecturerCourse and $course
        //to populates navbar in lecturer layout -> $lecturerCourseID
        $lecturerCourseID=$id;

        $lecturerCourse = LecturerCourse::where('id', $lecturerCourseID)
                                ->with('course')
                                ->first();
        $course = $lecturerCourse->course;
        
        $lessons = Lesson::where('courseID', $id)->get();
        

        session(['lecturerCourseID' => $id]); //use to populate navbar
        session(['course' => $course]);//can use to populate course code, and name in view


        return view('lecturer.lesson.view', compact('lessons'));
    }


    public function add_lesson(){
 
        return view('lecturer.lesson.add');
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

        $lesson->courseID = session('lecturerCourseID');
        $lesson->save();

        return redirect() ->back()-> with('message' ,'Lesson added successfuly');

    }
    public function lesson_detail($id)
    {
    
        $lessons = Lesson::where('id', $id)->get();
        return view('lecturer.lesson.detail',compact('lessons'));
    }




}
