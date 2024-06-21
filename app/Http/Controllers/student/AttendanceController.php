<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Models\Attendance;
use App\Models\StudentAttendance;

class AttendanceController extends Controller
{
    //show attendances that need to be submitted
    public function showAttendance()
    {
        $lecturerCourseID = session('lecturerCourseID');

        //not submitted attendances
        $attendances = DB::table('attendances as a')
            ->leftJoin('student_attendances as sa', function($join) {
                $join->on('a.id', '=', 'sa.attendanceID');
            })
            ->whereIn('a.id', function($query) use ($lecturerCourseID) {
                $query->select('id')
                    ->from('attendances')
                    ->where('lecturerCourseID', $lecturerCourseID);
            })
            ->whereNull('sa.id')
            ->select('a.*', 'sa.*', 'a.id as id')
            ->orderBy('a.attendance_date', 'asc')
            ->orderBy('a.starttime', 'asc')
            ->get();

        return view('student.attendance.attendance', compact('attendances'));
    }

    //show past attendance (present and absent)
    public function showPastAttendance()
    {
        $lecturerCourseID = session('lecturerCourseID');
        // Absent attendances
        $absentAttendances = DB::table('attendances as a')
        ->leftJoin('student_attendances as sa', function($join) {
            $join->on('a.id', '=', 'sa.attendanceID')
                ->where('sa.studentID', Auth::id()); // specify studentID
        })
        ->join('enrollments as e', 'e.courseID', '=', 'a.lecturerCourseID')
        ->where('e.studentID', Auth::id()) // specify studentID
        ->where('e.courseID', $lecturerCourseID) // specify courseID
        ->whereNull('sa.id')
        ->where(function($query) {
            $query->where('a.attendance_date', '<', Carbon::now('Asia/Kuala_Lumpur')->toDateString())
                ->orWhere(function($query) {
                    $query->where('a.attendance_date', '=', Carbon::now('Asia/Kuala_Lumpur')->toDateString())
                        ->where('a.endtime', '<', Carbon::now('Asia/Kuala_Lumpur')->toTimeString());
                });
        })
        ->select('a.*', DB::raw("'Absent' as status"))
        ->orderBy('a.attendance_date', 'desc')
        ->get();

        // Submitted attendances
        $submittedAttendances = DB::table('student_attendances as sa')
        ->join('attendances as a', 'sa.attendanceID', '=', 'a.id')
        ->whereIn('sa.attendanceID', function($query) use ($lecturerCourseID) {
            $query->select('id')
                ->from('attendances')
                ->where('lecturerCourseID', $lecturerCourseID);
        })
        ->where('sa.studentID', Auth::id())
        ->select('a.*', 'sa.*', DB::raw("'Present' as status"))
        ->orderBy('sa.updated_at', 'desc')
        ->get();

        // Merge the two collections
        $allAttendances = $absentAttendances->merge($submittedAttendances);
        // Order by attendance_date
        $allAttendances = $allAttendances->sortByDesc('attendance_date');

        return view('student.attendance.past_attendance', compact('allAttendances'));
    }

    //Submit attendance (Add student_attendances)
    public function submit_attendance($id)
    {
        $student_attendance = new StudentAttendance;
        $student_attendance->attendanceID = $id;
        $student_attendance->studentID = Auth::id();
        $student_attendance->save();

        return redirect()->route('student.showPastAttendance')->with('message', 'Attendance Submitted Successfully');
    }

}
