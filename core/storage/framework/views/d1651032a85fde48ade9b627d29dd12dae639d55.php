<?php $__env->startSection('panel'); ?>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive table-responsive--sm">
                        <table class=" table align-items-center table--light">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Short Code'); ?> </th>
                                <th><?php echo app('translator')->get('Description'); ?></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <tr>
                                <td data-label="<?php echo app('translator')->get('Short Code'); ?>">{{name}}</td>
                                <td data-label="<?php echo app('translator')->get('Description'); ?>"><?php echo app('translator')->get('User Name'); ?></td>
                            </tr>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('Short Code'); ?>">{{message}}</td>
                                <td data-label="<?php echo app('translator')->get('Description'); ?>"><?php echo app('translator')->get('Message'); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="<?php echo e(route('admin.email.template.global')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label class="font-weight-bold"><?php echo app('translator')->get('Email Sent From'); ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg" placeholder="<?php echo app('translator')->get('Email address'); ?>" name="email_from" value="<?php echo e($general_setting->email_from); ?>" required/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="font-weight-bold"><?php echo app('translator')->get('Email Body'); ?> <span class="text-danger">*</span></label>
                                <textarea name="email_template" rows="10" class="form-control form-control-lg nicEdit" placeholder="<?php echo app('translator')->get('Your email template'); ?>"><?php echo e($general_setting->email_template); ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn--primary mr-2"><?php echo app('translator')->get('Update'); ?></button>
                    </form>
                </div>
            </div><!-- card end -->
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\harmony\core\resources\views/admin/email_template/email_template.blade.php ENDPATH**/ ?>