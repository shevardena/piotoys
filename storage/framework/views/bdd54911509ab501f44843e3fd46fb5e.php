<div class="translate-input-container <?php echo e($class); ?>">
    <div class="input-wrap relative">
        <?php switch($type):
            case ('text'): ?>
                <?php if (isset($component)) { $__componentOriginal690b64017277cbdd89bc2d788db21f28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal690b64017277cbdd89bc2d788db21f28 = $attributes; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Input::resolve(['name' => ''.e($name).'','label' => ''.e($label).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splade-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\ProtoneMedia\Splade\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                <?php break; ?>
        <?php endswitch; ?>
        <div class="locale-dropdown absolute right-0 top-[35px]">
            <div class="locale-display cursor-pointer" id="current-locale-display">
                <span id="current-locale"><?php echo e($defaultLocale); ?></span>
            </div>
            <div class="dropdown-menu hidden" id="dropdown-menu">
                <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="dropdown-item cursor-pointer" data-locale="<?php echo e($locale->code); ?>">
                        <?php echo e($locale->name); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input
                        name="<?php echo e($locale->code); ?>[<?php echo e($name); ?>]"
                        label="<?php echo e($label); ?>"/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<style>
    .locale-dropdown {
        position: absolute;
        right: 10px;
        display: flex;
        align-items: center;
        cursor: pointer;
        z-index: 2;
    }

    .locale-display {
        padding: 0 10px;
        border-left: 1px solid #ccc;
        background: white;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        right: 10px;
        background: white;
        border: 1px solid #ccc;
        border-radius: 4px;
        z-index: 1000;
        width: 100px;
    }

    .dropdown-item {
        padding: 10px;
        cursor: pointer;
    }

    .dropdown-item:hover {
        background: #f0f0f0;
    }
</style>
<?php /**PATH /home/yoshito/Projects/pio/resources/views/components/translatable-input.blade.php ENDPATH**/ ?>