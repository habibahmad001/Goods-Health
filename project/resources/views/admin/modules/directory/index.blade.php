@extends('layout')

@section('content')

<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row no-margin">
        	<input type="radio" name="selectedradio" value="{{ encrypt(Auth::user()->id) }}" checked style="display: none">
            <input type="hidden" name="employee_role_id" value="{{ encrypt($get_employee_role->id) }}">
            <div class="col-lg-12 no-margin col-sm-12 mt-mob-4 pb-100 profile_tab_edit" id="v-pills-employee">
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-js')
<script type="text/javascript">
	$(function(){
        load_main_employee();
    });

    function load_main_employee(){
        var selected_div = "#v-pills-employee";
              
        var selected = $("input[name='selectedradio']:checked").val();
        var employee_role_id = $("input[name='employee_role_id']").val();

        var url = "{{ route('admin.users.show', ['prefix' => Auth::user()->role->role_slug, 'u_type' => $get_employee_role->role_slug, 'used_in' => Auth::user()->role->role_slug]) }}";
        var datatable_url = "{{ route('admin.user_list_datatables', ['prefix' => Auth::user()->role->role_slug]) }}/"+employee_role_id;
        var role_id = 3;
        var table_id = "#table_{{ $get_employee_role->role_slug }}";

        get_sub_user_list(url, selected, role_id, selected_div, table_id, datatable_url, 'parent_yes');
    }
</script>
	
@endsection