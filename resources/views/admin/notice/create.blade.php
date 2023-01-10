@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Notice Form') }}</div>

                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="{{route('notices.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" id="" name="title" class="form-control @error('title') is-invalid @enderror " placeholder="">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Date</label>
                                <input type="text" id="date" name="date" class="form-control @error('date') is-invalid @enderror " placeholder="">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="" placeholder="Write something here..." class="form-control" rows="3"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Created By</label>
                                <input type="text" id="" name="name"  value="{{auth()->user()->name}}" class="form-control @error('name') is-invalid @enderror " placeholder="">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
