<div class="profile_card box_shadow">
    <div class="row profile_title">
        <h4 class="text-primary"> {{ ucwords(strtolower($role_data_for_user->role_name)) }} Profile</h4>
        <div class="pull-left-mob">
            <a data-toggle="collapse" href=".clps-provider_profile" role="button" aria-expanded="true" aria-controls="provider_profile">
                <i class="fa fa-sort-down"></i>
            </a>
        </div>
    </div>

    <div class="form-group-no-border collapse show clps-provider_profile" id="provider_profile">
        <div class="row provider_profile_edit">
                <div class="col-md-6 info_con profile_info_con">
                    <div class="form-group row in_field">
                        <label for="company" class="col-sm-4 col-form-label">*Company Name </label>
                        <div class="col-sm-8  input_f">
                            <input type="text" class="in form-control-plaintext"  name="company" value="{{ !empty($userdata->company) ? $userdata->company: old('company') }}" required="">
                            <span class="error-message">Please provide a valid company name.</span>
                        </div>

                        <label for="state" class="col-sm-4 col-form-label">*State</label>
                        <div class="col-sm-8  input_f">
                            <select class="in form-control state" name="state" required="">
                                <option value="">Select State</option>
                                    @foreach($state as $state_list)
                                    <option value="{{ $state_list->state_code }}" {{ !empty($userdata->state) && ($userdata->state == $state_list->state_code) ? 'selected' : ''}} >{{$state_list->state}}</option>
                                    @endforeach
                            </select>
                            <span class="error-message">Please provide a valid state.</span>
                        </div>
                        <label for="zipcode" class="col-sm-4 col-form-label">*Zipcode</label>
                        <div class="col-sm-8  input_f">
                            <select class="in form-control zipcode" name="zipcode" required="">
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
                            <input type="text" class="in form-control-plaintext" name="phone_number" value="{{ !empty($userdata->phone_number) ? $userdata->phone_number : old('phone_number')}}" required="">
                            <span class="error-message">Please provide a valid phone number.</span>
                        </div>
                        <!-- <label for="phone" class="col-sm-2 col-form-label pt-3">Logo </label>
                        @if(!empty($userdata->id))
                        <label for="phone" class="col-sm-2 col-form-label">
                            <img src="{{ asset('uploads/'.$userdata->id.'/photos/'.$userdata->image)}}" width="40px" class="pull-right">
                        </label>
                        @else
                        <label for="phone" class="col-sm-2 col-form-label">
                            <img src="" width="40px" class="pull-right">
                        </label>
                        @endif
                        <div class="col-sm-8 pt-1">
                            <input type="file" class="file_upload inputfile" name="image" id="file_emp">
                            <label for="file_emp">Browse</label>
                        </div> -->

                    </div>
                </div>
                <div class="col-md-6 info_con profile_info_con">
                    <div class="form-group row in_field">

                        <label for="full_name" class="col-sm-4 col-form-label">*Full Name</label>
                        <div class="col-sm-8  input_f">
                            <input type="text" class="in form-control-plaintext"  name="full_name" value="{{ !empty($userdata->name) ? $userdata->name : old('full_name') }}" required="">
                            <span class="error-message">Please provide a valid full name.</span>
                        </div>
                        <input type="hidden" name="last_name" value="N/A">
                        <label for="city" class="col-sm-4 col-form-label">*City</label>
                        <div class="col-sm-8  input_f">
                            <select class="in form-control city" name="city" required="" >
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
                            <input type="text" class="in form-control-plaintext county" id="county" name="county" value="{{ !empty($userdata->county) ? $userdata->county : '' }}" readonly="" required="">
                            <span class="error-message">Please provide a valid county.</span>
                        </div>
                    </div>
                </div>
            </div>

        @include('admin.common.elements.access_to_dashboard')

        @include('admin.common.elements.access_to_product')
    </div>
</div>
<div class="profile_card box_shadow">
    <div class="row profile_title">
        <h4 class="text-primary">Authentication</h4>
        <div class="pull-left-mob">
            <a data-toggle="collapse" href=".clps-authentication" role="button" aria-expanded="true" aria-controls="authentication">
                <i class="fa fa-sort-down"></i>
            </a>
        </div>
    </div>

    <div class="form-group-no-border  collapse show clps-authentication" id="authentication">
        @include('admin.common.elements.authentication')
    </div>
</div>