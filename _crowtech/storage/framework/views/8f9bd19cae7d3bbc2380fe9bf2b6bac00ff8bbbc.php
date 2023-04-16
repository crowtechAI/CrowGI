<?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('superadmin.dashboard.registrationsChart')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('action', null, []); ?> 
        <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldName' => 'registration_year','fieldId' => 'registration_year'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <option
                <?php echo e((request()->year ==  now(global_setting()->timezone)->year) ? 'selected' : ''); ?> value="<?php echo e(now(global_setting()->timezone)->year); ?>"><?php echo e(now(global_setting()->timezone)->year); ?></option>
            <option
                <?php echo e((request()->year ==  now(global_setting()->timezone)->subYear()->year) ? 'selected' : ''); ?> value="<?php echo e(now(global_setting()->timezone)->subYear()->year); ?>"><?php echo e(now(global_setting()->timezone)->subYear()->year); ?></option>
            <option
                <?php echo e((request()->year ==  now(global_setting()->timezone)->subYears(2)->year) ? 'selected' : ''); ?> value="<?php echo e(now(global_setting()->timezone)->subYears(2)->year); ?>"><?php echo e(now(global_setting()->timezone)->subYears(2)->year); ?></option>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>
     <?php $__env->endSlot(); ?>
    <?php if (isset($component)) { $__componentOriginal4e65df8a9648483ff8a2bf21a107646914efde53 = $component; } ?>
<?php $component = App\View\Components\BarChart::resolve(['chartData' => $registrationsChart,'spaceRatio' => 0.5] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bar-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BarChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart2','height' => '300']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e65df8a9648483ff8a2bf21a107646914efde53)): ?>
<?php $component = $__componentOriginal4e65df8a9648483ff8a2bf21a107646914efde53; ?>
<?php unset($__componentOriginal4e65df8a9648483ff8a2bf21a107646914efde53); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/super-admin/dashboard/charts.blade.php ENDPATH**/ ?>