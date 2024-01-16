<div class="card mb-6 mb-xl-9">
    <!--begin::Header-->
    <div class="card-header">
        <!--begin::Title-->
        <div class="card-title">
            <h2>{{ __('messages.statement')}}</h2>
        </div>
        <!--end::Title-->
        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <!--begin::Tab nav-->
            <ul class="nav nav-stretch fs-5 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary active" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_1">{{ __('messages.account_id')}}</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_2">2020</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_3">2019</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_4">2018</a>
                </li>
            </ul>
            <!--end::Tab nav-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->
    <!--begin::Card body-->
    <div class="card-body pb-5">
        <!--begin::Tab Content-->
        <div id="kt_customer_view_statement_tab_content" class="tab-content">
            <!--begin::Tab panel-->
            <div id="kt_customer_view_statement_1" class="py-0 tab-pane fade show active" role="tabpanel">
                <!--begin::Table-->
                <table id="kt_customer_view_statement_table_1" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                    <!--begin::Table head-->
                    <thead class="border-bottom border-gray-200">
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="w-125px">{{ __('messages.date')}}</th>
                            <th class="w-100px">{{__('messages.order_id')}}</th>
                            <th class="w-300px">{{__('messages.details')}}</th>
                            <th class="w-100px">{{__('messages.amount')}}</th>
                            <th class="w-100px text-end pe-7">{{__('messages.invoice')}}</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        <tr>
                            <td>Nov 01, 2021</td>
                            <td>
                                <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                            </td>
                            <td>Darknight transparency 36 Icons Pack</td>
                            <td class="text-success">$38.00</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                            </td>
                        </tr>
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Tab panel-->
            <!--begin::Tab panel-->
            <div id="kt_customer_view_statement_2" class="py-0 tab-pane fade" role="tabpanel">
                <!--begin::Table-->
                <table id="kt_customer_view_statement_table_2" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                    <!--begin::Table head-->
                    <thead class="border-bottom border-gray-200">
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="w-125px">Date</th>
                            <th class="w-100px">Order ID</th>
                            <th class="w-300px">Details</th>
                            <th class="w-100px">Amount</th>
                            <th class="w-100px text-end pe-7">Invoice</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        <tr>
                            <td>May 30, 2020</td>
                            <td>
                                <a href="#" class="text-gray-600 text-hover-primary">523445943</a>
                            </td>
                            <td>Seller Fee</td>
                            <td class="text-danger">$-1.30</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                            </td>
                        </tr>
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Tab panel-->
            <!--begin::Tab panel-->
            <div id="kt_customer_view_statement_3" class="py-0 tab-pane fade" role="tabpanel">
                <!--begin::Table-->
                <table id="kt_customer_view_statement_table_3" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                    <!--begin::Table head-->
                    <thead class="border-bottom border-gray-200">
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="w-125px">Date</th>
                            <th class="w-100px">Order ID</th>
                            <th class="w-300px">Details</th>
                            <th class="w-100px">Amount</th>
                            <th class="w-100px text-end pe-7">Invoice</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        <tr>
                            <td>Feb 09, 2019</td>
                            <td>
                                <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                            </td>
                            <td>Visual Design Illustration</td>
                            <td class="text-success">$31.00</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                            </td>
                        </tr>

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Tab panel-->
            <!--begin::Tab panel-->
            <div id="kt_customer_view_statement_4" class="py-0 tab-pane fade" role="tabpanel">
                <!--begin::Table-->
                <table id="kt_customer_view_statement_table_4" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                    <!--begin::Table head-->
                    <thead class="border-bottom border-gray-200">
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="w-125px">Date</th>
                            <th class="w-100px">Order ID</th>
                            <th class="w-300px">Details</th>
                            <th class="w-100px">Amount</th>
                            <th class="w-100px text-end pe-7">Invoice</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        <tr>
                            <td>Nov 01, 2018</td>
                            <td>
                                <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                            </td>
                            <td>Darknight transparency 36 Icons Pack</td>
                            <td class="text-success">$38.00</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                            </td>
                        </tr>
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Tab panel-->
        </div>
        <!--end::Tab Content-->
    </div>
    <!--end::Card body-->
</div>
