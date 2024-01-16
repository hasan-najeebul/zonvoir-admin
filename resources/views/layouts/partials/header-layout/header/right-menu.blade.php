<div class="d-flex align-items-stretch justify-self-end flex-shrink-0">
    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
            data-kt-menu-placement="bottom-end">
            @if(auth()->user()->profile_photo_url)
                <img src="{{ auth()->user()->getProfilePicPath() }}" alt="image"/>
            @else
                <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', auth()->user()->name) }}">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
            @endif
        </div>

        <!--begin::User account menu-->
        <x-header.user-account-menu></x-header.user-account-menu>
        <!--end::User account menu-->
        <!--end::Menu wrapper-->
    </div>
</div>
