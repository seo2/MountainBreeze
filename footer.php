<div class="w-full py-4 bg-fondooscuro border-b border-gris2">
    <div class="grid grid-cols-12 md:flex container flex-row max-w-screen-xl px-4 mx-auto lg:items-center justify-left md:px-6 lg:px-8">
        <div class="p-4 col-span-3 flex flex-row lg:items-center justify-between">
            <a href="<?php bloginfo('url'); ?>" class="inline-block">
                <img class="hidden lg:block h-32 w-auto pb-4 md:mr-10" src="<?php bloginfo('template_url'); ?>/dist/img/logo_hc.svg" alt="Herencia Colectiva">
                <img class="lg:hidden h-48 w-auto pb-4" src="<?php bloginfo('template_url'); ?>/dist/img/logo_hc_footer_m.svg" alt="Herencia Colectiva">
            </a>
        </div>
        <div class="lg:p-4 col-span-8 md:col-span-5 flex flex-row lg:items-center justify-between">
            <ul class="self-center md:self-start">
                <li><a href="https://www.instagram.com/herencia_colectiva/" target="_blank" class="text-sm text-beige leading-10 hover:underline"><span class="ml-2 text-fondooscuro bg-beige rounded-full text-sm w-6 h-6 leading-6 text-center inline-block mr-2"><i class="fab fa-instagram"></i></span>@herencia_colectiva</a></li>
                <li><a href="https://vimeo.com"                             target="_blank" class="text-sm text-beige leading-10 hover:underline"><span class="ml-2 text-fondooscuro bg-beige rounded-full text-sm w-6 h-6 leading-6 text-center inline-block mr-2"><i class="fab fa-vimeo-v"></i></span>herencia.colectiva</a></li>
                <li><a href="mailto:hola@herenciacolectiva.cl"              target="_blank" class="text-sm text-beige leading-10 hover:underline"><span class="ml-2 text-fondooscuro bg-beige rounded-full text-sm w-6 h-6 leading-6 text-center inline-block mr-2"><i class="fas fa-envelope transform rotate-25"></i></span>hola@herenciacolectiva.cl</a></li>
            </ul>
        </div>
        <div class="hidden md:block lg:p-4 col-start-4 col-span-8 md:col-span-5 flex flex-row lg:items-center justify-between md:ml-8">
            <ul class="md:self-start">
            <?php $menu_location = 'menu-footer'; ?>
            <?php if ( has_nav_menu( $menu_location ) ): ?>
            <?php $menu_items = wp_get_nav_menu_items( wp_get_nav_menu_name( $menu_location ) ); ?>
            <?php foreach ( $menu_items as $menu_item ): ?>   
            <li><a href="<?php echo esc_url( $menu_item->url ) ?>" target="<?php echo esc_attr( $menu_item->target ?: '_self' ) ?>" class="<?php echo esc_attr( implode( ' ', $menu_item->classes ) ) ?> text-sm text-beige leading-10 hover:underline"><?php echo esc_html( $menu_item->title ) ?></a></li>
            <?php endforeach; ?>
            <?php endif; ?>     
            </ul>
        </div>
        
        <div class="flex-col flex-grow pb-4 md:pb-4 hidden md:flex md:justify-end md:flex-row self-end">
            <p class="text-gris3">Herencia Colectiva <?php echo date('Y'); ?>®</p>
        </div>

    </div>
    <p class="text-gris3 lg:hidden text-center mt-8">Herencia Colectiva <?php echo date('Y'); ?>®</p>
</div>


<div class="w-full py-4 bg-fondooscuro">

<div class="flex container flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-12">
    <div class="text-gris3 lg:py-4">
        <a href="#" class="text-gris3 hover:text-gris6 block lg:inline">Condiciones de Uso</a>  <span class="hidden lg:inline-block">|</span>
        <a href="#" class="text-gris3 hover:text-gris6 block lg:inline">Política de privacidad</a>  <span class="hidden lg:inline-block">|</span>  
        <a href="#" class="text-gris3 hover:text-gris6 block lg:inline">Política de cookies</a>
    </div>

</div>

</div>

<?php wp_footer(); ?>



</body>
</html>