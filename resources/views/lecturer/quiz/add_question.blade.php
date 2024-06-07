@extends('layouts.lecturer') 

@section('content') 
<link rel="stylesheet" href="{{url('css/lecturer/quiz.css')}}">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">BITM 2223 WEB APPLICATION DEVELOPMENT</a></li>  
    <li class="breadcrumb-item"><a href="#">QUIZ</a></li>
    <li class="breadcrumb-item"><a href="#">Intro to HTML</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Question</li>
  </ol>
</nav>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="form-container">

    <form method="POST" action="{{ route('lecturer.add_question_post') }}">
        @csrf
        <input name="quizID" type="hidden" value="{{$quiz->id}}">
        <div class="form-group">
            <label for="question">Question:</label>
            <textarea id="question" name="question" rows="2" cols="80" required></textarea>
        </div>

        <div class="form-group">
            <label for="choice1">Choice 1:</label>
            <textarea id="choice1" name="choice1" rows="2" cols="80" required></textarea>
        </div>
        <div class="form-group">
            <label for="choice1">Choice 2:</label>
            <textarea id="choice1" name="choice2" rows="2" cols="80" required></textarea>
        </div>
        <div class="form-group">
            <label for="choice1">Choice 3:</label>
            <textarea id="choice1" name="choice3" rows="2" cols="80" required></textarea>
        </div>
        <div class="form-group">
            <label for="choice1">Choice 4:</label>
            <textarea id="choice1" name="choice4"rows="2" cols="80" required></textarea>
        </div>

        <div class="form-group">
            <label for="answer">Correct Choice:</label>
            <select name="correct_choice" id="">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>

        <div class="form-group">
            <button class="btn-submit" type="submit">Submit</button>
        </div>
    </form>
</div>



    
@endsection
