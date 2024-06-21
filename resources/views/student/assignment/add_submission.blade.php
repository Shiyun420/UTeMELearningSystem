@extends('layouts.studentview')

@section('content')

<link rel="stylesheet" href="{{url('css/admin/add_lecturer.css')}}">

<div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('student.tobe_completed',['id' => session('lecturerCourseID')]) }}">Assignment</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$assignment->title}}</li>
  </ol>
</nav>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <br/>
            <h3>{{$assignment->title}}</h3>
            <p>{{$assignment->instruction}}</p>
            @if($assignment->assignment_file)
                <a href="{{ asset('assignmentFiles/' . $assignment->assignment_file) }}" download> <i class="fa fa-file"></i> {{ $assignment->assignment_file }}</a>
            @endif
            <br/><br/>

            <form action="{{ route('student.submit_assignment', ['id' => $assignment->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(session()->has('success'))    
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:450px;">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @else
                    @if(session()->has('error'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:450px;background-color:lightpink;">
                            {{ session()->get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <input type="number" id="assignmentID" name="assignmentID" value="{{ $assignment->id }}" hidden>
                    <div class="mb-3">
                        <input type="file" class="form-control" id="file" name="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
                <a href="{{ route('student.assignment', ['id' => session('lecturerCourseID')]) }}" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </div>
</div>

@endsection
