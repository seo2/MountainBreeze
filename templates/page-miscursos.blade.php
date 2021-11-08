@php
/*

Template name: Mis cursos

*/
@endphp

@extends('layouts.app')

@section('content') 
@php
    // redirect if not logged in
    if(!is_user_logged_in()){
        wp_redirect( home_url() .'/mi-cuenta' );
        exit;
    }
@endphp

<section class="w-full bg-azul mt-8 pt-36 pb-8 lg:pb-8 lg:bg-contain bg-left-top lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_azul_franja.png');">
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <h1 class="text-beige font-festivo6 text-5xl uppercase">Mis Talleres</h1>   
    </div>
</section>

<section class="mt-12">
    <div class="container mx-auto justify-between lg:px-32">
        @loop
        {{ the_content() }}
        @endloop
        @php
            $user_id = get_current_user_id();
            // get array length
            $count = count(learndash_user_get_enrolled_courses($user_id));
            
        @endphp
        @if ($count == 0)
        <div class="flex flex-wrap justify-between">
            <div class="w-full">
                <div class="mb-8">
                    <div class="flex flex-wrap justify-between">
                        <div class="w-full text-center">
                            <h2 class="text-2xl font-festivo6  text-negro">Aún no tienes talleres en Herencia Colectiva</h2>
                            <p class="text-negro"> te invitamos a que revises los que tenemos disponibles para ti.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-2 col-span-10 lg:mb-8">
                <div class="grid grid-cols-12 gap-2 lg:gap-4">
                    <?php

                    $params = array(    
                        'posts_per_page' => 4, 
                        'post_type' => 'product',
                        'orderby' => 'rand'
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
                            <h4 class="text-negro text-base md:text-lg font-bold leading-tight my-2 lg:my-3"><a href="<?php the_permalink();?>" class="hover:underline"><?php the_title();?></a></h4>
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
        <div class="flex flex-wrap justify-between">
            <div class="w-full">
                <div class="mb-24">
                    <div class="flex flex-wrap justify-between">
                        <div class="w-full text-center">
                            <a href="@php bloginfo('url'); @endphp/talleres" class="h-12 px-24 inline-block leading-12 text-center border border-naranjo bg-naranjo border-solid text-beige hover:bg-negro hover:border-negro transition duration-200 uppercase">VER TODOS LOS TALLERES</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        @endif
    </div>


</section>

@endsection

@section('footer')

@endsection  