<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginal199d197332268707894db5b362ea9e84 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal199d197332268707894db5b362ea9e84 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\TableWrapper::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-table-wrapper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\TableWrapper::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal199d197332268707894db5b362ea9e84)): ?>
<?php $attributes = $__attributesOriginal199d197332268707894db5b362ea9e84; ?>
<?php unset($__attributesOriginal199d197332268707894db5b362ea9e84); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal199d197332268707894db5b362ea9e84)): ?>
<?php $component = $__componentOriginal199d197332268707894db5b362ea9e84; ?>
<?php unset($__componentOriginal199d197332268707894db5b362ea9e84); ?>
<?php endif; ?><?php /**PATH /home/yoshito/Projects/pio/storage/framework/views/031c560b93fef3f0b369c2ad251992ac.blade.php ENDPATH**/ ?>