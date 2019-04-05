@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">


                    <div class="card-body">
                        <div class="text-dark text-center">
                            <h1>
                                {{ __('Elancer Login') }}
                            </h1>
                        </div>

                        <form class="mt-4" method="POST" action="{{ route('elancer.login.submit') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email" class="form-control-label sr-only">{{ __('E-Mail Address') }}</label>

                                        <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                        @if ($errors->has('email'))
                                            <p class="help is-invalid">{{ $errors->first('email') }}</p>
                                        @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password" class="form-control-label sr-only">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <p class="help is-invalid">{{ $errors->first('password') }}</p>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-check col-md-12 mb-2">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                </div>

                                <div class="form-group col-md-12 mb-0">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div> <!-- row -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
