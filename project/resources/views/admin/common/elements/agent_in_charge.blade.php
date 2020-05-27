<div class="row provider_profile_edit">
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field">
            <label for="emergency_contact" class="col-sm-4 col-form-label">*Broker</label>
            <div class="col-sm-8 input_f">
                <select  class="in form-control " name="broker_user_id">
                    <option value="">Select Broker</option>
                    @foreach($brokers as $brokers_list)
                    <option value="{{ $brokers_list->id }}"
                    {{ !empty($userdata) && ( $userdata->broker_user_id == $brokers_list->id ) ? 'selected' : ''}}
                    >{{$brokers_list->name}}</option>
                    @endforeach
                </select>
            </div>
            <label for="last_name" class="col-sm-4 col-form-label">*Provider</label>
            <div class="col-sm-8 input_f">
                <select  class="in form-control " name="provider_user_id">
                    <option value="">Select Provider</option>
                    @foreach($providers as $providers_list)
                    <option value="{{ $providers_list->id }}"
                    {{ !empty($userdata) && ( $userdata->provider_user_id == $providers_list->id ) ? 'selected' : ''}}
                    >{{$providers_list->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field">
            <label for="spouse" class="col-sm-4 col-form-label">Name/Email</label>
            <div class="col-sm-8 input_f">
                <select  class="in form-control" name="broker_employee" >
                    <option value="">Please Select Broker Agent</option>
                    @if(!empty($brokers_emp))
                    @foreach($brokers_emp as $brokers_emp_list)
                    <option value="{{ $brokers_emp_list->id }}" {{ $userdata->agent_user_id == $brokers_emp_list->id ? 'selected' : ''}}>{{ $brokers_emp_list->name.'/'.$brokers_emp_list->email }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
</div>