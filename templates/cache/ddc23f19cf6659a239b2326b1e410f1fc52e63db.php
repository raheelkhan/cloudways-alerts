<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
    <p>Dear Cloudways User,</p>
        <p>
        Here are your recent server alerts:
        <ul>
            <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><b><?php echo e($stat); ?></b> -  <?php echo e($value); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>`
    </p>
</body>
</html>