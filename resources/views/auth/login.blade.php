@extends('layouts.page')
@section('content')
<main class="page contact-us-page">
    <section style="background: #ffffff;">
        <section class="login-clean" style="background: url(&quot;assets/img/tech/ImageForArticle_18547(1).jpg&quot;);background-size: cover;">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h2 class="visually-hidden">{{ __('Login') }}</h2>
                <div class="illustration">
                <i class="la la-connectdevelop" style="color: var(--bs-blue);">
                </i></div>
                <div class="mb-3"><input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="mb-3">
                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Mot De Passe" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-md-0 offset-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-block w-100" type="submit" style="color: var(--bs-white);background: var(--bs-blue);">
                        {{ __('Login') }}
                    </button>
                </div>
                @if (Route::has('password.request'))
                    <a class="forgot" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>
        </section>
    </section>
</main>

@endsection
