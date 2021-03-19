
<?php if(is_user_logged_in()): ?>
<div class="flex items-center bg-beige relative pt-24 lg:pt-0">
    <img src="<?php bloginfo('template_url') ?>/dist/img/header_user.jpg"    class="hidden md:block w-full" alt="Portada Herencia Colectiva">
    <img src="<?php bloginfo('template_url') ?>/dist/img/header_user_m.jpg"  class="md:hidden w-full" alt="Portada Herencia Colectiva">
    <div class="w-full h-80 bg-gradient-to-t from-black to-transparent absolute bottom-0 left-0"></div>
    <div class="absolute  bottom-0 left-0 mb-24 lg:mb-0 w-full px-4 lg:px-0 lg:bottom-auto lg:left-auto text-center flex items-center justify-center flex-col">
        <img src="<?php bloginfo('template_url') ?>/dist/img/raya_naranja_horizontal.svg" alt="rayas" class="absolute w-5/6 lg:w-1/4 mx-auto top-20 lg:top-auto">
        <h1 class="font-festivo6 uppercase mb-8 lg:mb-5 text-6xl lg:text-7xl  leading-none text-beige relative z-10">Somos<br>Herencia</h1>
        <p class="text-blanco">Hola <span class="font-bold"><?php echo e(show_loggedin_function( $atts )); ?></span>.<br>¡Bienvenido a Herencia Colectiva!</p>
        <button class="bg-blanco text-negro px-3 py-2 rounded-none w-full lg:w-1/6 mt-4 uppercase hover:bg-naranjo transition duration-200">Ir a mis cursos</button>
    </div>
</div>
<?php else: ?>
<style>
    .owl-carousel .owl-item img{

    }
</style>
<div class="owl-carousel owl-theme w-100 bg-negro" id="hero-carousel">
    <div>
        <div class="flex items-center bg-negro relative">
            <img src="<?php bloginfo('template_url') ?>/dist/img/foto_home.jpg"    class="hidden md:block w-full" alt="Portada Herencia Colectiva">
            <img src="<?php bloginfo('template_url') ?>/dist/img/foto_home_m.jpg"  class="md:hidden w-full" alt="Portada Herencia Colectiva">
            <img src="<?php bloginfo('template_url') ?>/dist/img/rayas.svg" alt="rayas" class="absolute w-1/3 lg:w-1/6 top-32 lg:top-auto">
            <div class="w-full h-80 bg-gradient-to-t from-black to-transparent absolute bottom-0 left-0"></div>
            <div class="absolute bottom-0 left-0 mb-24 lg:mb-0 w-5/6 px-4 lg:px-0 lg:bottom-auto lg:left-auto lg:w-1/3 lg:ml-48 text-beige">
                <h1 class="font-festivo6 uppercase mb-2 lg:mb-1 text-6xl lg:text-4xl leading-snug">Herencia Colectiva</h1>
                <h2 class="font-festivo8 uppercase mb-2 lg:mb-5 text-6xl lg:text-4xl leading-snug">Espacio expandido de transmisión de saberes, prácticas y creación.</h2>
                <p class="mb-8 text-lg">Aprende directamente con las personas que han sabido rescatar, guardar y cultivar saberes que son parte de nuestra Herencia Colectiva.</p>
                <a href="" class="bg-rosado text-beige px-3 py-2 rounded-none  mt-4 uppercase hover:bg-naranjo transition duration-200">Ver los talleres</a>
            </div>
        </div>
    </div>
    <div>
        <div class="flex items-center bg-negro relative">
            <img src="<?php bloginfo('template_url') ?>/dist/img/foto_home.jpg"    class="hidden md:block w-full" alt="Portada Herencia Colectiva">
            <img src="<?php bloginfo('template_url') ?>/dist/img/foto_home_m.jpg"  class="md:hidden w-full" alt="Portada Herencia Colectiva">
            <img src="<?php bloginfo('template_url') ?>/dist/img/rayas.svg" alt="rayas" class="absolute w-1/3 lg:w-1/6 top-32 lg:top-auto">
            <div class="w-full h-80 bg-gradient-to-t from-black to-transparent absolute bottom-0 left-0"></div>
            <div class="absolute bottom-0 left-0 mb-24 lg:mb-0 w-5/6 px-4 lg:px-0 lg:bottom-auto lg:left-auto lg:w-1/3 lg:ml-48 text-beige">
                <h1 class="font-festivo6 uppercase mb-2 lg:mb-5 text-6xl lg:text-5xl leading-none lg:leading-normal">Herencia Colectiva</h1>
                <p>Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.</p>
                <button class="bg-blanco text-negro px-3 py-2 rounded-none  mt-4 uppercase hover:bg-naranjo transition duration-200">Leer más</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/templates/partials/hero.blade.php ENDPATH**/ ?>