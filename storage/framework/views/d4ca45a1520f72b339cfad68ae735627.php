<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginalda6bef45036463081386bd702c777df8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda6bef45036463081386bd702c777df8 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Confirm::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-confirm'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Confirm::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda6bef45036463081386bd702c777df8)): ?>
<?php $attributes = $__attributesOriginalda6bef45036463081386bd702c777df8; ?>
<?php unset($__attributesOriginalda6bef45036463081386bd702c777df8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda6bef45036463081386bd702c777df8)): ?>
<?php $component = $__componentOriginalda6bef45036463081386bd702c777df8; ?>
<?php unset($__componentOriginalda6bef45036463081386bd702c777df8); ?>
<?php endif; ?><?php /**PATH /home/yoshito/Projects/pio/storage/framework/views/e87fcfb8e3870e562454545ea06af964.blade.php ENDPATH**/ ?>