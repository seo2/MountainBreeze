<?php
/*

Template name: FAQ

*/
?>



<?php $__env->startSection('content'); ?> 
<?php $__env->startComponent('partials.the_loop'); ?>
<section class="w-full bg-white pt-36 pb-48 lg:pb-24 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_naranjo_top.png');" id="faq1">
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <span class="absolute lg:relative -top-8 -right-2 lg:top-auto lg:right-auto transform -rotate-45 text-negro text-9xl lg:text-6xl"><i class="fak fa-llama"></i></span>
        <h1 class="text-beige font-festivo6 text-5xl lg:text-6xl uppercase mb-5 w-3/4 lg:w-full"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</section>

<section class="w-full lg:pt-4 pb-48 relative lg:bg-contain bg-no-repeat bg-top -mt-12 lg:mt-auto" >
    <div class="container lg:px-32">
        <img src="<?php bloginfo('template_url') ?>/dist/img/oxoxox.svg" alt="x_x" class="lg:hidden mx-auto mt-12">
        <div class="grid lg:grid-cols-12 gap-x-16 w-5/6 mx-auto lg:w-full mt-10" >
            <div class="lg:col-span-2 font-festivo8 text-6xl text-negro"><?php the_field('titulo') ?></div>
            <div class="lg:col-span-8 text-gris mt-2"><?php the_field('texto') ?></div>
        </div>
        <div class="grid lg:grid-cols-2 lg:gap-x-16 w-5/6 mx-auto lg:w-full leading-loose mt-6"  x-data="{
            faqs: [
				<?php if( have_rows('pregunta') ): ?>
					<?php while( have_rows('pregunta') ): the_row(); ?>
                        {
                            question: '<?php the_sub_field('pregunta'); ?>',
                            answer: '<?php the_sub_field('respuesta'); ?>',
                            isOpen: false,
                        },                        
					<?php endwhile; ?>
				<?php endif; ?>
            ]
        }">
            <template x-for="faq in faqs" :key="faq.question">
                <div>
                    <button class="w-full border-b border-gris5 py-3 flex justify-between items-center mt-4"
                        @click="faqs = faqs.map(f => ({ ...f, isOpen: f.question !== faq.question ? false : !f.isOpen}))"><!-- Specs has it that only one component can be open at a time and also you should be able to toggle the open state of the active component too -->
                        <div x-text="faq.question" class="text-gris"></div>
                        <svg x-show="!faq.isOpen" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui text-naranjo" d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm1-9h2a1 1 0 010 2h-2v2a1 1 0 01-2 0v-2H9a1 1 0 010-2h2V9a1 1 0 012 0v2z" />
                        </svg>
                        <svg x-show="faq.isOpen" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui text-naranjo" d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm4-8a1 1 0 01-1 1H9a1 1 0 010-2h6a1 1 0 011 1z" />
                        </svg>
                    </button>
                    <div class="text-negro mt-2" x-text="faq.answer" x-show="faq.isOpen" ></div>
                </div>
            </template>
        </div>

        <div class="w-5/6 mx-auto mt-12 lg:hidden">
            <a href="<?php bloginfo('url'); ?>/el-cambio" class="btn mb-4">El cambio</a>
            <a href="<?php bloginfo('url'); ?>/herencia-colectiva" class="btn">Herencia Colectiva</a>
        </div>
    </div>
</section>
<?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <?php echo $__env->make('partials.suscribirse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>  

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/templates/single-preguntas_frecuentes.blade.php ENDPATH**/ ?>