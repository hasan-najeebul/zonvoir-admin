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
