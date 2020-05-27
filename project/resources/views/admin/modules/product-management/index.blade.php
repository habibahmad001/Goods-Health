@extends('layout')

@section('content')

    <div class="alert alert-success alert-shadow gi-alert-success">
        <strong>Success!</strong>
    </div>
    <div class="alert alert-danger alert-shadow gi-alert-error">
        <strong>Success!</strong>
    </div>

    @include('admin.common.heading.product-management')
    
    @if(Session::has('success'))
        @include('admin.common.notification.success')          
    @endif

    @if(Session::has('error'))
        @include('admin.common.notification.error')
    @endif

    <div class="wrap_con">
        @include('admin.common.navigation.product-management')
    </div>

    @include('admin.modules.product-management.section.list')

    @include('admin.common.popup.product-management-popup')
@endsection

@push('links')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endpush

@section('extra-js')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    @include('admin.common.js.product-management')
    @include('admin.common.js.product-management-benefit')
@endsection