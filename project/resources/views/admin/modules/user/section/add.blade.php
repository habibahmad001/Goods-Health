<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row">
            <div class="col-12">
                <div class="box_heading cf">
                    <h3>{{ ucwords(strtolower($role_data_for_user->role_slug)) }}</h3>
                </div>
            </div>
        </div>
        <form method="POST" action="#" enctype="multipart/form-data" id="form_AddUserForm">
            <input type="hidden" name="role_id" value="{{ encrypt($role_id) }}">
            <input type="hidden" name="u_type" value="{{ encrypt($role_data_for_user->role_slug) }}">
            @csrf
            <div class="row no-margin">
                @if(in_array($role_data_for_user->id, [2, 7, 8, 9, 10, 11]))
                    @include('admin.common.sidebar.user-customer-sidebar')
                    <div  class="col-lg-12 no-margin col-sm-12 mt-mob-4 profile_tab_edit">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                @include('admin.common.section.profile')
                            </div>
                            @include('admin.common.elements.save_button')
                        </div>
                    </div>
                @else
                    @include('admin.common.sidebar.user-sidebar')
                
                    <div  class="col-lg-9 no-margin col-sm-12 mt-mob-4 profile_tab_edit"  >
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            @include('admin.common.section.profile') 
                            </div>

                            @include('admin.common.elements.save_button')
                        </div>
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>