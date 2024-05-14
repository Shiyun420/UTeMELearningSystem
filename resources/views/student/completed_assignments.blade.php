@extends('layouts.studentview')

@section('content')
<link rel="stylesheet" href="{{url('css/student/search_course.css')}}">
<style>
    .table-cell {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .inline-h3 h3 {
        display: inline-block;
        margin-right: 20px; /* Add space between headings if needed */
    }
    .inline-h3 h3 a {
        color: black;
    }
    .inline-h3 h3 a.active {
        font-weight: bold; /* Make the active link bold */
        text-decoration: underline; /* Underline the active link */
    }
</style>

<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.assignment') }}">Assignment</a></li>
        </ol>
    </nav>
</div>

<h3> <b>BITM 2223 Machine Learning</b> </h3>
<div class="inline-h3">
    <h3><a href="{{ route('student.tobe_completed') }}">TO-BE-COMPLETED</a></h3>
    <h3><a href="{{ route('student.completed_assignments') }}" class="active">COMPLETED</a></h3>
</div>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead style="background-color:#acb984;">
                        <tr>
                            <th scope="col">Assignment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <tbody>
                                <tr>
                                    <td class="table-cell">
                                       Assignment 3: Desion Tree
                                       <a href="{{ route('student.view_feedback', ['id' => 3]) }}">View Feedback</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-cell">
                                       Assignment 4: Candidate Elimination
                                       <a href="{{ route('student.view_feedback', ['id' => 4]) }}">View Feedback</a>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
