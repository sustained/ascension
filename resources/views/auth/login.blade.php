@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex justify-center items-center h-screen pt-16">
        <div class="w-1/2">
            <div class="card bg-discord-bg-1 shadow-lg">
                <h1>Login</h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row items-center">
                        <div class="col">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        </div>

                        <div class="col flex-1">
                            <input
                                id="email"
                                type="email"
                                class="shadow-inner text-gray-200 rounded-sm form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus>
                        </div>
                    </div>

                    <div class="row items-center">
                        <div class="col">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        </div>

                        <div class="col flex-1">
                            <input
                                id="password"
                                type="password"
                                class="shadow-inner text-gray-200 rounded-sm form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password"
                            required>
                        </div>
                    </div>

                    <div class="row p-3 items-center justify-between bg-discord-bg-3 mt-2 -mx-4 -mb-4 rounded-b-lg">
                        <div class="flex items-center btn muted">
                            <input
                                class="mr-2 w-4 h-4"
                                type="checkbox"
                                name="remember"
                                id="remember" {{ old('remember') ? 'checked' : '' }}
                                />

                            <label class="text-sm" for="remember">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        <div>
                            <button class="btn blue mr-4">Login</button>

                            <button class="btn muted">Forgot Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    -->
</div>
@endsection
