<?php $__env->startSection('panel'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">

                    <div class="table-responsive table-responsive--lg">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo app('translator')->get('SL'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Email'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Icon'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Title'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Url'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Background'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $__empty_1 = true; $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('SL'); ?>"><?php echo e($loop->iteration); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Email'); ?>"><?php echo e(__($social->jockey->email)); ?></td>

                                        <td data-label="<?php echo app('translator')->get('Icon'); ?>"><?= $social->icon ?></td>
                                        <td data-label="<?php echo app('translator')->get('Title'); ?>"><?php echo e($social->title); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Url'); ?>"><?php echo e($social->url); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Background'); ?>"><?php echo e($social->bgcolor); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                            <button class="icon-btn updateBtn" data-id="5"
                                                    data-all="<?php echo e($social); ?>"><i
                                                    class="la la-pencil-alt"></i></button>
                                            <button class="icon-btn btn--danger removeBtn" data-id="<?php echo e($social->id); ?>" data-url="<?php echo e(route('admin.rjs.delete',$social->id)); ?>"><i
                                                    class="la la-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                        <div class="card-footer py-4">
                            <?php echo e($socials->links('admin.partials.paginate')); ?>

                        </div>
                </div>
            </div>
        </div>





        <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> <?php echo app('translator')->get('Add New Social icon Item'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo e(route('admin.radio.social.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="modal-body">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Jockey Email'); ?></label>
                                <select name="radio_jockey_id" id="" class="form-control" required>
                                <option value=""><?php echo app('translator')->get('Select an Email'); ?></option>
                                <?php $__currentLoopData = $jockeys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $joc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($joc->id); ?>"><?php echo e($joc->email); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Title'); ?></label>
                                <input type="text" class="form-control" placeholder="Title" name="title" required />
                            </div>


                            <div class="form-group">
                                <label><?php echo app('translator')->get('Icon'); ?></label>
                                <div class="input-group has_append">
                                    <input type="text" class="form-control" name="icon" required>

                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary iconPicker " data-icon="fas fa-home"
                                            role="iconpicker"></button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label"><?php echo app('translator')->get('Social Icon Color'); ?></label>
                                <div class="input-group">
                                <span class="input-group-addon ">
                                    <input type='text' class="form-control  form-control-lg colorPicker"
                                           value="<?php echo e($general->secondary_color); ?>"/>
                                </span>
                                    <input type="text" class="form-control form-control-lg colorCode" name="bgcolor"
                                           value="<?php echo e($general->secondary_color); ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?php echo app('translator')->get('Url'); ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo app('translator')->get('Url'); ?>" name="url" required />
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn--primary"><?php echo app('translator')->get('Save'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





        <div id="updateModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> <?php echo app('translator')->get('Update Social icon Item'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo e(route('admin.rjs.update')); ?>" class="edit-route" method="POST">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="id" value="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Jockey Email'); ?></label>
                                <select name="radio_jockey_id" id="jockey" class="form-control" required>
                                <?php $__currentLoopData = $jockeys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $joc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($joc->id); ?>"><?php echo e($joc->email); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><?php echo app('translator')->get('Title'); ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo app('translator')->get('Title'); ?>" name="title" required />
                            </div>


                             <div class="form-group">
                                <label><?php echo app('translator')->get('Icon'); ?></label>
                                <div class="input-group has_append">
                                    <input type="text" class="form-control" name="icon" required>

                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary iconPicker " data-icon="fas fa-home"
                                            role="iconpicker"></button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label"><?php echo app('translator')->get('Social Icon Color'); ?></label>
                                <div class="input-group">
                                <span class="input-group-addon ">
                                    <input type='text' class="form-control  form-control-lg colorPicker" id="color"
                                           value="<?php echo e($general->secondary_color); ?>"/>
                                </span>
                                    <input type="text" class="form-control form-control-lg colorCode" name="bgcolor"
                                           value="<?php echo e($general->secondary_color); ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?php echo app('translator')->get('Url'); ?></label>
                                <input type="text" class="form-control" placeholder="Url" name="url" required />
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn--primary"><?php echo app('translator')->get('Update'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <div id="removeModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo app('translator')->get('Confirmation'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <p class="font-weight-bold"><?php echo app('translator')->get('Are you sure you want to delete this item? Once deleted can not be undo
                                this action.'); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn--danger"><?php echo app('translator')->get('Remove'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
        <button class="btn btn--primary mr-3 m-top" id="add"><?php echo app('translator')->get('Add Icon'); ?> <i class="fa fa-plus"></i></button>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('style-lib'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/spectrum.css')); ?>">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
        <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap-iconpicker.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-lib'); ?>
        <script src="<?php echo e(asset('assets/admin/js/spectrum.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>

    <style>
        .m-top{
            margin-top: 3px;
        }
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
            'use strict';

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

            $('.removeBtn').on('click', function () {
                var modal = $('#removeModal');
                modal.find('form').attr('action',$(this).data('url'))
                modal.modal('show');
            });

            $('#add').on('click', function () {
                var modal = $('#addModal');
                modal.modal('show');
            });

            $('.updateBtn').on('click',function(){
                 var modal = $('#updateModal');
                 var data  = $(this).data('all');
                 $('#jockey').val(data.radio_jockey_id);
                  modal.find('input[name=id]').val(data.id);
                  modal.find('input[name=title]').val(data.title);
                  modal.find('input[name=icon]').val(data.icon);
                  modal.find('input[name=url]').val(data.url);
                  $('#color').val(data.bgcolor);
                  modal.find('input[name=bgcolor]').val(data.bgcolor);
                  modal.modal('show');
            });

            $('#updateBtn').on('shown.bs.modal', function (e) {
                $(document).off('focusin.modal');
            });
            $('#addModal').on('shown.bs.modal', function (e) {
                $(document).off('focusin.modal');
            });

            $('.iconPicker').iconpicker({
                align: 'center', // Only in div tag
                arrowClass: 'btn-danger',
                arrowPrevIconClass: 'fas fa-angle-left',
                arrowNextIconClass: 'fas fa-angle-right',
                cols: 10,
                footer: true,
                header: true,
                icon: 'fas fa-bomb',
                iconset: 'fontawesome5',
                labelHeader: '{0} of {1} pages',
                labelFooter: '{0} - {1} of {2} icons',
                placement: 'bottom', // Only in button tag
                rows: 5,
                search: true,
                searchText: 'Search icon',
                selectedClass: 'btn-success',
                unselectedClass: ''
            }).on('change', function (e) {
                $(this).parent().siblings('input[name=icon]').val(`<i class="${e.icon}"></i>`);
            });
        </script>

<?php $__env->stopPush(); ?>



<?php $__env->startPush('breadcrumb-plugins'); ?>
    <form action="<?php echo e(route('admin.radio.jockey.social.search',request('search'))); ?>" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="Email of Jockey"
                value="<?php echo e($search ?? ''); ?>">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\harmony\core\resources\views/admin/jokies/social.blade.php ENDPATH**/ ?>