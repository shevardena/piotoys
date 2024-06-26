<div class="flex flex-col min-h-screen">
    <!-- Header -->
    <?php echo $__env->make('frontend.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Content -->
    <div class="flex-grow">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/yoshito/Projects/pio/resources/views/frontend/layouts/default.blade.php ENDPATH**/ ?>