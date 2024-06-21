@extends('layouts.student')

@section('content')
<link rel="stylesheet" href="{{url('css/student/course_details.css')}}">

<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2><strong>{{$course->code}} {{$course->name}}</strong></h2>
            <h4>Lecturer: {{$lecturer->name}}</h4>
            <p>Description: {{$course->description}}</p>
            <hr></hr>
            <div class="button-container">
                <form action="{{ route('student.enroll_course') }}" method="post">
                    @csrf
                    <input name="courseID" value="{{$lecturercourse->id}}" hidden>
                    <!-- If user has enrolled the course -> Display "Start Learning" -->
                    @if ($enrolledCourses->contains('id', $lecturercourse->id))
                        <a href="{{route('student.lesson',['id' => $lecturercourse->id])}}" class="learning-btn">Start Learning</button>
                    @else
                        <button type="submit" class="enroll-btn">Enroll me</button>
                    @endif
                    <a href="{{route('student.search_course')}}" class="back-btn">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
