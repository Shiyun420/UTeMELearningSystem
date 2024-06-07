@extends('layouts.studentview')

@section('content')
<link rel="stylesheet" href="{{url('css/student/search_course.css')}}">
<style>
    .table-cell {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .inline-h3 h6 {
        display: inline-block;
        margin-right: 20px; /* Add space between headings if needed */
    }
    .inline-h3 h6 a {
        color: black;
    }
    .inline-h3 h6 a.active {
        font-weight: bold; /* Make the active link bold */
        text-decoration: underline; /* Underline the active link */
    }
</style>


<h3><b> {{$course->code}} {{$course->name}} </b></h3>
<div class="inline-h3">
    <h6><a href="{{ route('student.tobe_quiz', ['id' => $course->id]) }}">TO-BE-COMPLETED</a></h6>
    <h6><a href="{{ route('student.quizzes.completed') }}" class="active">COMPLETED</a></h6>
</div>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead style="background-color:#acb984;">
                        <tr>
                            <th scope="col">Quiz</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <tbody>
                                @foreach($completedQuizzes as $quiz)
                                <tr>
                                    <td class="table-cell">
                                       {{$quiz->name}}
                                       <a href="{{ route('student.preview_quiz', ['id' => $quiz->id]) }}">View Score</a>
                                    </td>
                                </tr>
                                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
