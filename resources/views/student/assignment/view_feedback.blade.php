@extends('layouts.studentview')

@section('content')
<link rel="stylesheet" href="{{url('css/student/search_course.css')}}">
<style>
    .feedback-container {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .back-button {
        margin-bottom: 20px;
    }
    .feedback-container textarea {
        width: 100%;
        height: 300px;
        padding: 10px;
        font-size: 16px;
        box-sizing: border-box;
    }
</style>

<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.assignment', ['id' => session('lecturerCourseID')]) }}">Assignment</a></li>
            <li class="breadcrumb-item"><a href="{{ route('student.completed_assignments') }}">Completed Assignments</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Feedback</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="feedback-container">
                <h3>Feedback for Assignment</h3>
                <br/>
                <h5>{{$submittedAssignment->assignment->title}}</h5>
                <p>Your Submission:  
                    <a href="{{ asset('assignmentsubmission/' . $submittedAssignment->fileLocation) }}" download> 
                    <i class="fa fa-file"></i> {{ $submittedAssignment->fileLocation }} 
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;{{$submittedAssignment->created_at}}
                </p>
                <br/>
                <h5>Feedback: </h5>
                @if($submittedAssignment->feedback)
                <textarea id="feedback" name="feedback" type="text" placeholder="Enter your feedback here..." readonly>{{$submittedAssignment->feedback}}</textarea>
                @else
                    <p style="color:red;">The feedback has not been given yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
