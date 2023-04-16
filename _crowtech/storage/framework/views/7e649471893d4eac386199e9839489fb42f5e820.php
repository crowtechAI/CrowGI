<div <?php echo e($attributes->merge(['class' => 'alert alert-' . (!is_null($type) ? $type : 'default')])); ?>>
    <?php if(isset($icon)): ?>
    <i class="fa fa-<?php echo e($icon); ?>"></i>
    <?php endif; ?>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/components/alert.blade.php ENDPATH**/ ?>