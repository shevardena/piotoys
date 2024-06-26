<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['panel']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['panel']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal54662192f7088e7e1705e32c35515a55 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal54662192f7088e7e1705e32c35515a55 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Dialog::resolve(['panel' => $panel] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-dialog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Dialog::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal54662192f7088e7e1705e32c35515a55)): ?>
<?php $attributes = $__attributesOriginal54662192f7088e7e1705e32c35515a55; ?>
<?php unset($__attributesOriginal54662192f7088e7e1705e32c35515a55); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal54662192f7088e7e1705e32c35515a55)): ?>
<?php $component = $__componentOriginal54662192f7088e7e1705e32c35515a55; ?>
<?php unset($__componentOriginal54662192f7088e7e1705e32c35515a55); ?>
<?php endif; ?><?php /**PATH /home/yoshito/Projects/pio/storage/framework/views/7cecdd2bb8f811d2b1cebcec00a8857e.blade.php ENDPATH**/ ?>