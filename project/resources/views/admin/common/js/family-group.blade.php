<script>
   $(function() {
         var table = $('#table_family_group').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
            url: "{{ route('admin.family_group_list_datatables', ['prefix' => Auth::user()->role->role_slug]) }}",
            data: function (d) {
                d.username = $('.main-search-module #s_username').val(),
                d.email = $('.main-search-module #s_email').val(),
                d.state = $('.main-search-module #s_state').val(),
                d.city = $('.main-search-module #s_city').val(),
                d.zipcode = $('.main-search-module #s_zipcode').val()
            }
         },
         columns: [
                  { data: 'input', name: 'input', orderable: false, searchable: false , sortable: false},
                  { data: 'id', name: 'id' },
                  { data: 'first_name', name: 'first_name' },
                  { data: 'last_name', name: 'last_name' },
                  { data: 'occupation', name: 'occupation' },
                  { data: 'employment_status', name: 'employment_status' },
                  { data: 's_state', name: 's_state' },
                  { data: 'c_city', name: 'c_city' },
                  { data: 'zipcode', name: 'zipcode' },
                  { data: 'email', name: 'email' },
                  { data: 'phone_number', name: 'phone_number' },
               ],
         order: [[2, 'desc']],
         autoWidth: true
      });

      $(document).on('keyup', ".main-search-module #s_cn_fn", function(){
         table.draw();
         $('.gi_detail_section').css('display','none');
         $('.gi_detail_section').html('');
      });

      $(document).on('keyup', ".main-search-module #s_username", function(){
         table.draw();
         $('.gi_detail_section').css('display','none');
         $('.gi_detail_section').html('');
      });

      $(document).on('keyup', ".main-search-module #s_email", function(){
         table.draw();
         $('.gi_detail_section').css('display','none');
         $('.gi_detail_section').html('');
      });

      $(document).on('change', ".main-search-module #s_state", function(){
          table.draw();
          $('.gi_detail_section').css('display','none');
          $('.gi_detail_section').html('');
      });

      $(document).on('change', ".main-search-module #s_city", function(){
         table.draw();
         $('.gi_detail_section').css('display','none');
         $('.gi_detail_section').html('');
      });

      $(document).on('change', ".main-search-module #s_zipcode", function(){
         table.draw();
         $('.gi_detail_section').css('display','none');
         $('.gi_detail_section').html('');
      });
   });


</script>