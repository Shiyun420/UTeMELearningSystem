
@extends('layouts.lecturer')

@section('content')
<link rel="stylesheet" href="{{url('css/lecturer/assignment.css')}}">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">Cloud Foudation</a></li>
    <li class="breadcrumb-item"><a href="#">Assignment</a></li>
    <li class="breadcrumb-item"><a href="#">Submissions</a></li>
  </ol>
</nav>

@foreach($lessons as $lesson)
    <h3>{{ $lesson->title }}</h3>
    <h3>{{ $lesson->chapter }}</h3>
@endforeach



<div class="preview-container">
    @foreach ($lessons as $lesson)
        <div class="pdf-preview">
            <object data="{{ asset('images/lessons/'. $lesson->fileLocation) }}" type="{{ File::mimeType(public_path('images/lessons/'. $lesson->fileLocation)) }}" width="100%" height="100%">
                @if(str_contains($lesson->fileLocation, '.pdf'))
                    <p>Your browser does not support PDFs. <a href="{{ asset('images/lessons/'. $lesson->fileLocation) }}">Download the PDF</a>.</p>
                @elseif(str_contains($lesson->fileLocation, '.ppt'))
                    <p>Your browser does not support PowerPoint files. <a href="{{ asset('images/lessons/'. $lesson->fileLocation) }}">Download the PowerPoint</a>.</p>
                @elseif(str_contains($lesson->fileLocation, '.pptx'))
                    <p>Your browser does not support PowerPoint files. <a href="{{ asset('images/lessons/'. $lesson->fileLocation) }}">Download the PowerPoint</a>.</p>
                @elseif(str_contains($lesson->fileLocation, '.doc'))
                    <p>Your browser does not support Word documents. <a href="{{ asset('images/lessons/'. $lesson->fileLocation) }}">Download the Word document</a>.</p>
                @elseif(str_contains($lesson->fileLocation, '.xls'))
                    <p>Your browser does not support Excel files. <a href="{{ asset('images/lessons/'. $lesson->fileLocation) }}">Download the Excel file</a>.</p>
                @else
                    <p>Your browser does not support this file type. <a href="{{ asset('images/lessons/'. $lesson->fileLocation) }}">Download the file</a>.</p>
                @endif
            </object>
        </div>
    @endforeach
</div>





@endsection
