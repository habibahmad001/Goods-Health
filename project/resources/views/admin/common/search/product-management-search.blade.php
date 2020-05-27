<div class="wrap_con box_shadow">
    <div class="full_wrap" id="searchSection">
        <div class="row profile_title">
            <h4 class="text-primary">Search</h4>
        </div>

        <div class="form-group-no-border collapse show clps-agent-in-charge main-search-module">
            <div class="row provider_profile_edit">
                <div class="col-md-6 info_con profile_info_con">
                    <div class="form-group row in_field">
                        <label for="s_ProductType" class="col-md-4 col-form-label">Product Type *</label>
                        <div class="col-md-8 input_f">
                            <select id="s_ProductType" class="in form-control searchProductType" name="product_type">
                                <option value="">Select Product Type</option>
                                @foreach($product_type as $p_type)
                                <option value="{{ $p_type->id }}">{{$p_type->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="s_city" class="col-md-4 col-form-label">City *</label>
                        <div class="col-md-8 input_f">
                            <select id="s_city" class="in form-control searchCity" name="city">
                                <option value="">Select City</option> 
                            </select>
                        </div>
                        
                        <label for="s_county" class="col-md-4 col-form-label">County</label>
                        <div class="col-md-8 input_f">
                            <input id="s_county" class="in form-control searchCounty" name="county" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 info_con profile_info_con">
                    <div class="form-group row in_field">
                        <label for="s_state" class="col-md-4 col-form-label">State *</label>
                        <div class="col-md-8 input_f">
                            <select id="s_state" class="in form-control searchState" name="state">
                                <option value="">Select State</option>
                                @foreach($state as $state_list)
                                <option value="{{ $state_list->state_code }}">{{$state_list->state}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="s_zipcode" class="col-md-4 col-form-label">Zipcode</label>
                        <div class="col-md-8 input_f">
                            <select id="s_zipcode" class="in form-control searchZipcode" name="zipcode">
                                <option value="">Select Zipcode</option>
                            </select>
                        </div>

                        <label for="s_carrier" class="col-md-4 col-form-label">Carrier Name/ID</label>
                        <div class="col-md-8 input_f">
                            <select id="s_carrier" class="in form-control searchCarrier" name="carrier">
                                <option value="">Select Carrier Name/ID</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>