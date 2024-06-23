@extends('layouts.admin') 

@section('content') 
<link rel="stylesheet" href="{{url('css/admin/add_lecturer.css')}}">
<script src="{{url('js/admin/add_lecturer.js')}}"></script>


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
        <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="IC">IC:</label>
        <input type="text" id="IC" name="IC" required>
        <span id="icError"></span>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>        
    <div class="form-group">
        <label for="phoneNum">Phone Number:</label>
        <input type="text" id="phoneNum" name="phoneNum" required>
        <span id="phoneError"></span>
    </div>
    <div class="form-group">
        <label for="tempPassword">Temporary Password:</label>
        <input type="password" id="password" name="password" required>
        <span id="passwordError"></span>
    </div>
    <div class="form-group">
        <label for="tempPassword">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <span id="passwordConfirmationError"></span>
    </div>
    <div class="form-group">
        <button class="btn-submit" type="submit" onclick="check(event)">Submit</button>
    </div>
</form>
</div>    
@endsection

