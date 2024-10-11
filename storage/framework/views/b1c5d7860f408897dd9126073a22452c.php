<?php \ProtoneMedia\Splade\Facades\SEO::title('Edit Profile'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal0fa64b0fcaaf7eda55656601ad1cf28b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0fa64b0fcaaf7eda55656601ad1cf28b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.page-title','data' => ['heading' => 'Edit profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backend.page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['heading' => 'Edit profile']); ?>
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
        <?php if (isset($component)) { $__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form::resolve(['unguarded' => 'password','default' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['method' => 'PUT','action' => ''.e(route('profile.update', $user)).'']); ?>
            <div class="flex flex-col sm:flex-row mt-4">
                <?php if (isset($component)) { $__componentOriginal690b64017277cbdd89bc2d788db21f28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal690b64017277cbdd89bc2d788db21f28 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Input::resolve(['name' => 'first_name','label' => 'First name'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full sm:w-1/2 mt-4 sm:mt-0 sm:mr-4']); ?>
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
                <?php if (isset($component)) { $__componentOriginal690b64017277cbdd89bc2d788db21f28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal690b64017277cbdd89bc2d788db21f28 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Input::resolve(['name' => 'last_name','label' => 'Last name'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full sm:w-1/2 mt-4 sm:mt-0']); ?>
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
            <div class="flex flex-col sm:flex-row mt-4">
                <?php if (isset($component)) { $__componentOriginal690b64017277cbdd89bc2d788db21f28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal690b64017277cbdd89bc2d788db21f28 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Input::resolve(['type' => 'email','name' => 'email','label' => 'Email'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full sm:w-1/2 mt-4 sm:mt-0']); ?>
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
            <div class="flex flex-col sm:flex-row mt-4">
                <?php if (isset($component)) { $__componentOriginal690b64017277cbdd89bc2d788db21f28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal690b64017277cbdd89bc2d788db21f28 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Input::resolve(['type' => 'password','name' => 'current_password','label' => 'Current Password'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full sm:w-1/2 mt-4 sm:mt-0 sm:mr-4']); ?>
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
            <div class="flex flex-col sm:flex-row mt-4">
                <?php if (isset($component)) { $__componentOriginal690b64017277cbdd89bc2d788db21f28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal690b64017277cbdd89bc2d788db21f28 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Input::resolve(['type' => 'password','name' => 'new_password','label' => 'New Password'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full sm:w-1/2 mt-4 sm:mt-0 sm:mr-4']); ?>
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
                <?php if (isset($component)) { $__componentOriginal690b64017277cbdd89bc2d788db21f28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal690b64017277cbdd89bc2d788db21f28 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Input::resolve(['type' => 'password','name' => 'new_password_confirmation','label' => 'Confirm New Password'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full sm:w-1/2 mt-4 sm:mt-0']); ?>
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
            <div class="mt-4 mb-2">
                <?php if (isset($component)) { $__componentOriginal2d975ce603f483bebe2dbee59a477e99 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d975ce603f483bebe2dbee59a477e99 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Submit::resolve(['label' => 'Update','spinner' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form\Submit::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
<?php if (isset($__attributesOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a)): ?>
<?php $attributes = $__attributesOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a; ?>
<?php unset($__attributesOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a)): ?>
<?php $component = $__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a; ?>
<?php unset($__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yoshito/Projects/pio/resources/views/backend/pages/profile/edit.blade.php ENDPATH**/ ?>