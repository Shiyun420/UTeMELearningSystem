@extends('layouts.studentview')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h3>Add File</h3>
            <form action="{{ route('submit_assignment') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="file" class="form-control" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('assignment') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
