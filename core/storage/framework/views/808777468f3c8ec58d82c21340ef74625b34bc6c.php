 <?php
     $radio = getContent('radio_jockey.content',true)->data_values;

     $jockeys = App\Models\RadioJockey::latest()->get();

 ?>
 <!-- rj section start -->
    <section class="pt-100 pb-100 bg_img overlay--two" style="background-image: url(<?php echo e(sectionImage('radio_jockey',$radio->background_image)); ?>);">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="section-header text-center">
              <h2 class="section-title text-uppercase"><?php echo e(__($radio->title)); ?></h2>
              <div class="equalizer">
                <span class="equalizer-item equalizer-1"></span>
                <span class="equalizer-item equalizer-2"></span>
                <span class="equalizer-item equalizer-3"></span>
                <span class="equalizer-item equalizer-4"></span>
                <span class="equalizer-item equalizer-5"></span>				
                <span class="equalizer-item equalizer-6"></span>
              </div>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center gy-4">
          
          <?php $__currentLoopData = $jockeys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jockey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="rj-single">
              <div class="thumb">
                <img src="<?php echo e(asset(getImage('assets/images/rj_image/'.$jockey->image),'600x600')); ?>" alt="<?php echo app('translator')->get('image'); ?>">
                <div class="overlay-content">
                  <h4><a href="<?php echo e(route('jockey.details',$jockey->id)); ?>"><?php echo e(__($jockey->fullname)); ?></a></h4>
                  <span class="designation mt-1"><?php echo e(__($jockey->designation)); ?></span>
                </div>
                <ul class="social-links">
                  <?php $__currentLoopData = $jockey->socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="<?php echo e($social->url); ?>"><?php echo $social->icon; ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                </ul>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </div>
      </div>
    </section>
    <!-- rj section end --><?php /**PATH C:\xampp7.4\htdocs\radioallomas\core\resources\views/templates/basic/sections/radio_jockey.blade.php ENDPATH**/ ?>