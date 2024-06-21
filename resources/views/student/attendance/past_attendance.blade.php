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


<h3> <b> {{ session('course')->code }} {{ session('course')->name }}</b> </h3>
<div class="inline-h3">
    <h6><a href="{{ route('student.attendance',['id' => session('lecturerCourseID')]) }}">TO-BE-SUBMITTED</a></h6>
    <h6><a href="{{ route('student.showPastAttendance') }}" class="active">PRESENT & ABSENT</a></h6>
</div>


<div class="container">
    <div class="row justify-content-center">
        @if(session()->has('message'))
            <br/><br/>
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:400px;">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-12">
            <div class="table-responsive"> <!-- Add this class for responsive behavior -->
                <table class="table">
                    <thead style="background-color:#acb984;">
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col" width="300px">Time</th>
                            <th scope="col">Status</th>
                            <!-- Add a new table header for actions -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allAttendances as $allAttendance)
                            <tr>
                                <td class="p-2">{{ \Carbon\Carbon::parse($allAttendance->attendance_date)->format('d M Y') }}</td>
                                <td class="p-2">{{ \Carbon\Carbon::parse($allAttendance->starttime)->format('g:ia') }} - {{ \Carbon\Carbon::parse($allAttendance->endtime)->format('g:ia') }}</td>
                                @if($allAttendance->status == 'Present')
                                    <td class="p-2" style="color:green;"><strong>{{ $allAttendance->status }}</strong></td>
                                @else 
                                    <td class="p-2" style="color:red;"><strong>{{ $allAttendance->status }}</strong></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

