@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $bannerContent = getContent('banner.content', true);
    @endphp
<!-- ============================ Hero Banner  Start================================== -->
<div class="image-cover hero-header gray-simple position-relative">
    <div class="container">

        <div class="row justify-content-center align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="elcoss-excort mt-xl-5 mt-md-4 wow animated fadeInLeft">
                    <div class="bg-primary text-light rounded-2 px-3 py-2 d-inline-flex font--medium mb-2"><span>@lang('Welcome To ') {{$general->site_name}}</span></div>
                    <h1 class="mb-4">{{ __(@$bannerContent->data_values->heading) }}</h1>
                    <p class="fs-5 fw-light fs-mob">{{ __(@$bannerContent->data_values->sub_heading) }}</p>
                    <div class="btn-groupss mt-5 mb-2">
                        <a href="JavaScript:Void(0);" class="d-inline-block mx-2 my-2"><img class="img-fluid" src="{{ asset($activeTemplateTrue . 'img/google-app.png')}}" width="140" alt="Google Play"></a>
                        <a href="JavaScript:Void(0);" class="d-inline-block mx-2 my-2"><img class="img-fluid" src="{{ asset($activeTemplateTrue . 'img/ios-app.png')}}" width="140" alt="IOS"></a>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 offset-lg-1 offset-xl-1">
                <div class="position-relative mt-md-0 mt-4 wow animated fadeInRight">
                    <img class="d-block position-relative z-2 img-fluid" src="{{ getImage('assets/images/frontend/banner/' . @$bannerContent->data_values->image, '630x540') }}" width="100%" alt="Dan">
                    <div class="bg-primary position-absolute z-1 start-0 bottom-0 w-100" style="height:85%; border-radius: 100rem 2rem 3rem 3rem;">
                        <div class="position-absolute top-0 start-5"><img src="{{ getImage('assets/images/provider/ikedc.png', '100x100') }}" class="img-fluid" width="50" alt="icon"></div>
                        <div class="position-absolute bottom-0 start-0"><img src="{{ getImage('assets/images/provider/decoder2.png', '100x100') }}" class="img-fluid" width="125" alt="icon"></div>
                        <div class="position-absolute bottom-0 end-0"><img src="{{ getImage('assets/images/provider/9mobile.png', '100x100') }}"class="img-fluid" width="50" alt="icon"></div>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->
 

    @if ($sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include($activeTemplate . 'sections.' . $sec)
        @endforeach
    @endif 
@endsection
