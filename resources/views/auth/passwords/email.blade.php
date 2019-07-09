@extends('layouts.homeTemp')

@section('content')
<div class="homeContentContainer">
    <div class="card">
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
        <div class="row">
        <h5>Reset Password</h5>
            @if (session('status'))
                <div class="green lighten-5" style="padding: 6px; margin-top: 10px;">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}" name="resetForm" id="resetForm">
                @csrf
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>

                <div class="input-field col s12">
                    <i class="prefix material-icons">email</i>
                    <input id="email" type="text" name="email" required>
                    @if ($errors->has('email'))
                        <span class="helper-text red-text">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <label for="email">E-Mail Address</label>
                </div>
                <button type="submit" class="resetBtn btn btn-primary waves-effect waves-light right">
                    {{ __('Send Password Reset Link') }}<i class="prefix material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
