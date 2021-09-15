@extends('layouts.main')

@section('content')

<h4 class="text-center">Departments</h4>

<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                <div class="row">
                    <div class="col">
                        <form action="{{route('departments.index')}}" method="GET">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" id="" class="form-control mb-2">
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <a href="{{route('departments.create')}}" class="float-right btn btn-primary">Create</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($departments as $department)
                        <tr>
                            <th scope="row">{{$department->id}}</th>
                            <td>{{$department->name}}</td>
                            <td>
                                <a href="{{route('departments.edit', [$department->id])}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{route('departments.destroy', [$department->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <p>No department found in records</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    

</div>

@endsection