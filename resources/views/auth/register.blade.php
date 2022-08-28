@extends('layouts.app')

@section('content')
<div class="container register-container">
    <div class="row justify-content-left">
        <div class="col-md-6">
            <div class="border-yellow">
                <div class="text-bold text-center">{{ __('Sign Up') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- first row -->
                        <div class="display-flex">
                            <div class="form-group row">
                                <!-- <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label> -->

                                <div class="col-md-12">
                                    <input id="firstname" placeholder="Firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" autofocus>

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label> -->

                                <div class="col-md-12">
                                    <input id="lastname" placeholder="Lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- first row ends -->
                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-md-12">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- 3rd row -->
                        <div class="display-flex">
                            <div class="form-group row">
                                <!-- <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label> -->

                                <div class="col-md-12">
                                    <input id="phone" placeholder="Phone no." type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label> -->

                                <div class="col-md-12">
                                    <input id="username" placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- 3rd row ends -->
                        <!-- 4th row begins -->
                        <div class="display-flex">
                            <div class="form-group row">
                                <!-- <label for="company name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label> -->

                                <div class="col-md-12">
                                    <input id="companyname" placeholder="Company Name" type="text" class="form-control @error('companyname') is-invalid @enderror" name="companyname" value="{{ old('companyname') }}" required autocomplete="companyname">

                                    @error('companyname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website Url') }}</label> -->

                                <div class="col-md-12">
                                    <input id="website" placeholder="Website Url" type="url" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" required autocomplete="website">

                                    @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- 4th row ends -->
                        <!-- 5th row begins -->
                        <div class="form-group row">
                            <!-- <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website Url') }}</label> -->

                            <div class="col-md-12">
                                <input id="address" placeholder="Address" type="" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- 5th row ends -->

                        <!-- 6th row begins -->
                        <div class="display-flex">
                            <div class="form-group row">
                                <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                                <div class="col-md-12">
                                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> -->

                                <div class="col-md-12">
                                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <!-- 6th row ends -->
                        <div class="form-group row mb-0">
                            <div class=" col-md-12 text-center ">
                                <button id="register-btn" type="submit" class="btn btn-primary yellow">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <p class="white">Already have an account? <a class="text-yellow" href="{{ route('login') }}">Login</a> </p>
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