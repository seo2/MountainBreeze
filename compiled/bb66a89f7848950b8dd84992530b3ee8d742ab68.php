<?php $__env->startSection('content'); ?> 
<?php $__env->startComponent('partials.the_loop'); ?>
<section class="w-full pt-44 pb-56 lg:pb-64 lg:pt-48 relative lg:bg-100 bg-no-repeat bg-bottom -mt-12 lg:mt-auto bg-beige" style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_beige_top_a_blanco.png');">
    <div class="container max-w-screen-lg mx-auto lg:flex lg:space-x-8 lg:content-end">
        <?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'w-1/2' ) ); ?> 
        <div class="p-4 lg:p-0 lg:flex lg:flex-wrap lg:content-end">
            <div class="mb-8">
                <p class="text-naranjo uppercase">Cultivo</p>
                <h1 class="text-negro uppercase my-4 text-4xl"><?php the_title(); ?></h1>
                <p><?php echo get_field('epigrafe'); ?></p>
            </div>
            
        </div>
    </div>
</section>

<section class="w-full p-4 lg:p-0 relative lg:bg-contain bg-no-repeat bg-top -mt-32 lg:-mt-24  bg-white" id="tallerista" >
    <div class="container max-w-screen-sm mx-auto">
        <?php the_content(); ?>
    </div>
</section>


<section class="w-full pt-24 lg:pt-32 pb-12 relative lg:bg-100 bg-no-repeat bg-top bg-rosado bg-contain" style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_rosado_bot_blanco_top.png');">
  
    <div class="container mx-auto">
        <h2 class="font-festivo6 text-4xl text-negro leading-none mb-12 text-center">
            <span class="font-festivo8 block">Talleres de</span><?php the_title(); ?>
        </h2>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-2 col-span-10 lg:mb-8">
                <div class="grid grid-cols-12 gap-2 lg:gap-4">
                    <?php
                    $featured_posts = get_field('talleres');
                    if( $featured_posts ): ?>
                        <?php foreach( $featured_posts as $featured_post ): 
                            $permalink = get_permalink( $featured_post->ID );
                            $title = get_the_title( $featured_post->ID );
                            $url = get_the_post_thumbnail_url( $featured_post->ID );
                            global $woocommerce;
                            $product    = new WC_Product( $featured_post->ID );
                            //$custom_field = get_field( 'field_name', $featured_post->ID );
                            ?> 
                    <div class="flex space-x-4 lg:space-x-0 lg:block col-span-12 lg:col-span-3 mb-8">
                        <div class="relative w-1/4 lg:w-auto ">
                            <img src="<?php echo $url; ?>" alt="<?php echo esc_html( $title ); ?>">
                            <p class="product woocommerce add_to_cart_inline absolute bottom-0 right-0 " style="">
                                <a href="/?add-to-cart=<?php echo $product->get_id(); ?>" data-quantity="1" class="product_type_course add_to_cart_button ajax_add_to_cart  inline-block mr-4 mb-4 w-10 h-10 leading-10 text-center text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full " data-product_id="274" data-product_sku="" aria-label="Lee más sobre “Huerto Creativo”" rel="nofollow"><i class="fak fa-add-bag"></i></a>
                            </p>
                        </div>
                        <div class="relative lg:mt-3">
                            <p class="hidden lg:block text-beige text-lg lg:text-xl"><?php echo $product->get_price_html();?></p>
                            <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3"><a href="<?php echo esc_url( $permalink ); ?>" class="hover:underline"><?php echo esc_html( $title ); ?></a></h4>
                            <p class="text-negro text-sm">
                            <?php
                            $terms = get_the_terms( $featured_post->ID , 'product_cat' );
                            foreach ($terms as $term) {
                                echo '<span class="mr-4 inline-block"><i class="fak fa-espiga"></i> '.$term->name.'</span>';
                            }
                            ?>
                            </p>
                        </div>
                    </div>
                        <?php endforeach; ?>
                    <?php endif; ?>   
                </div>
            </div>
        </div>
    </div> 
</section>
<?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>  

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/templates/single-tallerista.blade.php ENDPATH**/ ?>