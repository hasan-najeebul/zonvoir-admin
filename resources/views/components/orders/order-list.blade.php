<table class="table align-middle table-row-dashed gy-5 dataTable no-footer" id="kt_table_customers_orders" data-table-url="{{ $url ?? ''}}">
    <!--begin::Table head-->
    <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
        <!--begin::Table row-->
        <tr class="text-start text-muted text-uppercase gs-0">
            <th class="min-w-80px">{{ __('messages.order_id')}}</th>
            <th class="min-w-120px">{{ __('messages.customer')}}</th>
            <th class="">{{ __('messages.total')}}</th>
            <th class="">{{ __('messages.status')}}</th>
            <th class="min-w-100px">{{ __('messages.date_created')}}</th>
            <th class="min-w-100px">{{ __('messages.actions')}}</th>
        </tr>
        <!--end::Table row-->
    </thead>
    <!--end::Table head-->

</table>
