@extends('layouts.lecturer') 

@section('content') 
<link rel="stylesheet" href="{{url('css/lecturer/lesson.css')}}">

<h2>BITI 2223 Machine Learning</h2>

<a href="{{ route('lecturer.add_lesson') }}">
    <button class="add-btn"><i class="fa-solid fa-plus"></i>Add Lesson</button>
</a>


<div class="card-container">
<div class="card">
            <img src="/images/lesson/dummy.png" class="card-img-top" alt="Lesson Image">
            <div class="card-body">
                <h5 class="card-title">Chapter 1</h5>
                <p class="card-text">Intro to Web development</p>
                <a href="#" class="btn-details">Details</a>
            </div>
        </div>
        <div class="card">
            <img src="/images/lesson/dummy.png" class="card-img-top" alt="Lesson Image">
            <div class="card-body">
                <h5 class="card-title">Chapter 1</h5>
                <p class="card-text">Intro to Web development</p>
                <a href="#" class="btn-details">Details</a>
            </div>
        </div>
        <div class="card">
            <img src="/images/lesson/dummy.png" class="card-img-top" alt="Lesson Image">
            <div class="card-body">
                <h5 class="card-title">Chapter 1</h5>
                <p class="card-text">Intro to Web development</p>
                <a href="#" class="btn-details">Details</a>
            </div>
        </div>
        <div class="card">
            <img src="/images/lesson/dummy.png" class="card-img-top" alt="Lesson Image">
            <div class="card-body">
                <h5 class="card-title">Chapter 1</h5>
                <p class="card-text">Intro to Web development</p>
                <a href="#" class="btn-details">Details</a>
            </div>
        </div>
        <div class="card">
            <img src="/images/lesson/dummy.png" class="card-img-top" alt="Lesson Image">
            <div class="card-body">
                <h5 class="card-title">Chapter 1</h5>
                <p class="card-text">Intro to Web development</p>
                <a href="#" class="btn-details">Details</a>
            </div>
        </div>
        
</div>


    
@endsection
