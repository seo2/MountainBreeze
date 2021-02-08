<?php $__env->startSection('content'); ?> 

<?php
if(is_page('el-cambio')){
    
    @include('partials.elcambio')

}    
?>


    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <?php echo $__env->make('partials.suscribirse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/templates/page.blade.php ENDPATH**/ ?>