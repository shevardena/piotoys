<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginal5ed555e99aa9a26ccfb8fdd5c10b1e2b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5ed555e99aa9a26ccfb8fdd5c10b1e2b = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\ButtonWithDropdown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-button-with-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\ButtonWithDropdown::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>
 <?php $__env->slot('button', null, []); ?> <?php echo e($button); ?> <?php $__env->endSlot(); ?>
<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5ed555e99aa9a26ccfb8fdd5c10b1e2b)): ?>
<?php $attributes = $__attributesOriginal5ed555e99aa9a26ccfb8fdd5c10b1e2b; ?>
<?php unset($__attributesOriginal5ed555e99aa9a26ccfb8fdd5c10b1e2b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5ed555e99aa9a26ccfb8fdd5c10b1e2b)): ?>
<?php $component = $__componentOriginal5ed555e99aa9a26ccfb8fdd5c10b1e2b; ?>
<?php unset($__componentOriginal5ed555e99aa9a26ccfb8fdd5c10b1e2b); ?>
<?php endif; ?><?php /**PATH /home/yoshito/Projects/pio/storage/framework/views/ab630227a486f8f79501b26e3b02dfdb.blade.php ENDPATH**/ ?>