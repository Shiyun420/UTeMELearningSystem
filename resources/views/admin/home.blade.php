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
    <!-- Example -->
    <!-- 
    <tr>
      <td class="p-2">Mark</td>
      <td>
        <div class="d-flex justify-content-between p-2">
        <i class="fas fa-eye"></i>  
        <i class="fas fa-edit"></i>
        <i class="fas fa-trash-alt"></i>
        </div>
      </td>
    </tr> 
    -->

    @foreach($lecturers as $lecturer)
      <tr>
          <td class="p-2">{{$lecturer->name}}</td>
          
          <td>
            <!-- Button group with icons for view, edit, delete -->
            <div class="d-flex justify-content-between p-2">
              <a href="{{route('admin.view_lecturer',$lecturer->id)}}">
                <i class="fas fa-eye"></i>
              </a>
            </div>
          </td>
      </tr>
    @endforeach
    
  </tbody>
</table>

    
@endsection
