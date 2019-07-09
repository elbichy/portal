@extends('layouts.homeTemp')

@section('content')
<div class="homeContentContainer">
    <div class="card">
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
        <div class="row">
        <h5 style="margin-bottom: 20px;">Reset Password</h5>
            @if (session('status'))
                <div class="green lighten-5" style="padding: 6px; margin-top: 10px;">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.update') }}" name="resetForm" id="resetForm">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-field col s12">
                    <i class="prefix material-icons left">email</i>
                    <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="helper-text red-text">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <label for="email">E-Mail Address</label>
                </div>
                <div class="input-field col s12">
                    <i class="prefix material-icons left">vpn_key</i>
                    <input id="password" type="password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="helper-text red-text">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <label for="password">Password</label>
                </div>
                <div class="input-field col s12">
                    <i class="prefix material-icons left">vpn_key</i>
                    <input id="password-confirm" type="password" name="password_confirmation" required>
                    @if ($errors->has('password'))
                        <span class="helper-text red-text">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <label for="password-confirm">Confirm Password</label>
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light right">
                    {{ __('Reset Password') }}<i class="prefix material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
