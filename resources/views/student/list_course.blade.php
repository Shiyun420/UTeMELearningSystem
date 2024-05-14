@extends('layouts.student')

@section('content')
<link rel="stylesheet" href="{{url('css/student/search_course.css')}}">



<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="table-responsive"> <!-- Add this class for responsive behavior -->
                <table class="table">
                    <thead style="background-color:#acb984;">
                        <tr>
                            <th scope="col" width="50px">No</th>
                            <th scope="col" width="300px">Courses</th>
                            <th scope="col" width="300px">Lectures</th>
                            <th scope="col" width="200px">Action</th>
                            <!-- Add a new table header for actions -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Database BITP1323</td>
                            <td>Nurul Izrin</td>
                            <td>
                                <a href="{{ route('student.lesson') }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <i class="fas fa-trash-alt"></i>
                            </td>
                        </tr>
                        <!-- Repeat the above row structure for each row in your table -->
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>


    <!-- Repeat the above row structure for each row in your table -->
  </tbody>
</table>


@endsection
