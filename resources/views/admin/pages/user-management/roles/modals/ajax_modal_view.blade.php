
<!--begin::Scroll-->
<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true"
    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
    data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll"
    data-kt-scroll-offset="300px">
    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <!--begin::Label-->
        <label class="fs-5 fw-bolder form-label mb-2">
            <span class="required">{{ __('messages.role_name')}} </span>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <input class="form-control form-control-solid" placeholder="Enter a role name" name="name"
            value="{{ $role->name ?? ''}}" />
        <!--end::Input-->
    </div>
    <!--end::Input group-->
    <!--begin::Permissions-->
    <div class="fv-row">
        <!--begin::Label-->
        <label class="fs-5 fw-bolder form-label mb-2">{{ __('messages.role_permissions')}}</label>
        <!--end::Label-->
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                    <!--begin::Table row-->
                    <tr>
                        <td class="text-gray-800">{{__('messages.administrator_access')}}
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title="Allows a full access to the system"></i>
                        </td>
                        <td>
                            <!--begin::Checkbox-->
                            <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="kt_roles_select_all" />
                                <span class="form-check-label" for="kt_roles_select_all">{{ __('messages.select_all')}}</span>
                            </label>
                            <!--end::Checkbox-->
                        </td>
                    </tr>
                    @php $rolePermission = array_column($role->permissions->toArray(),'id') @endphp

                    <!--end::Table row-->
                    @foreach ($permissions_by_group as $group => $permissions)
                        <!--begin::Table row-->
                        <tr>
                            <!--begin::Label-->
                            <td class="text-gray-800">{{ ucwords($group) }}</td>
                            <!--end::Label-->
                            <!--begin::Input group-->
                            @foreach ($permissions as $permission)

                                <td>

                                    <!--begin::Wrapper-->
                                    <div class="d-flex">
                                        <!--begin::Checkbox-->
                                        <label
                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                            <input class="form-check-input" name="permission[]" type="checkbox"
                                                value="{{ $permission->name }}" @if(in_array($permission->id,$rolePermission)) {{ 'checked'}} @endif>
                                            <span
                                                class="form-check-label">{{ ucwords(Str::replace($group . '-', '', $permission->name)) }}</span>
                                        </label>
                                        <!--end::Checkbox-->
                                    </div>
                                    <!--end::Wrapper-->
                            @endforeach
                            </td>

                            <!--end::Input group-->

                        </tr>
                    @endforeach
                    <!--end::Table row-->
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Permissions-->
</div>
<!--end::Scroll-->
<!--begin::Actions-->
<div class="text-center pt-15">
    <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">{{ __('messages.discard')}}</button>
    <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
        <span class="indicator-label">{{ __('messages.submit')}}</span>
        <span class="indicator-progress">{{__('messages.please_wait')}}
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    </button>
</div>
<!--end::Actions-->

