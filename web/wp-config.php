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
define( 'DB_NAME', 'mivo56gu_cpam1410' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'password01' );

/** Database hostname */
define( 'DB_HOST', 'db' );

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
define( 'AUTH_KEY',         'sg|vkR4rvA{>bSB_z=v2^jNG&Tp2{FrP]!>o%[<i/b^*37So(vSC*3m Gds{Lcq ' );
define( 'SECURE_AUTH_KEY',  'nJno;fr@jcoS)mp<YwDdcv=sbdNDuy>X%C@Ij[ ilHDKE=1K)#LGqX&;@g{6([o/' );
define( 'LOGGED_IN_KEY',    'YE|;$RM6a>?]1=F^%a~3^)F+7psJc!BZv9jSoWno!@z/nRlo&_vui]9DTSd!.Qj!' );
define( 'NONCE_KEY',        'VRz,66{JAK`M_.^>./iAz@WCJb0g%pv(4;:_ +nNF4!.}b!<h+g%QekL|s>X`.7?' );
define( 'AUTH_SALT',        '|az/pO|-=o )#$?1Fd+-aA$},bEFy5lG0.=v5xJO6x|n8P&gG!HG2+&6ip@~aHHM' );
define( 'SECURE_AUTH_SALT', 'z&e)KM1vySP29>ePcEn.Bu_+ok@fbU/W^e]/V/Zjz.3+82kb<F)d2Ja.K`5#eSJZ' );
define( 'LOGGED_IN_SALT',   'NW%`.PtH{}seU^t_O~hKw|.Y:%rio(d7jG.]eYB$pBTAi_Q,xz@~Ax1)XW#XHU?q' );
define( 'NONCE_SALT',       '`aMx1Cnd-XjQz3pt,,dZR.,$s^f.dlb<@7+u2M;,|BfMA}:i!@Va4(5ZEAfW1/2m' );

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
