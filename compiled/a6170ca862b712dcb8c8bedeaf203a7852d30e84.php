<?php
/*

Template name: Curso

*/
?>



<?php $__env->startSection('content'); ?> 

<?php echo $__env->make('partials.nav-curso', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startComponent('partials.the_loop'); ?>
<section class="w-full flex pt-6 pb-6 h-48 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/plantarda.jpg');">
    <div class="container flex flex-row h-100 max-w-screen-xl mx-auto justify-between lg:px-32">
        <div class="relative w-2/3">
            <a href="" class="text-naranjo uppercase relative top-0"><i class="fak fa-back mr-4"></i> Volver</a>
            <h1 class="text-beige font-festivo6 text-2xl lg:text-4xl absolute bottom-0"><?php echo e(the_title()); ?></h1>
        </div>
        <div class="w-1/3">
            lol
        </div>
    </div>
</section>

<section class="my-12" id="taller">
    <div class="flex container max-w-screen-xl mx-auto justify-between flex-row lg:px-32 gap-12">
        <div class="w-2/3">
            <?php echo e(the_content()); ?>

        </div>
        <div class="w-1/3">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
    </div>
</section>
<?php echo $__env->renderComponent(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/templates/single.blade.php ENDPATH**/ ?>