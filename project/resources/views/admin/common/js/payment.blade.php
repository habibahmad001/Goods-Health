<script>
    $(document).on('click', '#payment_button', function(event){ 
        event.preventDefault();

        var closestthis = $(this).closest('#payment');

        var url = "{{ route('admin.save_payment', ['prefix' => Auth::user()->role->role_slug]) }}";

        var    user_id = $("input[name='selectedradio']:checked").val();
        var    policy_id = closestthis.find('input[name="policy_id"]').val();
        var    cpd_id = closestthis.find('input[name="cpd_id"]').val();
        var    policy_period = closestthis.find('input[name="policy_period"]').val();
        var    total_premium = closestthis.find('input[name="policy_amount"]').val();

        var    payment_plan = closestthis.find('input[name="payment_plan"]').val();
        var    card_name = closestthis.find('input[name="card_name"]').val();
        var    card_number = closestthis.find('input[name="card_number"]').val();
        var    expiry_date = closestthis.find('input[name="expiry_date"]').val();
        var    country = closestthis.find('input[name="country"]').val();
        var    security_code = closestthis.find('input[name="security_code"]').val();
        var    postal_code = closestthis.find('input[name="postal_code"]').val();

        var offset = closestthis.find('input[name="payment_history_offset"]').val();
        var broker_id = $('select[name="broker_user_id"]').val();
        var provider_id = $('select[name="provider_user_id"]').val();
        var agent_id = $('select[name="broker_employee"]').val();

        var data = {'policy_period':policy_period, 'payment_plan':payment_plan, 'total_premium':total_premium, 'card_name':card_name, 'card_number':card_number, 'expiry_date':expiry_date, 'country':country, 'security_code':security_code, 'postal_code':postal_code}

        if(validation_check(data, closestthis, 'yes')){

            if(policy_period != '' && total_premium != '' && payment_plan != '' && card_name != '' && card_number != '' && expiry_date != '' && country != '' && security_code != '' && postal_code != ''){
                $('#gi-overlay').show();
                $.ajax({
                    type:"POST",
                    url: url,
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id: user_id,
                        cpd_id: cpd_id,
                        policy_id: policy_id,
                        policy_period: policy_period,
                        total_premium: total_premium,

                        payment_plan: payment_plan,
                        card_name: card_name,
                        card_number: card_number,
                        expiry_date: expiry_date,
                        country: country,
                        security_code: security_code,
                        postal_code: postal_code,
                        broker_id: broker_id,
                        provider_id: provider_id,
                        agent_id: agent_id
                    },
                    success:function(response)
                    {   
                        alert_message('success', response.mes)

                        if(response.policy_id > 0){
                            closestthis.find('input[name="policy_id"]').val(response.policy_id);
                        }
                        if(response.policy_number != ''){
                            closestthis.find('input[name="policy_number"]').val(response.policy_number);
                        }
                        if(response.count > 0){

                            closestthis.find('input[name="payment_history_offset"]').val(response.offset);
                            closestthis.find('.payment_history').html('');
                            $.each(response.data, function(key,value) {
                                $('.payment_history').append('<tr><td>'+value.transaction_number+'</td><td class="text-center">'+value.created_at+'</td><td class="text-center">'+value.created_at+'</td><td class="text-center">$'+value.amount+'</td></tr>');
                            });
                        }
                        $('#gi-overlay').hide();
                    },
                    error: function(){
                        alert_message('error', 'Opps! Something went wrong.');
                        $('#gi-overlay').hide();
                    }
                });
            } else {
                alert_message('error', 'Please fill the payment form!')
            }
        }
    });

    $(document).on('click', '.show_more_payment_history', function(e){
        var thisz = $(this);
        var closestthis = $(this).closest('#payment');

        var user_id = $("input[name='selectedradio']:checked").val();
        var offset = closestthis.find('input[name="payment_history_offset"]').val();
        var url = "{{ route('admin.get_payment_history', ['prefix' => Auth::user()->role->role_slug]) }}";

        if(user_id){
            $.ajax({
                type:"GET",
                url: url+'/'+user_id+'/'+offset,
                success:function(response)
                {     
                    if(response.count > 0){
                        closestthis.find('input[name="payment_history_offset"]').val(response.offset);
                        
                        $.each(response.data, function(key,value) {
                            closestthis.find('.payment_history').append('<tr><td>'+value.transaction_number+'</td><td class="text-center">'+value.created_at+'</td><td class="text-center">'+value.created_at+'</td><td class="text-center">$'+value.amount+'</td></tr>');
                        });
                        
                    } else {
                        alert_message('error', 'No more payment history found!')
                    }
                }
            });
        }
    });
</script>