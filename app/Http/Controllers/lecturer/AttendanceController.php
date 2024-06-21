<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Attendance;

class AttendanceController extends Controller
{

    public function index(){
        $lecturerCourseID = session('lecturerCourseID');
        $attendances = Attendance::Where('lecturerCourseID', $lecturerCourseID)->orderBy('updated_at', 'desc')->get();
        
        return view('lecturer.attendance.index', compact('attendances'));             
    }

    //POST: Add attendance
    public function add_attendance(Request $request)
    {
        $attendance = new Attendance;
        $attendance->attendance_date = $request->attendance_date;
        $attendance->starttime = $request->starttime;
        $attendance->endtime = $request->endtime;
        $attendance->lecturerCourseID = $request->lecturerCourseID;
        $attendance->save();

        return redirect()->back();
    }

    public function showStudentAttendance($id){
        $lecturerCourseID = session('lecturerCourseID');

        //retrieve students who are present
        $presentStudents = DB::table('attendances as a')
        ->join('student_attendances as sa', 'sa.attendanceID', '=', 'a.id')
        ->join('users as u', 'sa.studentID', '=', 'u.id')
        ->select('u.name', DB::raw("'Present' as status"))
        ->where('a.lecturerCourseID', '=', $lecturerCourseID)
        ->where('a.id', '=', $id)
        ->orderBy('u.name', 'asc')
        ->get();

        // Retrieve students who are enrolled but not present
        $absentStudents = DB::table('users as u')
        ->join('enrollments as e', 'u.id', '=', 'e.studentID')
        ->where('e.courseID', '=', $lecturerCourseID)
        ->whereNotIn('u.id', function($query) use ($id) {
            $query->select('sa.studentID')
                ->from('student_attendances as sa')
                ->where('sa.attendanceID', '=', $id);
        })
        ->select('u.*', DB::raw("'Absent' as status"))
        ->orderBy('u.name', 'asc')
        ->get();

        // Merge the two collections
        $students = $presentStudents->merge($absentStudents);
        // Order by student name
        $students = $students->sortBy('name');
        
        return view('lecturer.attendance.show_student_attendance', compact('students'));             
    }
    
}
