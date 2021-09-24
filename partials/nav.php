<!-- component -->
<div class="fixed z-50 w-full text-gris6 bg-fondooscuro dark-mode:text-gray-200 dark-mode:bg-gray-800 top-0" >
  <div x-data="{ open: false }" class="flex container flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 md:px-8">
    <div class="p-4 flex flex-row items-center justify-between">
      <button class="md:hidden focus:outline-none focus:shadow-outline w-20" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-12 h-6" >
          <path x-show="!open" d="M0 1L19 1M0 17L18 17M0 9L12.5 9L25 9" stroke="#FFFBEF" stroke-width="2"/>
          <path x-show="open" d="M11.416 10L20 18.584L18.584 20L10 11.416L1.41602 20L0 18.584L8.58398 10L0 1.41602L1.41602 0L10 8.58398L18.584 0L20 1.41602L11.416 10Z" fill="#FFFBEF"/>
        </svg>
      </button>
      <a href="<?php bloginfo('url'); ?>" class="h-14 w-auto md:pb-4 md:mr-5">
          <img class="hidden md:block h-full" src="<?php bloginfo('template_url'); ?>/dist/img/logo_hc.svg" alt="Herencia Colectiva">
          <img class="block md:hidden h-full" src="<?php bloginfo('template_url'); ?>/dist/img/logo_hc_circulo.svg" alt="Herencia Colectiva">
      </a>
      <nav class="w-20 text-right md:hidden">
        <a class="px-2 py-2 mt-2 text-gris6 text-xl focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200 relative" href="/cart/"><i class="fak fa-bolsita"></i><span class="text-beige bg-naranjo absolute h-4 w-4 leading-4 text-xs rounded-full text-center -top-1 -right-1"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
        <a class="px-2 py-2 mt-2 text-gris6 text-xl focus:text-gray-900 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="/mi-cuenta/"><i class="fal fa-user-circle mr-1"></i></a>
      </nav>
    </div>
    <nav :class="{'flex ': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-start md:flex-row uppercase md:text-center">
      <a class="px-3 py-2 mt-2 text-beige md:text-gris6 text-3xl md:text-sm font-festivo6 md:font-sans md:mt-0 md:mr-1 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200 md:hidden" href="<?php bloginfo('url'); ?>">Inicio</a>
      <div @click.away="open = false" class="relative" x-data="{ open: false }">
          <a @click="open = !open" class="block px-3 py-2 mt-2 text-beige md:text-gris6 text-3xl md:text-sm font-festivo6 md:font-sans md:mt-0 md:mr-1 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200">
              <span class="uppercase">Talleres</span>
              <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="hidden md:inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
              <svg viewBox="0 0 27 32" fill="none" class="inline md:hidden h-8 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                <path d="M10.2248 1L24.919 15.9954L10.2248 30.9846" stroke="#FEACA1" stroke-width="2" stroke-miterlimit="10"/>
                <path d="M0 16L25 16" stroke="#FEACA1" stroke-width="2" stroke-miterlimit="10"/>
              </svg>
          </a>
          <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-full mt-2 origin-top-left rounded-md shadow-lg md:w-48 text-left">
              <div class="px-2 py-2 bg-negro shadow dark-mode:bg-gray-800">  
                <?php $menu_location = 'menu-talleres'; ?>
                <?php if ( has_nav_menu( $menu_location ) ): ?>
                <?php $menu_items = wp_get_nav_menu_items( wp_get_nav_menu_name( $menu_location ) ); ?>
                <?php foreach ( $menu_items as $menu_item ): ?>   
                <a class="<?php echo esc_attr( implode( ' ', $menu_item->classes ) ) ?> block px-3 py-2 mt-2 text-beige md:text-gris6 text-3xl md:text-sm font-festivo6 md:font-sans md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="<?php echo esc_url( $menu_item->url ) ?>" target="<?php echo esc_attr( $menu_item->target ?: '_self' ) ?>"><?php echo esc_html( $menu_item->title ) ?></a>
                <?php endforeach; ?>
                <?php endif; ?>     
                <a class="block px-3 py-2 mt-2 text-beige md:text-gris6 text-3xl md:text-sm font-festivo6 md:font-sans md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="<?php bloginfo('url'); ?>/talleres">Todos los talleres</a>
              </div>
          </div>
      </div> 
      <!-- Current: text-gray-900 bg-gray-200 dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 -->
      <?php $menu_location = 'menu-principal'; ?>
      <?php if ( has_nav_menu( $menu_location ) ): ?>
      <?php $menu_items = wp_get_nav_menu_items( wp_get_nav_menu_name( $menu_location ) ); ?>
      <?php foreach ( $menu_items as $menu_item ): ?>   
      <a class="<?php echo esc_attr( implode( ' ', $menu_item->classes ) ) ?> px-3 py-2 mt-2 text-beige md:text-gris6 text-3xl md:text-sm font-festivo6 md:font-sans md:mt-0 md:mr-1 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="<?php echo esc_url( $menu_item->url ) ?>" target="<?php echo esc_attr( $menu_item->target ?: '_self' ) ?>"><?php echo esc_html( $menu_item->title ) ?></a>
      <?php endforeach; ?>
      <?php endif; ?>      
      <div class="w-full text-center py-6 md:hidden">
        <a href="https://www.instagram.com/herencia_colectiva/" target="_blank" class="mx-6 text-fondooscuro bg-rosado rounded-full w-8 h-8 leading-8 text-center inline-block text-xl"><i class="fab fa-instagram"></i></a></li>
        <a href="https://vimeo.com"                             target="_blank" class="mx-6 text-fondooscuro bg-rosado rounded-full w-8 h-8 leading-8 text-center inline-block text-xl"><i class="fab fa-vimeo-v"></i></a></li>
        <a href="mailto:hola@herenciacolectiva.cl"              target="_blank" class="mx-6 text-fondooscuro bg-rosado rounded-full w-8 h-8 leading-8 text-center inline-block text-xl"><i class="fas fa-envelope transform rotate-25"></i></a></li>
      </div>
    </nav>
    <nav class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row uppercase text-center">
      <?php
      if(is_user_logged_in()){
      global $current_user,  $atts ;
      get_currentuserinfo();     
      ?>
        <a href="/perfil" class="flex flex-row px-4 py-2 mt-2 text-gris6 text-sm md:mt-0 md:ml-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200">
          <span class="h-8 w-8 rounded-full border border-blanco mr-4 overflow-hidden flex flex-col justify-center bg-negro" id="fotoPerfil">
            <?php echo get_avatar( $current_user->ID, 64 , '', '', $args = array( 'scheme' => 'https', 'class' => 'object-cover' ) ); ?>
          </span>
          
          <span class="self-center"><?php echo show_loggedin_function( $atts );  ?></span>
        </a>
        <?php
         }else{  
        ?>
        <a class="px-4 py-2 mt-2 text-sm bg-rosado md:mt-0 md:ml-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="<?php bloginfo('url') ?>/mi-cuenta">Regístrate</a>
        <a class="px-2 py-2 mt-2 text-gris6 text-sm md:mt-0 md:ml-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="<?php bloginfo('url') ?>/mi-cuenta"><i class="fal fa-user-circle mr-1 md:hidden lg:inline-block"></i> Ingresar</a>
        <?php
        }  
        ?>
      <a class="px-4 py-2 mt-2 text-gris6 text-sm md:mt-0 md:ml-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200 relative flex" href="<?php bloginfo('url') ?>/cart/">
        <i class="fak fa-bolsita self-center"></i>
        <span class="text-beige bg-naranjo absolute h-4 w-4 text-xs top-1 right-1 text-center leading-4 rounded-full"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
      </a>
    </nav>

  </div>
</div>

<?php
    if(is_user_logged_in()){
?>
  <div class="fixed top-20 pt-2 md:pt-0 md:top-20 z-40 w-full text-gris6 bg-blanco shadow">
  <div class="flex container max-w-screen-xl mx-auto items-center justify-between flex-row md:px-24">
    <nav class="flex-grow md:pb-0 flex justify-between md:justify-start flex-row uppercase">
      <a class="text-center md:text-left flex flex-col justify-center px-4 md:px-8 py-2 md:py-4 md:mt-2 <?php if(is_home()){ ?> text-naranjo <?php }else{ ?> text-gris <?php } ?>                text-xs md:text-sm font-sans md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="<?php bloginfo('url'); ?>/">Mi inicio</a>
      <a class="text-center md:text-left flex flex-col justify-center px-4 md:px-8 py-2 md:py-4 md:mt-2 <?php if(is_page("mis-proyectos")){ ?> text-naranjo <?php }else{ ?> text-gris <?php } ?> text-xs md:text-sm font-sans md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="<?php bloginfo('url'); ?>/mis-proyectos  ">Mis proyectos</a>
      <a class="text-center md:text-left flex flex-col justify-center px-4 md:px-8 py-2 md:py-4 md:mt-2 <?php if(is_page("mis-talleres")){ ?> text-naranjo <?php }else{ ?> text-gris <?php } ?>  text-xs md:text-sm font-sans md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="<?php bloginfo('url'); ?>/mis-talleres">Mis talleres</a>
      <a class="text-center md:text-left flex flex-col justify-center px-4 md:px-8 py-2 md:py-4 md:mt-2 <?php if(is_page("favoritos")){ ?> text-naranjo <?php }else{ ?> text-gris <?php } ?>     text-xs md:text-sm font-sans md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="<?php bloginfo('url'); ?>/favoritos">Favoritos</a>
      <!-- <a class="px-4 md:px-8 py-4 md:mt-2 <?php if(is_page("mensajes")){ ?> text-naranjo <?php }else{ ?> text-gris <?php } ?> text-sm font-sans md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="<?php bloginfo('url'); ?>/mis-talleres">Mensajes</a> -->
    </nav>
    <nav class="flex-col flex-grow hidden md:flex md:justify-end md:flex-row">
      <a class="px-4 md:px-8 py-4 md:mt-2 text-gris text-sm font-sans md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="<?php echo wp_logout_url( home_url() ); ?>">Cerrar Sesión <i class="fal fa-power-off ml-1"></i></a>
    </nav>
  </div>
</div>
<?php
    }
?>
  