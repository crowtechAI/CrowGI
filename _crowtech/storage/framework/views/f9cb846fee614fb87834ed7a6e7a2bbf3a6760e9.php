<?php if(in_array('probation_date', $activeWidgets)): ?>
    <?php
        $currentDay = \Carbon\Carbon::parse(now(company()->timezone)->toDateTimeString())
            ->startOfDay()
            ->setTimezone('UTC');
    ?>
    <div class="col-sm-12 mt-2">
        <?php if(in_array('admin', user_roles())): ?>
            <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.probationDate'),'padding' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'e-d-info mb-3']); ?>
                <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php $__empty_1 = true; $__currentLoopData = $probations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $probation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $probationDate = Carbon\carbon::parse($probation->probation_end_date);
                                $diffInDays = $probationDate->copy()->diffForHumans($currentDay);
                            ?>
                            <tr>
                                <td class="pl-20">
                                    <?php if (isset($component)) { $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a = $component; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $probation->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('employee'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Employee::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a)): ?>
<?php $component = $__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a; ?>
<?php unset($__componentOriginal1c46ebe885e3c4421e9977d656c777b9bed6c39a); ?>
<?php endif; ?>
                                </td>

                                <td class="pr-20 text-right">
                                    <?php if($probationDate->setTimezone(company()->timezone)->isToday()): ?>
                                        <span class="badge badge-light text-success p-2"><?php echo app('translator')->get('app.today'); ?></span>
                                    <?php elseif($probationDate->diffInDays($currentDay) <= 7): ?>
                                        <span class="badge badge-light text-warning p-2"><?php echo e($diffInDays); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-light p-2"><?php echo e($diffInDays); ?></span>
                                    <?php endif; ?>

                                    <br>
                                    <?php if($probationDate->setTimezone(company()->timezone)->isToday()): ?>
                                        <span class="text-success f-11"><?php echo app('translator')->get('messages.probationMessage'); ?>
                                            <?php echo e($probationDate->translatedFormat($company->date_format)); ?></span>
                                    <?php elseif($probationDate->diffInDays($currentDay) <= 7): ?>
                                        <span class="text-warning f-11"><?php echo app('translator')->get('messages.probationMessage'); ?>
                                            <?php echo e($probationDate->translatedFormat($company->date_format)); ?></span>
                                    <?php else: ?>
                                        <span class="f-11"><?php echo app('translator')->get('messages.probationMessage'); ?>
                                            <?php echo e($probationDate->translatedFormat($company->date_format)); ?></span>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <span class="shadow-none">
                            <?php if (isset($component)) { $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33 = $component; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'list','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33)): ?>
<?php $component = $__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33; ?>
<?php unset($__componentOriginaldd4a3acb850ed912fbb4dfa63003ef1bff802c33); ?>
<?php endif; ?>
                        </span>
                        <?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6)): ?>
<?php $component = $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6; ?>
<?php unset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
        <?php else: ?>
            <?php if($probation): ?>
                <?php if (isset($component)) { $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e = $component; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.probationDate'),'padding' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'e-d-info mb-3']); ?>
                    <?php if (isset($component)) { $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6 = $component; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <tr>
                            <?php
                                $probationDate = Carbon\carbon::parse($probation->probation_end_date);
                                $diffInDays = $probationDate->copy()->diffForHumans($currentDay);
                            ?>
                            <td class="pl-20">
                                <?php if($probationDate->setTimezone(company()->timezone)->isToday()): ?>
                                    <span class="text-success f-12"><?php echo app('translator')->get('messages.probationMessage'); ?>
                                        <?php echo e($probationDate->translatedFormat($company->date_format)); ?></span>
                                <?php elseif($probationDate->diffInDays($currentDay) <= 7): ?>
                                    <span class="text-warning f-12"><?php echo app('translator')->get('messages.probationMessage'); ?>
                                        <?php echo e($probationDate->translatedFormat($company->date_format)); ?></span>
                                <?php else: ?>
                                    <span class="f-12"><?php echo app('translator')->get('messages.probationMessage'); ?>
                                        <?php echo e($probationDate->translatedFormat($company->date_format)); ?></span>
                                <?php endif; ?>
                            </td>

                            <td class="pr-20 text-right">
                                <?php if($probationDate->setTimezone(company()->timezone)->isToday()): ?>
                                    <span class="badge badge-light text-success p-2"><?php echo app('translator')->get('app.today'); ?></span>
                                <?php elseif($probationDate->diffInDays($currentDay) <= 7): ?>
                                    <span class="badge badge-light text-warning p-2"><?php echo e($diffInDays); ?></span>
                                <?php else: ?>
                                    <span class="badge badge-light p-2"><?php echo e($diffInDays); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6)): ?>
<?php $component = $__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6; ?>
<?php unset($__componentOriginale53a9d2e6d6c51019138cc2fcd3ba8ac893391c6); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e)): ?>
<?php $component = $__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e; ?>
<?php unset($__componentOriginalf463d4507b04ddbb1ec93225959f845404a19c7e); ?>
<?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/dashboard/employee/widgets/probation.blade.php ENDPATH**/ ?>