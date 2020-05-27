<script>
    /**** Script to load add form. ******/
    $(document).on('click', '#LoadUserAddSectionBtn', function(){
        var url = "{{ route('admin.users.add', ['prefix' => Auth::user()->role->role_slug, 'role_id' => encrypt($user_role_data->id), 'used_in' => encrypt('module')]) }}";

        load_add_section(url, 'yes');
    });

    /**** Script to load edit form. ******/
    $(document).on('click', '#LoadUserEditSectionBtn', function(){
        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.users.edit', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected+'/'+"{{ encrypt($user_role_data->id) }}"+'/'+"{{ encrypt('module') }}";

        if(selected){
            load_edit_section(url, 'no')
        }else{
            alert_message('error', 'Please select a user!')
        }
    });

    /**** Script to load edit form. ******/
    $(document).on('change', '#redirect_to_employee_role', function(e){
        e.preventDefault();

        var url = $(this).val();

        window.location = url;
    });
    
    /**** Script to load customer/business module. ******/
    @if($user_role_data->id == 4 || $user_role_data->id == 1)
    $(document).on('click','#v-pills-customer-tab',function(){ 
        var selected_div = "#v-pills-customer";
              
        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.users.show', ['prefix' => Auth::user()->role->role_slug, 'u_type' => $get_sub_users_role[2]->role_slug, 'used_in' => $user_role_data->role_slug]) }}";
        var datatable_url = "{{ route('admin.user_list_datatables', ['prefix' => Auth::user()->role->role_slug, 'role_id' => encrypt(2)]) }}";
        var role_id = 2;
        var table_id = '#table_customer';

        get_sub_user_list(url, selected, role_id, selected_div, table_id, datatable_url)
    });
    $(document).on('click','#v-pills-business-tab',function(){ 
        var selected_div = "#v-pills-business";
              
        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.users.show', ['prefix' => Auth::user()->role->role_slug, 'u_type' => $get_sub_users_role[3]->role_slug, 'used_in' => $user_role_data->role_slug]) }}";
        var datatable_url = "{{ route('admin.user_list_datatables', ['prefix' => Auth::user()->role->role_slug, 'role_id' => encrypt(3)]) }}";
        var role_id = 3;
        var table_id = '#table_business';

        get_sub_user_list(url, selected, role_id, selected_div, table_id, datatable_url)
    });
    @endif

    /**** Script to load provider module. ******/
    @if($user_role_data->id == 1)
    $(document).on('click','#v-pills-provider-tab',function(){ 
        var selected_div = "#v-pills-provider";
              
        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.users.show', ['prefix' => Auth::user()->role->role_slug, 'u_type' => $get_sub_users_role[4]->role_slug, 'used_in' => $user_role_data->role_slug]) }}";
        var datatable_url = "{{ route('admin.user_list_datatables', ['prefix' => Auth::user()->role->role_slug, 'role_id' => encrypt(4)]) }}";
        var role_id = 4;
        var table_id = '#table_provider';

        get_sub_user_list(url, selected, role_id, selected_div, table_id, datatable_url)
    });
    @endif

    /**** Script to load employee module. ******/
    @if($user_role_data->id == 4 || $user_role_data->id == 1 || $user_role_data->id == 3)
    $(document).on('click','div .gi_detail_section #v-pills-employee-tab',function(){ 
        var selected_div = "#v-pills-employee";
              
        var selected = $("input[name='selectedradio']:checked").val();

        var employee_role_id = $("input[name='employee_role_id']").val();

        var url = "{{ route('admin.users.show', ['prefix' => Auth::user()->role->role_slug, 'u_type' => $get_employee_role->role_slug, 'used_in' => $user_role_data->role_slug]) }}";
        var datatable_url = "{{ route('admin.user_list_datatables', ['prefix' => Auth::user()->role->role_slug]) }}/"+employee_role_id;
        var role_id = 3;
        var table_id = '#table_{{ $get_employee_role->role_slug }}';

        get_sub_user_list(url, selected, role_id, selected_div, table_id, datatable_url, 'parent_yes')
    });
    @endif

    $(document).on('click', '.UserDeleteButton', function(e){
        e.preventDefault();
        var selected = $("input[name='selectedradio']:checked").val();
        var table_id = $(this).data('table_id');

        var url = "{{ route('admin.users.destroy', ['prefix' => Auth::user()->role->role_slug]) }}";

        
        delete_user(url, selected, table_id)
    });

    $(document).on('click', '.addFamilyGroupInfo',function(e) {
        e.preventDefault();
        var len = $("#family_info > div").length;
 
        $("#family_info").append('<div class="row provider_profile_edit familygrp_sec"><input type="hidden" value="" name="fm['+len+'][fm_self_user_id]" class="fg_self_user_id"><div class="col-md-12 info_con profile_info_con"><div class="form-group row in_field pb-0"><label class="col-sm-2 col-form-label">Employer Name</label><div class="col-sm-4  input_f mb-0"><input type="text" class=" in form-control-plaintext" name="fm['+len+'][fm_employer_name]"></div><label class="col-sm-2 col-form-label">Employer Phone</label><div class="col-sm-4  input_f mb-0"><input type="text" class=" in form-control-plaintext" name="fm['+len+'][fm_employer_phone]"></div></div><div class="form-group row in_field pt-0 pb-0"><label for="email" class="col-sm-2 col-form-label">Email</label><div class="col-sm-4  input_f mb-0"><input type="email" class=" in form-control-plaintext family_group_email" name="fm['+len+'][fm_email]"></div></div><div class="form-group row in_field pt-0 pb-0"><div class="col-sm-6 input_f mb-0"><select class="in form-control fg_relation" name="fm['+len+'][family_relation]"><option value="" selected> Please select Relationship with Family/Group Member</option><option value="1">Spouse</option><option value="2"> Child</option><option value="3"> Sibling</option><option value="4"> Mother</option><option value="5"> Father</option></select></div></div><div class="form-group row in_field pt-0 pb-0"> <label for="company_name" class="col-sm-2 col-form-label">Name</label><div class="col-sm-4 input_f mb-0"> <input type="text" class=" in form-control-plaintext fg_name" name="fm['+len+'][fm_name]"></div></div><div class="form-group row in_field pt-0 pb-0"> <label for="company_name" class="col-sm-2 col-form-label">Date of Birth</label><div class="col-sm-4 input_f mb-0"> <input type="text" class="in form-control-plaintext date_of_birth fg_dob" name="fm['+len+'][fm_dob]" readonly><i class="fa fa-calendar fa-lg datepicker_icon" aria-hidden="true"></i></div></div><div class="form-group row in_field pt-0 pb-0"> <label for="company_name" class="col-sm-2 col-form-label">Gender</label><div class="col-sm-3 input_f input_radio mb-0"> <input id="fmg_male'+new Date().getTime()+'" class="fg_gender" type="radio" name="fm['+len+'][fm_gender]" value="0" checked> <label class="radio-label" for="fmg_male'+new Date().getTime()+'">Male</label><input id="fmg_female'+new Date().getTime()+'" class="fg_gender" type="radio" name="fm['+len+'][fm_gender]" value="1"> <label class="radio-label" for="fmg_female'+new Date().getTime()+'">Female</label><input id="fmg_other'+new Date().getTime()+'" class="fg_gender" type="radio" name="fm['+len+'][fm_gender]" value="2"> <label class="radio-label" for="fmg_other'+new Date().getTime()+'">Other</label></div></div><div class="form-group row in_field pt-0 pb-0"> <label for="city" class="col-sm-2 col-form-label">Social Security Number</label><div class="col-sm-4 offset-sm-2 ml-0 input_f mb-0"> <input type="text" class="in form-control-plaintext fg_ssn" name="fm['+len+'][fm_ssn]"></div></div><div class="form-group row in_field pt-0 pb-0"> <label for="city" class="col-sm-5 col-form-label"> Are you currently a U.S. citizen or permanent resident? </label><div class="col-sm-7 input_f input_radio mb-0"> <input id="fmresident_yes'+new Date().getTime()+'" class="fg_resident" type="radio" name="fm['+len+'][fm_resident]" value="1" checked> <label class="radio-label" for="fmresident_yes'+new Date().getTime()+'">Yes</label><input id="fmresident_no'+new Date().getTime()+'" class="fg_resident" type="radio" name="fm['+len+'][fm_resident]" value="0"> <label class="radio-label" for="fmresident_no'+new Date().getTime()+'">No</label></div> <label for="city" class="col-sm-5 col-form-label"> Do you have a spouse or significant other? </label><div class="col-sm-7 input_f input_radio mb-0"> <input id="fm_spouse_yes'+new Date().getTime()+'" class="fg_spouse" type="radio" name="fm['+len+'][fm_spouse]" value="1" checked> <label class="radio-label" for="fm_spouse_yes'+new Date().getTime()+'">Yes</label><input id="fm_spouse_no'+new Date().getTime()+'" class="fg_spouse" type="radio" name="fm['+len+'][fm_spouse]" value="0" > <label class="radio-label" for="fm_spouse_no'+new Date().getTime()+'">No</label></div> <label for="city" class="col-sm-5 col-form-label"> Do you own or rent your home? </label><div class="col-sm-7 input_f input_radio mb-0"> <input id="fm_own_home_yes'+new Date().getTime()+'" class="fg_own_home" type="radio" name="fm['+len+'][fm_own_home]" value="1" checked> <label class="radio-label" for="fm_own_home_yes'+new Date().getTime()+'">Yes</label><input id="fm_own_home_no'+new Date().getTime()+'" class="fg_own_home" type="radio" name="fm['+len+'][fm_own_home]" value="0" > <label class="radio-label" for="fm_own_home_no'+new Date().getTime()+'">No</label></div></div><div class="form-group row in_field pt-0 pb-0"> <label for="city" class="col-sm-2 col-form-label">Employment </label><div class="col-sm-4 input_f mb-0"> <select class="in form-control fg_employment_status" name="fm['+len+'][fm_employment_status]"><option value="">Select Status</option><option value="0">Active</option><option value="1">Inactive</option> </select></div></div><div class="form-group row in_field pt-0 pb-0"> <label for="city" class="col-sm-2 col-form-label">Occupation </label><div class="col-sm-4 input_f"> <input type="text" class="in form-control-plaintext fg_occupation" name="fm['+len+'][fm_occupation]"></div></div> <button type="button" class="text-danger ml-3 pb-4 addFamilyGroupInfo"> <i class="fa fa-plus-circle"></i> Add</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="text-danger ml-3 closed4"> <i class="fa fa-remove"></i> Remove </button></div></div>');
    });

    $(document).on('click', 'div .gi_detail_section .closed4', function(e) {
        e.preventDefault();
        $(this).closest('div .familygrp_sec').remove();
    });

    $(document).on('blur', 'div .gi_detail_section .family_group_email', function(e){
        var parent_div = $(this).parent().parent().parent().parent();
        
        var email = $(this).val();
        var url = "{{ route('admin.get_user_details_by_email', ['prefix' => Auth::user()->role->role_slug]) }}";

        if(email && isValidEmail(email)){
            parent_div.find('.fg_name, .fg_dob, .fg_ssn, .fg_occupation, .fg_employment_status').parent().append('<span class="spinner-border"></span>');
            $.ajax({
                type:"GET",
                url: url+'/'+email,
                success:function(response)
                {   
                    parent_div.find('.fg_name, .fg_dob, .fg_ssn, .fg_occupation').val('');
                    
                    if(response.data){  
                        parent_div.find('.fg_self_user_id').val(response.data.uid);
                        parent_div.find('.fg_name').val(response.data.u_name);
                        //parent_div.find('.fg_dob').datepicker({uiLibrary: 'bootstrap', "setDate": new Date()});
                        parent_div.find('.fg_dob').val(response.data.dob);
                        parent_div.find('.fg_ssn').val(response.data.social_security_number);
                        parent_div.find('.fg_occupation').val(response.data.occupation);

                        parent_div.find('.fg_relation option[value="'+response.data.relation+'"]').prop('selected', true);

                        parent_div.find('.fg_gender[value="'+response.data.gender+'"]').prop('checked', true);

                        parent_div.find('.fg_resident[value="'+response.data.resident+'"]').prop('checked', true);
                        parent_div.find('.fg_spouse[value="'+response.data.spouse+'"]').prop('checked', true);
                        parent_div.find('.fg_own_home[value="'+response.data.own_home+'"]').prop('checked', true);

                        parent_div.find('.fg_employment_status option[value="'+response.data.employment_status+'"]').prop('selected', true);
                    }

                    $('.spinner-border').remove();
                },
                error:function(response){
                    alert_message('error', 'Please enter a valid email address!')
                }
            });
        } else if(email.length > 0 && !isValidEmail(email)){
            alert_message('error', 'Please enter a valid email address!')
        } else {
            $('.spinner-border').remove();
        }
    });

    $(document).on('click', '.user_document_download', function(e){
        e.preventDefault();
        var doc = $("input[name='user_document_id']:checked");
        var doc_id = doc.val();
        if(doc_id){
            var href = doc.data('href');
            window.open(href, '_blank');
        }else{
            alert_message('error', 'Please select a document!')
        }
        
    });

    // $(document).on('click', '.user_document_delete', function(e){
    //     e.preventDefault();
    //     var doc = $("input[name='user_document_id']:checked");
    //     var doc_id = doc.val();
    //     var url = "";

    //     if(doc_id){
    //         $.ajax({
    //             type:"GET",
    //             url: url+'/'+doc_id+'/'+0,
    //             success:function(response)
    //             {   
    //                 doc.parent().parent().remove();
    //                 alert_message('success', response.mes)
    //             }
    //         });
    //     }else{
    //         alert_message('error', 'Please select a document!')
    //     }
        
    // });

    $(document).on('click', 'div .gi_detail_section #addEmerConBtn',function(e) {
        e.preventDefault();
        $("#emergencySection,#emergencySection1").append('<div class="row provider_profile_edit" id="emrg_contact"><div class="col-md-6 info_con profile_info_con"><div class="form-group row in_field"><label for="emergency_contact" class="col-sm-4 col-form-label">Name</label><div class="col-sm-8 input_f"><input type="text" class="in form-control-plaintext"  name="emergency_user_name[]" autocomplete="off" value=""><input type="hidden" name="emergency_id[]" value="0"></div><label for="last_name" class="col-sm-4 col-form-label">Phone No.</label><div class="col-sm-8 input_f"><input type="text" class="in form-control-plaintext"  name="emergency_number[]" autocomplete="off"></div></div></div><div class="col-md-6 info_con profile_info_con"><div class="form-group row in_field"><label for="spouse" class="col-sm-4 col-form-label">Relation</label><div class="col-sm-8 input_f"><select  class="in form-control " name="relation[]"><option value="">Select relation</option><option value="0">Father</option><option value="1">Mother</option><option value="2">Brother</option><option value="3">Sister</option></select></div><label for="last_name" class="col-sm-4 col-form-label">Email</label><div class="col-sm-8 input_f"><input type="text" class="in form-control-plaintext"  name="emergency_relative_email[]" autocomplete="off"></div></div></div><div class="col-md-12 pb-lg-5"><button id="addEmerConBtn" type="button" class="text-danger ml-3"> <i class="fa fa-plus-circle"></i> Add</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="text-danger ml-3 closed"> <i class="fa fa-remove"></i> Remove </button></div></div></div></div>');
                    
    });

    $(document).on('click', 'div .gi_detail_section .closed', function(e) {
        e.preventDefault();
        $(this).closest('div #emrg_contact').remove();
    });

    $(document).on('click', 'div .gi_detail_section #addDocBtn',function(e) {
        e.preventDefault();
        $("#documentSec,#documentSec1").append('<div class="row provider_profile_edit" id="doc_sec1"><div class="col-md-6 info_con profile_info_con"><div class="form-group row in_field"><label for="emergency_contact" class="col-sm-4 col-form-label">*Document</label><div class="col-sm-8 input_f"><select id="inputState" class="text-center in form-control " name="document_type[]" ><option selected value="">Select Doc Type</option><option  value="1">Passport</option><option value="2">Driving License</option><option value="3">Government Id</option><option value="4">Contract</option><option value="5">Passport</option><option value="6">Job Description</option><option value="7">Resignation Letter</option><option value="8">Certificate Of Employment</option><option value="9">Termination Letter</option><option value="10">Memorandum</option><option value="11">Others</option></select></div></div></div><div class="col-md-6 info_con profile_info_con"><div class="form-group row in_field"><label for="spouse" class="col-sm-4 col-form-label"></label><div class="col-sm-8 input_f yo_photo document"><div class="upload_image"><div class="file_upload_wrap"><label class="custom-file-upload">Upload Document<input type="file" class="file_upload" name="document_name[]"></label></div></div></div></div></div><div class="col-md-12 pb-lg-5"><button id="addDocBtn" type="button" class="text-danger ml-3"> <i class="fa fa-plus-circle"></i> Add</button>&nbsp;&nbsp;<button  type="button" class="text-danger ml-3 closed3"><i class="fa fa-remove"></i> Remove </button></div></div></div></div></div>');
                    
    });

    $(document).on('click', 'div .gi_detail_section .closed3', function(e) {
        e.preventDefault();
        $(this).closest('div #doc_sec1').remove();
    });

    $(document).on('submit', '#form_AddUserForm', function(e){ 
        e.preventDefault();

        var selected_div = $('div .gi_detail_section');
        var thisz = this;
        var table_id = "#table_{{ $user_role_data->role_slug }}";

        url = "{{ route('admin.users.save', ['prefix' => Auth::user()->role->role_slug]) }}";

        save_user_data(url, selected_div, thisz, table_id, 'add')
    });

    $(document).on('submit', '#form_EditUserForm', function(e){ 
        e.preventDefault();

        var selected_div = $('div .gi_detail_section');
        var thisz = this;
        var table_id = "#table_{{ $user_role_data->role_slug }}";

        url = "{{ route('admin.users.update', ['prefix' => Auth::user()->role->role_slug]) }}";

        save_user_data(url, selected_div, thisz, table_id, 'edit')
    });

    $(document).on('submit', '#form_EditDetailedInfoForm', function(e){ 
        e.preventDefault();

        var thisz = this;

        url = "{{ route('admin.users.update_detailed_info', ['prefix' => Auth::user()->role->role_slug]) }}";

        save_user_detailed_info_data(url, thisz)
    });
    
    $(document).on('click','div .gi_detail_section #v-pills-carrier-tab',function(){
        var selected = $("input[name='selectedradio']:checked").val();

        if(selected){
            load_user_carrier(selected);
            $('html, body').animate({
                scrollTop: $('.gi_detail_section').offset().top
            }, 1500);
        }else{
            alert_message('error', 'Please select a user.');
        }
    });

    $(document).on('click','div .gi_detail_section #v-pills-activity-tab',function(){
        $('div .gi_detail_section #v-pills-tasks-tab').trigger('click');
        $('html, body').animate({
            scrollTop: $('.gi_detail_section').offset().top
        }, 1500);
    });

    $(document).on('click','div .gi_detail_section #v-pills-tasks-tab',function(){
        var selected = $("input[name='selectedradio']:checked").val();

        var activity_column = [
                { data: 'creator', name: 'creator' },
                { data: 'created_at', name: 'created_at' },
                { data: 'schedule', name: 'schedule' },
                { data: 'title', name: 'title' },
                { data: 'user', name: 'user' },
                { data: 'description', name: 'description' },
                { data: 'action', name: 'action' },
            ];

        var url = "{{ route('admin.get_task_activity', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected;

        if(selected){
            load_user_activity(url, selected, 'tasks', activity_column)
        }else{
            alert_message('error', 'Please select a user.');
        }
    });

    $(document).on('click','div .gi_detail_section #v-pills-events-tab',function(){
        var selected = $("input[name='selectedradio']:checked").val();

        var activity_column = [
                { data: 'creator', name: 'creator' },
                { data: 'created_at', name: 'created_at' },
                { data: 'schedule', name: 'schedule' },
                { data: 'title', name: 'title' },
                { data: 'user', name: 'user' },
                { data: 'location', name: 'location' },
                { data: 'description', name: 'description' },
                { data: 'action', name: 'action' },
            ];

        var url = "{{ route('admin.get_event_activity', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected;

        if(selected){
            load_user_activity(url, selected, 'events', activity_column)
        }else{
            alert_message('error', 'Please select a user.');
        }
    });

    $(document).on('click','div .gi_detail_section #v-pills-notes-tab',function(){
        var selected = $("input[name='selectedradio']:checked").val();

        var activity_column = [
                { data: 'author', name: 'author' },
                { data: 'created_at', name: 'created_at' },
                { data: 'policy', name: 'policy' },
                { data: 'title', name: 'title' },
                { data: 'note', name: 'note' },
                { data: 'action', name: 'action' },
            ];

        var url = "{{ route('admin.get_note_activity', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected;

        if(selected){
            load_user_activity(url, selected, 'notes', activity_column)
        }else{
            alert_message('error', 'Please select a user.');
        }
    });

    $(document).on('click','div .gi_detail_section #v-pills-message-tab',function(){
        var selected = $("input[name='selectedradio']:checked").val();

        var activity_column = [
                { data: 'from', name: 'from' },
                { data: 'subject', name: 'subject' },
                { data: 'created_at', name: 'created_at' },
                { data: 'reply', name: 'reply' },
                { data: 'action', name: 'action' },
            ];

        //var url = "{{ route('admin.get_note_activity', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected;

        if(selected){
            if(!$.fn.dataTable.isDataTable('#table_message')){
            var table = $('#table_message').DataTable();
        }else{
            $('#table_message').DataTable().ajax.reload();
        }
            //load_user_activity(url, selected, 'notes', activity_column)
        }else{
            alert_message('error', 'Please select a user.');
        }
    });

    $(document).on('click','div .gi_detail_section #v-pills-email-tab',function(){
        var selected = $("input[name='selectedradio']:checked").val();

        var activity_column = [
                { data: 'from', name: 'from' },
                { data: 'subject', name: 'subject' },
                { data: 'created_at', name: 'created_at' },
                { data: 'email_from', name: 'email_from' },
                { data: 'cc', name: 'cc' },
                { data: 'bcc', name: 'bcc' },
                { data: 'action', name: 'action' },
            ];

        //var url = "{{ route('admin.get_note_activity', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected;

        if(selected){
            if(!$.fn.dataTable.isDataTable('#table_email')){
            var table = $('#table_email').DataTable();
        }else{
            $('#table_email').DataTable().ajax.reload();
        }
            //load_user_activity(url, selected, 'notes', activity_column)
        }else{
            alert_message('error', 'Please select a user.');
        }
    });

    $(document).on('click','div .gi_detail_section #v-pills-live-chat-tab',function(){
        var selected = $("input[name='selectedradio']:checked").val();

        var activity_column = [
                { data: 'name', name: 'name' },
                { data: 'reply_from', name: 'reply_from' },
                { data: 'created_at', name: 'created_at' },
                { data: 'chat_message', name: 'chat_message' },
                { data: 'action', name: 'action' },
            ];

        //var url = "{{ route('admin.get_note_activity', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected;

        if(selected){
            if(!$.fn.dataTable.isDataTable('#table_live_chat')){
            var table = $('#table_live_chat').DataTable();
        }else{
            $('#table_live_chat').DataTable().ajax.reload();
        }
            //load_user_activity(url, selected, 'notes', activity_column)
        }else{
            alert_message('error', 'Please select a user.');
        }
    });

    $(document).on('click','div .gi_detail_section #v-pills-history-tab',function(){
        var selected = $("input[name='selectedradio']:checked").val();

        var history_column = [
                { data: 'created_at', name: 'created_at' },
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
            ];

        var url = "{{ route('admin.get_user_histories', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected;

        if(selected){
            load_user_histories(url, history_column);
            $('html, body').animate({
                scrollTop: $('.gi_detail_section').offset().top
            }, 1500);
        }else{
            alert_message('error', 'Please select a user.');
        }
    });

    $(document).on('click', '.add_Task_to_user_module', function(e){
        e.preventDefault();

        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('task'), 'action_from' => encrypt('module'), 'action_type' => 'add']) }}/"+selected+'/';

        load_activity_popup_from(url, 'main_task_popup', 'form_TaskEventForm', 'task_title', 'Add Task');
    });

    $(document).on('click', '.edit_Task_to_user_module', function(e){
        e.preventDefault();

        var selected = $("input[name='selectedradio']:checked").val();
        var activity_id = $(this).data('task_id');
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('task'), 'action_from' => encrypt('module'), 'action_type' => 'edit']) }}/"+selected+'/'+activity_id;

        load_activity_popup_from(url, 'main_task_popup', 'form_TaskEventForm', 'task_title', 'Edit Task');
    });

    $(document).on('click', '.view_Task_to_user_module', function(e){
        e.preventDefault();

        var selected = $("input[name='selectedradio']:checked").val();
        var activity_id = $(this).data('task_id');
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('task'), 'action_from' => encrypt('module'), 'action_type' => 'view']) }}/"+selected+'/'+activity_id;

        load_activity_popup_from(url, 'main_task_popup', 'form_TaskEventForm', 'task_title', 'View Task');
    });

    $(document).on('click', '.delete_Task_to_user_module', function(e){
        e.preventDefault();

        var activity_id = $(this).data('task_id');

        delete_activity_data(activity_id, 'task', 'module');
    });
    
    $(document).on('click', '.add_Event_to_user_module', function(e){
        e.preventDefault();

        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('event'), 'action_from' => encrypt('module'), 'action_type' => 'add']) }}/"+selected+'/';

        load_activity_popup_from(url, 'main_event_popup', 'form_TaskEventForm', 'event_title', 'Add Event');
    });

    $(document).on('click', '.edit_Event_to_user_module', function(e){
        e.preventDefault();

        var selected = $("input[name='selectedradio']:checked").val();
        var activity_id = $(this).data('event_id');
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('event'), 'action_from' => encrypt('module'), 'action_type' => 'edit']) }}/"+selected+'/'+activity_id;

        load_activity_popup_from(url, 'main_event_popup', 'form_TaskEventForm', 'event_title', 'Edit Event');
    });

    $(document).on('click', '.view_Event_to_user_module', function(e){
        e.preventDefault();

        var selected = $("input[name='selectedradio']:checked").val();
        var activity_id = $(this).data('event_id');
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('event'), 'action_from' => encrypt('module'), 'action_type' => 'view']) }}/"+selected+'/'+activity_id;

        load_activity_popup_from(url, 'main_event_popup', 'form_TaskEventForm', 'event_title', 'View Event');
    });

    $(document).on('click', '.delete_Event_to_user_module', function(e){
        e.preventDefault();

        var activity_id = $(this).data('event_id');

        delete_activity_data(activity_id, 'event', 'module');
    });

    $(document).on('click', '.add_Note_to_user_module', function(e){
        e.preventDefault();

        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('note'), 'action_from' => encrypt('module'), 'action_type' => 'add']) }}/"+selected+'/';

        load_activity_popup_from(url, 'main_note_popup', 'form_ActivityForm');
    });

    $(document).on('click', '.view_Note_to_user_module', function(e){
        e.preventDefault();

        var selected = $("input[name='selectedradio']:checked").val();
        var activity_id = $(this).data('note_id');
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('note'), 'action_from' => encrypt('module'), 'action_type' => 'view']) }}/"+selected+'/'+activity_id;

        load_activity_popup_from(url, 'main_note_popup', 'form_ActivityForm', 'note_title', 'View Note');
    });

    $(document).on('click', '.reply_Note_to_user_module', function(e){
        e.preventDefault();

        var selected = $("input[name='selectedradio']:checked").val();
        var activity_id = $(this).data('note_id');
        var url = "{{ route('admin.load_activity_form_data', ['prefix' => Auth::user()->role->role_slug, 'activity_type' => encrypt('note'), 'action_from' => encrypt('module'), 'action_type' => 'reply']) }}/"+selected+'/'+activity_id;

        load_activity_popup_from(url, 'main_note_popup', 'form_ActivityForm', 'note_title', 'Reply to Note');
    });

    $(document).on('change', '[name="broker_user_id"]',function(){ 
        var broker_id = $(this).val();
        var closestthis = $(this).closest('form');

        var url = "{{ route('admin.user.brokeragent', ['prefix' => Auth::user()->role->role_slug ]) }}";
        if(broker_id){
            closestthis.find('[name="broker_employee"]').parent().append('<span class="spinner-border"></span>');
            $.ajax({
                type:"GET",
                url: url+'/'+broker_id,
                success:function(response)
                {                  
                     closestthis.find('[name="broker_employee"]').html(response);
                     $('.spinner-border').remove();
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('.spinner-border').remove();
                }
            });
        }
    });

    $(document).on('click','div .gi_detail_section #v-pills-files-tab',function(){ 
        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.get_file_section', ['prefix' => Auth::user()->role->role_slug]) }}";

        load_file_section(url, selected, 1, 'table_files')
    });

    $(document).on('click','div .gi_detail_section #v-report-claim-tab',function(){ 
        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.get_report_claim_section', ['prefix' => Auth::user()->role->role_slug]) }}";

        load_report_claim_section(url, selected)
    });

    $(document).on('click', '#v-pills-benefitinfo-tab',function(){ 
        $('#v-pills-benefitinfo').append('<span class="spinner-border-div"></span>');       
        if( $("input[name='selectedradio']:checked"))
        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.show_benefits', ['prefix' => Auth::user()->role->role_slug]) }}";
        if(selected){
            $.ajax({
                type:"GET",
                url: url+'/'+selected,
                success:function(response)
                {
                    $('.spinner-border-div').remove();
                    $('div #v-pills-benefitinfo').html(response);
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('.spinner-border-div').remove();
                }
            });
        }
    });

    $(document).on('submit', '.form_ActivityForm', function(e){ 
        e.preventDefault();

        var selected_div = $(this);

        url = "{{ route('admin.save_activity_data', ['prefix' => Auth::user()->role->role_slug]) }}";

        var activity_type = selected_div.find('[name=activity_type]').val();
        var title = selected_div.find('[name=title]').val();
        var description = selected_div.find('[name=description]').val();
    
        var data = {'title':title, 'description':description};
      
        if(validation_check(data, selected_div, 'no')){
            $('#gi-overlay').show();
            
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url: url,
                data: $(this).serialize(),
                success:function(response)
                {   
                    $('#gi-overlay').hide();
                    if(response.status == 'SUCCESS'){
                        alert_message('success', response.mes)
                        $('#main_note_popup').modal('hide');

                        if($.fn.dataTable.isDataTable('#table_notes')){
                            $('#table_notes').DataTable().ajax.reload();
                        }
                    }else{
                        alert_message('error', response.mes)
                    }
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('#gi-overlay').hide();
                }
            });
        }
    });
</script>