@extends('layouts.lecturer') 

@section('content') 
<link rel="stylesheet" href="{{url('css/lecturer/quiz.css')}}">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Quiz</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form method="POST" action="{{ route('lecturer.add_quiz') }}">
            @csrf
            <input name="courseID" type="hidden" value="{{$courseID}}">
            <div class="modal-body">
               <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="name" name="name" required>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn assign-btn">Add</button>
            </div>
         </form>
      </div>
   </div>
</div>



@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('lecturer.view_lesson', ['id' => session('courseID')]) }}">{{session('course')->code}} {{session('course')->name}}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('lecturer.quiz_index', ['id' => session('courseID')]) }}">Quiz</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Submission</li>
  </ol>
</nav>
</div>
<h3>{{$quiz->name}}</h3>
<table class="mx-auto">
   <thead style="background-color:#acb984;">
      <tr>
         <th scope="col" class="p-2">Student</th>
         <th scope="col" class="p-2">Marks</th>
         <th scope="col" class="p-2" style="width:100px;">Action</th>
         <!-- Add a new table header for actions -->
      </tr>
   </thead>
   <tbody>
    @foreach ($submissionData as $submission)
      <tr>
         <td class="p-2">{{ $submission->student_name }}</td>
         <td class="p-2">{{ $submission->marks }}</td>
         <td>
            <!-- Button group with icons for view, edit, delete -->
            <div class="d-flex justify-content-between p-2">
               <a href="{{ route('lecturer.preview_quiz_submission', ['quizID' => $quiz->id, 'studentID' => $submission->studentID]) }}">
               <i class="fas fa-eye"></i>
               </a>
            </div>
         </td>
      </tr>
    @endforeach
   </tbody>
</table>

    
@endsection
