<?php \ProtoneMedia\Splade\Facades\SEO::title('Products'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal0fa64b0fcaaf7eda55656601ad1cf28b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0fa64b0fcaaf7eda55656601ad1cf28b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.page-title','data' => ['heading' => 'Products','links' => [
            ['title' => 'Create', 'can' => 'create product', 'url' => route('products.create'), 'icon' => 'fa-solid fa-plus', 'class' => 'bg-cyan-600 hover:bg-cyan-700'],
            ['title' => 'Import', 'can' => 'import product', 'url' => route('products.import_images'), 'icon' => 'fa-solid fa-file-import', 'class' => 'bg-green-600 hover:bg-green-700'],
        ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backend.page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['heading' => 'Products','links' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
            ['title' => 'Create', 'can' => 'create product', 'url' => route('products.create'), 'icon' => 'fa-solid fa-plus', 'class' => 'bg-cyan-600 hover:bg-cyan-700'],
            ['title' => 'Import', 'can' => 'import product', 'url' => route('products.import_images'), 'icon' => 'fa-solid fa-file-import', 'class' => 'bg-green-600 hover:bg-green-700'],
        ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0fa64b0fcaaf7eda55656601ad1cf28b)): ?>
<?php $attributes = $__attributesOriginal0fa64b0fcaaf7eda55656601ad1cf28b; ?>
<?php unset($__attributesOriginal0fa64b0fcaaf7eda55656601ad1cf28b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0fa64b0fcaaf7eda55656601ad1cf28b)): ?>
<?php $component = $__componentOriginal0fa64b0fcaaf7eda55656601ad1cf28b; ?>
<?php unset($__componentOriginal0fa64b0fcaaf7eda55656601ad1cf28b); ?>
<?php endif; ?>
    <div class="mx-4 mt-5 h-full">
        <?php if (isset($component)) { $__componentOriginal9e290f7144d9abd075e5cf038a814133 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e290f7144d9abd075e5cf038a814133 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Table::resolve(['for' => $products] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Table::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php $__env->slot('spladeTableCell67daf92c833c41c95db874e18fcb2786', function ($product, $key) use ($__env) { ?> 
                <?php echo $product->description; ?>

             <?php }); ?>
            <?php $__env->slot('spladeTableCell78805a221a988e79ef3f42d7c5bfd418', function ($product, $key) use ($__env) { ?> 
                <?php echo e($product->getFirstMedia('image')); ?>

             <?php }); ?>
            <?php $__env->slot('spladeTableCell4264c638e0098acb172519b0436db099', function ($product, $key) use ($__env) { ?> 
                <?php echo e($product->is_active == 1 ? 'true' : 'false'); ?>

             <?php }); ?>
            <?php $__env->slot('spladeTableCellebb67a4271abe715344471b0f16321f6', function ($product, $key) use ($__env) { ?> 
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update product')): ?>
                    <Link href="<?php echo e(route('products.edit', $product->id)); ?>"
                          class="mr-2 text-white bg-cyan-600 hover:bg-cyan-600 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </Link>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete product')): ?>
                    <Link confirm="You are deleting toy product"
                          confirm-text="Are you sure?"
                          confirm-button="Yes"
                          cancel-button="No"
                          method="DELETE"
                          href="<?php echo e(route('products.destroy', $product->id)); ?>"
                          class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-trash-can mr-1"></i>
                        Delete
                    </Link>
                <?php endif; ?>
             <?php }); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e290f7144d9abd075e5cf038a814133)): ?>
<?php $attributes = $__attributesOriginal9e290f7144d9abd075e5cf038a814133; ?>
<?php unset($__attributesOriginal9e290f7144d9abd075e5cf038a814133); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e290f7144d9abd075e5cf038a814133)): ?>
<?php $component = $__componentOriginal9e290f7144d9abd075e5cf038a814133; ?>
<?php unset($__componentOriginal9e290f7144d9abd075e5cf038a814133); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yoshito/Projects/pio/resources/views/backend/pages/product/index.blade.php ENDPATH**/ ?>