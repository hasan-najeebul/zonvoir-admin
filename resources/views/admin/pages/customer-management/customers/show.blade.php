@extends('layouts.master')

    @section('title')
        {{ __('messages.user') }}
    @endsection
    @section('breadcrumbs')
        {{ Breadcrumbs::render('user-management.customer.show',$user) }}
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
                        <x-user.user-info :user=$user></x-user.user-info>
                        <!--end::User Info-->
                        <!--end::Summary-->
                        <!--begin::Details toggle-->
                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details"
                                role="button" aria-expanded="false" aria-controls="kt_user_view_details">
                                {{ __('messages.details') }}
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
                            {{-- <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_update_details">{{ __('messages.edit')}}</a>
                            </span> --}}
                        </div>
                        <!--end::Details toggle-->
                        <div class="separator"></div>
                        <!--begin::Details content-->
                        <x-user.address-detail :user=$user></x-user.address-detail>
                        <!--end::Details content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#kt_customer_view_order_tab">{{ __('messages.orders') }}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                            href="#kt_customer_view_earning_statements">{{ __('messages.earning_statement') }}</a>
                    </li>
                    <!--end:::Tab item-->
                     <!--begin:::Tab item-->
                     <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                            href="#kt_customer_view_redeemed_statements">{{ __('messages.redeemed_statement') }}</a>
                    </li>
                    <!--end:::Tab item-->

                </ul>
                <!--end:::Tabs-->
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade active show" id="kt_customer_view_order_tab" role="tabpanel">
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{ __('messages.order_listing') }}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0 pb-5">
                                <!--begin::Table-->
                                <div id="kt_table_customers_payment_wrapper"
                                    class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <input name="search" class="d-none" data-kt-ecommerce-order-filter="search">
                                        <x-orders.order-list :user=$user :url="route('user-management.customer.orders',$user->id)"></x-orders.order-list>
                                    </div>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="fw-bolder mb-0">{{ __('messages.loyalty_card') }}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <x-customer.card-tab :cards="$user->loyaltyCard"></x-customer.card-tab>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        <!--begin::Card-->
                        <x-customer.credit-balance :userPoint="$user->customerPoint"></x-customer.credit-balance>
                        <!--end::Card-->

                    </div>
                    <!--end:::Tab pane-->

                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_customer_view_earning_statements" role="tabpanel">
                        <!--begin::Statements-->
                        <div class="card mb-6 mb-xl-9">
                            <!--begin::Header-->
                            <div class="card-header">
                                <!--begin::Title-->
                                <div class="card-title">
                                    <h2>{{ __('messages.earning_statement') }}</h2>
                                </div>
                                <!--end::Title-->

                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body pb-5">
                                <!--begin::Tab Content-->
                                <div id="kt_customer_view_earning_statement_tab_content" class="tab-content">
                                    <!--begin::Tab panel-->
                                    <x-customer.reward-earn-list :user=$user></x-customer.reward-earn-list>
                                    <!--end::Tab panel-->

                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Statements-->
                    </div>
                    <!--end:::Tab pane-->
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_customer_view_redeemed_statements" role="tabpanel">
                        <!--begin::Statements-->
                        <div class="card mb-6 mb-xl-9">
                            <!--begin::Header-->
                            <div class="card-header">
                                <!--begin::Title-->
                                <div class="card-title">
                                    <h2>{{ __('messages.redeemed_statement') }}</h2>
                                </div>
                                <!--end::Title-->

                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body pb-5">
                                <!--begin::Tab Content-->
                                <div id="kt_customer_view_redeemed_statement_tab_content" class="tab-content">
                                    <!--begin::Tab panel-->
                                    <x-customer.redeemed-reward-list :user=$user></x-customer.redeemed-reward-list>
                                    <!--end::Tab panel-->

                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Statements-->
                    </div>
                    <!--end:::Tab pane-->
                </div>
                <!--end:::Tab content-->
            </div>
        </div>

        <!--end::Layout-->
        <!--begin::Modals-->
        <!--begin::Modal - Update user details-->
        @include('admin.pages.user-management.users.modals._update-details')
        <!--end::Modal - Update user details-->
    </div>
    <!--end::Container-->
    @push('scripts')
        {{-- <script src="{{ asset('assets/js/custom/apps/user-management/users/view/view.js')}}"></script> --}}
        <script src="{{ asset('assets/js/custom/apps/user-management/users/view/update-details.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/customers/view/order-list.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/customers/view/reward-earn-list.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/customers/view/reward-redeemed-list.js') }}"></script>

    @endpush
@endsection
