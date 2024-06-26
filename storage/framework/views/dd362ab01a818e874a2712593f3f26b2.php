<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginal33bfdc3b9fbba2379aa24833da18528a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33bfdc3b9fbba2379aa24833da18528a = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\ToastWrapper::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-toast-wrapper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\ToastWrapper::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33bfdc3b9fbba2379aa24833da18528a)): ?>
<?php $attributes = $__attributesOriginal33bfdc3b9fbba2379aa24833da18528a; ?>
<?php unset($__attributesOriginal33bfdc3b9fbba2379aa24833da18528a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33bfdc3b9fbba2379aa24833da18528a)): ?>
<?php $component = $__componentOriginal33bfdc3b9fbba2379aa24833da18528a; ?>
<?php unset($__componentOriginal33bfdc3b9fbba2379aa24833da18528a); ?>
<?php endif; ?><?php /**PATH /home/yoshito/Projects/pio/storage/framework/views/4a90b33e4b91c46d01121f85423e1ff3.blade.php ENDPATH**/ ?>