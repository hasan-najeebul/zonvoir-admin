@extends('layouts.master')

    @section('title')
    {{ __('messages.stores')}}
    @endsection
    @section('breadcrumbs')
        {{ Breadcrumbs::render('store-management.store.index') }}
    @endsection
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl" url="{{ route('store-management.store.index') }}">
        <div class="card pt-4 mb-6 mb-xl-9">
            <!--begin::Card header-->
            <div class="card-header border-0">
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
                        <input name="search" type="text" data-kt-ecommerce-store-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Stores" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card title-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                    <div class="w-100 mw-150px">
                        <!--begin::Select2-->
                        <select name="status" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-store-filter="status">
                            <option></option>
                            <option value="all">All</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <!--end::Select2-->
                    </div>
                </div>
                <!--begin::Card toolbar-->

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <x-store-list :data :url></x-store-list>
            <!--end::Card body-->
        </div>
    </div>

    <!--end::Container-->
    @push('scripts')
    <script src="{{ asset('assets/js/custom/apps/user-management/partner-user/list/store-list.js')}}"></script>
    @endpush
@endsection
