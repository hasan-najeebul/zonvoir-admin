<div class="card pt-4 mb-6 mb-xl-9">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>{{__('messages.products')}}</h2>
        </div>
        <!--end::Card title-->

    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0 pb-5">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed gy-5" id="kt_table_partner_products" data-table-url="{{ $url ?? ''}}">
            <!--begin::Table head-->
            <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                <!--begin::Table row-->
                <tr class="text-start text-muted text-uppercase gs-0">
                    <th class="min-w-200px">{{__('messages.product')}}</th>
                    <th class="min-w-80px">{{__('messages.sku')}}</th>
                    <th class="min-w-50px">{{__('messages.qty')}}</th>
                    <th class="min-w-100px">{{__('messages.points')}}</th>
                    <th class="min-w-80px">{{__('messages.status')}}</th>
                    <th class="min-w-100px">{{__('messages.date_created')}}</th>
                    <th class="min-w-100px">{{__('messages.created_by')}}</th>
                    <th class="min-w-100px">{{__('messages.actions')}}</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->

        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
