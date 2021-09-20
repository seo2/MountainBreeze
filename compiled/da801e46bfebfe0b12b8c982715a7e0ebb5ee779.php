<?php
/*

Template name: Herencia Colectiva

*/
?>



<?php $__env->startSection('content'); ?> 

<section class="w-full bg-beige pt-36 <?php if(is_user_logged_in()): ?> lg:pt-48 <?php endif; ?>  pb-48 lg:pb-24 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_rosado_top.png');">
    <div class=" w-4/5  lg:w-1/2 mx-auto lg:text-center">
        <span class="absolute -right-2 transform -rotate-45 lg:relative text-beige text-9xl lg:text-6xl hidden"><i class="fak fa-espiga"></i></span>
        <h1 class="text-negro font-festivo6 text-5xl lg:text-6xl uppercase mb-5">Herencia Colectiva</h1>
        <p class="text-negro mb-2">Los saberes son reliquias, son formas de ver el mundo, de imaginarlo, de sentirlo y experienciarlo. </p>
        <p class="text-negro mb-2">Estos saberes habitan en quienes han sabido guardarlos, preservarlos, rescatarlos y reactualizarlos. Son las reliquias de una herencia circular, colaborativa y común. </p>
        <p class="text-negro">Son las reliquias de una herencia colectiva. </p>
    </div>
</section>

<section class="w-full lg:pt-12 pb-48 bg-beige">
    <div class="container lg:px-32">
        <div class="grid lg:grid-cols-2 gap-16 w-4/5 mx-auto lg:w-full">
            <div class="hidden lg:block">
                <div class="relative sticky top-40">
                    <img class="absolute z-10 right-80 top-48" src="<?php bloginfo('template_url') ?>/dist/img/scotch.png" alt="cinta adhesiva">
                    <img class="absolute z-10 left-4 top-8" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas_horizontales.svg" alt="cinta adhesiva">
                    <img class="absolute z-10 right-4 -bottom-16" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas.svg" alt="cinta adhesiva">
                    
                    <img class="ml-auto relative z-1" src="<?php bloginfo('template_url') ?>/dist/img/hc1.jpg" alt="Origen">
                    <img class="-mt-4" src="<?php bloginfo('template_url') ?>/dist/img/hc2.jpg" alt="Somos Herencia">
                </div>
            </div>
            <div class="" id="herencia-colectiva">

                <div class="relative mb-8 lg:hidden">
                    <img class="absolute z-10 right-80 top-48" src="<?php bloginfo('template_url') ?>/dist/img/scotch.png" alt="cinta adhesiva">
                    <img class="absolute z-10 left-4 top-8" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas_horizontales.svg" alt="Rayas">
                    <img class="absolute z-10 right-0 lg:right-4 -bottom-4 lg:-bottom-16 w-3/6 lg:w-auto" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas.svg" alt="cinta adhesiva">
                    
                    <img class="ml-auto relative z-1 w-3/4" src="<?php bloginfo('template_url') ?>/dist/img/hc1.jpg" alt="Origen">
                    <img class="-mt-4 w-3/4" src="<?php bloginfo('template_url') ?>/dist/img/hc2.jpg" alt="Somos Herencia">
                </div>

                <?php the_field('descripcion'); ?>

                
                <a href="<?php bloginfo('url'); ?>/como-funciona" class="btn">Cómo funciona</a>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <?php echo $__env->make('partials.suscribirse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/templates/single-herencia_colectiva.blade.php ENDPATH**/ ?>