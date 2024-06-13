@extends('layouts.lecturer')

@section('content')
<link rel="stylesheet" href="{{url('css/lecturer/lesson.css')}}">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="BITI 2223 MACHINE LEARNING">Course</a></li>
    <li class="breadcrumb-item"><a href="#">LESSON</a></li>
    <li class="breadcrumb-item active" aria-current="page">ADD LESSON</li>
  </ol>
</nav>



<div class="form-container">
    <div class="container-fluid page-body-wrapper">
        @if (session()->has('message'))

        <div class="alert alert-success">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert">
                x
            </button>
        </div>

        @endif
    </div>

    <form action="{{ route('lecturer.store_lesson') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="chapter">Chapter:</label>
            <input type="chapter" id="chapter" name="chapter">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50"></textarea>
        </div>

        <div class="form-group">
            <label for="fileLocation">Lecture Slide:</label>
            <input type="file" id="fileLocation" name="fileLocation">
        </div>

        <div class="form-group">
            <label for="attribute">Thumbnail:</label>
            <input type="file" id="attribute" name="attribute">
        </div>

        <div class="form-group">
            <label for="courseID">Course</label>
            <select name="courseID" id="courseID" class="form-control" required>
                <option value="" disabled selected>Select a course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn-submit" type="submit">Submit</button>
        </div>
    </form>
</div>

@endsection
