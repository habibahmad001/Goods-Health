<div class="row provider_profile_edit">
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0">
            @if($role_id == 2)
            <label for="company_name" class="col-sm-4 col-form-label">*First Name</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" name="full_name" value="{{ !empty($userdata->first_name) ? $userdata->first_name : old('full_name') }}">
                <span class="error-message">Please provide a valid first name.</span>
            </div>
            @else
            <label for="company" class="col-sm-4 col-form-label">*Company Name </label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="company" value="{{ !empty($userdata->company) ? $userdata->company: old('company') }}">
                <span class="error-message">Please provide a valid company name.</span>
            </div>
            @endif
            
            <label for="state" class="col-sm-4 col-form-label">*State</label>
            <div class="col-sm-8  input_f">
                <select class="in form-control state" name="state">
                    <option value="">Select State</option>
                        @foreach($state as $state_list)
                        <option value="{{ $state_list->state_code }}" {{ !empty($userdata->state) && ($userdata->state == $state_list->state_code) ? 'selected' : ''}} >{{$state_list->state}}</option>
                        @endforeach
                </select>
                <span class="error-message">Please provide a valid state.</span>
            </div>
            <label for="zipcode" class="col-sm-4 col-form-label">*Zipcode</label>
            <div class="col-sm-8  input_f">
                <select class="in form-control zipcode" name="zipcode">
                    <option value="">Select Zip Code</option>
                    @if(!empty($zipcodes))
                      @foreach($zipcodes as $zip_list)
                        <option value="{{ $zip_list->zipcode }}" {{ ( $userdata->zipcode == $zip_list->zipcode) ? 'selected' : ''}} >{{$zip_list->zipcode}}</option>
                      @endforeach
                    @endif
                </select>
                <span class="error-message">Please provide a valid zipcode.</span>
            </div>
            <label for="phone_number" class="col-sm-4 col-form-label">*Phone Number</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" name="phone_number" value="{{ !empty($userdata->phone_number) ? $userdata->phone_number : old('phone_number')}}">
                <span class="error-message">Please provide a valid phone number.</span>
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0">
            @if($role_id == 2)
            <label for="state" class="col-sm-4 col-form-label">Last Name</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" id="last_name" name="last_name" value="{{ !empty($userdata->last_name) ? $userdata->last_name : old('last_name') }}">
            </div>
            @else
            <label for="full_name" class="col-sm-4 col-form-label">*Contact Person</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="full_name" value="{{ !empty($userdata->name) ? $userdata->name : old('full_name') }}">
                <span class="error-message">Please provide a valid contact person.</span>
            </div>
            <input type="hidden" name="last_name" value="N/A">
            @endif
            <label for="city" class="col-sm-4 col-form-label">*City</label>
            <div class="col-sm-8  input_f">
                <select class="in form-control city" name="city">
                    <option value="">Select City</option>
                    @if(!empty($cities))
                        @foreach($cities as $city_list)
                        <option value="{{ $city_list->id }}" {{ ( $userdata->city == $city_list->id) ? 'selected' : ''}} >{{$city_list->city}}</option>
                        @endforeach
                    @endif
                </select>
                <span class="error-message">Please provide a valid city.</span>
            </div>
            <label for="county" class="col-sm-4 col-form-label">*County</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext county" id="county" name="county" value="{{ !empty($userdata->county) ? $userdata->county : '' }}" readonly="">
                <span class="error-message">Please provide a valid county.</span>
            </div>
        </div>
    </div>
    <div class="col-md-12 info_con profile_info_con">
        <div class="form-group row in_field pt-0">
            <label for="phone" class="col-lg-1 col-md-1 col-sm-1 col-form-label pt-3">Logo </label>
            @if(!empty($userdata->id))
            <label for="phone" class="col-lg-1 col-md-1 col-sm-1 col-form-label">
                <img src="{{ asset('uploads/'.$userdata->id.'/photos/'.$userdata->image)}}" width="45px" class="pull-right">
            </label>
            @else
            <label for="phone" class="col-lg-1 col-md-1 col-sm-1 col-form-label">
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
</div>