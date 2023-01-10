@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Send Mail Form') }}</div>

                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="{{route('mails.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Select</label>
                                <select name="" id="mail" class="form-control">
                                    <option value="0">mail to all staff</option>
                                    <option value="1">choose department</option>
                                    <option value="2">choose person</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="department" id="dept" class="form-control">
                                    <option value="">Choose Department</option>
                                    @foreach(App\Models\Department::all() as $department)
                                        <option value="{{$department->id}}">{{ucwords($department->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <select name="person" id="person" class="form-control">
                                    <option value="">Choose User</option>
                                    @foreach(App\Models\User::all() as $user)
                                        <option value="{{$user->id}}">{{ucwords($user->name)}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="">Body</label>
                                <textarea name="body" id="" placeholder="Write something here..." class="form-control  @error('body') is-invalid @enderror " rows="2"></textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">File</label>
                                <input type="file"  name="file" class="form-control @error('file') is-invalid @enderror " placeholder="">
                                @error('file')
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

    <style>
        #dept{
            display: none;
        }

        #person{
            display: none;
        }
    </style>

    <script>




        document.getElementById("mail").addEventListener('change', function (){
            if (this.value == "1"){
                document.getElementById("dept").style.display = "block";
                document.getElementById("person").style.display = "none";
            }else if (this.value == "2"){
                document.getElementById("person").style.display = "block";
                document.getElementById("dept").style.display = "none";
            }else{
                document.getElementById("dept").style.display = "none";
                document.getElementById("person").style.display = "none";
            }

        });
    </script>

@endsection

