<?php $__env->startSection('panel'); ?>

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo app('translator')->get('Jockey'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Email'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Phone'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Joined At'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $jockies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('User'); ?>">
                                    <div class="user">
                                        <div class="thumb"><img src="<?php echo e(getImage('assets/images/rj_image/'. $user->image)); ?>" alt="<?php echo app('translator')->get('image'); ?>"></div>
                                    <span class="name"><?php echo e(__($user->full_name)); ?></span>
                                    </div>
                                </td>
                                
                                <td data-label="<?php echo app('translator')->get('Email'); ?>"><?php echo e(__($user->email)); ?></td>

                                <td data-label="<?php echo app('translator')->get('Phone'); ?>"><?php echo e(__($user->phone)); ?></td>
                                <td data-label="<?php echo app('translator')->get('Joined At'); ?>"><?php echo e(showDateTime($user->created_at)); ?></td>
                                <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                    <a href="<?php echo e(route('admin.radio.jockey.details', $user->id)); ?>" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Details">
                                        <i class="las la-desktop text--shadow"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-muted text-center" colspan="100%"><?php echo e(__($empty_message)); ?></td>
                                </tr>
                            <?php endif; ?>

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
             <?php if($jockies->hasPages()): ?>
                <div class="card-footer py-4">
                    <?php echo e($jockies->links('admin.partials.paginate')); ?>

                </div>
            <?php endif; ?>
            </div><!-- card end -->
        </div>


    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('breadcrumb-plugins'); ?>
<a href="<?php echo e(route('admin.radio.jockey.add')); ?>" class="btn btn--primary float-sm-right ml-4"> <i class="las la-plus"></i> <?php echo app('translator')->get('Create Jockey'); ?></a>

    <form action="<?php echo e(route('admin.radio.jockey.search',request('search'))); ?>" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('Email of Jockey'); ?>"
                value="<?php echo e($search ?? ''); ?>">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\harmony\core\resources\views/admin/jokies/showall.blade.php ENDPATH**/ ?>