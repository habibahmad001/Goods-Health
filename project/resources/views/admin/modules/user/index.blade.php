@extends('layout')

@section('content')

    <div class="alert alert-success alert-shadow gi-alert-success">
        <strong>Success!</strong>
    </div>
    <div class="alert alert-danger alert-shadow gi-alert-error">
        <strong>Success!</strong>
    </div>

    @include('admin.common.heading.heading')
    
    @if(Session::has('success'))
        @include('admin.common.notification.success')          
    @endif

    @if(Session::has('error'))
        @include('admin.common.notification.error')
    @endif

    <div class="wrap_con">
        @include('admin.common.navigation.user-nav')
    </div>

    @include('admin.modules.user.section.list')
        
    @include('admin.common.popup.popup')
    @include('admin.common.popup.file-popup')
    @include('admin.common.popup.activity-popup') 

@endsection

@push('links')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endpush

@section('extra-js')
    <script src="{{ asset('js/jquery.ddslick.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    @include('admin.common.js.user')
    @include('admin.common.js.insurance') 
    @include('admin.common.js.payment') 
    @include('admin.common.js.datatables')
    @include('admin.common.js.files')
@endsection