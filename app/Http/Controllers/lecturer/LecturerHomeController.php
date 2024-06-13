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
    public function home()
    {
        $lecturerCourses = LecturerCourse::where('lecturerID', Auth::user()->id)
                                        ->with('course')
                                        ->get();

        return view('lecturer.home', compact('lecturerCourses'));
    }


    
}
