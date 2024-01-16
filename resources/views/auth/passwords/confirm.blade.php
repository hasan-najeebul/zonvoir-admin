@extends('layouts.auth')

@section('content')
    <div class="card-header">{{ __('messages.confirm_password') }}</div>

    {{ __('password.please_confirm_before_continue') }}

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('password.password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('password.confirm_password') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('password.forgot_your_password') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection