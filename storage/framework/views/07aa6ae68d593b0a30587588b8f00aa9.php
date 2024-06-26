<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['child','animation','afterLeave']));

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

foreach (array_filter((['child','animation','afterLeave']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal9c1b3bcdbb92880d08ba057cf26c9bd2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c1b3bcdbb92880d08ba057cf26c9bd2 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Transition::resolve(['child' => $child,'animation' => $animation,'afterLeave' => $afterLeave] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-transition'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Transition::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c1b3bcdbb92880d08ba057cf26c9bd2)): ?>
<?php $attributes = $__attributesOriginal9c1b3bcdbb92880d08ba057cf26c9bd2; ?>
<?php unset($__attributesOriginal9c1b3bcdbb92880d08ba057cf26c9bd2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c1b3bcdbb92880d08ba057cf26c9bd2)): ?>
<?php $component = $__componentOriginal9c1b3bcdbb92880d08ba057cf26c9bd2; ?>
<?php unset($__componentOriginal9c1b3bcdbb92880d08ba057cf26c9bd2); ?>
<?php endif; ?><?php /**PATH /home/yoshito/Projects/pio/storage/framework/views/800bb87d29907a8d3f9b4082061bf47e.blade.php ENDPATH**/ ?>