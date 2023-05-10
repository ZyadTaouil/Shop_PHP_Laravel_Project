
<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Your Orders</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Notes</th>
            </tr>
            </thead>
            <tbody>
            <?php if($orders): ?>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($order->id); ?></td>
                        <td><?php echo e($order->name); ?></td>
                        <td><?php echo e($order->email); ?></td>
                        <td><?php echo e($order->phone); ?></td>
                        <td><?php echo e($order->adress); ?></td>
                        <td><?php echo e($order->notes); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">
                        <p>You have no orders yet.</p>
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <a href="/" class="btn btn-primary">Go shopping</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaravelProject\resources\views/orders.blade.php ENDPATH**/ ?>