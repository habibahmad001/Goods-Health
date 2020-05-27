<div class="wrap_con box_shadow">
    <div class="full_wrap {{ $user_role_data->role_slug }}" id="searchSection">
        <div class="row no-margin">
            <div class="col-sm-12  profile_card ">
                <div class="row profile_title">
                    <h4 class="text-primary">Search</h4>
                </div>

                <div class="row form-group-no-border collapse show clps-agent-in-charge main-search-module">
                    @if(request()->is('*/user/*_employee'))
                    <div class="row provider_profile_edit">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5 info_con profile_info_con">
                            <div class="form-group row in_field mb-0 pb-0">
                                <label for="user_role_id" class="col-md-4 col-form-label">Employee</label>
                                <div class="col-md-8 input_f mb-0">
                                    <select id="redirect_to_employee_role" class="in form-control" name="role_id" required>
                                        <option value="">Select User Type</option>
                                        @foreach($get_roles as $get_role)
                                            @if(in_array($get_role->id, [7,8,9,10]))
                                            <option value="{{route('admin.users.show', ['prefix' => Auth::user()->role->role_slug, 'u_type' => $get_role->role_slug])}}" {{ request()->is('*/user/'.$get_role->role_slug) ? 'selected' : '' }}>{{ $get_role->role_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row provider_profile_edit">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5 info_con profile_info_con">
                            <div class="form-group row in_field">
                                <label for="s_username" class="col-md-4 col-form-label">Username</label>
                                <div class="col-md-8 input_f">
                                    <input type="text" class="in form-control-plaintext" id="s_username" name="username">
                                </div>

                                <label for="s_state" class="col-md-4 col-form-label">State</label>
                                <div class="col-md-8 input_f">
                                    <select id="s_state" class="in form-control searchState" name="state">
                                        <option value="">Select State</option>
                                        @foreach($state as $state_list)
                                        <option value="{{ $state_list->state_code }}">{{$state_list->state}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="s_zipcode" class="col-md-4 col-form-label">Zipcode</label>
                                <div class="col-md-8 input_f">
                                    <select id="s_zipcode" class="in form-control searchZipcode" name="zipcode">
                                        <option value="">Select Zipcode</option>
                                    </select>
                                </div>

                                <label for="s_email" class="col-md-4 col-form-label">Email</label>
                                <div class="col-md-8 input_f">
                                    <input type="text" class="in form-control-plaintext" id="s_email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 info_con profile_info_con">
                            <div class="form-group row in_field">
                                <label for="s_cn_fn" class="col-md-4 col-form-label">
                                @if($user_role_data->role_slug == 'customer')
                                    Full Name
                                @elseif($user_role_data->role_slug == 'employee')
                                    Name
                                @elseif($user_role_data->role_slug == 'provider' || $user_role_data->role_slug == 'business')
                                    Company Name
                                @else
                                    Full Name
                                @endif
                                </label>
                                <div class="col-md-8 input_f">
                                    <input type="text" class="in form-control-plaintext" id="s_cn_fn" name="name">
                                </div>

                                <label for="s_city" class="col-md-4 col-form-label">City</label>
                                <div class="col-md-8 input_f">
                                    <select id="s_city" class="in form-control searchCity" name="city">
                                        <option value="">Select City</option> 
                                    </select>
                                </div>

                                <label for="s_county" class="col-md-4 col-form-label">County</label>
                                <div class="col-md-8 input_f">
                                    <input id="s_county" class="in form-control searchCounty" name="county" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>