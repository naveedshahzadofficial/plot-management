@extends('layouts.app')

@section('content')

    <!--begin::Login-->
    <div class="login login-4 wizard row">

        <div class="col-md-6"></div>
        <div class="col-md-6">

            <!--begin::Wrapper-->
            <div class="login-content  col-md-12">

                <!--begin::Logo-->
                <p class="text-center my-10">
                <a href="#" class="login-logo pb-xl-20 pb-15">
                    <img src="{{ asset('assets/media/logos/logo-with-text.png') }}" alt="Special Economic Zone" />
                </a>
                </p>
                <!--end::Logo-->

            <!--begin::Signin-->
            <div class="login-form">
                <!--begin::Form-->

                <form class="form" id="kt_login_singin_form1"  method="POST" action="{{ route('login') }}">
                @csrf
                <!--begin::Title-->
                    <!--begin::Title-->
                    <!--begin::Form group-->
                    <div class="form-group">
                        <label  for="email" class="font-size-h6 font-weight-bolder text-dark">{{ __('Email Address') }}<span class="color-red-700">*</span></label>

                        <input id="email" type="email" class=" h-auto py-7 px-6 rounded-lg border-0 form-control @error('email') is-invalid @enderror" autocomplete="off" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                    <!--end::Form group-->
                    <!--begin::Form group-->
                    <div class="form-group">
                        <div class="d-flex justify-content-between mt-n5">
                            <label  for="password" class="font-size-h6 font-weight-bolder text-dark pt-5">{{ __('Password') }}<span class="color-red-700">*</span></label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5"> {{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>

                        <input id="password" type="password" class="form-control h-auto py-7 px-6 rounded-lg border-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                    </div>
                    <!--end::Form group-->
                    <!--begin::Action-->
                    <div class="pb-lg-0 pb-5">
                        <button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3"> {{ __('Login') }}</button>

                        <div style="display: none;" class="text-muted font-weight-bold font-size-h4">New Here?
                            <a href="custom/pages/login/login-3/signup.html" class="text-primary font-weight-bolder">Create Account</a></div>
                    </div>
                    <!--end::Action-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Signin-->

            </div>
            <!--end::Wrapper-->

        </div>

    </div>
    <!--end::Login-->

@endsection
