<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

     public function __construct()
    {
        $this->middleware('permission:view-user',['only' => 'index']);
        $this->middleware('permission:create-user',['only' => ['store','create']]);
        $this->middleware('permission:update-user',['only' => ['edit','update']]);
        $this->middleware('permission:delete-user',['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request->email,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'image' => $request->session()->get('image_name') != '' ? $request->session()->get('image_name') : '']);

        $roles_array = array();
        foreach($request->roles as $key=>$value)
        {
            $roles_array[] = $key;
        }



        if($user)
        {
            $request->session()->forget('image_name');
            $user->roles()->attach($roles_array);
            return back()->with('success','User has been added successfully');
        }
        else
        {
            return back()->with('warning','Please try again!!');
        }
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
    public function edit(User $user)
    {   
        $roles = Role::all();
        return view('backend.users.create',compact('user',
            'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
                if($user->email == $request->email)
        {
            $validation = 'required';
        }
        else
        {
            $validation = 'required|unique:users,email';
        }

         $request->validate(
            [
                'email' => $validation,
                'name'=>'required',
                'roles' => 'required'
            ]);
                // to get key name from roles array..!!!
            $roles = array();
              foreach ($request->roles as $key => $value) {
                $roles[] = "".$key."";
            } 


       // inserting user
       $user->name = $request->name;
       $user->email = $request->email ?? $user->email;
       $user->password = (isset($request->password)) ? bcrypt($request->password) : $user->password;
     
       $result = $user->update();

       if($result)
       {
        $user->roles()->detach();
        $user->roles()->attach($roles);

        activity()
       ->causedBy(auth()->user())
       ->performedOn($user)
       ->withProperties(['key' => $roles])
       ->log('assign role');

        return back()->with('success','User Updated Successfully');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();

        if($user->delete())
        {
            return back()->with('success','User has been deleted Sucessfully');
        }
    }


    public function uploadImage(Request $request){
        $files = $request->file('file');


            $ext = $files->getClientOriginalExtension();
            $originalName  = $files->getClientOriginalName();
            $name = 'users-'.$originalName;

            if(!Storage::disk('public')->exists('users'))
            {
                Storage::disk('public')->makeDirectory('/users');
            }

            $files->storeAs('/public/users',$name);
            $request->session()->put('image_name',$name);
            return response()->json(['name' => $name]);
    }
}
