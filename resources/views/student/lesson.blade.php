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

<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.lesson') }}">Lesson</a></li>
        </ol>
    </nav>
</div>

<h3> BITM 2113 WEB APPLICATION DEVELOPMENT </h3>
<i class="fa-solid fa-volume-high"></i> ANNOUNCEMENT
<p> Tuesday class is cancelled</p>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead style="background-color:#acb984;">
                        <tr>
                            <th scope="col">My Lessons</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <tbody>
                                <tr>
                                    <td class="table-cell">
                                        CHAPTER 1 INTRODUCTION TO HTML
                                        <a href="{{ route('student.lesson_detail') }}">

                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-cell">
                                        CHAPTER 2 CSS
                                        <a href="#">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-cell">
                                        CHAPTER 3 JAVASCRIPT
                                        <a href="#">
                                            <i class="fas fa-eye"></i>
                                        </a>
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
