<SpladeToggle :default='<?php echo json_encode($toggles, 15, 512) ?>'>
    <template #default="{ <?php echo e($props); ?> }">
        <?php echo e($slot); ?>

    </template>
</SpladeToggle><?php /**PATH /home/yoshito/Projects/pio/vendor/protonemedia/laravel-splade/src/../resources/views/functional/toggle.blade.php ENDPATH**/ ?>