@extends('admin.layouts.app')

@section('page-title')
    Create Tenant
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
                            <label for="name-permission" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name-permission" type="text" class="form-control" name="nameCreateTenant" required autofocus>

                                @if ($errors->has('nameCreateTenant'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nameCreateTenant') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subdomainCreateTenant" class="col-md-4 col-form-label text-md-right">Subdomain</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="subdomainCreateTenant" required autofocus>

                                @if ($errors->has('subdomainCreateTenant'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subdomainCreateTenant') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="selectThemeCreateTenant" class="col-md-4 col-form-label text-md-right">Select Theme:</label>
                            <div class="col-md-6">
                                <select id="sel1" name="selectThemeCreateTenant" class="form-control">
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

                        <div class="form-group row">
                            <label for="chkEnableCreateTenant" class="col-md-4 col-form-label text-md-right">Enable</label>
                            <div class="col-md-1 text-left">
                                <input name="chkEnableCreateTenant" type="checkbox" value="1">
                            </div><!--col-lg-1-->
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-6 text-center">
                                <a href="{{ route('getTenant') }}" class="btn btn-danger">
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