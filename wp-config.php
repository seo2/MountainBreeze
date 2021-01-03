<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'herenciacolectiva' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'g,6PNSugU{,|6/nf7M{YlOMm+0kwvUX*}d #t@KM8A?E~HIp?N,n8LO5uf(N~):H' );
define( 'SECURE_AUTH_KEY',  'A(L1Qg.3P>.Xj[k09ST:u>5EIx1.Q:y >tdD9YSEHqrt8n?,3~t*7JH^#GzX+><`' );
define( 'LOGGED_IN_KEY',    '#[gk{PKU:xDOT&C>P_1Ep0Ug?SqaTH:.zazy2 pjX$M5v,sNc!=OH~jOr[#,UW (' );
define( 'NONCE_KEY',        '@ZpOk}K,{vc&[_+IIbj*DeKd5x9d1n0 U5cv3m.LJSlQH_Ys`Vuq-rjC>t@<M&Vc' );
define( 'AUTH_SALT',        'fsfj#aJ&eZkvi9R3A_>5Q-y@TQz$]sjWdai$_`[iA& {S3L~(?[<_2en=+1)LiX%' );
define( 'SECURE_AUTH_SALT', '2V=9=`Hi)t%wRudXpowJSGNAw`+D;TA.S[5PB!^oIAJ,cOhSU)O1s+J{(Ys/6-{B' );
define( 'LOGGED_IN_SALT',   '#xY^M&T*tn4#Uq~+~&@W^*4rNq0@AXlg-@jpO{7M@H}D_~8$Q},Cp]uZKm5epScr' );
define( 'NONCE_SALT',       '03<#t~l(PqCR0cgELv5w$AT*7Nh0ecAm15>@*Q#NCEuh_kvbeV&y1^8o LEr6g_E' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_h3c0_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
