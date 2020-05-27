<div class="full_wrap">
    <div class="row">
        <div class="col-12">
            <div class="nav_heading cf">
                <a href="{{ route('admin.carrier_management.show', ['prefix' => Auth::user()->role->role_slug, 'type' => 'carriers']) }}" class="{{ request()->is('*/carrier-management/carriers') ? 'active' : '' }}">CARRIER/LOCATION  </a>
                <a href="{{ route('admin.carrier_management.show', ['prefix' => Auth::user()->role->role_slug, 'type' => 'products']) }}" class="{{ request()->is('*/carrier-management/products') ? 'active' : '' }}">CARRIER'S PRODUCTS</a>
            </div>
        </div>
    </div>
</div>