@extends('admin.layouts.app')

@section('page-title')
	List Deleted Roles
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
                                        <li><a href="{{ route('getRestoreAllRoleDeleted') }}">Restore All</a></li>
                                      </ul>
                                    </div>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Role</th>
                                                    <th>Sort</th>
                                                    <th>Created</th>
                                                    <th>Deleted</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($listRoleDeleted->isEmpty())
                                                    No Records
                                                @else
                                                    @for ($i = 0; $i < count($listRoleDeleted); $i++)
                                                    <tr class="gradeA">
                                                        <td>{{ $listRoleDeleted[$i]->name }}</td>
                                                        <td>{{ $listRoleDeleted[$i]->sort }}</td>
                                                        <td>{{ $listRoleDeleted[$i]->created_at }}</td>
                                                        <td>{{ $listRoleDeleted[$i]->deleted_at }}</td>
                                                        <td>
                                                            <a href="{{ route('getRestoreRoleDeleted',['id'=>$listRoleDeleted[$i]->id]) }}" class="text-warning"><i class="fa fa-undo"></i> Restore</a>
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