<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginal5b19a9f8a5047f5cecb7555988b1287c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b19a9f8a5047f5cecb7555988b1287c = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Slot::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-slot'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Slot::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b19a9f8a5047f5cecb7555988b1287c)): ?>
<?php $attributes = $__attributesOriginal5b19a9f8a5047f5cecb7555988b1287c; ?>
<?php unset($__attributesOriginal5b19a9f8a5047f5cecb7555988b1287c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b19a9f8a5047f5cecb7555988b1287c)): ?>
<?php $component = $__componentOriginal5b19a9f8a5047f5cecb7555988b1287c; ?>
<?php unset($__componentOriginal5b19a9f8a5047f5cecb7555988b1287c); ?>
<?php endif; ?><?php /**PATH /home/yoshito/Projects/pio/storage/framework/views/c486a6f3988363a32430b0656b6ab437.blade.php ENDPATH**/ ?>