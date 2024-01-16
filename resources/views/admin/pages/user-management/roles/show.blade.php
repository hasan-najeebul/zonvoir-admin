@extends('layouts.master')
@section('content')

@section('title')
    {{ __('messages.roles') }}
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('user-management.roles.show', $role) }}
@endsection
<!--begin::Content container-->
<div id="kt_app_content_container" class="app-container container-xxl" url="{{ route('user-management.roles.roleUser',$role)}}">
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
            <!--begin::Card-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="mb-0">{{ ucwords($role->name) }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Permissions-->
                    <div class="d-flex flex-column text-gray-600">
                        @foreach ($role->permissions as $permission)
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>
                                {{ ucfirst($permission->name) }}
                            </div>
                        @endforeach

                        @if ($role->permissions->count() === 0)
                            <div class="d-flex align-items-center py-2">
                                <span class='bullet bg-primary me-3'></span>
                                <em>{{ __('messages.no_permission_given') }}</em>
                            </div>
                        @endif
                    </div>
                    <!--end::Permissions-->
                </div>
                <!--end::Card body-->
                <!--begin::Card footer-->
                {{-- <div class="card-footer pt-0">
                    <button type="button" class="btn btn-light btn-active-primary" data-role-id="{{ $role->name }}"
                        data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">Edit Role</button>
                </div> --}}
                <!--end::Card footer-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-10">
            <!--begin::Card-->
            <div class="card card-flush mb-6 mb-xl-9">
                <!--begin::Card header-->
                <div class="card-header pt-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="d-flex align-items-center">{{ __('messages.user_assigned') }}
                            <span class="text-gray-600 fs-6 ms-1">({{ $role->users->count() }})</span>
                        </h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <div class="table-responsive">
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <!-- <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                    </div>
                                </th> -->
                                <th class="min-w-125px">{{ __('messages.user')}}</th>
                                {{-- <th class="min-w-125px">{{ __('messages.role')}}</th> --}}
                                <th class="min-w-125px">{{ __('messages.status')}}</th>
                                <th class="min-w-125px">{{ __('messages.date_created')}}</th>
                                <th class="text-end min-w-100px">{{ __('messages.actions')}}</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                    </div>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout-->
</div>
<!--end::Content container-->
<!--begin::Modal-->
<!--begin::Modal - Update role-->
@include('admin.pages.user-management.roles.modals.update')
<!--end::Modal - Update role-->
<!--end::Modal-->
@push('scripts')
    <script src="{{ asset('assets/js/custom/apps/user-management/roles/view/view.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/user-management/roles/list/update-role.js') }}"></script>
@endpush
@endsection
