<div class="full_wrap">
    <div class="row">
        <div class="col-12">
            <div class="nav_heading cf">
                <a href="{{ route('admin.product_management.show', ['prefix' => Auth::user()->role->role_slug, 'type' => 'benefits']) }}" class="{{ request()->is('*/product-management/benefits') ? 'active' : '' }}">BENEFITS  </a>
                <a href="{{ route('admin.product_management.show', ['prefix' => Auth::user()->role->role_slug, 'type' => 'quote-questions']) }}" class="{{ request()->is('*/product-management/quote-questions') ? 'active' : '' }}">QUOTE QUESTIONS  </a>
                <a href="{{ route('admin.product_management.show', ['prefix' => Auth::user()->role->role_slug, 'type' => 'price-rater']) }}" class="{{ request()->is('*/product-management/price-rater') ? 'active' : '' }}">PRICE/RATER  </a>
                <a href="{{ route('admin.product_management.show', ['prefix' => Auth::user()->role->role_slug, 'type' => 'platform-integration']) }}" class="{{ request()->is('*/product-management/platform-integration') ? 'active' : '' }}">PLATFORM INTEGRATION  </a>
            </div>
        </div>
    </div>
</div>