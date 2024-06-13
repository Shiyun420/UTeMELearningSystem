@extends('layouts.lecturer')

@section('content')
<link rel="stylesheet" href="{{url('css/lecturer/lesson.css')}}">

<h2>{{ session('course')->name }}</h2>

<a href="{{ route('lecturer.add_lesson') }}">
    <button class="add-btn"><i class="fa-solid fa-plus"></i>Add Lesson</button>
</a>


<div class="card-container">
    @foreach ($lessons as $lesson)

    <div class="card">
        <img src="{{ asset('images/lessons/' . $lesson->attribute) }}" class="card-img-top" alt="Lesson Image">
        <div class="card-body">
            <h5 class="card-title">{{ $lesson->title }}</h5>
            <p class="card-text">{{ $lesson->description }}</p>
            <a href="{{ route('lecturer.lesson_detail',['id' => $lesson->id]) }}" class="btn-details">Details</a>
        </div>
    </div>
    @endforeach
</div>


@endsection
