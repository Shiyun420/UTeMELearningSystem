@extends('layouts.lecturer') 

@section('content') 
<link rel="stylesheet" href="{{url('css/lecturer/assignment.css')}}">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">BITM 2223 WEB APPLICATION DEVELOPMENT</a></li>  
    <li class="breadcrumb-item"><a href="#">Assignment</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Submission</li>
  </ol>
</nav>


<h2>Assignment 1: Case Study</h2>

<table class="mx-auto">
  <thead style="background-color:#acb984;">
    <tr>
      <th scope="col" class="p-2">NO</th>
      <th scope="col" class="p-2">Student</th>
      <th scope="col" class="p-2">Feedback</th>
      <th scope="col" class="p-2" style="width:100px;">Action</th>
    </tr>
  </thead>
  <tbody>
  <tr>
        <td class="p-2">1</td>
        <td class="p-2">Wan Irdina Binti Muhammad Ahmad</td>
        <td class="p-2">Good Job</td>
        <td>
          <!-- Button group with icons for view, edit, delete -->
        <div class="d-flex p-2">
          <a href="{{ route('lecturer.quiz_details') }}">
              <i class="fas fa-eye"></i>
          </a>
          <a href="{{ route('lecturer.assignment_give_feedback') }}">
              <i class="fas fa-edit"></i>
          </a>
        </div>

        
        </td>
    </tr>
    <tr>
        <td class="p-2">1</td>
        <td class="p-2">Wan Irdina Binti Muhammad Ahmad</td>
        <td class="p-2">Good Job</td>
        <td>
          <!-- Button group with icons for view, edit, delete -->
        <div class="d-flex p-2">
          <a href="{{ route('lecturer.quiz_details') }}">
              <i class="fas fa-eye"></i>
          </a>
          <a href="{{ route('lecturer.assignment_give_feedback') }}">
              <i class="fas fa-edit"></i>
          </a>
        </div>

        
        </td>
    </tr>
    <tr>
        <td class="p-2">1</td>
        <td class="p-2">Wan Irdina Binti Muhammad Ahmad</td>
        <td class="p-2">Good Job</td>
        <td>
          <!-- Button group with icons for view, edit, delete -->
        <div class="d-flex p-2">
          <a href="{{ route('lecturer.quiz_details') }}">
              <i class="fas fa-eye"></i>
          </a>
          <a href="{{ route('lecturer.assignment_give_feedback') }}">
              <i class="fas fa-edit"></i>
          </a>
        </div>      
        </td>
    </tr>
  
  </tbody>
</table>
    
@endsection
