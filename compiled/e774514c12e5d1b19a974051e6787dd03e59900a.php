<?php $__env->startSection('content'); ?> 


<section class="mt-12">
    <div class="flex container max-w-screen-xl mx-auto justify-between flex-row lg:px-32">
        <div class="w-100">
            <?php echo $__env->make('partials.the_loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</section>

 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <?php echo $__env->make('partials.suscribirse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/templates/index.blade.php ENDPATH**/ ?>