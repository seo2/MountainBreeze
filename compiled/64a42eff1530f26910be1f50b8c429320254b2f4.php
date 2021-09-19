<?php $__env->startSection('content'); ?> 


<?php $__env->startComponent('partials.the_loop'); ?>
<?php
$imagen_banner_taller = get_field('imagen_banner_taller');

?>

<section class="w-full flex pt-6 pb-6 mt-32 h-48 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat bg-azul" style="background-image: url(<?php echo e($imagen_banner_taller); ?>);">
    <div class="container flex flex-row h-100 max-w-screen-xl mx-auto justify-between lg:px-32">
        <div class="relative w-2/3">
            <a href="/mis-talleres/" class="text-blanco uppercase relative top-0 hover:text-naranjo transition duration-200"><i class="fak fa-back mr-4"></i> Volver</a>
            <h1 class="text-beige font-festivo6 text-2xl lg:text-4xl absolute bottom-0"><?php echo e(the_title()); ?></h1>
        </div> 
        <div class="w-1/3 flex justify-center content-center items-center">
            <?php
                $permalink  = get_permalink( get_field('tallerista'));
                $title      = get_the_title( get_field('tallerista') );
                $url        = get_the_post_thumbnail_url( get_field('tallerista')  );
                $instagram  = get_field( 'instagram', get_field('tallerista') );
            ?>
            <div class="rounded-full h-20 w-20 flex items-center justify-center bg-naranjo border border-negro mr-4 bg-cover" style="background-image: url('<?php echo $url; ?>">

            </div>
            <div>
                <a href="<?php echo $permalink; ?>" class="text-beige uppercase text-xle hover:underline"><?php echo $title; ?></p>
                <a href="https://instagram.com/<?php echo $instagram; ?>" class="text-beige hover:underline"><?php echo '@'.$instagram; ?></a>
            </div>
        </div>
    </div>
</section>

<section class="my-12" id="taller">
    <div class="flex container max-w-screen-xl mx-auto justify-between flex-row lg:px-32 gap-12">
        <div class="w-2/3">
            <?php
                  echo do_shortcode('[uo_learndash_resume_link]');
            ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/templates/single.blade.php ENDPATH**/ ?>