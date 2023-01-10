@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Leave Form') }}</div>

                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="{{route('leaves.update', [$leave->id])}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="mb-3">
                                <label for="">Date From</label>
                                <input type="text" id="date" name="from" value="{{$leave->from}}" class="form-control @error('from') is-invalid @enderror " placeholder="Start">
                                @error('from')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Date To</label>
                                <input type="text" id="date1" name="to" value="{{$leave->to}}" class="form-control @error('to') is-invalid @enderror " placeholder="To">
                                @error('to')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Leave Type</label>
                                <select name="type" class="form-control @error('type') is-invalid @enderror " id="">
                                    <option value="">Choose leave type</option>
                                    <option @if($leave->type == "annualleave") selected @endif value="annualleave">Annual Leave</option>
                                    <option @if($leave->type == "sickleave") selected @endif value="sickleave">Sick Leave</option>
                                    <option @if($leave->type == "parental") selected @endif value="parental">Parental</option>
                                    <option @if($leave->type == "other") selected @endif value="other">Other</option>
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <textarea name="description" id="" placeholder="Description..." class="form-control" rows="3">{{$leave->description}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
