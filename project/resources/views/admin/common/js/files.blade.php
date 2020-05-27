<script>
    var FileListsToUpload = [];
    /**** Script to add ddslick dropdown. ******/
    $(document).on('click','div .gi_detail_section input[name="requested_file_name"]',function(){ 
        var thisz = $(this);
        var parent_div = $(this).closest('.stretched_card');
        var button_parent_div = parent_div.parent().find(".file_button_section");
        file_request_button(thisz, parent_div, button_parent_div);
    });

    /**** Script to add ddslick dropdown. ******/
    $(document).on('click','div .gi_detail_section #file_request_button',function(){ 
        var thisz = $(this);
        file_request_action(thisz, 'request');
    });

    /**** Script to add ddslick dropdown. ******/
    $(document).on('click','div .gi_detail_section #file_attach_button',function(){ 
        var thisz = $(this);
        file_request_action(thisz, 'attach');
    });

    /**** Script to add ddslick dropdown. ******/
    $(document).on('click','div .gi_detail_section #file_response_button',function(){ 
        var thisz = $(this);
        file_request_action(thisz, 'responce');
    });

    $(document).on('click','div .gi_detail_section #pl_upload_button',function(){ 
        var thisz = $(this);
        file_request_action(thisz, 'upload');
    });

    $(document).on('submit', '.document_req_form', function(event){ 
        event.preventDefault();
        var closestthis = $(this);

        var url = "{{ route('admin.save_file_request', ['prefix' => Auth::user()->role->role_slug ]) }}";
        var file_url = "{{ route('admin.get_file_section', ['prefix' => Auth::user()->role->role_slug ]) }}";

        var    user_id = $("input[name='selectedradio']:checked").val();

        var    document_type = closestthis.find('select[name="document_type"]').val();
        var    file_name = closestthis.find('input[name="file_name"]').val();
        var    description = closestthis.find('textarea[name="description"]').val();
        var    file = closestthis.find('input[name="file"]').val();
        var    submit_before = closestthis.find('input[name="submit_before"]').val();
        var    request_id = closestthis.find('input[name="request_id"]').val();
        var    request_type = closestthis.find('input[name="request_type"]').val();

        var count = 0;
        
        if(request_id){
            if(description == ""){
                closestthis.find('textarea[name="description"]').css('border','1px solid #dc3545');//error
                closestthis.find('textarea[name="description"]').siblings('.error-message').css('display', 'block');
                count++; 
            }else{
                closestthis.find('textarea[name="description"]').css('border','1px solid #d1e9fc');
                closestthis.find('textarea[name="description"]').siblings('.error-message').css('display', 'none');
            }
        }else{
            if(document_type == "") {
                closestthis.find('select[name="document_type"]').css('border','1px solid #dc3545');//error
                closestthis.find('select[name="document_type"]').siblings('.error-message').css('display', 'block');
                count++; 
            }else{
                closestthis.find('select[name="document_type"]').css('border','1px solid #d1e9fc');  
                closestthis.find('select[name="document_type"]').siblings('.error-message').css('display', 'none');        
            }

            // if(file_name == ""){
            //     closestthis.find('input[name="file_name"]').css('border','1px solid #dc3545');//error
            //     closestthis.find('input[name="file_name"]').siblings('.error-message').css('display', 'block');
            //     count++; 
            // }else{
            //     closestthis.find('input[name="file_name"]').css('border','1px solid #d1e9fc');
            //     closestthis.find('input[name="file_name"]').siblings('.error-message').css('display', 'none');
            // }

            if(description == ""){
                closestthis.find('textarea[name="description"]').css('border','1px solid #dc3545');//error
                closestthis.find('textarea[name="description"]').siblings('.error-message').css('display', 'block');
                count++; 
            }else{
                closestthis.find('textarea[name="description"]').css('border','1px solid #d1e9fc');
                closestthis.find('textarea[name="description"]').siblings('.error-message').css('display', 'none');
            }

            if(submit_before == ""){
                closestthis.find('input[name="submit_before"]').css('border','1px solid #dc3545');//error
                closestthis.find('input[name="submit_before"]').siblings('.error-message').css('display', 'block');
                count++; 
            }else{
                closestthis.find('input[name="submit_before"]').css('border','1px solid #d1e9fc');
                closestthis.find('input[name="submit_before"]').siblings('.error-message').css('display', 'none');
            }
        }

        if(count > 0){
            $('html, body').animate({
                scrollTop: closestthis.offset().top
            }, 1500);
            return false;

        }else{

            if(file_name != '' && description != ''){
                $('#gi-overlay').show();

                var form_data = new FormData();

                $.each(FileListsToUpload, function(index, value){
                    form_data.append('images['+index+']', value);
                });

                form_data.append('request_id', request_id);
                form_data.append('user_id', user_id);
                form_data.append('description', description);
                form_data.append('document_type', document_type);
                form_data.append('file_name', file_name);
                form_data.append('submit_before', submit_before);
                form_data.append('request_type', request_type);
                
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

                            FileListsToUpload = [];

                            if(request_type == 1){
                                $('#table_files').DataTable().ajax.reload();
                                closestthis.find('[name="description"], [name="image"], [name="document_type"], [name="submit_before"]').val('');
                            }else if(request_type == 2){
                                $('#table_attachments').DataTable().ajax.reload();
                                closestthis.find('[name="description"], [name="image"], [name="document_type"], [name="submit_before"]').val('');
                            }else{
                                $('#table_personal_lib').DataTable().ajax.reload();
                                closestthis.find('[name="description"], [name="image"], [name="document_type"]').val('');
                            }

                            closestthis.find('#file_name_to_display').html('').hide();

                            if(request_id){
                                $('#document_response_form').hide();
                                $('#file_response_button').html('<i class="fa fa-arrow-up"></i>Request');
                                $('#file_response_button').attr('id', 'file_request_button');
                                $('.file_download_button').addClass('disabled');
                            }
                        }else{
                            alert_message('error', response.mes)
                        }
                        $('#gi-overlay').hide();
                    },
                    error: function(){
                        alert_message('error', 'Opps! Something went wrong.');
                        $('#gi-overlay').hide();
                    }
                });
            } else {
                alert_message('error', 'Please fill the form!')
            }
        }
    });

    $(document).on('change', '#file, #file_resp, #attach, #upload_pl', function(e){
        var selected_div = $(this).closest('form');
        console.log(selected_div);
        var file = event.srcElement;
        var file_data = file.files;

        $.each(file_data, function(index, value){
            var fileExtension = ['exe', 'php', 'asp', 'java', 'css', 'js'];
            var f_name = value.name;

            var ext = f_name.substring(f_name.lastIndexOf('.')+1).toLowerCase();

            if($.inArray(ext, fileExtension) == -1){
                FileListsToUpload.push(value);
            }else{
                alert_message('error', 'File type '+ext+' not allowed. File skipped!');
            }
        });

        selected_div.find('#file_name_to_display').html('');
        $.each(FileListsToUpload, function(index, value){
            selected_div.find('#file_name_to_display').append('<div class="row alert-file-2 file_name_div_'+index+'"><div class="col-lg-10 pt-2">'+value.name+'</div><div class="col-lg-2 text-right"><a href="#" class="btn btn-primary tabcomplete btn-xs reset_file_upload_file_section" data-file_index="'+index+'">X</a></div></div>');
            selected_div.find('#file_name_to_display').show();
        });
    });

    $(document).on('click', '.reset_file_upload_file_section', function(){
        event.preventDefault();
        var selected_div = $(this).closest('form');

        var get_index = $(this).data('file_index');

        $('.file_name_div_'+get_index).remove();

        FileListsToUpload.splice(get_index, 1);

        selected_div.find('#file_name_to_display').html('');
        $.each(FileListsToUpload, function(index, value){
            selected_div.find('#file_name_to_display').append('<div class="row alert-file-2 file_name_div_'+index+'"><div class="col-lg-10 pt-2">'+value.name+'</div><div class="col-lg-2 text-right"><a href="#" class="btn btn-primary tabcomplete btn-xs reset_file_upload_file_section" data-file_index="'+index+'">X</a></div></div>');
            selected_div.find('#file_name_to_display').show();
        });

        if(FileListsToUpload.length == 0){
            selected_div.find('#file_name_to_display').hide();
        }
    });

    $(document).on('click', '.file_download_button', function(event){ 
        event.preventDefault();

        var user_id = $("input[name='selectedradio']:checked").val();
        var checked_input = $('input[name="requested_file_name"]:checked').val();

        $('#file_list_detail_popup').modal('show');
        $('div #file_list_detail_popup .files_list_details_div').html('');
        
        $('div #file_list_detail_popup .files_list_details_div').append('<span class="spinner-border-div"></span>'); 

        var url = "{{ route('admin.file_list', ['prefix' => Auth::user()->role->role_slug ]) }}/"+user_id+'/'+checked_input;
        
        if(checked_input && user_id){
            $.ajax({
                type:"GET",
                url: url,
                success:function(response)
                {
                    $('.spinner-border-div').remove();
                    $('div #file_list_detail_popup .files_list_details_div').append(response);
                }
            });
        }
    });

    $(document).on("click", "#v-pills-requests-tab", function(){
        $('.file_download_button, .file_activate_button, .file_deactivate_button, .file_delete_button').addClass('disabled');

        $('#table_files').DataTable().ajax.reload();
    });

    $(document).on("click", "#v-pills-attachment-tab", function(){
        var selected = $("input[name='selectedradio']:checked").val();
        $('.file_download_button, .file_activate_button, .file_deactivate_button, .file_delete_button').addClass('disabled');

        var url = "{{ route('admin.get_file_section', ['prefix' => Auth::user()->role->role_slug]) }}";

        if(!$.fn.dataTable.isDataTable('#table_attachments')){
            $('#table_attachments').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.get_file_list_datatables', ['prefix' => Auth::user()->role->role_slug ]) }}/'+selected+'/'+2,
                columns: [
                          { data: 'input', name: 'input', orderable: false, searchable: false , sortable: false},
                          { data: 'document_name', name: 'document_name' },
                          { data: 'description', name: 'description' },
                          { data: 'date', name: 'date' },
                          { data: 'submit_before', name: 'submit_before' },
                          { data: 'requestor_name', name: 'requestor_name' },
                          { data: 'status', name: 'status' },
                          { data: 'reply', name: 'reply' },
                       ],
                order: [[3, 'desc']],
                autoWidth: true,
                "createdRow": function( row, data, dataIndex ) {
                        if(data.status == "Pending" || data.status == "Deactivated") {        
                            $(row).addClass('tr-red');
                        }
                    }
            });
        }else{
            $('#table_attachments').DataTable().ajax.reload();
        }
    });

    $(document).on("click", ".file_activate_button", function(){
        event.preventDefault();

        var thiszc = $(this).closest('.file_button_section');
        var user_id = $("input[name='selectedradio']:checked").val();
        var parent_div = $(this).closest('.file_button_section').parent().find(".stretched_card");
        var checked_input = parent_div.find('input[name="requested_file_name"]:checked').val();
        var request_type = parent_div.find('input[name="requested_file_name"]:checked').data('request_type');
        var status = "{{ encrypt(1) }}"; 

        change_file_request_status(thiszc, status, user_id, checked_input, request_type);
    });

    $(document).on("click", ".file_deactivate_button", function(){
        event.preventDefault();

        var thiszc = $(this).closest('.file_button_section');
        var user_id = $("input[name='selectedradio']:checked").val();
        var parent_div = $(this).closest('.file_button_section').parent().find(".stretched_card");
        var checked_input = parent_div.find('input[name="requested_file_name"]:checked').val();
        var request_type = parent_div.find('input[name="requested_file_name"]:checked').data('request_type');
        var status = "{{ encrypt(2) }}"; 

        change_file_request_status(thiszc, status, user_id, checked_input, request_type);
    });

    $(document).on("click", ".file_delete_button", function(){
        event.preventDefault();

        var thiszc = $(this).closest('.file_button_section');
        var user_id = $("input[name='selectedradio']:checked").val();
        var parent_div = $(this).closest('.file_button_section').parent().find(".stretched_card");
        var checked_input = parent_div.find('input[name="requested_file_name"]:checked').val();
        var request_type = parent_div.find('input[name="requested_file_name"]:checked').data('request_type');
        var status = "{{ encrypt(0) }}"; 

        change_file_request_status(thiszc, status, user_id, checked_input, request_type);
    });

    $(document).on("click", "#pl_attach_button", function(){
        event.preventDefault();

        var thiszc = $(this).closest('.file_button_section');
        var user_id = $("input[name='selectedradio']:checked").val();
        var parent_div = $(this).closest('.file_button_section').parent().find(".stretched_card");
        var checked_input = parent_div.find('input[name="requested_file_name"]:checked').val();
        var request_type = "{{ encrypt(2) }}";

        set_file_as_request_attachment(thiszc, user_id, checked_input, request_type);
    });

    $(document).on("click", "#pl_request_button", function(){
        event.preventDefault();

        var thiszc = $(this).closest('.file_button_section');
        var user_id = $("input[name='selectedradio']:checked").val();
        var parent_div = $(this).closest('.file_button_section').parent().find(".stretched_card");
        var checked_input = parent_div.find('input[name="requested_file_name"]:checked').val();
        var request_type = "{{ encrypt(1) }}";

        set_file_as_request_attachment(thiszc, user_id, checked_input, request_type);
    });

    $(document).on("click", "#al_edit_button", function(){
        event.preventDefault();

        var thiszc = $(this).closest('.file_button_section');
        var user_id = $("input[name='selectedradio']:checked").val();
        var parent_div = $(this).closest('.file_button_section').parent().find(".stretched_card");
        var checked_input = parent_div.find('input[name="requested_file_name"]:checked').val();
        var request_type = "{{ encrypt(4) }}";

        edit_archive_library_file(thiszc, user_id, checked_input, request_type);
    });

    $(document).on('change', '#user_type_role_id',function(){
        var user_type_role_id = $(this).val();
        var zipcode = $('.searchZipcodeUser').val();
        var city_id = $('.searchCityUser').val();
        var state_code = $('.searchStateUser').val();

        var closestthis = $(this).closest('.usertype-search');

        var url = "{{ route('admin.get_user_list', ['prefix' => Auth::user()->role->role_slug]) }}/"+user_type_role_id+'/'+state_code+'/'+city_id+'/'+zipcode;

        closestthis.find('#user_data_id').empty().append('<option  value="" >Select User</option>');

        if(user_type_role_id){
            get_user_list(url);
        }else{
            alert_message('error', 'Please select a user type!');
        }
    });

    $(document).on('change','.searchStateUser', function(){
        var state_code = $(this).val();
        var user_type_role_id = $('#user_type_role_id').val();
        var closestthis = $(this).closest('.usertype-search');

        closestthis.find('.searchCityUser').empty().append('<option value="">Select City</option>');
        closestthis.find('.searchZipcodeUser').empty().append('<option value="">Select Zipcode</option>');
        closestthis.find('#user_data_id').empty().append('<option  value="" >Select User</option>');

        if(state_code){
            closestthis.find('#user_data_id').parent().append('<span class="spinner-border"></span>');
            closestthis.find('.searchCityUser').parent().append('<span class="spinner-border"></span>');
            
            var url = "{{ route('admin.get-cities-list', ['prefix' => Auth::user()->role->role_slug ]) }}";
            set_location_data(url, state_code, closestthis, '.searchCityUser');
        }

        var url = "{{ route('admin.get_user_list', ['prefix' => Auth::user()->role->role_slug]) }}/"+user_type_role_id+'/'+state_code;

        $('#user_data_id').empty().append('<option  value="" >Select User</option>');

        if(user_type_role_id){
            get_user_list(url);
        }else{
            alert_message('error', 'Please select a user type!');
        }
    });

    $(document).on('change','.searchCityUser', function(){
        var city_id = $(this).val();
        var state_code = $('.searchStateUser').val();
        var user_type_role_id = $('#user_type_role_id').val();
        var closestthis = $(this).closest('.usertype-search');

        closestthis.find('.searchZipcodeUser').empty().append('<option value="">Select Zipcode</option>');
        closestthis.find('#user_data_id').empty().append('<option  value="" >Select User</option>');

        if(city_id){
            closestthis.find('#user_data_id').parent().append('<span class="spinner-border"></span>');
            closestthis.find('.searchZipcodeUser').parent().append('<span class="spinner-border"></span>');
            
            var url = "{{ route('admin.get-zipcodes-list', ['prefix' => Auth::user()->role->role_slug ]) }}";
            set_location_data(url, city_id, closestthis, '.searchZipcodeUser');
        } 

        var url = "{{ route('admin.get_user_list', ['prefix' => Auth::user()->role->role_slug]) }}/"+user_type_role_id+'/'+state_code+'/'+city_id;

        $('#user_data_id').empty().append('<option  value="" >Select User</option>');

        if(user_type_role_id){
            get_user_list(url);
        }else{
            alert_message('error', 'Please select a user type!');
        }
    });

    $(document).on('change','.searchZipcodeUser', function(){
        var zipcode = $(this).val();
        var city_id = $('.searchCityUser').val();
        var state_code = $('.searchStateUser').val();
        var user_type_role_id = $('#user_type_role_id').val();
        var closestthis = $(this).closest('.usertype-search');

        closestthis.find('#user_data_id').empty().append('<option  value="" >Select User</option>');

        if(zipcode){
            closestthis.find('#user_data_id').parent().append('<span class="spinner-border"></span>');
            closestthis.find('.searchCounty').parent().append('<span class="spinner-border"></span>');

            var url = "{{ route('admin.get-county', ['prefix' => Auth::user()->role->role_slug ]) }}";
            set_location_data(url, zipcode, closestthis, '.searchCounty');
        }

        var url = "{{ route('admin.get_user_list', ['prefix' => Auth::user()->role->role_slug]) }}/"+user_type_role_id+'/'+state_code+'/'+city_id+'/'+zipcode;

        $('#user_data_id').empty().append('<option  value="" >Select User</option>');

        if(user_type_role_id){
            get_user_list(url);
        }else{
            alert_message('error', 'Please select a user type!');
        }
    });

    $(document).on('click', '#user_data_id',function(){
        var user_data_id = $(this).val();
        var url = "{{ route('admin.get_file_section', ['prefix' => Auth::user()->role->role_slug ]) }}";

        if(user_data_id){
            $("input[name='selectedradio']:checked").val(user_data_id);
            load_file_section(url, user_data_id, 1, 'table_files');
        }else{
            alert_message('error', 'Please select a user!');
        }
    });

    $(document).on("click", "#v-pills-library-tab", function(){
        var selected = $("input[name='selectedradio']:checked").val();
        $('#pl_send_message_button, #pl_send_email_button, #pl_attach_button, #pl_request_button, .file_download_button, .file_activate_button, .file_deactivate_button, .file_delete_button').addClass('disabled');

        var url = "{{ route('admin.get_file_section', ['prefix' => Auth::user()->role->role_slug]) }}";

        if(!$.fn.dataTable.isDataTable('#table_personal_lib')){
            $('#table_personal_lib').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.get_file_list_datatables', ['prefix' => Auth::user()->role->role_slug ]) }}/'+selected+'/'+3,
                columns: [
                          { data: 'input', name: 'input', orderable: false, searchable: false , sortable: false},
                          { data: 'document_name', name: 'document_name' },
                          { data: 'file_name', name: 'file_name' },
                          { data: 'description', name: 'description' },
                          { data: 'date', name: 'date' },
                          { data: 'status', name: 'status' },
                       ],
                order: [[3, 'desc']],
                autoWidth: true,
                "createdRow": function( row, data, dataIndex ) {
                        if(data.status == "Pending" || data.status == "Deactivated") {        
                            $(row).addClass('tr-red');
                        }
                    }
            });
        }else{
            $('#table_personal_lib').DataTable().ajax.reload();
        }

        if(!$.fn.dataTable.isDataTable('#table_archive_lib')){
            $('#table_archive_lib').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.get_archive_file_list_datatables', ['prefix' => Auth::user()->role->role_slug ]) }}/'+selected,
                columns: [
                          { data: 'input', name: 'input', orderable: false, searchable: false , sortable: false},
                          { data: 'document_name', name: 'document_name' },
                          { data: 'file_name', name: 'file_name' },
                          { data: 'description', name: 'description' },
                          { data: 'created_at', name: 'created_at' },
                          { data: 'status', name: 'status' },
                       ],
                order: [[3, 'desc']],
                autoWidth: true,
                "createdRow": function( row, data, dataIndex ) {
                        if(data.status == "Pending" || data.status == "Deactivated") {        
                            $(row).addClass('tr-red');
                        }
                    }
            });
        }else{
            $('#table_archive_lib').DataTable().ajax.reload();
        }
    });
</script>