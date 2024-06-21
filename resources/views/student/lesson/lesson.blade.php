@extends('layouts.studentview')

@section('content')
<link rel="stylesheet" href="{{url('css/student/search_course.css')}}">
<style>
    .table-cell {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<h3> BITM 2113 WEB APPLICATION DEVELOPMENT </h3>
<i class="fa-solid fa-volume-high"></i> ANNOUNCEMENT
<p> Tuesday class is cancelled</p>

<div class="card-container">
<div class="card">
            <img src="/images/lesson/dummy.png" class="card-img-top" alt="Lesson Image">
            <div class="card-body">
                <h5 class="card-title">Chapter 1</h5>
                <p class="card-text">Intro to Web development</p>
                <a href="{{ route('student.lesson_detail') }}" class="btn-details">Details</a>
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