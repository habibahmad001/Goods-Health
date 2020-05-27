<div class="row provider_profile_edit">
    <div class="col-md-12 info_con profile_info_con">
        <div class="form-group row in_field">
            <label for="company_name" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-3  input_f input_radio">
                <input id="g_male" type="radio" name="gender" value="0" {{ !empty($userdata) && $userdata->gender == 0 ? 'checked' : 'checked' }} >
                <label class="radio-label" for="g_male">Male</label>

                <input id="g_female" type="radio" name="gender" value="1" {{ !empty($userdata) && $userdata->gender == 1 ? 'checked' : '' }} >
                <label class="radio-label" for="g_female">Female</label>

                <input id="g_other" type="radio" name="gender" value="2" {{ !empty($userdata) && $userdata->gender == 2 ? 'checked' : '' }} >
                <label class="radio-label" for="g_other">Other</label>
            </div>
            <label for="company_name" class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-4 input_f">
                    <input type="text" class="in form-control-plaintext date_of_birth"  name="dob" value="{{ !empty($userdata->dob) ? $userdata->dob : old('dob') }}" readonly>
                    <i class="fa fa-calendar fa-lg datepicker_icon" aria-hidden="true"></i>
            </div>
            <label for="city" class="col-sm-2 col-form-label">Social Security Number</label>
            <div class="col-sm-4 offset-sm-2 input_f">
                <input type="text" class="in form-control-plaintext" id="ssn" name="social_security_number" value="{{ !empty($userdata->social_security_number) ? $userdata->social_security_number : old('social_security_number') }}" >
            </div>
            <label for="city" class="col-sm-5 col-form-label">
                Are You currently a U.S citizen or permanent resident?
            </label>
            <div class="col-sm-7  input_f input_radio">
                <input id="resident_yes" type="radio" name="resident" value="1" {{ !empty($userdata) && $userdata->resident == 1 ? 'checked' : 'checked' }}>
                <label class="radio-label" for="resident_yes">Yes</label>

                <input id="resident_no" type="radio" name="resident" value="0" {{ !empty($userdata) && $userdata->resident == 0 ? 'checked' : '' }}>
                <label class="radio-label" for="resident_no">No</label>
            </div>
            <label for="city" class="col-sm-5 col-form-label">
                Do you have spouse or significant other?
            </label>
            <div class="col-sm-7  input_f input_radio">
                <input id="spouse_yes" type="radio" name="spouse" value="1" {{ !empty($userdata) && $userdata->spouse == 1 ? 'checked' : 'checked' }}>
                <label class="radio-label" for="spouse_yes">Yes</label>

                <input id="spouse_no" type="radio" name="spouse" value="0" {{ !empty($userdata) && $userdata->spouse == 0 ? 'checked' : '' }}>
                <label class="radio-label" for="spouse_no">No</label>
            </div>
            <label for="city" class="col-sm-5 col-form-label">
                Do you own or rent your home?
            </label>
            <div class="col-sm-7  input_f input_radio">
                <input id="own_home_yes" type="radio" name="own_home" value="1" {{ !empty($userdata) && $userdata->own_home == 1 ? 'checked' : 'checked' }}>
                <label class="radio-label" for="own_home_yes">Yes</label>

                <input id="own_home_no" type="radio" name="own_home" value="0" {{ !empty($userdata) && $userdata->own_home == 0 ? 'checked' : '' }}>
                <label class="radio-label" for="own_home_no">No</label>
            </div>
            <label for="city" class="col-sm-2 col-form-label">Employment Status</label>
            <div class="col-sm-4  input_f">
                <select  class="in form-control " name="employment_status">
                        <option value="">Select Status</option>
                        <option value="0" {{ !empty($userdata) && $userdata->employment_status == 0 ? 'selected' : ''}}>Active</option>
                        <option value="1" {{ !empty($userdata) && $userdata->employment_status == 1 ? 'selected' : ''}}>Inactive</option>
                </select>
            </div>
            <label for="city" class="col-sm-2 col-form-label">Occupation</label>
            <div class="col-sm-4  input_f">
                <input type="text" class="in form-control-plaintext" name="occupation" value="{{ !empty($userdata->occupation) ? $userdata->occupation : old('occupation') }}">
            </div>
        </div>
    </div>
</div>