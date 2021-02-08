<?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(is_user_logged_in()): ?>
    <?php echo $__env->make('partials.nav-user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->yieldContent('footer'); ?>

<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/templates/layouts/app.blade.php ENDPATH**/ ?>