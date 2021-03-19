 
<div class="pt-16 pb-32 bg-blanco" >
    <div class="container mx-auto mb-8">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-1 col-span-12 text-center">
                <h2 class="font-festivo6 text-4xl lg:text-6xl text-naranjo">
                    Talleristas
                    
                </h2>
                <img src="<?php bloginfo('template_url') ?>/dist/img/x_x_x_x.svg" alt="x_x" class="mx-auto my-3 lg:my-1 w-1/3 lg:w-auto">
            </div>
        </div>
    </div>
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-2 col-span-10 lg:mb-8">
                <div class="owl-carousel w-full" id="talleristas">
                    <?php
                        $args = array(
                            'post_type' => 'tallerista'
                        );
                        $talleristas = new WP_Query( $args );

                        if ( $talleristas->have_posts() ) {
                            while ( $talleristas->have_posts() ) {
                                $talleristas->the_post();                  
                    ?> 
                    <div class="w-full mb-8">
                        <div class="relative">
                            <?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'alignleft' ) ); ?> 
                        </div>
                        <div class="relative mt-3">
                            <h4 class="text-negro text-xl lg:text-2xl font-bold lg:font-festivo6 leading-none mt-3 mb-1"><?php the_title(); ?></h4>
                            <a href="https://instagram.com/<?php echo get_field('instagram'); ?>" target="_blank" class="text-naranjo text-sm uppercase"><span>@</span><?php echo get_field('instagram'); ?></a>
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
    </div>
    

</div><?php /**PATH /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/templates/partials/maestres.blade.php ENDPATH**/ ?>