@extends('layouts.lecturer') 

@section('content') 
<link rel="stylesheet" href="{{url('css/lecturer/quiz.css')}}">

<h2>{{session('course')->code}} {{session('course')->name}}</h2>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('lecturer.quiz_index', ['id' => session('lecturerCourseID')]) }}">QUIZ</a></li>
    <li class="breadcrumb-item"><a href="{{ route('lecturer.quiz_details', ['quizID' => $question->quizID]) }}">{{ $question->quiz->name }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Question</li>
  </ol>
</nav>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    
    <form method="POST" action="{{ route('lecturer.edit_question_post', ['questionID' => $question->id]) }}">
        @csrf
   
        <input name="quizID" type="hidden" value="{{ $question->quizID }}">
        
        <div class="form-group">
            <label for="question">Question:</label>
            <textarea id="question" name="question" rows="2" cols="80" required>{{ $question->question }}</textarea>
        </div>

        @foreach ($question->selections as $index => $selection)
            <div class="form-group">
                <label for="choice{{ $index + 1 }}">Choice {{ $index + 1 }}:</label>
                <textarea id="choice{{ $index + 1 }}" name="choices[{{ $selection->id }}]" rows="2" cols="80" required>{{ $selection->selection }}</textarea>
            </div>
        @endforeach

        <div class="form-group">
            <label for="correct_choice">Correct Choice:</label>
            <select name="correct_choice" id="correct_choice">
                @foreach ($question->selections as $index => $selection)
                    <option value="{{ $selection->id }}" {{ $selection->isTrue ? 'selected' : '' }}>{{ $index + 1 }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn-submit" type="submit">Update</button>
        </div>
    </form>
</div>



    
@endsection
