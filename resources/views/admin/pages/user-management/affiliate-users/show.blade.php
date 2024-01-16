@extends('layouts.master')

    @section('title')
    {{ __('messages.affiliate_user')}}
    @endsection
    @section('breadcrumbs')
        {{ Breadcrumbs::render('user-management.affiliate.show',$user) }}
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
                            @if ($user->hasRole('Affiliate'))
                                <x-user.affiliate-commission :user=$user></x-user.affiliate-commission>
                            @endif

                            <!--end::Info-->
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
                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit Affiliate user details">
                                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_update_affiliate_user">Edit</a>
                            </span>
                        </div>
                        <!--end::Details toggle-->
                        <div class="separator"></div>
                        <!--begin::Details content-->
                        <x-user.address-detail :user=$user></x-user.address-detail>
                        <!--end::Details content-->
                        <!--begin::Bank Details content-->
                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                href="#kt_user_view_bank_details" role="button" aria-expanded="false"
                                aria-controls="kt_user_view_details">{{ __('messages.bank_details')}}
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
                        <!--begin::Bank Details content-->
                        @if ($user->hasRole('Affiliate'))
                            <x-user.bank-detail :user=$user></x-user.bank-detail>
                        @endif
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
                            href="#kt_affiliate_user_view_overview_tab">{{ __('messages.overview')}}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_view_overview_security">Security</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                            href="#kt_affiliate_user_view_overview_statements">{{ __('messages.statements')}}</a>
                    </li>
                    <!--end:::Tab item-->

                </ul>
                <!--end:::Tabs-->
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_affiliate_user_view_overview_tab" role="tabpanel">
                        <!--begin::Card-->
                        @include('admin.pages.user-management.affiliate-users.tabs.overview')
                        <!--end::Card-->
                    </div>
                    <!--end:::Tab pane-->
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
                        @include('admin.pages.user-management.affiliate-users.tabs.profile-security')
                    </div>
                     <!--end:::Tab pane-->
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_affiliate_user_view_overview_statements" role="tabpanel">
                        <!--begin::Earnings-->
                        @include('admin.pages.user-management.affiliate-users.tabs.sections.earning')
                        <!--end::Earnings-->
                        <!--begin::Statements-->
                        @include('admin.pages.user-management.affiliate-users.tabs.statements')
                        <!--end::Statements-->
                    </div>
                    <!--end:::Tab pane-->
                </div>
                <!--end:::Tab content-->
            </div>
            <!--end::Content-->
        </div>

        <!--end::Layout-->
        <!--begin::Modals-->
        <!--begin::Modal - Update user details-->
        @include('admin.pages.user-management.affiliate-users.modals._update-details')
        <!--end::Modal - Update user details-->
        <!--begin::Modal - Add schedule-->

        <!--end::Modal - Add schedule-->
        <!--begin::Modal - Add task-->

        <!--end::Modal - Add task-->
        <!--begin::Modal - Update email-->
        @include('admin.pages.user-management.users.modals._update-email')
        <!--end::Modal - Update email-->
        <!--begin::Modal - Update password-->
        @include('admin.pages.user-management.users.modals._update-password')
        <!--end::Modal - Update password-->
        <!--begin::Modal - Update role-->
        {{-- @include('admin.pages.user-management.users.modals._update-role') --}}
        <!--end::Modal - Update role-->
        <!--end::Modals-->
    </div>
    <!--end::Container-->
    @push('scripts')
        {{-- <script src="{{ asset('assets/js/custom/apps/user-management/users/view/view.js')}}"></script> --}}
        <script src="{{ asset('assets/js/custom/apps/user-management/affiliate-user/view/update-affiliate-user.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/user-management/users/view/update-email.js')}}"></script>
        <script src="{{ asset('assets/js/custom/apps/user-management/users/view/update-password.js')}}"></script>
        {{-- <script src="{{ asset('assets/js/custom/apps/user-management/users/view/update-role.js')}}"></script> --}}
    @endpush
@endsection
