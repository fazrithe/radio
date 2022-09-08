<?php
    $footer =getContent('footer.content',true)->data_values;
    $socials =getContent('social_icon.element');
    $policies = getContent('policy.element');
?>
<!-- footer section start -->
<footer class="footer bg_img" style="background-image: url(<?php echo e(sectionImage('footer', $footer->background_image)); ?>);">
  <div class="footer__top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('assets/images/logoIcon/logo.png')); ?>" alt="<?php echo app('translator')->get('image'); ?>"></a>
          <p class="mt-3"><?php echo e(__($footer->description)); ?></p>
          <ul class="social-links-list justify-content-center mt-3">
            <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                <a href="<?php echo e($icon->data_values->url); ?>">
                <?php
                  echo $icon->data_values->social_icon;
               ?>
              </a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </ul>
        </div>
      </div>
    </div>
  </div><!-- footer__top end -->
  <div class="footer__bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-6 order-lg-1 order-2 text-md-start text-center">
          <p><?php echo app('translator')->get('Copyrights'); ?> © <?php echo date('Y'); ?> by <a href="<?php echo e(route('home')); ?>" class="text--base"><?php echo e($general->sitename); ?></a>. <?php echo app('translator')->get('All Rights Reserved'); ?>.</p>
        </div>
        <div class="col-lg-2 text-center order-lg-2 order-1">
          <div class="scroll-to-top">
            <i class="las la-angle-double-up"></i>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 order-lg-3 order-3">
          <ul class="footer-short-list d-flex flex-wrap justify-content-md-end justify-content-center">
            <?php $__currentLoopData = $policies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
              <li><a href="<?php echo e(route('policy',[$policy->id,slug($policy->data_values->title)])); ?>"><?php echo e(__($policy->data_values->title)); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </ul>
        </div>
      </div>  
    </div>
  </div>
</footer>
<!-- footer section end --><?php /**PATH C:\laragon\www\harmony\core\resources\views/templates/basic/partials/footer.blade.php ENDPATH**/ ?>