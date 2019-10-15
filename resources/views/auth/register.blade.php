@extends('layouts.default')

@section('content')

  <header class="header">
    <h1>{{ __('Registration') }}</h1>
    <h2>{{ __('Web Fiction Guide') }}</h2>
  </header>

  <form class="pure-form pure-form-aligned center space-above" method="POST" action="{{ route('register') }}">
    <fieldset>
      @csrf

      <div class="pure-control-group">
        <label for="name">{{ __('Name') }}</label>
        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>


      <div class="pure-control-group">
        <label for="email">{{ __('Email Address') }}</label>
        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>


      <div class="pure-control-group">
        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>


      <div class="pure-control-group">
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>

      <div class="pure-controls">
        <button type="submit" class="pure-button pure-button-primary">{{ __('Register') }}</button>
      </div>
    </fieldset>
  </form>

  <p class="center smaller">
    @if (Route::has('login'))
      <a href="{{ route('login') }}">{{ __('want to log in instead?') }}</a>
    @endif
  </p>


@endsection
