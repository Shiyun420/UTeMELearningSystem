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
</style>

<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.assignment') }}">Assignment</a></li>
            <li class="breadcrumb-item"><a href="{{ route('student.completed_assignments') }}">Completed Assignments</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Feedback</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="back-button">
                <a href="{{ route('student.completed_assignments') }}" class="btn btn-secondary">Back</a>
            </div>
            <div class="feedback-container">
                <h3>Feedback for Assignment {{ $assignment->id }}</h3>
                <p>{{ $feedback }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
