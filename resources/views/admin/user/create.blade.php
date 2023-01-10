@extends('admin.layouts.master')

@section('content')
    <div class="container mt-3">
        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="rounded p-3" style="background-color: rgba(0,0,0,0.12)">
                        <h6>Register Employee</h6>
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
                                <input type="text" name="firstname" value="{{old('firstname')}}" class="form-control @error('firstname') is-invalid @enderror " placeholder="First Name">
                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="lastname" value="{{old('lastname')}}" class="form-control @error('lastname') is-invalid @enderror " placeholder="Last Name">
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="text" name="address" value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror " placeholder="Address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="number" name="mobile_number" value="{{old('mobile_number')}}" class="form-control @error('mobile_number') is-invalid @enderror " placeholder="Mobile Number">
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
                                        <option value="{{$department->id}}">{{ucwords($department->name)}}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <input type="text" name="designation" value="{{old('designation')}}" class="form-control @error('designation') is-invalid @enderror " placeholder="Designation">
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="">Date Start</label>
                                <input type="date" id="date" name="start_from" value="{{old('start_from')}}" class="form-control @error('start_from') is-invalid @enderror " placeholder="Start Date">
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
                                <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror " placeholder="Email">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror " placeholder="Password">
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
                                        <option value="{{$role->id}}">{{ucwords($role->name)}}</option>
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
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
