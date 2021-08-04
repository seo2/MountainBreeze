 
<div class="pt-16 pb-32 bg-blanco" >
    <div class="container mx-auto lg:px-12 lg:px-12 mb-8">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-1 col-span-12 text-center">
                <h2 class="font-festivo6 text-4xl lg:text-6xl text-naranjo">
                    Talleristas
                    
                </h2>
                <img src="<?php bloginfo('template_url') ?>/dist/img/x_x_x_x.svg" alt="x_x" class="mx-auto my-3 lg:my-1 w-1/3 lg:w-auto">
            </div>
        </div>
    </div>
    <div class="container mx-auto lg:px-12">
        <div class="grid grid-cols-12">
            <div class="col-start-2 col-span-10 lg:mb-8">
                <div class="owl-carousel w-full" id="talleristas">
                    <?php
                        $args = array(
                            'post_type' => 'tallerista'
                        );
                        $talleristas = new WP_Query( $args );
                        global $post_id;

                        if ( $talleristas->have_posts() ) {
                            while ( $talleristas->have_posts() ) {
                                $talleristas->the_post();                  
                    ?> 
                    <div class="w-full">
                        <a href="<?php the_permalink(); ?>" class="relative block cursor-pointer">
                            <?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'alignleft w-full' ) ); ?> 
                        </a>
                        <div class="relative mt-3">
                            <a href="<?php the_permalink(); ?>" class="text-negro block text-xl lg:text-2xl font-bold lg:font-festivo6 leading-none mt-3 hover:text-naranjo"><?php the_title(); ?></a>
                            <a href="https://instagram.com/<?php echo get_field('instagram'); ?>" target="_blank" class="text-naranjo text-sm uppercase hover:underline"><span>@</span><?php echo get_field('instagram'); ?></a>
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