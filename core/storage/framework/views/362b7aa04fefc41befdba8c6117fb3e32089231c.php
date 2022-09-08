<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold"> <?php echo app('translator')->get('Site Title'); ?> </label>
                                    <input class="form-control form-control-lg" type="text" name="sitename" value="<?php echo e($general->sitename); ?>">
                                </div>
                              
                            </div>

                              <div class="form-group col-md-4 ">
                                    <label class="form-control-label font-weight-bold"> <?php echo app('translator')->get('Admin Email'); ?> </label>
                                    <input class="form-control form-control-lg" type="email" name="admin_email" value="<?php echo e($general->admin_email); ?>">
                                </div>
                             
                       
                            <div class="form-group col-md-4">
                                <label class="form-control-label font-weight-bold"> <?php echo app('translator')->get('Site Base Color'); ?></label>
                                <div class="input-group">
                                <span class="input-group-addon ">
                                    <input type='text' class="form-control form-control-lg colorPicker" value="<?php echo e($general->base_color); ?>"/>
                                </span>
                                    <input type="text" class="form-control form-control-lg colorCode" name="base_color" value="<?php echo e($general->base_color); ?>"/>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-control-label font-weight-bold"> <?php echo app('translator')->get('Site Secondary Color'); ?></label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <input type='text' class="form-control form-control-lg colorPicker" value="<?php echo e($general->secondary_color); ?>"/>
                                </span>
                                    <input type="text" class="form-control form-control-lg colorCode" name="secondary_color" value="<?php echo e($general->secondary_color); ?>"/>
                                </div>
                            </div>

                             <div class="form-group col-md-8 ">
                                    <label class="form-control-label font-weight-bold"> <?php echo app('translator')->get('Radio Url'); ?> </label>
                                    <input class="form-control form-control-lg" type="text" name="radio_url" value="<?php echo e($general->radio_url); ?>">
                                </div>

                     

                            <div class="form-group col-lg-4 col-sm-4 col-md-4">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Email Notification'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="en" <?php if($general->en): ?> checked <?php endif; ?>>
                            </div>

                            <div class="form-group col-lg-4 col-sm-4 col-md-4">
                                <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('SMS Notification'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="sn" <?php if($general->sn): ?> checked <?php endif; ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn--primary btn-block btn-lg"><?php echo app('translator')->get('Update'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/spectrum.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/spectrum.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('style'); ?>
    <style>
        .sp-replacer {
            padding: 0;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 5px 0 0 5px;
            border-right: none;
        }

        .sp-preview {
            width: 100px;
            height: 46px;
            border: 0;
        }

        .sp-preview-inner {
            width: 110px;
        }

        .sp-dd {
            display: none;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(function () {
            "use strict";
            $('.colorPicker').spectrum({
                color: $(this).data('color'),
                change: function (color) {
                    $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
                }
            });

            $('.colorCode').on('input', function () {
                var clr = $(this).val();
                $(this).parents('.input-group').find('.colorPicker').spectrum({
                    color: clr,
                });
            });
        });


    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\radioallomas\core\resources\views/admin/setting/general_setting.blade.php ENDPATH**/ ?>