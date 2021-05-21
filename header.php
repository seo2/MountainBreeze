
<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
<head>
    <meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="<?php bloginfo('template_url') ?>/dist/img/isotipo.svg">
    <?php wp_head(); ?>
    <!--
    <?php 
 
 echo 'La plantilla que se está empleando es: ' . get_page_template(); 
  
 ?>
 -->
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php include('partials/nav.php'); ?>