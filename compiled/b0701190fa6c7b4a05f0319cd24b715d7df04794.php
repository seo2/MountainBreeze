<?php
/*

Template name: El Cambio

*/
?>



<?php $__env->startSection('content'); ?> 

<section class="w-full bg-fondooscuro pt-36 pb-24 lg:pb-12 lg:bg-cover bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/Fondo_Negro_1.png');">
    <div class="w-full h-60 bg-gradient-to-t from-transparent to-black absolute top-0 left-0"></div>
    <img src="<?php bloginfo('template_url') ?>/dist/img/rayas2.svg" alt="rayas" class="absolute w-1/3 lg:w-1/6 top-24 lg:top-12 right-0">
    <div class="container mx-auto">
        <div class="grid grid-cols-12">
            <div class="col-start-2 col-span-10 lg:col-start-2 lg:col-span-3">
                <h1 class="text-beige font-festivo6 text-5xl lg:text-6xl uppercase mb-5">El cambio</h1>
                <p class="text-rosado">Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.</p>
            </div>
        </div>
    </div>
</section>
<section class="w-full pb-48">
    <div class="container">
        <div class="grid grid-cols-12 flex items-end -mt-12 lg:-mt-24">
            <div class="col-start-2 col-span-10 lg:col-start-6 lg:col-span-6 lg:hidden mb-4">
                <img src="<?php bloginfo('template_url') ?>/dist/img/VIDEO.jpg" alt="" class="w-full">
            </div>
            <div class="col-start-2 col-span-10 lg:col-start-2 lg:col-span-3">
                <a href="<?php bloginfo('url'); ?>/herencia-colectiva" class="btn mb-4">Herencia Colectiva</a>
                <a href="<?php bloginfo('url'); ?>/como-funciona" class="btn">Cómo funciona</a>
            </div>
            <div class="col-start-2 col-span-10 lg:col-start-6 lg:col-span-6 hidden lg:block">
                <img src="<?php bloginfo('template_url') ?>/dist/img/VIDEO.jpg" alt="" class="w-full">
            </div>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <?php echo $__env->make('partials.suscribirse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/templates/page-elcambio.blade.php ENDPATH**/ ?>