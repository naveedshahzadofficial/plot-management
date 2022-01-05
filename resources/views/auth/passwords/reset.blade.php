@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    

    <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="login-content flex-column-fluid d-flex flex-column p-10">
					<!--begin::Top-->
					
					<!--end::Top-->
					<!--begin::Wrapper-->
					<div class="d-flex flex-row-fluid flex-center">
						<!--begin::Forgot-->
						<div class="login-form">
							<!--begin::Form-->
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
							<form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                            <!--begin::Title-->
								<div class="pb-5 pb-lg-15">
									<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{ __('Reset Password') }}</h3>
								</div>
								<!--end::Title-->
								<!--begin::Form group-->
								<div class="form-group">
                                  

                                    <input id="email" type="email" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                </div>


                                <div class="form-group">
                                  
                                <input id="password" type="password" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                              
                              </div>


                              <div class="form-group">
                                  
                             

                                  <input id="password_confirmation" type="password_confirmation" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation" placeholder="{{ __('Confirm Password') }}">
  
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                </div>
                                
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group d-flex flex-wrap">
									<button type="submit" id="kt_login_forgot_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">    {{ __('Reset Password') }}</button>
								</div>
								<!--end::Form group-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Forgot-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
    </div>
</div>
@endsection
