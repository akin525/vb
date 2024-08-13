    @extends($activeTemplate . 'layouts.frontend')
    @section('content')

    @include($activeTemplate . 'partials.breadcrumb')
    <!-- ====== start contact ====== -->
    @php
    $contactContent = getContent('contact.content', true);
    $addressContent = getContent('address.content', true);
    $user = auth()->user();
    @endphp
<!-- ============================= Contact Us Start ================================== -->
<section>
    <div class="container">
        
        <div class="row justify-content-between">
            
            <div class="col-lg-4 pe-xl-5 pe-lg-4">
                <h1 class="display-2 font--bold">Contacts</h1>
                <p class="fs-5 pb-4 mb-0 mb-sm-2">Get in touch with us by droping messages or call us now</p>
            </div>
            
            <div class="col-lg-8 col-xl-7 offset-xl-1">
                    <form class="row needs-validation g-4" method="post" action="{{route('contact')}}">
                    @csrf
                    <div class="col-sm-6">
                        <label class="form-label">@lang('Name')</label>
                        <input class="form-control" type="text" placeholder="Your name">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">@lang('Email')</label>
                        <input class="form-control" type="email" placeholder="@lang('Enter E-Mail Address')" value="{{ $user ? $user->email : old('email') }}"
                        {{ $user ? 'readonly' : '' }} required>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">@lang('Subject')</label>
                        <input class="form-control" name="subject" value="{{ old('subject') }}"  placeholder="Your Phone">
                    </div> 
                    <div class="col-12">
                        <label class="form-label">@lang('Message')</label>
                        <textarea class="form-control" rows="4"  name="message" placeholder="Type your message here..."></textarea>
                    </div>
                    <div class="col-12">
                        <div class="form-check mb-2">
                            <input class="form-check-input" required type="checkbox">
                            <label class="form-check-label">I agree to the <a class="nav-link d-inline fs-normal text-decoration-underline p-0" href="contact-v1.html#">Terms &amp; Conditions</a></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary px-lg-4" type="submit">@lang('Send your Message')</button>
                    </div>
                </form>							
            </div>
            
        </div>
        
    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Contact Us End ================================== -->


<!-- ============================= Contact Us Start ================================== -->
<section class="bg-light-info">
    <div class="container">
        <div class="row justify-content-center g-4">
            
            <div class="col-lg-4 col-xl-4 col-md-12">
                <div class="card border-0 p-4 rounded-3">
                    <h2 class="h4 text-dark font--bold mb-4">@lang('Email')</h2>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-3"><i class="fa-solid fa-envelope-circle-check fs-5 text-primary me-2"></i><a class="text-muted" href="mailto:{{ __(@$addressContent->data_values->email) }}">{{ __(@$addressContent->data_values->email) }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12">
                <div class="card border-0 p-4 rounded-3">
                    <h2 class="h4 text-dark font--bold mb-4">@lang('Phone')</h2>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-3"><i class="fa-solid fa-phone text-primary fs-5 me-2"></i><a class="text-muted" href="tel:{{ __(@$addressContent->data_values->phone) }}">{{ __(@$addressContent->data_values->phone) }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12">
                <div class="card border-0 p-4 rounded-3">
                    <h2 class="h4 text-dark font--bold mb-4">@lang('Address')</h2>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-3"><i class="fa-solid fa-location-pin text-primary fs-5 me-2"></i><span class="text-muted">{{ __(@$addressContent->data_values->address) }}</span></li>
                    </ul>
                </div>
            </div>
            
             
        </div>
    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Contact Us End ================================== -->
 
               
    @endsection
