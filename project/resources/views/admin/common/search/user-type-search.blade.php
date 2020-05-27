<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row no-margin">
            <div class="col-sm-12  profile_card ">
                <div class="row profile_title">
                    <h4 class="text-primary">Search User</h4>
                </div>

                <div class="row form-group-no-border collapse show usertype-search">
                    <div class="row provider_profile_edit">
                        <div class="col-md-1"></div>
                        <div class="col-md-5 info_con profile_info_con">
                            <div class="form-group row in_field">
                                <label for="user_type_role_id" class="col-md-4 col-form-label">User Type</label>
                                <div class="col-md-8 input_f">
                                    <select id="user_type_role_id" class="in form-control" name="role_id" required>
                                        <option value="">Select User Type</option>
                                        @foreach($roles as $role)
                                        <option value="{{ encrypt($role->id) }}">{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="s_city" class="col-md-4 col-form-label">City</label>
                                <div class="col-md-8 input_f">
                                    <select id="s_city" class="in form-control searchCityUser" name="city">
                                        <option value="">Select City</option> 
                                    </select>
                                </div>

                                <label for="s_city" class="col-md-4 col-form-label">User</label>
                                <div class="col-md-8 input_f">
                                    <select id="user_data_id" class="in form-control" name="user_id" required>
                                        <option value="">Select User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 info_con profile_info_con">
                            <div class="form-group row in_field">
                                <label for="s_state" class="col-md-4 col-form-label">State</label>
                                <div class="col-md-8 input_f">
                                    <select id="s_state" class="in form-control searchStateUser" name="state">
                                        <option value="">Select State</option>
                                        @foreach($state as $state_list)
                                        <option value="{{ $state_list->state_code }}">{{$state_list->state}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="s_zipcode" class="col-md-4 col-form-label">Zipcode</label>
                                <div class="col-md-8 input_f">
                                    <select id="s_zipcode" class="in form-control searchZipcodeUser" name="zipcode">
                                        <option value="">Select Zipcode</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="user-center-search">
</div>