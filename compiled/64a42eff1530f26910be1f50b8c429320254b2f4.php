<?php $__env->startSection('content'); ?> 


<?php $__env->startComponent('partials.the_loop'); ?>
<?php
$imagen_banner_taller = get_field('imagen_banner_taller');
// current post id
$post_id = get_the_ID();
?>

<section class="w-full flex pt-6 pb-6 mt-32 h-48 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat bg-azul relative" <?php if($imagen_banner_taller): ?>  style="background-image: url(<?php echo e($imagen_banner_taller); ?>);" <?php endif; ?> >
    <?php if($imagen_banner_taller): ?>  
        <div class="absolute inset-0 w-full h-full  bg-gradient-to-t from-black opacity-50"></div>
    <?php endif; ?> 
    <div class="container flex flex-row h-100 max-w-screen-xl mx-auto justify-between lg:px-32 relative z-10">
        <div class="relative w-2/3">
            <a href="/mis-talleres/" class="text-blanco uppercase relative top-2 hover:text-naranjo transition duration-200"><i class="fak fa-back mr-4"></i> Volver</a>
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

                $html = '
                <div class="w-full mb-8">
                    <p class="text-negro">Ya terminaste el taller, recuerda descargar el certificado, subir tu proyecto, evaluar el taller y contactar una cita con tu tallerista.</p>
                    <a href="/haz-finalizado-el-taller/?taller='.$post_id.'" class="bg-rosado px-6 py-3 text-negro uppercase text-sm transition duration-200 hover:bg-negro hover:text-beige">Pasos finales <i class="fas fa-long-arrow-right"></i></a>
                </div>
                ';
                echo do_shortcode("[course_complete course_id='$post_id'] ". $html ." [/course_complete]"); 

                $thumbnail_id = get_post_thumbnail_id();
                $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
            ?>
            <img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?>">
            <?php
                  echo do_shortcode("[course_inprogress course_id='$post_id'][uo_course_resume course_id='$post_id'][/course_inprogress]");
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