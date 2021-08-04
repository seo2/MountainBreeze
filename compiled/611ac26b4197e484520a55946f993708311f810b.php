<div class="pt-16 -mt-16 -mb-10 z-2 relative lg:bg-cover bg-top bg-no-repeat z-10" style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_beige.png');">
    <div class="container mx-auto lg:px-12">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-1 col-span-12 text-center lg:mb-8">
                <h2 class="font-festivo6 text-4xl lg:text-6xl text-beige leading-none"  style="background: url('<?php bloginfo('template_url') ?>/dist/img/trazo.svg') center center no-repeat; background-size: contain;">
                    Talleres:
                </h2>
                
            </div>
        </div>
    </div>
</div>


<div class="pt-16" style="background: url('<?php bloginfo('template_url') ?>/dist/img/bg_beige2.png') top center no-repeat; background-size: cover;">
    <div class="container mx-auto lg:px-12">
        <div class="grid grid-cols-12 lg:gap-4">

            <?php
                $params = array(    
                    'posts_per_page' => 2, 
                    'post_type' => 'product',
                    'tax_query' => array(
                        array (
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => 'destacados',
                        )
                    ),
                ); // (1)
                $wc_query = new WP_Query($params); // (2)
                $i=0;
            ?>
            <?php if ($wc_query->have_posts()) : // (3) ?>
            <?php while ($wc_query->have_posts()) : // (4)
                $i++;
                $wc_query->the_post(); // (4.1) 
                global $woocommerce, $post;
                $product    = new WC_Product( get_the_ID() );
                $image      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'talleres-home' );
            ?>            
            <?php if($i==1){
                echo '<div class="col-start-2 col-span-10 lg:col-start-2 lg:col-span-5 mb-12">';
            }else{
                echo '<div class="col-span-5 mb-8 hidden lg:block">';
            }
            ?>  
                <div class="relative">
                    <a href="<?php the_permalink();?>"><img src="<?php  echo $image[0]; ?>" alt="<?php the_title();?>"></a>
                    <p class="product woocommerce add_to_cart_inline absolute bottom-0 right-0 " style="">
                        <a href="/?add-to-cart=<?php echo $product->get_id(); ?>" data-quantity="1" class="product_type_course add_to_cart_button ajax_add_to_cart  inline-block mr-4 mb-4 w-10 h-10 leading-10 text-center text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full " data-product_id="274" data-product_sku="" aria-label="Lee más sobre “Huerto Creativo”" rel="nofollow"><i class="fak fa-add-bag"></i></a>
                    </p>
                </div>
                <div class="relative mt-3">
                    <p class="text-naranjo text-lg lg:text-xl"><?php echo $product->get_price_html();?></p>
                    <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                    <p class="text-negro mb-4"><?php echo get_the_excerpt();?></p>
                    <p class="text-negro text-sm">
                        <?php
                        $terms = get_the_terms( get_the_ID(), 'product_cat' );
                        foreach ($terms as $term) {
                            if($term->slug!='destacados'){
                                echo '<a href="/categoria/'.$term->slug.'" class="mr-4 inline-block hover:underline" title="Ir a la categoría '.$term->name.'"><i class="fak fa-espiga"></i> '.$term->name.'</a>';
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); // (5) ?>
            <?php else:  ?>
            <p class="text-center mb-0" style="display:block;margin:0 auto;">
            <?php _e( 'No hay Talleres disponibles' ); // (6) ?>
            </p>
            <?php endif; ?> 
        </div>
    </div>
    <div class="container mx-auto lg:px-12">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-2 col-span-10 lg:mb-8">
                <div class="grid grid-cols-12 gap-2 lg:gap-4">
                    <?php
                    $params = array(    
                        'posts_per_page' => 4, 
                        'post_type' => 'product',
                        'tax_query' => array(
                            array (
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => 'destacados',
                            )
                        ),
                    ); // (1)
                        $wc_query = new WP_Query($params); // (2)
                        $i=0;
                    ?>
                    <?php if ($wc_query->have_posts()) : // (3) ?>
                    <?php while ($wc_query->have_posts()) : // (4)
                        $i++;
                        $wc_query->the_post(); // (4.1) 
                        global $woocommerce;
                        $product    = new WC_Product( get_the_ID() );
                        $image      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'talleres-home' );
                    ?>            
                    <?php if($i<3){
                        echo '<div class="col-span-6 lg:col-span-3 mb-8">';
                    }else{
                        echo '<div class="col-span-3 mb-8 hidden lg:block">';
                    }
                    ?>  
                        <div class="relative">
                            <a href="<?php the_permalink();?>"><img src="<?php  echo $image[0]; ?>" alt="<?php the_title();?>"></a>
                            <p class="product woocommerce add_to_cart_inline absolute bottom-0 right-0 " style="">
                                <a href="/?add-to-cart=<?php echo $product->get_id(); ?>" data-quantity="1" class="product_type_course add_to_cart_button ajax_add_to_cart  inline-block mr-4 mb-4 w-10 h-10 leading-10 text-center text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full " data-product_id="274" data-product_sku="" aria-label="Lee más sobre “Huerto Creativo”" rel="nofollow"><i class="fak fa-add-bag"></i></a>
                            </p>
                        </div>
                        <div class="relative mt-3">
                            <p class="text-naranjo text-lg lg:text-xl"><?php echo $product->get_price_html();?></p>
                            <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3"><a href="<?php the_permalink();?>" class="hover:underline"><?php the_title();?></a></h4>
                            <p class="text-negro text-sm">
                            <?php
                            $terms = get_the_terms( get_the_ID(), 'product_cat' );
                            foreach ($terms as $term) {
                                if($term->slug!='destacados'){
                                    echo '<a href="/categoria/'.$term->slug.'" class="mr-4 inline-block hover:underline" title="Ir a la categoría '.$term->name.'"><i class="fak fa-espiga"></i> '.$term->name.'</a>';
                                }
                            }
                            ?>
                            </p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); // (5) ?>
                    <?php else:  ?>
                    <p class="text-center mb-0" style="display:block;margin:0 auto;">
                    <?php _e( 'No hay Talleres disponibles' ); // (6) ?>
                    </p>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto lg:px-12">
        <div class="grid grid-cols-12 gap-4 h-48">
            <div class="col-start-2 col-span-10 lg:col-start-5 lg:col-span-4 mb-8">
                <a href="/talleres" class="btn">
                    VER MÁS TALLERES
                </a>
            </div>
        </div>
    </div>

</div><?php /**PATH /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/templates/partials/talleres.blade.php ENDPATH**/ ?>