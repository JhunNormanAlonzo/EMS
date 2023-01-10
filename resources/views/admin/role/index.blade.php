@extends('admin.layouts.master')

@section('content')
    <div class="container  mt-5">
        <div class="row container">
            <div class="col-12">
                <div class="mb-4 rounded p-3" style="background-color: rgba(0,0,0,0.12)">
                    <h6 class="">
                        All Roles
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
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    @if(count($roles) > 0 )
                        @foreach($roles as $key => $role)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->description}}</td>
                                <td>
                                    @if(isset(Auth()->user()->role->permission['name']['role']['can-view']))
                                    <a href="{{route('roles.edit', [$role->id])}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @endif
                                </td>
                                <td>

                                    @if(isset(Auth()->user()->role->permission['name']['role']['can-delete']))
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#delete{{$role->id}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @endif

                                    <!-- Modal -->
                                    <form action="{{route('roles.destroy', [$role->id])}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <div class="modal fade" id="delete{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Roles</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you want to delete this role ?
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
