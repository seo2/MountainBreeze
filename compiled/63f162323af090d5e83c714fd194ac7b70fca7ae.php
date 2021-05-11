<?php
/*

Template name: Subir Proyectos

*/
?>



<?php $__env->startSection('content'); ?> 

<section class="w-full bg-naranjo mt-8 pt-36 pb-8 lg:pb-8 lg:bg-contain bg-left-top lg:bg-bottom bg-no-repeat " >
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <h1 class="text-beige font-festivo6 text-5xl uppercase">Comparte tu proyecto</h1>
    </div>
</section>

<section class="">
    <div class="flex items-center justify-center bg-beige py-8 px-4 sm:px-6 lg:px-4">
        <div class="max-w-sm w-full space-y-8">
          <?php $__env->startComponent('partials.the_loop'); ?>
          <?php the_content(); ?>
          <?php echo $__env->renderComponent(); ?>
        </div>
      </div>



</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/templates/page-subir-proyecto.blade.php ENDPATH**/ ?>