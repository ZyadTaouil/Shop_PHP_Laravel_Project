<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo e(config('app.name', 'Shop')); ?></title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('cart')); ?>">Cart</a>
            </li>
            <?php if(Auth::check()): ?>
            <li class="nav-item">
                <a class="nav-link"
                   href="<?php echo e(url('orders')); ?>">Orders</a>
            </li>
                <li class="nav-item">
                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="nav-link btn btn-link text-white p-0"
                                style=" margin-left: 17%; margin-top: 14% ;">Logout</button>
                    </form>
                </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<div class="container py-5">
    <?php if($messages = session()->get('messages', [])): ?>
    <div class="alert alert-dismissible fade show" role="alert">
        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-<?php echo e($category); ?>" role="alert">
            <?php echo e($message); ?>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <button type="button" class="close" data-dismiss="alert"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
<div id="app">
    <?php echo $__env->yieldContent('content'); ?>
</div>
</div>
<!-- Scripts -->
<script src="<?php echo e(mix('js/app.js')); ?>"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-X6FyU6KmlQFvM8m7mZKcJLNTzgEYucG8P7jK9XnDlk7x0izJzHlVlAVTkQLjK7Wu"
        crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LaravelProject\resources\views/layouts/app.blade.php ENDPATH**/ ?>