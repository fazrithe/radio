<div class="tab-pane fade show active" id="day-<?php echo e($tab); ?>" role="tabpanel"
    aria-labelledby="day-<?php echo e($tab); ?>-tab">
    <div class="row gy-4">
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="schedule-card">
                    <div class="schedule-card__thumb">
                        <img src="<?php echo e(getImage('assets/images/program/' . $event->image, '600x600')); ?>"
                            alt="<?php echo app('translator')->get('image'); ?>">
                        
                        <div class="overlay-content">
                            <h3 class="schedule-name"><?php echo e(__($event->event_name)); ?></h3>
                            <p class="time">
                                <?php echo e(\Carbon\Carbon::parse($event->start_time)->format('H:i a') . __(' TO ') . \Carbon\Carbon::parse($event->end_time)->format('H:i a')); ?>

                            </p>
                        </div>
                        
                    </div>
                    <div class="rj">
                        <div class="thumb">
                            <img src="<?php echo e(getImage('assets/images/rj_image/' . $event->jockey->image, '')); ?>"
                                alt="<?php echo app('translator')->get('image'); ?>">
                        </div>
                        <div class="content">
                            <h5 class="name"><?php echo e(__($event->jockey->fullname)); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php /**PATH C:\laragon\www\harmony\core\resources\views/templates/basic/event.blade.php ENDPATH**/ ?>