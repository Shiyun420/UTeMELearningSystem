<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function showAttendance()
    {
        return view('student.attendance');
    }

}
