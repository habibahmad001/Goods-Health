<div class="row provider_profile_edit pb-80">
    <div class="col-md-12 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0">
            <label for="company_name" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10 input_f input_radio">
                <input id="active" type="radio" name="status" value="0" {{ $carrier_product->status == 0 ? 'checked' : 'checked' }} >
                <label class="radio-label" for="active">Active</label>

                <input id="inactive" type="radio" name="status" value="1" {{ $carrier_product->status == 1 ? 'checked' : '' }} >
                <label class="radio-label" for="inactive">In active</label>

                <input id="down" type="radio" name="status" value="2" {{ $carrier_product->status == 2 ? 'checked' : '' }} >
                <label class="radio-label" for="down">Down</label>
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0 no-border">
            <label for="country" class="col-sm-4 col-form-label">Country</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" name="country" value="United States of America" readonly>
            </div>

            <label for="c_city" class="col-sm-4 col-form-label">City</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="c_city" value="{{ !empty($carrier_product->c_city) ? $carrier_product->c_city: '' }}" readonly>
            </div>

            <label for="county" class="col-sm-4 col-form-label">County</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="county" value="{{ !empty($carrier_product->county) ? $carrier_product->county: old('county') }}" readonly>
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0 no-border">
            <label for="s_state" class="col-sm-4 col-form-label">State</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="s_state" value="{{ !empty($carrier_product->s_state) ? $carrier_product->s_state: '' }}" readonly>
            </div>

            <label for="zipcode" class="col-sm-4 col-form-label">Zipcode</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="zipcode" value="{{ !empty($carrier_product->zipcode) ? $carrier_product->zipcode: '' }}" readonly>
            </div>
        </div>
    </div>
</div>