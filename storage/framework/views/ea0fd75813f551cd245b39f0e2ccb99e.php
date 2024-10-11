<?php \ProtoneMedia\Splade\Facades\SEO::title('Create Menu'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal0fa64b0fcaaf7eda55656601ad1cf28b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0fa64b0fcaaf7eda55656601ad1cf28b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.page-title','data' => ['heading' => 'Menu']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backend.page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['heading' => 'Menu']); ?>
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
        <?php if (isset($component)) { $__componentOriginale6278a0588d6b97345ecb6e9bf149e6c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6278a0588d6b97345ecb6e9bf149e6c = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Data::resolve(['default' => '{ locale: \''.e($locales->first()->code).'\' }'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Data::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => ''.e(route('menus.store')).'','method' => 'POST']); ?>
                <?php if (isset($component)) { $__componentOriginalfe8226cb659a7e2982b96ab926f35445 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfe8226cb659a7e2982b96ab926f35445 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Errors::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Errors::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    
                    <div class="flex justify-start space-x-4">
                        <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="cursor-pointer" @click="data.locale = '<?php echo e($locale->code); ?>'"
                                 :class="{ 'opacity-100': data.locale === '<?php echo e($locale->code); ?>', 'opacity-50': data.locale !== '<?php echo e($locale->code); ?>' }">
                                <?php echo $locale->icon; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div v-show="data.locale === '<?php echo e($locale->code); ?>'" class="flex flex-col sm:flex-row mt-4">
                            <?php if (isset($component)) { $__componentOriginal690b64017277cbdd89bc2d788db21f28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal690b64017277cbdd89bc2d788db21f28 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Input::resolve(['name' => 'name['.e($locale->code).']','label' => 'Name','validationKey' => ''.e($locale->code == $defaultLocale ? 'name.'. $locales->first()->code: 'name').''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full sm:w-1/2 mr-8 mt-4 sm:mt-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal690b64017277cbdd89bc2d788db21f28)): ?>
<?php $attributes = $__attributesOriginal690b64017277cbdd89bc2d788db21f28; ?>
<?php unset($__attributesOriginal690b64017277cbdd89bc2d788db21f28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal690b64017277cbdd89bc2d788db21f28)): ?>
<?php $component = $__componentOriginal690b64017277cbdd89bc2d788db21f28; ?>
<?php unset($__componentOriginal690b64017277cbdd89bc2d788db21f28); ?>
<?php endif; ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col sm:flex-row mt-4">
                        <?php if (isset($component)) { $__componentOriginal76ab60a8762e3c5542f741a9efaac6ed = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal76ab60a8762e3c5542f741a9efaac6ed = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Checkbox::resolve(['name' => 'is_active','value' => '1','label' => 'Is active?'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form\Checkbox::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal76ab60a8762e3c5542f741a9efaac6ed)): ?>
<?php $attributes = $__attributesOriginal76ab60a8762e3c5542f741a9efaac6ed; ?>
<?php unset($__attributesOriginal76ab60a8762e3c5542f741a9efaac6ed); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76ab60a8762e3c5542f741a9efaac6ed)): ?>
<?php $component = $__componentOriginal76ab60a8762e3c5542f741a9efaac6ed; ?>
<?php unset($__componentOriginal76ab60a8762e3c5542f741a9efaac6ed); ?>
<?php endif; ?>
                    </div>
                    <div class="mt-4 mb-2">
                        <?php if (isset($component)) { $__componentOriginal2d975ce603f483bebe2dbee59a477e99 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d975ce603f483bebe2dbee59a477e99 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Submit::resolve(['label' => 'Create','spinner' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form\Submit::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-cyan-600 text-white']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d975ce603f483bebe2dbee59a477e99)): ?>
<?php $attributes = $__attributesOriginal2d975ce603f483bebe2dbee59a477e99; ?>
<?php unset($__attributesOriginal2d975ce603f483bebe2dbee59a477e99); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d975ce603f483bebe2dbee59a477e99)): ?>
<?php $component = $__componentOriginal2d975ce603f483bebe2dbee59a477e99; ?>
<?php unset($__componentOriginal2d975ce603f483bebe2dbee59a477e99); ?>
<?php endif; ?>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfe8226cb659a7e2982b96ab926f35445)): ?>
<?php $attributes = $__attributesOriginalfe8226cb659a7e2982b96ab926f35445; ?>
<?php unset($__attributesOriginalfe8226cb659a7e2982b96ab926f35445); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfe8226cb659a7e2982b96ab926f35445)): ?>
<?php $component = $__componentOriginalfe8226cb659a7e2982b96ab926f35445; ?>
<?php unset($__componentOriginalfe8226cb659a7e2982b96ab926f35445); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a)): ?>
<?php $attributes = $__attributesOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a; ?>
<?php unset($__attributesOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a)): ?>
<?php $component = $__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a; ?>
<?php unset($__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale6278a0588d6b97345ecb6e9bf149e6c)): ?>
<?php $attributes = $__attributesOriginale6278a0588d6b97345ecb6e9bf149e6c; ?>
<?php unset($__attributesOriginale6278a0588d6b97345ecb6e9bf149e6c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6278a0588d6b97345ecb6e9bf149e6c)): ?>
<?php $component = $__componentOriginale6278a0588d6b97345ecb6e9bf149e6c; ?>
<?php unset($__componentOriginale6278a0588d6b97345ecb6e9bf149e6c); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yoshito/Projects/pio/resources/views/backend/pages/menu/create.blade.php ENDPATH**/ ?>