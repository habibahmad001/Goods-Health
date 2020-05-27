<div class="wrap_con box_shadow">
    <div class="full_wrap">
            <form method="POST" action="#" enctype="multipart/form-data" id="form_addUserCenterUser">
            <input type="hidden" name="role_id" value="{{ encrypt($role_id) }}">
            @csrf
            <div class="row no-margin">
                <div  class="col-lg-12  no-margin col-sm-12 mt-mob-4 pb-100  profile_tab_edit"  >
                    <div class="tab-content" id="v-pills-tabContent">
                        @include('admin.modules.user-center.section.section')

                        <div class="wrap_con">
                            <div class="full_wrap">
                                <div class="row no-margin">
                                    <div class="col-sm-12  profile_card">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-submit" type="submit" id="addUserCenterUserSubmitBtn">{{ __('SAVE') }}</button>
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