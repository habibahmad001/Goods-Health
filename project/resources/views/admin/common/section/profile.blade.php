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
        <div class="profile_card box_shadow">
            <div class="row profile_title">
                <h4 class="text-primary">Agent In Charge</h4>
                <div class="pull-left-mob">
                    <a data-toggle="collapse" href=".clps-agentincharge" role="button" aria-expanded="true" aria-controls="authentication">
                        <i class="fa fa-sort-down"></i>
                    </a>
                </div>
            </div>

            <div class="form-group-no-border collapse show clps-agentincharge" id="agent_in_charge">
                @include('admin.common.elements.agent_in_charge')
            </div>
        </div>
          