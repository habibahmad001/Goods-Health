<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row">
            <div class="col-12">
                <div class="box_heading cf">
                    <h3>Product Information</h3>
                </div>
            </div>
        </div>
        <div class="profile_card box_shadow">
            <div class="row profile_title">
                <h4 class="text-primary">Carrier's Location</h4>
                <div class="pull-left-mob">
                    <a data-toggle="collapse" href=".clps-carrier_location" role="button" aria-expanded="true" aria-controls="carrier_location">
                        <i class="fa fa-sort-down"></i>
                    </a>
                </div>
            </div>

            <div class="form-group-no-border collapse show clps-carrier_location" id="carrier_location">
                @include('admin.common.elements.carrier_location')
            </div>
        </div>

        <div class="profile_card box_shadow">
            <div class="row profile_title">
                <h4 class="text-primary">Carrier Details</h4>
                <div class="pull-left-mob">
                    <a data-toggle="collapse" href=".clps-carrier_detail" role="button" aria-expanded="true" aria-controls="carrier_detail">
                        <i class="fa fa-sort-down"></i>
                    </a>
                </div>
            </div>

            <div class="form-group-no-border  collapse show clps-carrier_detail" id="carrier_detail">
                @include('admin.common.elements.carrier_detail')
            </div>
        </div>

        <div class="profile_card box_shadow">
            <div class="form-group-no-border collapse show clps-product_management_categories" id="product_management_categories">
                <div class="col-md-12 pt-4 pb-3 pl-5">
                    <label class="container_checkbox">MANUAL
                        <input type="checkbox" class="checkbox" name="access_to_products[]" value="1">
                        <span class="checkmark"></span>
                    </label>

                    <label class="container_checkbox">PRICE/RATER
                        <input type="checkbox" class="checkbox" name="access_to_products[]" value="1">
                        <span class="checkmark"></span>
                    </label>

                    <label class="container_checkbox">PLATFORM INTEGRATION
                        <input type="checkbox" class="checkbox" name="access_to_products[]" value="1">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="profile_card box_shadow">
            <div class="row profile_title">
                <h4 class="text-primary">Benefits</h4>
                <div class="pull-left-mob">
                    <a data-toggle="collapse" href=".clps-benefit_option_details" role="button" aria-expanded="true" aria-controls="benefit_option_details">
                        <i class="fa fa-sort-down"></i>
                    </a>
                </div>
            </div>

            <div class="form-group-no-border  collapse show clps-benefit_option_details" id="benefit_option_details">
                <form method="POST" action="#" enctype="multipart/form-data" id="form_editProducts" name="form_editProducts">
                    <input type="hidden" name="id" value="{{ encrypt($carrier_product->id) }}">
                    @include('admin.common.elements.benefit_option_details')
                    <div class="wrap_con">
                        <div class="full_wrap">
                            <div class="row no-margin">
                                <div class="col-sm-12  profile_card">
                                    <div class="row">
                                        <div class="col-md-12 text-center pt-3 pb-5">
                                            <button class="btn btn-submit" type="submit" name="EditCarrierBtn">{{ __('UPDATE') }}</button>
                                            <button type="reset" class="btn btn-reset gi_cancel_button">{{ __('CANCEL') }}</button>
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