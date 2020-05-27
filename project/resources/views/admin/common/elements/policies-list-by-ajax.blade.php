@foreach($policies as $list)
<label class="container_checkbox">{{$list->category_name}}
    <input type="checkbox" class="checkbox" name="access_to_products[]" data-policy="{{$list->category_name}}" value="{{$list->category_id}}" <?php if(count($assigned_products) > 0) { foreach($assigned_products as $value){ if($value->product_category_id == $list->category_id ) { echo 'checked'; } } } ?> >
    <span class="checkmark"></span>
</label>
@endforeach()