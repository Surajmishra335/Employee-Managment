@extends('layouts.main')

@section('content')

<h2 class="text-center">Countries Create</h2>

<div class="row justify-content-center">
    <div class="col-md-6 offset-1">
        <div class="card">
            <div class="card-header">
                Create New country
                <a href="{{route('countries.index')}}" class="btn btn-primary float-right btn-sm">Back</a>
            </div>
            <div class="card-body">
                <form action="{{route('countries.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="country-code">Country Code</label>
                        <input type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code"
                            placeholder="IN">
                        @error('country_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Country Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="India">
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