        <div class="profile_card box_shadow">
            <div class="row profile_title">
                <h4 class="text-primary">Detailed Information</h4>
                <div class="pull-left-mob">
                    <a data-toggle="collapse" href=".clps-detailed_info" role="button" aria-expanded="true" aria-controls="detailed_info">
                        <i class="fa fa-sort-down"></i>
                    </a>
                </div>
            </div>

            <div class="form-group-no-border collapse show clps-detailed_info" id="detailed_info">
                @if($role_data_for_user->id == 3)
                    @include('admin.common.elements.detailed_info_business')
                @else
                    @include('admin.common.elements.detailed_info')
                @endif
            </div>
        </div>

        @if($role_data_for_user->id != 3)
        <div class="profile_card box_shadow">
            <div class="row profile_title">
                <h4 class="text-primary">Family/Group Information</h4>
                <div class="pull-left-mob">
                    <a data-toggle="collapse" href=".clps-family_group_info" role="button" aria-expanded="true" aria-controls="family_group_info">
                        <i class="fa fa-sort-down"></i>
                    </a>
                </div>
            </div>

            <div class="form-group-no-border collapse show clps-family_group_info" id="family_info">
                @include('admin.common.elements.family_group_info')
            </div>
        </div>
        @endif
        
        <div class="profile_card box_shadow">
            <div class="row profile_title">
                <h4 class="text-primary">Emergency Contact</h4>
                <div class="pull-left-mob">
                    <a data-toggle="collapse" href=".clps-emergencySection" role="button" aria-expanded="true" aria-controls="family_group_info">
                        <i class="fa fa-sort-down"></i>
                    </a>
                </div>
            </div>

            <div class="form-group-no-border collapse show clps-emergencySection" id="emergencySection">
                @include('admin.common.elements.emergency_contact')
            </div>
        </div>