<?php
    $brand = getContent('brand.content',true);
    $brands = getContent('brand.element');
?>
    <!-- brand section start -->
    <section class="brand-section bg_img overlay--two" style="background-image: url(<?php echo e(sectionImage('brand',$brand->data_values->background_image,'1920x50')); ?>);">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-xxl-5 col-xl-5">
            <h2 class="section-title"><?php echo e(__($brand->data_values->title)); ?></h2>
            <p class="mt-3"><?php echo e(__($brand->data_values->description)); ?></p>
          </div>
          <div class="col-xxl-6 col-xl-7 mt-xl-0 mt-4">
            <div class="brand-slider">
              <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-slide">
                  <div class="brand-item">
                    <img src="<?php echo e(sectionImage('brand',$item->data_values->brand,'100x100')); ?>" alt="<?php echo app('translator')->get('image'); ?>">
                  </div>
                </div><!-- single-slide end -->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- brand section end -->
<?php /**PATH C:\laragon\www\harmony\core\resources\views/templates/basic/sections/brand.blade.php ENDPATH**/ ?>