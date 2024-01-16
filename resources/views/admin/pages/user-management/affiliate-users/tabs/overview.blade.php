<div class="card pt-4 mb-6 mb-xl-9">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>{{__('messages.payment_record')}}</h2>
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Filter-->
            <button type="button" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
            <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
            <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->{{__('messages.add_payment')}}</button>
            <!--end::Filter-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0 pb-5">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
            <!--begin::Table head-->
            <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                <!--begin::Table row-->
                <tr class="text-start text-muted text-uppercase gs-0">
                    <th class="min-w-100px">{{__('messages.invoice_no')}}</th>
                    <th>{{__('messages.status')}}</th>
                    <th>{{__('messages.amount')}}</th>
                    <th class="min-w-100px">{{__('messages.date')}}</th>
                    <th class="text-end min-w-100px pe-4">{{__('messages.actions')}}</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fs-6 fw-bold text-gray-600">
                <!--begin::Table row-->
                <tr>
                    <!--begin::Invoice=-->
                    <td>
                        <a href="#" class="text-gray-600 text-hover-primary mb-1">1934-1012</a>
                    </td>
                    <!--end::Invoice=-->
                    <!--begin::Status=-->
                    <td>
                        <span class="badge badge-light-success">Successful</span>
                    </td>
                    <!--end::Status=-->
                    <!--begin::Amount=-->
                    <td>$1,200.00</td>
                    <!--end::Amount=-->
                    <!--begin::Date=-->
                    <td>14 Dec 2020, 8:43 pm</td>
                    <!--end::Date=-->
                    <!--begin::Action=-->
                    <td class="pe-0 text-end">
                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon--></a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="../../demo8/dist/apps/customers/view.html" class="menu-link px-3">View</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </td>
                    <!--end::Action=-->
                </tr>
                <!--end::Table row-->
            </tbody>
            <!--end::Table body-->
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
