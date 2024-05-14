@extends('layouts.studentview')

@section('content')
<link rel="stylesheet" href="{{url('css/student/search_course.css')}}">
<style>
    .table-cell {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.lesson') }}">Lesson</a></li>
        </ol>
    </nav>
</div>

<h2><b> CHAPTER 1 INTRODUCTION TO HTML </h2><br>
<h4><b> Learning Outcome</h4>
<ol>
    <li>Introduce HTML syntax</li>
    <li>Recognize basic structure of HTML:Head, Title and Body</li>
    <li>Explain basic text formatting, headings, line breaks,paragraphs and lists</li>
</ol>

<p>HyperText Markup Language (HTML) is the standard markup language for documents designed to be displayed in a web browser. It defines the content and structure of web content. It is often assisted by technologies such as Cascading Style Sheets (CSS) and scripting languages such as JavaScript. </p>
<br><br>
<h4><b>Lecture Slide</h4>
<a href="#"> click to download lecture slide</a>

@endsection
