<?php $__env->startSection('content'); ?>

    <?php
    $bread = getContent('breadcrumb.content', true);
    ?>

    <!-- inner hero section start -->
    <section class="inner-hero bg_img"
        style="background-image: url(<?php echo e(sectionImage('breadcrumb', $bread->data_values->background_image)); ?>) ;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 class="page-title text-center"><?php echo e(__($page_title)); ?></h2>
                    <ul class="page-breadcrumb justify-content-center">
                        <li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- inner hero section end -->


    <section class="pt-100 pb-100 bg_img overlay--one">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-12">
                    <p class="text-white"> <?php echo __($policy->description) ?> </p>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\harmony\core\resources\views/templates/basic/policy.blade.php ENDPATH**/ ?>