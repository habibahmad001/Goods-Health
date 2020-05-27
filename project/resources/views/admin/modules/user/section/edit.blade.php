<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row">
            <div class="col-12">
                <div class="box_heading cf">
                    <h3>{{ ucwords(strtolower($role_data_for_user->role_name)) }}</h3>
                </div>
            </div>
        </div>
        
        <div class="row no-margin">
            @if(in_array($role_data_for_user->id, [2, 7, 8, 9, 10, 11]))
                @include('admin.common.sidebar.user-customer-sidebar')
                <div  class="col-lg-12 no-margin col-sm-12 mt-mob-4 profile_tab_edit">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <form method="POST" action="#" enctype="multipart/form-data" id="form_EditUserForm">
                            @csrf
                            <input type="hidden" name="company" value="N/A">
                            <input type="hidden" name="userid" value="{{ encrypt($userdata->id) }}">
                            <input type="hidden" name="role_id" value="{{ encrypt($userdata->role_id) }}">
                            <input type="hidden" name="u_type" value="{{ encrypt($role_data_for_user->role_slug) }}">
                            <input type="hidden" name="user_family_group_id" value="{{!empty($userdata->user_family_group_id) ? $userdata->user_family_group_id : 0 }}">
                            @include('admin.common.section.profile')
                            @include('admin.common.elements.update_button')
                            </form>
                        </div>
                        <div class="tab-pane fade show" id="v-detailed-info-tab" role="tabpanel" aria-labelledby="v-detailed-info-tab-tab">
                            <form method="POST" action="#" enctype="multipart/form-data" id="form_EditDetailedInfoForm">
                            @csrf
                            <input type="hidden" name="userid" value="{{ encrypt($userdata->id) }}">
                            @include('admin.common.section.detailed-info')
                            @include('admin.common.elements.update_button')
                            </form>
                        </div>

                        <div class="tab-pane fade show" id="v-pills-benefitinfo" role="tabpanel" aria-labelledby="v-pills-benefitinfo-tab"></div>

                        <div class="tab-pane fade show" id="v-pills-files" role="tabpanel" aria-labelledby="v-pills-files-tab">
                            <div class="profile_card box_shadow">
                                <div class="row profile_title">
                                    <h4 class="text-primary">Files</h4>
                                    <div class="pull-right pull-left-mob">
                                        <!-- <button data-toggle="collapse" href="#files_profile" role="button" aria-expanded="true" aria-controls="files_profile">
                                            <i class="fa fa-sort-down"></i>
                                        </button> -->
                                    </div>
                                </div>

                                <div class="collapse show file-section-div" id="files_profile">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="v-pills-insurance-option" role="tabpanel" aria-labelledby="v-pills-insurance-option-tab">
                            @include('admin.common.section.insurance-option')
                        </div>
                        <div class="tab-pane fade show" id="v-report-claim" role="tabpanel" aria-labelledby="v-report-claim-tab">
                        </div>
                        <div class="tab-pane fade show" id="v-payment" role="tabpanel" aria-labelledby="v-payment-tab">
                            @include('admin.common.section.payment')
                        </div>
                        <div class="tab-pane fade show" id="v-pills-activity" role="tabpanel" aria-labelledby="v-pills-activity-tab">
                            @include('admin.common.elements.activity')
                        </div>
                        <div class="tab-pane fade show" id="v-pills-carrier" role="tabpanel" aria-labelledby="v-pills-carrier-tab">
                            @include('admin.common.elements.user_carrier_list')
                        </div>
                        <div class="tab-pane fade show" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
                            @include('admin.common.elements.history')
                        </div>
                    </div>
                </div>
            @else
                @include('admin.common.sidebar.user-sidebar')
                <div  class="col-lg-9 no-margin col-sm-12 mt-mob-4 profile_tab_edit"  >
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <form method="POST" action="#" enctype="multipart/form-data" id="form_EditUserForm">
                            
                            @csrf
                            <input type="hidden" name="last_name" value="N/A">
                            <input type="hidden" name="userid" value="{{ encrypt($userdata->id) }}">
                            <input type="hidden" name="role_id" value="{{ encrypt($userdata->role_id) }}">
                            <input type="hidden" name="u_type" value="{{ encrypt($role_data_for_user->role_slug) }}">
                            <input type="hidden" name="employee_role_id" value="{{ encrypt($employee_role_id) }}">
                            <input type="hidden" name="user_family_group_id" value="{{!empty($userdata->user_family_group_id) ? $userdata->user_family_group_id : 0 }}">
                            @include('admin.common.section.profile')
                            @include('admin.common.elements.update_button')
                            </form>
                        </div>

                        <div class="tab-pane fade show" id="v-detailed-info-tab" role="tabpanel" aria-labelledby="v-detailed-info-tab-tab">
                            <form method="POST" action="#" enctype="multipart/form-data" id="form_EditDetailedInfoForm">
                            @csrf
                            <input type="hidden" name="userid" value="{{ encrypt($userdata->id) }}">
                            @include('admin.common.section.detailed-info')
                            @include('admin.common.elements.update_button')
                            </form>
                        </div>

                        @if($role_id == 4 || $role_id == 1)
                        <div class="tab-pane fade show" id="v-pills-customer" role="tabpanel" aria-labelledby="v-pills-customer-tab"></div>
                        <div class="tab-pane fade show" id="v-pills-business" role="tabpanel" aria-labelledby="v-pills-business-tab"></div>
                            @if($role_id == 1)
                                <div class="tab-pane fade show" id="v-pills-provider" role="tabpanel" aria-labelledby="v-pills-provider-tab"></div>
                            @endif
                        @elseif($role_id == 3)
                            <div class="tab-pane fade show" id="v-pills-employee" role="tabpanel" aria-labelledby="v-pills-employee-tab"></div>
                        @endif

                        <div class="tab-pane fade show" id="v-pills-benefitinfo" role="tabpanel" aria-labelledby="v-pills-benefitinfo-tab"></div>

                        <div class="tab-pane fade show" id="v-pills-files" role="tabpanel" aria-labelledby="v-pills-files-tab">
                            <div class="profile_card box_shadow">
                                <div class="row profile_title">
                                    <h4 class="text-primary">Files</h4>
                                    <div class="pull-right pull-left-mob">
                                        <!-- <button data-toggle="collapse" href="#files_profile" role="button" aria-expanded="true" aria-controls="files_profile">
                                            <i class="fa fa-sort-down"></i>
                                        </button> -->
                                    </div>
                                </div>

                                <div class="collapse show file-section-div" id="files_profile">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="v-pills-insurance-option" role="tabpanel" aria-labelledby="v-pills-insurance-option-tab">
                            @include('admin.common.section.insurance-option')
                        </div>

                        <div class="tab-pane fade show" id="v-report-claim" role="tabpanel" aria-labelledby="v-report-claim-tab">
                        </div>

                        <div class="tab-pane fade show" id="v-payment" role="tabpanel" aria-labelledby="payment-tab">
                            @include('admin.common.section.payment')   
                        </div>

                        @if($role_id == 4 || $role_id == 1)
                        <div class="tab-pane fade show" id="v-pills-employee" role="tabpanel" aria-labelledby="v-pills-employee-tab"></div>
                        @endif

                        <div class="tab-pane fade show" id="v-pills-activity" role="tabpanel" aria-labelledby="v-pills-activity-tab">
                            @include('admin.common.elements.activity')
                        </div>

                        <div class="tab-pane fade show" id="v-pills-carrier" role="tabpanel" aria-labelledby="v-pills-carrier-tab">
                            @include('admin.common.elements.user_carrier_list')
                        </div>
                        
                        <div class="tab-pane fade show" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
                            @include('admin.common.elements.history')
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>