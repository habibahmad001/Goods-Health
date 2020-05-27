<div class="row provider_profile_edit pb-80">
    <div class="col-md-12 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0">
            <label for="company_name" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10 input_f input_radio">
                <input id="active" type="radio" name="status" value="1" {{ !empty($carrier_detail->status) && $carrier_detail->status == 1 ? 'checked' : '' }}>
                <label class="radio-label" for="active">Active</label>

                <input id="inactive" type="radio" name="status" value="2" {{ !empty($carrier_detail->status) && $carrier_detail->status == 2 ? 'checked' : '' }}>
                <label class="radio-label" for="inactive">In active</label>

                <input id="down" type="radio" name="status" value="3" {{ !empty($carrier_detail->status) && $carrier_detail->status == 3 ? 'checked' : '' }}>
                <label class="radio-label" for="down">Down</label>
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0 no-border">
            <label for="multiple_state" class="col-sm-4 col-form-label">State*</label>
            <div class="col-sm-8 input_f">
                <select class="in form-control" id="multiple_state" name="state[]" multiple="multiple" autocomplete="off">
                    <option value="">Select State</option>
                        @foreach($state as $state_list)
                        <option value="{{ $state_list->state_code }}" {{ !empty($get_states) && $get_states->contains($state_list->state_code) ? 'selected' : ''}} >{{$state_list->state}}</option>
                        @endforeach
                </select>
            </div>

            <label for="multiple_zipcode" class="col-sm-4 col-form-label">Zipcode*</label>
            <div class="col-sm-8  input_f">
                <select class="in form-control" id="multiple_zipcode" name="zipcode[]" multiple="multiple" autocomplete="off">
                    @if(!empty($multiple_zipcodes))
                        @foreach($multiple_zipcodes as $m_zipcode_list)
                        <option value="{{ $m_zipcode_list->text }}" {{ !empty($get_zipcodes) && $get_zipcodes->contains($m_zipcode_list->text) ? 'selected' : ''}} >{{$m_zipcode_list->text}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0 no-border">
            <label for="multiple_city" class="col-sm-4 col-form-label">City*</label>
            <div class="col-sm-8  input_f">
                <select class="in form-control" id="multiple_city" name="city[]" multiple="multiple" autocomplete="off">
                    @if(!empty($multiple_cities))
                        @foreach($multiple_cities as $m_city_list)
                        <option value="{{ $m_city_list->id }}" {{ !empty($get_cities) && $get_cities->contains($m_city_list->id) ? 'selected' : ''}} >{{$m_city_list->text}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="multiple_county" class="col-sm-4 col-form-label">County*</label>
            <div class="col-sm-8  input_f">
                <select class="in form-control" id="multiple_county" name="county[]" multiple="multiple" autocomplete="off">
                    @if(!empty($multiple_county))
                        @foreach($multiple_county as $m_county_list)
                        <option value="{{ $m_county_list->text }}" {{ !empty($get_counties) && $get_counties->contains($m_county_list->text) ? 'selected' : ''}} >{{$m_county_list->text}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
</div>