<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 23-Dec-19
 * Time: 3:52 PM
 */
?>
    <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta name="viewport" content="width=1000"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="IE=Edge">
    <meta name="description" content="Page Description" />
    <!-- Chrome, Firefox OS, Opera and Vivaldi -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <title><?php echo e(isset($title) ? $title : ""); ?></title>
    <link rel="icon" type="image/ico" href="images/favicon.ico" />
    <?php echo $__env->make('home.goodinsured.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>


<body class="goods_insured">


    <?php echo $__env->make('home.goodinsured.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('home.goodinsured.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('home.goodinsured.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>

<?php /**PATH C:\wamp64\www\ssss\project\resources\views/home/goodinsured/layouts/master.blade.php ENDPATH**/ ?>