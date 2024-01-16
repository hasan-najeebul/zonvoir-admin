@extends('layouts.master')
@section('content')

    @section('title')
    {{ __('messages.permissions')}}
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('user-management.permissions.index') }}
    @endsection

<!--begin::Container-->
<div id="kt_content_container" class="container-xxl" url="{{ route('user-management.permissions.index')}}">
    <!--begin::Card-->
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header mt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1 me-5">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-permissions-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Permissions" name="search">
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Button-->
                <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_permission">
                <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon--> {{ __('messages.add_permission')}}</button>
                <!--end::Button-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px"> {{ __('messages.name')}}</th>
                        {{-- <th class="min-w-250px"> {{ __('messages.assigned_to')}}</th> --}}
                        <th class="min-w-125px"> {{ __('messages.date_created')}}</th>
                        <th class="text-end min-w-100px"> {{ __('messages.actions')}}</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    <!--begin::Modals-->
    <!--begin::Modal - Add permissions-->
    @include('admin.pages.user-management.permissions.modals.add')
    <!--end::Modal - Add permissions-->
    <!--begin::Modal - Update permissions-->
    @include('admin.pages.user-management.permissions.modals.update')
    <!--end::Modal - Update permissions-->
    <!--end::Modals-->
</div>
<!--end::Container-->
@push('scripts')

    <script src="{{ asset('assets/js/custom/apps/user-management/permissions/update-permission.js')}}"></script>
    <script src="{{ asset('assets/js/custom/apps/user-management/permissions/add-permission.js')}}"></script>
    <script src="{{ asset('assets/js/custom/apps/user-management/permissions/list.js')}}"></script>
@endpush
@endsection
