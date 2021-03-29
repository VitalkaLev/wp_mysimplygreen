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
define( 'DB_NAME', 'mysimplygreen' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'AYLPi4#/MF8|q/eC7k@LKAs)Y.[)#S?`,McJ+at8`S18|P!#).v3W!p/Q],T]Q,h' );
define( 'SECURE_AUTH_KEY',  'tPPU&lP+DHp)/!6ioby{Wb1)*5Sufoe6<a;2753x6m1GC`qcL<79)o2%!zzg?^lH' );
define( 'LOGGED_IN_KEY',    '3}a/Yy4*P[`.=+;xZv:s7T]5(:$Kj-.<y|5|);R%l`e|G:dlUa10|jvL5D8qu,3]' );
define( 'NONCE_KEY',        'KB5FIZ_H&2dpgCJ?r`{SEk`cUx)~:^(pbo5WbQ7+/B$x9(>,-~JLYX`w?hzS#}%A' );
define( 'AUTH_SALT',        'X)ie/;x@B6Rs+u?`XS$56D%O$}3sVjxdD&II@AN^ vy3T0ChQy:=3?%Xh7C>Kkw~' );
define( 'SECURE_AUTH_SALT', '_i;z8I^ri}oGbv@y*K$)Y.P=Hn;;!,[HT|u%#y8*C V[rK3+b1]H0@ZNHiW.O%y9' );
define( 'LOGGED_IN_SALT',   'j92Al#[]T~ENVw,7O!Q$#10qVeD6JFPXY%Z:=&d1{1gE.m#Yl*}o1m{bZZ-X@h]`' );
define( 'NONCE_SALT',       'p|!kf;,oI9YF-bY5;ps%Z3 Wz?Ma:Y1Cl| M&d8]RM58StYZ,|PuHKMtW?V/DRS:' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
