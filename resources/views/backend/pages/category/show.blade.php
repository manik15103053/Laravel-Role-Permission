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
                        <li><a href="{{ route('categories') }}">All Category</a></li>
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
                        <h4 class="header-title float-left">Category By Post List</h4>
                        @include('backend.layouts.partial.success-message')
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th style="width: 5%">Sl</th>
                                        <th style="width: 10%">Post</th>
                                        <th style="width: 10%">Category</th>
                                        <th style="width: 10%">Description</th>
                                        <th style="width: 10%">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category->posts as $key=>$post)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $post->name}}</td>
                                            <td>{{ $post->category->name}}</td>
                                            <td>{{ $post->description}}</td>
                                            <td>{{ $post->created_at}}</td>

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
