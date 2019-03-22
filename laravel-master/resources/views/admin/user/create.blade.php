@extends('admin.layouts.app')

@section('page-title')
	Create User
@endsection

@section('main-content')
	<div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-right">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group row">
                            <label for="first-name" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input id="first-name" type="text" class="form-control" name="firstnameCreateUser" required autofocus>

                                @if ($errors->has('firstnameCreateUser'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstnameCreateUser') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last-name" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="last-name" type="text" class="form-control" name="lastnameCreateUser" required autofocus>

                                @if ($errors->has('lastnameCreateUser'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastnameCreateUser') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="usernameCreateUser" required autofocus>

                                @if ($errors->has('usernameCreateUser'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usernameCreateUser') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="emailCreateUser"required>

                                @if ($errors->has('emailCreateUser'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emailCreateUser') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phoneCreateUser" required autofocus>

                                @if ($errors->has('phoneCreateUser'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phoneCreateUser') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                          <label for="selectTenantCreateUser" class="col-md-4 col-form-label text-md-right">Select Tenant:</label>
                          <div class="col-md-6">
                              <select class="form-control" name="selectTenantCreateUser">
                                <option value="0">Select Tenant</option>
                                @if($listTenant->isEmpty())
                                @else
                                    @foreach($listTenant as $tenant)
                                        <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                                    @endforeach
                                @endif
                              </select>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="passwordCreateUser" required>

                                @if ($errors->has('passwordCreateUser'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('passwordCreateUser') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="repasswordCreateUser" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="chkActiveCreateUser" class="col-md-4 col-form-label text-md-right">Active</label>
                            <div class="col-md-1 text-left">
                                <input name="chkActiveCreateUser" type="checkbox" value="1">
                            </div><!--col-lg-1-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Associated Roles</label>
                            <div class="col-md-1">
                                @if($listRole->isEmpty())
                                    Not Available
                                @else
                                    @foreach($listRole as $role)
                                    <div class="radio-inline text-left">
                                      <label><input type="radio" name="optradioRoleUser" value="{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-6 text-center">
                                <a href="{{ route('getUser') }}" class="btn btn-danger">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection