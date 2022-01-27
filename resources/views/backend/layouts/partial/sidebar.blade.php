<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="{{ asset('admin/backend/assets') }}/images/icon/logo.png" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse {{ Route::is('admin.dashboard') ? 'in' : '' }}">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    <li class="{{ Route::is('roles') || Route::is('role.create') || Route::is('role.edit') || Route::is('role.show') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                                Roles & Permission
                            </span></a>
                        <ul class="collapse {{ Route::is('roles') || Route::is('role.create') || Route::is('role.edit') || Route::is('role.show') ? 'in' : '' }}">
                            <li class="{{ Route::is('roles') ? 'active' : '' }}"><a href="{{ route('roles') }}">All Roles</a></li>
                            <li class="{{ Route::is('role.create') ||  Route::is('role.edit') ? 'active' : '' }}"><a href="{{ route('role.create') }}">Create Role</a></li>
                        </ul>
                    </li>
                    <li class="{{ Route::is('users') || Route::is('user.create') || Route::is('user.edit') || Route::is('user.show') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                User
                            </span></a>
                        <ul class="collapse {{ Route::is('users') || Route::is('user.create') || Route::is('user.edit') || Route::is('user.show') ? 'in' : '' }}">
                            <li class="{{ Route::is('users') ? 'active' : '' }}"><a href="{{ route('users') }}">All Roles</a></li>
                            <li class="{{ Route::is('user.create') ||  Route::is('user.edit') ? 'active' : '' }}"><a href="{{ route('user.create') }}">Create Role</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
