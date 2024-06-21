@extends('layouts.studentview')

@section('content')
<link rel="stylesheet" href="{{url('css/student/search_course.css')}}">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">BITM 2223 WEB APPLICATION DEVELOPMENT</a></li>
    <li class="breadcrumb-item"><a href="#">Lesson</a></li>
    <li class="breadcrumb-item active" aria-current="page">Chapter 1: Intro to HTML</li>
  </ol>
</nav>

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
