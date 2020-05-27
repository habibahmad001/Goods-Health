@extends('layout')

@section('content')

    <div class="alert alert-success alert-shadow gi-alert-success">
        <strong>Success!</strong>
    </div>
    <div class="alert alert-danger alert-shadow gi-alert-error">
        <strong>Success!</strong>
    </div>

    @include('admin.common.heading.carrier-management')
    
    @if(Session::has('success'))
        @include('admin.common.notification.success')          
    @endif

    @if(Session::has('error'))
        @include('admin.common.notification.error')
    @endif

    <div class="wrap_con">
        @include('admin.common.navigation.carrier-management')
    </div>

    @include('admin.modules.carrier-management.section.list')

@endsection

@push('links')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endpush

@section('extra-js')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    @include('admin.common.js.carrier-management')
    @if($type == 'products')
    @include('admin.common.js.product-management')
    @endif
@endsection