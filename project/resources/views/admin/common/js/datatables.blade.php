<script>
$(function() {
    var table = $('#table_{{ $user_role_data->role_slug }}').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.user_list_datatables', ['prefix' => Auth::user()->role->role_slug, 'role_id' => encrypt($user_role_data->id)]) }}",
            data: function (d) {
                d.name = $('.{{ $user_role_data->role_slug }} #s_cn_fn').val(),
                d.username = $('.{{ $user_role_data->role_slug }} #s_username').val(),
                d.email = $('.{{ $user_role_data->role_slug }} #s_email').val(),
                d.state = $('.{{ $user_role_data->role_slug }} #s_state').val(),
                d.city = $('.{{ $user_role_data->role_slug }} #s_city').val(),
                d.zipcode = $('.{{ $user_role_data->role_slug }} #s_zipcode').val()
            }
        },
        columns: [
                    { data: 'input', name: 'input', orderable: false, searchable: false , sortable: false},
                    { data: 'profile_image', name: 'profile_image', orderable: false, searchable: false , sortable: false},
                    { data: 'id', name: 'id' },
                    @if($user_role_data->id == 2)
                    { data: 'name', name: 'name' },
                    { data: 'username', name: 'username' },
                    @else
                    { data: 'company', name: 'company' },
                    { data: 'name', name: 'name' },
                    @endif
                    { data: 's_state', name: 's_state' },
                    { data: 'c_city', name: 'c_city' },
                    { data: 'zipcode', name: 'zipcode' },
                    { data: 'email', name: 'email' },
                    { data: 'phone_number', name: 'phone_number' },
                    @if($user_role_data->id == 2)
                    { data: 'insurer', name: 'insurer' },
                    { data: 'policy_number', name: 'policy_number' }
                    @endif
                    @if($user_role_data->id == 3)
                    { data: 'broker_name', name: 'broker_name' },
                    { data: 'provider_name', name: 'provider_name' }
                    @endif
                    @if($user_role_data->id == 4)
                    { data: 'broker_name', name: 'broker_name' },
                    @endif
               ],
        order: [[2, 'desc']],
        autoWidth: true,
        "drawCallback": function( settings ) {
            var selected = $("input[name='selectedradio']:checked").val();
            if(selected){
                $('#LoadUserEditSectionBtn').trigger('click');
            }
        }
    });

    $(document).on('keyup', ".{{ $user_role_data->role_slug }} #s_username, .{{ $user_role_data->role_slug }} #s_email, .{{ $user_role_data->role_slug }} #s_cn_fn", function(){
        table.draw();
        $('.gi_detail_section').html('').css('display','none');
    });

    
    $(document).on('change', ".{{ $user_role_data->role_slug }} #s_state, .{{ $user_role_data->role_slug }} #s_city, .{{ $user_role_data->role_slug }} #s_zipcode", function(){
        table.draw();
        $('.gi_detail_section').html('').css('display','none');
    });
});
</script>