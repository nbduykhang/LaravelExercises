<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('getAdminDashboard') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi Management<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('getRole') }}">Role Management</a>
                            </li>
                            <li>
                                <a href="{{ route('getPermission') }}">Permission Management</a>
                            </li>
                            <li>
                                <a href="{{ route('getUser') }}">User Management</a>
                            </li>
                            <li>
                                <a href="{{ route('getTenant') }}">Tenant Management<!--<span class="fa arrow"></span>--></a>
                                <!--<ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>-->
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>