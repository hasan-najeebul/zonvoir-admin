<div class="row mb-7">
    <!--begin::Details item-->
    <h3 class="d-flex align-items-center fs-5 fw-bolder mb-5">{{ __('messages.business_name')}}</h3>
    <p class="fs-6 text-gray-600 fw-bold mb-6">{{ $user->userBusiness->business_name ?? '' }}%</p>
    <!--end::Details item-->
    <!--begin::Details item-->
    <h3 class="d-flex align-items-center fs-5 fw-bolder mb-5">{{ __('messages.industry')}}</h3>
    <p class="fs-6 text-gray-600 fw-bold mb-6">{{  $user->userBusiness->industry ?? '' }}</p>
    <!--end::Details item-->
    <!--begin::Details item-->
    @isset($user->userBusiness->website)
        <h3 class="d-flex align-items-center fs-5 fw-bolder mb-5">{{ __('messages.website')}}</h3>
        <p class="fs-6 text-gray-600 fw-bold mb-6"><a href="{{ $user->userBusiness->website ?? '' }}">{{ $user->userBusiness->website ?? '' }}</a></p>
    @endisset
    <!--end::Details item-->
    <!--begin::Details item-->
    @isset($user->userBusiness->description)
        <h3 class="d-flex align-items-center fs-5 fw-bolder mb-5">{{ __('messages.description')}}</h3>
        <p class="fs-6 text-gray-600 fw-bold mb-6">{{ $user->userBusiness->description ?? '' }}</p>
    @endisset
    <!--end::Details item-->
</div>
