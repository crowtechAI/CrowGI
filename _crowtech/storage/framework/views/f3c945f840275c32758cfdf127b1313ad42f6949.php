<?php if (isset($component)) { $__componentOriginaleb8830356809d16b599bd28accf2e6a22deb6992 = $component; } ?>
<?php $component = App\View\Components\Auth::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('auth'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Auth::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <form id="login-form" action="<?php echo e(route('login')); ?>" class="ajax-form" method="POST">
        <?php echo e(csrf_field()); ?>

            <h3 class="text-capitalize mb-4 f-w-500"><?php echo app('translator')->get('app.login'); ?></h3>

            <script>
                const facebook = "<?php echo e(route('social_login', 'facebook')); ?>";
                const google = "<?php echo e(route('social_login', 'google')); ?>";
                const twitter = "<?php echo e(route('social_login', 'twitter')); ?>";
                const linkedin = "<?php echo e(route('social_login', 'linkedin')); ?>";
            </script>

            <?php if($socialAuthSettings->google_status == 'enable'): ?>
                <a class="mb-3 height_50 rounded f-w-500" onclick="window.location.href = google;">
                                    <span>
                                        <img src="<?php echo e(asset('img/google.png')); ?>" alt="Google"/>
                                    </span>
                    <?php echo app('translator')->get('auth.signInGoogle'); ?></a>
            <?php endif; ?>
            <?php if($socialAuthSettings->facebook_status == 'enable'): ?>
                <a class="mb-3 height_50 rounded f-w-500" onclick="window.location.href = facebook;">
                                    <span>
                                        <img src="<?php echo e(asset('img/fb.png')); ?>" alt="Google"/>
                                    </span>
                    <?php echo app('translator')->get('auth.signInFacebook'); ?>
                </a>
            <?php endif; ?>
            <?php if($socialAuthSettings->twitter_status == 'enable'): ?>
                <a class="mb-3 height_50 rounded f-w-500" onclick="window.location.href = twitter;">
                                    <span>
                                        <img src="<?php echo e(asset('img/twitter.png')); ?>" alt="Google"/>
                                    </span>
                    <?php echo app('translator')->get('auth.signInTwitter'); ?>
                </a>
            <?php endif; ?>
            <?php if($socialAuthSettings->linkedin_status == 'enable'): ?>
                <a class="mb-3 height_50 rounded f-w-500" onclick="window.location.href = linkedin;">
                                    <span>
                                        <img src="<?php echo e(asset('img/linkedin.png')); ?>" alt="Google"/>
                                    </span>
                    <?php echo app('translator')->get('auth.signInLinkedin'); ?>
                </a>
            <?php endif; ?>

            <?php if($socialAuthSettings->social_auth_enable): ?>
                <p class="position-relative my-4"><?php echo app('translator')->get('auth.useEmail'); ?></p>
            <?php endif; ?>

            <div class="form-group text-left">
                <label for="email"><?php echo app('translator')->get('auth.email'); ?></label>
                <input tabindex="1" type="email" name="email"
                       class="form-control height-50 f-15 light_text <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       autofocus
                       value="<?php echo e(request()->old('email')); ?>"
                       placeholder="<?php echo app('translator')->get('auth.email'); ?>" id="email">
                <?php if($errors->has('email')): ?>
                    <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
                <?php endif; ?>
            </div>

            <?php if($socialAuthSettings->social_auth_enable): ?>
                <button type="submit" id="submit-next"
                        class="btn-primary f-w-500 rounded w-100 height-50 f-18 "><?php echo app('translator')->get('auth.next'); ?> <i
                        class="fa fa-arrow-right pl-1"></i></button>

                <?php if($company->allow_client_signup): ?>
                    <a href="<?php echo e(route('register')); ?>" id="signup-client-next"
                        class="btn-secondary f-w-500 rounded w-100 height-50 f-15 mt-3">
                        <?php echo app('translator')->get('app.signUpAsClient'); ?>
                    </a>
                <?php endif; ?>

            <?php endif; ?>

        <div id="password-section"
             <?php if($socialAuthSettings->social_auth_enable): ?> class="d-none" <?php endif; ?>>
            <div class="form-group text-left">
                <label for="password"><?php echo app('translator')->get('app.password'); ?></label>
                <?php if (isset($component)) { $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8 = $component; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <input type="password" name="password" id="password"
                           placeholder="<?php echo app('translator')->get('placeholders.password'); ?>" tabindex="3"
                           class="form-control height-50 f-15 light_text <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                     <?php $__env->slot('append', null, []); ?> 
                        <button type="button" data-toggle="tooltip"
                                data-original-title="<?php echo app('translator')->get('app.viewPassword'); ?>"
                                class="btn btn-outline-secondary border-grey height-50 toggle-password">
                            <i
                                class="fa fa-eye"></i></button>
                     <?php $__env->endSlot(); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8)): ?>
<?php $component = $__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8; ?>
<?php unset($__componentOriginal863bfe686851606453ee7ca47b08abfa2e4810a8); ?>
<?php endif; ?>
                <?php if($errors->has('password')): ?>
                    <div class="invalid-feedback d-block"><?php echo e($errors->first('password')); ?></div>
                <?php endif; ?>
            </div>
            <div class="forgot_pswd mb-3">
                <a href="<?php echo e(url('forgot-password')); ?>"><?php echo app('translator')->get('app.forgotPassword'); ?></a>
            </div>

            <div class="form-group text-left ">
                <input id="checkbox-signup" class="cursor-pointer" type="checkbox" name="remember">
                <label for="checkbox-signup" class="cursor-pointer"><?php echo app('translator')->get('app.rememberMe'); ?></label>
            </div>

            <?php if($globalSetting->google_recaptcha_status == 'active'): ?>
                <div class="form-group" id="captcha_container"></div>
            <?php endif; ?>

            <input type="hidden" id="g_recaptcha" name="g_recaptcha">

            <?php if($errors->has('g-recaptcha-response')): ?>
                <div
                    class="invalid-feedback  d-block text-left"><?php echo e($errors->first('g-recaptcha-response')); ?>

                </div>
            <?php endif; ?>

            <button type="submit" id="submit-login"
                    class="btn-primary f-w-500 rounded w-100 height-50 f-18">
                <?php echo app('translator')->get('app.login'); ?> <i class="fa fa-arrow-right pl-1"></i>
            </button>
            
            <?php if($company?->allow_client_signup && isWorksuite()): ?>
                <a href="<?php echo e(route('register')); ?>"
                   class="btn-secondary f-w-500 rounded w-100 height-50 f-15 mt-3">
                    <?php echo app('translator')->get('app.signUpAsClient'); ?>
                </a>
            <?php endif; ?>

            <?php if(isWorksuiteSaas() && !module_enabled('Subdomain')): ?>
                <?php if($globalSetting->enable_register == true): ?>
                    <a href="<?php echo e(route('front.signup.index')); ?>"
                       class="btn-secondary f-w-500 rounded w-100 height-50 f-15 mt-3">
                        <?php echo app('translator')->get('app.signUp'); ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>

        </div>

         <?php $__env->slot('outsideLoginBox', null, []); ?> 
            <?php if(isWorksuiteSaas() && !$globalSetting->frontend_disable  ): ?>
                <p class="my-2 f-12"><a
                        href="<?php echo e(module_enabled('Subdomain')?route('front.pricing'):route('front.home')); ?>"
                        class="text-dark-grey"><?php echo app('translator')->get('superadmin.goToWebsite'); ?></a>
                </p>
            <?php endif; ?>
         <?php $__env->endSlot(); ?>


    </form>

     <?php $__env->slot('scripts', null, []); ?> 


        <?php if($globalSetting->google_recaptcha_status == 'active' && $globalSetting->google_recaptcha_v2_status == 'active'): ?>
            <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async
                    defer></script>
            <script>
                var gcv3;
                var onloadCallback = function () {
                    // Renders the HTML element with id 'captcha_container' as a reCAPTCHA widget.
                    // The id of the reCAPTCHA widget is assigned to 'gcv3'.
                    gcv3 = grecaptcha.render('captcha_container', {
                        'sitekey': '<?php echo e($globalSetting->google_recaptcha_v2_site_key); ?>',
                        'theme': 'light',
                        'callback': function (response) {
                            if (response) {
                                $('#g_recaptcha').val(response);
                            }
                        },
                    });
                };
            </script>
        <?php endif; ?>
        <?php if($globalSetting->google_recaptcha_status == 'active' && $globalSetting->google_recaptcha_v3_status == 'active'): ?>
            <script
                src="https://www.google.com/recaptcha/api.js?render=<?php echo e($globalSetting->google_recaptcha_v3_site_key); ?>"></script>
            <script>
                grecaptcha.ready(function () {
                    grecaptcha.execute('<?php echo e($globalSetting->google_recaptcha_v3_site_key); ?>').then(function (token) {
                        // Add your logic to submit to your backend server here.
                        $('#g_recaptcha').val(token);
                    });
                });
            </script>
        <?php endif; ?>

        <script>

            $(document).ready(function () {

                $("form#login-form").submit(function () {
                    const button = $('form#login-form').find('#submit-login');

                    const text = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo e(__('app.loading')); ?>';

                    button.prop("disabled", true);
                    button.html(text);
                });

                function handleFormSubmit(e) {
                    e.preventDefault();
                }

                $('#submit-next').click(function (event) {
                    event.preventDefault();
                    document.addEventListener('click', handleFormSubmit, false);

                    const url = "<?php echo e(route('check_email')); ?>";
                    $.easyAjax({
                        url: url,
                        container: '#login-form',
                        disableButton: true,
                        buttonSelector: "#submit-next",
                        type: "POST",
                        data: $('#login-form').serialize(),
                        success: function (response) {
                            if (response.status === 'success') {
                                $('#submit-next, #signup-client-next').remove();
                                $('#password-section').removeClass('d-none');
                                $("#password").focus();
                                document.removeEventListener('click', handleFormSubmit);
                            }
                        }
                    })
                });

                <?php if(session('message')): ?>
                Swal.fire({
                    icon: 'error',
                    text: '<?php echo e(session('message')); ?>',
                    showConfirmButton: true,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                    },
                    showClass: {
                        popup: 'swal2-noanimation',
                        backdrop: 'swal2-noanimation'
                    },
                })
                <?php endif; ?>

            });
        </script>
     <?php $__env->endSlot(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleb8830356809d16b599bd28accf2e6a22deb6992)): ?>
<?php $component = $__componentOriginaleb8830356809d16b599bd28accf2e6a22deb6992; ?>
<?php unset($__componentOriginaleb8830356809d16b599bd28accf2e6a22deb6992); ?>
<?php endif; ?>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/auth/login.blade.php ENDPATH**/ ?>