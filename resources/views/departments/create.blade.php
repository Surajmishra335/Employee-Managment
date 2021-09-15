@extends('layouts.main')

@section('content')

<h2 class="text-center">Create Departments</h2>

<div class="row justify-content-center">
    <div class="col-md-6 offset-1">
        <div class="card">
            <div class="card-header">
                Create New Department
                <a href="{{route('departments.index')}}" class="btn btn-primary float-right btn-sm">Back</a>
            </div>
            <div class="card-body">
                <form action="{{route('departments.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="state_name">Department Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection