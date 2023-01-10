@extends('admin.layouts.master')

@section('content')
    <div class="container  mt-5">
        <div class="row container">
            <div class="col-12">
               <div class="mb-4 rounded p-3" style="background-color: rgba(0,0,0,0.12)">
                   <h6 class="">
                       All Employees
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
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Start Date</th>
                        <th>Address</th>
                        <th>Mobile Number</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @if(count($users) > 0 )
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset('storage/profiles/'.$user->image)}}" width="60"  height="60" alt=""></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><span class="badge bg-success">{{$user->role->name ?? ''}}</span>
                                    </td>
                                    <td>{{$user->designation}}</td>
                                    <td>{{$user->department->name ?? ''}}</td>
                                    <td>{{$user->start_from}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->mobile_number}}</td>
                                    <td>
                                        @if(isset(Auth()->user()->role->permission['name']['user']['can-view']))
                                        <a href="{{route('users.edit', [$user->id])}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset(Auth()->user()->role->permission['name']['user']['can-delete']))
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#delete{{$user->id}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        @endif

                                        <!-- Modal -->
                                        <form action="{{route('users.destroy', [$user->id])}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Do you want to delete this user ?
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
@endsection
