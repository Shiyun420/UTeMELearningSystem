<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function showAttendance($id)
    {
        $courseID=$id;
        return view('student.attendance.attendance',compact('courseID'));
    }

}
