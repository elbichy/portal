@extends('layouts.verifyTemp')

@section('content')
<div class="homeContentContainer">
    <div class="card">
        <div class="verifyWrap">
        <h5>Verify Your Email Address</h5>
            @if (session('resent'))
                <div class="green lighten-5" style="padding: 6px; margin: 15px 0;">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            <p>
                Before proceeding, please check your email for a verification link. If you did not receive the email.
            </p>
            <a href="{{ route('verification.resend') }}" class="btn waves-effect waves-light">click here to request another</a>
        </div>
    </div>
</div>
@endsection
