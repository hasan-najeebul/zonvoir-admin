<div class="card pt-4 mb-6 mb-xl-9">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title">
            <h2 class="fw-bolder">{{ __('messages.total_points')}}</h2>
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <div class="fw-bolder fs-2">{{ $userPoint->total_points ?? ''}}
            <span class="text-muted fs-4 fw-bold">{{ __('messages.points')}}</span>
            {{-- <div class="fs-7 fw-normal text-muted">Balance will increase the amount due on the
                customer's next invoice.</div> --}}
        </div>
    </div>
    <!--end::Card body-->
</div>
