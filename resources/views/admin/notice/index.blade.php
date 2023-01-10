@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="mb-4 rounded p-3" style="background-color: rgba(0,0,0,0.12)">
                        <h6 class="">
                            All Notices
                        </h6>
                    </div>
                </div>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                @if(count($notices) > 0)

                @foreach($notices as $notice)
                    <div class="col-10">
                        <div class="card alert alert-info">
                            <div class="card-header alert alert-warning">
                                {{ucwords($notice->title)}}
                            </div>
                            <div class="card-body">
                                <p class="text-muted">
                                    {{$notice->description}}
                                </p>
                                <small class="badge bg-success">Date : {{$notice->date}}</small>
                                <small class="badge bg-warning">Created By : {{$notice->name}}</small>
                            </div>
                            <div class="card-footer">
                                @if(isset(Auth()->user()->role->permission['name']['notice']['can-view']))
                                <span class="float-start">
                                    <a href="{{route('notices.edit', [$notice->id])}}"><i class="fa fa-edit"></i></a>
                                </span>
                                @endif
                                <span class="float-end">
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#delete{{$notice->id}}">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                <!-- Modal -->
                                        <form action="{{route('notices.destroy', [$notice->id])}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <div class="modal fade" id="delete{{$notice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Department</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Do you want to delete this notice ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach

                @else
                    <span class="alert alert-info">
                        No notice to view.
                    </span>
                @endif
            </div>

        </div>
    </div>

@endsection
