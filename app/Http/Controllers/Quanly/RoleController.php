<?php

namespace App\Http\Controllers\Quanly;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
  public function index()
{
    $roles = Role::all();
 
    $permissions = Permission::all();
    return View('admin.Nhansu.add_roles')->with(array('roles'=>$roles,'permissions'=>$permissions));
}
  public function store(Request $request)
    {        
        $role_id = $request->role_id;
        $role = Role::find($role_id);
        if(!empty($role)){
            $checkRole = Role::where('id',$role_id)->withCount('permissions')->get()->toArray();
            if($checkRole[0]['permissions_count']>0){
               $role->permissions()->detach();//delete all relationship in role_permission
            }
            $role->permissions()->attach($request->permissions);//add list permissions
            return redirect()->route('AddRole');
             
        }
        return redirect()->route('AddRole');
 
    }

}