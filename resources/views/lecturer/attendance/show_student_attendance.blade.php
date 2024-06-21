@extends('layouts.lecturer') 

@section('content') 
<link rel="stylesheet" href="{{url('css/lecturer/assignment.css')}}">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('lecturer.attendance_index', ['id' => session('lecturerCourseID')]) }}">Attendance</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Attendance</li>
  </ol>
</nav>

<h2>{{ session('course')->code }} {{ session('course')->name }}</h2>
<br/>

<table class="mx-auto">
  <thead style="background-color:#acb984;">
    <tr>
      <th scope="col" class="p-2">Student</th>
      <th scope="col" class="p-2">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($students as $student)
    <tr>
        <td class="p-2">{{$student->name}}</td>
        @if($student->status == "Present")
            <td class="p-2" style="color:green;"><b>{{$student->status}}</b></td>
        @else
            <td class="p-2" style="color:red;"><b>Absent</b></td>
        @endif
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
    
@endsection