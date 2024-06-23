@extends('layouts.studentview')

@section('content')
<link rel="stylesheet" href="{{url('css/student/search_course.css')}}">
<style>
    .table-cell {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .inline-h3 h6 {
        display: inline-block;
        margin-right: 20px; /* Add space between headings if needed */
    }
    .inline-h3 h6 a {
        color: black;
    }
    .inline-h3 h6 a.active {
        font-weight: bold; /* Make the active link bold */
        text-decoration: underline; /* Underline the active link */
    }
</style>


<h3> {{ session('course')->code }} {{ session('course')->name }} </h3>
<div class="inline-h3">
    <h6><a href="{{ route('student.attendance',['id' => session('lecturerCourseID')]) }}" class="active">TO-BE-SUBMITTED</a></h6>
    <h6><a href="{{ route('student.showPastAttendance') }}">PRESENT & ABSENT</a></h6>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="table-responsive"> <!-- Add this class for responsive behavior -->
                <table class="table">
                    <thead style="background-color:#acb984;">
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col" width="300px">Time</th>
                            <th scope="col">Action</th>
                            <!-- Add a new table header for actions -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $attendance)
                            @if($attendance->attendance_date >= now('Asia/Kuala_Lumpur')->toDateString() || ($attendance->attendance_date == now('Asia/Kuala_Lumpur')->toDateString() && $attendance->endtime >= now('Asia/Kuala_Lumpur')->toTimeString()))
                                <tr>
                                    <td class="p-2">{{ \Carbon\Carbon::parse($attendance->attendance_date)->format('d M Y') }}</td>
                                    <td class="p-2">{{ \Carbon\Carbon::parse($attendance->starttime)->format('g:ia') }} - {{ \Carbon\Carbon::parse($attendance->endtime)->format('g:ia') }}</td>
                                    
                                    @if($attendance->attendance_date == now('Asia/Kuala_Lumpur')->toDateString() && $attendance->starttime <= now('Asia/Kuala_Lumpur')->toTimeString() && $attendance->endtime >= now('Asia/Kuala_Lumpur')->toTimeString())
                                        <td>
                                            <a href="{{ route('student.submit_attendance', $attendance->id) }}" onclick="return confirm('Are you sure you want to submit your attendance now?')"><i>Submit Attendance</i></a>
                                        </td>
                                    @elseif ($attendance->attendance_date > now('Asia/Kuala_Lumpur')->toDateString() || ($attendance->attendance_date == now('Asia/Kuala_Lumpur')->toDateString() && $attendance->starttime > now('Asia/Kuala_Lumpur')->toTimeString()))
                                        <td>
                                            <a href="" style="color:grey;" ><i>Submit Attendance</i></a>
                                        </td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

