            <div class="profile_card box_shadow">
                <div class="row profile_title">
                    <h4 class="text-primary"> Carrier Appointment Locations</h4>
                    <div class="pull-left-mob">
                        <a data-toggle="collapse" href=".clps-carrier_management_location" role="button" aria-expanded="true" aria-controls="carrier_management_location">
                            <i class="fa fa-sort-down"></i>
                        </a>
                    </div>
                </div>

                <div class="form-group-no-border collapse show clps-carrier_management_location" id="carrier_management_location">
                    @include('admin.common.elements.carrier_management_location')
                </div>
            </div>

            <div class="profile_card box_shadow">
                <div class="row profile_title">
                    <h4 class="text-primary">Carrier Details</h4>
                    <div class="pull-left-mob">
                        <a data-toggle="collapse" href=".clps-carrier_management_detail" role="button" aria-expanded="true" aria-controls="carrier_management_detail">
                            <i class="fa fa-sort-down"></i>
                        </a>
                    </div>
                </div>

                <div class="form-group-no-border  collapse show clps-carrier_management_detail" id="carrier_management_detail">
                    @include('admin.common.elements.carrier_management_detail')
                </div>
            </div>