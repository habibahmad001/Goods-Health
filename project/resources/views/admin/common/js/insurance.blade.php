<script>
    $('#product_select').ddslick({
        width: '100%',
        selectText: "Save your form first to display the categories.",
    });

    $(document).on('click', 'div .gi_detail_section input[name="access_to_products[]"]', function(){
        //$('#product_select').ddslick('destroy');
        //set_ddslick_dropdown();
    });

    /**** Script to add ddslick dropdown. ******/
    $(document).on('click','div .gi_detail_section #v-pills-insurance-option-tab',function(){ 
        $('#product_select').ddslick('destroy');
        set_ddslick_dropdown();
    });

    $(document).on('click', '#compareButton', function(){
        var len = $('#insurance_compare input[name="compare_io"]:checked').length;

        if(len < 2){
            alert_message('error', 'Please select atleast 2 insurance options!')
        }else if(len > 3){
            alert_message('error', 'You cannot compare more than 3 insurance options!')
        }else if(len == 2){
            var first_io = $('#insurance_compare input[name="compare_io"]:checked:first');
            var last_io = $('#insurance_compare input[name="compare_io"]:checked:last');
        
            var compare_html = '<table class="table table-striped text-center"><tbody><tr class="table-light"><td></td><td><img src="'+first_io.data("imagesrc")+'" width="100px"></td><td><img src="'+last_io.data("imagesrc")+'" width="100px"></td></tr><tr><td>Price</td><td>$'+first_io.data("price")+'/MO</td><td>$'+last_io.data("price")+'/MO</td></tr><tr><td>Bodily Injury Liability</td><td>$'+first_io.data("bodily_injury_liability")+'</td><td>$'+last_io.data("bodily_injury_liability")+'</td></tr><tr><td>Property Damage Liability</td><td>$'+first_io.data("property_damage_liability")+'</td><td>$'+last_io.data("property_damage_liability")+'</td></tr><tr><td>Uninsured Motorist Bodily</td><td>$'+first_io.data("uninsured_motorist_bodily")+'</td><td>$'+last_io.data("uninsured_motorist_bodily")+'</td></tr><tr><td>Uninsured Motorist Property</td><td>$'+first_io.data("uninsured_motorist_property")+'</td><td>$'+last_io.data("uninsured_motorist_property")+'</td></tr><tr><td>Personal Injury Protection(PIP)</td><td>$'+first_io.data("personal_injury_protection")+'</td><td>$'+last_io.data("personal_injury_protection")+'</td></tr><tr><td></td><td><a class="btn btn-primary btn-compare insurance_options_continue_popup" data-value="'+first_io.val()+'" href="#"> Continue </a></td><td><a class="btn btn-primary btn-compare insurance_options_continue_popup" data-value="'+last_io.val()+'" href="#"> Continue </a></td></tr></tbody></table>';

            $('div #insuranceOptionCompare').find('.io-compare-data').html(compare_html);
            $('#insuranceOptionCompare').modal('show');

        }else if(len == 3){
            var first_io = $('#insurance_compare input[name="compare_io"]:checked:first');
            var second_io = $('#insurance_compare input[name="compare_io"]:checked').not(':first').not(':last');
            var last_io = $('#insurance_compare input[name="compare_io"]:checked:last');

            var compare_html = '<table class="table table-striped text-center"><tbody><tr class="table-light"><td></td><td><img src="'+first_io.data("imagesrc")+'" width="100px"></td><td><img src="'+second_io.data("imagesrc")+'" width="100px"></td><td><img src="'+last_io.data("imagesrc")+'" width="100px"></td></tr><tr><td>Price</td><td>$'+first_io.data("price")+'/MO</td><td>$'+second_io.data("price")+'/MO</td><td>$'+last_io.data("price")+'/MO</td></tr><tr><td>Bodily Injury Liability</td><td>$'+first_io.data("bodily_injury_liability")+'</td><td>$'+second_io.data("bodily_injury_liability")+'</td><td>$'+last_io.data("bodily_injury_liability")+'</td></tr><tr><td>Property Damage Liability</td><td>$'+first_io.data("property_damage_liability")+'</td><td>$'+second_io.data("property_damage_liability")+'</td><td>$'+last_io.data("property_damage_liability")+'</td></tr><tr><td>Uninsured Motorist Bodily</td><td>$'+first_io.data("uninsured_motorist_bodily")+'</td><td>$'+second_io.data("uninsured_motorist_bodily")+'</td><td>$'+last_io.data("uninsured_motorist_bodily")+'</td></tr><tr><td>Uninsured Motorist Property</td><td>$'+first_io.data("uninsured_motorist_property")+'</td><td>$'+second_io.data("uninsured_motorist_property")+'</td><td>$'+last_io.data("uninsured_motorist_property")+'</td></tr><tr><td>Personal Injury Protection(PIP)</td><td>$'+first_io.data("personal_injury_protection")+'</td><td>$'+second_io.data("personal_injury_protection")+'</td><td>$'+last_io.data("personal_injury_protection")+'</td></tr><tr><td></td><td><a class="btn btn-primary btn-compare insurance_options_continue_popup" data-value="'+first_io.val()+'" href="#"> Continue </a></td><td><a class="btn btn-primary btn-compare insurance_options_continue_popup" data-value="'+second_io.val()+'" href="#"> Continue </a></td><td><a class="btn btn-primary btn-compare insurance_options_continue_popup" data-value="'+last_io.val()+'" href="#"> Continue </a></td></tr></tbody></table>';

            $('div #insuranceOptionCompare').find('.io-compare-data').html(compare_html);
            $('#insuranceOptionCompare').modal('show');
        }
    });

    $(document).on('click', 'div .gi_detail_section .insurance_options_continue', function(event){ 
        var thisz = $(this);
        insurance_option_continue_button(thisz);
    });



    $(document).on('click', 'div #insuranceOptionCompare .insurance_options_continue_popup', function(event){ 
        var thisz = $(this);
        var value = thisz.data('value');

        $('#insuranceOptionCompare').modal('hide');

        var io_button = $('#insurance_compare input[value="'+value+'"]').parent().parent().parent().find('.insurance_options_continue');

        io_button.trigger('click');
    });

    // $(document).on('click', 'div .gi_detail_section .insurance_options_continue', function(event){ 
    //     event.preventDefault();
    //     var policy_id = $(this).parent().parent().find('input[name="compare_io"]:checked').val();

    //     if(policy_id > 0){
    //         alert_message('error', 'Please save the form first!')

    //         $('html, body').animate({
    //             scrollTop: $("#authentication").offset().top
    //         }, 1500);
    //     }else{
    //         alert_message('error', 'Please select an insurance option!')
    //     }
    // });


</script>