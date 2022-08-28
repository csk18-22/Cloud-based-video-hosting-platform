@extends('layouts.app')

@section('content')
<div class="container login-container">
    <div class="row justify-content-left">
        <div class="col-md-6">
            <div class="border-yellow">
                <div class="text-bold text-center">{{ __('Sign In') }}</div>


                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

                            <div class="col-md-12">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->

                            <div class="col-md-12">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" checked type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-white" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="text-right">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button id="login-btn" type="submit" class="btn btn-primary yellow">
                                    {{ __('Login') }}
                                </button>
                                <!--

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif-->
                            </div>
                        </div><br>
                        <div style="width: 100%; height: 20px; border-bottom: 1px solid #FCA311; text-align: center">
                            <span style="font-size: 18px;color:#FCA311;background-color:#14213D ; padding: 0 10px;">
                                OR
                                <!--Padding is optional-->
                            </span>
                        </div><br>
                        <div class="form-group row">
                            <!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

                            <div class="col-md-12 text-center">

                                <button id="google-btn" class="btn warning">
                                    <i class="fa fa-google" style="font-size:20px"></i>&nbsp;
                                    {{ __('Continue with Google') }}

                                </button>
                            </div>
                        </div>
                        <p class="white">Not registered yet?<a class="text-yellow" href="{{ route('register') }}"> Create an account</a> </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tp"></div>
        </div>
    </div>
</div>
@endsection