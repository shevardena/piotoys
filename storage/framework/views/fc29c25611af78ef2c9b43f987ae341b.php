<?php if (isset($component)) { $__componentOriginalf128d9c762a54c6319e56d0f2cbd6d1e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf128d9c762a54c6319e56d0f2cbd6d1e = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Toggle::resolve(['data' => 'isSidebarHidden'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Toggle::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->make('backend.partials._top_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="flex overflow-hidden bg-white pt-16">
    <?php echo $__env->make('backend.partials._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
    <div id="main-content" style="min-height: calc(100vh - 64px)" class="w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
        <main class="mt-8 px-4  top-0 left-0 flex lg:flex flex-shrink-0 flex-col " >
            <?php echo e(Breadcrumbs::render()); ?>

            <div style="min-height: calc(100vh - 364px)">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <?php echo $__env->make('backend.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </main>
    </div>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf128d9c762a54c6319e56d0f2cbd6d1e)): ?>
<?php $attributes = $__attributesOriginalf128d9c762a54c6319e56d0f2cbd6d1e; ?>
<?php unset($__attributesOriginalf128d9c762a54c6319e56d0f2cbd6d1e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf128d9c762a54c6319e56d0f2cbd6d1e)): ?>
<?php $component = $__componentOriginalf128d9c762a54c6319e56d0f2cbd6d1e; ?>
<?php unset($__componentOriginalf128d9c762a54c6319e56d0f2cbd6d1e); ?>
<?php endif; ?>
<?php /**PATH /home/yoshito/Projects/pio/resources/views/backend/layouts/default.blade.php ENDPATH**/ ?>