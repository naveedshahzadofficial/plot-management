@extends('layouts.app')
@push('title', 'Forgotten Password')
@section('content')

    <!--begin::Login-->
    <div class="login login-4 wizard row">

        <div class="col-md-6"></div>
        <div class="col-md-6">

            <!--begin::Wrapper-->
            <div class="login-content  col-md-12 my-10">

                <!--begin::Logo-->
                <p class="text-center">
                    <a href="#" class="login-logo pb-xl-20 pb-15">
                        <img src="{{ asset('assets/media/logos/logo-with-text.png') }}" alt="Special Economic Zone" />
                    </a>
                </p>
                <!--end::Logo-->

                <!--begin::Signin-->
                <div class="login-form px-32">
                    <!--begin::Form-->

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form class="form" id="kt_login_forgot_form1" method='post' action="{{ route('password.email') }}">
                    @csrf
                    <!--begin::Title-->
                        <!--begin::Title-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label  for="email" class="auth-form-label">{{ __('Email Address') }}<span class="color-red-700">*</span></label>

                            <input id="email" type="email" class="rounded-lg border-0 form-control @error('email') is-invalid @enderror" autocomplete="off" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <!--end::Form group-->

                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_forgot_form_submit_button" class="btn btn-primary font-weight-bolder px-8  my-3 mr-4 auth-login-btn">  {{ __('Send Password Reset Link') }}</button>
                            <a href="{{ route('login') }}" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder px-8 my-3 auth-login-btn">Cancel</a>
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
