<?php \ProtoneMedia\Splade\Facades\SEO::title('Pio Toys - Coming Soon'); ?>
<?php \ProtoneMedia\Splade\Facades\SEO::keywords('toys,child toys,toy,სათამაშო,მეორადი სათამაშოები'); ?>
<?php \ProtoneMedia\Splade\Facades\SEO::description('Poy Toys'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-cover bg-center min-h-screen flex items-center justify-center py-10 md:py-20 responsive-bg" style="background-image: url('<?php echo e(asset('images/bg.png')); ?>');">
        <div class="text-center">
            <h1 class="text-6xl font-bold">
                <span class="text-pio-green">Com</span>
                <span class="text-pio-orange">ing</span>
                <span class="text-pio-blue"> Soon</span>
            </h1>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yoshito/Projects/pio/resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>