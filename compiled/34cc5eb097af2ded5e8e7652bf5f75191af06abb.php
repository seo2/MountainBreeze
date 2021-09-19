<?php
    $modal = array(    
        'post_type' => 'modal'
    ); 
    $modal_query = new WP_Query($modal); 
    if ($modal_query->have_posts()) : 
        while ($modal_query->have_posts()) : 
            $modal_query->the_post(); 
?>  
<div class="w-full h-screen fixed z-50 bg-black bg-opacity-70 " id="modalHome" style="display:none;">
    <div class="w-full h-screen  flex flex-col justify-center items-center" >
        <div class="w-11/12 md:w-3/5 bg-white shadow-2xl relative">
            <?php
                if(get_field('link')){
            ?>
            <a href="<?php the_field('link'); ?>">
            <?php
                }
            ?>
            <img src="<?php the_field('imagen_desktop'); ?>"    class="hidden md:block w-full">
            <img src="<?php the_field('imagen_mobile'); ?>"     class="block md:hidden w-full">
            <?php
                if(get_field('link')){
            ?>
            </a>
            <?php
                }
            ?>
            <a href="javascript:void(0);" class="absolute -right-8 -top-8 text-white text-3xl hover:text-naranjo transition duration-200" id="cerrarModal"><i class="fal fa-times-circle"></i></a>
        </div>
    </div>
</div>
<?php   
        endwhile; 
        wp_reset_postdata();
?>
    <script>
        setTimeout(function(){
            $('#modalHome').fadeIn();
            $('body').css({'overflow':'hidden'});
        }, 1000);
        $('#cerrarModal').on('click', function(){
            $('#modalHome').fadeOut();
            $('body').css({'overflow':'auto'});
        });
        
    </script>
<?php
    endif; 
?><?php /**PATH /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/templates/partials/modal.blade.php ENDPATH**/ ?>