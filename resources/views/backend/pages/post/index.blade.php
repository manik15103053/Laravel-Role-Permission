@extends('backend.layouts.master');
@section('title')
    Admin
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
                        <li><span>All Category</span></li>
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
                        <h4 class="header-title float-left">Post List</h4>
                        <p class="float-right mb-2">
                            <a href="{{ route('post.create') }}" class="btn btn-info btn-xs text-white">Create new Post</a>
                        </p>
                        @include('backend.layouts.partial.success-message')
                        <div class="clearfix"></div>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase bg-success">
                                        <tr class="text-white">
                                            <th scope="col">ID</th>
                                            <th scope="col">Post</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users->posts as $key=>$post)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $post->name}}</td>
                                            <td>{{ $post->category->name}}</td>
                                            <td>{{ $post->description}}</td>
                                            <td>
                                                @if ($post->status == true)
                                                    <span style="background-color: green; color:wheat">Active</span>
                                                 @else
                                                    <span style="background-color: red; color:wheat">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $post->created_at}}</td>

                                            <td>
                                                <a href="" class="btn btn-outline-info btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('post.status-change',$post->id) }}" class="btn btn-outline-success btn-xs">
                                                    <i class="{{ $post->status == true ? 'fa fa-ban' : 'fa fa-check' }}"></i>
                                                </a>
                                                <a href="" class="btn btn-outline-danger btn-xs">
                                                    <i class="fa fa-trash "></i>
                                                </a>
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
    </div>
    @endsection

