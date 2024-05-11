@extends('layouts.admin') 

@section('content') 
<link rel="stylesheet" href="{{url('css/admin/home.css')}}">

<a href="{{ route('admin.add_course') }}">
    <button class="add-btn"><i class="fa-solid fa-plus"></i>Add Course</button>
</a>


<table class="mx-auto">
  <thead style="background-color:#acb984;">
    <tr>
      <th scope="col" class="p-2">COURSE</th>
      <th scope="col" class="p-2" style="width:100px;">ACTIONS</th> <!-- Add a new table header for actions -->
    </tr>
  </thead>
  <tbody>
  @foreach($courses as $course)
    <tr>
        <td class="p-2">{{$course->code}} {{$course->name}}</td>
        <td>
          <!-- Button group with icons for view, edit, delete -->
        <div class="d-flex justify-content-between p-2">
          <a href="{{route('admin.course_details',$course->id)}}">
              <i class="fas fa-eye"></i>
          </a>
          <a href="edit-url">
              <i class="fas fa-edit"></i>
          </a>
          <a href="delete-url">
              <i class="fas fa-trash-alt"></i>
          </a>
        </div>

        
        </td>
    </tr>
  @endforeach
  
  </tbody>
</table>

    
@endsection
