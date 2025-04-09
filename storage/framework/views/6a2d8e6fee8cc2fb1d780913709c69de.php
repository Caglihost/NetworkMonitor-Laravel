<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Network Monitor'); ?></title>

    <!-- Lien vers notre fichier CSS (dans public/css/styles.css) -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <!-- Dans resources/views/layouts/app.blade.php, par exemple, dans le <head> ou tout en bas du <body> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="app-container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\network-monitor\resources\views/layouts/app.blade.php ENDPATH**/ ?>