@extends('admin.layouts.app')

@section('page-title')
	User Management
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
                                        <li><a href="{{ route('getCreateUser') }}">Add new</a></li>
                                        <li><a href="{{ route('getDeactivatedUser') }}">Deactivated Users</a></li>
                                        <li><a href="{{ route('getUserDeleted') }}">Deleted Users</a></li>
                                      </ul>
                                    </div>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>E-mail</th>
                                                    <th>Status</th>
                                                    <th>Role</th>
                                                    <th>Tenant</th>
                                                    <th>Created</th>
                                                    <th>Last Updated</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($listUser->isEmpty() || $listRoleUser==null)
                                                No Records
                                            @else    
                                                @for($i=0; $i < count($listUser); $i++)
                                                    <tr class="gradeA">
                                                        <td>{{ $listUser[$i]->first_name }}</td>
                                                        <td>{{ $listUser[$i]->last_name }}</td>
                                                        <td>{{ $listUser[$i]->email }}</td>
                                                        <td>
                                                            @if($listUser[$i]->status==1)
                                                                <span class="label label-success">Actived</span>
                                                            @else
                                                                <span class="label label-danger">Deactived</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $listRoleUser[$i] }}</td>
                                                        <td>{{ $listTenantUser[$i] }}</td>
                                                        <td>{{ $listUser[$i]->created_at }}</td>
                                                        <td>{{ $listUser[$i]->updated_at }}</td>
                                                        <td>
                                                            <a href="{{ route('getShowUser',['id'=>$listUser[$i]->id]) }}" class="text-primary"><i class="fa fa-eye"></i></a>
                                                            <a href="{{ route('getEditUser',['id'=>$listUser[$i]->id]) }}" class="text-warning"><i class="fa fa-edit"></i></a>
                                                            @if(Auth::user()->id != $listUser[$i]->id)
                                                            <a href="{{ route('getDeleteUser',['id'=>$listUser[$i]->id]) }}" class="text-danger"><i class="fa fa-trash"></i></a>
                                                            <a href="{{ route('getDeactiveUser',['id'=>$listUser[$i]->id]) }}" class="text-danger"><i class="fa fa-power-off"></i></a>
                                                            <!--<a href="" class="text-danger"><i class="fa fa-sign-in"></i></a>-->
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endfor
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