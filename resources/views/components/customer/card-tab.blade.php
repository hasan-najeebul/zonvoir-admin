<div id="kt_customer_view_payment_method" class="card-body pt-0">
    <!--begin::Option-->
    @if ($cards)
        @foreach ($cards as $key => $card)
            <div class="py-0" data-kt-customer-payment-method="row">
                <!--begin::Header-->
                <div class="py-3 d-flex flex-stack flex-wrap">
                    <!--begin::Toggle-->
                    <div class="d-flex align-items-center collapsible rotate collapsed" data-bs-toggle="collapse"
                        href="#kt_customer_view_payment_method_{{ $key }}" role="button" aria-expanded="false"
                        aria-controls="kt_customer_view_payment_method_{{ $key }}">
                        <!--begin::Arrow-->
                        <div class="me-3 rotate-90">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Arrow-->
                        <!--begin::Logo-->
                        @if ($card->qr_code)
                            <img src="{{ asset('public/storage/'.$card->qr_code)}}" class="w-40px me-3" alt="">
                        @endif

                        <!--end::Logo-->
                        <!--begin::Summary-->
                        <div class="me-3">
                            <div class="d-flex align-items-center">
                                <div class="text-gray-800 fw-bolder">{{ $card->card_holder_name ?? '' }}</div>
                                <div class="badge badge-light-primary ms-5">{{ __('messages.primary')}}</div>
                            </div>
                            <div class="text-muted">{{ __('messages.expiries')}} {{ $card->valid_thru ?? '' }}</div>
                        </div>
                        <!--end::Summary-->
                    </div>
                    <!--end::Toggle-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div id="kt_customer_view_payment_method_{{ $key }}" class="collapse fs-6 ps-10"
                    data-bs-parent="#kt_customer_view_payment_method">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap py-5">
                        <!--begin::Col-->
                        <div class="flex-equal me-5">
                            <table class="table table-flush fw-bold gy-1">

                                <tbody>
                                    <tr>
                                        <td class="text-muted min-w-125px w-125px">{{ __('messages.name') }}</td>
                                        <td class="text-gray-800">{{ $card->card_holder_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted min-w-125px w-125px">{{ __('messages.number') }}</td>
                                        <td class="text-gray-800">{{ $card->card_number ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted min-w-125px w-125px">{{ __('messages.expiries') }}</td>
                                        <td class="text-gray-800">{{ $card->valid_thru ?? '' }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="text-muted min-w-125px w-125px">Type</td>
                                        <td class="text-gray-800">Mastercard credit card</td>
                                    </tr> --}}
                                    {{-- <tr>
                                        <td class="text-muted min-w-125px w-125px">Issuer</td>
                                        <td class="text-gray-800">VICBANK</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Body-->
            </div>
        @endforeach

    @endif
    <!--end::Option-->
    <div class="separator separator-dashed"></div>
</div>
