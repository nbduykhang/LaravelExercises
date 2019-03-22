@extends('admin.layouts.app')

@section('page-title')
	Update Tenant
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
                 	<div class="form-group row">
                 		<label for="nameEditTenant" class="col-md-4 col-form-label text-right">Name: </label>
                        <div class="col-md-6">
                 		<input class="form-control" name="nameEditTenant" type="text" value="{{ $tenantInfo->name }}">
                            @if ($errors->has('nameEditTenant'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nameEditTenant') }}</strong>
                                </span>
                            @endif
                        </div>
                 	</div>
                 	<div class="form-group row">
                 		<label for="subdomainEditTenant" class="col-md-4 col-form-label text-right">Subdomain: </label>
                        <div class="col-md-6">
                     		<input class="form-control" name="subdomainEditTenant" type="text" value="{{ $tenantInfo->subdomain }}">
                            @if ($errors->has('subdomainEditTenant'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('subdomainEditTenant') }}</strong>
                                </span>
                            @endif
                        </div>
                 	</div>
                 	<div class="form-group row">
                        <label for="selectThemeEditTenant" class="col-md-4 col-form-label text-right">Select Theme:</label>
                        <div class="col-md-6">
                            <select id="sel1" name="selectThemeEditTenant" class="form-control">
                                <option value="0">Default</option>
                                    @if($listTheme->isEmpty())
                                    @else
                                        @foreach($listTheme as $theme)
                                            <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                                        @endforeach
                                    @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                     <a href="{{ route('getTenant') }}" class="btn btn-danger">Cancel</a>
                     <button class="btn btn-primary" type="submit">Update</button>
                </div>
                </form>
           	</div>
       	</div>
    </div>
@endsection
