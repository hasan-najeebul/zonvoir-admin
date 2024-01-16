@extends('layouts.master')

@section('title')
    {{ __('messages.users') }}
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('user-management.users.index') }}
@endsection

@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl" url="{{ route('user-management.users.index') }}">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="black" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" name="search" data-kt-user-table-filter="search"
                            class="form-control form-control-solid w-250px ps-14"
                            placeholder="{{ __('messages.search_user') }}" />
                    </div>
                    <!--end::Search-->
                </div>
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                    <div class="w-100 mw-150px">
                        <!--begin::Select2-->
                        @include('admin.inc._user_status')
                        <!--end::Select2-->
                    </div>
                    <div class="w-100 mw-150px">
                        <!--begin::Select2-->
                        <select name="user_role" class="form-select form-select-solid" data-control="select2"
                            data-hide-search="true" data-placeholder="Roles" data-kt-user-table-filter="role">
                            <option>{{ __('messages.all') }}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ ucwords($role->name) }}</option>
                            @endforeach
                        </select>
                        <!--end::Select2-->
                    </div>
                    <!--begin::Add user-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_user">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                    transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black">
                                </rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->{{ __('messages.adduser') }}</button>
                    <!--end::Add user-->
                </div>

                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <!-- <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                </div>
                            </th> -->
                                <th class="min-w-125px">{{ __('messages.user') }}</th>
                                <th class="min-w-125px">{{ __('messages.role') }}</th>
                                <th class="min-w-125px">{{ __('messages.status') }}</th>
                                <th class="min-w-125px">{{ __('messages.date_created') }}</th>
                                <th class="text-end min-w-100px">{{ __('messages.actions') }}</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>

                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            @include('admin.pages.user-management.users.modals._add-user')
        </div>

        <!--end::Container-->
        @push('scripts')
            <script src="{{ asset('assets/js/custom/apps/user-management/users/list/add.js') }}"></script>
            <script src="{{ asset('assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
        @endpush
    @endsection
