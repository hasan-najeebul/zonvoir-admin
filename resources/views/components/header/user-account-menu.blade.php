<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px me-5">
                <img alt="Logo" src="{{ asset('assets/media/avatars/300-1.jpg')}}" />
            </div>
            <!--end::Avatar-->
            <!--begin::Username-->
            <div class="d-flex flex-column">
                <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name ?? ''}}
                {{-- <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span> --}}
                </div>
                <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email ?? ''}}</a>
            </div>
            <!--end::Username-->
        </div>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ route('user-management.users.show',auth()->user()->id)}}" class="menu-link px-5">{{ __('messages.my_profile')}}</a>
    </div>

    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    {{-- <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
        <a href="#" class="menu-link px-5">
            <span class="menu-title position-relative">Language
            <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
            <img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('assets/media/flags/united-states.svg')}}" alt="" /></span></span>
        </a>
        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-dropdown w-175px py-4">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="../../demo8/dist/account/settings.html" class="menu-link d-flex px-5 active">
                <span class="symbol symbol-20px me-4">
                    <img class="rounded-1" src="{{ asset('assets/media/flags/united-states.svg')}}" alt="" />
                </span>English</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="../../demo8/dist/account/settings.html" class="menu-link d-flex px-5">
                <span class="symbol symbol-20px me-4">
                    <img class="rounded-1" src="{{ asset('assets/media/flags/spain.svg')}}" alt="" />
                </span>Spanish</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="../../demo8/dist/account/settings.html" class="menu-link d-flex px-5">
                <span class="symbol symbol-20px me-4">
                    <img class="rounded-1" src="{{ asset('assets/media/flags/germany.svg')}}" alt="" />
                </span>German</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="../../demo8/dist/account/settings.html" class="menu-link d-flex px-5">
                <span class="symbol symbol-20px me-4">
                    <img class="rounded-1" src="{{ asset('assets/media/flags/japan.svg')}}" alt="" />
                </span>Japanese</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="../../demo8/dist/account/settings.html" class="menu-link d-flex px-5">
                <span class="symbol symbol-20px me-4">
                    <img class="rounded-1" src="{{ asset('assets/media/flags/france.svg')}}" alt="" />
                </span>French</a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu sub-->
    </div> --}}
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">

        <a class="menu-link px-5" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->

    <!--end::Menu item-->
</div>
