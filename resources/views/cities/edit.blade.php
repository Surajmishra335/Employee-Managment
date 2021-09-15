@extends('layouts.main')

@section('content')

<h2 class="text-center">Edit City</h2>

<div class="row justify-content-center">
    <div class="col-md-6 offset-1">
        <div class="card">
            <div class="card-header">
                Edit City
                <a href="{{route('cities.index')}}" class="btn btn-primary float-right btn-sm">Back</a>
            </div>
            <div class="card-body">
                <form action="{{route('cities.update', [$city->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="input-group mb-3">

                            <select class="custom-select @error('state_id') is-invalid @enderror" id="" name="state_id">
                                <option disabled>Choose...</option>
                                @foreach ($states as $item)
                                <option value="{{$item->id}}" @if ($item->id == $city->state->id) selected @endif>
                                    {{$item->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('state_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state_name">City Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{$city->name}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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