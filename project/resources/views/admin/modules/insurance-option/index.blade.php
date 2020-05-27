@extends('layout')

@section('content')

<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row no-margin">
        	<input type="radio" name="selectedradio" value="{{ encrypt(Auth::user()->id) }}" checked style="display: none">
            <div class="col-lg-12 no-margin col-sm-12 mt-mob-4 pb-100 profile_tab_edit gi_detail_section">
                @include('admin.common.section.insurance-option')
            </div>
        </div>
    </div>
</div>

@include('admin.common.popup.popup') 
@endsection

@section('extra-js')
    <script src="{{ asset('js/jquery.ddslick.min.js') }}"></script>
	@include('admin.common.js.insurance')
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#product_select').ddslick('destroy');
	        set_ddslick_dropdown();
	    });
    </script>
@endsection
