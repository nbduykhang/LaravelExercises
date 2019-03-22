@extends('admin.layouts.app')

@section('page-title')
	Tenant Information
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
                 		<span>{{ $tenantInfo->name }}</span>
                 	</div>
                 	<div class="form-group col-lg-12">
                 		<label class="col-lg-2 text-right">Sort: </label>
                 		<span>{{ $tenantInfo->subdomain }}</span>
                 	</div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Enable: </label>
                        @if($tenantInfo->enable==1)
                            <span class="label label-success">Enabled</span>
                        @else
                            <span class="label label-danger">Disabled</span>
                        @endif
                    </div>
                     <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Theme: </label>
                        <span>@if($tenantInfo->theme == 0)
                                Default
                              @endif
                        </span>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Created by: </label>
                        <span>{{ $createUserInfo->username }}</span>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Updated by: </label>
                        @if($updateUserInfo->updated_by == null)
                        @else
                            <span>{{ $updateUserInfo->username }}</span>
                        @endif
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Created at: </label>
                        <span>{{ $tenantInfo->created_at }}</span>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2 text-right">Updated at: </label>
                        <span>{{ $tenantInfo->updated_at }}</span>
                    </div>
                </div>
           	</div>
       	</div>
    </div>
@endsection