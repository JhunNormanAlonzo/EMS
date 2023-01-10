@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Update Notice') }}</div>

                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="{{route('notices.update', [$notice->id])}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" id="" name="title" value="{{$notice->title}}" class="form-control @error('title') is-invalid @enderror " placeholder="">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Date</label>
                                <input type="text" id="date" name="date" value="{{$notice->date}}" class="form-control @error('date') is-invalid @enderror " placeholder="">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="" placeholder="Write something here..." class="form-control" rows="3">{{$notice->description}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Created By</label>
                                <input type="text" id="" name="name"  value="{{$notice->name}}" class="form-control @error('name') is-invalid @enderror " placeholder="">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                @if(isset(Auth()->user()->role->permission['name']['notice']['can-edit']))
                                <button class="btn btn-primary" type="submit">Update</button>
                                @endif
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
