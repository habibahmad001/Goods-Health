<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row">
            <div class="col-12">
                <div class="box_heading cf">
                    <h3>Product Information</h3>
                </div>
            </div>
        </div>
        <form method="POST" action="#" enctype="multipart/form-data" id="form_addProducts" name="form_addProducts">
            @csrf
            @include('admin.modules.product-management.section.section')

            <div class="wrap_con">
                <div class="full_wrap">
                    <div class="row no-margin">
                        <div class="col-sm-12  profile_card">
                            <div class="row">
                                <div class="col-md-12 text-center pt-3 pb-5">
                                    <button class="btn btn-submit" type="submit" name="AddProductBtn">{{ __('SAVE') }}</button>
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