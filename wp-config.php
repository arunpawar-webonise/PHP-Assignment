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
define( 'DB_NAME', 'codeanddesign' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '0g`ZWU6Q.[26>D9Kl}||9@OgFNTr4}9#I/:/RjtrCV)g;lg/~xV)MtwH?VOm^6+ ' );
define( 'SECURE_AUTH_KEY',  '7wEM`8BsQ`1yv?6BB<#ojX7_$|VuM9?9Cy][)gmluXR2OXs^?T#xT8#;<N)rAGog' );
define( 'LOGGED_IN_KEY',    'dA9>@Cm3gyfnD{Q8qXq~WvSqd@o|v7#AI}!N^/}7i)HJ3XJO][gP[WG{FtkQ~>:$' );
define( 'NONCE_KEY',        '#IRt2.`=FX>M@KcE2*^C?m n;MBJGkJc:x-AKFCDk@X/ 3;Q(GZ5$LVFRN[)@%dq' );
define( 'AUTH_SALT',        '3^-y9bS hd12b,TPqA~)VrORc~8#x<1=!LMi31nakNe0G?I{;*ITDT1P/V75HLZX' );
define( 'SECURE_AUTH_SALT', 'fQhw$Z<MWq{pqrRTX<VgJ+_tqI@llazLE7eOl>9G^3EQXeEXE::QQbnP8w`h9mUc' );
define( 'LOGGED_IN_SALT',   ')TmBR@voaYx6FDgT:I/UNG% [Ai-tIx+r_0~P=d~Ly$M,LTTGg]Y_|2pc`+GI1;@' );
define( 'NONCE_SALT',       'dm-E0^q@?>7+!YQ+hZSQ7NDRD{g8==tTU$f|M:A*`SSD&qhgDgk](]6Zp%8@fnqx' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('FS_METHOD','direct');
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
