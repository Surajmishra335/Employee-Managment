@extends('layouts.main')

@section('content')

<h4>States</h4>

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
                        <form action="{{route('states.index')}}" method="GET">
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
                        <a href="{{route('states.create')}}" class="float-right btn btn-primary">Create</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Country Name</th>
                            <th scope="col">State Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($states as $state)
                        <tr>
                            <th scope="row">{{$state->id}}</th>
                            <td>{{$state->country->name}}</td>
                            <td>{{$state->name}}</td>
                            <td>
                                <a href="{{route('states.edit', [$state->id])}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{route('states.destroy', [$state->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <p>No states found in records</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    

</div>

@endsection