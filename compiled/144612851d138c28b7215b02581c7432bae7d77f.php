
<div class="pt-16 -mt-12 bg-top bg-no-repeat lg:bg-contain" style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_naranjo.png');">
    <div class="mx-auto lg:px-12 bg-naranjo">
        <div class="container">
            <?php
               $args = array(
                   'p'         => 457,
                   'post_type' => 'herencia_colectiva'
               );
               $herencia_colectiva = new WP_Query( $args );
               global $post_id;
               if ( $herencia_colectiva->have_posts() ) {
                   while ( $herencia_colectiva->have_posts() ) {
                       $herencia_colectiva->the_post();                  
            ?>   
               <div class="grid grid-cols-12 gap-4 xl:gap-12 ">
                   <div class="col-start-2 col-span-11 sm:col-start-2 sm:col-span-4 lg:col-start-1 lg:col-span-5 mb-24 lg:mb-12 -mt-24 sm:-mt-16 lg:-mt-24 relative z-1">
                       <?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => '-ml-12 sm:ml-auto' ) ); ?> 
                   </div>
                   <div class="lg:bg-naranjo col-start-2 col-span-10 sm:col-start-6 sm:col-span-7 lg:col-span-6 xl:col-span-5 pt-12 -mt-32 mb-8 lg:mt-0">
                       <div class="relative mt-3 sm:mt-12 lg:mt-3">
                           <p class="text-beige text-lg lg:text-xl uppercase">Herencia Colectiva</p>
                           <h4 class="text-beige text-4xl lg:text-4xl font-bold leading-none my-3 font-festivo6 w-9/12 sm:w-full"><?php the_title(); ?></h4>
                           <div class="text-negro mb-4"><?php the_content(); ?></div>
                           <a href="/herencia_colectiva/herencia-colectiva/" class="py-2 sm:py-0 sm:h-12 px-6 sm:leading-12 uppercase text-center inline-block border border-negro border-solid text-negro hover:bg-negro hover:border-negro hover:text-beige transition duration-200">
                               Conocer más sobre Herencia Colectiva
                           </a>
                       </div>
                   </div>
               </div>
               
           </div>
           <?php
                   }
               }
               wp_reset_postdata();                        
           ?>  
        </div> 
    </div>
</div>
<div class="pt-16 sm:pt-64 -mt-48 h-48 sm:h-64 w-full" style="background: url('<?php bloginfo('template_url') ?>/dist/img/bg_naranjo_full.png') bottom center no-repeat; background-size: 100% auto;">
</div><?php /**PATH /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/templates/partials/sobrehc.blade.php ENDPATH**/ ?>