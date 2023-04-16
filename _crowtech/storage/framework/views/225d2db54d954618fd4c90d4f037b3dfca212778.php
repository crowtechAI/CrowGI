<div <?php echo e($attributes->merge(['class' => 'form-group my-3'])); ?>>
    <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => $fieldId,'fieldLabel' => $fieldLabel,'fieldRequired' => $fieldRequired] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>

    <div id="file-upload-box">
        <div class="row" id="file-dropzone">
            <div class="col-md-12">
                <div class="dropzone rounded border" id="<?php echo e($fieldId); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="fallback">
                        <input name="<?php echo e($fieldName); ?>" type="file" multiple />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if($fieldHelp): ?>
        <small id="<?php echo e($fieldId); ?>Help" class="form-text text-muted"><?php echo e($fieldHelp); ?></small>
    <?php endif; ?>
</div>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/components/forms/file-multiple.blade.php ENDPATH**/ ?>