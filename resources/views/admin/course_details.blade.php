@extends('layouts.admin') 

@section('content') 
<link rel="stylesheet" href="{{url('css/admin/course_details.css')}}">

@csrf



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Lecturer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <select id="lecturerSelect">
            <option value="">--Select--</option>    
            <option value="">Noor Fazilla Binti Abd Yusof</option>
            <option value="">Noor Fazilla Binti Abd Yusof</option>
            <option value="">Noor Fazilla Binti Abd Yusof</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn assign-btn">Assign</button>
      </div>
    </div>
  </div>
</div>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.showcourses') }}">Course</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$course->code}} {{$course->name}}</li>
  </ol>
</nav>

<!-- Button trigger modal -->
<button type="button" class="add-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Assign Lecturer
</button>

<table class="mx-auto">
  <thead style="background-color:#acb984;">
    <tr>
      <th scope="col" class="p-2">LECTURER</th>
      <th scope="col" class="p-2" style="width:100px;">ACTIONS</th> <!-- Add a new table header for actions -->
    </tr>
  </thead>
  <tbody>
  <tr>
      <td class="p-2">Mark</td>
      <td>
        <!-- Button group with icons for view, edit, delete -->
        <div class="d-flex justify-content-between p-2">
        <i class="fas fa-eye"></i>  
        <i class="fas fa-edit"></i>
        <i class="fas fa-trash-alt"></i>
      
      </td>
    </tr>
    <tr>
      <td class="p-2">Mark</td>
      <td>
        <!-- Button group with icons for view, edit, delete -->
        <div class="d-flex justify-content-between p-2">
        <i class="fas fa-eye"></i>  
        <i class="fas fa-edit"></i>
        <i class="fas fa-trash-alt"></i>
      
      </td>
    </tr>
    <tr>
      <td class="p-2">Mark</td>
      <td>
        <!-- Button group with icons for view, edit, delete -->
        <div class="d-flex justify-content-between p-2">
        <i class="fas fa-eye"></i>  
        <i class="fas fa-edit"></i>
        <i class="fas fa-trash-alt"></i>
      
      </td>
    </tr>
    <!-- Repeat the above row structure for each row in your table -->
  </tbody>
</table>

    
@endsection
