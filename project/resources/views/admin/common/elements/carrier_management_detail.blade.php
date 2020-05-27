<div class="row provider_profile_edit pb-80">
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0">
            <label for="carrier_id" class="col-sm-4 col-form-label">Carrier ID*</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" name="carrier_id" value="{{ !empty($carrier_detail->carrier_id) ? $carrier_detail->carrier_id : $carrier_id }}" readonly>
                <span class="error-message">Please provide a valid carrier id.</span>
            </div>
            <label for="carrier_address" class="col-sm-4 col-form-label">Address*</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="carrier_address" value="{{ !empty($carrier_detail->carrier_address) ? $carrier_detail->carrier_address : '' }}">
                <span class="error-message">Please provide a valid address.</span>
            </div>
            <label for="c_city" class="col-sm-4 col-form-label">City*</label>
            <div class="col-sm-8  input_f">
                <select class="in form-control city" name="carrier_city">
                    <option value="">Select City</option>
                    @if(!empty($cities))
                        @foreach($cities as $city_list)
                        <option value="{{ $city_list->id }}" {{ ( $carrier_detail->carrier_city == $city_list->id) ? 'selected' : ''}} >{{$city_list->city}}</option>
                        @endforeach
                    @endif
                </select>
                <span class="error-message">Please provide a valid city.</span>
            </div>
            <label for="carrier_email" class="col-sm-4 col-form-label">Email*</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="email" value="{{ !empty($carrier_detail->carrier_email) ? $carrier_detail->carrier_email : '' }}">
                <span class="error-message">Please provide a valid email address.</span>
            </div>
            <label for="carrier_website" class="col-sm-4 col-form-label">Website</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="carrier_website" value="{{ !empty($carrier_detail->carrier_website) ? $carrier_detail->carrier_website : '' }}">
                <span class="error-message">Please provide a valid website.</span>
            </div>

            <label for="carrier_logo" class="col-sm-3 col-form-label pt-3">Logo </label>
            @if(!empty($carrier_detail->id))
            <label for="carrier_logo" class="col-lg-1 col-md-1 col-sm-1 col-form-label">
                <img src="{{ asset('uploads/carrier/'.$carrier_detail->id.'/logo/'.$carrier_detail->carrier_logo)}}" width="45px" class="pull-right">
            </label>
            @else
            <label for="carrier_logo" class="col-lg-1 col-md-1 col-sm-1 col-form-label">
                <!-- <img src="" width="40px" class="pull-right"> -->
            </label>
            @endif
            <div class="pt-1 ml-2">
                <input type="file" class="file_upload inputfile" name="image" id="single_file">
                <label for="single_file" class="single_file_label">Browse</label>
                <div class="alert bg-card-skyline p-2 mb-0" role="alert" id="single_file_name_to_display" style="display: none;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0">
            <label for="carrier_name" class="col-sm-4 col-form-label">Carrier Name</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" name="carrier_name" value="{{ !empty($carrier_detail->carrier_name) ? $carrier_detail->carrier_name : '' }}">
                <span class="error-message">Please provide a valid carrier name.</span>
            </div>
            <label for="s_state" class="col-sm-4 col-form-label">State</label>
            <div class="col-sm-8  input_f">
                <select class="in form-control state" name="carrier_state">
                    <option value="">Select State</option>
                        @foreach($state as $state_list)
                        <option value="{{ $state_list->state_code }}" {{ !empty($carrier_detail->carrier_state) && ($carrier_detail->carrier_state == $state_list->state_code) ? 'selected' : ''}} >{{$state_list->state}}</option>
                        @endforeach
                </select>
                <span class="error-message">Please provide a valid state.</span>
            </div>
            <label for="carrier_zipcode" class="col-sm-4 col-form-label">Zipcode</label>
            <div class="col-sm-8  input_f">
                <select class="in form-control zipcode" name="carrier_zipcode">
                    <option value="">Select Zip Code</option>
                    @if(!empty($zipcodes))
                      @foreach($zipcodes as $zip_list)
                        <option value="{{ $zip_list->zipcode }}" {{ ( !empty($carrier_detail->carrier_zipcode) && $carrier_detail->carrier_zipcode == $zip_list->zipcode) ? 'selected' : ''}} >{{$zip_list->zipcode}}</option>
                      @endforeach
                    @endif
                </select>
                <span class="error-message">Please provide a valid zipcode.</span>
            </div>
            <label for="carrier_phone" class="col-sm-4 col-form-label">Phone</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="phone_number" value="{{ !empty($carrier_detail->carrier_phone) ? $carrier_detail->carrier_phone : '' }}">
                <span class="error-message">Please provide a valid phone number.</span>
            </div>
            <label for="carrier_hotline" class="col-sm-4 col-form-label">Hotline</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="carrier_hotline" value="{{ !empty($carrier_detail->carrier_hotline) ? $carrier_detail->carrier_hotline : '' }}">
                <span class="error-message">Please provide a valid hotline.</span>
            </div>
        </div>
    </div>
</div>