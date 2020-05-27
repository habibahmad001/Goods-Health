<div class="row provider_profile_edit pb-80">
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0">
            <label for="product_name" class="col-sm-4 col-form-label">Product Name*</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" name="product_name" value="{{ !empty($carrier_product->product_name) ? $carrier_product->product_name : '' }}">
                <span class="error-message">Please provide a valid product name.</span>
            </div>
            <label for="carrier_email" class="col-sm-4 col-form-label">Price 1*</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="price_1" value="{{ !empty($carrier_product->price_1) ? $carrier_product->price_1 : '' }}">
                <span class="error-message">Please provide a valid price 1.</span>
            </div>
            <label for="price_3" class="col-sm-4 col-form-label">Price 3*</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="price_3" value="{{ !empty($carrier_product->price_3) ? $carrier_product->price_3 : '' }}">
                <span class="error-message">Please provide a valid price 3.</span>
            </div>
        </div>
    </div>
    <div class="col-md-6 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0">
            <label for="product_description" class="col-sm-4 col-form-label">Product Description*</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext" name="product_description" value="{{ !empty($carrier_product->product_description) ? $carrier_product->product_description : '' }}">
                <span class="error-message">Please provide a valid product description.</span>
            </div>
            <label for="price_2" class="col-sm-4 col-form-label">Price 2*</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="price_2" value="{{ !empty($carrier_product->price_2) ? $carrier_product->price_2 : '' }}">
                <span class="error-message">Please provide a valid price 2.</span>
            </div>
            <label for="price_4" class="col-sm-4 col-form-label">Price 4*</label>
            <div class="col-sm-8  input_f">
                <input type="text" class="in form-control-plaintext"  name="price_4" value="{{ !empty($carrier_product->price_4) ? $carrier_product->price_4 : '' }}">
                <span class="error-message">Please provide a valid price 4.</span>
            </div>
        </div>
    </div>
</div>