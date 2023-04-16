<?php $__env->startPush('datatable-styles'); ?>
    <?php echo $__env->make('sections.daterange_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .h-200 {
            height: 340px;
            overflow-y: auto;
        }

        .dashboard-settings {
            width: 600px;
        }

        @media (max-width: 768px) {
            .dashboard-settings {
                width: 300px;
            }
        }

    </style>
<?php $__env->stopPush(); ?>



<?php $__env->startSection('filter-section'); ?>
    <!-- FILTER START -->
    <!-- DASHBOARD HEADER START -->
    <div class="d-flex filter-box project-header bg-white dashboard-header">

        <div class="mobile-close-overlay w-100 h-100" id="close-client-overlay"></div>
        <div class="project-menu d-lg-flex" id="mob-client-detail">

            <a class="d-none close-it" href="javascript:;" id="close-client-detail">
                <i class="fa fa-times"></i>
            </a>

            <?php if($viewOverviewDashboard == 'all'): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('dashboard.advanced').'?tab=overview','text' => __('modules.projects.overview'),'ajax' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'overview']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if(in_array('projects', user_modules()) && $viewProjectDashboard == 'all'): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('dashboard.advanced').'?tab=project','text' => __('app.project'),'ajax' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'project']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if(in_array('clients', user_modules()) && $viewClientDashboard == 'all'): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('dashboard.advanced').'?tab=client','text' => __('app.client'),'ajax' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'client']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if($viewHRDashboard == 'all'): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('dashboard.advanced').'?tab=hr','text' => __('app.menu.hr'),'ajax' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hr']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if(in_array('tickets', user_modules()) && $viewTicketDashboard == 'all'): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('dashboard.advanced').'?tab=ticket','text' => __('app.menu.ticket'),'ajax' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ticket']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if($viewFinanceDashboard == 'all'): ?>
                <?php if (isset($component)) { $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c = $component; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('dashboard.advanced').'?tab=finance','text' => __('app.menu.finance'),'ajax' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'finance']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c)): ?>
<?php $component = $__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c; ?>
<?php unset($__componentOriginal125a1007b8c7d7586d1783de327a3e32c58c3f3c); ?>
<?php endif; ?>
            <?php endif; ?>

        </div>


        <div class="ml-auto d-flex align-items-center justify-content-center ">

            <!-- DATE START -->
            <div
                class="<?php echo e(request('tab') == 'overview' || request('tab') == '' ? 'd-none' : 'd-flex'); ?> align-items-center border-left-grey border-left-grey-sm-0 h-100 pl-4">
                <i class="fa fa-calendar-alt mr-2 f-14 text-dark-grey"></i>
                <div class="select-status">
                    <input type="text"
                           class="position-relative text-dark form-control border-0 p-2 text-left f-14 f-w-500 border-additional-grey"
                           id="datatableRange2" placeholder="<?php echo app('translator')->get('placeholders.dateRange'); ?>">
                </div>
            </div>
            <!-- DATE END -->
            <?php if(isset($widgets) && in_array('admin', user_roles())): ?>
                <div class="admin-dash-settings">
                    <?php if (isset($component)) { $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6 = $component; } ?>
<?php $component = App\View\Components\Form::resolve(['method' => 'POST'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'dashboardWidgetForm']); ?>
                        <div class="dropdown keep-open">
                            <a class="d-flex align-items-center justify-content-center dropdown-toggle px-lg-4 border-left-grey text-dark"
                               type="link" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="fa fa-cog" title="<?php echo e(__('modules.dashboard.dashboardWidgetsSettings')); ?>" data-toggle="tooltip"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <ul class="dropdown-menu dropdown-menu-right dashboard-settings p-20"
                                aria-labelledby="dropdownMenuLink" tabindex="0">
                                <li class="border-bottom mb-3">
                                    <h4 class="heading-h3"><?php echo app('translator')->get('modules.dashboard.dashboardWidgets'); ?></h4>
                                </li>
                                <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $wname = \Illuminate\Support\Str::camel($widget->widget_name);
                                    ?>
                                    <li class="mb-2 float-left w-50">
                                        <div class="checkbox checkbox-info ">
                                            <input id="<?php echo e($widget->widget_name); ?>" name="<?php echo e($widget->widget_name); ?>"
                                                   value="true" <?php if($widget->status): ?> checked <?php endif; ?> type="checkbox">
                                            <label for="<?php echo e($widget->widget_name); ?>"><?php echo app('translator')->get('modules.dashboard.' .
                                            $wname); ?></label>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if(count($widgets) % 2 != 0): ?>
                                    <li class="mb-2 float-left w-50 height-35"></li>
                                <?php endif; ?>
                                <li class="float-none w-100">
                                    <?php if (isset($component)) { $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480 = $component; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-dashboard-widget']); ?><?php echo app('translator')->get('app.save'); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480)): ?>
<?php $component = $__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480; ?>
<?php unset($__componentOriginalad6cd9ca0c0f4e557ce8aae8581c3617ecf44480); ?>
<?php endif; ?>
                                </li>
                            </ul>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6)): ?>
<?php $component = $__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6; ?>
<?php unset($__componentOriginal0777dca6b0ab2eebdcaf6ba884d5b30ab61203a6); ?>
<?php endif; ?>
                </div>
            <?php endif; ?>

        </div>

        <a class="mb-0 d-block d-lg-none text-dark-grey mr-2 border-left-grey border-bottom-0"
           onclick="openClientDetailSidebar()"><i class="fa fa-ellipsis-v"></i></a>

    </div>
    <!-- FILTER END -->
    <!-- DASHBOARD HEADER END -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



    <!-- CONTENT WRAPPER START -->
    <div class="px-4 py-0 py-lg-3  border-top-0 admin-dashboard">
        <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- CONTENT WRAPPER END -->
    
    <script>
        const typebotInitScript = document.createElement("script");
typebotInitScript.type = "module";
typebotInitScript.innerHTML = `import Typebot from 'https://cdn.jsdelivr.net/npm/@typebot.io/js@0.0/dist/web.js'

Typebot.initBubble({
  typebot: "my-typebot-4i6p7qh",
  theme: {
    button: { backgroundColor: "#264653", iconColor: "#FFFFFF" },
    previewMessage: { backgroundColor: "#ffffff", textColor: "black" },
  },
});
`;
document.body.append(typebotInitScript);
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/jquery/daterangepicker.min.js')); ?>"></script>
    <script type="text/javascript">
        $(function () {
            var format = '<?php echo e(company()->moment_date_format); ?>';
            var startDate = "<?php echo e($startDate->translatedFormat(company()->date_format)); ?>";
            var endDate = "<?php echo e($endDate->translatedFormat(company()->date_format)); ?>";
            var start = moment(startDate, format);
            var end = moment(endDate, format);

            $('#datatableRange2').daterangepicker({
                locale: daterangeLocale,
                linkedCalendars: false,
                startDate: start,
                endDate: end,
                ranges: daterangeConfig,
                opens: 'left',
                parentEl: '.dashboard-header'
            }, cb);


            $('#datatableRange2').on('apply.daterangepicker', function (ev, picker) {
                showTable();
            });

        });
    </script>


    <script>
        $(".dashboard-header").on("click", ".ajax-tab", function (event) {
            event.preventDefault();

            $('.project-menu .p-sub-menu').removeClass('active');
            $(this).addClass('active');

            const dateRangePicker = $('#datatableRange2').data('daterangepicker');
            let startDate = $('#datatableRange').val();

            let endDate;

            if (startDate === '') {
                startDate = null;
                endDate = null;
            } else {
                startDate = dateRangePicker.startDate.format('<?php echo e(company()->moment_date_format); ?>');
                endDate = dateRangePicker.endDate.format('<?php echo e(company()->moment_date_format); ?>');
            }

            const requestUrl = this.href;

            $.easyAjax({
                url: requestUrl,
                blockUI: true,
                container: ".admin-dashboard",
                historyPush: true,
                data: {
                    startDate: startDate,
                    endDate: endDate
                },
                success: function (response) {
                    if (response.status === "success") {
                        $('.admin-dashboard').html(response.html);
                        init('.admin-dashboard');
                    }
                }
            });
        });

        $('.keep-open .dropdown-menu').on({
            "click": function (e) {
                e.stopPropagation();
            }
        });

        function showTable() {
            const dateRangePicker = $('#datatableRange2').data('daterangepicker');
            let startDate = $('#datatableRange').val();

            let endDate;
            if (startDate === '') {
                startDate = null;
                endDate = null;
            } else {
                startDate = dateRangePicker.startDate.format('<?php echo e(company()->moment_date_format); ?>');
                endDate = dateRangePicker.endDate.format('<?php echo e(company()->moment_date_format); ?>');
            }

            const requestUrl = this.href;

            $.easyAjax({
                url: requestUrl,
                blockUI: true,
                container: ".admin-dashboard",
                data: {
                    startDate: startDate,
                    endDate: endDate
                },
                success: function (response) {
                    if (response.status === "success") {
                        $('.admin-dashboard').html(response.html);
                        init('.admin-dashboard');
                    }
                }
            });
        }
    </script>
    <script>
        const activeTab = "<?php echo e($activeTab); ?>";
        $('.project-menu .' + activeTab).addClass('active');
    </script>
    
   
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/dashboard/admin.blade.php ENDPATH**/ ?>