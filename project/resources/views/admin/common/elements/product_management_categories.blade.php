<div class="row provider_profile_edit pb-80">
    <div class="col-md-12 info_con profile_info_con">
        <div class="form-group row in_field pb-0 mb-0">
            <div class="col-sm-12 input_f input_radio">
                    @foreach($product_type as $p_type)
                    <input id="product_type_{{ $p_type->id }}" type="radio" name="category_id" value="{{ $p_type->id }}" {{ !empty($carrier_product->category_id) && $carrier_product->category_id == $p_type->id ? 'checked' : '' }}>
                    <label class="radio-label" for="product_type_{{ $p_type->id }}">{{ $p_type->category_name }}</label>
                @endforeach
            </div>
        </div>
    </div>
</div>
