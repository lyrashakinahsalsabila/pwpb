

<?php $__env->startSection('content'); ?>
<h1>Dashboard</h1>
<?php if($message =Session::get('success')): ?>
 <p><?php echo e($message); ?></p>
<?php else: ?>
<p>You Are Logged In!</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\cd_lyra\resources\views/auth/dashboard.blade.php ENDPATH**/ ?>