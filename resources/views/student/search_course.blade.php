@extends('layouts.student')

@section('content')
<link rel="stylesheet" href="{{url('css/student/search_course.css')}}">

<div class="search-container">
        <form action="" method="GET" class="search-form">
            <input type="text" name="search" class="search-input" placeholder="Search..." required>
            <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
        </form>
</div>



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
                            <th scope="col">Action</th>
                            <!-- Add a new table header for actions -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Database BITP1323</td>
                            <td>Nurul Izrin</td>
                            <td>
                                <a href="#"><i>Enroll</i></a>
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
