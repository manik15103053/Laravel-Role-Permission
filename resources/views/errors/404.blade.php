@extends('errors.errors_layout')

@section('title')
    404 - Sorry ! Page Not found
@endsection
@section('error-content')
    <h2>404</h2>
    <p >Sorry ! Page Not found!</p>
    <hr>
    <p class="mt-2">
        {{ $exception->getMessage() }}
    </p>
    <a href="{{ route('admin.dashboard') }}">Back to Dashboard</a>
    <a href="{{ route('admin.login') }}">Login Again</a>
@endsection
