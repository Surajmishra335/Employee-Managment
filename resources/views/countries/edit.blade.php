@extends('layouts.main')

@section('content')

<h2 class="text-center">Edit Country</h2>

<div class="row justify-content-center">
    <div class="col-md-6 offset-1">
        <div class="card">
            <div class="card-header">
                Edit {{$country->name}}
                <a href="{{route('countries.index')}}" class="btn btn-primary float-right btn-sm">Back</a>
            </div>
            <div class="card-body">
                <form action="{{route('countries.update', [$country->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="country-code">Country Code</label>
                        <input type="text" class="form-control" name="country_code"
                            value="{{$country->country_code}}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Country Name</label>
                        <input type="text" class="form-control" name="name"
                        value="{{$country->name}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection