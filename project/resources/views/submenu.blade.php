<div class="row">
    <div class="col-md-12 mt-4">
        <div class="card d-flex w-100">
            <div class="row no-gutters row-bordered row-border-light h-100 widget_row">
                <div class="d-flex col-md-2 col-lg-2 align-items-center {{ (\Request::route()->getName() == 'admin.index') ? 'submenu-active' : '' }}">
                    <div class="card-body">
                        <a href="{{ route('admin.index', ['prefix' => Auth::user()->role->role_slug ]) }}">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                <img src="{{ asset('images/summary.png') }}" >
                                </div>
                            </div>
                            <p class="mb-0 text-muted">Summary</p>
                        </a>
                        
                    </div>
                </div>
                <div class="d-flex col-md-2 col-lg-2 align-items-center {{ (\Request::route()->getName() == 'admin.family-group') ? 'submenu-active' :'' }}">
                    <div class="card-body">
                        <a href="{{ route('admin.family-group', ['prefix' => Auth::user()->role->role_slug ]) }}">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <img src="{{ asset('images/family.png') }}">
                                </div>
                                
                            </div>
                        <p class="mb-0 text-muted">Family/Group</p>
                        </a>
                    </div>
                </div>
                <div class="d-flex col-md-2 col-lg-2 align-items-center {{ (\Request::route()->getName() == 'admin.insurance-benefits') ? 'submenu-active' : '' }}">
                    <div class="card-body">
                        <a href="{{ route('admin.insurance-benefits', ['prefix' => Auth::user()->role->role_slug ]) }}">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                <img src="{{ asset('images/insurance.png') }}">
                                </div>
                            </div>
                            <p class="mb-0 text-muted">Benefits/ Insurance Coverage</p>
                        </a>
                        
                    </div>
                </div>
                <div class="d-flex col-md-2 col-lg-2 align-items-center {{ (\Request::route()->getName() == 'admin.files' ) ? 'submenu-active' : '' }}">
                    <div class="card-body">
                        <a href="{{ route('admin.files', ['prefix' => Auth::user()->role->role_slug ]) }}">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                <img src="{{ asset('images/files.png') }}">
                                </div>
                            </div>
                        <p class="mb-0 text-muted">Files /Forms</p>
                        </a>
                    </div>
                </div>
                <div class="d-flex col-md-2 col-lg-2 align-items-center {{ (\Request::route()->getName() == 'admin.insurance.options') ? 'submenu-active' : '' }}">
                    <div class="card-body">
                        <a href="{{ route('admin.insurance.options', ['prefix' => Auth::user()->role->role_slug ]) }}">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <img src="{{ asset('images/insurance_option.png') }}">
                                </div>
                                
                            </div>
                            <p class="mb-0 text-muted">Insurance Options</p>
                        </a>
                    </div>
                </div>
                <div class="d-flex col-md-2 col-lg-2 align-items-center {{ (\Request::route()->getName() == 'admin.claim') ? 'submenu-active' : ''}}">
                    <div class="card-body">
                        <a href="{{ route('admin.claim.management', ['prefix' => Auth::user()->role->role_slug ]) }}">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <img src="{{ asset('images/report_claim.png') }}">
                                </div>
                                
                            </div>
                            <p class="mb-0 text-muted">Report Claim</p>
                        </a>
                    </div>
                </div>
                <div class="d-flex col-md-2 col-lg-2 align-items-center {{ (\Request::route()->getName() == 'admin.payments') ? 'submenu-active' :''}}">
                    <div class="card-body">
                        <a href="{{ route('admin.payment.center', ['prefix' => Auth::user()->role->role_slug ]) }}">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <img src="{{ asset('images/payment.png') }}">
                                </div>
                                
                            </div>
                            <p class="mb-0 text-muted">Payment</p>
                        </a>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>