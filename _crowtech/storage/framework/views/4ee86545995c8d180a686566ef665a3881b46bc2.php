<div class="table-responsive p-20">


    <div class="alert alert-danger d-none" id="custom-module-alert"></div>
    
    <?php if(session('subdomain_module_activated') == 'activated'): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'primary']); ?>
            <span class="mb-12"><strong>Note:</strong></span>
            <span>Since you have activated the subdomain module, Superadmin login url changes.</span>
            <p class="mt-2">New Superadmin Login URL: <strong> <?php echo e(url('/')); ?>/super-admin-login</strong></p>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve(['headType' => 'thead-light'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered table-hover custom-modules-table']); ?>
         <?php $__env->slot('thead', null, []); ?> 
            <th><?php echo app('translator')->get('app.name'); ?></th>
            <th>Purchase Code</th>
            <th><?php echo app('translator')->get('app.currentVersion'); ?></th>
            <th><?php echo app('translator')->get('app.latestVersion'); ?></th>
            <th class="text-right"><?php echo app('translator')->get('app.status'); ?></th>
         <?php $__env->endSlot(); ?>

        <?php $__empty_1 = true; $__currentLoopData = $allModules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($key); ?></td>
                <td>
                    <?php if(in_array($module, $worksuitePlugins)): ?>

                        <?php if(config(strtolower($module) . '.setting')): ?>
                            <?php
                                $settingInstance = config(strtolower($module) . '.setting');

                                $fetchSetting = $settingInstance::first();
                            ?>

                            <?php if(config(strtolower($module) . '.verification_required')): ?>
                                <?php if($fetchSetting->purchase_code): ?>
                                    <span class="blur-code purchase-code"><?php echo e($fetchSetting->purchase_code); ?></span>
                                    <div class="show-hide-purchase-code d-inline" data-toggle="tooltip"
                                         data-original-title="<?php echo e(__('messages.showHidePurchaseCode')); ?>">
                                        <i class="icon far fa-eye-slash cursor-pointer"></i>
                                    </div>
                                    <div class="verify-module d-inline" data-toggle="tooltip"
                                         data-original-title="<?php echo e(__('messages.changePurchaseCode')); ?>"
                                         data-module="<?php echo e(strtolower($module)); ?>"
                                    >
                                        <i class="icon far fa-edit cursor-pointer"></i>
                                    </div>
                                <?php else: ?>
                                    <a href="javascript:;" class="verify-module f-w-500"
                                       data-module="<?php echo e(strtolower($module)); ?>"><?php echo app('translator')->get('app.verifyEnvato'); ?></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if(config(strtolower($module) . '.setting')): ?>
                        <span class="badge badge-secondary"><?php echo e(File::get($module->getPath() . '/version.txt')); ?></span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if(config(strtolower($module) . '.setting') && isset($version[config(strtolower($module) . '.envato_item_id')])): ?>

                        <?php if($version[config(strtolower($module) . '.envato_item_id')] > File::get($module->getPath() . '/version.txt')): ?>
                            <span class="badge badge-primary" data-toggle="tooltip"
                                  data-original-title="Please upgrade the module to latest version">
                                <?php echo e($version[config(strtolower($module) . '.envato_item_id')] ?? '-'); ?>

                            </span>
                        <?php else: ?>
                            <span class="badge badge-secondary">
                                <?php echo e($version[config(strtolower($module) . '.envato_item_id')] ?? '-'); ?>

                            </span>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                <td class="text-right">
                    <div class="custom-control custom-switch"  data-toggle="tooltip"
                         data-original-title="Activate or deactivate <?php echo e($key); ?> module">
                        <input type="checkbox" <?php if(in_array($module, $worksuitePlugins)): ?> checked
                               <?php endif; ?> class="custom-control-input change-module-status"
                               id="module-<?php echo e($key); ?>" data-module-name="<?php echo e($module); ?>">
                        <label class="custom-control-label cursor-pointer" for="module-<?php echo e($key); ?>"></label>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5">
                    <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'calendar','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

    <?php echo $__env->make('vendor.froiden-envato.update.plugins', ['allModules' => $allModules], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<script>
    $('body').on('change', '.change-module-status', function () {
        let moduleStatus;
        const module = $(this).data('module-name');

        if ($(this).is(':checked')) {
            moduleStatus = 'active';
        } else {
            moduleStatus = 'inactive';
        }

        let url = "<?php echo e(route('custom-modules.update', ':module')); ?>";
        url = url.replace(':module', module);

        $('#custom-module-alert').addClass('d-none');

        $.easyAjax({
            url: url,
            type: "POST",
            disableButton: true,
            buttonSelector: ".change-module-status",
            container: '.custom-modules-table',
            blockUI: true,
            data: {
                'id': module,
                'status': moduleStatus,
                '_method': 'PUT',
                '_token': '<?php echo e(csrf_token()); ?>'
            },
            error: function (response) {
                if (response.responseJSON) {
                    $('#custom-module-alert').html(response.responseJSON.message).removeClass('d-none');
                    $('#module-' + module).prop('checked', false);
                }

            }
        });
    });

    $('body').on('click', '.verify-module', function () {
        const module = $(this).data('module');
        let url = "<?php echo e(route('custom-modules.show', ':module')); ?>";
        url = url.replace(':module', module);
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

</script>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/custom-modules/ajax/custom.blade.php ENDPATH**/ ?>