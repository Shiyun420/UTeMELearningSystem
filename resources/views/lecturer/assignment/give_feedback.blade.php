@extends('layouts.lecturer') 

@section('content') 
<link rel="stylesheet" href="{{url('css/lecturer/assignment.css')}}">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">BITM 2223 WEB APPLICATION DEVELOPMENT</a></li>  
    <li class="breadcrumb-item"><a href="#">Assignment</a></li>
    <li class="breadcrumb-item"><a href="#">Submissions</a></li>
    <li class="breadcrumb-item active" aria-current="page">Give Feedback</li>
  </ol>
</nav>


<h3>Assignment 1: Case Study</h3>
<h3>Wong Yi Xuan</h3>
<hr>


<div class="preview-container">
        <div class="pdf-preview">
            <object data="/assignmentsubmission/assignmentTest.pdf" type="application/pdf" width="100%" height="100%">
                <p>Your browser does not support PDFs. <a href="/assignmentsubmission/assignmentTest">Download the PDF</a>.</p>
            </object>
        </div>
        <div class="feedback">
            <h4>Feedback</h4>
            <textarea placeholder="Enter your feedback here..."></textarea>
        </div>
    </div>




    
@endsection
