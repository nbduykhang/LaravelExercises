@extends('admin.layouts.app')

@section('page-title')
	Role Information
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
                 		<label class="col-lg-2 text-right">Name: </label>
                 		<span>{{ $roleInfo->name }}</span>
                 	</div>
                 	<div class="form-group col-lg-12">
                 		<label class="col-lg-2 text-right">Sort: </label>
                 		<span>{{ $roleInfo->sort }}</span>
                 	</div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Status: </label>
                        @if($roleInfo->status==1)
                            <span class="label label-success">Actived</span>
                        @else
                            <span class="label label-danger">Deactived</span>
                        @endif
                    </div>
                     <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Permission: </label>
                        @foreach($listRolePermission as $rolePermission)
                            <span><?php $permission = DB::table('permissions')->find($rolePermission->permission_id);
                                        echo $permission->name; ?> / </span>
                        @endforeach
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Created at: </label>
                        <span>{{ $roleInfo->created_at }}</span>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Updated at: </label>
                        <span>{{ $roleInfo->updated_at }}</span>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Created by: </label>
                        <span>{{ $userCreate->username }}</span>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Updated by: </label>
                        @if($userUpdate == null)
                        @else
                            <span>{{ $userUpdate->username }}</span>
                        @endif
                    </div>
                </div>
           	</div>
       	</div>
    </div>
@endsection