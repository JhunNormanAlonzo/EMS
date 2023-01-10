<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();

        return view('admin.user.create', compact(['roles', 'departments']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname'	=> 'required',
            'lastname' => 'required',
            'email'	=> 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
            'mobile_number'	=> 'required',
            'department_id' => 'required',
            'role_id'=> 'required',
            'designation' => 'required',
            'start_from' => 'required',
            'image'	=> 'required|mimes:jpeg,jpg,png'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')){

            $image = $request->image->hashName();
            $request->image->move(storage_path('app/public/profiles'), $image);
        }else{

            $image = 'default.png';
        }

        $data['name'] = $request->firstname." ".$request->lastname;
        $data['image'] = $image;
        $data['password'] = bcrypt($request->password);
        unset($data['firstname']);
        unset($data['lastname']);
//        dd($data);
        User::create($data);

        return redirect()->back()->with('message', 'Employee created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $departments = Department::all();
        return view('admin.user.edit', compact(['user', 'departments', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name'	=> 'required',
            'email'	=> 'required|string|email|max:255|unique:users,email,'.$id,
            'mobile_number'	=> 'required',
            'department_id' => 'required',
            'role_id'=> 'required',
            'designation' => 'required',
            'start_from' => 'required',
            'image'	=> 'mimes:jpeg,jpg,png'
        ]);


        $user = User::find($id);

        if ($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->move(storage_path('app/public/profiles'), $image);
        }else{
            $image = $user->image;
        }

        if ($request->password){
            $password = bcrypt($request->password);
        }else{
            $password = $user->password;
        }
        $data['image'] = $image;
        $data['password'] = $password;

        $user->update($data);

        return redirect()->back()->with('message', 'Employee updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('message', 'Employee deleted successfully!');
    }
}
