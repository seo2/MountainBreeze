<?php if(have_posts()): ?>
    <?php while(have_posts()): ?>
        <?php (the_post()); ?>
        <?php echo e($slot); ?>

    <?php endwhile; ?>
<?php endif; ?>
<?php /**PATH /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/templates/partials/the_loop.blade.php ENDPATH**/ ?>