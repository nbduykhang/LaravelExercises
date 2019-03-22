@extends('admin.layouts.app')

@section('page-title')
	Update Role
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
                 		<label for="nameEditRole" class="col-lg-2">Name: </label>
                 		<input class="col-lg-4" name="nameEditRole" type="text" value="{{ $role->name }}" autofocus>
                        @if ($errors->has('nameEditRole'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nameEditRole') }}</strong>
                            </span>
                        @endif
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="sortEditRole" class="col-lg-2">Sort: </label>
                 		<input class="col-lg-4" name="sortEditRole" type="text" value="{{ $role->sort }}">
                        @if ($errors->has('sortEditRole'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('sortEditRole') }}</strong>
                            </span>
                        @endif
                 	</div>
                </div>
                <div class="panel-footer">
                    <a href="{{ route('getRole') }}" class="btn btn-danger">Cancel</a>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
                </form>
           	</div>
       	</div>
    </div>
@endsection