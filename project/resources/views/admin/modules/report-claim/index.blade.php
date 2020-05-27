@extends('layout')

@section('content')

<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row no-margin">
        	<input type="radio" name="selectedradio" value="{{ encrypt(Auth::user()->id) }}" checked style="display: none">
            <div class="col-lg-12 no-margin col-sm-12 mt-mob-4 pb-100 profile_tab_edit gi_detail_section" id="v-report-claim">
                
            </div>
        </div>
    </div>
</div>

@include('admin.common.popup.popup')
@endsection

@section('extra-js')
<script type="text/javascript">
	$(function(){
		var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.get_report_claim_section', ['prefix' => Auth::user()->role->role_slug]) }}";

        load_report_claim_section(url, selected)
	});
</script>
	
@endsection

