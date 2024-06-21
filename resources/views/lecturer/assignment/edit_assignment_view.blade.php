@extends('layouts.lecturer')

@section('content') 
<link rel="stylesheet" href="{{url('css/admin/add_lecturer.css')}}">

<div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('lecturer.assignment_index', ['id' => session('lecturerCourseID')]) }}">Assignment</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Assignment</li>
  </ol>
</nav>
</div>

<div class="form-container">

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:400px;">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

<form method="POST" action="{{ route('lecturer.edit_assignment', $assignment->id) }}" enctype="multipart/form-data">
    @csrf <!-- CSRF protection -->

    <input type="number" id="lecturerCourseID" name="lecturerCourseID" value="{{$assignment->lecturerCourseID}}" hidden>
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{$assignment->title}}" required>
    </div>
    <div class="form-group">
        <label for="instruction">Instruction:</label>
        <input type="text" id="instruction" name="instruction" value="{{$assignment->instruction}}" required>
    </div>
    <div class="form-group">
        <label>The Current File:</label>
        <a href="{{ asset('assignmentFiles/' . $assignment->assignment_file) }}" download>{{ $assignment->assignment_file }}</a>
    </div>
    <div class="form-group">
        <label for="assignment_file">New File: </label>
        <input type="file" id="assignment_file" name="assignment_file">
    </div>
    <div class="form-group">
        <button class="btn-submit" type="submit">Save</button>
    </div>
</form>
    
@endsection

