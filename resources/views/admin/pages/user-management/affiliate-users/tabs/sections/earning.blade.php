<div class="card mb-6 mb-xl-9">
    <!--begin::Header-->
    <div class="card-header border-0">
        <div class="card-title">
            <h2>{{__('messages.earning')}}</h2>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        <div class="fs-5 fw-bold text-gray-500 mb-4">{{__('messages.last_30_days_earning')}}</div>
        <!--begin::Left Section-->
        <div class="d-flex flex-wrap flex-stack mb-5">
            <!--begin::Row-->
            <div class="d-flex flex-wrap">
                <!--begin::Col-->
                <div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
                    <span class="fs-1 fw-bolder text-gray-800 lh-1">
                        <span data-kt-countup="true" data-kt-countup-value="6,840" data-kt-countup-prefix="$">0</span>
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                        <span class="svg-icon svg-icon-1 svg-icon-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="fs-6 fw-bold text-muted d-block lh-1 pt-2">{{__('messages.net_earning')}}</span>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
                    <span class="fs-1 fw-bolder text-gray-800 lh-1">
                    <span class="" data-kt-countup="true" data-kt-countup-value="16">0</span>%
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                            <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon--></span>
                    <span class="fs-6 fw-bold text-muted d-block lh-1 pt-2">{{__('messages.change')}}</span>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
                    <span class="fs-1 fw-bolder text-gray-800 lh-1">
                        <span data-kt-countup="true" data-kt-countup-value="1,240" data-kt-countup-prefix="$">0</span>
                        <span class="text-primary">--</span>
                    </span>
                    <span class="fs-6 fw-bold text-muted d-block lh-1 pt-2">{{__('messages.fees')}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <a href="#" class="btn btn-sm btn-light-primary flex-shrink-0">{{__('messages.widraw_earning')}}</a>
        </div>
        <!--end::Left Section-->
    </div>
    <!--end::Body-->
</div>
