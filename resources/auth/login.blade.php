@extends('frontend/views/layouts.app')

@section('content')
<!-- Login form -->
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">{{ __('auth.login') }}</h5>
                        <span class="d-block text-muted"><!--Your credentials--></span>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('auth.email-address') }}">
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('auth.password') }}">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <div class="form-check mb-0">
                            <label class="form-check-label">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-input-styled"  data-fouc>
                                {{ __('auth.remember-me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="ml-auto">{{ __('auth.forgot-your-password') }}</a>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('auth.login') }} <i class="icon-circle-right2 ml-2"></i></button>
                    </div>

                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-2">or sign in with</span>
                    </div>

                    <div class="form-group text-center">
                        <button type="button" class="btn btn-outline bg-indigo border-indigo text-indigo btn-icon rounded-round border-2"><i class="icon-facebook"></i></button>
                        <button type="button" class="btn btn-outline bg-pink-300 border-pink-300 text-pink-300 btn-icon rounded-round border-2 ml-2"><i class="icon-dribbble3"></i></button>
                        <button type="button" class="btn btn-outline bg-slate-600 border-slate-600 text-slate-600 btn-icon rounded-round border-2 ml-2"><i class="icon-github"></i></button>
                        <button type="button" class="btn btn-outline bg-info border-info text-info btn-icon rounded-round border-2 ml-2"><i class="icon-twitter"></i></button>
                    </div>

                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-2">Don't have an account?</span>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('register') }}" class="btn btn-light btn-block">{{ __('auth.register') }}</a>
                    </div>

                    <span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /login form -->
@endsection
@section('page-level-scripts')
<script src="{{ asset('js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('js/login.js') }}"></script>
@endsection
