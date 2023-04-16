<?php $__env->startPush('datatable-styles'); ?>
    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">

            <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>


        </div>
    </div>
    <!-- CONTENT WRAPPER END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        const showTable = () => {
            window.LaravelDataTables["offline-plan-change-table"].draw(false);
        }
        $(document).ready(function () {
            showTable();
        });

        $('body').on('click', '.change-status', function() {
            var planId = $(this).data('id');
            var status = $(this).data('status');
            var url = "<?php echo e(route('superadmin.offline-plan.confirmChangePlan', [':id', ':status'])); ?>";
            url = url.replace(':status', status);
            url = url.replace(':id', planId);
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u793119200/domains/cakekrate.com/public_html/crowtech/resources/views/super-admin/offline-plan-change/index.blade.php ENDPATH**/ ?>