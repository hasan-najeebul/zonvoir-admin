<div class="card mb-5 mb-xxl-8">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap">
            <!--begin: Pic-->
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    @if ($user->profile_photo_url)
                        <img src="{{ $user->getProfilePicPath() }}" alt="image" />
                    @else
                        <div
                            class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $user->name) }}">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                    @endif
                    <div
                        class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                    </div>
                </div>

            </div>

            <!--end::Pic-->
            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <a href="#"
                                class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ $user->name ?? '' }}
                            </a>
                            <a href="#">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                            fill="#00A3FF" />
                                        <path class="permanent"
                                            d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                            fill="white" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->

                            </a>
                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit Partner user">
                                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_update_partner_user">{{ __('messages.edit')}}</a>
                            </span>
                        </div>
                        <!--end::Name-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                            <a href="#"
                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                            fill="black" />
                                        <path
                                            d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->{{ ucwords($user->roles->first()?->name) ?? '' }}</a>
                            <a href="#"
                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                            fill="black" />
                                        <path
                                            d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                @if (isset($user->address->street) || isset($user->address->street) || isset($user->address->city))
                                    <div class="text-gray-600">{{ $user->address->house_no ?? '' }},
                                        {{ $user->address->street ?? '' }}
                                        {{ $user->address->city ?? '' }}, {{ $user->address->postal_code ?? '' }}
                                    </div>
                                @endif

                                <!--end::Svg Icon-->
                            </a>
                            <a href="javascript:void(0)"
                                class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                            fill="black" />
                                        <path
                                            d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->{{ $user->email ?? '' }}</a>
                            <!--begin::Details toggle-->

                            <!--end::Details toggle-->
                            <div class="separator"></div>
                        </div>
                        <!--end::Info-->
                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                            <span class="svg-icon svg-icon-4 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                        fill="black" />
                                    <path
                                        d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <div class="text-gray-600">
                                <p><span class="align-items-center text-gray-400 text-hover-primary me-5 mb-2">{{ __('messages.business_name')}}:</span> {{ $user->userBusiness->business_name ?? ''}} &nbsp;
                                <span class="align-items-center text-gray-400 text-hover-primary me-5 mb-2">{{ __('messages.industry')}}:</span> {{ $user->userBusiness->industry ?? ''}}</p>
                                @isset($user->userBusiness->website)
                                    <span class="align-items-center text-gray-400 text-hover-primary me-5 mb-2">{{ __('messages.website')}}:</span> {{ $user->userBusiness->website ?? ''}}</p>
                                @endisset
                            </div>
                        </div>
                    </div>
                    <!--end::User-->

                </div>
                <!--end::Title-->
                <!--begin::Stats-->
                <div class="d-flex flex-wrap flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap">

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="text-sm-center">
                                    <div class="fs-2 fw-bolder" data-kt-countup="true"
                                        data-kt-countup-value="{{ count($projectManager) }}">
                                        {{ count($projectManager) }}</div>
                                </div>
                                <!--end::Number-->
                                <!--begin::Label-->
                                <div class="fw-bold fs-6 text-gray-400">{{ __('messages.project_manager') }}</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="text-sm-center">
                                    <div class="fs-2 fw-bolder" data-kt-countup="true"
                                        data-kt-countup-value="{{ count($seller) ?? '0' }}" data-kt-countup-prefix="">
                                        {{ count($seller) ?? '0' }}</div>
                                </div>
                                <!--end::Number-->
                                <!--begin::Label-->
                                <div class="fw-bold fs-6 text-gray-400">{{ __('messages.seller') }}</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="text-sm-center">
                                    <div class="fs-2 fw-bolder" data-kt-countup="true"
                                        data-kt-countup-value="{{ count($store) ?? '0' }}" data-kt-countup-prefix="">
                                        {{ count($store) ?? '0' }}</div>
                                </div>
                                <!--end::Number-->
                                <!--begin::Label-->
                                <div class="fw-bold fs-6 text-gray-400">{{ __('messages.stores') }}</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Details-->
        <!--begin::Navs-->
        <ul class="partner-nav nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
            <!--begin::Nav item-->
            {{-- <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="">{{ __('messages.project_manager')}}</a>
            </li> --}}
            <!--begin:::Tab item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 project_manager_tab {{ request()->routeIs('user-management.project-manager') ? 'active' : '' }}"
                    href="{{ route('user-management.project-manager', $user->id) }}">{{ __('messages.project_manager') }}</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 seller_tab {{ request()->routeIs('user-management.seller-list') ? 'active' : '' }}"
                    href="{{ route('user-management.seller-list', $user->id) }}">{{ __('messages.seller') }}</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 store_tab {{ request()->routeIs('user-management.store-list') ? 'active' : '' }}"
                    href="{{ route('user-management.store-list', $user->id) }}">{{ __('messages.stores') }}</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 product_tab {{ request()->routeIs('product-management.partner.products') ? 'active' : '' }}"
                    href="{{ route('product-management.partner.products', $user->id) }}">{{ __('messages.products') }}</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 coupons_tab {{ request()->routeIs('user-management.coupon-list') ? 'active' : '' }}"
                    href="{{ route('user-management.coupon-list', $user->id) }}">{{ __('messages.coupons') }}</a>
            </li>
            <!--begin:::Tab item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 proforma_tab {{ request()->routeIs('user-management.proforma-list') ? 'active' : '' }}"
                    href="{{ route('user-management.proforma-list', $user->id) }}">{{ __('messages.proforma_invoice') }}</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 invoice_tab {{ request()->routeIs('user-management.invoice-list') ? 'active' : '' }}"
                    href="{{ route('user-management.invoice-list', $user->id) }}">{{ __('messages.invoices') }}</a>
            </li>
            <!--end:::Tab item-->
        </ul>
        <!--begin::Navs-->
    </div>
</div>