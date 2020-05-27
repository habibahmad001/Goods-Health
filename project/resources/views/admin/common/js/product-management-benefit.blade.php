<script>
    $(document).on('click', '#LoadEditProductMgntSectionBtn', function(){
        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.product_management.benefits.edit', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected+'/{{ encrypt(Request::route("type")) }}';

        if(selected){
            load_edit_section(url, 'no')
        }else{
            alert_message('error', 'Please select a carrier product!')
        }
    });

    $(document).on('click', '.addField',function(e) {
        e.preventDefault();

        var section_id = $(this).data('section_id');
        var category_id = $(this).data('category_id');
        var selected = $("input[name='selectedradio']:checked").val();


        $('#form_addQuestionField input[name="benefit_question_section_id"]').val(section_id);
        $('#form_addQuestionField input[name="category_id"]').val(category_id);
        $('#form_addQuestionField input[name="product_id"]').val(selected);
        $('#product_management_benefit_add_field').modal('show');
    });

    $(document).on('click', '#form_addQuestionField input[name="input_field"]', function(e) {
        if($(this).is(':checked') && ($(this).val() == 'text' || $(this).val() == 'calendar' || $(this).val() == 'number')){
            $('#form_addQuestionField .add_field_option_button').hide();
        }else{
            $('#form_addQuestionField .add_field_option_button').show();
        }
    });

    $(document).on('click', '#form_addQuestionField .addOption',function(e) {
        e.preventDefault();

        var len = $("#form_addQuestionField .add_field_options > input").length + 1;

        $("#form_addQuestionField .add_field_options").append('<input type="text" class="option_control w-50 pt-3 option_'+len+'" name="option[]" placeholder="Option '+len+'"><i class="fa fa-times-circle fa-lg text-danger removeOption" aria-hidden="true" data-option_id="'+len+'"></i>');
    });

    $(document).on('click', '#form_addQuestionField .removeOption', function(e) {
        e.preventDefault();

        var option_id = $(this).data('option_id');

        $(this).remove();
        $('#form_addQuestionField .option_'+option_id).remove();
    });

    

    $(document).on('submit', '#form_addQuestionField', function(event){ 
        event.preventDefault();

        var closestthis = $(this);

        var url = "{{ route('admin.product_management.save-field-options', ['prefix' => Auth::user()->role->role_slug ]) }}";

        var question_text = closestthis.find('input[name="question_text"]').val();
        var input_field = closestthis.find('input[name="input_field"]').val();

        var count = 0;

        if(question_text == "") {
            closestthis.find('input[name="question_text"]').css('border-bottom','1px solid #dc3545');//error
            closestthis.find('input[name="question_text"]').siblings('.error-message').css('display', 'block');
            count++; 
        }else{
            closestthis.find('input[name="question_text"]').css('border-bottom','1px solid #d1e9fc');  
            closestthis.find('input[name="question_text"]').siblings('.error-message').css('display', 'none');        
        }

        if(input_field == "") {
            closestthis.find('input[name="input_field"]').css('border-bottom','1px solid #dc3545');//error
            closestthis.find('input[name="input_field"]').siblings('.error-message').css('display', 'block');
            count++; 
        }else{
            closestthis.find('input[name="input_field"]').css('border-bottom','1px solid #d1e9fc');  
            closestthis.find('input[name="input_field"]').siblings('.error-message').css('display', 'none');        
        }
        

        if(count > 0){
            $('html, body').animate({
                scrollTop: closestthis.offset().top
            }, 1500);
            return false;

        }else{
            $('#gi-overlay').show();

            var form_data = new FormData(this);

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
                    alert_message('success', 'New field added successfully.')

                    $('#form_editProducts .benefit_option_section_div').html('');
                    $('#form_editProducts .benefit_option_section_div').html(response);

                    $('#product_management_benefit_add_field').modal('hide');
                    $('#gi-overlay').hide();
                },
                error: function(){
                    alert_message('error', 'Opps! Something went wrong.');
                    $('#gi-overlay').hide();
                }
            });
        }
    });
</script>