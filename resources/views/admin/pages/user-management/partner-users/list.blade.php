@extends('layouts.master')
    @section('title')
    {{ __('messages.partner_listing')}}
    @endsection
    @section('breadcrumbs')
        {{ Breadcrumbs::render('user-management.partner.index') }}
    @endsection

@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl" url="{{ route('user-management.partner.index') }}">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
               <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input name="search" type="text" data-kt-partner-user-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Partners" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                    <div class="w-100 mw-150px">
                        <!--begin::Select2-->
                        @include('admin.inc._user_status')
                        <!--end::Select2-->
                    </div>
                </div>
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-partner-user-table-toolbar="base">
                        <!--begin::Filter-->

                        <!--end::Menu 1-->
                        <!--end::Filter-->
                        <!--begin::affiliate-->
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_affiliate_user">{{ __('messages.add_affiliate_user')}}</button> --}}
						<!--end::Add affiliate-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card toolbar-->
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_partner_users">
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <!-- <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                            </div>
                        </th> -->
                        <th class="min-w-100px">{{ __('messages.name')}}</th>
                        {{-- <th class="min-w-125px">Role</th> --}}
                        <th class="min-w-100px">{{ __('messages.email')}}</th>
                        <th class="min-w-70px">{{ __('messages.total_store')}}</th>
                        <th class="min-w-125px">{{ __('messages.project_manager')}}</th>
                        <th class="min-w-70px">{{ __('messages.seller_count')}}</th>
                        <th class="min-w-80px">{{ __('messages.status')}}</th>
                        <th class="min-w-125px">{{ __('messages.date_created')}}</th>
                        {{-- <th class="min-w-100px">{{ __('messages.actions')}}</th> --}}
                    </tr>
                    <!--end::Table row-->
                </thead>

                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
    </div>

    <!--end::Container-->
    @push('scripts')
        <script src="{{ asset('assets/js/custom/apps/user-management/partner-user/list/table.js')}}"></script>

    @endpush
@endsection
