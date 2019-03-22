@extends('admin.layouts.app')

@section('page-title')
	Tenant Management
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
                                        <li><a href="{{ route('getCreateTenant') }}">Create Tenant</a></li>
                                        <li><a href="{{ route('getDeactivatedTenant') }}">List Deactivated Tenants</a></li>
                                        <li><a href="{{ route('getTenantDeleted') }}">List Deleted Tenants</a></li>
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
                                                    <th>Name</th>
                                                    <th>Subdomain</th>
                                                    <th>Enable</th>
                                                    <th>Theme</th>
                                                    <th>Created</th>
                                                    <th>Last Updated</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($listTenant->isEmpty())
                                                    No Records
                                                @else
                                                    @foreach($listTenant as $tenant)
                                                    <tr class="gradeA">
                                                        <td>{{ $tenant->id }}</td>
                                                        <td>{{ $tenant->name }}</td>
                                                        <td>{{ $tenant->subdomain }}</td>
                                                        <td>
                                                            @if($tenant->enable == 1)
                                                            <span class="label label-success">Enabled</span>
                                                            @else
                                                            <span class="label label-danger">Disabled</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($tenant->theme == null)
                                                                Default
                                                            @else
                                                                <?php $theme = DB::table('themes')->find($tenant->theme);
                                                                      echo $theme->name;
                                                                     ?>
                                                            @endif
                                                        </td>
                                                        <td>{{ $tenant->created_at }}</td>
                                                        <td>{{ $tenant->updated_at }}</td>
                                                        <td>
                                                            <a href="{{ route('getShowTenant',['id'=>$tenant->id]) }}" class="text-primary"><i class="fa fa-eye"></i></a>
                                                            <a href="{{ route('getEditTenant',['id'=>$tenant->id]) }}" class="text-warning"><i class="fa fa-edit"></i></a> 
                                                            <a href="{{ route('getDeleteTenant',['id'=>$tenant->id]) }}" class="text-danger"><i class="fa fa-trash"></i></a>
                                                            <a href="{{ route('getDeactiveTenant',['id'=>$tenant->id]) }}" class="text-danger"><i class="fa fa-power-off"></i></a>
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