<div class="col-md-12 pb-80">
    <div class="col-md-12">
        <h4 class="text-primary">Access to Products</h4>
    </div>
    <div class="col-md-12 pt-4 text-left profile_checkbox1 policiesSection">
        <div class="col-md-12 pt-4 text-left">
            @if(!empty($policies))
            @foreach($policies as $list)
            <label class="container_checkbox">{{$list->category_name}}
                <input type="checkbox" class="checkbox" name="access_to_products[]" data-policy="{{$list->category_name}}" value="{{$list->category_id}}" <?php if(count($assigned_products) > 0) { foreach($assigned_products as $value){ if($value->product_category_id == $list->category_id ) { echo 'checked'; } } } ?> >
                <span class="checkmark"></span>
            </label>
            @endforeach()
            @endif
        </div>
    </div>
</div>