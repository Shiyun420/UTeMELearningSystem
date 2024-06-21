@extends('layouts.lecturer') 

@section('content') 
<link rel="stylesheet" href="{{url('css/lecturer/assignment.css')}}">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">  
    <li class="breadcrumb-item"><a href="{{ route('lecturer.assignment_index', ['id' => session('lecturerCourseID')]) }}">Assignment</a></li>
    <li class="breadcrumb-item"><a href="{{ route('lecturer.assignment_submission', $studentAssignment->assignmentID) }}">Submissions</a></li>
    <li class="breadcrumb-item active" aria-current="page">Give Feedback</li>
  </ol>
</nav>


<h3>{{ session('course')->code }} {{ session('course')->name }} - {{$studentAssignment->assignment->title}}</h3>
<h3>{{$studentAssignment->student->name}}</h3>
<hr>


<div class="preview-container">
        <div class="pdf-preview">
          <object data="{{ asset('assignmentsubmission/' . $studentAssignment->fileLocation) }}" type="application/pdf" width="100%" height="100%">
              <p>Your browser does not support PDFs. <a href="{{ asset('assignmentsubmission/' . $studentAssignment->fileLocation) }}" download>Download the PDF</a>.</p>
          </object>
        </div>
        <div class="feedback">
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:400px;">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
          <form method="POST" action="{{ route('lecturer.submit_feedback') }}" >
          @csrf
            <h4>Feedback</h4>
            <input type="number" id="studentID" name="studentID" value="{{$studentAssignment->studentID}}" hidden>
            <input type="number" id="assignmentID" name="assignmentID" value="{{$studentAssignment->assignmentID}}" hidden>
            @if($studentAssignment->feedback)
              <textarea id="feedback" name="feedback" type="text" placeholder="Enter your feedback here..." required>{{$studentAssignment->feedback}}</textarea>
            @else
              <textarea id="feedback" name="feedback" type="text" placeholder="Enter your feedback here..." required></textarea>
            @endif
            
            <div style="text-align:center;">
              <button type="submit" class="btn assign-btn">Save</button>
            </div>
          </form>
            
        </div>
    </div>




    
@endsection
