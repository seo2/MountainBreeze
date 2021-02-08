<?php
/*

Template name: Cómo funciona

*/
?>



<?php $__env->startSection('content'); ?> 

<section class="w-full bg-beige pt-36 pb-48 lg:pb-24 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_naranjo_top.png');">
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <span class="absolute lg:relative -top-8 -right-2 lg:top-auto lg:right-auto transform -rotate-45 text-negro text-9xl lg:text-6xl"><i class="fak fa-llama"></i></span>
        <h1 class="text-beige font-festivo6 text-5xl lg:text-6xl uppercase mb-5 w-3/4 lg:w-full">Cómo funciona</h1>
        <p class="text-beige mb-2">Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.</p>
        <p class="text-beige">At nam minimum ponderum. Est audiam animal molestiae te.</p>
    </div>
</section>

<section class="w-full lg:pt-12 pb-12 bg-beige relative">
    <div class="container lg:px-32">
        <div class="grid lg:grid-cols-12 gap-16 w-5/6 mx-auto lg:w-full">
            <div class="col-span-5 relative flex flex-col flex-wrap">
                <div class="flex-grow">
                    <h2 class="text-negro font-festivo8 text-7xl uppercase lg:mb-4">Pasos</h2>
                    <img src="<?php bloginfo('template_url') ?>/dist/img/oxoxox.svg" alt="x_x" class="hidden lg:block">
                </div>
                <div class="hidden lg:block">
                    <a href="<?php bloginfo('url'); ?>/el-cambio" class="btn mb-4">El cambio</a>
                    <a href="<?php bloginfo('url'); ?>/herencia-colectiva" class="btn">Herencia Colectiva</a>
                </div>
            </div>
            <div class="col-span-7 -mt-8 lg:mt-auto">
                <div class="mb-8 relative">
                    <div class="w-10 h-10 leading-10 text-center bg-contain bg-no-repeat absolute text-negro"  style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/circulo_1.svg');">
                        1.
                    </div>
                    <div class="pl-16 text-gris text-sm">
                        Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.
                    </div>
                </div>
                <div class="mb-8 relative">
                    <div class="w-10 h-10 leading-10 text-center bg-contain bg-no-repeat absolute text-negro"  style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/circulo_2.svg');">
                        2.
                    </div>
                    <div class="pl-16 text-gris text-sm">
                        Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.
                    </div>
                </div>
                <div class="mb-8 relative">
                    <div class="w-10 h-10 leading-10 text-center bg-contain bg-no-repeat absolute text-negro"  style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/circulo_3.svg');">
                        3.
                    </div>
                    <div class="pl-16 text-gris text-sm">
                        Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.
                    </div>
                </div>
                <div class="relative">
                    <div class="w-10 h-10 leading-10 text-center bg-contain bg-no-repeat absolute text-negro"  style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/circulo_4.svg');">
                        4.
                    </div>
                    <div class="pl-16 text-gris text-sm">
                        Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <img class="absolute z-10 -right-56 -bottom-4 lg:-bottom-64 w-1/4 hidden lg:block" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas.svg" alt="cinta adhesiva">
</section>
<section class="w-full lg:pt-24 pb-36 relative lg:bg-contain bg-no-repeat bg-top -mt-12 lg:mt-auto" style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_beige_top_a_blanco.png');">
    
    
    <div class="container lg:px-32">
        <img src="<?php bloginfo('template_url') ?>/dist/img/oxoxox.svg" alt="x_x" class="lg:hidden mx-auto mt-12">
        <div class="grid lg:grid-cols-12 gap-x-16 w-5/6 mx-auto lg:w-full mt-10" >
            <div class="lg:col-span-2 font-festivo8 text-6xl text-negro">FAQS</div>
            <div class="lg:col-span-8 text-gris mt-2">Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.</div>
        </div>
        <div class="grid lg:grid-cols-2 lg:gap-x-16 w-5/6 mx-auto lg:w-full leading-loose mt-6"  x-data="{
            faqs: [
                {
                    question: 'Et has minim alitr',
                    answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores iure quas laudantium dicta impedit, est id delectus molestiae deleniti enim nobis rem et nihil.',
                    isOpen: false,
                },
                {
                    question: 'Lorem ipsum dolor sit amet',
                    answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                    isOpen: false,
                },
                {
                    question: 'mea aeterno eleifend antiopam?',
                    answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                    isOpen: false,
                },
                {
                    question: 'Why am I so awesome?',
                    answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                    isOpen: false,
                },
                {
                    question: 'up exlaborum incidunt quis nos',
                    answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                    isOpen: false,
                },
                {
                    question: 'Eligendi cumque?',
                    answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                    isOpen: false,
                },
                {
                    question: 'Why learn on Scrimba?',
                    answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                    isOpen: false,
                },
                {
                    question: '¿Por qué Lorem Ipsum?',
                    answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                    isOpen: false,
                },
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <?php echo $__env->make('partials.suscribirse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>  

<?php $__env->startSection('inline_scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/templates/page-comofunciona.blade.php ENDPATH**/ ?>