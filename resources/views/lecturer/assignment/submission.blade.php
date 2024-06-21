@extends('layouts.lecturer') 

@section('content') 
<link rel="stylesheet" href="{{url('css/lecturer/assignment.css')}}">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('lecturer.assignment_index', ['id' => session('lecturerCourseID')]) }}">Assignment</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Submission</li>
  </ol>
</nav>

<h2>{{ session('course')->code }} {{ session('course')->name }} - {{$assignment->title}}</h2>
<br/>

<table class="mx-auto">
  <thead style="background-color:#acb984;">
    <tr>
      <th scope="col" class="p-2">NO</th>
      <th scope="col" class="p-2">Student</th>
      <th scope="col" class="p-2">Status</th>
      <th scope="col" class="p-2">Feedback</th>
      <th scope="col" class="p-2" style="width:100px;">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($studentAssignments as $index => $studentAssignment)
    <tr>
        <td class="p-2">{{$index + 1}}</td>
        <td class="p-2">{{$studentAssignment->name}}</td>
        @if($studentAssignment->assignmentID)
        <td class="p-2">Submitted</td>
        @else
        <td class="p-2" style="color:red;">Not Submitted</td>
        @endif
        @if($studentAssignment->feedback)
        <td class="p-2">{{$studentAssignment->feedback}}</td>
        @else
        <td class="p-2">-</td>
        @endif
        <td>
          @if($studentAssignment->assignmentID)
            <div class="d-flex p-2">
              <a href="{{route('lecturer.assignment_give_feedback', ['studentID' => $studentAssignment->id, 'assignmentID' => $assignment->id])}}">
                  <i class="fas fa-edit"></i>
              </a>
            </div>
          @endif
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
    
@endsection
