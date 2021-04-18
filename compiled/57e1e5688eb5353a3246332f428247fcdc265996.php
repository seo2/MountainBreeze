<?php
/*

Template name: Registro

*/

$error= '';
	$success = '';
 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
 
	if(isset($_POST['task']) && $_POST['task'] == 'register' ) {
 
		
		$password1  = $wpdb->escape(trim($_POST['password1']));
		$password2  = $wpdb->escape(trim($_POST['password2']));
		$first_name = $wpdb->escape(trim($_POST['first_name']));
		$last_name  = $wpdb->escape(trim($_POST['last_name']));
		$email      = $wpdb->escape(trim($_POST['email']));
		$username   = $wpdb->escape(trim($_POST['username']));
		
		if( $email == "" || $password1 == "" || $password2 == "" || $username == "" || $first_name == "" || $last_name == "") {
			$error= 'Please don\'t leave the required fields.';
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error= 'Invalid email address.';
		} else if(email_exists($email) ) {
			$error= 'Email already exist.';
		} else if($password1 <> $password2 ){
			$error= 'Password do not match.';		
		} else {
 
			$user_id = wp_insert_user( array ('first_name' => apply_filters('pre_user_first_name', $first_name), 'last_name' => apply_filters('pre_user_last_name', $last_name), 'user_pass' => apply_filters('pre_user_user_pass', $password1), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber' ) );
			if( is_wp_error($user_id) ) {
				$error= 'Error on user creation.';
			} else {
				do_action('user_register', $user_id);
				
				$success = 'You\'re successfully register';
			}
			
		}
		
	}


?>



<?php $__env->startSection('content'); ?> 

<div class="min-h-screen flex items-center justify-center bg-gray-50 mt-10 py-8 px-4 sm:px-6 lg:px-4">
    <div class="max-w-sm w-full space-y-8">
      <div>
         <h2 class="mt-6 text-center text-4xl text-negro">
          Regístrate
        </h2>
      </div>
      <div id="message">
        <?php 
          if(! empty($err) ) :
            echo '<p class="error">'.$err.'';
          endif;
        ?>
        
        <?php 
          if(! empty($success) ) :
            echo '<p class="error">'.$success.'';
          endif;
        ?>
      </div>
      <form class="mt-6 space-y-6" action="#" method="POST">
        <input type="hidden" name="remember" value="true">
        <div class=" -space-y-px">
            <div class="relative">
                <label for="nombre" class="sr-only">Nombre</label>
                <input id="nombre" name="last_name" type="text" autocomplete="last_name" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nombre">
            </div>
            <div class="relative">
                <label for="nombre" class="sr-only">Apellido</label>
                <input id="nombre" name="first_name" type="text" autocomplete="first_name" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Apellido">
            </div>
            <div class="relative">
                <label for="nombre" class="sr-only">Nombre de Usuario</label>
                <input id="nombre" name="username" type="text" autocomplete="username" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nombre de Usuario">
            </div>
            <div class="relative">
                <label for="email-address" class="sr-only">Email</label>
                <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="E-mail">
            </div>
            <div class="relative">
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password1" type="password" autocomplete="current-password" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Contraseña">
                <span class="absolute right-3 top-0 text-verde text-sm z-20 py-4 cursor-pointer">Mostrar</span>
            </div>
            <div class="relative">
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password2" type="password" autocomplete="current-password" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Repetir contraseña">
                <span class="absolute right-3 top-0 text-verde text-sm z-20 py-4 cursor-pointer">Mostrar</span>
            </div>
        </div>
  
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
            <label for="remember_me" class="ml-2 block text-sm text-gray-500">
                Me gustaría recibir información relevante sobre Herencia Colectiva
            </label>
          </div>
        </div>
  
        <div class="alignleft"><p><?php if($sucess != "") { echo $sucess; } ?> <?php if($error!= "") { echo $error; } ?></p></div>
        <input type="hidden" name="task" value="register" />     
        <div>
          <button type="submit" name="btnregister" class="group relative w-full flex justify-center py-2 px-4 border border-negro text-negro uppercase bg-white hover:bg-naranjo hover:border-naranjo focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-naranjo">
            Enviar
          </button>
     
        </div>
  
        <div class="text-center">
            <div class="text-gris3">
                ¿Ya tienes una cuenta?
                <a href="<?php bloginfo('url') ?>/ingresa" class="font-medium text-naranjo hover:text-naranjo ml-2 underline hover:no-underline">
                    Ingresa acá
                </a>
            </div>
        </div>
      </form>
    </div>
  </div>
  



<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/templates/registro.blade.php ENDPATH**/ ?>