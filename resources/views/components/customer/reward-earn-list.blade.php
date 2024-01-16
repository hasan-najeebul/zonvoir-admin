<table id="kt_customer_view_reward_earn_list"
    class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4 dataTable no-footer" data-table-url="{{route('user-management.customer.reward-earn',$user->id)}}">
    <!--begin::Table head-->
    <thead class="border-bottom border-gray-200">
        <!--begin::Table row-->
        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
            <th class="w-125px">{{ __('messages.product')}}</th>
            <th class="w-100px sorting">{{ __('messages.earn_point')}} </th>
            <th class="w-100px sorting">{{ __('messages.expiry')}}</th>
            <th class="w-100px sorting">{{ __('messages.date_created')}}</th>
            {{-- <th class="w-100px text-end pe-7 sorting_disabled">Invoice</th> --}}
        </tr>
        <!--end::Table row-->
    </thead>
    <!--end::Table head-->
</table>
