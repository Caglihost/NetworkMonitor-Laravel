

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Détails pour le hostname : <?php echo e($hostname); ?></h1>

    <?php if($scanResults->isEmpty()): ?>
        <p>Aucun enregistrement trouvé pour ce hostname.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>IP</th>
                    <th>Status</th>
                    <th>Ports ouverts</th>
                    <th>Détail</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $scanResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($result->ip); ?></td>
                    <td><?php echo e($result->status); ?></td>
                    <td><?php echo e($result->open_ports); ?></td>
                    <td>
                        <a href="<?php echo e(route('scan_results.show', $result->id)); ?>">Voir détail</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>

    <a href="<?php echo e(route('scan_results.index')); ?>">Revenir à la liste des hostnames</a>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\network-monitor\resources\views/scan_results/show_by_hostname.blade.php ENDPATH**/ ?>