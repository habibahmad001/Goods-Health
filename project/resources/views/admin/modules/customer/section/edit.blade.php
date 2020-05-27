                    <form method="POST" action="{{ route('admin.users.update', ['prefix' => Auth::user()->role->role_slug]) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="company" value="N/A">
                        <input type="hidden" name="userid" value="{{ encrypt($userdata->id) }}" >
                        <input type="hidden" name="role_id" value="{{ encrypt($userdata->role_id) }}">
                        <input type="hidden" name="u_type" value="{{ encrypt($u_type) }}">
                        @include('admin.modules.customer.section.basic_info')

                        @include('admin.modules.customer.section.detailed_info')

                        @include('admin.modules.customer.section.family_group_info')

                        @include('admin.modules.customer.section.emergency_contact')

                        @include('admin.modules.customer.section.authentication')

                        @include('admin.modules.customer.section.product_category_selection')

                        @include('admin.modules.customer.section.insurance_options')

                        @include('admin.modules.customer.section.customer_benefit')

                        @include('admin.modules.customer.section.agent_in_charge')

                        @include('admin.modules.customer.section.payment')

                        @include('admin.modules.customer.section.document_list')

                        
                        <div class="wrap_con box_shadow">
                            <div class="full_wrap">
                                <div class="row no-margin">
                                    <div class="col-sm-12  profile_card">
                                        <div class="row">
                                            <div class="col-md-12 text-center pt-5 pb-5">
                                                <button class="btn btn-submit" type="submit" name="EdituserBtn">{{ __('UPDATE') }}</button>
                                                <button type="reset" class="btn btn-reset gi_cancel_button">{{ __('CANCEL') }}</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

<script type="text/javascript">
    @if(!empty($policy))
        $(document).on('click', '.payment_cancel_button', function(e){
            $('input[name="total_premium"]').val('${{ $policy->price_1 }}/MO');
            $('input[name="policy_period"]').val("{{ $policy->policy_period }}");
            $('input[name="policy_amount"]').val("{{ $policy->price_1 }}");
            $('input[name="policy_id"]').val("{{ $policy->id }}");
            $('input[name="policy_number"]').val("{{ $policy->policy_number }}");
        });
    @endif
    
</script>