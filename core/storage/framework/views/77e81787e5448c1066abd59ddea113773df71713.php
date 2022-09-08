<?php $__env->startSection('panel'); ?>

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo app('translator')->get('Poll Question'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Options'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Result'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $polls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('Poll Question'); ?>"><?php echo e(__($poll->question)); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Options'); ?>">
                                            <?php $__currentLoopData = $poll->choice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="badge badge--primary"><?php echo e($item); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Result'); ?>">

                                            <?php
                                                 $total = $poll->pollLogs->count();

                                            ?>

                                            <?php $__currentLoopData = $poll->choice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $count = $poll->pollLogs->where('result', $item)->count();

                                                    if ($count == 0) {
                                                        $percent = 0;
                                                    }else{
                                                        $percent = ($count / $total) * 100;
                                                    }

                                                    echo "{$item}".':'."{$percent} % <br>";
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                            <?php if($poll->status == 1): ?>
                                                <span class="badge badge--success"><?php echo app('translator')->get('Active'); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge--danger"><?php echo app('translator')->get('In Active'); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">

                                            <button class="icon-btn edit" data-poll="<?php echo e($poll); ?>"
                                                data-url="<?php echo e(route('admin.poll.edit', $poll)); ?>"><i
                                                    class="la la-pen"></i></button>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalpoll">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo app('translator')->get('Add Poll'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Poll Question'); ?></label>
                            <input type="text" name="question" id="" class="form-control"
                                placeholder="<?php echo app('translator')->get('poll Question'); ?>">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('Poll Choise'); ?></label>
                            <select name="choice[]" id="" class="select2-auto-tokenize" multiple
                                class="form-control choice"></select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Status'); ?> </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                data-toggle="toggle" data-on="Active" data-off="In Active" data-width="100%" name="status">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--primary"><?php echo app('translator')->get('Save changes'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <button class="btn btn--primary poll"><i class="la la-plus"></i> <?php echo app('translator')->get('Add Poll'); ?></button>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            $('.poll').on('click', function() {
                const modal = $('#modalpoll');
                modal.find('.modal-title').text('Add Poll');
                modal.find('button[type=submit]').text('Create Poll');
                modal.find('input[name=question]').val('')
                modal.find('select').html('');
                modal.find('input[name=status]').bootstrapToggle('off');
                modal.modal('show');
            });

            $('.edit').on('click', function() {
                const modal = $('#modalpoll');
                var poll = $(this).data('poll');
                var option = '';

                for (let index = 0; index < poll.choice.length; index++) {
                    option += "<option selected>" + poll.choice[index] + "</option>"
                }
                modal.find('input[name=question]').val(poll.question)
                modal.find('select').html(option);

                if (poll.status) {
                    modal.find('input[name=status]').bootstrapToggle('on');
                } else {
                    modal.find('input[name=status]').bootstrapToggle('off');
                }

                modal.find('form').attr('action', $(this).data('url'));
                modal.find('.modal-title').text('update Poll');
                modal.find('button[type=submit]').text('update Poll');

                modal.modal('show');
            })
        })

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\harmony\core\resources\views/admin/poll/index.blade.php ENDPATH**/ ?>