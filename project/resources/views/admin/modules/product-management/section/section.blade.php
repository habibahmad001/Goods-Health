            <div class="profile_card box_shadow">
                <div class="row profile_title">
                    <h4 class="text-primary">Carrier Product's Location</h4>
                    <div class="pull-left-mob">
                        <a data-toggle="collapse" href=".clps-product_management_location" role="button" aria-expanded="true" aria-controls="product_management_location">
                            <i class="fa fa-sort-down"></i>
                        </a>
                    </div>
                </div>

                <div class="form-group-no-border collapse show clps-product_management_location" id="product_management_location">
                    @include('admin.common.elements.product_management_location')
                </div>
            </div>

            <div class="profile_card box_shadow">
                <div class="row profile_title">
                    <h4 class="text-primary">Carrier Details</h4>
                    <div class="pull-left-mob">
                        <a data-toggle="collapse" href=".clps-product_carrier_management_detail" role="button" aria-expanded="true" aria-controls="product_carrier_management_detail">
                            <i class="fa fa-sort-down"></i>
                        </a>
                    </div>
                </div>

                <div class="form-group-no-border  collapse show clps-product_carrier_management_detail" id="product_carrier_management_detail">
                    @include('admin.common.elements.product_carrier_management_detail')
                </div>
            </div>

            <div class="profile_card box_shadow">
                <div class="row profile_title">
                    <h4 class="text-primary">Individual Carrier Product's Details</h4>
                    <div class="pull-left-mob">
                        <a data-toggle="collapse" href=".clps-product_management_detail" role="button" aria-expanded="true" aria-controls="product_management_detail">
                            <i class="fa fa-sort-down"></i>
                        </a>
                    </div>
                </div>

                <div class="form-group-no-border  collapse show clps-product_management_detail" id="product_management_detail">
                    @include('admin.common.elements.product_management_detail')
                </div>
            </div>

            <div class="profile_card box_shadow">
                <div class="row profile_title">
                    <h4 class="text-primary">Product Type</h4>
                    <div class="pull-left-mob">
                        <a data-toggle="collapse" href=".clps-product_management_categories" role="button" aria-expanded="true" aria-controls="product_management_categories">
                            <i class="fa fa-sort-down"></i>
                        </a>
                    </div>
                </div>

                <div class="form-group-no-border  collapse show clps-product_management_categories" id="product_management_categories">
                    @include('admin.common.elements.product_management_categories')
                </div>
            </div>