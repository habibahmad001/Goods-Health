<div class="full_wrap">
    <div class="row">
        <div class="col-12">
            <div class="nav_heading cf">
                @foreach($get_roles as $get_role)
                	@if(!in_array($get_role->id, [8,9,10]))
                	<a href="{{route('admin.users.show', ['prefix' => Auth::user()->role->role_slug, 'u_type' => $get_role->role_slug])}}" class="{{ request()->is('*/user/'.$get_role->role_slug) || (in_array($get_role->id, [7,8,9,10]) && request()->is('*/user/*_employee')) ? 'active' : '' }}">{{ $get_role->id == 7 ? 'EMPLOYEE' : $get_role->role_name }}  </a>
                	@endif
                @endforeach
            </div>
        </div>
    </div>
</div>