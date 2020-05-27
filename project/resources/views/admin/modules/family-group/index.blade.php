@extends('layout')

@section('content')

    <div class="alert alert-success alert-shadow gi-alert-success">
        <strong>Success!</strong>
    </div>
    <div class="alert alert-danger alert-shadow gi-alert-error">
        <strong>Success!</strong>
    </div>
    
    @if(Session::has('success'))
        @include('admin.common.notification.success')          
    @endif

    @if(Session::has('error'))
        @include('admin.common.notification.error')
    @endif

    @include('admin.modules.family-group.list')

@endsection

@section('extra-js')
    @include('admin.common.js.family-group')
@endsection