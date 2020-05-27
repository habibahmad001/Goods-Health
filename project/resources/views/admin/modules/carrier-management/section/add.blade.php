<div class="wrap_con box_shadow">
    <div class="full_wrap">
        <div class="row">
            <div class="col-12">
                <div class="box_heading cf">
                    <h3>Carrier Information</h3>
                </div>
            </div>
        </div>
        <form method="POST" action="#" enctype="multipart/form-data" id="form_addCarriers" name="form_addCarriers">
            @csrf
            @include('admin.modules.carrier-management.section.section')

            <div class="wrap_con">
                <div class="full_wrap">
                    <div class="row no-margin">
                        <div class="col-sm-12  profile_card">
                            <div class="row">
                                <div class="col-md-12 text-center pt-3 pb-5">
                                    <button class="btn btn-submit" type="submit" name="AddCarrierBtn">{{ __('SAVE') }}</button>
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