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
    <h3><a href="{{ route('student.tobe_completed') }}" class="active">TO-BE-COMPLETED</a></h3>
    <h3><a href="{{ route('student.completed_assignments') }}">COMPLETED</a></h3>
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
                                       Assignment 1: FlipGrid
                                       <a href="{{ route('student.add_submission') }}">Add submission</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-cell">
                                       Assignment 2: Mindmap
                                       <a href="{{ route('student.add_submission') }}">Add submission</a>
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
