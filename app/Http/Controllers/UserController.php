<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;


class UserController extends Controller
{
    public function getAllUsers(){
        $id = Session::get('userId');
        $users = User::all();
        
        $roles = Role::all();
        return view('users',['users'=>$users, 'roles'=>$roles, 'id'=>$id]);
    }
    public function addUser(Request $request): RedirectResponse
    {
 
        // $user = new User;
 
        // $user->roleId = $request->roleId;
        // $user->nip = $request->nip;
        // $user->password = $request->password;
        // $user->nama = $request->nama;
        // $user->ttl = $request->ttl;
        
        var_dump($request);
        // $user->save();
 
        // return redirect('/users');
    }
}
