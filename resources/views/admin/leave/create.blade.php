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
                        <form action="{{route('leaves.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Date From</label>
                                <input type="text" id="date" name="from" class="form-control @error('from') is-invalid @enderror " placeholder="Start">
                                @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Date To</label>
                                <input type="text" id="date1" name="to" class="form-control @error('to') is-invalid @enderror " placeholder="To">
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
                                    <option value="annualleave">Annual Leave</option>
                                    <option value="sickleave">Sick Leave</option>
                                    <option value="parental">Parental</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <textarea name="description" id="" placeholder="Description..." class="form-control" rows="3"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>


                            <table class="table mt-5" id="datatablesSimple">
                                <thead>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Leave Type</th>
                                <th>Description</th>
                                <th>Reply</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                    @if(count($leaves) > 0)
                                        @foreach($leaves as $leave)
                                            <tr>
                                                <td>{{$leave->from}}</td>
                                                <td>{{$leave->to}}</td>
                                                <td>{{$leave->type}}</td>
                                                <td>{{$leave->description}}</td>
                                                <td>{{$leave->message}}</td>
                                                <td>
                                                    @if($leave->status == 0)
                                                        <div class="badge bg-danger" role="alert">pending</div>
                                                    @else
                                                        <div class="badge bg-success" role="alert">approved</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('leaves.edit', [$leave->id])}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#delete{{$leave->id}}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                    <!-- Modal -->
                                                    <form action="{{route('leaves.destroy', [$leave->id])}}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <div class="modal fade" id="delete{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Leave</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Do you want to delete this leave ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
