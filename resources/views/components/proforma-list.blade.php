<div class="card pt-4 mb-6 mb-xl-9">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>{{__('messages.proforma_list')}}</h2>
        </div>
        <!--end::Card title-->

    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0 pb-5">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed gy-5" id="kt_table_partner_proforma" data-table-url="{{ route('user-management.proforma-list',$user->id)}}">
            <!--begin::Table head-->
            <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                <!--begin::Table row-->
                <tr class="text-start text-muted text-uppercase gs-0">
                    <th class="min-w-100px">{{__('messages.name')}}</th>
                    <th class="min-w-100px">{{__('messages.proforma_id')}}</th>
                    <th class="min-w-100px">{{__('messages.amount')}}</th>
                    <th class="min-w-80px">{{__('messages.status')}}</th>
                    <th class="min-w-80px">{{__('messages.expirydate')}}</th>
                    <th class="min-w-100px">{{__('messages.date')}}</th>
                    {{-- <th class="text-end min-w-100px pe-4">{{__('messages.actions')}}</th> --}}
                </tr>
                <!--end::Table row-->
            </thead>

        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>

