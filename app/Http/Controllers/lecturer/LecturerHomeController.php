<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\LecturerCourse;

class LecturerHomeController extends Controller
{
    // Method to display all courses assigned to a specific lecturer
    public function home(){
        $lecturerCourses = LecturerCourse::where('lecturerID', Auth::user()->id)->get();

        // Extract the courseID values from the lecturerCourses collection
        $courseIDs = $lecturerCourses->pluck('courseID');
        // Retrieve the courses where the id is in the list of courseIDs
        $courses = Course::whereIn('id', $courseIDs)->get();
        
        return view('lecturer.home', compact('lecturerCourses', 'courses'));   
    }

    
}
