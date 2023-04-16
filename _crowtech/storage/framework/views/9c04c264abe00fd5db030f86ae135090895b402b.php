<?php if (isset($component)) { $__componentOriginaleb8830356809d16b599bd28accf2e6a22deb6992 = $component; } ?>
<?php $component = App\View\Components\Auth::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('auth'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Auth::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <form id="forgot-password-form" action="<?php echo e(route('password.email')); ?>" class="ajax-form" method="POST">
        <?php echo e(csrf_field()); ?>

        <h3 class="text-capitalize mb-4 f-w-500"><?php echo app('translator')->get('app.recoverPassword'); ?></h3>

        <div class="alert alert-success m-t-10 d-none" id="success-msg"></div>
        <div class="group">
            <div class="form-group text-left">
                <label for="email" class="f-w-500"><?php echo app('translator')->get('auth.email'); ?></label>
                <input type="email" name="email" class="form-control height-50 f-15 light_text"
                       autofocus placeholder="e.g. admin@example.com" id="email">
            </div>

            <button
                type="submit"
                id="submit-login"
                class="btn-primary f-w-500 rounded w-100 height-50 f-18">
                <?php echo app('translator')->get('app.sendPasswordLink'); ?> <i class="fa fa-arrow-right pl-1"></i>
            </button>
        </div>
        <div class="forgot_pswd mt-3">
            <a href="<?php echo e(route('login')); ?>" class="justify-content-center"><?php echo app('translator')->get('app.login'); ?></a>
        </div>
    </form>

     <?php $__env->slot('scripts', null, []); ?> 
        <script>

            $('#submit-login').click(function () {

                const url = "<?php echo e(route('password.email')); ?>";
                $.easyAjax({
                    url: url,
                    container: '#forgot-password-form',
                    disableButton: true,
                    blockUI: true,
                    buttonSelector: "#submit-login",
                    type: "POST",
                    data: $('#forgot-password-form').serialize(),
                    success: function (response) {
                        $('#success-msg').removeClass('d-none');
                        $('#success-msg').html(response.message);
                        $('.group').remove();
                    }
                })
            });

        </script>
     <?php $__env->endSlot(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleb8830356809d16b599bd28accf2e6a22deb6992)): ?>
<?php $component = $__componentOriginaleb8830356809d16b599bd28accf2e6a22deb6992; ?>
<?php unset($__componentOriginaleb8830356809d16b599bd28accf2e6a22deb6992); ?>
<?php endif; ?>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/auth/passwords/forget.blade.php ENDPATH**/ ?>