<?php $__env->startSection('panel'); ?>
<?php if($general->sys_version): ?>
<div class="row">
    <div class="col-md-12">

        <div class="card text-white bg-warning mb-3">
            <div class="card-header">
                <h3 class="card-title"> <?php echo app('translator')->get('New Version Available'); ?> <button
                    class="btn btn--dark float-right"><?php echo app('translator')->get('Version'); ?>
                    <?php echo e(json_decode($general->sys_version)->version); ?></button> </h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-dark"><?php echo app('translator')->get('What is the Update ?'); ?></h5>
                    <p>
                        <pre class="font-20"><?php echo e(@json_decode($general->sys_version)->details); ?></pre>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--gradi-44 b-radius--10 box-shadow">
                <div class="icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount"><?php echo e($admin_data['event']); ?></span>
                    </div>
                    <div class="desciption">
                        <span class="text--small"><?php echo app('translator')->get('Total Events'); ?></span>
                    </div>
                    <a href="<?php echo e(route('admin.event.all')); ?>"
                    class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--gradi-7 b-radius--10 box-shadow">
                <div class="icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="numbers">

                        <span class="amount"><?php echo e($admin_data['radio_jockey']); ?></span>

                    </div>
                    <div class="desciption">
                        <span class="text--small"><?php echo app('translator')->get('Total Jockey'); ?></span>
                    </div>

                    <a href="<?php echo e(route('admin.radio.jockey')); ?>"
                    class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--gradi-7 b-radius--10 box-shadow">
                <div class="icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="numbers">

                        <span class="amount"><?php echo e($admin_data['archive']); ?></span>

                    </div>
                    <div class="desciption">
                        <span class="text--small"><?php echo app('translator')->get('Total Archive Event'); ?></span>
                    </div>

                    <a href="<?php echo e(route('admin.event.archive')); ?>"
                    class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--gradi-2 b-radius--10 box-shadow">
                <div class="icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="numbers">

                        <span class="amount"><?php echo e($admin_data['archive_url']); ?></span>

                    </div>
                    <div class="desciption">
                        <span class="text--small"><?php echo app('translator')->get('Pending Archive url'); ?></span>
                    </div>

                    <a href="<?php echo e(route('admin.archive.event.no_url')); ?>"
                    class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3"><?php echo app('translator')->get('View All'); ?></a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->


    </div><!-- row end-->


    <div class="row mb-none-30 mt-5">
        <div class="col-xl-12 col-lg-12 mb-30">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h5 class="card-title"><?php echo app('translator')->get('Events'); ?></h5>
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

                                    <td data-label="User">
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

                                    <td data-label="Event name"><?php echo e($event->event_name); ?></td>
                                    <td data-label="Event Date"><?php echo e($event->week_name); ?></td>

                                    <td data-label="Start Time">
                                        <?php echo e(\Carbon\Carbon::parse($event->start_time)->format('H:i a')); ?></td>
                                        <td data-label="End Time">
                                            <?php echo e(\Carbon\Carbon::parse($event->end_time)->format('H:i a')); ?></td>
                                            <td data-label="Action">

                                                <a href="<?php echo e(route('admin.event.details', $event->id)); ?>" class="icon-btn mr-1"
                                                    data-toggle="tooltip" title="Details" data-original-title="Details">
                                                    <i class="las la-desktop text--shadow"></i>
                                                </a>


                                                <a href="javascript:void(0)" class="icon-btn btn--danger delete"
                                                data-toggle="tooltip" title="Delete" data-original-title="Delete"
                                                data-event="<?php echo e($event->id); ?>">
                                                <i class="las la-trash"></i></i>
                                            </a>

                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%"><?php echo e($empty_message); ?></td>
                                    </tr>
                                    <?php endif; ?>

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-xl-12 col-lg-12 mb-30">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo app('translator')->get('Radio Jockey'); ?></h5>
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
                                    <?php $__empty_1 = true; $__currentLoopData = $jockeys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('User'); ?>">
                                            <div class="user">
                                                <div class="thumb"><img
                                                    src="<?php echo e(getImage('assets/images/rj_image/' . $user->image)); ?>"
                                                    alt="image"></div>
                                                    <span class="<?php echo app('translator')->get('name'); ?>"><?php echo e($user->full_name); ?></span>
                                                </div>
                                            </td>

                                            <td data-label="<?php echo app('translator')->get('Email'); ?>"><?php echo e($user->email); ?></td>

                                            <td data-label="<?php echo app('translator')->get('Phone'); ?>"><?php echo e($user->phone); ?></td>
                                            <td data-label="<?php echo app('translator')->get('Joined At'); ?>"><?php echo e(showDateTime($user->created_at)); ?></td>
                                            <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                                <a href="<?php echo e(route('admin.radio.jockey.details', $user->id)); ?>" class="icon-btn"
                                                    data-toggle="tooltip" title="" data-original-title="Details">
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

                    </div>
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
                        <form action="<?php echo e(route('admin.event.all')); ?>" method="POST">
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
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

            <div class="modal fade" tabindex="-1" role="dialog" id="cronModal">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo app('translator')->get('Cron Job Setting Instruction'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-danger text-center"><?php echo app('translator')->get('Please Set The Cron Job'); ?></h4>
                            <p class="cron mb-2 text-justify"><?php echo app('translator')->get('To Automate the events archived we need to set the cron job. Set The cron time as minimum as possible. Once per 5-10 minutes is ideal.'); ?></p>
                            <div class="input-group mb-3">
                                <label for="" class="w-100 font-weight-bold"><?php echo app('translator')->get('Cron Command'); ?></label>
                                <input type="text" class="form-control form-control-lg copyinput" value="<?php echo e('curl -s '. route('cron')); ?>" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn--primary copy" type="button"><i class="la la-copy"></i></button>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn--secondary" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        </div>
                    </div>
                </div>
            </div>

            <?php $__env->stopSection(); ?>

            <?php $__env->startPush('style'); ?>

            <style>
                .name {
                    color: blue;
                }
                .cron{
                    font-size: 20px;
                }

            </style>

            <?php $__env->stopPush(); ?>
            <?php $__env->startPush('breadcrumb-plugins'); ?>
            <h6 class="text--info">
                <?php if($general->last_cron == null): ?>
                <?php echo app('translator')->get('Cron Not Set Up Yet'); ?>
                <?php else: ?>
                <?php echo app('translator')->get('Last Cron Run '); ?><?php echo e(\Carbon\Carbon::parse($general->last_cron)->diffForHumans()); ?>


                <?php endif; ?>
            </h6>
            <?php $__env->stopPush(); ?>

            <?php $__env->startPush('script'); ?>

            <script>
                'use strict'

                <?php if((now()->diffInMinutes(\Carbon\Carbon::parse($general->last_cron)) > 15) || $general->last_cron == null): ?>)
                $(function() {
                    const modal = $('#cronModal');

                    modal.modal('show');
                })
                <?php endif; ?>

                var copyButton = document.querySelector('.copy');
                var copyInput = document.querySelector('.copyinput');
                copyButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    var text = copyInput.select();
                    document.execCommand('copy');
                });
                copyInput.addEventListener('click', function() {
                    this.select();
                });

                $('.delete').on('click', function() {
                    var modal = $('#deleteModal');
                    var event_id = $(this).data('event');
                    modal.find('input[name=event]').val(event_id);
                    modal.modal('show');
                })

                </script>

                <?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\radioallomas\core\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>