<div class="row mb-7">
    <!--begin::Details item-->
    <h3 class="d-flex align-items-center fs-5 fw-bolder mb-5">{{ __('messages.commission')}}</h3>
    <p class="fs-6 text-gray-600 fw-bold mb-6">{{ $user->affiliate->commission ?? '' }}%</p>
    <!--end::Details item-->
    <!--begin::Details item-->
    <h3 class="d-flex align-items-center fs-5 fw-bolder mb-5">{{ __('messages.affiliate_code')}}</h3>
    <p class="fs-6 text-gray-600 fw-bold mb-6">{{  $user->affiliate->affiliate_code ?? '' }}</p>
    <!--end::Details item-->
    <!--begin::Details item-->
    <h3 class="d-flex align-items-center fs-5 fw-bolder mb-5">{{ __('messages.affiliate_link')}}</h3>
    <p class="fs-6 text-gray-600 fw-bold mb-6"><a href="{{ $user->affiliate->affiliate_link ?? '' }}">{{ $user->affiliate->affiliate_link ?? '' }}</a></p>
    <!--end::Details item-->
    <!--begin::Details item-->
    <h3 class="d-flex align-items-center fs-5 fw-bolder mb-5">{{ __('messages.website_link')}}</h3>
    <p class="fs-6 text-gray-600 fw-bold mb-6"><a href="{{ $user->affiliate->affiliate_website_link ?? '' }}">{{ $user->affiliate->affiliate_website_link ?? '' }}</a></p>
    <!--end::Details item-->
</div>
