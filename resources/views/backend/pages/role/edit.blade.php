@extends('backend.layouts.master');
@section('title')
    Admin Role Edit
@endsection
@section('styles')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
@endsection
@section('content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Role Edit - {{ $role->name }}</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('roles') }}">All Roles</a></li>
                        <li><span>Edit Role</span></li>
                    </ul>
                </div>
            </div>
            @include('backend.layouts.partial.logout')
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Edit Role</h4>
                        @include('backend.layouts.partial.message')
                        <form method="POST" action="{{ route('role.store') }}">
                            @csrf
                            <div class="form-group col-md-7">
                                <label for="name">Role name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $role->name }}">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="name">Permissions</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"  id="checkPermissionAll" value="1">
                                    <label class="form-check-label" for="checkPermissionAll">All</label>
                                </div>
                                <hr>
                                @php $i = 1; @endphp
                                @foreach ($permission_group as $group)
                                    <div class="row">
                                        @php
                                            $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                            $j = 1;
                                        @endphp
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\User::roleHasPermissions($role ,$permissions) ? 'checked' : ''}}>
                                                <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                            </div>
                                        </div>

                                        <div class="col-9 role-{{ $i }}-management-checkbox">
                                            @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]"{{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                    <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                                @php  $j++; @endphp
                                            @endforeach
                                            <br>
                                        </div>

                                    </div>
                                    @php  $i++; @endphp
                                @endforeach

                            </div>
                            <div class="form-group col-md-7">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('backend.pages.partial.scripts')
@endsection
