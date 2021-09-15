@extends('layouts.main')

@section('content')

<h2 class="text-center">Create State</h2>

<div class="row justify-content-center">
    <div class="col-md-6 offset-1">
        <div class="card">
            <div class="card-header">
                Create New State
                <a href="{{route('states.index')}}" class="btn btn-primary float-right btn-sm">Back</a>
            </div>
            <div class="card-body">
                <form action="{{route('states.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group mb-3">

                            <select class="custom-select @error('country_id') is-invalid @enderror" id=""
                                name="country_id">
                                <option selected disabled>Choose...</option>
                                @foreach ($countries as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state_name">State Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="India">
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