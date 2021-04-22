<?php

namespace App\Http\Controllers\Quanly;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\User;

class UserController extends Controller
{
    public function index()
{
    $users = User::all();
    $roles = Role::all();
    return View('admin.Nhansu.add_roles_user')->with(array('users'=>$users,'roles'=>$roles));
}
public function store(Request $request)
{
     $role = Role::find($request->role_id);
     $role->users()->detach($request->users);
     $role->users()->attach($request->users);
     return redirect()->route('home');
}

}
