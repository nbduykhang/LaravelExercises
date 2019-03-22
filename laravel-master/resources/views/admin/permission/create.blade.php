@extends('admin.layouts.app')

@section('page-title')
    Create Permission
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
                                <input id="name-permission" type="text" class="form-control" name="nameCreatePermission" required autofocus>

                                @if ($errors->has('nameCreatePermission'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nameCreatePermission') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="displayname-permission" class="col-md-4 col-form-label text-md-right">Display Name</label>

                            <div class="col-md-6">
                                <input id="last-name" type="text" class="form-control" name="displaynameCreatePermission" required autofocus>

                                @if ($errors->has('displaynameCreatePermission'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('displaynameCreatePermission') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sortCreatePermission" class="col-md-4 col-form-label text-md-right">Sort</label>

                            <div class="col-md-6">
                                <input id="sortCreatePermission" type="text" class="form-control" name="sortCreatePermission" required autofocus>

                                @if ($errors->has('sortCreatePermission'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sortCreatePermission') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-6 text-center">
                                <a href="{{ route('getPermission') }}" class="btn btn-danger">
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