@extends('admin.layouts.app')

@section('page-title')
	Update User
@endsection

@section('main-content')
	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Infomation
                </div>
                <div class="panel-body">
                	<form method="POST">
                		@csrf
                	<div class="form-group col-lg-12 text-center">
                 		<label for="firstnameEditUser" class="col-lg-2">First Name: </label>
                 		<input class="col-lg-4" name="firstnameEditUser" type="text" value="{{ $userInfo->first_name }}" autofocus>
                        @if ($errors->has('firstnameEditUser'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('firstnameEditUser') }}</strong>
                            </span>
                        @endif
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="lastnameEditUser" class="col-lg-2">Last Name: </label>
                 		<input class="col-lg-4" name="lastnameEditUser" type="text" value="{{ $userInfo->last_name }}">
                        @if ($errors->has('lastnameEditUser'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lastnameEditUser') }}</strong>
                            </span>
                        @endif
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="usernameEditUser" class="col-lg-2">Username: </label>
                 		<input class="col-lg-4" name="usernameEditUser" type="text" value="{{ $userInfo->username }}">
                        @if ($errors->has('usernameEditUser'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('usernameEditUser') }}</strong>
                            </span>
                        @endif
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="emailEditUser" class="col-lg-2">Email: </label>
                 		<input class="col-lg-4" name="emailEditUser" type="text" value="{{ $userInfo->email }}">
                        @if ($errors->has('emailEditUser'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('emailEditUser') }}</strong>
                            </span>
                        @endif 
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="phoneEditUser" class="col-lg-2">Phone: </label>
                 		<input class="col-lg-4" name="phoneEditUser" type="text" value="{{ $userInfo->phone }}">
                        @if ($errors->has('phoneEditUser'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phoneEditUser') }}</strong>
                            </span>
                        @endif 
                 	</div>
                    <div class="form-group col-lg-12 text-center">
                      <label for="sel1" class="col-lg-2">Select Role:</label>
                      <select class="col-lg-4" id="sel1" name="selectRoleEditUser">
                        <option value="0">Select Role</option>
                        @if($listRole->isEmpty())
                        @else
                            @foreach($listRole as $role)
                                @if($roleUserInfo == null)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @else
                                    @if($roleUserInfo->role_id == $role->id)
                                    <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                    @else
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                      </select>
                    </div>
                    <div class="form-group col-lg-12 text-center">
                        <label for="sel1" class="col-lg-2">Select Tenant:</label>
                        <select class="col-lg-4" id="sel1" name="selectTenantEditUser">
                            <option value="0">Select Tenant</option>
                            @if($listTenant->isEmpty())
                            @else
                                @foreach($listTenant as $tenant)
                                    @if($userInfo->tenant == $tenant->id)
                                        <option value="{{ $tenant->id }}" selected>{{ $tenant->name }}</option>
                                    @else
                                        <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="{{ route('getUser') }}" class="btn btn-danger">Cancel</a>   
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
                </form>
           	</div>
       	</div>
    </div>
@endsection