@extends('layouts.lecturer')

@section('content')
<link rel="stylesheet" href="{{url('css/lecturer/lesson.css')}}">

<h2>{{session('course')->code}} {{session('course')->name}}</h2>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('lecturer.view_lesson',['id' => session('lecturerCourseID')]) }}">LESSON</a></li>
    <li class="breadcrumb-item active" aria-current="page">EDIT LESSON</li>
  </ol>
</nav>

<div class="form-container">
    <div class="container-fluid page-body-wrapper">
        @if ($errors->any())
         <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>

    <form action="{{ route('lecturer.update_lesson', ['id' => $lesson->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $lesson->title) }}">
        </div>
        <div class="form-group">
            <label for="chapter">Chapter:</label>
            <input type="chapter" id="chapter" name="chapter" value="{{ old('chapter', $lesson->chapter) }}">
        </div>

        <div class="form-group">
            <div class="d-flex align-items-start">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50">{{ old('description', $lesson->description) }}</textarea>
            </div>
            
        </div>

        <div class="form-group">
            <label for="fileLocation">Lecture Slide:</label>
            <input type="file" id="fileLocation" name="fileLocation" accept=".pdf,.pptx,.docx">
            <p>Current file: {{ $lesson->fileLocation }}</p>
        </div>

        <div class="form-group">
            <label for="attribute">Thumbnail:</label>
            <input type="file" id="attribute" name="attribute" accept="image/*">
            <p>Current thumbnail: {{ $lesson->attribute }}</p>
        </div>

        <div class="form-group">
            <button class="btn-submit" type="submit">Update</button>
        </div>
    </form>
</div>

@endsection
