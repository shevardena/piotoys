<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginal9f93807798659eeec3d6d3a3f12702f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f93807798659eeec3d6d3a3f12702f0 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Dropdown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Dropdown::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>
 <?php $__env->slot('trigger', null, []); ?> <?php echo e($trigger); ?> <?php $__env->endSlot(); ?>
<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f93807798659eeec3d6d3a3f12702f0)): ?>
<?php $attributes = $__attributesOriginal9f93807798659eeec3d6d3a3f12702f0; ?>
<?php unset($__attributesOriginal9f93807798659eeec3d6d3a3f12702f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f93807798659eeec3d6d3a3f12702f0)): ?>
<?php $component = $__componentOriginal9f93807798659eeec3d6d3a3f12702f0; ?>
<?php unset($__componentOriginal9f93807798659eeec3d6d3a3f12702f0); ?>
<?php endif; ?><?php /**PATH /home/yoshito/Projects/pio/storage/framework/views/9405704aa043afeab3617d0d7ae70444.blade.php ENDPATH**/ ?>