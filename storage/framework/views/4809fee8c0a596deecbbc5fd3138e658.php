

<?php $__env->startSection('content'); ?>
    <div class="container">
        <p><strong>Hostname :</strong> <?php echo e($scanResult->hostname); ?></p>
        <p><strong>IP :</strong> <?php echo e($scanResult->ip); ?></p>
        <p><strong>Status :</strong> <?php echo e($scanResult->status); ?></p>
        <p><strong>Ports ouverts :</strong> <?php echo e($scanResult->open_ports); ?></p>

        <!-- Graphique de la disponibilité (up vs down) -->
        <h2>Disponibilité</h2>
        <canvas id="availabilityChart"></canvas>

        <h2>Historique des scans (IP : <?php echo e($scanResult->ip); ?>)</h2>

        <?php if($relatedResults->count()): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hostname</th>
                        <th>Status</th>
                        <th>Ports</th>
                        <th>Créé le</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $relatedResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($res->id); ?></td>
                            <td><?php echo e($res->hostname); ?></td>
                            <td><?php echo e($res->status); ?></td>
                            <td><?php echo e($res->open_ports); ?></td>
                            <td><?php echo e($res->scan_time); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun enregistrement trouvé pour cette IP.</p>
        <?php endif; ?>

        <!-- Bouton retour -->
        <a href="javascript:history.back()">Revenir</a>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('availabilityChart').getContext('2d');

            // On récupère les data depuis nos variables Blade (statusCounts)
            let statusCounts = <?php echo json_encode($statusCounts, 15, 512) ?>; 

            let labels = Object.keys(statusCounts);    // ["up", "down"]
            let data   = Object.values(statusCounts);  // [5, 2]

            // schéma graphique en "tarte"
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Nombre de scans',
                        data: data,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)', // up
                            'rgba(255, 99, 132, 0.6)', // down
                            // plus de couleurs si plus de statuts
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\network-monitor\resources\views/scan_results/show.blade.php ENDPATH**/ ?>