@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12-mobile is-6-tablet is-offset-3-tablet">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-header-title">
                                {{ __('Login') }}
                            </h1>
                        </div>

                        <div class="card-content">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="field">
                                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                                    <div class="control">
                                        <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="password" class="label">{{ __('Password') }}</label>

                                    <div class="control">
                                        <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <p class="help is-danger">{{ $errors->first('password') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <label class="form-check-label" for="remember">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-link is-outlined">
                                            {{ __('Login') }}
                                        </button>
                                    </div>

                                        @if (Route::has('password.request'))
                                            <div class="control">
                                                <a class="button is-primary is-outlined" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            </div>

                                        @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
