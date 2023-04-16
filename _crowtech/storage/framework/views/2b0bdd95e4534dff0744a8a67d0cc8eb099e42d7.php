<?php if (isset($component)) { $__componentOriginalcd728ade001f05c9f58f8d190a481136e39bd167 = $component; } ?>
<?php $component = App\View\Components\SettingMenuItem::resolve(['active' => $activeMenu,'menu' => 'rest_api_setting','href' => route('rest-api-setting.index'),'text' => __('restapi::app.menu.restAPISettings')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingMenuItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd728ade001f05c9f58f8d190a481136e39bd167)): ?>
<?php $component = $__componentOriginalcd728ade001f05c9f58f8d190a481136e39bd167; ?>
<?php unset($__componentOriginalcd728ade001f05c9f58f8d190a481136e39bd167); ?>
<?php endif; ?>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/Modules/RestAPI/Providers/../Resources/views/sections/superadmin/setting-sidebar.blade.php ENDPATH**/ ?>