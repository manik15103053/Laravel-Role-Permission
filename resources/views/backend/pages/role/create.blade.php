@extends('backend.layouts.master');
@section('title')
    Admin Role Create
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
                        <h4 class="header-title">Create New Role</h4>
                        @include('backend.layouts.partial.message')
                        <form method="POST" action="{{ route('role.store') }}">
                            @csrf
                            <div class="form-group col-md-7">
                                <label for="name">Role name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="name">Permissions</label>
                                @foreach($permissions as $key=>$permission)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->name }}" value="{{ $permission->name }}">
                                        <label class="form-check-label" for="checkPermission{{ $permission->name }}">{{ $permission->name }}</label>
                                    </div>
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

@endsection
