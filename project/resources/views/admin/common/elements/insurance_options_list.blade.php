@foreach($insurance_options as $insurance_option)
<div class="col-sm-12 box_shadow pt-5 pb-2 insurance_compare">
    <div class="col-md-2 col-sm-4">
        <label class="container_checkbox"> Compare
            <input type="checkbox" class="checkbox" name="compare_io" value="{{ $insurance_option->id }}" data-price="{{ $insurance_option->price_1 }}" data-bodily_injury_liability="{{ $insurance_option->bodily_injury_liability }}" data-property_damage_liability="{{ $insurance_option->property_damage_liability }}" data-uninsured_motorist_bodily="{{ $insurance_option->uninsured_motorist_bodily }}" data-uninsured_motorist_property="{{ $insurance_option->uninsured_motorist_property }}" data-personal_injury_protection="{{ $insurance_option->personal_injury_protection }}" data-imagesrc="{{ asset('images/').'/'.$insurance_option->carrier_logo }}">
            <span class="checkmark"></span>
        </label>
    </div>
    <div class="col-md-3 col-sm-4 text-center">
        <img src="{{ asset('images').'/'.$insurance_option->carrier_logo }}" width="100px">
    </div>
    <div class="col-md-2  col-sm-4 ">
        <p class="font-size-18"> ${{ $insurance_option->price_1 }}/MO</p>
    </div>
    <div class="col-md-3 col-sm-6">
        <a class="btn btn-primary btn-compare insurance_options_continue" href="#"> Continue </a>
    </div>
    <div class="col-md-2  col-sm-6">
        <a class="text-primary">
            Read Details <i class="fa fa-sort-down"></i>
        </a>
    </div>
</div>
@endforeach()

@if($insurance_options->isNotEmpty())
<div class="col-md-12 text-center pt-4 compare_btn">
    <button class="btn btn-md btn-submit font-size-14" type="button" id="compareButton">COMPARE</button>
    <button type="reset" class="btn btn-md   font-size-14 btn-reset">CANCEL</button>
</div>
@endif