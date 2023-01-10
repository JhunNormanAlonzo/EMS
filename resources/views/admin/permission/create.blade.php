@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <form action="{{route('permissions.store')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">{{ __('Permission') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label for="" class="text-muted">Check All</label>
                                        <input type="checkbox" id="check_all">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" id="">
                                    <option value="">Choose Permission</option>
                                    @foreach(\App\Models\Role::all() as $role)
                                        <option value="{{$role->id}}">{{ucwords($role->name)}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @php
                                    $modules = \App\Models\Module::all();
                                @endphp
                                <table class="table table-dark mt-3 table-striped" id="">
                                    <thead>
                                    <th>permission</th>
                                    <th>can-add</th>
                                    <th>can-edit</th>
                                    <th>can-delete</th>
                                    <th>can-view</th>
                                    <th>can-list</th>
                                    </thead>
                                    <tbody>
                                    @foreach($modules as $module)
                                        <tr>
                                            <td>{{ucwords($module->name)}}</td>
                                            <td><input type="checkbox" name="name[{{$module->name}}][can-add]"></td>
                                            <td><input type="checkbox" name="name[{{$module->name}}][can-edit]"></td>
                                            <td><input type="checkbox" name="name[{{$module->name}}][can-delete]"></td>
                                            <td><input type="checkbox" name="name[{{$module->name}}][can-view]"></td>
                                            <td><input type="checkbox" name="name[{{$module->name}}][can-list]"></td>



                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script>

        document.querySelector("input[id=check_all]").addEventListener("click", function (){
            var checkboxes = document.querySelectorAll('input[type=checkbox]');
            if (this.checked){
                for (var i in checkboxes){
                    checkboxes[i].checked = true;
                }

            }else{
                for (var i in checkboxes){
                    checkboxes[i].checked = false;
                }
            }
        });
    </script>

@endsection


