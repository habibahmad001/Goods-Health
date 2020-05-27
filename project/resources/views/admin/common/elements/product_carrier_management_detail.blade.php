<div class="row provider_profile_edit pb-80">
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0">
            <label for="carrier_id" class="col-sm-4 col-form-label">Carrier ID</label>
            <div class="col-sm-8  input_f">
                <select class="in form-control" name="carrier_id" id="s_carrier">
                    <option value="">Select Carrier Name/ID</option>
                    @if(!empty($carriers))
                        @foreach($carriers as $carrier)
                        <option value="{{ $carrier->id }}" {{ ( $carrier_product->carrier_id == $carrier->id) ? 'selected' : ''}} >{{$carrier->carrier_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <label for="carrier_address" class="col-sm-4 col-form-label">Address</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" name="carrier_address" value="{{ !empty($carrier_product->carrier_address) ? $carrier_product->carrier_address : '' }}" readonly>
            </div>
            <label for="c_city" class="col-sm-4 col-form-label">City</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" name="carrier_city" value="{{ !empty($carrier_product->c_city) ? $carrier_product->c_city : '' }}" readonly>
            </div>
            <label for="carrier_email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="carrier_email" value="{{ !empty($carrier_product->carrier_email) ? $carrier_product->carrier_email : '' }}" readonly>
            </div>
            <label for="carrier_hotline" class="col-sm-4 col-form-label">Hotline</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="carrier_hotline" value="{{ !empty($carrier_product->carrier_hotline) ? $carrier_product->carrier_hotline : '' }}" readonly>
            </div>
            <label for="carrier_logo" class="col-sm-4 col-form-label">Logo</label>
            <label for="carrier_logo" class="col-lg-1 col-md-1 col-sm-1 col-form-label">

                <img src="{{ !empty($carrier_product->carrier_name) ? asset('uploads/carrier/'.$carrier_product->id.'/logo/'.$carrier_product->carrier_logo) : ''}}" width="45px" class="pull-right" id="carrier_logo">
            </label>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0">
            <label for="carrier_name" class="col-sm-4 col-form-label">Carrier Name</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" name="carrier_name" value="{{ !empty($carrier_product->carrier_name) ? $carrier_product->carrier_name : '' }}" readonly>
            </div>
            <label for="s_state" class="col-sm-4 col-form-label">State</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="carrier_state" value="{{ !empty($carrier_product->s_state) ? $carrier_product->s_state : '' }}" readonly>
            </div>
            <label for="zipcode" class="col-sm-4 col-form-label">Zipcode</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="carrier_zipcode" value="{{ !empty($carrier_product->carrier_zipcode) ? $carrier_product->carrier_zipcode : '' }}" readonly>
            </div>
            <label for="carrier_phone" class="col-sm-4 col-form-label">Phone</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="carrier_phone" value="{{ !empty($carrier_product->carrier_phone) ? $carrier_product->carrier_phone : '' }}" readonly>
            </div>
            <label for="carrier_website" class="col-sm-4 col-form-label">Website</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="carrier_website" value="{{ !empty($carrier_product->carrier_website) ? $carrier_product->carrier_website : '' }}" readonly>
            </div>
        </div>
    </div>
</div>