@extends('layouts.studentview')

@section('content')

<style>
    .btn-submit{
    background-color: #7d8a56;
   /* Button background color */
    color: white;
   /* Button text color */
    border-radius: 5px;
    cursor: pointer;
    padding: 5px 20px;
    margin-left:350px;
    margin-top:5px;
}
</style>

<h3>Quiz 1: Intro to HTML</h3>

<form action="{{ route('student.submit_quiz', ['id' => $quiz['id']]) }}" method="POST">
                        @csrf
                        @foreach($quiz['questions'] as $questionIndex => $question)
                        <p>1 {{ $question['question'] }}</p>
                        <div>
                            @foreach($question['options'] as $optionKey => $option)
                            <label>
                                <input type="radio" name="answers[{{ $questionIndex }}]" value="{{ $optionKey }}">
                                {{ $option }}
                            </label><br>
                            @endforeach
                        </div>
                        @endforeach

                  <button type="submit" class="btn-submit">Submit</button>
                  <a href="{{ route('student.tobe_quiz') }}" class="btn btn-secondary">Back</a>
               </form>

                    
@endsection
