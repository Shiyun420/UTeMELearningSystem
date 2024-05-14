@extends('layouts.studentview')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $quiz['title'] }}
                </div>
                <div class="card-body">
                    <form action="{{ route('student.submit_quiz', ['id' => $quiz['id']]) }}" method="POST">
                        @csrf
                        @foreach($quiz['questions'] as $questionIndex => $question)
                        <p>{{ $question['question'] }}</p>
                        <div>
                            @foreach($question['options'] as $optionKey => $option)
                            <label>
                                <input type="radio" name="answers[{{ $questionIndex }}]" value="{{ $optionKey }}">
                                {{ $option }}
                            </label><br>
                            @endforeach
                        </div>
                        @endforeach

                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('student.tobe_quiz') }}" class="btn btn-secondary">Back</a>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
