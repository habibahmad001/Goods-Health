<input type="hidden" name="user_family_group_id" value="{{!empty($userdata->user_family_group_id) ? $userdata->user_family_group_id : 0 }}">
@if(isset($family_group_info) && (!empty($family_group_info) && $family_group_info->isNotEmpty()))
@foreach($family_group_info as $fg_key => $fg_list)
<div class="row provider_profile_edit {{ $fg_key != 0 ? 'familygrp_sec' : '' }}">
    <input type="hidden" value="{{ $fg_list->id }}" name="fm[{{$fg_key}}][fg_id]">
    <input type="hidden" value="{{ $fg_list->self_user_id }}" name="fm[{{$fg_key}}][fm_self_user_id]" class="fg_self_user_id">
    <div class="col-md-12 info_con profile_info_con">
        <div class="form-group row in_field pb-0">
            <label class="col-sm-2 col-form-label">Employer Name</label>
            <div class="col-sm-4  input_f mb-0">
                <input type="text" class=" in form-control-plaintext" name="fm[{{$fg_key}}][fm_employer_name]" value="{{ $fg_list->employer_name }}">
            </div>

            <label class="col-sm-2 col-form-label">Employer Phone</label>
            <div class="col-sm-4  input_f mb-0">
                <input type="text" class=" in form-control-plaintext" name="fm[{{$fg_key}}][fm_employer_phone]" value="{{ $fg_list->employer_phone }}">
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4  input_f mb-0">
                <input type="email" class=" in form-control-plaintext family_group_email" name="fm[{{$fg_key}}][fm_email]" value="{{ $fg_list->email }}">
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <div class="col-sm-6 input_f mb-0">
                <select class="in form-control fg_relation" name="fm[{{$fg_key}}][family_relation]">
                    <option value=""> Please select Relationship with Family/Group Member</option>
                    <option value="1" {{$fg_list->relation == 1 ? 'selected' : ''}}>Spouse</option>
                    <option value="2" {{$fg_list->relation == 2 ? 'selected' : ''}}> Child</option>
                    <option value="3" {{$fg_list->relation == 3 ? 'selected' : ''}}> Sibling</option>
                    <option value="4" {{$fg_list->relation == 4 ? 'selected' : ''}}> Mother</option>
                    <option value="5" {{$fg_list->relation == 5 ? 'selected' : ''}}> Father</option>
                </select>
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="company_name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-4  input_f mb-0">
                <input type="text" class=" in form-control-plaintext fg_name" name="fm[{{$fg_key}}][fm_name]" value="{{ $fg_list->first_name }}">
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="company_name" class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-4 input_f mb-0">
                <input type="text" class="in form-control-plaintext date_of_birth fg_dob" name="fm[{{$fg_key}}][fm_dob]" value="{{ $fg_list->dob }}" readonly>
                <i class="fa fa-calendar fa-lg datepicker_icon" aria-hidden="true"></i>
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="company_name" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-3  input_f input_radio mb-0">
                <input id="fmg_male{{$fg_key}}" class="fg_gender" type="radio" name="fm[{{$fg_key}}][fm_gender]" value="0" {{$fg_list->gender == 0 ? 'checked' : ''}}>
                <label class="radio-label" for="fmg_male{{$fg_key}}">Male</label>

                <input id="fmg_female{{$fg_key}}" class="fg_gender" type="radio" name="fm[{{$fg_key}}][fm_gender]" value="1" {{$fg_list->gender == 1 ? 'checked' : ''}}>
                <label class="radio-label" for="fmg_female{{$fg_key}}">Female</label>

                <input id="fmg_other{{$fg_key}}" class="fg_gender" type="radio" name="fm[{{$fg_key}}][fm_gender]" value="2" {{$fg_list->gender == 2 ? 'checked' : ''}}>
                <label class="radio-label" for="fmg_other{{$fg_key}}">Other</label>
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="city" class="col-sm-2 col-form-label">Social Security Number</label>
            <div class="col-sm-4 offset-sm-2 ml-0 input_f mb-0">
                <input type="text" class="in form-control-plaintext fg_ssn" name="fm[{{$fg_key}}][fm_ssn]" value="{{ $fg_list->social_security_number }}">
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="city" class="col-sm-5 col-form-label">
                Are you currently a U.S. citizen or permanent resident?
            </label>
            <div class="col-sm-7  input_f input_radio mb-0">
                <input id="fmresident_yes{{$fg_key}}" class="fg_resident" type="radio" name="fm[{{$fg_key}}][fm_resident]" value="1" {{$fg_list->resident == 1 ? 'checked' : ''}}>
                <label class="radio-label" for="fmresident_yes{{$fg_key}}">Yes</label>

                <input id="fmresident_no{{$fg_key}}" class="fg_resident" type="radio" name="fm[{{$fg_key}}][fm_resident]" value="0" {{$fg_list->resident == 0 ? 'checked' : ''}}>
                <label class="radio-label" for="fmresident_no{{$fg_key}}">No</label>
            </div>
            <label for="city" class="col-sm-5 col-form-label">
                Do you have a spouse or significant other?
            </label>
            <div class="col-sm-7  input_f input_radio mb-0">
                <input id="fm_spouse_yes{{$fg_key}}" class="fg_spouse" type="radio" name="fm[{{$fg_key}}][fm_spouse]" value="1" {{$fg_list->spouse == 1 ? 'checked' : ''}}>
                <label class="radio-label" for="fm_spouse_yes{{$fg_key}}">Yes</label>

                <input id="fm_spouse_no{{$fg_key}}" class="fg_spouse" type="radio" name="fm[{{$fg_key}}][fm_spouse]" value="0" {{$fg_list->spouse == 0 ? 'checked' : ''}}>
                <label class="radio-label" for="fm_spouse_no{{$fg_key}}">No</label>
            </div>
            <label for="city" class="col-sm-5 col-form-label">
                Do you own or rent your home?
            </label>
            <div class="col-sm-7  input_f input_radio mb-0">
                <input id="fm_own_home_yes{{$fg_key}}" class="fg_own_home" type="radio" name="fm[{{$fg_key}}][fm_own_home]" value="1" {{$fg_list->own_home == 1 ? 'checked' : ''}}>
                <label class="radio-label" for="fm_own_home_yes{{$fg_key}}">Yes</label>

                <input id="fm_own_home_no{{$fg_key}}" class="fg_own_home" type="radio" name="fm[{{$fg_key}}][fm_own_home]" value="0" {{$fg_list->own_home == 0 ? 'checked' : ''}}>
                <label class="radio-label" for="fm_own_home_no{{$fg_key}}">No</label>
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="city" class="col-sm-2 col-form-label">Employment        </label>
            <div class="col-sm-4  input_f mb-0">
                <select  class="in form-control fg_employment_status" name="fm[{{$fg_key}}][fm_employment_status]">
                        <option value="">Select Status</option>
                        <option value="0" {{$fg_list->employment_status == 0 ? 'selected' : ''}}>Active</option>
                        <option value="1" {{$fg_list->employment_status == 1 ? 'selected' : ''}}>Inactive</option>
                </select>
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="city" class="col-sm-2 col-form-label">Occupation        </label>
            <div class="col-sm-4  input_f">
                <input type="text" class="in form-control-plaintext fg_occupation" name="fm[{{$fg_key}}][fm_occupation]" value="{{ $fg_list->occupation }}">
            </div>
        </div>
    </div>
    <div class="col-md-12 pb-lg-5">
        <button type="button" class="text-danger ml-3 addFamilyGroupInfo"> <i class="fa fa-plus-circle"></i> Add</button>
        @if($fg_key != 0)
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="text-danger ml-3 closed4"> <i class="fa fa-remove"></i> Remove </button>
        @endif

        @if($fg_list->self_user_id > 0)
            <a class="text-danger ml-3" href="{{route('admin.go_to_profile', ['prefix' => Auth::user()->role->role_slug, 'user_id' => encrypt($fg_list->self_user_id)])}}"> <i class="fa fa-share-square"></i> Go To Profile</button>
        @endif
    </div>
</div>
@endforeach
@else
<div class="row provider_profile_edit">
    <input type="hidden" value="" name="fm[0][fm_self_user_id]" class="fg_self_user_id">
    <div class="col-md-12 info_con profile_info_con">
        <div class="form-group row in_field pb-0">
            <label class="col-sm-2 col-form-label">Employer Name</label>
            <div class="col-sm-4  input_f mb-0">
                <input type="text" class=" in form-control-plaintext" name="fm[0][fm_employer_name]">
            </div>

            <label class="col-sm-2 col-form-label">Employer Phone</label>
            <div class="col-sm-4  input_f mb-0">
                <input type="text" class=" in form-control-plaintext" name="fm[0][fm_employer_phone]">
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4  input_f mb-0">
                <input type="email" class=" in form-control-plaintext family_group_email" name="fm[0][fm_email]">
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <div class="col-sm-6 input_f mb-0">
                <select class="in form-control fg_relation" name="fm[0][family_relation]">
                    <option value="" selected> Please select Relationship with Family/Group Member</option>
                    <option value="1">Spouse</option>
                    <option value="2"> Child</option>
                    <option value="3"> Sibling</option>
                    <option value="4"> Mother</option>
                    <option value="5"> Father</option>
                </select>
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="company_name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-4  input_f mb-0">
                <input type="text" class=" in form-control-plaintext fg_name" name="fm[0][fm_name]">
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="company_name" class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-4 input_f mb-0">
                <input type="text" class="in form-control-plaintext date_of_birth fg_dob" name="fm[0][fm_dob]" readonly>
                <i class="fa fa-calendar fa-lg datepicker_icon" aria-hidden="true"></i>
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="company_name" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-3  input_f input_radio mb-0">
                <input id="fmg_male" class="fg_gender" type="radio" name="fm[0][fm_gender]" value="0" checked>
                <label class="radio-label" for="fmg_male">Male</label>

                <input id="fmg_female" class="fg_gender" type="radio" name="fm[0][fm_gender]" value="1">
                <label class="radio-label" for="fmg_female">Female</label>

                <input id="fmg_other" class="fg_gender" type="radio" name="fm[0][fm_gender]" value="2">
                <label class="radio-label" for="fmg_other">Other</label>
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="city" class="col-sm-2 col-form-label">Social Security Number</label>
            <div class="col-sm-4 offset-sm-2 ml-0 input_f mb-0">
                <input type="text" class="in form-control-plaintext fg_ssn" name="fm[0][fm_ssn]">
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="city" class="col-sm-5 col-form-label">
                Are you currently a U.S. citizen or permanent resident?
            </label>
            <div class="col-sm-7  input_f input_radio mb-0">
                <input id="fmresident_yes" class="fg_resident" type="radio" name="fm[0][fm_resident]" value="1" checked>
                <label class="radio-label" for="fmresident_yes">Yes</label>

                <input id="fmresident_no" class="fg_resident" type="radio" name="fm[0][fm_resident]" value="0">
                <label class="radio-label" for="fmresident_no">No</label>
            </div>
            <label for="city" class="col-sm-5 col-form-label">
                Do you have a spouse or significant other?
            </label>
            <div class="col-sm-7  input_f input_radio mb-0">
                <input id="fm_spouse_yes" class="fg_spouse" type="radio" name="fm[0][fm_spouse]" value="1" checked>
                <label class="radio-label" for="fm_spouse_yes">Yes</label>

                <input id="fm_spouse_no" class="fg_spouse" type="radio" name="fm[0][fm_spouse]" value="0" >
                <label class="radio-label" for="fm_spouse_no">No</label>
            </div>
            <label for="city" class="col-sm-5 col-form-label">
                Do you own or rent your home?
            </label>
            <div class="col-sm-7  input_f input_radio mb-0">
                <input id="fm_own_home_yes" class="fg_own_home" type="radio" name="fm[0][fm_own_home]" value="1" checked>
                <label class="radio-label" for="fm_own_home_yes">Yes</label>

                <input id="fm_own_home_no" class="fg_own_home" type="radio" name="fm[0][fm_own_home]" value="0" >
                <label class="radio-label" for="fm_own_home_no">No</label>
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="city" class="col-sm-2 col-form-label">Employment        </label>
            <div class="col-sm-4  input_f mb-0">
                <select  class="in form-control fg_employment_status" name="fm[0][fm_employment_status]">
                        <option value="">Select Status</option>
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                </select>
            </div>
        </div>
        <div class="form-group row in_field pt-0 pb-0">
            <label for="city" class="col-sm-2 col-form-label">Occupation        </label>
            <div class="col-sm-4  input_f">
                <input type="text" class="in form-control-plaintext fg_occupation" name="fm[0][fm_occupation]">
            </div>
        </div>
    </div>
    <div class="col-md-12 pb-lg-5">
        <button type="button" class="text-danger ml-3 addFamilyGroupInfo"> <i class="fa fa-plus-circle"></i> Add</button>
    </div>
</div>
@endif