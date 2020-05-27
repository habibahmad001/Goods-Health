@extends('layout')

@section('content')
<div class="wrap_con">
    <div class="full_wrap">
        <div class="row">
            <div class="col-12">
                <div class="top_heading cf">
                    <h3>FILES</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.common.search.user-type-search')

<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row no-margin">
        	<input type="radio" name="selectedradio" value="" checked style="display: none">
            <div class="col-lg-12 no-margin col-sm-12 mt-mob-4 pb-100 profile_tab_edit gi_detail_section file-section-div">
                
            </div>
        </div>
    </div>
</div>
@include('admin.common.popup.file-popup')
@endsection

@push('links')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endpush

@section('extra-js')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    @include('admin.common.js.files')	
@endsection
