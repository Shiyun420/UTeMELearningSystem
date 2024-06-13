@extends('layouts.lecturer') 

@section('content') 
<link rel="stylesheet" href="{{url('css/lecturer/quiz.css')}}">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">BITM 2223 WEB APPLICATION DEVELOPMENT</a></li>  
    <li class="breadcrumb-item"><a href="#">QUIZ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Intro to HTML</li>
  </ol>
</nav>

<a href="{{ route('lecturer.add_question', ['quizID' => $quizID]) }}">

    <button class="add-btn"><i class="fa-solid fa-plus"></i>Add Question</button>
</a>


<table class="mx-auto">
  <thead style="background-color:#acb984;">
    <tr>
    <th scope="col" class="p-2">QUESTION</th>
      <th scope="col" class="p-2" style="width:100px;">ACTIONS</th> <!-- Add a new table header for actions -->
    </tr>
  </thead>
  <tbody>
  @foreach ($questions as $question)
  <tr>
        <td class="p-2">{{$question->question}}</td>
        <td>
          <!-- Button group with icons for view, edit, delete -->
        <div class="d-flex justify-content-between p-2">
          <a href="#">
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
        
        </td>
    </tr>
  
  </tbody>
</table>



    
@endsection
