<?php $__env->startSection('panel'); ?>

    <div class="row mb-none-30 justify-content-center">

        <div class="col-lg-12 pl-lg-5">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body p-0">
                    <div class="p-3 bg--white">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group mt-3">
                                        <div class="image-upload">
                                            <div class="thumb">
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview">
                                                        <button type="button" class="remove-image"><i
                                                                class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="avatar-edit">
                                                    <input type="file" class="profilePicUpload" name="image"
                                                        id="profilePicUpload1" accept=".png, .jpg, .jpeg" required>
                                                    <label for="profilePicUpload1" class="bg--primary"><?php echo app('translator')->get('Upload Program
                                                        Images'); ?></label>
                                                    <small class="mt-2 text-facebook"><?php echo app('translator')->get('Supported files'); ?>: <b>jpeg,
                                                            jpg</b>.
                                                        <?php echo app('translator')->get('Image will be resized into'); ?>
                                                        <?php echo e(imagePath()['program']['size']); ?>px
                                                    </small>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for=""><?php echo app('translator')->get('Radio Jockey'); ?></label>
                                            <select name="jockey_id" id="jockey" class="form-control" required>
                                                <option value=""><?php echo app('translator')->get('Select Radio jockey'); ?></option>
                                                <?php $__currentLoopData = $jockeys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jockey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($jockey->id); ?>">
                                                        <?php echo e($jockey->full_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for=""><?php echo app('translator')->get('Event Name'); ?></label>
                                            <input type="text" name="event_name" class="form-control"
                                                placeholder="<?php echo app('translator')->get('Event Name"'); ?> value="<?php echo e(old('event_name')); ?>" required>
                                                </div>

                                                <div class="form-group col-md-12">
                                                        <label for=""><?php echo app('translator')->get(' Event Week Name'); ?></label>
                                                    <select name="week_name" id="" class="form-control">
                                                        <option value="saturday"><?php echo app('translator')->get('Saturday'); ?></option>
                                                        <option value="sunday"><?php echo app('translator')->get('Sunday'); ?></option>
                                                        <option value="monday"><?php echo app('translator')->get('Monday'); ?></option>
                                                        <option value="tuesday"><?php echo app('translator')->get('Tuesday'); ?></option>
                                                        <option value="wednesday"><?php echo app('translator')->get('Wednesday'); ?></option>
                                                        <option value="thursday"><?php echo app('translator')->get('Thursday'); ?></option>
                                                        <option value="friday"><?php echo app('translator')->get('Friday'); ?></option>
                                                    </select>
                                            

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><?php echo app('translator')->get('Event Start Time'); ?></label>
                                            <input type="text" name="start_time" id="" class="form-control timepicker"
                                                value="<?php echo e(old('start_time')); ?>" autocomplete="off"
                                                placeholder="<?php echo app('translator')->get('Event Start Time'); ?>" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><?php echo app('translator')->get('Event End Time'); ?></label>
                                            <input type="text" name="end_time" class="form-control timepicker"
                                                value="<?php echo e(old('end_time')); ?>" autocomplete="off"
                                                placeholder="<?php echo app('translator')->get('Event End Time'); ?>" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <input type="submit" class="form-control btn btn--primary" value="Create Event">
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-lib'); ?>


    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/vendor/timepicker.min.css')); ?>">


<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('assets/admin/js/vendor/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/vendor/datepicker.en.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/vendor/timepicker.min.js')); ?>"></script>
    <script>
        'use strict'
        $('.datepicker-here').datepicker();
        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            dropdown: true,
            scrollbar: true
        });

    </script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('style'); ?>

    <style>
        span {
            font-size: 0.75rem;
            color: black;
        }

    </style>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\harmony\core\resources\views/admin/event/createevent.blade.php ENDPATH**/ ?>