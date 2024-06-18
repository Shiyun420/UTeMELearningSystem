@extends('layouts.lecturer')

@section('content')
<link rel="stylesheet" href="{{url('css/lecturer/lesson.css')}}">

<h2>{{ session('course')->name }}</h2>

<a href="{{ route('lecturer.add_lesson') }}">
    <button class="add-btn"><i class="fa-solid fa-plus"></i>Add Lesson</button>
</a>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card-container">
    @foreach ($lessons as $lesson)

    <div class="card">
        <img src="{{ asset('images/lessons/' . $lesson->attribute) }}" class="card-img-top" alt="Lesson Image">
        <div class="card-body">
            <h5 class="card-title">{{ $lesson->title }}</h5>
            <p class="card-text">{{ $lesson->description }}</p>
            <a href="{{ route('lecturer.lesson_detail',['id' => $lesson->id]) }}" class="btn-details">Details</a>
            <a href="{{ route('lecturer.edit_lesson',['id' => $lesson->id]) }}" class="btn-details">Edit</a>
            <form id="delete-form-{{ $lesson->id }}" action="{{ route('lecturer.delete_lesson') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                <button type="button" class="btn-details" onclick="confirmDelete({{ $lesson->id }})">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

<script>
    function confirmDelete(lessonId) {
        if (confirm('Are you sure you want to delete this lesson?')) {
            document.getElementById('delete-form-' + lessonId).submit();
        }
    }
    </script>
@endsection
