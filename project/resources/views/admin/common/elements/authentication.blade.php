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

            @if($role_data_for_user->id == 2)
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

    @if($role_data_for_user->id != 1)
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