@extends('admin.layouts.app')

@section('page-title')
	Change Password
@endsection

@section('main-content')
	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Change Password
                </div>
                <div class="panel-body">
                    <form method="POST">
                        @csrf
                	<div class="form-group col-lg-12 text-center">
                 		<label for="userOldpass" class="col-lg-2">Old Password: </label>
                 		<input class="col-lg-4" name="userOldpass" type="password">
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="userNewpass" class="col-lg-2">New Password: </label>
                 		<input class="col-lg-4" name="userNewpass" type="password">
                 	</div>
                 	<div class="form-group col-lg-12 text-center">
                 		<label for="userConfirmNewpass" class="col-lg-2">Confirm Password: </label>
                 		<input class="col-lg-4" name="userConfirmNewpass" type="password">
                 	</div>
                </div>
                <div class="panel-footer">
                     <button class="btn btn-primary" type="submit">Save Change</button>
                </div>
                </form>
           	</div>
       	</div>
    </div>
@endsection