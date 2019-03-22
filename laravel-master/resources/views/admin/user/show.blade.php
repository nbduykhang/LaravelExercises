@extends('admin.layouts.app')

@section('page-title')
	User Overview
@endsection

@section('main-content')
	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Information
                </div>
                <div class="panel-body">
                	<div class="form-group col-lg-12">
                 		<label class="col-lg-2 text-right">First Name: </label>
                 		<span>{{ $userInfo->first_name }}</span>
                 	</div>
                 	<div class="form-group col-lg-12">
                 		<label class="col-lg-2 text-right">Last Name: </label>
                 		<span>{{ $userInfo->last_name }}</span>
                 	</div>
                 	<div class="form-group col-lg-12">
                 		<label class="col-lg-2 text-right">Username: </label>
                 		<span>{{ $userInfo->username }}</span>
                 	</div>
                 	<div class="form-group col-lg-12">
                 		<label class="col-lg-2 text-right">Email: </label>
                 		<span>{{ $userInfo->email }}</span>
                 	</div>
                 	<div class="form-group col-lg-12">
                 		<label class="col-lg-2 text-right">Phone: </label>
                 		<span>{{ $userInfo->phone }}</span>
                 	</div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Status: </label>
                        @if($userInfo->status==1)
                            <span class="label label-success">Actived</span>
                        @else
                            <span class="label label-danger">Deactived</span>
                        @endif
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Created at: </label>
                        <span>{{ $userInfo->created_at }}</span>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Updated at: </label>
                        <span>{{ $userInfo->updated_at }}</span>
                    </div>
                </div>
           	</div>
       	</div>
    </div>
@endsection