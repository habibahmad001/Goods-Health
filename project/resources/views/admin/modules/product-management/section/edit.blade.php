@if($type == 'products')
<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row">
            <div class="col-12">
                <div class="box_heading cf">
                    <h3>Product Information</h3>
                </div>
            </div>
        </div>

        <div class="row no-margin">
            <div class="col-sm-12 profile_card br-bt">                                    
                <div class="nav profile_tab-2" role="tablist" aria-orientation="horizontal">
                    <ul class="nav" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="v-pills-carrier-product-tab" data-toggle="pill" href="#v-pills-carrier-product" role="tab" aria-controls="v-pills-carrier-product" aria-selected="true">Carrier Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="v-pills-product-benefit-tab" data-toggle="pill" href="#v-pills-product-benefit" role="tab" aria-controls="v-pills-product-benefit" aria-selected="false">Products Benefits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="v-pills-product-files-tab" data-toggle="pill" href="#v-pills-product-files" role="tab" aria-controls="v-pills-product-files" aria-selected="false">Products Files</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="v-pills-product-addon-tab" data-toggle="pill" href="#v-pills-product-addon" role="tab" aria-controls="v-pills-product-addon" aria-selected="false">Products Riders/Addon</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div  class="col-lg-12 no-margin col-sm-12 mt-mob-4 profile_tab_edit">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-carrier-product" role="tabpanel" aria-labelledby="v-pills-carrier-product-tab">
                        <form method="POST" action="#" enctype="multipart/form-data" id="form_editProducts" name="form_editProducts">
                            <input type="hidden" name="id" value="{{ encrypt($carrier_product->id) }}">
                            @csrf
                            @include('admin.modules.product-management.section.section')

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

                    <div class="tab-pane fade show" id="v-pills-product-benefit" role="tabpanel" aria-labelledby="v-pills-product-benefit-tab">
                        <div class="profile_card box_shadow">
                            <div class="row profile_title">
                                <h4 class="text-primary">Products Benefits</h4>
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

                    <div class="tab-pane fade show" id="v-pills-product-files" role="tabpanel" aria-labelledby="v-pills-product-files-tab">
                        <div class="profile_card box_shadow">
                            <div class="row profile_title">
                                <h4 class="text-primary">Products Files</h4>
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

                    <div class="tab-pane fade show" id="v-pills-product-addon" role="tabpanel" aria-labelledby="v-pills-product-addon-tab">
                        <div class="profile_card box_shadow">
                            <div class="row profile_title">
                                <h4 class="text-primary">Products Riders/Addon</h4>
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
                </div>
            </div>
        </div>
    </div>
</div>
@else
@include('admin.common.elements.product_management_common')
@endif
