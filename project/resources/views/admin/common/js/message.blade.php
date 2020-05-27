<script>
    /**** Script to add ddslick dropdown. ******/
    $(document).ready(function(){
        @if($request_for == 'compose')
            $('#message-hub-compose').trigger('click');
        @elseif($request_for == 'inbox')
            $('#message-hub-inbox').trigger('click');
        @endif
    });

    /**** Script to add ddslick dropdown. ******/
    $(document).on('click','#message-hub-compose',function(){
        var request_for = "{{ encrypt('compose') }}";
        var url = "{{ route('admin.message_section', ['prefix' => Auth::user()->role->role_slug ]) }}";

        load_message_hub_section(url, request_for, 'no', '');
    });

    $(document).on('click','#message-hub-inbox',function(){
        var request_for = "{{ encrypt('inbox') }}";
        var url = "{{ route('admin.message_section', ['prefix' => Auth::user()->role->role_slug ]) }}";
        var thisz = $(this);

        var column_array = [
                                { data: 'f_email', name: 'f_email' },
                                { data: 'subject', name: 'subject' },
                                { data: 'created_at', name: 'created_at' },
                                { data: 'action', name: 'action' },
                            ];

        load_message_hub_section(url, request_for, 'yes', thisz, column_array);
    });

    $(document).on('click','#message-hub-sent',function(){
        var request_for = "{{ encrypt('sent') }}";
        var url = "{{ route('admin.message_section', ['prefix' => Auth::user()->role->role_slug ]) }}";
        var thisz = $(this);

        var column_array = [
                                { data: 't_email', name: 't_email' },
                                { data: 'subject', name: 'subject' },
                                { data: 'created_at', name: 'created_at' },
                                { data: 'action', name: 'action' },
                            ];

        load_message_hub_section(url, request_for, 'yes', thisz, column_array);
    });

    $(document).on('click','#message-hub-draft',function(){
        var request_for = "{{ encrypt('draft') }}";
        var url = "{{ route('admin.message_section', ['prefix' => Auth::user()->role->role_slug ]) }}";
        var thisz = $(this);

        var column_array = [
                                { data: 't_email', name: 't_email' },
                                { data: 'subject', name: 'subject' },
                                { data: 'created_at', name: 'created_at' },
                                { data: 'action', name: 'action' },
                            ];

        load_message_hub_section(url, request_for, 'yes', thisz, column_array);
    });

    $(document).on('click','#message-hub-important',function(){
        var request_for = "{{ encrypt('important') }}";
        var url = "{{ route('admin.message_section', ['prefix' => Auth::user()->role->role_slug ]) }}";
        var thisz = $(this);

        var column_array = [
                                { data: 'f_email', name: 'f_email' },
                                { data: 'subject', name: 'subject' },
                                { data: 'created_at', name: 'created_at' },
                                { data: 'action', name: 'action' },
                            ];

        load_message_hub_section(url, request_for, 'yes', thisz, column_array);
    });

    $(document).on('click','#message-hub-trash',function(){
        var request_for = "{{ encrypt('trash') }}";
        var url = "{{ route('admin.message_section', ['prefix' => Auth::user()->role->role_slug ]) }}";
        var thisz = $(this);

        var column_array = [
                                { data: 'f_email', name: 'f_email' },
                                { data: 't_email', name: 't_email' },
                                { data: 'subject', name: 'subject' },
                                { data: 'created_at', name: 'created_at' },
                                { data: 'action', name: 'action' },
                            ];

        load_message_hub_section(url, request_for, 'yes', thisz, column_array);
    });

    var FileLists = [];

    $(document).on('submit', '#message_hub_form', function(event){ 
        event.preventDefault();
        var closestthis = $(this);

        var url = "{{ route('admin.message.save', ['prefix' => Auth::user()->role->role_slug ]) }}";

        var to_email = $(this).find('select[name="to_email"]').val();
        var subject = $(this).find('input[name="subject"]').val();
        var message = $(this).find('textarea[name="message"]').val();
        
        var count = 0;

        if(to_email == "" || to_email == null){
            closestthis.find('select[name="to_email"]').siblings('.select2').find('.select2-selection').css('border','1px solid #dc3545');//error
            closestthis.find('select[name="to_email"]').siblings('.error-message').css('display', 'block');
            count++; 
        }else{
            closestthis.find('select[name="to_email"]').siblings('.select2').find('.select2-selection').css('border','1px solid #52667e');
            closestthis.find('select[name="to_email"]').siblings('.error-message').css('display', 'none');
        }

        if(subject == ""){
            closestthis.find('input[name="subject"]').css('border','1px solid #dc3545');//error
            closestthis.find('input[name="subject"]').siblings('.error-message').css('display', 'block');
            count++; 
        }else{
            closestthis.find('input[name="subject"]').css('border','1px solid #52667e');
            closestthis.find('input[name="subject"]').siblings('.error-message').css('display', 'none');
        }

        if(message == ""){
            closestthis.find('textarea[name="message"]').css('border','1px solid #dc3545');//error
            closestthis.find('textarea[name="message"]').siblings('.error-message').css('display', 'block');
            count++; 
        }else{
            closestthis.find('textarea[name="message"]').css('border','1px solid #52667e');
            closestthis.find('textarea[name="message"]').siblings('.error-message').css('display', 'none');
        }

        if(count > 0){
            $('html, body').animate({
                scrollTop: closestthis.offset().top
            }, 1500);
            return false;

        }else{

            $('#gi-overlay').show();
            var form_data = new FormData(this);
            $.each(FileLists, function(index, value){
                form_data.append('files_name['+index+']', value);
            });
            
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
                    }else{
                        alert_message('error', response.mes)
                    }
                    FileLists = [];
                    $('#message-hub-sent').trigger('click');
                    $('#gi-overlay').hide();
                },
                error: function(response){
                    $('#gi-overlay').hide();
                }
            });
        }
    });

    

    $(document).on('change', '#file-upload', function(e){
        var file = event.srcElement;
        var file_data = file.files;

        $.each(file_data, function(index, value){
            var fileExtension = ['exe', 'php', 'asp', 'java', 'css', 'js'];
            var f_name = value.name;

            var ext = f_name.substring(f_name.lastIndexOf('.')+1).toLowerCase();

            if($.inArray(ext, fileExtension) == -1){
                FileLists.push(value);
            }else{
                alert_message('error', 'File type '+ext+' not allowed. File skipped!');
            }
        });

        $('#file_name_to_display').html('');
        $.each(FileLists, function(index, value){
            $('#file_name_to_display').append('<div class="row alert-file-2 file_name_div_'+index+'"><div class="col-lg-10 pt-2">'+value.name+'</div><div class="col-lg-2 text-right"><a href="#" class="btn btn-primary tabcomplete btn-xs reset_file_upload" data-file_index="'+index+'">X</a></div></div>');
            $('#file_name_to_display').show();
        });
    });

    $(document).on('click', '.reset_file_upload', function(){
        event.preventDefault();
        var get_index = $(this).data('file_index');

        $('.file_name_div_'+get_index).remove();

        FileLists.splice(get_index, 1);

        $('#file_name_to_display').html('');
        $.each(FileLists, function(index, value){
            $('#file_name_to_display').append('<div class="row alert-file-2 file_name_div_'+index+'"><div class="col-lg-10 pt-2">'+value.name+'</div><div class="col-lg-2 text-right"><a href="#" class="btn btn-primary tabcomplete btn-xs reset_file_upload" data-file_index="'+index+'">X</a></div></div>');
            $('#file_name_to_display').show();
        });
    });

    $(document).on('click', '.view_message', function(event){ 
        event.preventDefault();

        $('#message_detail_popup').modal('show');
        var get_reuquest_type = $(this).data('request_type');

        $('div #message_detail_popup .message_details_div').html('');
        $('div #message_detail_popup .message_details_div').append('<span class="spinner-border-div"></span>'); 

        var get_id = $(this).data('message_id');

        var url = "{{ route('admin.message_details', ['prefix' => Auth::user()->role->role_slug ]) }}/"+get_id+'/'+get_reuquest_type;
        
        if(get_id){
            $.ajax({
                type:"GET",
                url: url,
                success:function(response)
                {
                    $('.spinner-border-div').remove(); 
                    $('div #message_detail_popup .message_details_div').append(response);
                }
            });
        }
    });

    $(document).on('click', '.important_message', function(event){ 
        event.preventDefault();
        $('div .message-hub-div').append('<span class="spinner-border-div"></span>');

        var get_id = $(this).data('message_id');
        var get_reuquest_type = $(this).data('request_type');
        var action_for = "{{ encrypt('important') }}";

        var url = "{{ route('admin.message_action', ['prefix' => Auth::user()->role->role_slug ]) }}/"+get_id+'/'+action_for;

        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {   
                if(response.status == 'SUCCESS'){
                    alert_message('success', response.mes)
                    $('#message-hub-'+get_reuquest_type).trigger('click')
                }else{
                    alert_message('error', response.mes)
                }
                $('.spinner-border-div').remove();
            },
            error: function(response){
                $('.spinner-border-div').remove();
            }
        });
    });

    $(document).on('click', '.delete_message', function(event){ 
        event.preventDefault();
        $('div .message-hub-div').append('<span class="spinner-border-div"></span>');

        var get_id = $(this).data('message_id');
        var get_reuquest_type = $(this).data('request_type');
        var action_for = "{{ encrypt('delete') }}";

        var url = "{{ route('admin.message_action', ['prefix' => Auth::user()->role->role_slug ]) }}/"+get_id+'/'+action_for;

        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {   
                if(response.status == 'SUCCESS'){
                    alert_message('success', response.mes)
                    $('#message-hub-'+get_reuquest_type).trigger('click');
                }else{
                    alert_message('error', response.mes)
                }
                $('.spinner-border-div').remove();
            },
            error: function(response){
                $('.spinner-border-div').remove();
            }
        });
    });
</script>