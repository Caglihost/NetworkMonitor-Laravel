

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Liste des hostnames scannés</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Hostname</th>
                    <th>Voir détail</th>
                </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $distinctHostnames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($item->hostname); ?></td>
                    <td>
                        <!-- Lien pour voir toutes les IP relatives à ce hostname avec showByHostname() -->
                        <a href="<?php echo e(route('scan_results.showByHostname', $item->hostname)); ?>">
                            Voir détail
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="2">Aucun hostname trouvé.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\network-monitor\resources\views/scan_results/index.blade.php ENDPATH**/ ?>