@extends('layouts.lecturer') 

@section('content') 
<link rel="stylesheet" href="{{url('css/lecturer/assignment.css')}}">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Assignment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{route('lecturer.add_assignment')}}" enctype="multipart/form-data">
        @csrf
        <input type="number" id="lecturerCourseID" name="lecturerCourseID" value="{{$lecturerCourseID}}" hidden>
        <div class="mb-4">
          <label for="mb-4" style="width:100px;">Title</label>
          <input type="text" id="title" name="title" required>
        </div>
        <div class="mb-4">
          <label for="mb-4" style="width:100px;">Instruction</label>
          <input type="text" id="instruction" name="instruction" required>
        </div>
        <div class="mb-4">
          <label for="mb-4" style="width:100px;">File (Optional)</label>
          <input type="file" id="assignment_file" name="assignment_file">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn assign-btn">Add</button>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>

<h2>{{ session('course')->code }} {{ session('course')->name }}</h2>

<!-- Button trigger modal -->
<button type="button" class="add-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Assignment
</button>

<table class="mx-auto">
  <thead style="background-color:#acb984;">
    <tr>
      <th scope="col" class="p-2">Assignment</th>
      <th scope="col" class="p-2" style="width:100px;">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($assignments as $assignment)
        <tr>
            <td class="p-2">{{$assignment->title}}</td>
            <td>
              <!-- Button group with icons for view, edit, delete -->
            <div class="d-flex justify-content-between p-2">
            <a href="{{ route('lecturer.assignment_submission', $assignment->id) }}">
                <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('lecturer.edit_assignment_view', $assignment->id) }}">
                <i class="fas fa-edit"></i>
            </a>
          </div>
            </td>
        </tr>
      @endforeach
  </tbody>
</table>

    
@endsection
