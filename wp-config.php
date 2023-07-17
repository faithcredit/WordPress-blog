<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Metaverse' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'T`X-cC56StoBA>{M9H9-B+PtAa{g}}UM7x{fs.-3d!HP:2KmXU1uzI:e!n<F$@nU' );
define( 'SECURE_AUTH_KEY',  ',A=N^e]EqS:A|dtx>,?+OucATQ$CWiMN|`_uI$%+2!(Kq`|RGB{ IASmsg tJj0L' );
define( 'LOGGED_IN_KEY',    '~cKmUFmB5LVV&,4=8J[I0Sw-ne+:XA!5(~[s9R`]$0Ef#Aw{mbn{)e?]c>_&Wkok' );
define( 'NONCE_KEY',        '*v*,;};]jdwq?!}mQ{CA!-$>d9ojh,N5~`Kxtd1M`ik8sG;Ip2t14JX{5RB#k+!1' );
define( 'AUTH_SALT',        'N|vrc9;nx[}Bp]!Dny@EJQ-`c$]JbcJH(T+fX~}wHK(9w-hkRrb4^jQXrPb)f)B[' );
define( 'SECURE_AUTH_SALT', 'H5q`HAF8b?ty,b($)?`a[}de]eSxf!v%&1YY_YfeswineIy^=f&6.%k jR*oZ)aU' );
define( 'LOGGED_IN_SALT',   'rSwCw8fDIPS1>wY23}%xlYC8wv<1m9e9gE}`:uGpX`|b1bqxLlCk%CH>G0P1%QDC' );
define( 'NONCE_SALT',       'H^#*uLkC@{}I:;X+i0mlvkq]5a|3%ZDJs;w#DWfvXT*TG|(wN@s|p7Hcf$k^*>Js' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
