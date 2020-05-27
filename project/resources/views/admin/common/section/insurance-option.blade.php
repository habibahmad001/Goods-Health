<div class="profile_card box_shadow">
    <div class="row profile_title">
        <h4 class="text-primary">Product Category Selection</h4>
        <div class="pull-right pull-left-mob">
            <!-- <button data-toggle="collapse" href="#insurance_profile" role="button" aria-expanded="true" aria-controls="insurance_profile">
                <i class="fa fa-sort-down"></i>
            </button> -->
        </div>
    </div>

    <div class="collapse show pt-5 pb-80" id="insurance_profile">
        <div class="col-md-12">
            <div class="profile_card ">
                <div class="col-md-12 box_shadow">
                    <select id="product_select" class="form-control">
                        @if(!empty($policies))
                        @foreach($policies as $list)
                            @if(count($assigned_products) > 0)
                                @foreach($assigned_products as $value)
                                    @if($value->product_category_id == $list->category_id) 
                                        <option value="{{ encrypt($list->cat_id) }}" data-imagesrc="{{ asset('images').'/'.strtolower($list->category_name).'.png' }}">{{ $list->category_name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        @endif
                    </select>
                </div>

                <div  class="form-group-no-border box_shadow">
                    <div class="wrap_con box_shadow" id="insurance_option">
                        <div class="full_wrap">
                            <div class="row no-margin">

                                <div class="col-sm-12 profile_card ">
                                    <div class="row profile_title no-border px-lg-5">
                                        <h4  class="text-primary pl-lg-5">Insurance Option</h4>
                                    </div>
                                    <div class="row form-group-no-border   pl-lg-5  collapse show" id="insurance_compare">
                                        <div class="col-sm-12 pr-lg-5 pb-2">
                                            <p class="font-size-16 text-primary">Every insurer we carry has exceptional financial stability and customer service ratings, and will pay out for any and all causes of death with the exception of suicide in the first two years.</p>
                                        </div>
                                        <div class="row compare_insurance_div pb-5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>