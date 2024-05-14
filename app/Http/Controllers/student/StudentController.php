<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function listCourses()
    {
        return view('student.list_course');
    }
    public function searchCourses()
    {
        return view('student.search_course');
    }
    // Method to show lesson page
    public function showLesson()
    {
        // Add logic to fetch lesson details if necessary
        return view('student.lesson');
    }

    // Method to show assignment page
    public function showAssignment()
    {
        return view('student.tobe_assignment');
    }




    // Method to show attendance page
    public function showAttendance()
    {
        return view('student.attendance');
    }



}
