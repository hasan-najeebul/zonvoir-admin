@extends('layouts.app')

@section('content')
    <div class="card-header">
        <h1>{{ __('password.verify_your_email_address') }}</h1>
    </div>


    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('password.a_fresh_link_sent_to_email') }}
        </div>
    @endif

    {{ __('password.brefore_proceeding_please_check_email') }}
    {{ __('password.if_you_do_not_recieve_email') }},
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('password.click_here_to_send_an_request') }}</button>.
    </form>
@endsection
