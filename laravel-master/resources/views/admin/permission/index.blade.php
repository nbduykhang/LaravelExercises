@extends('admin.layouts.app')

@section('page-title')
	Permission Management
@endsection

@section('main-content')
	 <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    DataTables Advanced Tables
                                    <div class="btn-group" style="float: right;">
                                      <button type="button" class="btn btn-primary">Action</button>
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('getCreatePermission') }}">Create Permission</a></li>
                                        <li><a href="{{ route('getPermissionDeleted') }}">List Deleted Permissions</a></li>
                                      </ul>
                                    </div>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Permission</th>
                                                    <th>Display Name</th>
                                                    <th>Sort</th>
                                                    <th>Created</th>
                                                    <th>Last Updated</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($listPermission->isEmpty())
                                                    No Records
                                                @else
                                                    @foreach($listPermission as $permission)
                                                    <tr class="gradeA">
                                                        <td>{{ $permission->id }}</td>
                                                        <td>{{ $permission->name }}</td>
                                                        <td>{{ $permission->display_name }}</td>
                                                        <td>{{ $permission->sort }}</td>
                                                        <td>{{ $permission->created_at }}</td>
                                                        <td>{{ $permission->updated_at }}</td>
                                                        <td>
                                                            <a href="{{ route('getEditPermission',['id'=>$permission->id]) }}" class="text-warning"><i class="fa fa-edit"></i></a> 
                                                            <a href="{{ route('getDeletePermission',['id'=>$permission->id]) }}" class="text-danger"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
@endsection