<div class="row provider_profile_edit pb-80">
    <div class="col-md-12 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0">
            <label for="company_name" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10 input_f input_radio">
                <input id="active" type="radio" name="status" value="1" {{ !empty($carrier_product->status) && $carrier_product->status == 1 ? 'checked' : 'checked' }}>
                <label class="radio-label" for="active">Active</label>

                <input id="inactive" type="radio" name="status" value="2" {{ !empty($carrier_product->status) && $carrier_product->status == 2 ? 'checked' : '' }}>
                <label class="radio-label" for="inactive">In active</label>

                <input id="down" type="radio" name="status" value="3" {{ !empty($carrier_product->status) && $carrier_product->status == 3 ? 'checked' : '' }}>
                <label class="radio-label" for="down">Down</label>
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0 no-border">
            <label for="multiple_state" class="col-sm-4 col-form-label">State*</label>
            <div class="col-sm-8 input_f">
                <select class="in form-control state" name="state">
                    <option value="">Select State</option>
                        @foreach($state as $state_list)
                        <option value="{{ $state_list->state_code }}" {{ !empty($carrier_product->state) && ($carrier_product->state == $state_list->state_code) ? 'selected' : ''}} >{{$state_list->state}}</option>
                        @endforeach
                </select>
                <span class="error-message">Please provide a valid state.</span>
            </div>

            <label for="multiple_zipcode" class="col-sm-4 col-form-label">Zipcode*</label>
            <div class="col-sm-8  input_f">
                <select class="in form-control zipcode" name="zipcode">
                    <option value="">Select Zip Code</option>
                    @if(!empty($zipcodes))
                      @foreach($zipcodes as $zip_list)
                        <option value="{{ $zip_list->zipcode }}" {{ ( $carrier_product->zipcode == $zip_list->zipcode) ? 'selected' : ''}} >{{$zip_list->zipcode}}</option>
                      @endforeach
                    @endif
                </select>
                <span class="error-message">Please provide a valid zipcode.</span>
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0 no-border">
            <label for="multiple_city" class="col-sm-4 col-form-label">City*</label>
            <div class="col-sm-8  input_f">
                <select class="in form-control city" name="city">
                    <option value="">Select City</option>
                    @if(!empty($cities))
                        @foreach($cities as $city_list)
                        <option value="{{ $city_list->id }}" {{ ( $carrier_product->city_id == $city_list->id) ? 'selected' : ''}} >{{$city_list->city}}</option>
                        @endforeach
                    @endif
                </select>
                <span class="error-message">Please provide a valid city.</span>
            </div>

            <label for="multiple_county" class="col-sm-4 col-form-label">County*</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext county" id="county" name="county" value="{{ !empty($carrier_product->county) ? $carrier_product->county : '' }}" readonly="">
                <span class="error-message">Please provide a valid county.</span>
            </div>
        </div>
    </div>
</div>