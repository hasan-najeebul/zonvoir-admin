<div class="card pt-4 mb-6 mb-xl-9">
    <!--begin::Card body-->
    <div class="card-body pt-0 pb-5">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed gy-5" id="kt_table_partner_stores" data-table-url="{{ $url ?? ''}}">
            <!--begin::Table head-->
            <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                <!--begin::Table row-->
                <tr class="text-start text-muted text-uppercase gs-0">
                    <th class="min-w-100px">{{__('messages.store_name')}}</th>
                    <th>{{__('messages.project_manager')}}</th>
                    <th>{{__('messages.seller')}}</th>
                    <th>{{__('messages.mobile_number')}}</th>
                    <th>{{__('messages.status')}}</th>
                    <th class="min-w-100px">{{__('messages.date')}}</th>
                    <th class="min-w-100px pe-4">{{__('messages.actions')}}</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->

        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>

