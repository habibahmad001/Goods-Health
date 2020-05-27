<script>
    /**** Script to add business edit form. ******/
    $(document).on('change', "input[name='selectedradio']",function(){
        $('.gi_detail_section').css('display','none');
        $('.gi_detail_section').html('');
    });

    $(document).on('click', '.gi_cancel_button', function(){
        $('.gi_detail_section').css('display','none');
        $('.gi_detail_section').html('');
    });

    $(document).on('focus', '.date_of_birth, .common_calendar',function(){
        $(this).datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: ''
            }
        })
    });

    $(document).on('focus', '.form-current-date',function(){
        $(this).datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: ''
            },
            minDate: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate())
        })
    });

    $(document).on('click', '#start_time',function(){
        $(this).timepicker();
        $(this).parent().find('.clock').trigger('click');
    });

    $(document).on('focus', '#end_time',function(){
        $(this).timepicker();
        $(this).parent().find('.clock').trigger('click');
    });

    $(document).on('click', '.all_day_checkbox', function(){
        if($(this).is(':checked')){
            $('#start_time, #end_time').val('').prop('disabled', true);
        }else{
            $('#start_time, #end_time').prop('disabled', false);
        }
    });

    //get city on state change for form
    $(document).on('change','.state', function(){
        var state_code = $(this).val();
        var closestthis = $(this).closest('form');

        closestthis.find('.city, .zipcode, .county').empty().val('');

        closestthis.find('.policiesSection').html('');

        closestthis.find('.city').append('<option value="">Select City</option>');
        closestthis.find('.zipcode').append('<option value="">Select Zipcode</option>');

        if(state_code){
            closestthis.find('.city').parent().append('<span class="spinner-border"></span>');
            
            var url = "{{ route('admin.get-cities-list', ['prefix' => Auth::user()->role->role_slug ]) }}";
            set_location_data(url, state_code, closestthis, '.city');
        }
    });

    //get zipcode on city change for form
    $(document).on('change','.city', function(){
        var city_id = $(this).val();
        var closestthis = $(this).closest('form');

        closestthis.find('.zipcode, .county').empty().val('');
        closestthis.find('.policiesSection').html('');

        closestthis.find('.zipcode').append('<option value="">Select Zipcode</option>');

        if(city_id){
            closestthis.find('.zipcode').parent().append('<span class="spinner-border"></span>');
            
            var url = "{{ route('admin.get-zipcodes-list', ['prefix' => Auth::user()->role->role_slug ]) }}";
            set_location_data(url, city_id, closestthis, '.zipcode');
        } 
    });

    //get county on zipcode change for form
    $(document).on('change','.zipcode', function(){
        var zipcode = $(this).val();
        var closestthis = $(this).closest('form');

        var state_code = closestthis.find('.state').val();
        var city_id = closestthis.find('.city').val();

        closestthis.find('.policiesSection').html('');
        closestthis.find('.county').val('');

        if(zipcode){
            closestthis.find('.county').parent().append('<span class="spinner-border"></span>');

            var url = "{{ route('admin.get-county', ['prefix' => Auth::user()->role->role_slug ]) }}";
            set_location_data(url, zipcode, closestthis, '.county');
        } 
        
        if(state_code && city_id && zipcode){
            var url = "{{ route('admin.get-policies-list-by-ajax', ['prefix' => Auth::user()->role->role_slug ]) }}";
            get_policies_list_by_ajax(url, state_code, city_id, zipcode, 0, closestthis);
        }
    });

    //get city on state change for search
    $(document).on('change','.searchState', function(){
        var state_code = $(this).val();
        var closestthis = $(this).closest('.main-search-module');

        closestthis.find('.searchCity, .searchZipcode, .searchCounty').empty().val('');

        closestthis.find('.searchCity').append('<option value="">Select City</option>');
        closestthis.find('.searchZipcode').append('<option value="">Select Zipcode</option>');

        if(state_code){
            closestthis.find('.searchCity').parent().append('<span class="spinner-border"></span>');
            
            var url = "{{ route('admin.get-cities-list', ['prefix' => Auth::user()->role->role_slug ]) }}";
            set_location_data(url, state_code, closestthis, '.searchCity');
        }
    });

    //get zipcode on city change for search
    $(document).on('change','.searchCity', function(){
        var city_id = $(this).val();
        var closestthis = $(this).closest('.main-search-module');

        closestthis.find('.searchZipcode, .searchCounty').empty().val('');

        closestthis.find('.searchZipcode').append('<option value="">Select Zipcode</option>');

        if(city_id){
            closestthis.find('.searchZipcode').parent().append('<span class="spinner-border"></span>');
            
            var url = "{{ route('admin.get-zipcodes-list', ['prefix' => Auth::user()->role->role_slug ]) }}";
            set_location_data(url, city_id, closestthis, '.searchZipcode');
        } 
    });

    //get county name on zipcode change for search
    $(document).on('change','.searchZipcode', function(){
        var zipcode = $(this).val();
        var closestthis = $(this).closest('.main-search-module');

        closestthis.find('.searchCounty').val('');

        if(zipcode){
            closestthis.find('.searchCounty').parent().append('<span class="spinner-border"></span>');

            var url = "{{ route('admin.get-county', ['prefix' => Auth::user()->role->role_slug ]) }}";
            set_location_data(url, zipcode, closestthis, '.searchCounty');
        }
    });

    $(document).on('click', '#addEmployeeUserBtn',function(){
        var selected = $("input[name='selectedradio']:checked").val();
        var employee_role_id = $("input[name='employee_role_id']").val();
        var used_in = "{{ encrypt('sub_module') }}";
        var url = "{{ route('admin.users.add', ['prefix' => Auth::user()->role->role_slug]) }}/"+employee_role_id+'/'+used_in;
        
        if(selected){
            load_employee_section(url, selected);
        }else{
            alert_message('error', 'Please select a user!')
        }
    });

    $(document).on('click', '#editEmployeeUserBtn',function(){
        var parent_id = $("input[name='selectedradio']:checked").val();
        var selected = $("input[name='selectedradio_child']:checked").val();
        var employee_role_id = $("input[name='employee_role_id']").val();
        var used_in = "{{ encrypt('sub_module') }}";
        var url = "{{ route('admin.users.edit', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected+'/'+employee_role_id+'/'+used_in;

        if(selected){
            load_employee_section(url, parent_id);
        }else{
            alert_message('error', 'Please select a user!')
        }
    });

    $(document).on('click', '.add-report-claim', function (e) {
        $('#policies_list_popup').modal('hide');
        
        var cat_id = $(this).data('policy_id');
        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.load_apply_form', ['prefix' => Auth::user()->role->role_slug]) }}";

        load_apply_form(url, selected, cat_id, '')
    });

    /**** Script to load report claim module. ******/
    $(document).on('click','div .view_policies_list',function(){
        var cat_id = $(this).data('value');
        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.get_policies_list', ['prefix' => Auth::user()->role->role_slug]) }}";

        get_policies_list(url, selected, cat_id)
    });

    $(document).on('submit', '#report_claim_form', function(e){
        e.preventDefault();

        var selected_div = $('div #report_claim_popup');
        var user_id = $("input[name='selectedradio']:checked").val();

        var rc_injured_owner = selected_div.find('[name=rc_injured_owner]').val();
        var rc_injured_party = selected_div.find('[name=rc_injured_party]').val();
        var rc_injured_person = selected_div.find('[name=rc_injured_person]').val();
        var rc_injured_address = selected_div.find('[name=rc_injured_address]').val();
        var phone_number = selected_div.find('[name=phone_number]').val();
        var rc_injured_gaurdian = selected_div.find('[name=rc_injured_gaurdian]').val();
        var rc_injured_date = selected_div.find('[name=rc_injured_date]').val();
        var rc_injured_time = selected_div.find('[name=rc_injured_time]').val();
        
        var data = {'rc_injured_owner':rc_injured_owner, 'rc_injured_party':rc_injured_party, 'rc_injured_person':rc_injured_person, 'rc_injured_address':rc_injured_address, 'phone_number':phone_number, 'rc_injured_gaurdian':rc_injured_gaurdian, 'rc_injured_date':rc_injured_date, 'rc_injured_time':rc_injured_time};

        if(validation_check(data, selected_div, 'no')){
            $('#gi-overlay').show();
            url = "{{ route('admin.save_report_claim', ['prefix' => Auth::user()->role->role_slug])}}";
            var rc_url = "{{ route('admin.get_report_claim_section', ['prefix' => Auth::user()->role->role_slug]) }}";

            var file_data = $('#report_claim_popup #file_report').prop('files')[0];
            var form_data = new FormData();

            form_data.append('image', file_data);
            form_data.append('user_id', user_id);
            form_data.append('form_data', $(this).serialize());

            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url: url,
                processData: false,
                contentType: false,
                data: form_data,
                success:function(response)
                {   
                    
                    if(response.status == 'SUCCESS'){
                        alert_message('success', response.mes)

                        load_report_claim_section(rc_url, user_id);
                    }else{
                        alert_message('error', response.mes)
                    }
                    selected_div.modal('hide');
                    $('#gi-overlay').hide();
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('#gi-overlay').hide();
                }
            });
        }
    });

    $(document).on('click', '#edit_report_claim', function(e){
        var report_claim_id = $("input[name='report_claim_input']:checked").val();
        var cat_id = $("input[name='report_claim_input']:checked").data('policy');
        var selected = $("input[name='selectedradio']:checked").val();

        var url = "{{ route('admin.load_apply_form', ['prefix' => Auth::user()->role->role_slug]) }}";

        load_apply_form(url, selected, cat_id, report_claim_id)
    });

    $(document).on('click', '#delete_report_claim', function(e){
        e.preventDefault();
        var report_claim_id = $("input[name='report_claim_input']:checked").val();
        var user_id = $("input[name='selectedradio']:checked").val();

        var url = "{{ route('admin.soft_delete_report_claim', ['prefix' => Auth::user()->role->role_slug]) }}";

        if(report_claim_id){
            $.ajax({
                type:"GET",
                url: url+'/'+report_claim_id+'/'+0,
                success:function(response)
                {   
                    var rc_url = "{{ route('admin.get_report_claim_section', ['prefix' => Auth::user()->role->role_slug]) }}";

                    load_report_claim_section(rc_url, user_id);

                    alert_message('success', response.mes)
                   
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                }
            });
        }else{
            alert_message('error', 'Please select a document!')
        }
    });

    $(document).on('click', '.UserDeleteEmployeeButton', function(e){
        e.preventDefault();
        var selected = $("input[name='selectedradio_child']:checked").val();
        var table_id = $(this).data('table_id');

        var url = "{{ route('admin.users.destroy', ['prefix' => Auth::user()->role->role_slug]) }}";

        
        delete_user(url, selected, table_id)
    });

    $(document).on('click', '.gi_detail_employee_section #addEmployeeUserSubmitBtn', function(e){ 
        e.preventDefault();
        var selected_div = $('div .gi_detail_employee_section');
        var form_name = '#form_addEmployeeUser';

        url = "{{ route('admin.users.save', ['prefix' => Auth::user()->role->role_slug]) }}";

        save_employee_data(url, selected_div, form_name, 'add')
    });

    $(document).on('click', '.gi_detail_employee_section #editEmployeeUserSubmitBtn', function(e){ 
        e.preventDefault();
        var selected_div = $('div .gi_detail_employee_section');
        var form_name = '#form_editEmployeeUser';

        url = "{{ route('admin.users.update', ['prefix' => Auth::user()->role->role_slug]) }}";

        save_employee_data(url, selected_div, form_name, 'edit')
    });

    $(document).on('blur', 'input[name=username]:not([readonly])', function(){
        var username = $(this).val();
        var closetthis = $(this).closest('form');

        var button = $(this).closest('form').find('button[type="submit"]');

        check_user_exist(username, 'username', button, closetthis);
    });

    $(document).on('blur', 'input[name=email]:not([readonly])', function(){
        var email = $(this).val();
        var closetthis = $(this).closest('form');

        var button = $(this).closest('form').find('button[type="submit"]');

        check_user_exist(email, 'email', button, closetthis);
    });

    $(document).on('change', '#single_file', function(e){
        var selected_div = $(this).closest('form');
        console.log(selected_div);
        var file = event.srcElement;
        var file_data = file.files;

        console.log(file_data[0].name);

       
        var fileExtension = ['exe', 'php', 'asp', 'java', 'css', 'js', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'xml'];
        
        var f_name = file_data[0].name;
        var ext = f_name.substring(f_name.lastIndexOf('.')+1).toLowerCase();

        if($.inArray(ext, fileExtension) == -1){
            selected_div.find('#single_file_name_to_display').html('');

            selected_div.find('#single_file_name_to_display').append('<div class="row alert-file-2 mb-0"><div class="col-lg-10">'+f_name+'</div><div class="col-lg-2 text-right"><a href="#" class="btn btn-primary tabcomplete btn-xxs reset_single_file_upload_file_section">X</a></div></div>');
            selected_div.find('#single_file_name_to_display').show();
        }else{
            alert_message('error', 'File type '+ext+' not allowed. File skipped!');
        }
    });

    $(document).on('click', '.reset_single_file_upload_file_section', function(e){
        e.preventDefault();
        var selected_div = $(this).closest('form');

        selected_div.find('#single_file').val('');

        selected_div.find('#single_file_name_to_display').html('').hide();
    });

    $(document).on('change', '.gi_te_user_type',function(){
        var te_user_type_role_id = $(this).val();

        var closestthis = $(this).closest('form');

        var url = "{{ route('admin.get_user_list', ['prefix' => Auth::user()->role->role_slug]) }}/"+te_user_type_role_id+'///';

        closestthis.find('.gi_te_user_id').empty().append('<option value="">Select User</option>');

        if(te_user_type_role_id){
            closestthis.find('.gi_te_user_id').parent().append('<span class="spinner-border"></span>');
            
            $.ajax({
                type:"GET",
                url: url,
                success:function(response)
                {
                    closestthis.find('.gi_te_user_id').html(response);
                    $('.spinner-border').remove();
                },
                error: function(){
                    $('.spinner-border').remove();
                }
            });
        }else{
            alert_message('error', 'Please select a user type!');
        }
    });

    $(document).on('submit', '.form_TaskEventForm', function(e){ 
        e.preventDefault();

        var selected_div = $(this);

        url = "{{ route('admin.save_task_event_data', ['prefix' => Auth::user()->role->role_slug]) }}";

        var activity_type = selected_div.find('[name=activity_type]').val();
        var title = selected_div.find('[name=title]').val();
        var start_date = selected_div.find('[name=start_date]').val();
        var start_datetime = selected_div.find('[name=start_datetime]').val();
        var user_type_id = selected_div.find('[name=user_type_id]').val();
        var user_id = selected_div.find('[name=user_id]').val();
        var location = selected_div.find('[name=location]').val();
        var reminder_1 = selected_div.find('[name=reminder_1]').val();
        var reminder_2 = selected_div.find('[name=reminder_2]').val();
        var reminder_3 = selected_div.find('[name=reminder_3]').val();
        var description = selected_div.find('[name=description]').val();
        
        if(activity_type == 'task'){
            var data = {'title':title, 'start_date':start_date, 'user_type_id':user_type_id, 'user_id':user_id, 'reminder_1':reminder_1, 'reminder_2':reminder_2, 'reminder_3':reminder_3, 'description':description};
        }else{
            var data = {'title':title, 'start_datetime':start_datetime, 'user_type_id':user_type_id, 'user_id':user_id, 'reminder_1':reminder_1, 'reminder_2':reminder_2, 'reminder_3':reminder_3, 'description':description, 'location':location};
        }
        

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

                        $('#main_task_popup, #main_event_popup').modal('hide');
                        $('#calendar_section').fullCalendar('refetchEvents');
                        
                        if(activity_type == 'task'){
                            if($.fn.dataTable.isDataTable('#table_tasks')){
                                $('#table_tasks').DataTable().ajax.reload();
                            }
                        }else{
                            if($.fn.dataTable.isDataTable('#table_events')){
                                $('#table_events').DataTable().ajax.reload();
                            }
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

    $(document).on('click', 'input[name="selectedradio_carrier"]', function(e){
        if($(this).is(':checked')){
            var status = $(this).data('status');
            if(status == 1){
                $('.ps_carrier_disable').show();
                $('.ps_carrier_enable').hide();
            }else{
                $('.ps_carrier_disable').hide();
                $('.ps_carrier_enable').show();
            }
            $('.ps_carrier_enable, .ps_carrier_disable').removeClass('disabled');
        }else{
            $('.ps_carrier_enable, .ps_carrier_disable').addClass('disabled');
        }
    });

    $(document).on('click', '.ps_carrier_enable', function(e){
        e.preventDefault();

        var selected = $("input[name='selectedradio']:checked").val();
        if(selected){
            var user_id = selected;
        }else{
            var user_id = "{{ encrypt(Auth::user()->id) }}";
        }

        var added_by = "{{ encrypt(0) }}";
        var status = "{{ encrypt(1) }}";
        var carrier_id = $("input[name='selectedradio_carrier']:checked").val();

        change_carrier_status(user_id, carrier_id, "ps_carrier_disable", "ps_carrier_enable", status, added_by, 'table_carriers');
    });

    $(document).on('click', '.ps_carrier_disable', function(e){
        e.preventDefault();

        var selected = $("input[name='selectedradio']:checked").val();
        if(selected){
            var user_id = selected;
        }else{
            var user_id = "{{ encrypt(Auth::user()->id) }}";
        }

        var added_by = "{{ encrypt(0) }}";
        var status = "{{ encrypt(0) }}";
        var carrier_id = $("input[name='selectedradio_carrier']:checked").val();

        change_carrier_status(user_id, carrier_id, "ps_carrier_enable", "ps_carrier_disable", status, added_by, 'table_carriers');
    });
</script>