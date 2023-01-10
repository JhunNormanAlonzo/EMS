@extends('admin.layouts.master')

@section('content')
    <div class="container  mt-5">
        <div class="row container">
            <div class="col-12">
               <div class="mb-4 rounded p-3" style="background-color: rgba(0,0,0,0.12)">
                   <h6 class="">
                       Leaves
                   </h6>
               </div>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <table class="table" id="datatablesSimple">
                    <thead>
                        <th>SN</th>
                        <th>Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Message</th>
                        <th>Approve / Reject</th>
                    </thead>
                    <tbody>
                        @if(count($leaves) > 0)
                            @foreach($leaves as $key => $leave)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$leave->user->name}}</td>
                                    <td>{{$leave->from}}</td>
                                    <td>{{$leave->to}}</td>
                                    <td>{{$leave->type}}</td>
                                    <td>{{$leave->description}}</td>
                                    <td>
                                        @if($leave->status == 0)
                                            <span class="badge bg-warning">Pending</span>
                                        @else
                                            <span class="badge bg-success">Approved</span>
                                        @endif
                                    </td>
                                    <td>{{$leave->message}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#empLeave{{$leave->id}}">Approve / Reject</button>

                                        {{--Modal --}}

                                        <form action="{{route('accept.reject', [$leave->id])}}" method="POST">
                                            @csrf
                                            <div class="modal fade" id="empLeave{{$leave->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Confirm Leave</h6>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for="" class="mb-1">Status</label>
                                                                    <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                                                                        <option value="">Choose status</option>
                                                                        <option value="0">Pending</option>
                                                                        <option value="1">Approved</option>
                                                                    </select>
                                                                    @error('status')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        {{$message}}
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for="" class="mb-1">Message</label>
                                                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="" rows="3"></textarea>
                                                                    @error('message')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        {{$message}}
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-sm btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-sm btn-danger">Submit</button>
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

@endsection
