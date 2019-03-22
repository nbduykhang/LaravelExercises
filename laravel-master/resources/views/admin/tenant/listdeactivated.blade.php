@extends('admin.layouts.app')

@section('page-title')
	List Deactivated Tenants
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
                                        <li><a href="{{ route('getCreateTenant') }}">Add new</a></li>
                                        <li><a href="{{ route('getTenantDeleted') }}">Deleted Tenants</a></li>
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
                                                    <th>Tenant</th>
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
                                                @for($i=0; $i < count($listTenant); $i++)
                                                    <tr class="gradeA">
                                                        <td>{{ $listTenant[$i]->id }}</td>
                                                        <td>{{ $listTenant[$i]->name }}</td>
                                                        <td>{{ $listTenant[$i]->subdomain }}</td>
                                                        <td>
                                                            @if($listTenant[$i]->enable==1)
                                                                <span class="label label-success">Enabled</span>
                                                            @else
                                                                <span class="label label-danger">Disabled</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($listTenant[$i]->theme == 0)
                                                                Default
                                                            @else
                                                                <?php $theme = DB::table('themes')->find($listTenant[$i]->theme);
                                                                      echo $theme->name;
                                                                ?>
                                                            @endif
                                                        </td>
                                                        <td>{{ $listTenant[$i]->created_at }}</td>
                                                        <td>{{ $listTenant[$i]->updated_at }}</td>
                                                        <td>
                                                            <a href="{{ route('getShowTenant',['id'=>$listTenant[$i]->id]) }}" class="text-primary"><i class="fa fa-eye"></i></a>
                                                            <a href="{{ route('getEditTenant',['id'=>$listTenant[$i]->id]) }}" class="text-warning"><i class="fa fa-edit"></i></a> 
                                                            <a href="{{ route('getDeleteTenant',['id'=>$listTenant[$i]->id]) }}" class="text-danger"><i class="fa fa-trash"></i></a>
                                                            <a href="{{ route('getActiveTenant',['id'=>$listTenant[$i]->id]) }}" class="text-success"><i class="fa fa-check-circle"></i></a>
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