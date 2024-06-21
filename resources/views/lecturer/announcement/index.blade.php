@extends('layouts.lecturer')

@section('content')
<link rel="stylesheet" href="{{url('css/lecturer/announcement.css')}}">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Announcement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('lecturer.add_announcement') }}">
          @csrf
          <div class="mb-4">
            <label for="details" style="width:100px;">Details</label>
            <input type="text" id="details" name="details" required>
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
<!-- Modal for editing announcement -->
@foreach($announcements as $announcement)
<div class="modal fade" id="editModal{{$announcement->id}}" tabindex="-1" aria-labelledby="editModalLabel{{$announcement->id}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel{{$announcement->id}}">Edit Announcement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('lecturer.edit_announcement', $announcement->id) }}">
          @csrf
          @method('PATCH')
          <div class="mb-4">
            <label for="details" style="width:100px;">Details</label>
            <input type="text" id="details" name="details" value="{{$announcement->details}}" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn assign-btn">Update</button>
      </div>
        </form>
    </div>
  </div>
</div>
@endforeach

<h2>{{session('course')->code}} {{session('course')->name}}</h2>
<!-- Button trigger modal -->
<button type="button" class="add-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Announcement
</button>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table class="mx-auto">
  <thead style="background-color:#acb984;">
    <tr>
    <th scope="col" class="p-2">Date</th>
      <th scope="col" class="p-2" style="width:450px;">Details</th>
      <th scope="col" class="p-2" style="width:100px;">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($announcements as $announcement)
    <tr>
        <td class="p-2">{{ $announcement->created_at->format('d M Y') }}</td>
        <td class="p-2">{{ $announcement->details }}</td>
        <td>
          <!-- Button group with icons for view, edit, delete -->
        <div class="d-flex justify-content-between w-50 mx-auto">
            <a class="p-2" href="" data-bs-toggle="modal" data-bs-target="#editModal{{$announcement->id}}">
                <i class="fas fa-edit"></i>
            </a>
            <a href="#" class="p-2" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this announcement?')) { document.getElementById('delete-form-{{$announcement->id}}').submit(); }">
                <i class="fas fa-trash-alt"></i>
              </a>
              <form id="delete-form-{{$announcement->id}}" action="{{ route('lecturer.delete_announcement',['id' => $announcement -> id] ) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
              </form>
        </div>
        </td>
    </tr>
  @endforeach

  </tbody>
</table>




@endsection
