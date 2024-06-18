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

        $request->validate([
            'title' => 'required|string',
            'chapter' => 'required|string',
            'description' => 'required|string',
            'fileLocation' => 'nullable|file|mimes:pdf,pptx,docx|max:2048',
            'attribute' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $lesson = new Lesson();
        $lesson->title = $request->input('title');
        $lesson->chapter = $request->input('chapter');
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


    public function edit_lesson(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        if (!$lesson) {
            return redirect()->route('lecturer.view_lesson', ['id' => session('lecturerCourseID')])->with('error', 'Lesson not found');
        }
        return view('lecturer.lesson.edit', compact('lesson'));
    }

    public function update_lesson(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        if (!$lesson) {
            return redirect()->route('lecturer.view_lesson', ['id' => session('lecturerCourseID')])->with('error', 'Lesson not found');
        }

        $request->validate([
            'title' => 'required|string',
            'chapter' => 'required|string',
            'description' => 'required|string',
            'fileLocation' => 'nullable|file|mimes:pdf,pptx,docx|max:2048,message:Please upload a file smaller than 2MB.',
            'attribute' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $lesson->title = $request->input('title');
        $lesson->chapter = $request->input('chapter');
        $lesson->description = $request->input('description');

        if ($request->hasFile('fileLocation')) {
            $file = $request->file('fileLocation');
            $filename = time(). '.'. $file->getClientOriginalExtension();
            $file->move(public_path('images/lessons'), $filename);
            $lesson->fileLocation = $filename;
        }


        if ($request->hasFile('attribute')) {
            $file = $request->file('attribute');
            $filename = time(). '.'. $file->getClientOriginalExtension();
            $file->move(public_path('images/lessons'), $filename);
            $lesson->attribute = $filename;
        }


        $lesson->save();

        return redirect()->route('lecturer.view_lesson', ['id' => session('lecturerCourseID')])->with('success', 'Lesson updated successfully');
    }

    public function delete_lesson(Request $request)
    {
        $lesson = Lesson::find($request->input('lesson_id'));
        if (!$lesson) {
            return redirect()->back()->with('error', 'Lesson not found');
        }
        $lesson->delete();
        return redirect()->back()->with('success', 'Lesson deleted successfully!');
    }



}
