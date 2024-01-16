<!--begin::Aside menu-->
<div class="aside-menu flex-column-fluid">

    <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
        data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
        data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="#kt_aside_menu" data-kt-menu="true">
            @can('dashboard-view')
            <div data-kt-menu-trigger="click" class="menu-item {{ request()->routeIs('dashboard') ? 'here show' : '' }} menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                    fill="black" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                    fill="black" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">{{__('messages.dashboards')}}</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{__('messages.dashboard')}}</span>
                        </a>
                    </div>
                </div>
            </div>
            @endcan
            @php
                $userManagment = false;
                if (request()->routeIs('user-management.users.*') || request()->routeIs('user-management.roles.*') || request()->routeIs('user-management.permissions.*')):
                    $userManagment = 'hover show';
                endif;
            @endphp
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1 {{ $userManagment ?? '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen051.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.3"
                                    d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                    fill="black" />
                                <path
                                    d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">{{__('messages.user_management')}}</span>
                    <span class="menu-arrow"></span>
                </span>
                @can('user-list')
                <div class="menu-sub menu-sub-accordion">
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion mb-1 {{ request()->routeIs('user-management.users.*') ? 'hover show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{__('messages.users')}}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('user-management.users.index','user-management.users.show') ? 'active' : '' }}"
                                    href="{{ route('user-management.users.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{__('messages.users_list')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @can('role-list')
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ request()->routeIs('user-management.roles.*') ? 'hover show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{__('messages.roles')}}</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('user-management.roles.*') ? 'active' : '' }}"
                                    href="{{ route('user-management.roles.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{__('messages.roles_list')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('permission-list')
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('user-management.permissions.*') ? 'active' : '' }}"
                            href="{{ route('user-management.permissions.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{__('messages.permissions')}}</span>
                        </a>
                    </div>
                    @endcan
                </div>
                @endcan
            </div>
            @can('affiliate-list')
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('user-management.affiliate.*') ? 'active' : '' }}"
                    href="{{ route('user-management.affiliate.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">{{__('messages.affiliate_users')}}</span>
                </a>
            </div>
            @endcan
            @can('partner-list')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('user-management.partner.*','store-management.store.*','store-management.coupon-list','user-management.project-manager','store-management.seller-list','store-management.project-manager-list','user-management.store-list','user-management.seller-list','user-management.coupon-list','user-management.invoice-list','user-management.proforma-list','user-management.store-list','user-management.seller-list','user-management.coupon-list','user-management.invoice-list','product-management.partner.products','store-management.project-manager') ? 'show' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
                                <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        </span>
                    <span class="menu-title">{{__('messages.partners')}}</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('user-management.partner.*','user-management.project-manager','user-management.store-list','user-management.seller-list','user-management.coupon-list','user-management.invoice-list','user-management.proforma-list','product-management.partner.products') ? 'active' : '' }}"
                            href="{{ route('user-management.partner.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{__('messages.partner_user')}}</span>
                        </a>
                    </div>
                    @can('store-list')
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('store-management.store.*','store-management.coupon-list','store-management.seller-list','store-management.project-manager') ? 'active' : '' }}"
                            href="{{ route('store-management.store.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{__('messages.stores')}}</span>
                        </a>
                    </div>
                    @endcan
                </div>
            </div>
            @endcan

            @can('customer-list')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('user-management.customer.*','user-management.order.*') ? 'here show' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
                                <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        </span>
                    <span class="menu-title">{{__('messages.customers')}}</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link  {{ request()->routeIs('user-management.customer.*') ? 'active' : '' }}"
                            href="{{ route('user-management.customer.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{__('messages.customer_listing')}}</span>
                        </a>
                    </div>
                    @can('order-list')
                    <div class="menu-item">
                        <a class="menu-link  {{ request()->routeIs('user-management.order.*') ? 'active' : '' }}"
                            href="{{ route('user-management.order.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{__('messages.orders')}}</span>
                        </a>
                    </div>
                    @endcan
                </div>
            </div>
            @endcan
            {{-- <div data-kt-menu-trigger="click" class="menu-item here menu-accordion {{ request()->is('product-management/product','product-management/category') ? 'show' : '' }}"> --}}

                {{-- <div class="menu-sub menu-sub-accordion"> --}}
                    @can('product-list')
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('product-management.product.*','product-management.category.*') ? 'here show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm001.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z"
                                            fill="black" />
                                        <path
                                            d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{__('messages.products')}}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('product-management.product.*') ? 'active' : '' }}" href="{{ route('product-management.product.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{__('messages.product_listing')}}</span>
                                </a>
                            </div>
                            @can('category-list')
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('product-management.category.*') ? 'active' : '' }}" href="{{ route('product-management.category.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{__('messages.categories')}}</span>
                                </a>
                            </div>
                            @endcan
                        </div>
                    </div>
                    @endcan
                    <div class="menu-item">
                        <div class="menu-content">
                            <div class="separator mx-1 my-4"></div>
                        </div>
                    </div>
                <!--end::Menu-->
            {{-- </div> --}}
        </div>
        <!--end::Aside Menu-->
    </div>
</div>
