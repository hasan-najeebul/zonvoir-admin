<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    {{ __('messages.actions')}}
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="javascript::void(0)" data-kt-permission-edit-url="{{ route('user-management.permissions.update', $permission->id) }}" class="menu-link px-3" data-kt-permissions-table-filter="edit_row">
            {{ __('messages.edit')}}
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="{{ route('user-management.permissions.destroy',$permission->id)}}" class="menu-link px-3" data-kt-permission-id="{{ $permission->id }}" data-kt-permissions-table-filter="delete_row">
            {{ __('messages.delete')}}
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->