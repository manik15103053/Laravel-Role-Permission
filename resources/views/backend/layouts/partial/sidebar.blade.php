
<div class="sidebar-menu">
    @php
        $user = Auth::guard('admin')->user();
    @endphp
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">Admin</h2>
            </a>
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
{{--                    @if ($user->can('role.view') || $user->can('admin.create'))--}}
                        <li class="{{ Route::is('roles') || Route::is('role.create') || Route::is('role.edit') || Route::is('role.show') ? 'active' : '' }}">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                                Roles & Permission
                            </span></a>
                            <ul class="collapse {{ Route::is('roles') || Route::is('role.create') || Route::is('role.edit') || Route::is('role.show') ? 'in' : '' }}">
{{--                                @if ($user->can('admin.view'))--}}
                                    <li class="{{ Route::is('roles') ? 'active' : '' }}"><a href="{{ route('roles') }}">All Roles</a></li>
{{--                                @endif--}}
{{--                                @if ($user->can('admin.create'))--}}
                                        <li class="{{ Route::is('role.create') ||  Route::is('role.edit') ? 'active' : '' }}"><a href="{{ route('role.create') }}">Create Role</a></li>
{{--                                    @endif--}}
                            </ul>
                        </li>
{{--                    @endif--}}

{{--                    @if ($user->can('admin.view') || $user->can('admin.create'))--}}
                        <li class="{{ Route::is('admins') || Route::is('admin.create') || Route::is('admin.edit') || Route::is('admin.show') ? 'active' : '' }}">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                Admin
                            </span></a>
                            <ul class="collapse {{ Route::is('admins') || Route::is('admin.create') || Route::is('admin.edit') || Route::is('admin.show') ? 'in' : '' }}">
{{--                                @if ($user->can('admin.view'))--}}
                                    <li class="{{ Route::is('admins') ? 'active' : '' }}"><a href="{{ route('admins') }}">All Admin</a></li>
{{--                                @endif--}}
{{--                                @if ($user->can('admin.create'))--}}
                                        <li class="{{ Route::is('admin.create') ||  Route::is('admin.edit') ? 'active' : '' }}"><a href="{{ route('admin.create') }}">Create Admin</a></li>
{{--                                    @endif--}}
                            </ul>
                        </li>
{{--                    @endif--}}
                    <li class="{{ Route::is('categories') || Route::is('admin.create') || Route::is('admin.edit') || Route::is('admin.show') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                Category
                            </span></a>
                        <ul class="collapse {{ Route::is('admins') || Route::is('admin.create') || Route::is('admin.edit') || Route::is('admin.show') ? 'in' : '' }}">
                            {{--                                @if ($user->can('admin.view'))--}}
                            <li class="{{ Route::is('admins') ? 'active' : '' }}"><a href="{{ route('categories') }}">All Admin</a></li>
                            {{--                                @endif--}}
                            {{--                                @if ($user->can('admin.create'))--}}
                            {{--                                    @endif--}}
                        </ul>
                    </li>
                    <li class="{{ Route::is('categories') || Route::is('admin.create') || Route::is('admin.edit') || Route::is('admin.show') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                Post
                            </span></a>
                        <ul class="collapse {{ Route::is('posts') || Route::is('admin.create') || Route::is('admin.edit') || Route::is('admin.show') ? 'in' : '' }}">
                            {{--                                @if ($user->can('admin.view'))--}}
                            <li class="{{ Route::is('posts') ? 'active' : '' }}"><a href="{{ route('posts') }}">All Post</a></li>
                            {{--                                @endif--}}
                            {{--                                @if ($user->can('admin.create'))--}}
                            {{--                                    @endif--}}
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
