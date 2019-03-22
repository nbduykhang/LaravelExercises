@extends('admin.layouts.app')

@section('page-title')
	List Deleted Users
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
                                        <li><a href="{{ route('getRestoreAllUserDeleted') }}">Restore All</a></li>
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
                                                    <th>Created</th>
                                                    <th>Deleted</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($listUserDeleted->isEmpty() || $listRoleUserDeleted==null)
                                                No Records
                                            @else    
                                                @for($i=0; $i < count($listUserDeleted); $i++)
                                                    <tr class="gradeA">
                                                        <td>{{ $listUserDeleted[$i]->first_name }}</td>
                                                        <td>{{ $listUserDeleted[$i]->last_name }}</td>
                                                        <td>{{ $listUserDeleted[$i]->email }}</td>
                                                        <td>
                                                            @if($listUserDeleted[$i]->status==1)
                                                                <span class="label label-success">Actived</span>
                                                            @else
                                                                <span class="label label-danger">Deactived</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $listRoleUserDeleted[$i] }}</td>
                                                        <td>{{ $listUserDeleted[$i]->created_at }}</td>
                                                        <td>{{ $listUserDeleted[$i]->deleted_at }}</td>
                                                        <td>
                                                            <a href="{{ route('getRestoreUserDeleted',['id'=>$listUserDeleted[$i]->id]) }}" class="text-warning"><i class="fa fa-undo"></i> Restore</a>
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