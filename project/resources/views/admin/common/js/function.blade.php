<script type="">
    function alert_message(type, mes){
        $('.gi-alert-'+type).html(mes);
        $('.gi-alert-'+type).show();
        $('.gi-alert-'+type).fadeTo(2000, 500).slideUp(500, function(){
            $('.gi-alert-'+type).slideUp(500);
        });
    }
   
    function get_city_zipcode_county_for_multiple_state_city_zipcode(url, code, closestthis, selected){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:"POST",
            url: url,
            data:{code: code},
            success:function(response)
            {
                closestthis.find(selected).select2({
                    data: response
                });

                $('.spinner-border').remove();
            }
        });
    }

    function set_location_data(url, id, closestthis, selectclass){
        $.ajax({
            type:"GET",
            url: url+'/'+id,
            success:function(response){
                if(selectclass == '.county' || selectclass == '.searchCounty'){
                    closestthis.find(selectclass).val(response);
                }else{
                    closestthis.find(selectclass).html(response);
                }
                $('.spinner-border').remove();

            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('.spinner-border').remove();
            }
        });
    }

    //function to get available policies for selected area
    function get_policies_list_by_ajax(url, state_code, city_id, zipcode, id, closestthis){
        $.ajax({
            type:"GET",
            url: url+'/'+state_code+'/'+city_id+'/'+zipcode+'/'+id,
            success:function(response)
            {
                closestthis.find('.policiesSection').html(response);
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
            }
        });
    } 

    //function to delete user
    function delete_user(url, selected, table_id){
        if(selected){
            $('#gi-overlay').show();
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url: url,
                data: {"user_id": selected},
                success:function(response)
                {
                    $('#gi-overlay').hide();
                    if(response.status == 'SUCCESS'){
                        alert_message('success', response.mes);
                        var table = $('#'+table_id).DataTable();
                        table.ajax.reload();
                    }else{
                        alert_message('error', 'Opps! Something went wrong.')
                    }
                },
                error:function(){
                    $('#gi-overlay').hide();
                    alert_message('error', 'Opps! Something went wrong.')
                }
            });
        }  else{
            alert_message('error', 'Please select a user!')
        }
    }
    //function for ddslick append
    // function set_ddslick_dropdown(){
    //     var state_code = $('div  .gi_detail_section [name="state"]').val();
    //     var city_id = $('div .gi_detail_section [name="city"]').val();
    //     var zipcode = $('div .gi_detail_section [name="zipcode"]').val();

    //     ddData = [];

    //     $('.policiesSection input[name="access_to_products[]').each(function() {
    //         if($(this).is(':checked')){
    //             var imageSrc = $(this).data('policy');
    //             var imageSrc = "{{ asset('images') }}"+'/'+imageSrc.toLowerCase()+'.png';

    //             item = {}
    //             item ["text"] = $(this).data('policy');
    //             item ["value"] = $(this).val();
    //             item ["selected"] = false;
    //             item ["imageSrc"] = imageSrc;
    //             item ["state_code"] = state_code;
    //             item ["city_id"] = city_id;
    //             item ["zipcode"] = zipcode;


    //             ddData.push(item);
    //         }
    //     });

    //     $('#product_select').ddslick({
    //         data:ddData,
    //         width: '100%',
    //         onSelected: function(data){
    //             $('div .gi_detail_section').find('.compare_insurance_div').html('<div class="spinner-border-div"></div>');
    //             getInduranceOptions(data);
    //         }
    //     });
    // }

    //function for ddslick append
    function set_ddslick_dropdown(){
        // var state_code = $('div  .gi_detail_section [name="state"]').val();
        // var city_id = $('div .gi_detail_section [name="city"]').val();
        // var zipcode = $('div .gi_detail_section [name="zipcode"]').val();

        // ddData = [];

        // $('.policiesSection input[name="access_to_products[]').each(function() {
        //     if($(this).is(':checked')){
        //         var imageSrc = $(this).data('policy');
        //         var imageSrc = "{{ asset('images') }}"+'/'+imageSrc.toLowerCase()+'.png';

        //         item = {}
        //         item ["text"] = $(this).data('policy');
        //         item ["value"] = $(this).val();
        //         item ["selected"] = false;
        //         item ["imageSrc"] = imageSrc;
        //         item ["state_code"] = state_code;
        //         item ["city_id"] = city_id;
        //         item ["zipcode"] = zipcode;


        //         ddData.push(item);
        //     }
        // });

        $('#product_select').ddslick({
            //data:ddData,
            width: '100%',
            onSelected: function(selectedData){
                $('div .gi_detail_section').find('.compare_insurance_div').html('<div class="spinner-border-div"></div>');
                getInduranceOptions(selectedData);
            }
        });
    }

    //function to get the insurance options
    function getInduranceOptions(data){
        var selected = $("input[name='selectedradio']:checked").val();
        $.ajax({
            type:"GET",
            url: "{{ route('admin.get_insurance_options', ['prefix' => Auth::user()->role->role_slug]) }}"+'/'+selected+'/'+data.selectedData.value,

            success:function(response){
                $('div .gi_detail_section').find('.compare_insurance_div').html(response);
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
            }
        });
    }

    //function to check valid/invalid email address
    function isValidEmail(email_id){
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(email_id)) {
            return true;
        } else {
            return false;
        }
    }

    //function to check valid/invalid data
    function validation_check(data, selected_div, scroll = 'yes'){
        var count = 0;
        $.each(data, function(key, value) {
            if(key == 'email'){
                if(value != "" && isValidEmail(value)){
                    selected_div.find('[name='+key+']').css('border','1px solid #d1e9fc');
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'none');
                }else{
                    selected_div.find('[name='+key+']').css('border','1px solid #dc3545'); //error
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'block');
                    count++;         
                }
            }else if(key == 'password'){
                if(value == "" ||  value.length < 8 || value.length > 16){
                    selected_div.find('[name='+key+']').css('border','1px solid #dc3545'); //error
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'block');
                    count++; 
                }else{
                    selected_div.find('[name='+key+']').css('border','1px solid #d1e9fc');
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'none');          
                }
            }else if(key == 'confirmed'){
                if(value == "" ||  value.length < 8 || value.length > 16 || value != data.password){
                    selected_div.find('[name='+key+']').css('border','1px solid #dc3545'); //error
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'block');
                    count++; 
                }else{
                    selected_div.find('[name='+key+']').css('border','1px solid #d1e9fc');
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'none');          
                }
            }else if(key == 'phone_number'){
                if(value == "" || !$.isNumeric(value)){
                    selected_div.find('[name='+key+']').css('border','1px solid #dc3545'); //error
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'block');
                    count++; 
                }else{
                    selected_div.find('[name='+key+']').css('border','1px solid #d1e9fc');
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'none');          
                }
            }else if(key == 'security_code'){
                if(value == "" ||  value.length < 3 || value.length > 4 || !$.isNumeric(value)){
                    selected_div.find('[name='+key+']').css('border','1px solid #dc3545'); //error
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'block');
                    count++;   
                }else{
                    selected_div.find('[name='+key+']').css('border','1px solid #d1e9fc');
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'none');
                }
            }else if(key == 'card_number'){
                if(value == "" ||  value.length < 14 || value.length > 16 || !$.isNumeric(value)){
                    selected_div.find('[name='+key+']').css('border','1px solid #dc3545'); //error
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'block');
                    count++; 
                }else{
                    selected_div.find('[name='+key+']').css('border','1px solid #d1e9fc');
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'none');
                }
            }else{
                if(value == "" ){
                    selected_div.find('[name='+key+']').css('border','1px solid #dc3545'); //error
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'block');
                    count++; 
                }else{
                    selected_div.find('[name='+key+']').css('border','1px solid #d1e9fc');  
                    selected_div.find('[name='+key+']').siblings('.error-message').css('display', 'none');        
                }
            }
        });

        if(count > 0){
            $.each(data, function(key, value) {
                if(value == "" ){
                    if(scroll == 'yes'){
                        $('html, body').animate({
                            scrollTop: selected_div.find('[name='+key+']').offset().top - 200
                        }, 1500);
                    }
                
                    return false;
                }
            });
            return false;
        }else{
            return true;
        }
    }

    function insurance_option_continue_button(thisz){
        event.preventDefault();
        var closestthis = thisz.closest('.gi_detail_section');

        var policy_id = thisz.parent().parent().find('input[name="compare_io"]:checked').val();

        if(policy_id > 0){
            var price = thisz.parent().parent().find('input[name="compare_io"]:checked').data('price');
            closestthis.find('input[name="total_premium"]').val('$'+price+'/Month');
            closestthis.find('input[name="cpd_id"]').val(policy_id);
            closestthis.find('input[name="policy_amount"]').val(price);
            closestthis.find('input[name="policy_id"]').val('');
            closestthis.find('input[name="policy_number"]').val('');
    
            $('#v-payment-tab').trigger('click');
        }else{
            alert_message('error', 'Please select an insurance option!')
        }
    }

    function file_request_button(thisz, parent_div, button_parent_div){
        if(thisz.is(':checked')){
            var user_id = $("input[name='selectedradio']:checked").val();
            var status_id = $(thisz).data('status_id');

            parent_div.find('input[name="requested_file_name"]').not(thisz).prop('checked', false);
            //$(thisz).prop('checked', true);

            $('#document_request_form').hide();
            button_parent_div.find('#file_request_button').html('<i class="fa fa-arrow-up"></i>Responce');
            button_parent_div.find('#file_request_button').attr('id', 'file_response_button');

            button_parent_div.find('.file_download_button, .file_activate_button, .file_deactivate_button, .file_view_button').removeClass('disabled');

            if(status_id == 2){
                button_parent_div.find('.file_deactivate_button').hide();
                button_parent_div.find('.file_activate_button').show();
                button_parent_div.find('.file_delete_button').removeClass('disabled');
            }else{
                button_parent_div.find('.file_deactivate_button').show();
                button_parent_div.find('.file_activate_button').hide();
                button_parent_div.find('.file_delete_button').addClass('disabled');

                button_parent_div.find('#pl_send_message_button, #pl_send_email_button, #pl_attach_button, #pl_request_button').removeClass('disabled');
            }
        }else{
            $('#document_response_form').hide();
            button_parent_div.find('#file_response_button').html('<i class="fa fa-arrow-up"></i>Request');
            button_parent_div.find('#file_response_button').attr('id', 'file_request_button');

            button_parent_div.find('.file_deactivate_button').hide();
            button_parent_div.find('.file_activate_button').show();

            button_parent_div.find('#pl_send_message_button, #pl_send_email_button, #pl_attach_button, #pl_request_button, .file_download_button, .file_activate_button, .file_deactivate_button, .file_delete_button, .file_view_button').addClass('disabled');
        }
    }

    function file_request_action(thisz, type){
        FileListsToUpload = [];
        $('#file_name_to_display').html('').hide();
        if(type == 'responce'){
            var user_id = $("input[name='selectedradio']:checked").val();
            var checked_input = $('input[name="requested_file_name"]:checked');

            $('#res_request').val('Government ID');
            $('#res_type').val('Government ID');
            $('#res_description').val(checked_input.data('desc'));
            $('#res_date').val(checked_input.data('date'));
            $('#res_submit_before').val(checked_input.data('s_before'));
            $('#res_requestor_name').val(checked_input.data('r_name'));
            $('#res_status').val(checked_input.data('status'));
            $('#res_status_2').val(checked_input.data('status'));
            $('#res_file_name').val(checked_input.data('f_name'));
            $('#file_name').val('');
            $('#res_request_id').val(checked_input.val());

            $('#res_file_download').attr("href", '{{ asset("uploads") }}/'+user_id+'/files/'+checked_input.data('f_name'));
            

            $('#document_request_form').hide();
            $('#document_response_form').show();
            $('html, body').animate({
                scrollTop: $("#document_response_form").offset().top
            }, 1500);
        }else if(type == 'request'){
            $('#req_file_name').val('');
            $('#document_request_form').show();
            $('#document_response_form').hide();
            $('html, body').animate({
                scrollTop: $("#document_request_form").offset().top
            }, 1500);
        }else if(type == 'upload'){
            $('#req_file_name').val('');
            $('#document_response_form, #document_request_form, #document_attachment_form').hide();
            $('#document_upload_form').show();
            $('html, body').animate({
                scrollTop: $("#document_upload_form").offset().top
            }, 1500);
        }else{
            $('#req_file_name').val('');
            $('#document_attachment_form').show();
            $('#document_request_form').hide();
            $('#document_response_form').hide();
            $('html, body').animate({
                scrollTop: $("#document_attachment_form").offset().top
            }, 1500);
        }
    }

    function load_add_section(url, ddslick){
        $('#gi-overlay').show();
        $('.gi_detail_section').css('display','block');
        
        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {
                $('.gi_detail_section').html(response);
                $('.edit-btn-div').remove();
                $('#gi-overlay').hide();

                $('html, body').animate({
                    scrollTop: $(".gi_detail_section").offset().top - 100
                }, 1500);

                if(ddslick == 'yes'){
                    $('#product_select').ddslick({
                        width: '100%',
                        selectText: "Save your form first to display the categories.",
                    });
                }
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('#gi-overlay').hide();
            }
        });
    }

    function load_edit_section(url, ddslick, selected){
        $('#gi-overlay').show();
        $('.gi_detail_section').css('display','block');
        
        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {
                $('.gi_detail_section').html(response);
                $('#gi-overlay').hide();

                $('html, body').animate({
                    scrollTop: $(".gi_detail_section").offset().top - 100
                }, 1500);
                
                if(ddslick == 'yes'){
                    set_ddslick_dropdown();
                }
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('#gi-overlay').hide();
            }
        });
    }

    function load_file_section(url, selected, type, table_name){
        $('div .file-section-div').html('');
        $('.file-section-div').append('<span class="spinner-border-div"></span>'); 
        
        if(selected != ''){
            $.ajax({
                type:"GET",
                url: url,

                success:function(response)
                {
                    $('.spinner-border-div').remove(); 
                    $('div .file-section-div').html('');
                    $('div .file-section-div').append(response);

                    $('#'+table_name).DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.get_file_list_datatables', ['prefix' => Auth::user()->role->role_slug ]) }}/'+selected+'/'+type,
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
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('.spinner-border-div').remove();
                }
            });
        }
    }

    function load_report_claim_section(url, selected){
        $('div #v-report-claim').html('');
        $('#v-report-claim').append('<span class="spinner-border-div"></span>'); 
        
        if(selected != ''){
            $.ajax({
                type:"GET",
                url: url+'/'+selected,
                success:function(response)
                {
                    $('.spinner-border-div').remove(); 
                    $('div #v-report-claim').html('');
                    $('div #v-report-claim').append(response);

                    $('#table_report_claim').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.get_report_claim_list_datatables', ['prefix' => Auth::user()->role->role_slug ]) }}/'+selected,
                    columns: [
                              { data: 'input', name: 'input', orderable: false, searchable: false , sortable: false},
                              { data: 'id', name: 'id' },
                              { data: 'injured_person_name', name: 'injured_person_name' },
                              { data: 'policy_type', name: 'policy_type' },
                              { data: 'carrier_name', name: 'carrier_name' },
                              { data: 'created_at', name: 'created_at' },
                              { data: 'updated_at', name: 'updated_at' },
                              { data: 'status', name: 'status' },
                           ],
                    order: [[0, 'desc']],
                  });
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('.spinner-border-div').remove();
                }
            });
        }
    }

    function get_policies_list(url, selected, value){
        $('#policies_list_popup').modal('show');
        $('div #policies_list_popup .policies_list_div').append('<span class="spinner-border-div"></span>'); 
        
        if(selected != ''){
            $.ajax({
                type:"GET",
                url: url+'/'+selected+'/'+value,
                success:function(response)
                {
                    $('.spinner-border-div').remove(); 
                    $('div #policies_list_popup .policies_list_div').html('');
                    $('div #policies_list_popup .policies_list_div').append(response);
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('.spinner-border-div').remove();
                }
            });
        }
    }

    function load_apply_form(url, selected, value, rc_id){
        $('#report_claim_popup').modal('show');
        $('div #report_claim_popup .report_claim_div').append('<span class="spinner-border-div"></span>'); 
        value = value != '' ? value : 'null';
        rc_id = rc_id != '' ? rc_id : 'null';

        if(selected != ''){
            $.ajax({
                type:"GET",
                url: url+'/'+selected+'/'+value+'/'+rc_id,
                success:function(response)
                {
                    $('.spinner-border-div').remove(); 
                    $('div #report_claim_popup .report_claim_div').html('');
                    $('div #report_claim_popup .report_claim_div').append(response);
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('.spinner-border-div').remove();
                }
            });
        }
    }

    function get_sub_user_list(url, selected, role_id, selected_div, table_id, datatable_url, parent_status = ''){
        $('div '+selected_div).html('');
        $('div '+selected_div).append('<span class="spinner-border-div"></span>'); 

        if(selected != ''){
            $.ajax({
                type:"GET",
                url: url,
                success:function(response)
                {
                    $('.spinner-border-div').remove(); 
                    $('div '+selected_div).html('');
                    $('div '+selected_div).append(response);

                    var table_customer = $('div '+selected_div+' '+table_id).DataTable({
                         processing: true,
                         serverSide: true,
                         ajax: {
                            url: datatable_url+'/'+selected+'/'+parent_status,
                            data: function (d) {
                                d.name = $(document).find(selected_div).find('#s_cn_fn').val(),
                                d.username = $(document).find(selected_div).find('#s_username').val(),
                                d.email = $(document).find(selected_div).find('#s_email').val(),
                                d.state = $(document).find(selected_div).find('#s_state').val(),
                                d.city = $(document).find(selected_div).find('#s_city').val(),
                                d.zipcode = $(document).find(selected_div).find('#s_zipcode').val()
                            }
                         },
                         columns: [
                                  { data: 'input', name: 'input', orderable: false, searchable: false , sortable: false},
                                  { data: 'profile_image', name: 'profile_image', orderable: false, searchable: false , sortable: false},
                                  { data: 'id', name: 'id' },
                                  { data: 'name', name: 'name' },
                                  { data: 'username', name: 'username' },
                                  { data: 's_state', name: 's_state' },
                                  { data: 'c_city', name: 'c_city' },
                                  { data: 'zipcode', name: 'zipcode' },
                                  { data: 'email', name: 'email' },
                                  { data: 'phone_number', name: 'phone_number' },
                               ],
                         order: [[2, 'desc']],
                         autoWidth: true
                      });

                      $(document).on('keyup', "div "+selected_div+" #s_cn_fn", function(){
                         table_customer.draw();
                      });

                      $(document).on('keyup', "div "+selected_div+" #s_username", function(){
                         table_customer.draw();
                      });

                      $(document).on('keyup', "div "+selected_div+" #s_email", function(){
                         table_customer.draw();
                      });

                      $(document).on('change', "div "+selected_div+" #s_state", function(){
                         table_customer.draw();
                      });

                      $(document).on('change', "div "+selected_div+" #s_city", function(){
                         table_customer.draw();
                      });

                      $(document).on('change', "div "+selected_div+" #s_zipcode", function(){
                         table_customer.draw();
                      });
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('.spinner-border-div').remove();
                }
            });
        }else{
            alert_message('error', 'Please select a user!');
        }
    }

    function load_employee_section(url, parent_user_id){
        $('#gi-overlay').show();
        $('.gi_detail_employee_section').css('display','block');
        
        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {
                $('.gi_detail_employee_section').html(response);
                $('.gi_detail_employee_section input[name="parent_user_id"]').val(parent_user_id);
                $('#gi-overlay').hide();
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('#gi-overlay').hide();
            }
        });
        $('html, body').animate({
            scrollTop: $(".gi_detail_employee_section").offset().top
        }, 1500);
    }

    function save_employee_data(url, selected_div, form_name, action_type){

        var username = selected_div.find('[name=username]').val();
        var full_name = selected_div.find('[name=full_name]').val();
        var state = selected_div.find('[name=state]').val();
        var city = selected_div.find('[name=city]').val();
        var email = selected_div.find('[name=email]').val();
        var zipcode = selected_div.find('[name=zipcode]').val();
        var county = selected_div.find('[name=county]').val();
        var company = selected_div.find('[name=company]').val();
        var password = selected_div.find('[name=password]').val();
        var confirmed = selected_div.find('[name=confirmed]').val();
        var phone_number = selected_div.find('[name=phone_number]').val();
        
        if(action_type == 'add'){
            var data = {'company':company, 'full_name':full_name, 'state':state, 'city':city, 'zipcode':zipcode, 'county':county, 'phone_number':phone_number, 'username':username, 'email':email, 'password':password, 'confirmed':confirmed};
        }else{
            var data = {'company':company, 'full_name':full_name, 'state':state, 'city':city, 'zipcode':zipcode, 'county':county, 'phone_number':phone_number, 'username':username, 'email':email};
        }

        if(validation_check(data, selected_div, 'yes')){
            $('#gi-overlay').show();
            
            //var file_data_emp = $('#file_emp').prop('files')[0];

            var form_serialize_data = $(form_name).serialize();

            //form_serialize_data = form_serialize_data + '&file_name=' + file_data_emp;
            //console.log(file_data_emp);
            //form_serialize_data.append('file_name', file_data_emp);

            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url: url,
                data: form_serialize_data,
                success:function(response)
                {   
                    $('#gi-overlay').hide();
                    if(response.status == 'SUCCESS'){
                        alert_message('success', response.mes)

                        $('div .gi_detail_section #v-pills-employee-tab').trigger('click');
                        load_main_employee();
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
    }

    function load_message_hub_section(url, request_for, datatable_status, thisz, column_array){
        $('div .message-hub-div').append('<span class="spinner-border-div"></span>');
        $.ajax({
            type:"GET",
            url: url+'/'+request_for,
            success:function(response)
            {
                $('.spinner-border-div').remove();
                $('div .message-hub-div').html(response);

                if(datatable_status == 'yes'){
                    $('.mail_tab_li').removeClass('active');
                    thisz.addClass('active');

                    $('#table_message_hub').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.message_list_datatables', ['prefix' => Auth::user()->role->role_slug ]) }}/'+request_for,
                    columns: column_array,
                    order: [[2, 'desc']],
                    autoWidth: true,
                    "createdRow": function( row, data, dataIndex ) {
                            if ( data.status == "Pending" ) {        
                                $(row).addClass('tr-red');
                            }
                        }
                    });
                }else{
                    $('.js-example-basic-ajax').select2({
                        ajax: {
                            url: "{{ route('admin.search_user', ['prefix' => Auth::user()->role->role_slug ]) }}",
                            type: "GET",
                            dataType: 'json',
                            processResults: function (data) {
                              return {
                                results: data
                              };
                            }
                        }
                    });
                }
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('.spinner-border-div').remove();
            }
        });
    }

    function load_user_center_list_section(url, user_role_id){
        $('#gi-overlay').show();

        var table = $('#table_user_center').DataTable();
        table.destroy();

        $.ajax({
            type:"GET",
            url: url+'/'+user_role_id,
            success:function(response)
            {
                $('div .user-center-search').html(response);

                // $('#table_user_center').DataTable({
                // processing: true,
                // serverSide: true,
                // ajax: '{{ route('admin.user_center_list_datatables', ['prefix' => Auth::user()->role->role_slug ]) }}/'+user_role_id,
                // columns: [
                //           { data: 'input', name: 'input', orderable: false, searchable: false , sortable: false},
                //           { data: 'f_email', name: 'f_email' },
                //           { data: 't_email', name: 't_email' },
                //           { data: 'c_email', name: 'c_email' },
                //           { data: 'b_email', name: 'b_email' },
                //           { data: 'subject', name: 'subject' },
                //           { data: 'message', name: 'message' },
                //           { data: 'created_at', name: 'created_at' },
                //        ],
                // order: [[2, 'desc']],
                // autoWidth: true,
                // "createdRow": function( row, data, dataIndex ) {
                //         if ( data.status == "Pending" ) {        
                //             $(row).addClass('tr-red');
                //         }
                //     }
                // });

                var table = $('#table_user_center').DataTable({
                     processing: true,
                     serverSide: true,
                     ajax: {
                        url: "{{ route('admin.user_center_list_datatables', ['prefix' => Auth::user()->role->role_slug ]) }}/"+user_role_id,
                        data: function (d) {
                            d.name = $('#searchSection #s_cn_fn').val(),
                            d.username = $('#searchSection #s_username').val(),
                            d.email = $('#searchSection #s_email').val(),
                            d.state = $('#searchSection #s_state').val(),
                            d.city = $('#searchSection #s_city').val(),
                            d.zipcode = $('#searchSection #s_zipcode').val()
                        }
                     },
                     columns: [
                              { data: 'input', name: 'input', orderable: false, searchable: false , sortable: false},
                              // { data: 'profile_image', name: 'profile_image', orderable: false, searchable: false , sortable: false},
                              { data: 'id', name: 'id' },
                              { data: 'username', name: 'username' },
                              { data: 'name', name: 'name' },
                              { data: 's_state', name: 's_state' },
                              { data: 'c_city', name: 'c_city' },
                              { data: 'zipcode', name: 'zipcode' },
                              { data: 'county', name: 'county' },
                              { data: 'email', name: 'email' },
                              { data: 'phone_number', name: 'phone_number' },
                              { data: 'company', name: 'company' }
                           ],
                     order: [[1, 'desc']],
                     autoWidth: true
                  });

                  $(document).on('keyup', "#searchSection #s_cn_fn", function(){
                     table.draw();
                  });

                  $(document).on('keyup', "#searchSection #s_username", function(){
                     table.draw();
                  });

                  $(document).on('keyup', "#searchSection #s_email", function(){
                     table.draw();
                  });

                  $(document).on('change', "#searchSection #s_state", function(){
                     table.draw();
                  });

                  $(document).on('change', "#searchSection #s_city", function(){
                     table.draw();
                  });

                  $(document).on('change', "#searchSection #s_zipcode", function(){
                     table.draw();
                  });
                  $('#gi-overlay').hide();
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('#gi-overlay').hide();
            }
        });
    }

    function save_user_center_data(url, selected_div, form_name, action_type){

        var username = selected_div.find('[name=username]').val();
        var full_name = selected_div.find('[name=full_name]').val();
        var state = selected_div.find('[name=state]').val();
        var city = selected_div.find('[name=city]').val();
        var email = selected_div.find('[name=email]').val();
        var zipcode = selected_div.find('[name=zipcode]').val();
        var county = selected_div.find('[name=county]').val();
        var company = selected_div.find('[name=company]').val();
        var password = selected_div.find('[name=password]').val();
        var phone_number = selected_div.find('[name=phone_number]').val();
        var confirmed = selected_div.find('[name=confirmed]').val();
        
        if(action_type == 'add'){
            var data = {'full_name':full_name, 'company':company, 'state':state, 'city':city, 'zipcode':zipcode, 'county':county, 'phone_number':phone_number, 'username':username, 'email':email, 'password':password, 'confirmed':confirmed};
        }else{
            var data = {'username':username, 'full_name':full_name, 'company':company, 'state':state, 'city':city, 'email':email, 'zipcode':zipcode, 'county':county, 'phone_number':phone_number};
        }

        if(validation_check(data, selected_div, 'yes')){
            $('#gi-overlay').show();

            var form_serialize_data = $(form_name).serialize();

            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url: url,
                data: form_serialize_data,
                success:function(response)
                {   
                    if(response.status == 'SUCCESS'){
                        alert_message('success', response.mes)

                        $('#user_role_id').trigger('click');
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
        }
    }

    function save_user_data(url, selected_div, thisz, table_id, action_type){
        var full_name = $(thisz).find('[name=full_name]').val();
        var state = $(thisz).find('[name=state]').val();
        var city = $(thisz).find('[name=city]').val();
        var zipcode = $(thisz).find('[name=zipcode]').val();
        var county = $(thisz).find('[name=county]').val();
        var company = $(thisz).find('[name=company]').val();
        var phone_number = $(thisz).find('[name=phone_number]').val();

        var username = $(thisz).find('[name=username]').val();
        var email = $(thisz).find('[name=email]').val();
        var password = $(thisz).find('[name=password]').val();
        var confirmed = $(thisz).find('[name=confirmed]').val();

        if(action_type == 'add'){
            var data = {'full_name':full_name, 'state':state, 'city':city, 'zipcode':zipcode, 'county':county, 'company':company, 'phone_number':phone_number, 'username':username, 'email':email, 'password':password, 'confirmed':confirmed}
        }else{
            var data = {'full_name':full_name, 'state':state, 'city':city, 'email':email, 'zipcode':zipcode, 'county':county, 'company':company, 'phone_number':phone_number, 'username':username}
        }

        if(validation_check(data, selected_div, 'yes')){
            $('#gi-overlay').show();

            var form_serialize_data = new FormData(thisz);

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
                data: form_serialize_data,
                success:function(response)
                {   
                    if(response.status == 'SUCCESS'){
                        if(table_id){
                            alert_message('success', response.mes)

                            var table = $(table_id).DataTable();
                            table.ajax.reload(function(){
                                $('#'+response.id+'_radio').prop('checked', true);
                                $('#LoadUserEditSectionBtn').trigger('click');
                            });
                        }else{
                            alert_message('success', 'Profile updated successfully.');
                            location.reload(true);
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
        }
    }

    function save_user_detailed_info_data(url, thisz){
        $('#gi-overlay').show();
        var form_serialize_data = new FormData(thisz);

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
            data: form_serialize_data,
            success:function(response)
            {   
                if(response.status == 'SUCCESS'){
                    alert_message('success', response.mes);
                    $('#LoadUserEditSectionBtn').trigger('click');
                }else{
                    alert_message('error', response.mes);
                }

                $('#gi-overlay').hide();
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('#gi-overlay').hide();
            }
        });
    }

    function get_user_list(url){
        $('#user_data_id').parent().append('<span class="spinner-border"></span>');
            
        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {
                $('#user_data_id').html(response);
                $('.spinner-border').remove();
            },
            error: function(){
                $('.spinner-border').remove();
            }
        });
    }
    
    function check_user_exist(data, type, button, closetthis){
        var url = "{{ route('admin.check-user-exist', ['prefix' => Auth::user()->role->role_slug ]) }}";

        if(data){
            if(type == 'email' && !isValidEmail(data)){
                closetthis.find('[name='+type+']').css('border', '1px solid #dc3545'); //error
                closetthis.find('[name='+type+']').siblings('.error-message').text('Please provide valid '+type+'.').css('display', 'block');
            
                button.attr('disabled', true);
            }else{
                closetthis.find('[name='+type+']').parent().append('<span class="spinner-border"></span>');
                $.ajax({
                    type: "GET",
                    url: url+'/'+data+'/'+type,
                    success: function(response)
                    {
                        $('.spinner-border').remove();
                        if(response >= 1){
                            closetthis.find('[name='+type+']').css('border', '1px solid #dc3545'); //error
                            closetthis.find('[name='+type+']').siblings('.error-message').text(type.substr(0,1).toUpperCase()+type.substr(1)+' already exist.').css('display', 'block');
                        
                            button.attr('disabled', true);
                        }else{
                            closetthis.find('[name='+type+']').css('border', '1px solid #d1e9fc'); //error
                            closetthis.find('[name='+type+']').siblings('.error-message').text('Please provide valid '+type+'.').css('display', 'none');

                            button.attr('disabled', false);
                        }
                    },
                    error: function(){
                        closetthis.find('[name='+type+']').css('border', '1px solid #d1e9fc');
                        closetthis.find('[name='+type+']').siblings('.error-message').text('Please provide valid '+type+'.').css('display', 'none');

                        button.attr('disabled', false);
                    }
                });
            }
        }else{
            closetthis.find('[name='+type+']').css('border', '1px solid #d1e9fc');
            closetthis.find('[name='+type+']').siblings('.error-message').text('Please provide valid '+type+'.').css('display', 'none');

            button.attr('disabled', false);
        } 
    }

    function change_file_request_status(thiszc, status, user_id, checked_input, request_type){
        if(request_type == 2){
            table_name = 'table_attachments';
        }else if(request_type == 3){
            table_name = 'table_personal_lib';
        }else if(request_type == 4){
            table_name = 'table_archive_lib';
        }else{
            table_name = 'table_files';
        }

        if(request_type == 4){
            var url = "{{ route('admin.change_file_request_status', ['prefix' => Auth::user()->role->role_slug ]) }}/"+user_id+'/'+checked_input+'/'+"{{ encrypt('archive') }}"+'/'+request_type+'/'+status;
        }else{
            var url = "{{ route('admin.change_file_request_status', ['prefix' => Auth::user()->role->role_slug ]) }}/"+user_id+'/'+checked_input+'/'+"{{ encrypt('files') }}"+'/'+request_type+'/'+status;
        }
        
        if(user_id && checked_input){
            $('#gi-overlay').show();

            $.ajax({
                type:"GET",
                url: url,
                success:function(response)
                {
                    thiszc.find('#pl_send_message_button, #pl_send_email_button, #pl_attach_button, #pl_request_button, .file_download_button, .file_activate_button, .file_deactivate_button, .file_delete_button, .file_view_button').addClass('disabled');

                    $('#gi-overlay').hide();
                    alert_message('success', response.mes);
                    $('#'+table_name).DataTable().ajax.reload();
                }
            });
        }else{
            alert_message('error', 'Please select a file.');
        }
    }

    function change_carrier_status(user_id, carrier_id, show, hide, status, added_by, table_name){
        var url = "{{ route('admin.change_carrier_status', ['prefix' => Auth::user()->role->role_slug ]) }}/"+user_id+'/'+carrier_id+'/'+status+'/'+added_by;

        if(user_id){
            if(user_id && carrier_id){
                $('#gi-overlay').show();

                $.ajax({
                    type:"GET",
                    url: url,
                    success:function(response)
                    {
                        $('#gi-overlay').hide();
                        $('.'+show).show().addClass('disabled');
                        $('.'+hide).hide().addClass('disabled');

                        if(response.status == 'SUCCESS'){
                            alert_message('success', response.mes);
                        }else{
                            alert_message('error', response.mes);
                        }
                        $('#'+table_name).DataTable().ajax.reload();
                    }
                });
            }else{
                alert_message('error', 'Please select a carrier.');
            }
        }else{
            alert_message('error', 'Please select an employee.');
        }
    }

    function load_user_carrier(user_id){
        if(!$.fn.dataTable.isDataTable('#table_carriers')){
            var table = $('#table_carriers').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.profile_setting_carrier_list_datatables', ['prefix' => Auth::user()->role->role_slug]) }}/"+user_id,
                },
                columns: [
                    { data: 'input', name: 'input', orderable: false, searchable: false , sortable: false},
                    { data: 'id', name: 'id' },
                    { data: 'carrier_id', name: 'carrier_id' },
                    { data: 'carrier_name', name: 'carrier_name' },
                    { data: 'carrier_address', name: 'carrier_address' },
                    { data: 's_state', name: 's_state' },
                    { data: 'c_city', name: 'c_city' },
                    { data: 'carrier_zipcode', name: 'carrier_zipcode' },
                    { data: 'carrier_email', name: 'carrier_email' },
                    { data: 'carrier_hotline', name: 'carrier_hotline' },
                    { data: 'status', name: 'status' },
                ],
                order: [[1, 'desc']],
                autoWidth: true
            });
        }else{
            $('#table_carriers').DataTable().ajax.reload();
        }
    }

    function load_user_activity(url, user_id, activity_type, activity_columns){
        if(!$.fn.dataTable.isDataTable('#table_'+activity_type)){
            var table = $('#table_'+activity_type).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: url,
                },
                columns: activity_columns,
                order: [[1, 'desc']],
                autoWidth: true
            });
        }else{
            $('#table_'+activity_type).DataTable().ajax.reload();
        }
    }

    function load_activity_popup_from(url, popup_name, append_to_div, form_title_div, form_title_text){
        $('#'+popup_name+' .'+form_title_div).text(form_title_text);
        $('#'+popup_name+' .'+append_to_div).html('');
        $('#'+popup_name+' .activity_form_spinner').append('<span class="spinner-border-div"></span>');
        $('#'+popup_name).modal('show');

        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {
                $('.spinner-border-div').remove();
                $('#'+popup_name+' .'+append_to_div).html(response);
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('.spinner-border-div').remove();
            }
        });
    }

    function load_user_histories(url, history_columns){
        if(!$.fn.dataTable.isDataTable('#table_histories')){
            $('#table_histories').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: url,
                },
                columns: history_columns,
                order: [[1, 'desc']],
                autoWidth: true
            });
        }else{
            $('#table_histories').DataTable().ajax.reload();
        }
    }

    function delete_activity_data(activity_id, activity_type, action_from){
        $('#gi-overlay').show();
        var url = "{{ route('admin.delete_activity_data', ['prefix' => Auth::user()->role->role_slug]) }}";

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:"POST",
            url: url,
            data: {'activity_id': activity_id, 'activity_type': activity_type},
            success:function(response)
            {
                $('#gi-overlay').hide();
                alert_message('success', response.mes);
                if(action_from == 'module'){
                    $('#table_'+activity_type+'s').DataTable().ajax.reload();
                }else{
                    $('#table_calendar_notification').DataTable().ajax.reload();
                    $('#calendar_section').fullCalendar('refetchEvents');
                }
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('#gi-overlay').hide();
            }
        });
    }

    function set_file_as_request_attachment(thiszc, user_id, checked_input, request_type){
        var url = "{{ route('admin.set_file_as_request_attachment', ['prefix' => Auth::user()->role->role_slug ]) }}/"+user_id+'/'+checked_input+'/'+request_type;
        
        if(user_id && checked_input){
            $('#gi-overlay').show();

            $.ajax({
                type:"GET",
                url: url,
                success:function(response)
                {
                    $('#gi-overlay').hide();
                    alert_message('success', response.mes);
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('#gi-overlay').hide();
                }
            });
        }else{
            alert_message('error', 'Please select a file.');
        }
    }

    function edit_archive_library_file(thiszc, user_id, checked_input, request_type){
        var url = "{{ route('admin.edit_archive_library_file', ['prefix' => Auth::user()->role->role_slug ]) }}/"+user_id+'/'+checked_input+'/'+request_type;
        
        if(user_id && checked_input){
            $('#gi-overlay').show();

            $.ajax({
                type:"GET",
                url: url,
                success:function(response)
                {
                    if(response.status == 'ERROR'){
                        alert_message('error', response.mes);
                    }else{
                        $('textarea#archive_lib_pdf_form_edit').val(response.data);
                        tinymce.init({selector:'textarea#archive_lib_pdf_form_edit'});
                        $('#req_file_name').val('');
                        $('#document_response_form, #document_request_form, #document_attachment_form, #document_upload_form').hide();
                        $('#archive_library_form').show();
                        $('html, body').animate({
                            scrollTop: $("#archive_library_form").offset().top
                        }, 1500);
                    }
                    $('#gi-overlay').hide();
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('#gi-overlay').hide();
                }
            });
        }else{
            alert_message('error', 'Please select a file.');
        }
    }       

    function get_carrier_list(url, closestthis){
        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {
                closestthis.find('#s_carrier').html(response);
                $('.spinner-border').remove();
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('.spinner-border').remove();
            }
        });
    }

    function load_carrier_add_section(url){
        $('#gi-overlay').show();
        $('.gi_detail_section').css('display','block');
        
        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {
                $('.gi_detail_section').html(response);
                $('.edit-btn-div').remove();
                $('#gi-overlay').hide();

                $('html, body').animate({
                    scrollTop: $(".gi_detail_section").offset().top - 100
                }, 1500);

                $('#multiple_state').select2();

                $('#multiple_city').select2();

                $('#multiple_zipcode').select2();

                $('#multiple_county').select2();
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('#gi-overlay').hide();
            }
        });
    }

    function load_carrier_edit_section(url){
        $('#gi-overlay').show();
        $('.gi_detail_section').css('display','block');
        
        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {
                $('.gi_detail_section').html(response);
                $('#gi-overlay').hide();

                $('html, body').animate({
                    scrollTop: $(".gi_detail_section").offset().top - 100
                }, 1500);

                $('#multiple_state').select2();

                $('#multiple_city').select2();

                $('#multiple_zipcode').select2();

                $('#multiple_county').select2();
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('#gi-overlay').hide();
            }
        });
    }

    function save_carrier_data(url, selected_div, thisz, table_id, action_type){
        var state = $(thisz).find('[name="state[]"]').val();
        var city = $(thisz).find('[name="city[]"]').val();
        var zipcode = $(thisz).find('[name="zipcode[]"]').val();
        var county = $(thisz).find('[name="county[]"]').val();

        var carrier_id = $(thisz).find('[name=carrier_id]').val();
        var carrier_name = $(thisz).find('[name=carrier_name]').val();
        var carrier_address = $(thisz).find('[name=carrier_address]').val();
        var carrier_state = $(thisz).find('[name=carrier_state]').val();
        var carrier_city = $(thisz).find('[name=carrier_city]').val();
        var carrier_zipcode = $(thisz).find('[name=carrier_zipcode]').val();
        var email = $(thisz).find('[name=email]').val();
        var phone_number = $(thisz).find('[name=phone_number]').val();
        var carrier_website = $(thisz).find('[name=carrier_website]').val();
        var carrier_hotline = $(thisz).find('[name=carrier_hotline]').val();

        if(action_type == 'add'){
            var data = {'carrier_id':carrier_id, 'carrier_name':carrier_name, 'carrier_address':carrier_address, 'carrier_state':carrier_state, 'carrier_city':carrier_city, 'carrier_zipcode':carrier_zipcode, 'email':email, 'phone_number':phone_number, 'carrier_website':carrier_website, 'carrier_hotline':carrier_hotline}
        }else{
            var data = {'carrier_id':carrier_id, 'carrier_name':carrier_name, 'carrier_address':carrier_address, 'carrier_state':carrier_state, 'carrier_city':carrier_city, 'carrier_zipcode':carrier_zipcode, 'email':email, 'phone_number':phone_number, 'carrier_website':carrier_website, 'carrier_hotline':carrier_hotline}
        }

        if(validation_check(data, selected_div, 'yes')){
            $('#gi-overlay').show();

            var form_serialize_data = new FormData(thisz);

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
                data: form_serialize_data,
                success:function(response)
                {   
                    if(response.status == 'SUCCESS'){
                        alert_message('success', response.mes);
                        $(table_id).DataTable().ajax.reload();
                    }else{
                        alert_message('error', response.mes)
                    }
                    $('.gi_detail_section').html('');
                    $('#gi-overlay').hide();
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('#gi-overlay').hide();
                }
            });
        }
    }

    function carrier_management_delete(url, selected, table_id){
        $('#gi-overlay').show();
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:"POST",
            url: url,
            data: {"carrier_mgmt_id": selected},
            success:function(response)
            {   
                $('.gi_detail_section').html('');
                $('#gi-overlay').hide();
                if(response.status == 'SUCCESS'){
                    alert_message('success', response.mes);
                    $(table_id).DataTable().ajax.reload();
                }else{
                    alert_message('error', 'Opps! Something went wrong.')
                }
            },
            error:function(){
                $('#gi-overlay').hide();
                alert_message('error', 'Opps! Something went wrong.')
            }
        });
    }

    function load_product_add_section(url){
        $('#gi-overlay').show();
        $('.gi_detail_section').css('display','block');
        
        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {
                $('.gi_detail_section').html(response);
                $('#gi-overlay').hide();

                $('html, body').animate({
                    scrollTop: $(".gi_detail_section").offset().top - 100
                }, 1500);
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('#gi-overlay').hide();
            }
        });
    }

    function load_product_edit_section(url){
        $('#gi-overlay').show();
        $('.gi_detail_section').css('display','block');
        
        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {
                $('.gi_detail_section').html(response);
                $('#gi-overlay').hide();

                $('html, body').animate({
                    scrollTop: $(".gi_detail_section").offset().top - 100
                }, 1500);

                $('#multiple_state').select2();

                $('#multiple_city').select2();

                $('#multiple_zipcode').select2();

                $('#multiple_county').select2();
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('#gi-overlay').hide();
            }
        });
    }

    function get_carrier_details(url, closestthis){
        $.ajax({
            type:"GET",
            url: url,
            success:function(response)
            {
                var data = response.data;
                closestthis.find('[name="carrier_name"]').val(data.carrier_name); 
                closestthis.find('[name="carrier_address"]').val(data.carrier_address); 
                closestthis.find('[name="carrier_city"]').val(data.c_city); 
                closestthis.find('[name="carrier_state"]').val(data.s_state); 
                closestthis.find('[name="carrier_zipcode"]').val(data.carrier_zipcode); 
                closestthis.find('[name="carrier_phone"]').val(data.carrier_phone); 
                closestthis.find('[name="carrier_email"]').val(data.carrier_email); 
                closestthis.find('[name="carrier_website"]').val(data.carrier_website); 
                closestthis.find('[name="carrier_hotline"]').val(data.carrier_phone); 
                var logo = "{{ asset('uploads/carrier') }}/"+data.id+'/logo/'+data.carrier_logo;
                closestthis.find('#carrier_logo').attr('src', logo); 
                $('.spinner-border').remove();
            },
            error: function(){
                alert_message('error', 'Opps! Something went wrong.');
                $('.spinner-border').remove();
            }
        });
    }

    function save_product_data(url, selected_div, thisz, table_id, action_type){
        var state = $(thisz).find('[name="state"]').val();
        var city = $(thisz).find('[name="city"]').val();
        var zipcode = $(thisz).find('[name="zipcode"]').val();
        var county = $(thisz).find('[name="county"]').val();

        var carrier_id = $(thisz).find('[name=carrier_id]').val();
        var product_name = $(thisz).find('[name=product_name]').val();
        var price_1 = $(thisz).find('[name=price_1]').val();
        var price_3 = $(thisz).find('[name=price_3]').val();
        var product_description = $(thisz).find('[name=product_description]').val();
        var price_2 = $(thisz).find('[name=price_2]').val();
        var price_4 = $(thisz).find('[name=price_4]').val();
        var category_id = $(thisz).find('[name=category_id]').val();

        if(action_type == 'add'){
            var data = {'state':state, 'city':city, 'zipcode':zipcode, 'county':county, 'carrier_id':carrier_id, 'product_name':product_name, 'product_description':product_description, 'price_1':price_1, 'price_2':price_2, 'price_3':price_3, 'price_4':price_4, 'category_id':category_id}
        }else{
            var data = {'state':state, 'city':city, 'zipcode':zipcode, 'county':county, 'carrier_id':carrier_id, 'product_name':product_name, 'product_description':product_description, 'price_1':price_1, 'price_2':price_2, 'price_3':price_3, 'price_4':price_4, 'category_id':category_id}
        }

        if(validation_check(data, selected_div, 'yes')){
            $('#gi-overlay').show();

            var form_serialize_data = new FormData(thisz);

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
                data: form_serialize_data,
                success:function(response)
                {   
                    if(response.status == 'SUCCESS'){
                        alert_message('success', response.mes);
                        if(action_type == 'edit'){
                            $(table_id).DataTable().ajax.reload();
                        }
                    }else{
                        alert_message('error', response.mes)
                    }
                    $('.gi_detail_section').html('');
                    $('#gi-overlay').hide();
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('#gi-overlay').hide();
                }
            });
        }
    }
</script>