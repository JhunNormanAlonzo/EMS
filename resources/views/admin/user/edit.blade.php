@extends('admin.layouts.master')

@section('content')
    <div class="container mt-3">
        <form action="{{route('users.update', [$user->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="rounded p-3" style="background-color: rgba(0,0,0,0.12)">
                        <h6>Edit Employee</h6>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <div class="card-header">{{ __('General Information') }}</div>

                        <div class="card-body">


                            <div class="mb-3">
                                <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror " placeholder="Full Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="text" name="address" value="{{$user->address}}" class="form-control @error('address') is-invalid @enderror " placeholder="Address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="number" name="mobile_number" value="{{$user->mobile_number}}" class="form-control @error('mobile_number') is-invalid @enderror " placeholder="Mobile Number">
                                @error('mobile_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <select name="department_id" class="form-select @error('department_id') is-invalid @enderror " id="">
                                    <option value="">Choose Department</option>
                                    @foreach($departments as $department)
                                        <option @if($user->department_id == $department->id) selected @endif value="{{$department->id}}">{{ucwords($department->name)}}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <input type="text" name="designation" value="{{$user->designation}}" class="form-control @error('designation') is-invalid @enderror " placeholder="Designation">
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="">Date Start</label>
                                <input type="date" name="start_from" value="{{$user->start_from}}" class="form-control @error('start_from') is-invalid @enderror " placeholder="Start Date">
                                @error('start_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror " placeholder="Image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">{{ __('General Information') }}</div>

                        <div class="card-body">

                            <div class="mb-3">
                                <input type="text" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror " placeholder="Email">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">
                                    <small class="text-muted">( leave blank password if no changes )</small>
                                </label>
                                <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror " placeholder="Password ">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <select name="role_id" class="form-select @error('role_id') is-invalid @enderror " id="">
                                    <option value="">Choose Role</option>
                                    @foreach($roles as $role)
                                        <option @if($user->role_id == $role->id) selected @endif value="{{$role->id}}">{{ucwords($role->name)}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        @if(isset(Auth()->user()->role->permission['name']['user']['can-edit']))
                        <button class="btn btn-primary" type="submit">Update</button>
                        @endif
                        <a href="{{route('users.index')}}" class="float-end">Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
