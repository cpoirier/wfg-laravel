@extends('layouts.default')

@section('content')

  <header class="header">
    <h1>{{ __('Log In') }}</h1>
    <h2>{{ __('Web Fiction Guide') }}</h2>
  </header>

  <form class="pure-form center space-above" method="POST" action="{{ route('login') }}">
    <fieldset>
      @csrf

      <input id="email" type="email" placeholder="{{ __('email address') }}" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      <input id="password" type="password" placeholder="{{ __('password') }}" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
      <label for="remember">
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        {{ __('remember me') }}
      </label>
      <button type="submit" class="pure-button pure-button-primary">{{ __('Log In') }}</button>
    </fieldset>

    @error('email')
      <p class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror

    @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror

  </form>

  <p class="center smaller">
    @if (Route::has('password.request'))
      <a href="{{ route('password.request') }}">{{ __('forgot your password?') }}</a>
    @endif
    <br/>
    @if (Route::has('register'))
      <a href="{{ route('register') }}">{{ __('need to register?') }}</a>
    @endif
  </p>

@endsection
