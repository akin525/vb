@extends($activeTemplate . 'layouts.auth')
@section('content')
@php
$passwordContent = getContent('emailauth.content', true);
@endphp
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
            <!--begin::Image-->
            <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                src="{{ getImage('assets/images/frontend/emailauth/' . @$passwordContent->data_values->image, '630x540') }}"
                alt="" />
            <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                src="{{ getImage('assets/images/frontend/emailauth/' . @$passwordContent->data_values->image, '630x540') }}"
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
                    <form class="form w-100 verify-gcaptcha" class="form w-100" novalidate="novalidate" method="POST"
                    action="{{ route('user.verify.email') }}">
                    @csrf 
                     <!--begin::Icon-->
                    <div class="text-center mb-10">
                        <img alt="Logo" class="mh-125px" src="{{ asset('assets/thirdparty/media/svg/misc/smartphone-2.svg')}}"/>
                    </div>
                    <!--end::Icon-->
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">
                                @lang($pageTitle)
                            </h1>
                            <!--end::Title-->

                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">
                                <p class="fw-bold text-start text-dark fs-6 mb-1 ms-1">@lang('A 6 digit verification code sent to your email address') :{{ showEmailAddress(auth()->user()->email) }}</p>
                            </div>
                            <!--end::Subtitle--->
                        </div>
                        <!--begin::Heading-->   
                        <!--begin::Section-->
                        <div class="mb-10"> 

                        <!--begin::Input group-->
                        <div class="d-flex flex-wrap flex-stack">                      
                            <input type="text" name="code" maxlength="6" type="password" class="form-control bg-transparent text-center mx-1 my-2" value=""/>
                        </div>                
                        <!--begin::Input group-->
    </div>
    <!--end::Section-->

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
                    </form>
                    <!--end::Form-->
                    <p>
                        @lang('If you don\'t get any code'), <a href="{{ route('user.send.verify.code', 'email') }}"
                            class="text--base">
                            @lang('Try again')</a>
                    </p>

                    @if ($errors->has('resend'))
                        <small class="text-danger d-block">{{ $errors->first('resend') }}</small>
                    @endif

                </div>
                <!--end::Wrapper--> 
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Body-->
</div>
<!--end::Authentication - Sign-in-->
 
@endsection

@push('style')
    
@endpush
 
