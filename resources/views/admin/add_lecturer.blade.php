@extends('layouts.admin') 

@section('content') 
<link rel="stylesheet" href="{{url('css/admin/add_lecturer.css')}}">

<div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.showlecturers') }}">Lecturer</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Lecturer</li>
  </ol>
</nav>
</div>

<div class="form-container">

<form method="POST" action="{{ route('admin.register_lecturer') }}">
    @csrf <!-- CSRF protection -->
  

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="IC">IC:</label>
        <input type="text" id="IC" name="IC">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </div>        
    <div class="form-group">
        <label for="phoneNum">Phone Number:</label>
        <input type="text" id="phoneNum" name="phoneNum">
    </div>
    <div class="form-group">
        <label for="tempPassword">Temporary Password:</label>
        <input type="password" id="password" name="password" >
    </div>
    <div class="form-group">
        <label for="tempPassword">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" >
    </div>
    <div class="form-group">
        <button class="btn-submit" type="submit">Submit</button>
    </div>
</form>

    
@endsection
