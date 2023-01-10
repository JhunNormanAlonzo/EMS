@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Department') }}</div>

                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="{{route('departments.update', [$department->id])}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="mb-3">
                                <input type="text" name="name" value="{{$department->name}}" class="form-control @error('name') is-invalid @enderror " placeholder="Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <textarea name="description" id="" placeholder="Description..." class="form-control" rows="3">{{$department->description}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                @if(isset(Auth()->user()->role->permission['name']['department']['can-edit']))
                                <button class="btn btn-primary" type="submit">Update</button>
                                @endif
                                <a href="{{route('departments.index')}}" class="float-end">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
