@extends('frontend/views/layouts.app')

@section('content')
<form class="d-inline" method="POST" action="{{ route('password.confirm') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="icon-user-lock icon-2x text-success border-successs border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">{{ __('auth.confirm-password') }}</h5>
                        <span class="d-block text-muted mb-3">
                            {{ __('Please confirm your password before continuing.') }}
                        </span>
                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  placeholder="{{ __('auth.password') }}">
                            <div class="form-control-feedback">
                                <i class="icon-user-lock text-muted"></i>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                            @csrf
                            <button type="submit" class="btn bg-blue btn-block"><i class="icon-spinner11 mr-2"></i> {{ __('auth.confirm-password') }}</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('auth.forgot-your-password') }}
                                </a>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
