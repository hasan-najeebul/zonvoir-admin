@extends('layouts.auth')

@section('content')
    <div class="text-center mb-11">
        <img src="https://preview.keenthemes.com/metronic8/demo8/assets/media/logos/custom-1.png">
        <!--begin::Title-->
        <h1 class="text-dark fw-bolder mb-3">
            {{ __('password.reset_password') }}
        </h1>
    </div>
    {{-- <div class="card-body"> --}}
    <form class="form w-100" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('messages.email_address') }}</label>

            <div class="col-md-8">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('password.password') }}</label>

            <div class="col-md-8">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-end">{{ __('password.confirm_password') }}</label>

            <div class="col-md-8">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('password.reset_password') }}
                </button>
            </div>
        </div>
    </form>
@endsection
