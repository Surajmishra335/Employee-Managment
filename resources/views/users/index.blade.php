@extends('layouts.main')

@section('content')

<h4>User</h4>

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
                        <form action="{{route('users.index')}}" method="GET">
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
                        <a href="{{route('users.create')}}" class="float-right btn btn-primary">Create</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route('users.edit', [$user->id])}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{route('users.destroy', [$user->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <p>No users found in records</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    

</div>

@endsection