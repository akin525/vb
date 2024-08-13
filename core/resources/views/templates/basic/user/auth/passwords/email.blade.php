@extends($activeTemplate . 'layouts.auth')
@section('content')
<!--end::Authentication - Password Reset-->
@php
$passwordContent = getContent('password.content', true);
@endphp
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
            <!--begin::Image-->
            <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                src="{{ getImage('assets/images/frontend/password/' . @$passwordContent->data_values->image, '630x540') }}"
                alt="" />
            <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                src="{{ getImage('assets/images/frontend/password/' . @$passwordContent->data_values->image, '630x540') }}"
                alt="" />
            <!--end::Image-->
            <!--begin::Title-->
            <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                {{ __(@$passwordContent->data_values->heading) }}
            </h1>
            <!--end::Title-->

            <!--begin::Text-->
            <div class="text-gray-600 fs-base text-center fw-semibold">
                {{ __(@$passwordContent->data_values->sub_heading) }}
            </div>
            <!--end::Text-->
        </div>
        <!--end::Content-->
    </div>
    <!--begin::Aside-->

    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
        <!--begin::Wrapper-->
        <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

                    <!--begin::Form-->
                    <form class="form w-100 verify-gcaptcha"  data-kt-redirect-url="{{route('user.home')}}"  class="form w-100" novalidate="novalidate" id="kt_password_reset_form" method="POST"
                    action="{{ route('user.password.email') }}">
                    @csrf 

                    <div class="text-center mb-10">
                        <img alt="Logo" class="mh-125px" src="{{ asset('assets/thirdparty/media/svg/misc/smartphone-2.svg')}}"/>
                    </div>
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">
                                @lang('Forgot Password')
                            </h1>
                            <!--end::Title-->

                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">
                               @lang('Fill the form below to reset password')
                            </div>
                            <!--end::Subtitle--->
                        </div>
                        <!--begin::Heading-->  

                        <!--begin::Input group--->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" name="value" class="form-control bg-transparent" value="{{ old('value') }}" autocomplete="off" placeholder="@lang('Username or Email')" required>
                            <!--end::Email-->
                        </div> 

                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" class="btn btn-primary">

                                <!--begin::Indicator label-->
                                <span class="indicator-label">
                                    @lang('Proceed')</span>
                                <!--end::Indicator label--> 
                             </button>
                        </div>
                        <!--end::Submit button-->

                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">
                            @lang('Have an account')

                            <a href="{{ route('user.login') }}" class="link-primary">
                                @lang('Login')
                            </a>
                        </div>
                        <!--end::Sign up-->
                    </form>
                    <!--end::Form-->

                </div>
                <!--end::Wrapper--> 
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Body-->
</div>
<!--end::Authentication - Password Reset-->
 
@endsection
