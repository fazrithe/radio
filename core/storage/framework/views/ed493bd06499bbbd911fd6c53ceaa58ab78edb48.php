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
                                    <th scope="col"><?php echo app('translator')->get('Event name'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Event Day'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Start Time'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('End Time'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>

                                        <td data-label="<?php echo app('translator')->get('User'); ?>">
                                            <div class="user">
                                                <div class="thumb"><img
                                                        src="<?php echo e(getImage('assets/images/rj_image/' . $event->jockey->image)); ?>"
                                                        alt="<?php echo app('translator')->get('image'); ?>"></div>
                                                <a class="joc"
                                                    href="<?php echo e(route('admin.radio.jockey.details', $event->jockey->id)); ?>">
                                                    <span class="name"><?php echo e($event->jockey->full_name); ?></span>
                                                </a>
                                            </div>
                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Event_name'); ?>"><?php echo e(__($event->event_name)); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Event Day'); ?>"><?php echo e(__($event->week_name)); ?></td>

                                        <td data-label="<?php echo app('translator')->get('Start_time'); ?>"><?php echo e(\Carbon\Carbon::parse($event->start_time)->format('H:i a')); ?></td>
                                        <td data-label="<?php echo app('translator')->get('End_time'); ?>"><?php echo e(\Carbon\Carbon::parse($event->end_time)->format('H:i a')); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">

                                            <a href="<?php echo e(route('admin.event.details', $event->id)); ?>" class="icon-btn mr-1"
                                                data-toggle="tooltip" title="Details" data-original-title="Details">
                                                <i class="las la-desktop text--shadow"></i>
                                            </a>


                                            <a href="javascript:void(0)" class="icon-btn btn--danger delete" data-toggle="tooltip"
                                            title="Delete" data-original-title="Delete" data-event="<?php echo e($event->id); ?>" data-url="<?php echo e(route('admin.event.delete',$event->id)); ?>">
                                                <i class="las la-trash"></i></i>
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
                <div class="card-footer py-4">
                    <?php echo e($events->links('admin.partials.paginate')); ?>

                </div>
            </div><!-- card end -->
        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Delete Events'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form  method="POST">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="form-control" id="event" value="" name="event">
                            <p class="text--danger font-weight-bold"><?php echo app('translator')->get('Are you sure to delete this Event'); ?> ?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--danger"><?php echo app('translator')->get('Delete Event'); ?> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php $__env->startPush('breadcrumb-plugins'); ?>
<a href="<?php echo e(route('admin.event.create')); ?>" class="btn btn--primary float-sm-right ml-4"><?php echo app('translator')->get('Create Events'); ?></a>
    <form action="<?php echo e(route('admin.event.search',request('search'))); ?>" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('Event name'); ?>"
                value="<?php echo e($search ?? ''); ?>">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>

<?php $__env->stopPush(); ?>


<?php $__env->startPush('style'); ?>

    <style>
        .name {
            color: blue;
        }

    </style>

<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>

    <script>
        'use strict'

        $('.delete').on('click',function(){
            var modal = $('#deleteModal');
            var event_id = $(this).data('event');
            modal.find('input[name=event]').val(event_id);
            modal.find('form').attr('action',$(this).data('url'));
            modal.modal('show');
        })



    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\harmony\core\resources\views/admin/event/showall.blade.php ENDPATH**/ ?>