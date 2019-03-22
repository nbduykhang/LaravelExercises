@extends('admin.layouts.app')

@section('page-title')
	Profile
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
                 		<label for="firstnameProfile" class="col-lg-2">First Name: </label>
                 		<input class="col-lg-4" name="firstnameProfile" type="text" value="{{ Auth::user()->first_name }}" autofocus>
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="lastnameProfile" class="col-lg-2">Last Name: </label>
                 		<input class="col-lg-4" name="lastnameProfile" type="text" value="{{ Auth::user()->last_name }}">
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="usernameProfile" class="col-lg-2">Username: </label>
                 		<input class="col-lg-4" name="usernameProfile" type="text" value="{{ Auth::user()->username }}">
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="emailProfile" class="col-lg-2">Email: </label>
                 		<input class="col-lg-4" name="emailProfile" type="text" value="{{ Auth::user()->email }}" disabled> 
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="phoneProfile" class="col-lg-2">Phone: </label>
                 		<input class="col-lg-4" name="phoneProfile" type="text" value="{{ Auth::user()->phone }}">
                 	</div>
                </div>
                <div class="panel-footer">
                     <button class="btn btn-primary" type="submit">Edit Profile</button>
                </div>
                </form>
           	</div>
       	</div>
    </div>
@endsection