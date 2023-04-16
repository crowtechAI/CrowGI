
<link rel="stylesheet" href="<?php echo e(asset('vendor/css/image-picker.min.css')); ?>">

<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">
    <?php echo method_field('PUT'); ?>

    <div class="row">

        <div class="col-lg-6">
            <?php if (isset($component)) { $__componentOriginaldaadf847fbf915f597d5e97d12ca0ad02b95e908 = $component; } ?>
<?php $component = App\View\Components\Forms\File::resolve(['allowedFileExtensions' => 'png jpg jpeg svg','fieldLabel' => __('modules.invoiceSettings.logo'),'fieldName' => 'logo','fieldId' => 'logo','fieldValue' => $invoiceSetting->logo_url,'popover' => __('messages.invoiceLogoTooltip')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\File::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldaadf847fbf915f597d5e97d12ca0ad02b95e908)): ?>
<?php $component = $__componentOriginaldaadf847fbf915f597d5e97d12ca0ad02b95e908; ?>
<?php unset($__componentOriginaldaadf847fbf915f597d5e97d12ca0ad02b95e908); ?>
<?php endif; ?>
        </div>
        <div class="col-lg-6">
            <?php if (isset($component)) { $__componentOriginaldaadf847fbf915f597d5e97d12ca0ad02b95e908 = $component; } ?>
<?php $component = App\View\Components\Forms\File::resolve(['allowedFileExtensions' => 'png jpg jpeg svg','fieldLabel' => __('modules.invoiceSettings.authorisedSignatorySignature'),'fieldName' => 'authorised_signatory_signature','fieldId' => 'authorised_signatory_signature','fieldValue' => $invoiceSetting->authorised_signatory_signature_url,'popover' => __('messages.authorisedSignatorySignatureTooltip')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\File::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldaadf847fbf915f597d5e97d12ca0ad02b95e908)): ?>
<?php $component = $__componentOriginaldaadf847fbf915f597d5e97d12ca0ad02b95e908; ?>
<?php unset($__componentOriginaldaadf847fbf915f597d5e97d12ca0ad02b95e908); ?>
<?php endif; ?>
        </div>

        <div class="col-lg-6">
            <?php if (isset($component)) { $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381 = $component; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'locale','fieldLabel' => __('modules.accountSettings.language'),'fieldName' => 'locale','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php $__currentLoopData = $languageSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e(global_setting()->locale == $language->language_code ? 'selected' : ''); ?>

                            data-content="<span class='flag-icon flag-icon-<?php echo e(($language->flag_code == 'en') ? 'gb' : strtolower($language->flag_code)); ?> flag-icon-squared'></span> <?php echo e($language->language_name); ?>"
                            <?php if($invoiceSetting->locale == $language->language_code): ?> selected
                            <?php endif; ?> value="<?php echo e($language->language_code); ?>">
                        <?php echo e($language->language_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381)): ?>
<?php $component = $__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381; ?>
<?php unset($__componentOriginalaa9e2e00dcec6b58db49b9128f7191370bc93381); ?>
<?php endif; ?>
        </div>

        <div class="col-lg-4 mt-5">
            <?php if (isset($component)) { $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['checked' => $invoiceSetting->authorised_signatory==1,'fieldLabel' => __('app.showAuthorisedSignatory'),'fieldName' => 'show_authorised_signatory','fieldId' => 'show_authorised_signatory','popover' => __('messages.invoiceAuthorisedSignatoryShowTooltip')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e)): ?>
<?php $component = $__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e; ?>
<?php unset($__componentOriginaldf5bb0e32b087bca724e42ed3cdc51682b267e1e); ?>
<?php endif; ?>
        </div>

        <div class="col-lg-12 mt-4">
            <div class="form-group">
                <?php if (isset($component)) { $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad = $component; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'template','fieldLabel' => __('modules.invoiceSettings.template'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad)): ?>
<?php $component = $__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad; ?>
<?php unset($__componentOriginal373f58fa693eb1202c1acc8658ad45d6306ee2ad); ?>
<?php endif; ?>
                <select name="template" class="image-picker show-labels show-html">
                    <option data-img-src="<?php echo e(asset('img/invoice-template/1.png')); ?>"
                            <?php if($invoiceSetting->template == 'invoice-1'): ?> selected <?php endif; ?>
                            value="invoice-1"><?php echo app('translator')->get('modules.invoiceSettings.template'); ?> 1
                    </option>
                    <option data-img-src="<?php echo e(asset('img/invoice-template/2.png')); ?>"
                            <?php if($invoiceSetting->template == 'invoice-2'): ?> selected <?php endif; ?>
                            value="invoice-2"><?php echo app('translator')->get('modules.invoiceSettings.template'); ?> 2
                    </option>
                    <option data-img-src="<?php echo e(asset('img/invoice-template/3.png')); ?>"
                            <?php if($invoiceSetting->template == 'invoice-3'): ?> selected <?php endif; ?>
                            value="invoice-3"><?php echo app('translator')->get('modules.invoiceSettings.template'); ?> 3
                    </option>
                    <option data-img-src="<?php echo e(asset('img/invoice-template/4.png')); ?>"
                            <?php if($invoiceSetting->template == 'invoice-4'): ?> selected <?php endif; ?>
                            value="invoice-4"><?php echo app('translator')->get('modules.invoiceSettings.template'); ?> 4
                    </option>
                    <option data-img-src="<?php echo e(asset('img/invoice-template/5.png')); ?>"
                            <?php if($invoiceSetting->template == 'invoice-5'): ?> selected <?php endif; ?>
                            value="invoice-5"><?php echo app('translator')->get('modules.invoiceSettings.template'); ?> 5
                    </option>
                </select>
            </div>
        </div>

        <div class="col-lg-12 mt-3">
            <div class="form-group my-3">
                <?php if (isset($component)) { $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11 = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve(['fieldLabel' => __('modules.invoiceSettings.invoiceTerms'),'fieldName' => 'invoice_terms','fieldId' => 'invoice_terms','fieldPlaceholder' => __('placeholders.invoices.invoiceTerms'),'fieldValue' => $invoiceSetting->invoice_terms] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11)): ?>
<?php $component = $__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11; ?>
<?php unset($__componentOriginal582987c8de0d25188b5e8e44b2a5588ebcdc0b11); ?>
<?php endif; ?>
            </div>
        </div>

    </div>

</div>


<!-- Buttons Start -->
<div class="w-100 border-top-grey">
    <?php if (isset($component)) { $__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690 = $component; } ?>
<?php $component = App\View\Components\SettingFormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingFormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-form','class' => 'mr-3']); ?><?php echo app('translator')->get('app.save'); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690)): ?>
<?php $component = $__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690; ?>
<?php unset($__componentOriginal698fd7a4bca51a1feab5ec62ef3754628de98690); ?>
<?php endif; ?>
</div>
<!-- Buttons End -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/image-picker/0.3.1/image-picker.min.js"></script>
<script>
    // Initializing image picker
    $('.image-picker').imagepicker();

    // save invoice setting
    $('#save-form').click(function () {
        $.easyAjax({
            url: "<?php echo e(route('superadmin.settings.global-invoice-settings.update', $invoiceSetting->id)); ?>",
            container: '#editSettings',
            type: "POST",
            redirect: true,
            file: true,
            data: $('#editSettings').serialize(),
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-form",
        })
    });
</script>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/super-admin/invoice-settings/ajax/general.blade.php ENDPATH**/ ?>