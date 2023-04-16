<?php $__env->startPush('styles'); ?>
    <script src="<?php echo e(asset('vendor/jquery/frappe-charts.min.iife.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- CONTENT WRAPPER START -->
    <div class="px-4 py-0 py-lg-4 border-top-0 super-admin-dashboard">
        <div class="row">
            <?php echo $__env->make('dashboard.update-message-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if (isset($component)) { $__componentOriginalfdb1c63d872b5888756899da3f1608907c585540 = $component; } ?>
<?php $component = App\View\Components\CronMessage::resolve(['modal' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cron-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\CronMessage::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfdb1c63d872b5888756899da3f1608907c585540)): ?>
<?php $component = $__componentOriginalfdb1c63d872b5888756899da3f1608907c585540; ?>
<?php unset($__componentOriginalfdb1c63d872b5888756899da3f1608907c585540); ?>
<?php endif; ?>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('superadmin.dashboard.totalCompany'),'value' => $totalCompanies,'icon' => 'building'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a)): ?>
<?php $component = $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a; ?>
<?php unset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a); ?>
<?php endif; ?>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('superadmin.dashboard.activeCompany'),'value' => $activeCompanies,'icon' => 'store'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a)): ?>
<?php $component = $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a; ?>
<?php unset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a); ?>
<?php endif; ?>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('superadmin.dashboard.licenseExpired'),'value' => $expiredCompanies,'icon' => 'ban'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a)): ?>
<?php $component = $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a; ?>
<?php unset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a); ?>
<?php endif; ?>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('superadmin.dashboard.inactiveCompany'),'value' => $inactiveCompanies,'icon' => 'store-slash'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a)): ?>
<?php $component = $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a; ?>
<?php unset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a); ?>
<?php endif; ?>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                <?php if (isset($component)) { $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a = $component; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('superadmin.dashboard.totalPackages'),'value' => $totalPackages,'icon' => 'boxes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a)): ?>
<?php $component = $__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a; ?>
<?php unset($__componentOriginal3372d3ef031d7cb240e013bd2685bbb8031ec38a); ?>
<?php endif; ?>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-12 col-lg-6 mt-4">
                <?php echo $__env->make('super-admin.dashboard.recent-registered-companies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-sm-12 col-lg-6 mt-4">
                <?php echo $__env->make('super-admin.dashboard.top-user-count-companies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-sm-12 col-lg-6 mt-4">
                <?php echo $__env->make('super-admin.dashboard.recent-subscriptions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-sm-12 col-lg-6 mt-4">
                <?php echo $__env->make('super-admin.dashboard.recent-license-expired', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-sm-12 col-lg-6 mt-4">
                <?php echo $__env->make('super-admin.dashboard.package-company-count', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-sm-12 col-lg-6 mt-4">
                <?php echo $__env->make('super-admin.dashboard.charts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
    <!-- CONTENT WRAPPER END -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
    $('#registration_year').change(function() {
        const year = $(this).val();

        let url = `<?php echo e(route('superadmin.super_admin_dashboard')); ?>`;
        const string = `?year=${year}`;
        url += string;

        window.location.href = url;
    });
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/super-admin/dashboard/index.blade.php ENDPATH**/ ?>