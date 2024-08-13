@extends($activeTemplate . 'layouts.frontend')
@section('content')
<!-- ============================= Classic Blog Start ================================== -->
@include($activeTemplate . 'partials.breadcrumb')
<section class="bg-light">
  <div class="container">
  
    <div class="row g-xl-4 g-lg-3 g-3">
      @forelse($blogElements as $item)
      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
        <div class="verticle-blog-wrap bg-white p-2 rounded-2 h-100">
          <div class="row align-items-center">
            <div class="col-md-6">
              <article>
                <a href="{{ route('blog.details', [$item->id, slug($item->data_values->title)]) }}"><img src="{{ getImage('assets/images/frontend/blog/thumb_' . @$item->data_values->image, '480x280') }}" class="img-fluid rounded-2" alt=""></a>
              </article>
            </div>
            <div class="col-md-6">
              <div class="article-caption py-2">
                <div class="d-inline-flex label text-success bg-light-success"><span>Resources</span></div>
                <div class="article-heads mb-3">
                  <h4 class="font--bold mb-1">{{$item->data_values->title}}</h4>
                  <span class="text-muted">{{diffForHumans($item->created_at)}}</span>
                </div>
                <div class="article-desc mb-3">
                  <p class="m-0"></p>
                </div>
                <div class="article-links">
                  <a href="{{ route('blog.details', [$item->id, slug($item->data_values->title)]) }}" class="text-seegreen font--bold">@lang('Continue Reading') <i class="fa-solid fa-arrow-right ms-1"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Col -->
      @empty
        <div class="col-lg-4 col-md-6 col-sm-12 mrb-30">
            {{ alert('danger',$emptyMessage) }}
        </div>
      @endforelse
       
      
    </div>
    <!-- End Row --> 
    @if ($blogElements->hasPages()) 
    <div class="row justify-content-center mt-5">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="text-center">
          {{ paginateLinks($blogElements) }}
        </div>
      </div>
    </div>
    @endif
    
  </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Classic Blog End ================================== -->


 

      
 
@endsection
