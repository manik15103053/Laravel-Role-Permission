@extends('backend.layouts.master');
@php
    $user = Auth::guard('admin')->user();
@endphp
@section('title')
    Admin Role
@endsection
@section('styles')
        <!-- Start datatable css -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection
    @section('content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Roles</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>All Roles</span></li>
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
                        <h4 class="header-title float-left">Role List</h4>
                        @if ($user->can('admin.create'))
                            <p class="float-right mb-2">
                                <a href="{{ route('role.create') }}" class="btn btn-info btn-xs text-white">Create new Role</a>
                            </p>
                        @endif
                        <div class="clearfix"></div>
                        @include('backend.layouts.partial.success-message')
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="5%">SI</th>
                                        <th width="10%">Name</th>
                                        <th width="60%">Permissions</th>
                                        @if ($user->can('admin.edit') || $user->can('admin.delete'))
                                            <th width="20%">Action</th>
                                        @endif


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $key=>$role)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $role->name}}</td>
                                            <td>
                                               @foreach ($role->permissions as $permission)
                                                    <span class="badge badge-info mr-1">
                                                        {{ $permission->name }}
                                                    </span>
                                               @endforeach
                                            </td>
                                            <td>
                                                @if ($user->can('admin.edit'))
                                                    <a href="{{ route('role.edit',$role->id) }}" class="btn btn-primary btn-xs text-white">Edit</a>
                                                @endif
                                                @if ($user->can('admin.delete'))
                                                        <a href="{{ route('role.delete',$role->id) }}" class="btn btn-danger btn-xs text-white">Delete</a>
                                                    @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
         // datatable active
    if ($('#dataTable').length) {
        $('#dataTable').DataTable({
            responsive: true
        });
    }
    </script>
    @endsection
