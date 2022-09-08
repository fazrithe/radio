<?php $__env->startSection('content'); ?>
<?php
    $bread = getContent('breadcrumb.content',true);
    $contact = getContent('contact_us.content',true);
?>

    <!-- inner hero section start -->
    <section class="inner-hero bg_img" style="background-image: url(<?php echo e(sectionImage('breadcrumb',$bread->data_values->background_image)); ?>);">
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


    <!-- contact section start -->
    <section class="pt-100 pb-100 bg_img overlay--one" style="background-image: url(<?php echo e(sectionImage('contact_us',$contact->data_values->background_image)); ?>);">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="contact-wrapper">
              <div class="row gy-4">
                <div class="col-lg-4">
                  <div class="contact-item">
                    <div class="icon">
                      <i class="las la-phone-volume"></i>
                    </div>
                    <div class="content">
                      <h6 class="caption"><?php echo app('translator')->get('Phone number'); ?></h6>
                      <p><a href="tel:<?php echo e($contact->data_values->contact_number); ?>"><?php echo e($contact->data_values->contact_number); ?></a></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="contact-item">
                    <div class="icon">
                      <i class="las la-envelope"></i>
                    </div>
                    <div class="content">
                      <h6 class="caption"><?php echo app('translator')->get('Email Address'); ?></h6>
                      <p><a href="mailto:demo@gmail.com"><?php echo e(__($contact->data_values->email_address)); ?></a></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="contact-item">
                    <div class="icon">
                      <i class="las la-map-marked-alt"></i>
                    </div>
                    <div class="content">
                      <h6 class="caption"><?php echo app('translator')->get('Address'); ?></h6>
                      <p><?php echo e(__($contact->data_values->contact_details)); ?></p>
                    </div>
                  </div>
                </div>
              </div><!-- row end -->
              <form class="mt-5" action="" method="POST">
                  <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-lg-6 form-group">
                    <label><?php echo app('translator')->get('Name'); ?></label>
                    <input type="text" name="name" placeholder="<?php echo app('translator')->get('Enter full name'); ?>" class="form--control">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label><?php echo app('translator')->get('Email'); ?></label>
                    <input type="text" name="email" placeholder="<?php echo app('translator')->get('Enter email address'); ?>" class="form--control">
                  </div>
                  <div class="col-lg-12 form-group">
                    <label><?php echo app('translator')->get('Subject'); ?></label>
                    <input type="text" name="subject" placeholder="<?php echo app('translator')->get('Enter Subject'); ?>" class="form--control">
                  </div>
                  <div class="col-lg-12 form-group">
                    <label><?php echo app('translator')->get('Message'); ?></label>
                    <textarea name="message" placeholder="<?php echo app('translator')->get('Message'); ?>" class="form--control"></textarea>
                  </div>
                  <div class="col-lg-12">
                    <button type="submit" class="btn btn--base"><?php echo app('translator')->get('Message Now'); ?></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- contact section end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\harmony\core\resources\views/templates/basic/contact.blade.php ENDPATH**/ ?>