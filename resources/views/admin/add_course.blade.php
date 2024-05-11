@extends('layouts.admin') 

@section('content') 
<link rel="stylesheet" href="{{url('css/admin/add_lecturer.css')}}">

<div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.showcourses') }}">Course</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Course</li>
  </ol>
</nav>
</div>

<div class="form-container">

    <form method="POST" action="{{ route('admin.register_course') }}">
        @csrf
        <div class="form-group">
            <label for="code">Course Code:</label>
            <input type="text" id="code" name="code">
        </div>
        <div class="form-group">
            <label for="name">Course Name:</label>
            <input type="name" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" id="description" name="description">
        </div>

        <div class="form-group">
            <button class="btn-submit" type="submit">Submit</button>
        </div>
    </form>
</div>
    
@endsection
