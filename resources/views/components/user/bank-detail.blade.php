
<div id="kt_user_view_bank_details" class="collapse show">
    <div class="pb-5 fs-6">
        <!--begin::Details item-->
        <div class="fw-bolder mt-5">{{ __('messages.bank_name') }}</div>
        <div class="text-gray-600">{{ $user->bankDetails->bank_name ?? '' }}</div>
        <!--begin::Details item-->
        <!--begin::Details item-->
        <div class="fw-bolder mt-5">{{ __('messages.account_number') }}</div>
        <div class="text-gray-600">
            <a href="#" class="text-gray-600 text-hover-primary">{{ $user->bankDetails->account_number ?? '' }}</a>
        </div>
    </div>
</div>
