<div id="kt_user_view_details" class="collapse show">
    <div class="pb-5 fs-6">
        <!--begin::Details item-->
        <div class="fw-bolder mt-5">{{ __('messages.account_id') }}</div>
        <div class="text-gray-600">ID-{{ $user->id ?? '' }}</div>
        <!--begin::Details item-->
        <!--begin::Details item-->
        <div class="fw-bolder mt-5">{{ __('messages.email') }}</div>
        <div class="text-gray-600">
            <a href="#" class="text-gray-600 text-hover-primary">{{ $user->email ?? '' }}</a>
        </div>
        <!--begin::Details item-->
        @if (isset($user->address->street) || isset($user->address->street) || isset($user->address->city))
            <div class="fw-bolder mt-5">{{ __('messages.address') }}</div>
            <div class="text-gray-600">{{ $user->address->house_no ?? '' }},
                <br />{{ $user->address->street ?? '' }}
                <br />{{ $user->address->city ?? '' }}, {{ $user->address->postal_code ?? '' }}
            </div>
        @endif
        <!--begin::Details item-->
        <!--begin::Details item-->
        <div class="fw-bolder mt-5">{{ __('messages.status') }}</div>
        <div class="badge badge-light-info fw-bolder">{{ ucfirst($user->status) ?? '' }}</div>
        <!--begin::Details item-->
    </div>
</div>
