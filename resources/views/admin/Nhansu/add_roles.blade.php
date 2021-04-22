@extends('layouts.app')
@section('content')
    
<div class="container">
<form action="{{route('role.new')}}" method="post">
    <div class="row justify-content-center">
        <div class="col-md-6">
         @csrf
            <div class="card">
                <div class="card-header">Roles</div>
                <div class="card-body">
                  <select name="role_id" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                   </select>
                </div>
                <div class="card">
                    <div class="card-header">Permissions</div>
                    <div class="card-body">
                       <ul>
                        @foreach($permissions as $permission)
                            <li><input type="checkbox" name="permissions[]" value="{{$permission->id}}" 
                                @if($role->permissions->contains($permission->id)) checked=checked @endif> {{$permission->name}}</li>
                        @endforeach
                       </ul>
                    </div>
                </div>
                <div class="card-footer"><input type="submit" class="btn btn-success" name="add_role" value="Add Roles"/></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                  Quản lý nhân sự
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Thêm</th>
                                            <th>Sửa</th>
                                            <th>Xem</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($roles as $role)
                                        <tr>
                                            <td name='role_id'>{{ $role->name }}</td>
                                            @foreach($permissions as $permission)
                                            <td><input type="checkbox" name="permissions[]" value="{{$permission->id}}" 
                                            @if($role->permissions->contains($permission->id)) checked=checked @endif> {{$permission->name}}
                                            @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                        {{-- <div class="modal fade" id="sua{{$role->id}}" tabindex="-1" role="dialog">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h2 class="modal-title" id='defaultModalLabel' style='text-align: center'>Sửa nhân sự</h2>
                                                  </div>
                                                  <div class="modal-body">
                                                      <form action="{{route('role.new')}}" method="post">
                                                          @csrf
                                                          <div name="role_id" class="form-group">
                                                              <label for="name">Tên nhân sự</label>
                                                              <input type="text" class="form-control" id="name" name="role_id" value="{{ $role->name }}" required />
                                                          </div>
                                                          @foreach($permissions as $permission)
                                                          <div class="form-group">
                                                            <input type="checkbox" name="permissions[]" value="{{$permission->id}}" 
                                                            @if($role->permissions->contains($permission->id)) checked=checked @endif> {{$permission->name}}
                                                        </div>
            
                                                        @endforeach
                                                  <div class="modal-footer">
                                                      <button type="submit" class="btn btn-link waves-effect">Lưu</button>
                                                      <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Đóng</button>
                                                  </div>
                                                  </form>
                                              </div>
                                          </div>
                                              
                                          </div>
                                        </div> --}}
                                              
                                          </div>
                                        </div>
                                    
                                    </tbody>
                                </table>
                                {{-- <button style='float: right; margin-right: 20px;' type="submit" class="btn btn-danger">Lưu</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
