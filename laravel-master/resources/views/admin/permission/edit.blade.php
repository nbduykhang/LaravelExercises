@extends('admin.layouts.app')

@section('page-title')
	Update Permission
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
                 		<label for="namePermission" class="col-lg-2">Username: </label>
                 		<input class="col-lg-4" name="nameEditPermission" type="text" value="{{ $permission->name }}">
                        @if ($errors->has('nameEditPermission'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nameEditPermission') }}</strong>
                            </span>
                        @endif
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="displayNamePermission" class="col-lg-2">Display Name: </label>
                 		<input class="col-lg-4" name="displaynameEditPermission" type="text" value="{{ $permission->display_name }}">
                        @if ($errors->has('displaynameEditPermission'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('displaynameEditPermission') }}</strong>
                            </span>
                        @endif 
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="sortPermission" class="col-lg-2">Sort: </label>
                 		<input class="col-lg-4" name="sortEditPermission" type="text" value="{{ $permission->sort }}">
                        @if ($errors->has('sortEditPermission'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('sortEditPermission') }}</strong>
                            </span>
                        @endif 
                 	</div>
                </div>
                <div class="panel-footer">
                     <a href="{{ route('getPermission') }}" class="btn btn-danger">Cancel</a>
                     <button class="btn btn-primary" type="submit">Update</button>
                </div>
                </form>
           	</div>
       	</div>
    </div>
@endsection