@extends('layouts.main')

@section('content')

<h2 class="text-center">Edit State</h2>

<div class="row justify-content-center">
    <div class="col-md-6 offset-1">
        <div class="card">
            <div class="card-header">
                Edit {{$state->name}}
                <a href="{{route('states.index')}}" class="btn btn-primary float-right btn-sm">Back</a>
            </div>
            <div class="card-body">
                <form action="{{route('states.update', [$state->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="input-group mb-3">

                            <select class="custom-select @error('country_id') is-invalid @enderror" id=""
                                name="country_id">
                                <option  disabled>Choose...</option>
                                @foreach ($countries as $item)
                                <option 
                                    value="{{$item->id}}"
                                    @if ($item->id === $state->country->id)
                                        selected
                                    @endif
                                    >
                                    {{$item->name}}
                                </option>
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
                            value="{{$state->name}}">
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