<div class="wrap_con box_shadow">
    <div class="full_wrap {{ $u_type }}">
        <div class="row no-margin">
            <div class="col-sm-12  profile_card ">
                <div class="row profile_title">
                    <h4 class="text-primary">Select User Type</h4>
                </div>

                <div class="row form-group-no-border collapse show clps-agent-in-charge">
                    <div class="row provider_profile_edit">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5 info_con profile_info_con">
                            <div class="form-group row in_field">
                                <label for="user_role_id" class="col-md-4 col-form-label">User Type</label>
                                <div class="col-md-8 input_f">
                                    <select id="user_role_id" class="in form-control" name="role_id" required>
                                        <option value="">Select User Type</option>
                                        @foreach($roles as $role)
                                        <option value="{{ encrypt($role->id) }}" {{ $role->id == $get_role_from_session ? 'selected' : "" }}>{{ $role->role_name }}</option>
                                        @endforeach
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