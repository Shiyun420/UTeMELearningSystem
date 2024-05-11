@extends('layouts.admin') 

@section('content') 
<link rel="stylesheet" href="{{url('css/admin/home.css')}}">

<a href="{{ route('admin.add_lecturer') }}">
    <button class="add-btn"><i class="fa-solid fa-plus"></i>Add Lecturer</button>
</a>


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
