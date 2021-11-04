<?php
/*

Template name: Mis Proyectos

*/
?>



<?php $__env->startSection('content'); ?> 

<section class="w-full bg-beige mt-8 pt-36 pb-8 lg:pb-8 lg:bg-contain bg-left-top lg:bg-bottom bg-no-repeat " >
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <h1 class="text-negro font-festivo6 text-5xl uppercase">Mis Proyectos</h1>
    </div>
</section>

<section class="mt-12 mb-12">
    <div class="container w-full mx-auto min-h-3/4 lg:px-40">

        <?php
            // wordpress loop for proyectos post type where user is author
            $args = array(
                'post_type' => 'proyectos',
                'author' => get_current_user_id(),
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $proyectos = new WP_Query($args); 
            if ( $proyectos->have_posts() ) { 
                while ( $proyectos->have_posts() ) {
                            $proyectos->the_post();    
                            
        ?>

        <a href="<?php the_permalink(); ?>" class="flex flex-row border-b border-gris7 py-4 px-4 my-4 hover:bg-beige transition duration-200">
            <div class="w-1/12 flex-none">
                <img src="https://source.unsplash.com/200x200/?plants" alt="" class="w-full">
            </div>
            <div class="flex-grow flex-col flex px-8">
                <p class="flex-grow text-negro"><?php
                    the_title();
                ?></p>
                <h1 class=" text-naranjo"><?php
                    echo get_post_title_by_id(get_field('Taller'));
                ?></h1>
            </div>
            <div class="w-2/12 flex flex-none justify-end">
                <p class="self-end text-negro"><?php
                    echo get_the_date();
                ?></p>
            </div>
        </a>

       <?php
                }
            }
        ?>

    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/templates/page-mis_proyectos.blade.php ENDPATH**/ ?>