<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row no-margin">
            <div  class="col-lg-12 no-margin col-sm-12 mt-mob-4 profile_tab_edit">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <form method="POST" action="#" enctype="multipart/form-data" id="form_ProfileSettingForm">
                        @csrf
                        <input type="hidden" name="company" value="N/A">
                        <input type="hidden" name="userid" value="{{ encrypt($userdata->id) }}">
                        <input type="hidden" name="role_id" value="{{ encrypt($userdata->role_id) }}">
                        <input type="hidden" name="u_type" value="{{ encrypt($role_data_for_user->role_slug) }}">
                        <input type="hidden" name="user_family_group_id" value="{{!empty($userdata->user_family_group_id) ? $userdata->user_family_group_id : 0 }}">
                        <div class="profile_card box_shadow">
                            <div class="row profile_title">
                                <h4 class="text-primary"> {{ ucwords(strtolower($role_data_for_user->role_name)) }} Profile</h4>
                                <div class="pull-left-mob">
                                    <a data-toggle="collapse" href=".clps-provider_profile" role="button" aria-expanded="true" aria-controls="provider_profile">
                                        <i class="fa fa-sort-down"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="form-group-no-border collapse show clps-provider_profile" id="provider_profile">
                                @include('admin.common.elements.profile_form')

                                @include('admin.common.elements.access_to_dashboard')

                                @include('admin.common.elements.access_to_product')
                            </div>
                        </div>
                        <div class="profile_card box_shadow">
                            <div class="row profile_title">
                                <h4 class="text-primary">Authentication</h4>
                                <div class="pull-left-mob">
                                    <a data-toggle="collapse" href=".clps-authentication" role="button" aria-expanded="true" aria-controls="authentication">
                                        <i class="fa fa-sort-down"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="form-group-no-border  collapse show clps-authentication" id="authentication">
                                @include('admin.common.elements.authentication')
                            </div>
                        </div>
          
                        <div class="wrap_con">
                            <div class="full_wrap">
                                <div class="row no-margin">
                                    <div class="col-sm-12  profile_card">
                                        <div class="row">
                                            <div class="col-md-12 text-center pt-3 pb-5">
                                                <button type="submit" class="btn btn-submit" name="EdituserBtn" id="EditCustBtn">
                                                    {{ __('UPDATE') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row">
            <div class="col-lg-12 col-md-12 stretched_card">
                <div class="card">
                    <div class="card-body">
                        <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                            <div>
                            <h4 class="card_title mb-0">Logged-in User's Carrier</h4>
                            </div>
                            <div>
                                <div class="book_business align-items-center">
                                    <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled ps_carrier_enable"> <i class="fa fa-check-circle"></i> Enable</a>
                                    <a href="#" class="mt-0 btn btn-danger btn-xs mb-2 btn-flat tabcomplete disabled ps_carrier_disable" style="display: none;"> <i class="fa fa-times-circle"></i> Disable</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-10">
                            <table class="table table-hover" id="table_carriers" style="width: 100%;">
                               <thead>
                                  <tr>
                                    <th class="sorting_disabled"></th>
                                    <th>Id</th>
                                    <th>Carrier Id</th>
                                    <th>Carrier Name</th>
                                    <th>Address</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Zipcode</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                  </tr>
                               </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(Auth::user()->role->parent_role_id == 0 && Auth::user()->role_id != 2)
<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row">
            <div class="col-lg-12 col-md-12 stretched_card">
                <div class="card">
                    <div class="card-body">
                        <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                            <div>
                            <h4 class="card_title mb-0">Employee Carrier</h4>
                            </div>
                            <div>
                                <div class="book_business align-items-center">
                                    <a href="#" class="mt-0 btn btn-primary btn-xs mb-2 btn-flat tabcomplete disabled ps_emp_carrier_enable"> <i class="fa fa-check-circle"></i> Enable</a>
                                    <a href="#" class="mt-0 btn btn-danger btn-xs mb-2 btn-flat tabcomplete disabled ps_emp_carrier_disable" style="display: none;"> <i class="fa fa-times-circle"></i> Disable</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-10">
                            <div class="form-group text-left">
                                <select class="form-control" name="employee_id" id="search_employee_id">
                                </select>
                            </div>
                            <table class="table table-hover" id="table_emp_carriers" style="width: 100%;">
                               <thead>
                                  <tr>
                                    <th class="sorting_disabled"></th>
                                    <th>Id</th>
                                    <th>Carrier Id</th>
                                    <th>Carrier Name</th>
                                    <th>Address</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Zipcode</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                  </tr>
                               </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- </form> -->