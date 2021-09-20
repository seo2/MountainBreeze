<?php
/*

Template name: Mis favoritos

*/
?>



<?php $__env->startSection('content'); ?> 

<section class="w-full bg-beige mt-8 pt-36 pb-8 lg:pb-8 lg:bg-contain bg-left-top lg:bg-bottom bg-no-repeat " >
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <h1 class="text-negro font-festivo6 text-5xl uppercase">Mis favoritos</h1>
    </div>
</section>

<section class="my-12">
    <div class="container w-full lg:w-3/5 mx-auto min-h-3/4 ">
        <?php $__env->startComponent('partials.the_loop'); ?>
        <?php echo e(the_content()); ?>

        <?php echo $__env->renderComponent(); ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/templates/page-favoritos.blade.php ENDPATH**/ ?>