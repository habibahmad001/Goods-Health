<div class="wrap_con box_shadow">
    <div class="full_wrap">
            <form method="POST" action="#" enctype="multipart/form-data" id="form_editEmployeeUser" name="form_editEmployeeUser">
            <input type="hidden" name="u_type" value="{{ encrypt($role_data_for_user->role_slug) }}">
            <input type="hidden" name="userid" value="{{ encrypt($userdata->id) }}">
            <input type="hidden" name="role_id" value="{{ encrypt($userdata->role_id) }}">
            <input type="hidden" name="parent_user_id" value="">
            @csrf
            <div class="row no-margin">
                <div  class="col-lg-12  no-margin col-sm-12 mt-mob-4 pb-100  profile_tab_edit"  >
                    <div class="tab-content" id="v-pills-tabContent">
                        @include('admin.modules.sub-user.section.section')

                        <div class="wrap_con box_shadow">
                            <div class="full_wrap">
                                <div class="row no-margin">
                                    <div class="col-sm-12  profile_card">
                                        <div class="row">
                                            <div class="col-md-12 text-center pt-5 pb-5">
                                                <button class="btn btn-submit" type="submit" id="editEmployeeUserSubmitBtn">{{ __('UPDATE') }}</button>
                                                <button type="reset" class="btn btn-reset gi_cancel_button">{{ __('CANCEL') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>