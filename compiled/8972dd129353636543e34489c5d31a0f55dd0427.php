<?php
/*

Template name: Mis cursos

*/
?>



<?php $__env->startSection('content'); ?> 

<section class="w-full bg-azul mt-8 pt-36 pb-8 lg:pb-8 lg:bg-contain bg-left-top lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_azul_franja.png');">
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <h1 class="text-beige font-festivo6 text-5xl uppercase">Mis Talleres</h1>
    </div>
</section>

<section class="mt-12">
    <div class="flex container w-90 mx-auto justify-between flex-row lg:px-44">
        <?php $__env->startComponent('partials.the_loop'); ?>
        <?php echo e(the_content()); ?>

        <?php echo $__env->renderComponent(); ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/templates/page-miscursos.blade.php ENDPATH**/ ?>