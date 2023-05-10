

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card">
                        <img src="<?php echo e($product->image); ?>" id="card-img-top" alt="<?php echo e($product->title); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($product->title); ?></h5>
                            <p class="card-text"><?php echo e($product->description); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                            <span class="price">$<?php echo e($product->price); ?></span>
                            <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="input-group">
                                    <input type="number" name="quantity"
                                           value="1" min="1"
                                           class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"
                                                type="submit">Add to cart
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaravelProject\resources\views/home.blade.php ENDPATH**/ ?>