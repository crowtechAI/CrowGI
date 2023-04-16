<?php
    $active = false;

    if (isset($user->session)) {
        $lastSeen = \Carbon\Carbon::createFromTimestamp($user->session->last_activity)->timezone(company()?company()->timezone:$user->company->timezone);

        $lastSeenDifference = now()->diffInSeconds($lastSeen);
        if ($lastSeenDifference > 0 && $lastSeenDifference <= 90) {
            $active = true;
        }
    }
?>

<div class="media align-items-center mw-250">

    <?php if(!is_null($user)): ?>
        <a href="<?php echo e(isset($disabledLink) ? 'javascript:;' : route('employees.show', [$user->id])); ?>"
           class="position-relative <?php echo e(isset($disabledLink) ? 'disabled-link' : ''); ?>">
            <?php if($active): ?>
                <span class="text-light-green position-absolute f-8 user-online"
                      title="<?php echo app('translator')->get('modules.client.online'); ?>"><i class="fa fa-circle"></i></span>
            <?php endif; ?>
            <img src="<?php echo e($user->image_url); ?>" class="mr-2 taskEmployeeImg rounded-circle"
                 alt="<?php echo e(mb_ucfirst($user->name)); ?>" title="<?php echo e($user->userBadge()); ?>">
        </a>
        <div class="media-body <?php echo e($user->status); ?>">

            <h5 class="mb-0 f-12">
                <a href="<?php echo e(isset($disabledLink) ? 'javascript:;' : route('employees.show', [$user->id])); ?>"
                   class="text-darkest-grey <?php echo e(isset($disabledLink) ? 'disabled-link' : ''); ?>"><?php echo $user->userBadge(); ?></a>
            </h5>
            <p class="mb-0 f-12 text-dark-grey">
                <?php echo e(!is_null($user->employeeDetail) && !is_null($user->employeeDetail->designation) ? mb_ucfirst($user->employeeDetail->designation->name) : ' '); ?>

            </p>
        </div>
    <?php else: ?>
        --
    <?php endif; ?>
</div>
<?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/components/employee.blade.php ENDPATH**/ ?>