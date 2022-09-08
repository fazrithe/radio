<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light tabstyle--two custom-data-table">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Code'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Default'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Actions'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-label="<?php echo app('translator')->get('Name'); ?>"><?php echo e(__($item->name)); ?>

                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Code'); ?>"><strong><?php echo e(__($item->code)); ?></strong></td>
                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                        <?php if($item->is_default == 1): ?>
                                            <span class="text--small badge font-weight-normal badge--success"><?php echo app('translator')->get('Default'); ?></span>
                                        <?php else: ?>
                                            <span class="text--small badge font-weight-normal badge--warning"><?php echo app('translator')->get('Selectable'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                        <a href="<?php echo e(route('admin.language.key', $item->id)); ?>" class="icon-btn btn--success" data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('Translate'); ?>">
                                            <i class="la la-code"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="icon-btn ml-1 editBtn" data-original-title="<?php echo app('translator')->get('Edit'); ?>" data-toggle="tooltip" data-url="<?php echo e(route('admin.language.manage.update', $item->id)); ?>" data-lang="<?php echo e(json_encode($item->only('name', 'text_align', 'is_default'))); ?>" data-icon="<?php echo e(getImage($path .'/'. $item->icon,$size)); ?>">
                                            <i class="la la-edit"></i>
                                        </a>
                                        <?php if($item->id != 1): ?>
                                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn" data-original-title="<?php echo app('translator')->get('Delete'); ?>" data-toggle="tooltip" data-url="<?php echo e(route('admin.language.manage.del', $item->id)); ?>">
                                                <i class="la la-trash"></i>
                                            </a>
                                        <?php endif; ?>

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
            </div><!-- card end -->
        </div>
    </div>



    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-square"></i> <?php echo app('translator')->get('Add New Language'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo e(route('admin.language.manage.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-row form-group">
                            <label class="font-weight-bold "><?php echo app('translator')->get('Language Name'); ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="code" name="name" placeholder="<?php echo app('translator')->get('e.g. Japaneese, Portuguese'); ?>" required>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <label class="font-weight-bold"><?php echo app('translator')->get('Language Code'); ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="link" name="code" placeholder="<?php echo app('translator')->get('e.g. jp, pt-br'); ?>" required>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <div class="col-md-6  d-none">
                                <label class="font-weight-bold"><?php echo app('translator')->get('Text Direction'); ?> <span class="text-danger">*</span></label>
                                <select name="text_align" class="form-control">
                                    <option value="0"><?php echo app('translator')->get('Left to Right'); ?></option>
                                    <option value="1"><?php echo app('translator')->get('Right to Left'); ?></option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="inputName" class=""><?php echo app('translator')->get('Default Language'); ?> <span class="text-danger">*</span></label>
                                <input type="checkbox" data-width="100%" data-height="40px" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('SET'); ?>" data-off="<?php echo app('translator')->get('UNSET'); ?>" name="is_default">
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--primary" id="btn-save" value="add"><?php echo app('translator')->get('Save'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-fw fa-share-square"></i><?php echo app('translator')->get('Edit Language'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-row">
                            <label for="inputName" class="font-weight-bold"><?php echo app('translator')->get('Language Name'); ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold" id="code" name="name" required>
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <label for="inputName" class="font-weight-bold"><?php echo app('translator')->get('Default Language'); ?> <span class="text-danger">*</span></label>
                            <input type="checkbox" data-width="100%" data-height="40px" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('SET'); ?>" data-off="<?php echo app('translator')->get('UNSET'); ?>" name="is_default">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--primary" id="btn-save" value="add"><?php echo app('translator')->get('Update'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('Remove Language'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form method="post" action="">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="delete_id" id="delete_id" class="delete_id" value="0">
                    <div class="modal-body">
                        <p class="text-muted"><?php echo app('translator')->get('Are you sure you want to Delete?'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--danger deleteButton"><?php echo app('translator')->get('Delete'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a class="btn btn-sm btn--primary box--shadow1 text-white text--small" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-plus"></i><?php echo app('translator')->get('Add New Language'); ?></a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($){
            "use strict";
            $('.editBtn').on('click', function () {
                var modal = $('#editModal');
                var url = $(this).data('url');
                var icon = $(this).data('icon');
                var lang = $(this).data('lang');

                modal.find('form').attr('action', url);
                modal.find('.language-icon').attr('src',icon);
                modal.find('input[name=name]').val(lang.name);
                modal.find('select[name=text_align]').val(lang.text_align);
                if (lang.is_default == 1) {
                    modal.find('input[name=is_default]').bootstrapToggle('on');
                } else {
                    modal.find('input[name=is_default]').bootstrapToggle('off');
                }
                modal.modal('show');
            });

            $('.deleteBtn').on('click', function () {
                var modal = $('#deleteModal');
                var url = $(this).data('url');

                modal.find('form').attr('action', url);
                modal.modal('show');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\harmony\core\resources\views/admin/language/lang.blade.php ENDPATH**/ ?>