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

    <form method="POST" action="#">
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
            <label for="lectureSlide">Lecture Slide:</label>
            <input type="file" id="lectureSlide" name="lectureSlide">
        </div>

        <div class="form-group">
            <label for="thumbnail">Thumbnail:</label>
            <input type="file" id="thumbnail" name="thumbnail">
        </div>

        <div class="form-group">
            <button class="btn-submit" type="submit">Submit</button>
        </div>
    </form>
</div>
    
@endsection
