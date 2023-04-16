<?php $__env->startSection('content'); ?>

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        
        <?php if(user()->is_superadmin): ?>
            <?php if (isset($component)) { $__componentOriginal606f9c85fba5ff61faa868d16f4e587ec895461f = $component; } ?>
<?php $component = App\View\Components\SuperAdmin\SettingSidebar::resolve(['activeMenu' => $activeSettingMenu] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('super-admin.setting-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SuperAdmin\SettingSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal606f9c85fba5ff61faa868d16f4e587ec895461f)): ?>
<?php $component = $__componentOriginal606f9c85fba5ff61faa868d16f4e587ec895461f; ?>
<?php unset($__componentOriginal606f9c85fba5ff61faa868d16f4e587ec895461f); ?>
<?php endif; ?>
        <?php else: ?>
            <?php if (isset($component)) { $__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b = $component; } ?>
<?php $component = App\View\Components\SettingSidebar::resolve(['activeMenu' => $activeSettingMenu] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b)): ?>
<?php $component = $__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b; ?>
<?php unset($__componentOriginalf9dcf9e0132687b6b5d826e52f2f3d6c594b585b); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e = $component; } ?>
<?php $component = App\View\Components\SettingCard::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('buttons', null, []); ?> 
                <?php if (isset($component)) { $__componentOriginalfdb1c63d872b5888756899da3f1608907c585540 = $component; } ?>
<?php $component = App\View\Components\CronMessage::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cron-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\CronMessage::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfdb1c63d872b5888756899da3f1608907c585540)): ?>
<?php $component = $__componentOriginalfdb1c63d872b5888756899da3f1608907c585540; ?>
<?php unset($__componentOriginalfdb1c63d872b5888756899da3f1608907c585540); ?>
<?php endif; ?>
             <?php $__env->endSlot(); ?>
             <?php $__env->slot('header', null, []); ?> 
                <div class="s-b-n-header" id="tabs">
                    <nav class="tabs px-4 border-bottom-grey">
                        <div class="nav" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link f-15 active app-setting"
                               href="<?php echo e(route('app-settings.index')); ?>" role="tab" aria-controls="nav-ticketAgents"
                               aria-selected="true"><?php echo app('translator')->get('app.menu.appSettings'); ?>
                            </a>
                            <?php if(!user()->is_superadmin): ?>
                                <a class="nav-item nav-link f-15 client-signup-setting"
                                   href="<?php echo e(route('app-settings.index')); ?>?tab=client-signup-setting" role="tab"
                                   aria-controls="nav-ticketTypes" aria-selected="true"
                                   ajax="false"><?php echo app('translator')->get('app.clientSignUpSettings'); ?>
                                </a>
                            <?php endif; ?>
                            <?php if(user()->is_superadmin): ?>
                                <a class="nav-item nav-link f-15 file-upload-setting"
                                   href="<?php echo e(route('app-settings.index')); ?>?tab=file-upload-setting" role="tab"
                                   aria-controls="nav-ticketTypes" aria-selected="true" ajax="false"><?php echo app('translator')->get('modules.accountSettings.fileUploadSetting'); ?>
                                </a>

                                <a class="nav-item nav-link f-15 google-map-setting"
                                   href="<?php echo e(route('app-settings.index')); ?>?tab=google-map-setting" role="tab"
                                   aria-controls="nav-ticketTypes" aria-selected="true"
                                   ajax="false"><?php echo app('translator')->get('app.googleMapSettings'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </nav>
                </div>
             <?php $__env->endSlot(); ?>

            
            <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e)): ?>
<?php $component = $__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e; ?>
<?php unset($__componentOriginalb44089abe45f2c89173e85ef93b9bf2aa54af94e); ?>
<?php endif; ?>

    </div>
    <!-- SETTINGS END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        /* manage menu active class */
        $('.nav-item').removeClass('active');
        const activeTab = "<?php echo e($activeTab); ?>";
        $('.' + activeTab).addClass('active');

        $("body").on("click", "#editSettings .nav a", function(event) {
            event.preventDefault();

            $('.nav-item').removeClass('active');
            $(this).addClass('active');

            const requestUrl = this.href;

            $.easyAjax({
                url: requestUrl,
                blockUI: true,
                container: "#nav-tabContent",
                historyPush: true,
                success: function(response) {
                    if (response.status === "success") {
                        $('#nav-tabContent .flex-wrap').html(response.html);
                        init('#nav-tabContent');
                    }
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/app-settings/index.blade.php ENDPATH**/ ?>