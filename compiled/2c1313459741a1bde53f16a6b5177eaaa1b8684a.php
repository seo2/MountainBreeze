<?php if(have_posts()): ?>
    <?php while(have_posts()): ?>
        <?php (the_post()); ?>
        <?php echo e($slot); ?>

    <?php endwhile; ?>
<?php endif; ?>
<?php /**PATH /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/templates/partials/the_loop.blade.php ENDPATH**/ ?>