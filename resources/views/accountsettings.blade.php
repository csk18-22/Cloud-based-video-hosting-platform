@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('info'))
    <div class="alert alert-success" role="alert">
        {{ session('info') }}
    </div>
    @endif
    <div class="row  justify-content-lg-center">
        <div class="col-md-6">
            <div class="border-yellow">

                <div class="text-bold text-center">{{ __('Account Details') }}</div>
                <div class="card-body">
                    <form method="POST" action="/accountsettings/{{ Auth::user()->id }}">
                        @csrf
                        <!-- first row -->
                        <div class="display-flex">
                            <div class="form-group row">
                                <!--<label for="firstname" class="col-md-4 col-form-label text-md-right white">{{ __('First Name') }}</label> -->

                                <div class="col-md-12">
                                    <input id="first_name" placeholder="First Name" type="text" readonly class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') ?? Auth::user()->first_name }}" required autocomplete="name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label> -->

                                <div class="col-md-12">
                                    <input id="last_name" placeholder="Last Name" type="text" readonly class="form-control @error('lastname') is-invalid @enderror" name="last_name" value="{{ old('lastname') ?? Auth::user()->last_name}}" required autocomplete="lastname" autofocus>

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
                                <input id="email" placeholder="Email" readonly type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')?? Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <!-- 3rd row begins -->
                        <div class="display-flex">
                            <div class="form-group row">
                                <!-- <label for="company name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label> -->

                                <div class="col-md-12">
                                    <input id="company_name" placeholder="Company Name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') ?? Auth::user()->company_name }}" required autocomplete="company_name">

                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website Url') }}</label> -->

                                <div class="col-md-12">
                                    <input id="website_url" placeholder="Website Url" type="url" class="form-control @error('website_url') is-invalid @enderror" name="website_url" value="{{ old('website_url') ?? Auth::user()->website_url }}" required autocomplete="website_url">

                                    @error('website_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- 3rd row ends -->
                        <!-- 4th row -->
                        <div class="display-flex">
                            <div class="form-group row">
                                <!-- <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label> -->

                                <div class="col-md-12">
                                    <input id="phone" placeholder="Phone No" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? Auth::user()->phone }}" required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <!-- 4rd row ends -->
                        <!-- 5th row begins -->
                        <div class="form-group row">
                            <!-- <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website Url') }}</label> -->

                            <div class="col-md-12">
                                <input id="address" placeholder="Address" type="" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? Auth::user()->address }}" required autocomplete="address">

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
                                    <!-- @if (Route::has('password.request')) -->
                                    <!-- <p class="white" style="margin-top:15px;">Change Password </p> -->
                                    <button onclick="visible()" class="col-md-12 btn btn-primary" id="reset-pass">
                                        <a class="btn btn-link text-white">
                                            {{ __('Change Password') }}
                                        </a>
                                    </button>
                                    <!-- @endif -->
                                </div>

                            </div>
                        </div>
                        <!-- 7th row starts -->
                        <div class="form-group row">
                            <!--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->
                            <div class="col-md-12" id="reset-pass-field">
                                <input id="password" placeholder="Enter New Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <!-- 7th row ends -->

                        <!-- 6th row ends -->
                        <div class="form-group row mb-0">
                            <div class=" col-md-12 text-center">

                                <button id="register-btn" type="submit" class="col-md-12 btn btn-primary">
                                    {{ __('Save') }}
                                </button>

                                <a class="col-md-12 mt-3 btn btn-secondary" id="cancel-btn" href="/home" role="button">Cancel</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="tp"></div>
        </div> -->
    </div>
</div>
@endsection