<div class="card pt-4 mb-6 mb-xl-9">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>{{__('messages.seller')}}</h2>
        </div>
        <!--end::Card title-->

    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0 pb-5">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed gy-5" id="kt_table_seller_list" data-table-url="{{ $url ?? ''}}">
            <!--begin::Table head-->
            <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                <!--begin::Table row-->
                <tr class="text-start text-muted text-uppercase gs-0">
                    <th class="min-w-100px">{{__('messages.name')}}</th>
                    <th>{{__('messages.email')}}</th>
                    <th>{{__('messages.store_name')}}</th>
                    <th>{{__('messages.status')}}</th>
                    <th class="min-w-100px">{{__('messages.date')}}</th>
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

