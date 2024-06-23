@extends('layouts.admin') 

@section('content') 
<link rel="stylesheet" href="{{url('css/admin/add_lecturer.css')}}">
<script src="{{url('js/admin/add_lecturer.js')}}"></script>

<div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.showlecturers') }}">Lecturer</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Lecturer</li>
  </ol>
</nav>
</div>

<div class="form-container">

    <div class="form-group">
        <label>Name:</label>
        <input value="{{$lecturer->name}}" readonly>
    </div>
    <div class="form-group">
        <label>IC:</label>
        <input value="{{$lecturer->IC}}" readonly>
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input value="{{$lecturer->email}}" readonly>
    </div>        
    <div class="form-group">
        <label>Phone Number:</label>
        <input value="{{$lecturer->phoneNum}}" readonly>
    </div>
    <div class="form-group">
        <a class="btn-submit" href="{{route('admin.showlecturers')}}" style="text-decoration: none;">Back</a>
    </div>
</div>   
@endsection