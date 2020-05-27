@extends('layout')

@section('content')

    <div class="alert alert-success alert-shadow gi-alert-success">
        <strong>Success!</strong>
    </div>
    <div class="alert alert-danger alert-shadow gi-alert-error">
        <strong>Success!</strong>
    </div>

    @include('admin.common.heading.user-center')
    
    @if(Session::has('success'))
        @include('admin.common.notification.success')          
    @endif

    @if(Session::has('error'))
        @include('admin.common.notification.error')
    @endif

    @include('admin.common.search.user-center-search')

@endsection

@section('extra-js')
    @include('admin.common.js.user-center')
@endsection