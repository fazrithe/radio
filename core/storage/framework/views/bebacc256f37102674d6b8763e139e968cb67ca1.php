<?php
$content = getContent('online.content', true);
?>
<!-- online section start -->
<section class="online-section pt-50 pb-50 position-relative z-index2 overflow-hidden">
    <div class="section-shape opacity--10"><img
            src="<?php echo e(sectionImage('online', $content->data_values->background_image)); ?>" alt="<?php echo app('translator')->get('image'); ?>"></div>

    <div class="equalizer">
        <span class="equalizer-item equalizer-1"></span>
        <span class="equalizer-item equalizer-2"></span>
        <span class="equalizer-item equalizer-3"></span>
        <span class="equalizer-item equalizer-4"></span>
        <span class="equalizer-item equalizer-5"></span>
        <span class="equalizer-item equalizer-6"></span>
        <span class="equalizer-item equalizer-7"></span>
        <span class="equalizer-item equalizer-8"></span>
        <span class="equalizer-item equalizer-9"></span>
        <span class="equalizer-item equalizer-10"></span>
        <span class="equalizer-item equalizer-11"></span>
        <span class="equalizer-item equalizer-12"></span>
        <span class="equalizer-item equalizer-1"></span>
        <span class="equalizer-item equalizer-2"></span>
        <span class="equalizer-item equalizer-3"></span>
        <span class="equalizer-item equalizer-4"></span>
        <span class="equalizer-item equalizer-5"></span>
        <span class="equalizer-item equalizer-6"></span>
        <span class="equalizer-item equalizer-7"></span>
        <span class="equalizer-item equalizer-8"></span>
        <span class="equalizer-item equalizer-9"></span>
        <span class="equalizer-item equalizer-10"></span>
        <span class="equalizer-item equalizer-11"></span>
        <span class="equalizer-item equalizer-12"></span>
        <span class="equalizer-item equalizer-1"></span>
        <span class="equalizer-item equalizer-2"></span>
        <span class="equalizer-item equalizer-3"></span>
        <span class="equalizer-item equalizer-4"></span>
        <span class="equalizer-item equalizer-5"></span>
        <span class="equalizer-item equalizer-6"></span>
        <span class="equalizer-item equalizer-7"></span>
        <span class="equalizer-item equalizer-8"></span>
        <span class="equalizer-item equalizer-9"></span>
        <span class="equalizer-item equalizer-10"></span>
        <span class="equalizer-item equalizer-11"></span>
        <span class="equalizer-item equalizer-12"></span>
        <span class="equalizer-item equalizer-1"></span>
        <span class="equalizer-item equalizer-2"></span>
        <span class="equalizer-item equalizer-3"></span>
        <span class="equalizer-item equalizer-4"></span>
        <span class="equalizer-item equalizer-5"></span>
        <span class="equalizer-item equalizer-6"></span>
        <span class="equalizer-item equalizer-7"></span>
        <span class="equalizer-item equalizer-8"></span>
        <span class="equalizer-item equalizer-9"></span>
        <span class="equalizer-item equalizer-10"></span>
        <span class="equalizer-item equalizer-11"></span>
        <span class="equalizer-item equalizer-12"></span>
        <span class="equalizer-item equalizer-1"></span>
        <span class="equalizer-item equalizer-2"></span>
        <span class="equalizer-item equalizer-3"></span>
        <span class="equalizer-item equalizer-4"></span>
        <span class="equalizer-item equalizer-5"></span>
        <span class="equalizer-item equalizer-6"></span>
        <span class="equalizer-item equalizer-7"></span>
        <span class="equalizer-item equalizer-8"></span>
        <span class="equalizer-item equalizer-9"></span>
        <span class="equalizer-item equalizer-10"></span>
        <span class="equalizer-item equalizer-11"></span>
        <span class="equalizer-item equalizer-12"></span>
        <span class="equalizer-item equalizer-1"></span>
        <span class="equalizer-item equalizer-2"></span>
        <span class="equalizer-item equalizer-3"></span>
        <span class="equalizer-item equalizer-4"></span>
        <span class="equalizer-item equalizer-5"></span>
        <span class="equalizer-item equalizer-6"></span>
        <span class="equalizer-item equalizer-7"></span>
        <span class="equalizer-item equalizer-8"></span>
        <span class="equalizer-item equalizer-9"></span>
        <span class="equalizer-item equalizer-10"></span>
        <span class="equalizer-item equalizer-11"></span>
        <span class="equalizer-item equalizer-12"></span>
        <span class="equalizer-item equalizer-1"></span>
        <span class="equalizer-item equalizer-2"></span>
        <span class="equalizer-item equalizer-3"></span>
        <span class="equalizer-item equalizer-4"></span>
        <span class="equalizer-item equalizer-5"></span>
        <span class="equalizer-item equalizer-6"></span>
        <span class="equalizer-item equalizer-7"></span>
        <span class="equalizer-item equalizer-8"></span>
        <span class="equalizer-item equalizer-9"></span>
        <span class="equalizer-item equalizer-10"></span>
        <span class="equalizer-item equalizer-11"></span>
        <span class="equalizer-item equalizer-12"></span>
        <span class="equalizer-item equalizer-1"></span>
        <span class="equalizer-item equalizer-2"></span>
        <span class="equalizer-item equalizer-3"></span>
        <span class="equalizer-item equalizer-4"></span>
        <span class="equalizer-item equalizer-5"></span>
        <span class="equalizer-item equalizer-6"></span>
        <span class="equalizer-item equalizer-7"></span>
        <span class="equalizer-item equalizer-8"></span>
        <span class="equalizer-item equalizer-9"></span>
        <span class="equalizer-item equalizer-10"></span>
        <span class="equalizer-item equalizer-11"></span>
        <span class="equalizer-item equalizer-12"></span>
        <span class="equalizer-item equalizer-none"></span>
    </div>

    <div class="container">
        <div class="row align-items-center justify-content-between online-section-wrapper">
            <div class="col-lg-5 online-section-content text-lg-start text-center">
                <h2 class="section-title"><?php echo e(__($content->data_values->heading)); ?></h2>
                <p class="mt-3"><?php echo e(__($content->data_values->sub_heading)); ?></p>
            </div>
            <div class="col-lg-5 mt-lg-0 mt-5 online-section-audio">
                <div class="audio-player" data-audio="<?php echo e($general->radio_url); ?>">
                    <div class="timeline">
                        <div class="progress"></div>
                    </div>
                    <div class="controls">
                        <div class="play-container">
                            <div class="toggle-play play"></div>
                            <img src="<?php echo e(sectionImage('online', $content->data_values->wave)); ?>" alt="<?php echo app('translator')->get('image'); ?>"
                                class="music-wave">
                        </div>
                        <div class="right">
                            <h4 class="name text-center"><?php echo app('translator')->get('Listen Radio'); ?></h4>
                            <div class="volume-container">
                                <div class="volume-button">
                                    <div class="volume icono-volumeMedium"></div>
                                </div>

                                <div class="volume-slider">
                                    <div class="volume-percentage"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- online section end -->


<?php $__env->startPush('script'); ?>
    <script>
        'use strict'
        $(window).on("scroll", function() {
            elementEffectLeft();
        });

        function elementEffectLeft() {
            var heroSec = document.querySelector('.hero').clientHeight;

            var element = $(".main-wrapper");
            if ($(this).scrollTop() > heroSec) {
                element.addClass("active");
            } else {
                element.removeClass("active");
            }
        }

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\harmony\core\resources\views/templates/basic/sections/online.blade.php ENDPATH**/ ?>