<script>
    $(function() {
        load_user_carrier('{{encrypt(Auth::user()->id)}}');

        $('#table_emp_carriers').DataTable();

        $(document).on('change', "#search_employee_id", function(){
            if($.fn.dataTable.isDataTable('#table_emp_carriers')){
                $('#table_emp_carriers').DataTable().destroy();
                
                $('#table_emp_carriers').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('admin.profile_setting_carrier_list_datatables', ['prefix' => Auth::user()->role->role_slug]) }}/",
                        data: function (d) {
                            d.added_by = $('#search_employee_id').val(),
                            d.employee = 1
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
                        { data: 'carrier_hotline', name: 'carrier_hotline' },
                        { data: 'status', name: 'status' },
                    ],
                    order: [[1, 'desc']],
                    autoWidth: true
                });
            }
        });
    });

    $('#search_employee_id').select2({
        placeholder: "Select an employee.",
        minimumInputLength: 0,
        ajax: {
            url: "{{ route('admin.profile_section_employee_search', ['prefix' => Auth::user()->role->role_slug ]) }}",
            type: "GET",
            dataType: 'json',
            processResults: function (data) {
                return {
                    results: data
                };
            }
        }
    });

    $(document).on('submit', '#form_ProfileSettingForm', function(e){ 
        e.preventDefault();

        var selected_div = $('div .gi_detail_section');
        var thisz = this;
        var table_id = "";

        url = "{{ route('admin.users.update', ['prefix' => Auth::user()->role->role_slug]) }}";

        save_user_data(url, selected_div, thisz, table_id, 'edit')
    });

    $(document).on('click', 'input[name="selectedradio_carrier_emp"]', function(e){
        if($(this).is(':checked')){
            var status = $(this).data('status');
            if(status == 1){
                $('.ps_emp_carrier_disable').show();
                $('.ps_emp_carrier_enable').hide();
            }else{
                $('.ps_emp_carrier_disable').hide();
                $('.ps_emp_carrier_enable').show();
            }
            $('.ps_emp_carrier_enable, .ps_emp_carrier_disable').removeClass('disabled');
        }else{
            $('.ps_emp_carrier_enable, .ps_emp_carrier_disable').addClass('disabled');
        }
    });

    $(document).on('click', '.ps_emp_carrier_enable', function(e){
        e.preventDefault();

        var user_id = $('#search_employee_id').val();
        var added_by = "{{ encrypt(1) }}";
        var status = "{{ encrypt(1) }}";
        var carrier_id = $("input[name='selectedradio_carrier_emp']:checked").val();

        change_carrier_status(user_id, carrier_id, "ps_carrier_disable", "ps_carrier_enable", status, added_by, 'table_emp_carriers');
    });

    $(document).on('click', '.ps_emp_carrier_disable', function(e){
        e.preventDefault();

        var user_id = $('#search_employee_id').val();
        var added_by = "{{ encrypt(1) }}";
        var status = "{{ encrypt(0) }}";
        var carrier_id = $("input[name='selectedradio_carrier_emp']:checked").val();

        change_carrier_status(user_id, carrier_id, "ps_carrier_enable", "ps_carrier_disable", status, added_by, 'table_emp_carriers');
    });
</script>