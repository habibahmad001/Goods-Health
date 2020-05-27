<script>
    $(function() {
        $('#table_carrier_products').DataTable();

        $(document).on('change', ".main-search-module #s_ProductType", function(){
            var state_code = $('.main-search-module .searchState').val();
            var city_id = $('.main-search-module .searchCity').val();

            if(state_code && city_id){
                $('#table_carrier_products').DataTable().draw();
                $('.gi_detail_section').html('').css('display','none');
            }
        });

        $(document).on('change', ".main-search-module #s_city, .main-search-module #s_zipcode, .main-search-module #s_carrier", function(){
            if($.fn.dataTable.isDataTable('#table_carrier_products')){
                $('#table_carrier_products').DataTable().destroy();

                $('#table_carrier_products').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('admin.carrier_product_list_datatables', ['prefix' => Auth::user()->role->role_slug]) }}",
                        data: function (d) {
                            d.category_id = $('.main-search-module #s_ProductType').val(),
                            d.carrier_id = $('.main-search-module #s_carrier').val(),
                            d.state = $('.main-search-module #s_state').val(),
                            d.city_id = $('.main-search-module #s_city').val(),
                            d.zipcode = $('.main-search-module #s_zipcode').val()
                        }
                    },
                    columns: [
                                { data: 'input', name: 'input', orderable: false, searchable: false , sortable: false},
                                { data: 'id', name: 'id' },
                                { data: 'product_name', name: 'product_name' },
                                { data: 's_state', name: 's_state' },
                                { data: 'c_city', name: 'c_city' },
                                { data: 'zipcode', name: 'zipcode' },
                                { data: 'county', name: 'county' },
                                { data: 'carrier_id', name: 'carrier_id' },
                                { data: 'carrier_name', name: 'carrier_name' },
                                { data: 'category_name', name: 'category_name' },
                                { data: 'status', name: 'status' }
                           ],
                    order: [[2, 'desc']],
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
            }
                
            $('.gi_detail_section').html('').css('display','none');
        });
    });

    $(document).on('change','.searchState', function(){
        var state_code = $(this).val();
        var closestthis = $(this).closest('.main-search-module');
        var city_id = zipcode = '';

        if(state_code){
            closestthis.find('#s_carrier').parent().append('<span class="spinner-border"></span>');
            
            var url = "{{ route('admin.get_carrier_list', ['prefix' => Auth::user()->role->role_slug]) }}/"+state_code+'/'+city_id+'/'+zipcode;

            get_carrier_list(url, closestthis);
        }
    });

    $(document).on('change','.searchCity', function(){
        var city_id = $(this).val();
        var closestthis = $(this).closest('.main-search-module');
        var state_code = closestthis.find('.searchState').val();
        var zipcode = '';

        if(city_id && state_code){
            closestthis.find('#s_carrier').parent().append('<span class="spinner-border"></span>');
            
            var url = "{{ route('admin.get_carrier_list', ['prefix' => Auth::user()->role->role_slug]) }}/"+state_code+'/'+city_id+'/'+zipcode;

            get_carrier_list(url, closestthis);
        } 
    });

    $(document).on('change','.searchZipcode', function(){
        var zipcode = $(this).val();
        var closestthis = $(this).closest('.main-search-module');
        var state_code = closestthis.find('.searchState').val();
        var city_id = closestthis.find('.searchCity').val();

        if(zipcode && state_code && city_id){
            closestthis.find('#s_carrier').parent().append('<span class="spinner-border"></span>');

            var url = "{{ route('admin.get_carrier_list', ['prefix' => Auth::user()->role->role_slug]) }}/"+state_code+'/'+city_id+'/'+zipcode;

            get_carrier_list(url, closestthis);
        }
    });
</script>