<div class="d-flex align-items-center">
    <!--begin:: Avatar -->
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{ route('user-management.users.show', $order->user->id)}}">
            @if($order->user->profile_photo_url)
                <div class="symbol-label">
                    <img src="{{ $order->user->getProfilePicPath() }}" class="w-100"/>
                </div>
            @else
            <div class="symbol-label fs-3 bg-light-danger text-danger">
                {{ substr($order->user->name, 0, 1) }}
            </div>
        @endif
        </a>
    </div>
    <!--end::Avatar-->
    <div class="ms-5">
        <!--begin::Title-->
        <a href="{{ route('user-management.users.show', $order->user->id)}}" class="text-gray-800 text-hover-primary fs-5 fw-bolder">{{ $order->user->name ?? ''}}</a>
        <!--end::Title-->
    </div>
</div>
