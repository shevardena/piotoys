<div class="m-4">
    <div class="flow-root">
        <h2 class="float-left text-2xl font-extrabold dark:text-white">
            <?php echo e($heading); ?>

        </h2>
        <?php if(isset($links) && is_array($links) && count($links) > 0): ?>
            <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($link['can'])): ?>
                    <?php if(isset($link['url'])): ?>
                        <Link href="<?php echo e($link['url']); ?>"
                              class="float-right mr-2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center <?php echo e($link['class'] ?? ''); ?>">
                        <?php if(isset($link['icon'])): ?>
                            <i class="<?php echo e($link['icon']); ?> mr-1"></i>
                            <?php endif; ?>
                            <?php echo e($link['title']); ?>

                            </Link>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php elseif(isset($can) && isset($url) && !empty($url)): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($can)): ?>
                        <Link href="<?php echo e($url); ?>"
                              class="float-right mr-2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <?php if(isset($title)): ?>
                            <i class="fa-solid fa-plus mr-1"></i>
                            <?php echo e($title); ?>

                            <?php endif; ?>
                            </Link>
                        <?php endif; ?>
                    <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/yoshito/Projects/pio/resources/views/components/backend/page-title.blade.php ENDPATH**/ ?>