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
define( 'DB_NAME', 'sewamobil' );

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
define( 'AUTH_KEY',         '!8qwX43k7-%nSNiW`4eGTr>QkiPA6#vN2wgBFA1$bw^A3c8MgAk)^]N{Sa %Fm;D' );
define( 'SECURE_AUTH_KEY',  '#N*gI^Zxt@b`k^sRG0b)Bc#i [U7Q1!3Y3xQP2j.C{LU$J9GWG8j|UA1tBDZI[I$' );
define( 'LOGGED_IN_KEY',    '%%2b^Mi@_.z$f/:&oF5&P1.,tyg2cA@51lRIq^)Yn;(f4|!NBJX#m:oq=1Pg4%aO' );
define( 'NONCE_KEY',        'Lvk*. @0w4S,mw/riCH,peMv#juE& hsN7gc)},5guy>E0Tvm)~l3dAHE`8D%;Va' );
define( 'AUTH_SALT',        'JTouU3pGfwxA7,U/zx;6og(Th1G5zZ&b4xr-B(N^W#{Vep?N?/)dEqJMO;useF#S' );
define( 'SECURE_AUTH_SALT', '&Vyg&G%Z8c8FyuU]7@SsHS|U/oR^^lsM=Sxeq(S_A<#6nA,8EA^2<;Hu>Be1IF{-' );
define( 'LOGGED_IN_SALT',   'Ib<d6i|B `oOTV$ch[fR%d#AZtF=O^B6hL|Ra)T.6{a4UWTJMJI hR&]~$cs.&kX' );
define( 'NONCE_SALT',       ',BS!bENN#txUW5<~v)WSu0W{QVsex(>lR-kVyx18X<Pm<Hn~m|K-I#03i2oC`g4R' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpapp_';

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
