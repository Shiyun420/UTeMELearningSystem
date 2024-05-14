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
            <li class="breadcrumb-item"><a href="{{ route('attendance') }}">Attendance</a></li>
        </ol>
    </nav>
</div>

<h3> <b> BITI 2223 Machine Learning</b> </h3>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="table-responsive"> <!-- Add this class for responsive behavior -->
                <table class="table">
                    <thead style="background-color:#acb984;">
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col" width="300px">Time</th>
                            <th scope="col">Action</th>
                            <!-- Add a new table header for actions -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>4-4-2024</td>
                            <td>8AM - 10AM</td>
                            <td>
                                <a href="#"><i>Submit Attendance</i></a>
                            </td>
                        </tr>
                        <!-- Repeat the above row structure for each row in your table -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

