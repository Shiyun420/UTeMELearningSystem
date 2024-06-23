@extends('layouts.admin') 

@section('content') 
<link rel="stylesheet" href="{{url('css/admin/add_lecturer.css')}}">

<div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.showcourses') }}">Course</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
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

    <form method="POST" action="{{ route('admin.edit_course', $course->id) }}">
        @csrf
        <div class="form-group">
            <label for="code">Course Code:</label>
            <input type="text" id="code" name="code" value="{{$course->code}}" required>
        </div>
        <div class="form-group">
            <label for="name">Course Name:</label>
            <input type="name" id="name" name="name" value="{{$course->name}}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="{{$course->description}}" required>
        </div>

        <div class="form-group">
            <button class="btn-submit" type="submit">Update</button>
        </div>
    </form>
</div>
    
@endsection
