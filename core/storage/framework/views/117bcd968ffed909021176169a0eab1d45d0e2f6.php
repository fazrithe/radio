<?php $__env->startPush('style'); ?>
    <style>
        table.dataTable tbody tr td{
            white-space: normal;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('panel'); ?>

    <div id="app">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row justify-content-between">
                            <div class="col-md-7">
                                <ul>
                                    <li>
                                        <h5><?php echo app('translator')->get('Language Keywords of'); ?> <?php echo e(__($la->name)); ?></h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-5 mt-md-0 mt-3">
                                <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-sm btn--primary box--shadow1 text--small float-right"><i class="fa fa-plus"></i> <?php echo app('translator')->get('Add New Key'); ?> </button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive--sm table-responsive">
                            <table class="table table--light tabstyle--two custom-data-table white-space-wrap" id="myTable">
                                <thead>
                                <tr>
                                    <th scope="col"><?php echo app('translator')->get('Key'); ?>
                                    </th>
                                    <th scope="col" class="text-left">
                                        <?php echo e(__($la->name)); ?>

                                    </th>

                                    <th scope="col" class="w-85"><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $json; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('key'); ?>"><?php echo e($k); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Value'); ?>" class="text-left white-space-wrap"><?php echo e($lang); ?></td>


                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                            <a href="javascript:void(0)"
                                               data-target="#editModal"
                                               data-toggle="modal"
                                               data-title="<?php echo e($k); ?>"
                                               data-key="<?php echo e($k); ?>"
                                               data-value="<?php echo e($lang); ?>"
                                               class="editModal icon-btn ml-1"
                                               data-original-title="<?php echo app('translator')->get('Edit'); ?>">
                                                <i class="la la-pencil"></i>
                                            </a>

                                            <a href="javascript:void(0)"
                                               data-key="<?php echo e($k); ?>"
                                               data-value="<?php echo e($lang); ?>"
                                               data-toggle="modal" data-target="#DelModal"
                                               class="icon-btn btn--danger ml-1 deleteKey"
                                               data-original-title="<?php echo app('translator')->get('Remove'); ?>">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"> <?php echo app('translator')->get('Add New'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>

                    <form action="<?php echo e(route('admin.language.store.key',$la->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="key" class="control-label font-weight-bold"><?php echo app('translator')->get('Key'); ?></label>
                                <input type="text" class="form-control form-control-lg " id="key" name="key" placeholder="<?php echo app('translator')->get('Key'); ?>" value="<?php echo e(old('key')); ?>">

                            </div>
                            <div class="form-group">
                                <label for="value" class="control-label font-weight-bold"><?php echo app('translator')->get('Value'); ?></label>
                                <input type="text" class="form-control form-control-lg" id="value" name="value" placeholder="<?php echo app('translator')->get('Value'); ?>" value="<?php echo e(old('value')); ?>">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn--primary"> <?php echo app('translator')->get('Save'); ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('Edit'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>

                    <form action="<?php echo e(route('admin.language.update.key',$la->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group ">
                                <label for="inputName" class="control-label font-weight-bold form-title"></label>
                                <input type="text" class="form-control form-control-lg" name="value" placeholder="<?php echo app('translator')->get('Value'); ?>" value="">
                            </div>
                            <input type="hidden" name="key">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn--primary"><?php echo app('translator')->get('Update'); ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <!-- Modal for DELETE -->
        <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class='fa fa-trash'></i> <?php echo app('translator')->get('Delete'); ?>!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <strong><?php echo app('translator')->get('Are you sure you want to Delete?'); ?></strong>
                    </div>
                    <form action="<?php echo e(route('admin.language.delete.key',$la->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="key">
                        <input type="hidden" name="value">
                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn--danger "><?php echo app('translator')->get('Delete'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('Import Language'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text--danger"><?php echo app('translator')->get('If you import keywords, Your current keywords will be removed and replaced by imported keyword'); ?></p>
                        <div class="form-group">
                        <label for="key" class="control-label font-weight-bold"><?php echo app('translator')->get('Key'); ?></label>
                        <select class="form-control select_lang"  required>
                            <option value=""><?php echo app('translator')->get('Import Keywords'); ?></option>
                            <?php $__currentLoopData = $list_lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($data->id); ?>" <?php if($data->id == $la->id): ?> class="d-none" <?php endif; ?> ><?php echo e(__($data->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                    <button type="button" class="btn btn--primary import_lang"> <?php echo app('translator')->get('Import Now'); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
<button type="button" class="btn btn-sm btn--primary box--shadow1 importBtn"><i class="la la-download"></i><?php echo app('translator')->get('Import Language'); ?></button>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($,document){
            "use strict";
            $('.deleteKey').on('click', function () {
                var modal = $('#DelModal');
                modal.find('input[name=key]').val($(this).data('key'));
                modal.find('input[name=value]').val($(this).data('value'));
            });
            $('.editModal').on('click', function () {
                var modal = $('#editModal');
                modal.find('.form-title').text($(this).data('title'));
                modal.find('input[name=key]').val($(this).data('key'));
                modal.find('input[name=value]').val($(this).data('value'));
            });


            $('.importBtn').on('click', function () {
                $('#importModal').modal('show');
            });
            $(document).on('click','.import_lang',function(){
                var id = $('.select_lang').val();

                if(id ==''){
                    iziToast.error({
                        message: 'Please Select a language to Import',
                        position: "topRight"
                    });

                    return 0;
                }else{
                    $.ajax({
                        type:"post",
                        url:"<?php echo e(route('admin.language.import_lang')); ?>",
                        data:{
                            id : id,
                            myLangid : "<?php echo e($la->id); ?>",
                            _token: "<?php echo e(csrf_token()); ?>"
                        },
                        success:function(data){
                            console.log(data);

                            if (data == 'success'){
                                iziToast.success({
                                    message: 'Import Data Successfully',
                                    position: "topRight"
                                });

                                window.location.href = "<?php echo e(url()->current()); ?>"
                            }
                        },
                        error:function(res){

                        }
                    });
                }

            });
        })(jQuery,document);


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\harmony\core\resources\views/admin/language/edit_lang.blade.php ENDPATH**/ ?>