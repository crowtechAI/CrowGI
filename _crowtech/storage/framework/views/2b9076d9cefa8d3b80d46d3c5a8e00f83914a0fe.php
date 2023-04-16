<?php
$manageShiftPermission = user()->permission('manage_employee_shifts');
?>
<div class="table-responsive">
    <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered']); ?>
         <?php $__env->slot('thead', null, []); ?> 
            <th><?php echo app('translator')->get('app.name'); ?></th>
            <th><?php echo app('translator')->get('app.time'); ?></th>
            <th><?php echo app('translator')->get('app.others'); ?></th>
            <?php if($manageShiftPermission == 'all'): ?>
                <th>&nbsp;</th>
                <th class="text-right pr-20"><?php echo app('translator')->get('app.action'); ?></th>
            <?php endif; ?>
         <?php $__env->endSlot(); ?>

        <?php $__empty_1 = true; $__currentLoopData = $employeeShifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="row<?php echo e($shift->id); ?>">
                <td>
                    <span class="badge badge-info f-12 p-1" style="background-color: <?php echo e($shift->color); ?>">
                        <?php echo e($shift->shift_name); ?></span>
                </td>
                <td>
                    <div class="f-11"><?php echo app('translator')->get('modules.employees.startTime'); ?>:
                        <?php echo e(\Carbon\Carbon::createFromFormat('H:i:s', $shift->office_start_time)->translatedFormat(company()->time_format)); ?>

                    </div>
                    <div class="f-11">
                        <?php echo app('translator')->get('modules.attendance.halfDay'); ?>:
                        <?php echo e($shift->halfday_mark_time? \Carbon\Carbon::createFromFormat('H:i:s', $shift->halfday_mark_time)->translatedFormat(company()->time_format): ''); ?>

                    </div>
                    <div class="f-11">
                        <?php echo app('translator')->get('modules.employees.endTime'); ?>:
                        <?php echo e(\Carbon\Carbon::createFromFormat('H:i:s', $shift->office_end_time)->translatedFormat(company()->time_format)); ?>

                    </div>
                </td>
                <td>
                    <div class="f-11">
                        <?php echo app('translator')->get('modules.attendance.lateMark'); ?>: <?php echo e($shift->late_mark_duration); ?>

                    </div>
                    <div class="f-11">
                        <?php echo app('translator')->get('modules.attendance.checkininday'); ?>: <?php echo e($shift->clockin_in_day); ?>

                    </div>
                    <div class="f-11">
                        <?php echo app('translator')->get('modules.attendance.officeOpenDays'); ?>:

                        <?php $__currentLoopData = json_decode($shift->office_open_days); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($weekMap[$item]); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </td>
                <?php if($manageShiftPermission == 'all'): ?>

                        <td>
                            <?php if (isset($component)) { $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785 = $component; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'shift_'.e($shift->id).'','fieldLabel' => __('app.default'),'fieldName' => 'set_default_shift','fieldValue' => ''.e($shift->id).'','checked' => $shift->id == attendance_setting()->default_employee_shift ? 'checked' : ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Radio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'set_default_shift','data-shift-id' => ''.e($shift->id).'']); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785)): ?>
<?php $component = $__componentOriginald8738d15765d6b35d603018b407a63f14ee18785; ?>
<?php unset($__componentOriginald8738d15765d6b35d603018b407a63f14ee18785); ?>
<?php endif; ?>
                        </td>
                        <td class="text-right pr-20">
                            <div class="task_view mb-1">
                                <a href="javascript:;" data-shift-id="<?php echo e($shift->id); ?>"
                                    class="edit-shift task_view_more d-flex align-items-center justify-content-center" data-toggle="tooltip"
                                    data-original-title="<?php echo app('translator')->get('app.edit'); ?>"> <i
                                        class="fa fa-edit icons"></i>
                                </a>
                            </div>
                            <?php if($shift->id != attendance_setting()->default_employee_shift): ?>
                                <div class="task_view mt-1 mt-lg-0 mt-md-0">
                                    <a href="javascript:;" data-shift-id="<?php echo e($shift->id); ?>"
                                        class="delete-shift task_view_more d-flex align-items-center justify-content-center dropdown-toggle" data-toggle="tooltip"
                                        data-original-title="<?php echo app('translator')->get('app.delete'); ?>">
                                        <i class="fa fa-trash icons"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="4">
                    <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'user','message' => __('messages.noAgentAdded')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33)): ?>
<?php $component = $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33; ?>
<?php unset($__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33); ?>
<?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6)): ?>
<?php $component = $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6; ?>
<?php unset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6); ?>
<?php endif; ?>
</div>

<script>
    $('body').on('click', '#addEmployeeShift', function() {
        var url = "<?php echo e(route('employee-shifts.create')); ?>";
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('body').on('click', '.edit-shift', function() {
        var shiftID = $(this).data('shift-id');
        var url = "<?php echo e(route('employee-shifts.edit', ':id')); ?>";
        url = url.replace(':id', shiftID);

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    /* delete shift */
    $('body').on('click', '.delete-shift', function() {
        var id = $(this).data('shift-id');

        Swal.fire({
            title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
            text: "<?php echo app('translator')->get('messages.removeShiftText'); ?>",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
            cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
            customClass: {
                confirmButton: 'btn btn-primary mr-3',
                cancelButton: 'btn btn-secondary'
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                var url = "<?php echo e(route('employee-shifts.destroy', ':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    blockUI: true,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            $('.row' + id).fadeOut(100);
                        }
                    }
                });
            }
        });
    });

    $('body').on('click', '.set_default_shift', function() {
        var shiftID = $(this).data('shift-id');
        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            url: "<?php echo e(route('employee-shifts.set_default')); ?>",
            type: "POST",
            data: {
                shiftID: shiftID,
                _token: token
            },
            blockUI: true,
            container: '#editSettings',
            success: function(response) {
                if (response.status == "success") {
                    window.location.reload();
                }
            }
        });
    });

</script>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/attendance-settings/ajax/shift.blade.php ENDPATH**/ ?>