<nav class="vz_navbar" id="sidebar" style="margin-top: 66px;">
    <div class="navbar-wrapper" style="">
        <div class="navbar-content scroll-div" style="">
            <div class="vz_navigation" style="">
                <ul class="sidebar nav flex-column" style="width: 100%;">
                    @if(!empty($global_modules))
                        @foreach($global_modules as $gm_key => $module)
                            @if(in_array($module->id, $global_permission))
                            @if($module->id == 3)
                            <li class="top_menu {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'active' : '' }}"><a class="nav-link" href="javascript:void(0);" data-nav="advance_kit">
                                <img src="{{ asset('images/sidebar/'.$module->image) }}"><span class="menu-collapsed hide_on_mobile hide_on_ipad">{{ $module->module_name }}</span><i class="fa fa-caret-down caret_css menu-collapsed hide_on_mobile hide_on_ipad"></i></a>
                                <div class="submenu_style sub_menu" style="display: {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'block' : 'none' }};">
                                    @foreach($get_roles as $get_role)
                                        @if(!in_array($get_role->id, [8,9,10]))
                                        <a href="{{route('admin.users.show', ['prefix' => Auth::user()->role->role_slug, 'u_type' => $get_role->role_slug])}}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css {{ request()->is('*/user/'.$get_role->role_slug) || (in_array($get_role->id, [7,8,9,10]) && request()->is('*/user/*_employee')) ? 'active' : '' }}">
                                        <span class="menu-collapsed">{{ $get_role->id == 7 ? 'EMPLOYEE' : $get_role->role_name }}</span>
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                            @elseif($module->id == 4)
                            <li class="top_menu {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'active' : '' }}"><a class="nav-link" href="javascript:void(0);" data-nav="{{ $module->module_slug }}">
                                <img src="{{ asset('images/sidebar/'.$module->image) }}"><span class="menu-collapsed hide_on_mobile hide_on_ipad">{{ $module->module_name }}</span><i class="fa fa-caret-down caret_css menu-collapsed hide_on_mobile hide_on_ipad"></i></a>
                                <div class="submenu_style sub_menu" style="display: {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'block' : 'none' }};">
                                    <a href="{{ route('admin.message', ['prefix' => Auth::user()->role->role_slug, 'request_type' => 'inbox']) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Message</span>
                                    </a>
                                    <a href="{{ route('admin.message', ['prefix' => Auth::user()->role->role_slug, 'request_type' => 'compose']) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Compose Mail</span>
                                    </a>
                                </div>
                            </li>
                            @elseif($module->id == 12)
                            <li class="top_menu {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'active' : '' }}"><a class="nav-link" href="javascript:void(0);" data-nav="{{ $module->module_slug }}"><img src="{{ asset('images/sidebar/'.$module->image) }}"><span class="menu-collapsed hide_on_mobile hide_on_ipad">{{ $module->module_name }}</span><i class="fa fa-caret-down caret_css menu-collapsed hide_on_mobile hide_on_ipad"></i></a>
                                <div class="submenu_style sub_menu" style="display: {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'block' : 'none' }};">
                                    <a href="{{ route('admin.tickets', ['prefix' => Auth::user()->role->role_slug]) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Request</span>
                                    </a>
                                    <a href="{{ route('admin.tickets', ['prefix' => Auth::user()->role->role_slug]) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Incident Report</span>
                                    </a>
                                    <a href="{{ route('admin.tickets', ['prefix' => Auth::user()->role->role_slug]) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Change Request</span>
                                    </a>
                                </div>
                            </li>
                            @elseif($module->id == 14)
                            <li class="top_menu {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'active' : '' }}"><a class="nav-link" href="javascript:void(0);" data-nav="{{ $module->module_slug }}"><img src="{{ asset('images/sidebar/'.$module->image) }}"><span class="menu-collapsed hide_on_mobile hide_on_ipad">{{ $module->module_name }}</span><i class="fa fa-caret-down caret_css menu-collapsed hide_on_mobile hide_on_ipad"></i></a>
                                <div class="submenu_style sub_menu" style="display: {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'block' : 'none' }};">
                                    <a href="{{ route('admin.broker.center', ['prefix' => Auth::user()->role->role_slug]) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Activities</span>
                                    </a>
                                    <a href="{{ route('admin.broker.center', ['prefix' => Auth::user()->role->role_slug]) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Policies</span>
                                    </a>
                                    <a href="{{ route('admin.broker.center', ['prefix' => Auth::user()->role->role_slug]) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Agents</span>
                                    </a>
                                    <a href="{{ route('admin.broker.center', ['prefix' => Auth::user()->role->role_slug]) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Carriers</span>
                                    </a>
                                    <a href="{{ route('admin.broker.center', ['prefix' => Auth::user()->role->role_slug]) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Commissions</span>
                                    </a>
                                </div>
                            </li>
                            @elseif($module->id == 16)
                            <li class="top_menu {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'active' : '' }}"><a class="nav-link" href="javascript:void(0);" data-nav="{{ $module->module_slug }}"><img src="{{ asset('images/sidebar/'.$module->image) }}"><span class="menu-collapsed hide_on_mobile hide_on_ipad">{{ $module->module_name }}</span><i class="fa fa-caret-down caret_css menu-collapsed hide_on_mobile hide_on_ipad"></i></a>
                                <div class="submenu_style sub_menu" style="display: {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'block' : 'none' }};">
                                    <a href="{{ route('admin.carrier_management.show', ['prefix' => Auth::user()->role->role_slug, 'type' => 'carriers']) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css {{ request()->is('*/carrier-management/carriers') ? 'active' : '' }}">
                                        <span class="menu-collapsed">Location</span>
                                    </a>
                                    <a href="{{ route('admin.carrier_management.show', ['prefix' => Auth::user()->role->role_slug, 'type' => 'products']) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css {{ request()->is('*/carrier-management/products') ? 'active' : '' }}">
                                        <span class="menu-collapsed">Products</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Appointments</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Insurance Access</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Script</span>
                                    </a>
                                </div>
                            </li>
                            @elseif($module->id == 29)
                            <li class="top_menu {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'active' : '' }}"><a class="nav-link" href="javascript:void(0);" data-nav="{{ $module->module_slug }}"><img src="{{ asset('images/sidebar/'.$module->image) }}"><span class="menu-collapsed hide_on_mobile hide_on_ipad">{{ $module->module_name }}</span><i class="fa fa-caret-down caret_css menu-collapsed hide_on_mobile hide_on_ipad"></i></a>
                                <div class="submenu_style sub_menu" style="display: {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'block' : 'none' }};">
                                    <a href="{{ route('admin.product_management.show', ['prefix' => Auth::user()->role->role_slug, 'type' => 'benefits']) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css {{ request()->is('*/product-management/benefits') ? 'active' : '' }}">
                                        <span class="menu-collapsed">Benefits</span>
                                    </a>
                                    <a href="{{ route('admin.product_management.show', ['prefix' => Auth::user()->role->role_slug, 'type' => 'quote-questions']) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css {{ request()->is('*/product-management/quote-questions') ? 'active' : '' }}">
                                        <span class="menu-collapsed">Quote Questions</span>
                                    </a>
                                    <a href="{{ route('admin.product_management.show', ['prefix' => Auth::user()->role->role_slug, 'type' => 'price-rater']) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css {{ request()->is('*/product-management/price-rater') ? 'active' : '' }}">
                                        <span class="menu-collapsed">Price/Rater</span>
                                    </a>
                                    <a href="{{ route('admin.product_management.show', ['prefix' => Auth::user()->role->role_slug, 'type' => 'platform-integration']) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css {{ request()->is('*/product-management/platform-integration') ? 'active' : '' }}">
                                        <span class="menu-collapsed">Platform Integration</span>
                                    </a>
                                </div>
                            </li>
                            @elseif($module->id == 19)
                            <li class="top_menu {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'active' : '' }}"><a class="nav-link" href="javascript:void(0);" data-nav="{{ $module->module_slug }}"><img src="{{ asset('images/sidebar/'.$module->image) }}"><span class="menu-collapsed hide_on_mobile hide_on_ipad">{{ $module->module_name }}</span><i class="fa fa-caret-down caret_css menu-collapsed hide_on_mobile hide_on_ipad"></i></a>
                                <div class="submenu_style sub_menu" style="display: {{ (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'block' : 'none' }};">
                                    <a href="{{ route('admin.quote.management', ['prefix' => Auth::user()->role->role_slug]) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Location</span>
                                    </a>
                                    <a href="{{ route('admin.quote.management', ['prefix' => Auth::user()->role->role_slug]) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Product</span>
                                    </a>
                                    <a href="{{ route('admin.quote.management', ['prefix' => Auth::user()->role->role_slug]) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Product Details</span>
                                    </a>
                                    <a href="{{ route('admin.quote.management', ['prefix' => Auth::user()->role->role_slug]) }}" class="list-group-item list-group-item-action bg-dark text-white sub_menu_font_css">
                                        <span class="menu-collapsed">Coverage Option</span>
                                    </a>
                                </div>
                            </li>
                            @elseif($module->id == 21)
                            <li><a class="nav-link" href="{{ route('logout') }}" data-nav="{{ $module->module_name }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <img src="{{ asset('images/sidebar/logout.png') }}"><span class="menu-collapsed hide_on_mobile hide_on_ipad">{{ $module->module_name }}</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @elseif($module->id == 22)
                            <li class="sidebarCollapse hide_on_mobile hide_on_ipad"><a class="nav-link" href="javascript:void(0);" data-nav="{{ $module->module_slug }}"><img src="{{ asset('images/sidebar/'.$module->image) }}" alt="collapse.png" class="img_collapse"><span class="menu-collapsed hide_on_mobile hide_on_ipad">{{ $module->module_name }}</span></a></li>
                            @else
                            <li class="{{  (\Request::route()->getName() == 'admin.'.$module->route_name) ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.'.$module->route_name, ['prefix' => Auth::user()->role->role_slug ]) }}" data-nav="{{ $module->module_slug }}">
                                <img src="{{ asset('images/sidebar/'.$module->image) }}" class="img img-responsive"><span class="menu-collapsed hide_on_mobile hide_on_ipad">{{ $module->module_name }}</span></a>
                            </li>
                            @endif
                            @endif
                        @endforeach
                    @else
                    <li class="{{  (\Request::route()->getName() == 'admin.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.index', ['prefix' => Auth::user()->role->role_slug ]) }}" data-nav="dashboard">
                        <img src="{{ asset('images/sidebar/dashboard.png') }}" class="img img-responsive"><span class="menu-collapsed hide_on_mobile hide_on_ipad">Dashboard</span></a>
                    </li>
                    @endif
                    <li class=""><a class="nav-link" href="javascript:void(0);" data-nav="pages">&nbsp;</a></li>
                    <li class=""><a class="nav-link" href="javascript:void(0);" data-nav="pages">&nbsp;</a></li>
                    <li class=""><a class="nav-link" href="javascript:void(0);" data-nav="pages">&nbsp;</a></li>
                    <li class=""><a class="nav-link" href="javascript:void(0);" data-nav="pages">&nbsp;</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
