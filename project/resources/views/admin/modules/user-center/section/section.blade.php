<div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <div class="profile_card">
        <div class="row profile_title">
            <h4 class="text-primary">{{ ucwords(strtolower($role_name->role_name)) }} Profile</h4>
            <div class="pull-right pull-left-mob">
                <!-- <a data-toggle="collapse" href=".clps-provider_profile" role="button" aria-expanded="true" aria-controls="provider_profile">
                    <i class="fa fa-sort-down"></i>
                </a> -->
            </div>
        </div>

        <div class="row form-group-no-border collapse show clps-provider_profile" id="provider_profile">
            <div class="row provider_profile_edit">
                @if($role_name->parent_role_id > 0 && !empty($parent_user))
                <div class="col-md-6 info_con profile_info_con">
                    <div class="form-group row in_field pb-0">
                        <label for="parent_user_id" class="col-sm-4 col-form-label">*Parent User</label>
                        <div class="col-sm-8  input_f">
                            <select id="parent_user_id" class="in form-control" name="parent_user_id" required="">
                                <option value="">Select Parent User</option>
                                    @foreach($parent_user as $p_user)
                                    <option value="{{ encrypt($p_user->id) }}" {{ !empty($userdata->parent_user_id) && ($userdata->parent_user_id == $p_user->id) ? 'selected' : ''}} >{{ $p_user->name ? $p_user->name : $p_user->username }} - {{ $p_user->email }}</option>
                                    @endforeach
                            </select>
                            <span class="error-message">Please provide a valid state.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 info_con profile_info_con"></div>
                @endif
                <div class="col-md-6 info_con profile_info_con">
                    <div class="form-group row in_field">
                        <label for="full_name" class="col-sm-4 col-form-label">*Full Name</label>
                        <div class="col-sm-8  input_f">
                            <input type="text" class="in form-control-plaintext"  name="full_name" value="{{ !empty($userdata->name) ? $userdata->name : old('full_name') }}" required="">
                            <span class="error-message">Please provide a valid full name.</span>
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

                        @if($role_id == 2)
                        <label for="company" class="col-sm-4 col-form-label">Company Name </label>
                        <div class="col-sm-8  input_f">
                            <input type="text" class="in form-control-plaintext"  name="company" value="N/A" disabled>
                            <span class="error-message">Please provide a valid company name.</span>
                        </div>
                        @else
                        <label for="company" class="col-sm-4 col-form-label">*Company Name </label>
                        <div class="col-sm-8  input_f">
                            <input type="text" class="in form-control-plaintext"  name="company" value="{{ !empty($userdata->company) ? $userdata->company: old('company') }}" required="">
                            <span class="error-message">Please provide a valid company name.</span>
                        </div>
                        @endif
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

            <div class="col-md-12 pb-80">
                <div class="col-md-12">
                    <h4 class="text-primary">Access to Dashboard</h4>
                </div>
                <div class="col-md-12 pt-4 text-left profile_checkbox1">
                    <div class="col-md-12 pt-4 text-left">
                        @if($modules->isNotEmpty())
                            @foreach($modules as $module)
                            <label class="container_checkbox">{{ $module->module_name }}
                                <input type="checkbox" class="checkbox" name="access_to_dashboard[]" value="{{ $module->id }}" 
                                {{ in_array($module->id, $get_permission) ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-12 pb-80">
                <div class="col-md-12">
                    <h4 class="text-primary">Access to Products</h4>
                </div>
                <div class="col-md-12 pt-4 text-left profile_checkbox1 policiesSection">
                    <div class="col-md-12 pt-4 text-left">
                        @if(!empty($policies))
                        @foreach($policies as $list)
                        <label class="container_checkbox">{{$list->category_name}}
                            <input type="checkbox" class="checkbox" name="access_to_products[]" data-policy="{{$list->category_name}}" value="{{$list->category_id}}" <?php if(count($assigned_products) > 0) { foreach($assigned_products as $value){ if($value->product_category_id == $list->category_id ) { echo 'checked'; } } } ?> >
                            <span class="checkmark"></span>
                        </label>
                        @endforeach()
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row profile_title">
            <h4 class="text-primary">Authentication</h4>
            <div class="pull-right pull-left-mob">
            </div>
        </div>

        <div class="row form-group-no-border collapse show clps-authentication" id="authentication">
            <div class="row provider_profile_edit">
                <div class="col-md-6 info_con profile_info_con">
                    <div class="form-group row in_field pb-0">
                        <label for="user_name" class="col-sm-4 col-form-label">*Username</label>
                        <div class="col-sm-8  input_f">
                            <input type="text" class="in form-control-plaintext" id="user_name" name="username" autocomplete="off" value="{{ !empty($userdata->username) ? $userdata->username : old('username') }}" {{ !empty($userdata->username) ? 'readonly' : '' }}>
                            <strong style="color: red" class="username_error"></strong>
                            <span class="error-message">Please provide a valid username.</span>
                        </div>
                        <label for="city" class="col-sm-4 col-form-label">*Password</label>
                        <div class="col-sm-8  input_f">
                            <input type="password" class="in form-control-plaintext" id="password" name="password" autocomplete="off">
                            <span class="error-message">Please provide a valid password.</span>
                        </div>
                        @if(empty($userdata))
                        <label for="city" class="col-sm-4 col-form-label">*Confirm Password</label>
                        <div class="col-sm-8  input_f">
                            <input type="password" class="in form-control-plaintext" id="password_c" name="confirmed" autocomplete="off" value="">
                            <span class="error-message">Password does not match.</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 info_con profile_info_con">
                    <div class="form-group row in_field pb-0">

                        <label for="state" class="col-sm-4 col-form-label">*Email </label>
                        <div class="col-sm-8  input_f">
                            <input type="email" class="in form-control-plaintext" id="email" name="email" value="{{ !empty($userdata->email) ? $userdata->email : old('email') }}"  autocomplete="off" {{ !empty($userdata->username) ? 'readonly' : '' }}>
                            <strong style="color: red" class="email_error"></strong>
                            <span class="error-message">Please provide a valid email address.</span>
                        </div>
                        @if($role_id == 2)
                        <label class="col-sm-4 col-form-label">Temporay Password Link </label>
                        <div class="col-sm-8  input_f mb-0">
                            <label class="container_checkbox"> Save
                                <input type="checkbox" class="checkbox" name="access_link" value="1" {{ !empty($userdata->access_link) ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row provider_profile_edit">
                <div class="col-md-6 info_con profile_info_con">
                    <div class="form-group row in_field pb-0">
                        <label for="security_question_one" class="col-sm-4 col-form-label">Security Question 1</label>
                        <div class="col-sm-8  input_f">
                            <select  class="in form-control " name="security_question_one" id="security_question_one">
                                <option value="">Choose Question</option>
                                <option value="10" {{ !empty($userdata->security_question_one) && $userdata->security_question_one == 10 ? 'selected' : ''}}>What was your chilhood nickname ? </option>
                                <option value="1" {{ !empty($userdata->security_question_one) && $userdata->security_question_one == 1 ? 'selected' : ''}}>What is the name of your favorite childhood friend ?</option>
                                <option value="2" {{ !empty($userdata->security_question_one) && $userdata->security_question_one == 2 ? 'selected' : ''}}>In what city or town your father and mother meet ? </option>
                                <option value="3" {{ !empty($userdata->security_question_one) && $userdata->security_question_one == 3 ? 'selected' : ''}}>What is your favorite team  ? </option>
                                <option value="4" {{ !empty($userdata->security_question_one) && $userdata->security_question_one == 4 ? 'selected' : ''}}>What is your favorite movie  ? </option>
                                <option value="5" {{ !empty($userdata->security_question_one) && $userdata->security_question_one == 5 ? 'selected' : ''}}>What was your favorite sport in high school ? </option>
                                <option value="6" {{ !empty($userdata->security_question_one) && $userdata->security_question_one == 6 ? 'selected' : ''}}>What was your favorite food as a child ? </option>
                                <option value="7" {{ !empty($userdata->security_question_one) && $userdata->security_question_one == 7 ? 'selected' : ''}}>What is the first name of the  boy  or girl that you first kissed ? </option>
                                <option value="8" {{ !empty($userdata->security_question_one) && $userdata->security_question_one == 8 ? 'selected' : ''}}>What was the make and model of your  first car ? </option>
                                   
                            </select>
                        </div>
                        <label for="security_question_two" class="col-sm-4 col-form-label">Security Question 2</label>
                        <div class="col-sm-8  input_f">
                            <select  class="in form-control " name="security_question_two">
                                <option value="">Choose Question</option>
                                     <option value="10" {{ !empty($userdata->security_question_two) && $userdata->security_question_two == 10 ? 'selected' : ''}}>What was your chilhood nickname ? </option>
                                    <option value="1" {{ !empty($userdata->security_question_two) && $userdata->security_question_two == 1 ? 'selected' : ''}}>What is the name of your favorite childhood friend ?</option>
                                    <option value="2" {{ !empty($userdata->security_question_two) && $userdata->security_question_two == 2 ? 'selected' : ''}}>In what city or town your father and mother meet ? </option>
                                    <option value="3" {{ !empty($userdata->security_question_two) && $userdata->security_question_two == 3 ? 'selected' : ''}}>What is your favorite team  ? </option>
                                    <option value="4" {{ !empty($userdata->security_question_two) && $userdata->security_question_two == 4 ? 'selected' : ''}}>What is your favorite movie  ? </option>
                                    <option value="5" {{ !empty($userdata->security_question_two) && $userdata->security_question_two == 5 ? 'selected' : ''}}>What was your favorite sport in high school ? </option>
                                    <option value="6" {{ !empty($userdata->security_question_two) && $userdata->security_question_two == 6 ? 'selected' : ''}}>What was your favorite food as a child ? </option>
                                    <option value="7" {{ !empty($userdata->security_question_two) && $userdata->security_question_two == 7 ? 'selected' : ''}}>What is the first name of the  boy  or girl that you first kissed ? </option>
                                    <option value="8" {{ !empty($userdata->security_question_two) && $userdata->security_question_two == 8 ? 'selected' : ''}}>What was the make and model of your  first car ? </option>
                                   
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 info_con profile_info_con">
                    <div class="form-group row in_field pb-0">
                        <label for="last_name" class="col-md-4 col-form-label"> Answer </label>
                        <div class="col-sm-8 input_f">
                           <input type="text" class="in form-control-plaintext" name="answer_one" value="{{ !empty($userdata->answer_one) ? $userdata->answer_one : ''}}">
                        </div>
                        <label for="last_name" class="col-md-4 col-form-label"> Answer </label>
                        <div class="col-sm-8 input_f">
                           <input type="text" class="in form-control-plaintext" name="answer_two" value="{{ !empty($userdata->answer_two) ? $userdata->answer_two : '' }}">
                        </div>
                    </div>
                </div>

                @if($role_name->id != 1)
                <div class="col-md-6 info_con profile_info_con">
                    <div class="form-group row in_field">
                        <label for="last_name" class="col-md-4 col-form-label"> Dashboard Access </label>
                        <div class="col-sm-8 input_f">
                            <div class="toggle-button-cover">
                                <div class="button-cover">
                                    <div class="button r" id="auth-status">
                                        <input type="checkbox" class="checkbox" name="dashboard_access" value="0" {{ !empty($userdata) && $userdata->dashboard_access == 0 ? 'checked' : '' }}>
                                        <div class="knobs"></div>
                                        <div class="layer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>