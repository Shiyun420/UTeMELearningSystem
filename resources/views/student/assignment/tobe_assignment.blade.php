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


<h3> <b>BITM 2223 Machine Learning</b> </h3>
<div class="inline-h3">
    <h6><a href="{{ route('student.tobe_completed') }}" class="active">TO-BE-COMPLETED</a></h6>
    <h6><a href="{{ route('student.completed_assignments') }}">COMPLETED</a></h6>
</div>

<br>

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
@endsection
