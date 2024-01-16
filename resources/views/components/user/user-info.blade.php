<div class="d-flex flex-center flex-column py-5">
    <!--begin::Avatar-->
    <div class="symbol symbol-100px symbol-circle mb-7">
        @if ($user->profile_photo_url)
            <img src="{{ $user->getProfilePicPath() }}" alt="image" />
        @else
            <div
                class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $user->name) }}">
                {{ substr($user->name, 0, 1) }}
            </div>
        @endif
    </div>
    <!--end::Avatar-->
    <!--begin::Name-->
    <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $user->name ?? '' }}</a>
    <!--end::Name-->
    <!--begin::Position-->
    <div class="mb-9">
        <!--begin::Badge-->
        <div class="badge badge-lg badge-light-primary d-inline">{{ ucwords($user->roles->first()?->name) ?? '' }}</div>
        <!--begin::Badge-->

    </div>
    <div class="d-flex">
        <div class=" badge badge-light-{{ getStatusClass($user->status) ?? '' }} fw-bolder">{{ $user->status ?? '' }}
            &nbsp;&nbsp;
        </div>
        @if ($user->status == 'pending')
            <a class="badge badge-light-success fs-base" data-kt-user-name="{{ $user->name ?? ''}}" title="Approve" href="{{ route('user-management.users.update_status',$user->id)}}" data-kt-user-id="{{ $user->id }}" data-kt-action="update_status">
                {{ __('messages.approve') }}</a>
        @endif
    </div>
    <!--end::Position-->
</div>
