@extends('layouts.master')
@section('content')

@section('title')
    {{ __('messages.roles') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('user-management.roles.index') }}
@endsection

<!--begin::Container-->
<div id="kt_content_container" class="container-xxl">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
        @foreach ($roles as $role)

            <!--begin::Col-->
            <div class="col-md-4">
                <!--begin::Card-->
                <div class="card card-flush h-md-100">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{ ucwords($role->name) }}</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-1">
                        <!--begin::Users-->
                        <div class="fw-bold text-gray-600 mb-5">{{ __('messages.total_user_this_role') }}
                            {{ $role->users->count() }}</div>
                        <!--end::Users-->
                        <!--begin::Permissions-->
                        <div class="d-flex flex-column text-gray-600">
                            @foreach ($role->permissions->take(5) ?? [] as $permission)
                                <div class="d-flex align-items-center py-2">
                                    <span class="bullet bg-primary me-3"></span>{{ ucfirst($permission->name) }}
                                </div>
                            @endforeach
                            @if ($role->permissions->count() > 5)
                                <div class='d-flex align-items-center py-2'>
                                    <span class='bullet bg-primary me-3'></span>
                                    <em>and {{ $role->permissions->count() - 5 }} more...</em>
                                </div>
                            @endif
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

                    <div class="card-footer flex-wrap pt-0">
                        <a href="{{ route('user-management.roles.show', $role) }}"
                            class="btn btn-light btn-active-primary my-1 me-2">{{ __('messages.view_role') }}</a>
                        @if (!in_array($role->name,['Project Manager','Customer','Seller','Partner']))
                            <a href="javascript:void"
                                onclick="DeleteRole('{{ route('user-management.roles.destroy', $role->id) }}')"
                                class="btn btn-light btn-active-primary my-1 me-2">{{ __('messages.delete_role') }}</a>
                                <button type="button" class="btn btn-light btn-active-light-primary my-1"
                                data-role-id="{{ $role->name }}" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_update_role"
                                onclick="EditRole('{{ route('user-management.roles.edit', $role) }}','{{ route('user-management.roles.update', $role) }}')">{{ __('messages.edit_role') }}
                            </button>
                        @endif


                    </div>
                    <!--end::Card footer-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
        @endforeach

        <!--begin::Add new card-->
        <div class="ol-md-4">
            <!--begin::Card-->
            <div class="card h-md-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center">
                    <!--begin::Button-->
                    <button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_role">
                        <!--begin::Illustration-->

                        <!--end::Illustration-->
                        <!--begin::Label-->
                        <div class="fw-bold fs-3 text-gray-600 text-hover-primary">{{ __('messages.add_new_role') }}
                        </div>
                        <!--end::Label-->
                    </button>
                    <!--begin::Button-->
                </div>
                <!--begin::Card body-->
            </div>
            <!--begin::Card-->
        </div>
        <!--begin::Add new card-->
    </div>
    <!--begin::Modals-->
    <!--begin::Modal - Add role-->
    @include('admin.pages.user-management.roles.modals.add')
    <!--end::Modal - Add role-->
    <!--begin::Modal - Update role-->
    @include('admin.pages.user-management.roles.modals.update')
    <!--end::Modal - Update role-->
    <!--end::Modals-->
</div>
<!--end::Container-->
@push('scripts')
    <script>
        const form = document.querySelector('#kt_modal_update_role_form');
        const EditRole = (Url, updateUrl) => {
            $.ajax({
                type: "GET",
                url: Url,
                dataType: "json",
                cache: false,
                success: function(modaldata) {
                    // toastr.success('Success messages');
                    form.reset();
                    $('#kt_modal_update_role_form').html(modaldata.html);
                    form.action = updateUrl;
                    KTUsersUpdatePermissions.init();
                    handleSelectAll(form);

                },
                error: function(modaldata) {
                    toastr.error('errors messages');
                    console.log('dfsd');
                }
            });
        }
        const DeleteRole = (Url) => {
            $.ajax({
                type: "DELETE",
                url: Url,
                dataType: "json",
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(modaldata) {
                    Swal.fire({
                        text: "Deleted successfully",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            // modal.hide();
                            location.reload();
                        }
                    });
                },
                error: function(modaldata) {
                    toastr.error('errors messages');
                    console.log('dfsd');
                }
            });
        }

        // Select all handler
        const handleSelectAll = (form) => {
            // Define variables
            const selectAll = form.querySelector('#kt_roles_select_all');
            const allCheckboxes = form.querySelectorAll('[type="checkbox"]');

            // Handle check state
            selectAll.addEventListener('change', e => {

                // Apply check state to all checkboxes
                allCheckboxes.forEach(c => {
                    c.checked = e.target.checked;
                });
            });
        }
    </script>
    <script src="{{ asset('assets/js/custom/apps/user-management/roles/list/update-role.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/user-management/roles/list/add.js') }}"></script>
@endpush
@endsection
