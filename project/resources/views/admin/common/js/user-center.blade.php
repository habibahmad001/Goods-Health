<script>
    $(document).ready(function(){
        @if(!empty($get_role_from_session) && $get_role_from_session > 0)
            $('#user_role_id').trigger('click');
        @endif
    });

    $(document).on('click', '#user_role_id',function(){
        var user_role_id = $(this).val();
        var url = "{{ route('admin.load_user_center_list', ['prefix' => Auth::user()->role->role_slug]) }}";

        if(user_role_id){
            load_user_center_list_section(url, user_role_id);
        }else{
            alert_message('error', 'Please select a user type!')
        }
    });

    /**** Script to add business add form. ******/
    $(document).on('click', '#addUserCenterUserBtn', function(){
        var user_role_id = $('#user_role_id').val();
        var url = "{{ route('admin.user_center_add', ['prefix' => Auth::user()->role->role_slug]) }}/"+user_role_id;

        load_add_section(url, 'no');
    });

    /**** Script to add business edit form. ******/
    $(document).on('click', '#editUserCenterUserBtn', function(){
        var user_role_id = $('#user_role_id').val();
        var selected = $(".user-center-search input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.user_center_edit', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected+'/'+user_role_id;
       
        if(selected){
            load_edit_section(url, 'no')
        }else{
            alert_message('error', 'Please select a user!')
        }
    });

    $(document).on('click', '#addUserCenterUserSubmitBtn', function(e){ 
        e.preventDefault();
        var selected_div = $('div .gi_detail_section');
        var form_name = '#form_addUserCenterUser';

        url = "{{ route('admin.user_center_save', ['prefix' => Auth::user()->role->role_slug]) }}";

        save_user_center_data(url, selected_div, form_name, 'add')
    });

    $(document).on('click', '#editUserCenterUserSubmitBtn', function(e){ 
        e.preventDefault();
        var selected_div = $('div .gi_detail_section');
        var form_name = '#form_editUserCenterUser';

        url = "{{ route('admin.user_center_update', ['prefix' => Auth::user()->role->role_slug]) }}";

        save_user_center_data(url, selected_div, form_name, 'edit')
    });

    $(document).on('click', '.UserCenterDeleteButton', function(e){
        e.preventDefault();
        var selected = $("input[name='selectedradio']:checked").val();
        var table_id = $(this).data('table_id');

        var url = "{{ route('admin.user_center.destroy', ['prefix' => Auth::user()->role->role_slug]) }}";

        delete_user(url, selected, table_id)
    });
</script>