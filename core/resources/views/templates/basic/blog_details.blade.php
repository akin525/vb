@extends($activeTemplate . 'layouts.frontend')
@section('content')
<!--Contents-->
<!-- ============================= Single Post Start ================================== -->
<section>
    <div class="container">
        
        <div class="row justify-content-between">
            <div class="col-xl-8 col-lg-8 col-md-12">
                
                <!-- Post Title -->
                <h1 class="pb-2 pb-lg-3">{{ __(@$blog->data_values->title) }}</h1>
                <div class="d-flex flex-wrap align-items-center justify-content-between border-bottom mb-4">
                    <div class="d-flex align-items-center mb-4 me-4"><span class="fs-sm me-2">@lang('Posted'):</span><a class="text-primary position-relative fw-semibold p-0" href="#" data-scroll="" data-scroll-offset="80">{{diffForHumans(@$blog->created_at)}}<span class="d-block position-absolute start-0 bottom-0 w-100" style="background-color: currentColor; height: 1px;"></span></a></div>
                    <div class="d-flex align-items-center mb-4 me-4"><span class="fs-sm me-2">@lang('Views'):</span><a class="text-primary position-relative fw-semibold p-0" href="#" data-scroll="" data-scroll-offset="80"> {{$blog->val_1}}<span class="d-block position-absolute start-0 bottom-0 w-100" style="background-color: currentColor; height: 1px;"></span></a></div>
                    
                    <div class="d-flex align-items-center mb-4"><span class="fs-sm me-2">@lang('Share post'):</span>
                        <div class="d-flex">
                            <a class="text-muted p-2 me-2" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}&amp;title={{ __(@$blog->data_values->title) }}&amp;summary={{ __(@$blog->data_values->description) }}" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Instagram" data-bs-original-title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                            <a class="text-muted p-2 me-2" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Facebook" data-bs-original-title="Facebook"><i class="fa-brands fa-facebook"></i></a>
                            <a class="text-muted p-2" href="https://twitter.com/intent/tweet?text={{ __(@$blog->data_values->title) }}%0A{{ url()->current() }}" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Twitter" data-bs-original-title="Twitter"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Post Content -->
                <p class="fs-6 pt-2 pt-sm-3"> @php echo @$blog->data_values->description @endphp<p>
                
                <figure class="figure"><img class="img-fluid rounded-4 mb-3" src="{{ getImage('assets/images/frontend/blog/' . @$blog->data_values->image, '770x390') }}" alt="Image"></figure>
                
                  
            </div>
            
            <div class="col-xl-3 col-lg-4 col-md-12 col-xl-offset-1">
                <div class="blogs-sidewraps pt-lg-0 pt-4">
                
                    <div class="blogs-sides">
                         
                        <!-- Trending -->
                        <h4 class="font--bold">@lang('Trending Post'):</h4>
                        <div class="position-relative mt-4 mb-4 mb-lg-5">
                            @forelse($recent_blogs as $item)
                            <article class="position-relative d-flex align-items-center mb-4">
                                <img class="rounded" src="{{ getImage('assets/images/frontend/blog/thumb_' . @$item->data_values->image, '60x60') }}" width="90" alt="Post Thumb">
                                <div class="ps-3">
                                    <h4 class="h6 mb-2">
                                        <a class="stretched-link" href="{{ route('blog.details', [$item->id, slug($item->data_values->title)]) }}">{{$item->data_values->title}}</a>
                                    </h4>
                                    <span class="text-sm-muted">{{ diffForHumans($item->created_at) }}</span>
                                </div>
                            </article>
                            @empty
                            <div class="single-popular-item d-flex flex-wrap">
                                {{ __($emptyMessage) }}
                            </div>
                            @endforelse
                             
                        </div> 
                    </div>
                    
                    <div class="blogs-sides mt-4 mt-lg-5">
                        <img src="assets/img/popeyes-banner-ad.jpg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Single Post End ================================== -->
 
@endsection
@push('fbComment')
    @php echo loadExtension('fb-comment') @endphp
@endpush
