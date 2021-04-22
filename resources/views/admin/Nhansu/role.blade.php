@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="{{route('role')}}" class="btn btn-success">Add Role</a>
            <a href="{{route('user')}}" class="btn btn-primary">Add User Role</a>
            <div class="card">
                <div class="card-header">Roles</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Roles</th>
                                <th>Permissions</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>
                                    @if(count($role->permissions)>0)
                                        @foreach($role->permissions as $permission)
                                             <span class="badge badge-success">{{$permission->name}}</span>
                                        @endforeach
                                    @else
                                        <span class="badge badge-danger">No permission</span>
                                    @endif
                                </td>
                                <td>
                                    <ul>
                                    @if(count($role->users)>0)
                                        @foreach($role->users as $user)
                                             <li class="badge badge-success">{{$user->name}}</li>
                                        @endforeach
                                    @else
                                        <li class="badge badge-danger">No user</li>
                                    @endif
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Group</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                 
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        
                                    @if(count($user->roles)>0)
                                        @foreach($user->roles as $role)
                                            <span class="badge  badge-success">{{$role->name}}</span>
                                        @endforeach
                                    @else
                                        <span class="badge badge-danger">No role</span>
                                    @endif 
                                    </td>
                                    <td>
                                    @if(count($user->groups)>0)
                                        @foreach($user->groups as $group)
                                           <span class="badge  badge-primary">{{$group->name}}</span>
                                        @endforeach
                                    @else
                                        <span class="badge badge-danger">No group</span>
                                    @endif
                                    </td>
                                    <td><a href="" class="badge badge-warning">Edit</a></td>
                                    <td><a href="" class="badge badge-danger">Delete</a></td>
                                </tr>
 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
