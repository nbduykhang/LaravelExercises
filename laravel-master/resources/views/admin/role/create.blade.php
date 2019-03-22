@extends('admin.layouts.app')

@section('page-title')
    Create Role
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
                            <label for="nameRole" class="col-md-4 col-form-label text-md-right">Role Name</label>

                            <div class="col-md-6">
                                <input id="nameRole" type="text" class="form-control" name="nameCreateRole" required autofocus>

                                @if ($errors->has('nameCreateRole'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nameCreateRole') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="chkAllPermissionCreateRole" class="col-md-4 col-form-label text-md-right">All Permission</label>
                            <div class="col-md-1 text-left">
                                <input name="chkAllPermissionCreateRole" type="checkbox" value="true">
                            </div><!--col-lg-1-->
                        </div>

                        <div class="form-group row">
                            <label for="selectPermissionCreateRole" class="col-md-4 col-form-label text-md-right">Select Permission</label>
                            <div class="col-md-6">
                              <select id="sel1" name="selectPermissionCreateRole" class="form-control">
                                <option value="0">Default</option>
                                @foreach($listPermission as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sortCreateRole" class="col-md-4 col-form-label text-md-right">Sort</label>

                            <div class="col-md-6">
                                <input id="sortCreateRole" type="text" class="form-control" name="sortCreateRole" required autofocus>

                                @if ($errors->has('sortCreateRole'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sortCreateRole') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="chkActiveCreateRole" class="col-md-4 col-form-label text-md-right">Active</label>
                            <div class="col-md-1 text-left">
                                <input name="chkActiveCreateRole" type="checkbox" value="1">
                            </div><!--col-lg-1-->
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-6 text-center">
                                <a href="{{ route('getRole') }}" type="submit" class="btn btn-danger">
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