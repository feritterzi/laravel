@extends('frontend/views/layouts.app')

@section('content')
<!-- Password recovery form -->
<form class="login-form" method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center mb-3">
                <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                <h5 class="mb-0">{{ __('Reset Password') }}</h5>
                <span class="d-block text-muted">We'll send you instructions in email</span>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="form-group form-group-feedback form-group-feedback-right">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                <div class="form-control-feedback">
                    <i class="icon-mail5 text-muted"></i>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn bg-blue btn-block"><i class="icon-spinner11 mr-2"></i> {{ __('Send Password Reset Link') }}</button>
        </div>
    </div>
</form>
<!-- /password recovery form -->
@endsection
