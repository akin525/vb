<?php $__env->startSection('content'); ?>
<!-- ============================= Classic Blog Start ================================== -->
<?php echo $__env->make($activeTemplate . 'partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="bg-light">
  <div class="container">
  
    <div class="row g-xl-4 g-lg-3 g-3">
      <?php $__empty_1 = true; $__currentLoopData = $blogElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
        <div class="verticle-blog-wrap bg-white p-2 rounded-2 h-100">
          <div class="row align-items-center">
            <div class="col-md-6">
              <article>
                <a href="<?php echo e(route('blog.details', [$item->id, slug($item->data_values->title)])); ?>"><img src="<?php echo e(getImage('assets/images/frontend/blog/thumb_' . @$item->data_values->image, '480x280')); ?>" class="img-fluid rounded-2" alt=""></a>
              </article>
            </div>
            <div class="col-md-6">
              <div class="article-caption py-2">
                <div class="d-inline-flex label text-success bg-light-success"><span>Resources</span></div>
                <div class="article-heads mb-3">
                  <h4 class="font--bold mb-1"><?php echo e($item->data_values->title); ?></h4>
                  <span class="text-muted"><?php echo e(diffForHumans($item->created_at)); ?></span>
                </div>
                <div class="article-desc mb-3">
                  <p class="m-0"></p>
                </div>
                <div class="article-links">
                  <a href="<?php echo e(route('blog.details', [$item->id, slug($item->data_values->title)])); ?>" class="text-seegreen font--bold"><?php echo app('translator')->get('Continue Reading'); ?> <i class="fa-solid fa-arrow-right ms-1"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Col -->
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mrb-30">
            <?php echo e(alert('danger',$emptyMessage)); ?>

        </div>
      <?php endif; ?>
       
      
    </div>
    <!-- End Row --> 
    <?php if($blogElements->hasPages()): ?> 
    <div class="row justify-content-center mt-5">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="text-center">
          <?php echo e(paginateLinks($blogElements)); ?>

        </div>
      </div>
    </div>
    <?php endif; ?>
    
  </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Classic Blog End ================================== -->


 

      
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/billxgiftbills/public_html/core/resources/views/templates/basic/blog.blade.php ENDPATH**/ ?>