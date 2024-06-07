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

<!-- Button trigger modal -->
<button type="button" class="add-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Quiz
</button>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<table class="mx-auto">
   <thead style="background-color:#acb984;">
      <tr>
         <th scope="col" class="p-2">QUIZ</th>
         <th scope="col" class="p-2" style="width:100px;">ACTIONS</th>
         <!-- Add a new table header for actions -->
      </tr>
   </thead>
   <tbody>
    @foreach ($quizzes as $quiz)
      <tr>
         <td class="p-2">{{ $quiz->name }}</td>
         <td>
            <!-- Button group with icons for view, edit, delete -->
            <div class="d-flex justify-content-between p-2">
               <a href="{{ route('lecturer.quiz_details', ['quizID' => $quiz->id]) }}">
               <i class="fas fa-eye"></i>
               </a>
               <a href="edit-url">
               <i class="fas fa-edit"></i>
               </a>
               <a href="delete-url">
               <i class="fas fa-trash-alt"></i>
               </a>
            </div>
         </td>
      </tr>
    @endforeach
   </tbody>
</table>


    
@endsection
