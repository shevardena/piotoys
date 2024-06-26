<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="<?php echo e(asset('vendor/bladewind/css/animate.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('vendor/bladewind/css/bladewind-ui.min.css')); ?>" rel="stylesheet" />
    <?php echo e(app('laravel-splade-seo')->renderHead()); ?>

    <script src="<?php echo e(asset('vendor/bladewind/js/helpers.js')); ?>"></script>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</head>
<body class="antialiased">
<div id="app" data-components="<?php echo e(json_encode($components)); ?>" data-html="<?php echo e(json_encode($html)); ?>" data-dynamics="<?php echo e(json_encode($dynamics)); ?>" data-splade="<?php echo e(json_encode($splade)); ?>">
<?php echo $ssrBody; ?>

</div>
</body>
</html>
<?php /**PATH /home/yoshito/Projects/pio/resources/views/root.blade.php ENDPATH**/ ?>