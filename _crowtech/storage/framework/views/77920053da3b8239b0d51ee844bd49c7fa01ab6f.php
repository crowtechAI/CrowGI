<div class="modal-header">
    <h5 class="modal-title"><?php echo app('translator')->get('app.search'); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php if (isset($component)) { $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6 = $component; } ?>
<?php $component = App\View\Components\Form::resolve(['method' => 'POST'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'createAgent','class' => 'form-horizontal']); ?>
    <div class="modal-body">
        <div class="portlet-body">

            <div class="row">
                <div class="col-lg-12 my-3">
                    <div class="input-group">

                        <select class="select-picker form-control" name="search_module" id="search_module"
                            data-live-search="true">
                            <option value="ticket"><?php echo app('translator')->get('app.menu.ticket'); ?></option>
                            <option value="invoice"><?php echo app('translator')->get('app.invoice'); ?></option>
                            <option value="notice"><?php echo app('translator')->get('app.notice'); ?></option>
                            <option value="task"><?php echo app('translator')->get('app.task'); ?></option>
                            <option value="project"><?php echo app('translator')->get('app.project'); ?></option>
                            <option value="estimate"><?php echo app('translator')->get('app.estimate'); ?></option>

                            <?php if(!in_array('client', user_roles())): ?>
                                <option value="creditNote"><?php echo app('translator')->get('app.menu.credit-note'); ?></option>
                                <option value="employee"><?php echo app('translator')->get('app.employee'); ?></option>
                                <option value="client"><?php echo app('translator')->get('app.client'); ?></option>
                                <option value="lead"><?php echo app('translator')->get('app.lead'); ?></option>
                            <?php endif; ?>
                        </select>

                        <div class="input-group-append w-70">
                            <input type="text" class="form-control f-14" placeholder="<?php echo app('translator')->get('placeholders.search'); ?>"
                                name="search_keyword" id="search_keyword">

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?php if (isset($component)) { $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8)): ?>
<?php $component = $__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8; ?>
<?php unset($__componentOriginaldffecccc219bb81c1548bfa6ec1531014cb3bec8); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'search-app']); ?><?php echo app('translator')->get('app.search'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6)): ?>
<?php $component = $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6; ?>
<?php unset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6); ?>
<?php endif; ?>

<script>
    // save agent
    $('#search-app').click(function() {

        $.easyAjax({
            url: "<?php echo e(route('search.store')); ?>",
            container: '#createAgent',
            type: "POST",
            blockUI: true,
            data: $('#createAgent').serialize(),
            disableButton: true,
            buttonSelector: "#search-app"
        })
    });

    $('#search_keyword').keypress(function(e) {

        var key = e.which;
        if (key == 13) // the enter key code
        {
            e.preventDefault();
            $('#search-app').click();
            return false;
        }
    });

    init(MODAL_LG);
</script>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/search/index.blade.php ENDPATH**/ ?>