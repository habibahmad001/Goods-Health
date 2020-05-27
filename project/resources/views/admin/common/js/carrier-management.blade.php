<script>
    $(function() {
        var table = $('#table_carriers').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.carrier_management_list_datatables', ['prefix' => Auth::user()->role->role_slug]) }}",
                data: function (d) {
                    d.state = $('.main-search-module #s_state').val(),
                    d.city_id = $('.main-search-module #s_city').val(),
                    d.zipcode = $('.main-search-module #s_zipcode').val()
                }
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
                        { data: 'carrier_phone', name: 'carrier_phone' },
                        { data: 'status', name: 'status' }
                   ],
            order: [[1, 'desc']],
            autoWidth: true,
            "createdRow": function( row, data, dataIndex ) {
                    if ( data.status == "In-active" ) {        
                        $(row).find('td:eq(10)').css('color', '#e10000');
                    }
                    if ( data.status == "Down" ) {        
                        $(row).find('td:eq(10)').css('color', '#ffaa1d');
                    }
                }
        });

        $(document).on('change', ".main-search-module #s_state, .main-search-module #s_city, .main-search-module #s_zipcode", function(){
            table.ajax.reload();
            $('.gi_detail_section').html('').css('display','none');
        });
    });

    $(document).on('click', '#LoadAddSectionBtnCarrier', function(){
        var url = "{{ route('admin.carrier_management.carrier.add', ['prefix' => Auth::user()->role->role_slug]) }}";

        load_carrier_add_section(url, 'no');
    });

    /**** Script to load edit form. ******/
    $(document).on('click', '#LoadEditSectionBtnCarrier', function(){
        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.carrier_management.carrier.edit', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected;

        if(selected){
            load_carrier_edit_section(url)
        }else{
            alert_message('error', 'Please select a carrier!')
        }
    });

    $(document).on('change','#multiple_state', function(){
        var state_code = $(this).val();
        var closestthis = $(this).closest('form');

        closestthis.find('#multiple_city, #multiple_zipcode, #multiple_county').empty().val('');

        if(state_code.length > 0){
            closestthis.find('#multiple_city').parent().append('<span class="spinner-border"></span>');
            
            var url = "{{ route('admin.get_cities_list_for_multiple_state', ['prefix' => Auth::user()->role->role_slug ]) }}";
            get_city_zipcode_county_for_multiple_state_city_zipcode(url, state_code, closestthis, '#multiple_city');
        }
    });

    //get zipcode on city change for form
    $(document).on('change','#multiple_city', function(){
        var city_id = $(this).val();
        var closestthis = $(this).closest('form');

        closestthis.find('#multiple_zipcode, #multiple_county').empty().val('');

        if(city_id.length > 0){
            closestthis.find('#multiple_zipcode').parent().append('<span class="spinner-border"></span>');
            
            var url = "{{ route('admin.get_zipcode_list_for_multiple_city', ['prefix' => Auth::user()->role->role_slug ]) }}";
            get_city_zipcode_county_for_multiple_state_city_zipcode(url, city_id, closestthis, '#multiple_zipcode');
        } 
    });

    //get county on zipcode change for form
    $(document).on('change','#multiple_zipcode', function(){
        var zipcode = $(this).val();
        var closestthis = $(this).closest('form');

        closestthis.find('#multiple_county').val('');

        if(zipcode.length > 0){
            closestthis.find('#multiple_county').parent().append('<span class="spinner-border"></span>');

            var url = "{{ route('admin.get_county_list_for_multiple_zipcode', ['prefix' => Auth::user()->role->role_slug ]) }}";
            get_city_zipcode_county_for_multiple_state_city_zipcode(url, zipcode, closestthis, '#multiple_county');
        }
    });

    $(document).on('submit', '#form_addCarriers', function(e){ 
        e.preventDefault();

        var selected_div = $('div .gi_detail_section');
        var thisz = this;
        var table_id = "#table_carriers";

        url = "{{ route('admin.carrier_management.carrier.store', ['prefix' => Auth::user()->role->role_slug]) }}";

        save_carrier_data(url, selected_div, thisz, table_id, 'add')
    });

    $(document).on('submit', '#form_editCarriers', function(e){ 
        e.preventDefault();

        var selected_div = $('div .gi_detail_section');
        var thisz = this;
        var table_id = "#table_carriers";

        url = "{{ route('admin.carrier_management.carrier.update', ['prefix' => Auth::user()->role->role_slug]) }}";

        save_carrier_data(url, selected_div, thisz, table_id, 'edit')
    });

    $(document).on('click', '.DeleteButtonCarrier', function(e){
        e.preventDefault();
        var selected = $("input[name='selectedradio']:checked").val();
        var table_id = "#table_carriers";

        var url = "{{ route('admin.carrier_management.carrier.destroy', ['prefix' => Auth::user()->role->role_slug]) }}";

        if(selected){
            carrier_management_delete(url, selected, table_id)
        }else{
            alert_message('error', 'Please select a carrier!')
        }
    });

    $(document).on('click', '#LoadAddProductSectionBtn', function(){
        var url = "{{ route('admin.product_management.product.add', ['prefix' => Auth::user()->role->role_slug]) }}";

        load_product_add_section(url, 'no');
    });

    /**** Script to load edit form. ******/
    $(document).on('click', '#LoadEditProductSectionBtn', function(){
        var selected = $("input[name='selectedradio']:checked").val();
        var url = "{{ route('admin.product_management.product.edit', ['prefix' => Auth::user()->role->role_slug]) }}/"+selected+"/{{ encrypt('products') }}";

        if(selected){
            load_product_edit_section(url)
        }else{
            alert_message('error', 'Please select a product!')
        }
    });

    $(document).on('click', '.CarrierProductDeleteButton', function(e){
        e.preventDefault();
        var selected = $("input[name='selectedradio']:checked").val();
        var table_id = "#table_carrier_products";

        var url = "{{ route('admin.product_management.product.destroy', ['prefix' => Auth::user()->role->role_slug]) }}";

        if(selected){
            carrier_management_delete(url, selected, table_id)
        }else{
            alert_message('error', 'Please select a product!')
        }
    });

    $(document).on('change', '.state', function(){
        var state_code = $(this).val();
        var closestthis = $(this).closest('form');
        var city_id = zipcode = '';

        closestthis.find('[name="carrier_id"], [name="carrier_address"], [name="carrier_city"], [name="carrier_email"], [name="carrier_hotline"], [name="carrier_name"], [name="carrier_state"], [name="carrier_zipcode"], [name="carrier_phone"], [name="carrier_website"]').val('');

        if(state_code){
            closestthis.find('#s_carrier').parent().append('<span class="spinner-border"></span>');
            
            var url = "{{ route('admin.get_carrier_list', ['prefix' => Auth::user()->role->role_slug]) }}/"+state_code+'/'+city_id+'/'+zipcode;

            get_carrier_list(url, closestthis);
        }
    });

    $(document).on('change', '.city', function(){
        var city_id = $(this).val();
        var closestthis = $(this).closest('form');
        var state_code = closestthis.find('.state').val();
        var zipcode = '';

        closestthis.find('[name="carrier_id"], [name="carrier_address"], [name="carrier_city"], [name="carrier_email"], [name="carrier_hotline"], [name="carrier_name"], [name="carrier_state"], [name="carrier_zipcode"], [name="carrier_phone"], [name="carrier_website"]').val('');

        if(city_id && state_code){
            closestthis.find('#s_carrier').parent().append('<span class="spinner-border"></span>');
            
            var url = "{{ route('admin.get_carrier_list', ['prefix' => Auth::user()->role->role_slug]) }}/"+state_code+'/'+city_id+'/'+zipcode;

            get_carrier_list(url, closestthis);
        } 
    });

    $(document).on('change', '.zipcode', function(){
        var zipcode = $(this).val();
        var closestthis = $(this).closest('form');
        var state_code = closestthis.find('.state').val();
        var city_id = closestthis.find('.city').val();

        closestthis.find('[name="carrier_id"], [name="carrier_address"], [name="carrier_city"], [name="carrier_email"], [name="carrier_hotline"], [name="carrier_name"], [name="carrier_state"], [name="carrier_zipcode"], [name="carrier_phone"], [name="carrier_website"]').val('');

        if(zipcode && state_code && city_id){
            closestthis.find('#s_carrier').parent().append('<span class="spinner-border"></span>');

            var url = "{{ route('admin.get_carrier_list', ['prefix' => Auth::user()->role->role_slug]) }}/"+state_code+'/'+city_id+'/'+zipcode;

            get_carrier_list(url, closestthis);
        }
    });

    $(document).on('change', '#form_addProducts #s_carrier, #form_editProducts #s_carrier', function(){
        var carrier_id = $(this).val();
        var closestthis = $(this).closest('form');

        closestthis.find('[name="carrier_address"], [name="carrier_city"], [name="carrier_email"], [name="carrier_hotline"], [name="carrier_name"], [name="carrier_state"], [name="carrier_zipcode"], [name="carrier_phone"], [name="carrier_website"]').val('');

        if(carrier_id){
            closestthis.find('[name="carrier_address"], [name="carrier_city"], [name="carrier_email"], [name="carrier_hotline"], [name="carrier_name"], [name="carrier_state"], [name="carrier_zipcode"], [name="carrier_phone"], [name="carrier_website"]').parent().append('<span class="spinner-border"></span>');

            var url = "{{ route('admin.get_carrier_detail', ['prefix' => Auth::user()->role->role_slug]) }}/"+carrier_id;

            get_carrier_details(url, closestthis);
        }else{
            alert_message('error', 'Please select a carrier id!')
        }
    });

    $(document).on('submit', '#form_addProducts', function(e){ 
        e.preventDefault();

        var selected_div = $('div .gi_detail_section');
        var thisz = this;
        var table_id = "#table_carrier_products";

        url = "{{ route('admin.product_management.product.store', ['prefix' => Auth::user()->role->role_slug]) }}";

        save_product_data(url, selected_div, thisz, table_id, 'add')
    });

    $(document).on('submit', '#form_editProducts', function(e){ 
        e.preventDefault();

        var selected_div = $('div .gi_detail_section');
        var thisz = this;
        var table_id = "#table_carrier_products";

        url = "{{ route('admin.product_management.product.update', ['prefix' => Auth::user()->role->role_slug]) }}";

        save_product_data(url, selected_div, thisz, table_id, 'edit')
    });
</script>