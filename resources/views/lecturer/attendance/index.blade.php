@extends('layouts.lecturer') 

@section('content') 
<link rel="stylesheet" href="{{url('css/lecturer/attendance.css')}}">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Attendance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{route('lecturer.add_attendance')}}" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          <input type="number" id="lecturerCourseID" name="lecturerCourseID" value="{{ session('lecturerCourseID') }}" hidden>
          <div class="mb-4">
            <label for="attendance_date" style="width:100px;">Date</label>
            <input type="date" id="attendance_date" name="attendance_date" required>
          </div>
          <div class="mb-4">
            <label for="starttime" style="width:100px;">Start Time: </label>
            <input type="time" id="starttime" name="starttime" required>
          </div>
          <div class="mb-4">
            <label for="endtime" style="width:100px;">End time: </label>
            <input type="time" id="endtime" name="endtime" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn assign-btn">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<h2>{{ session('course')->code }} {{ session('course')->name }}</h2>

<!-- Button trigger modal -->
<button type="button" class="add-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Attendance
</button>

<table class="mx-auto">
  <thead style="background-color:#acb984;">
    <tr>
    <th scope="col" class="p-2">Attendance Date</th>
      <th scope="col" class="p-2" style="width:200px;">Time</th>
      <th scope="col" class="p-2" style="width:100px;">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($attendances as $attendance)
      <tr>
        <td class="p-2">{{ \Carbon\Carbon::parse($attendance->attendance_date)->format('d M Y') }}</td>
        <td class="p-2">{{ \Carbon\Carbon::parse($attendance->starttime)->format('g:ia') }} - {{ \Carbon\Carbon::parse($attendance->endtime)->format('g:ia') }}</td>
        <td>
          <!-- Button group with icons for view, edit, delete -->
        <div class="d-flex justify-content-between p-2">
          @if ($attendance->attendance_date < now('Asia/Kuala_Lumpur')->toDateString() || ($attendance->attendance_date == now('Asia/Kuala_Lumpur')->toDateString() && $attendance->endtime < now('Asia/Kuala_Lumpur')->toTimeString()) )
            <a href="{{ route('lecturer.showStudentAttendance', $attendance->id) }}">
                <i class="fas fa-eye"></i>
            </a>
          @endif
        </div>
        </td>
      </tr>
    @endforeach
  
  </tbody>
</table>



    
@endsection
