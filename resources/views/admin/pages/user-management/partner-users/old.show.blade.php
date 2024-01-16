@extends('layouts.master')

    @section('title')
    {{ __('messages.partners')}}
    @endsection

@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                <!--begin::Card-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Summary-->
                        <!--begin::User Info-->
                        <div class="d-flex flex-center flex-column py-5">
                            <!--begin::Avatar-->
                            @include('admin.inc.users.sections.show._show-avatar')
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $user->name ?? '' }}</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="mb-9">
                                <!--begin::Badge-->
                                <div class="badge badge-lg badge-light-primary d-inline">
                                    {{ ucwords($user->roles->first()?->name) ?? '' }}</div>
                                <!--begin::Badge-->
                                <p class="fs-6 text-gray-600 fw-bold mb-6">{{ $user->affiliate->description ?? '' }}</p>

                            </div>
                            <!--end::Position-->
                            <!--begin::Info-->
                        </div>
                        <!--end::User Info-->
                        <!--end::Summary-->
                        <!--begin::Details toggle-->
                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details"
                                role="button" aria-expanded="false" aria-controls="kt_user_view_details">{{ __('messages.details')}}
                                <span class="ms-2 rotate-180">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="{{ __('messages.edit_user_details')}}">
                                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_update_affiliate_user">Edit</a>
                            </span>
                        </div>
                        <!--end::Details toggle-->
                        <div class="separator"></div>
                        <!--begin::Details content-->
                        <div id="kt_user_view_details" class="collapse show">
                            @include('admin.inc.users.sections.show._address')
                        </div>
                        <!--end::Details content-->
                        <!--begin::Bank Details content-->
                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                href="#kt_user_view_bussiness_details" role="button" aria-expanded="false"
                                aria-controls="kt_user_view_details">{{ __('messages.bussiness_details')}}
                                <span class="ms-2 rotate-180">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div id="kt_user_view_bussiness_details" class="collapse show">
                           @include('admin.inc.users.sections.show._bussiness')
                        </div>
                        <!--end::Bank Details content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#kt_partner_user_view_project_manager_tab">{{ __('messages.project_manager')}}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                            href="#kt_partner_user_view_seller_tab">{{ __('messages.seller')}}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                       <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                            href="#kt_partner_user_view_store_tab">{{ __('messages.stores')}}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                       <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                            href="#kt_partner_user_view_product_tab">{{ __('messages.products')}}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                       <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                            href="#kt_partner_user_view_coupons_tab">{{ __('messages.coupons')}}</a>
                    </li>
                    <!--end:::Tab item-->


                </ul>
                <!--end:::Tabs-->
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_partner_user_view_project_manager_tab" role="tabpanel">
                        <!--begin::Card-->
                        @include('admin.pages.user-management.partner-users.tabs.project-manager-list')
                        <!--end::Card-->
                    </div>
                    <div class="tab-pane fade show" id="kt_partner_user_view_seller_tab" role="tabpanel">
                        <!--begin::Card-->
                        @include('admin.pages.user-management.partner-users.tabs.seller-list')
                        <!--end::Card-->
                    </div>
                    <div class="tab-pane fade show" id="kt_partner_user_view_store_tab" role="tabpanel">
                        <!--begin::Card-->
                        @include('admin.pages.user-management.partner-users.tabs.store-list')
                        <!--end::Card-->
                    </div>
                    <div class="tab-pane fade show" id="kt_partner_user_view_product_tab" role="tabpanel">
                        <!--begin::Card-->
                        @include('admin.pages.user-management.partner-users.tabs.product-list')
                        <!--end::Card-->
                    </div>
                    <div class="tab-pane fade show" id="kt_partner_user_view_coupons_tab" role="tabpanel">
                        <!--begin::Card-->
                        @include('admin.pages.user-management.partner-users.tabs.coupons-list')
                        <!--end::Card-->
                    </div>
                    <!--end:::Tab pane-->

                </div>
                <!--end:::Tab content-->
                @include('admin.inc.users.sections.show._invoices')
            </div>

            <!--end::Content-->
        </div>

        <!--end::Layout-->
        <!--begin::Modals-->
        <!--begin::Modal - Update user details-->
        @include('admin.pages.user-management.partner-users.modals._update-details')
        <!--end::Modals-->
    </div>
    <!--end::Container-->
    @push('scripts')
        {{-- <script src="{{ asset('assets/js/custom/apps/user-management/project-manager/list/list.js')}}"></script> --}}
        {{-- <script src="{{ asset('assets/js/custom/apps/user-management/affiliate-user/view/update-affiliate-user.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/js/custom/apps/user-management/users/view/update-role.js')}}"></script> --}}
    @endpush
@endsection
