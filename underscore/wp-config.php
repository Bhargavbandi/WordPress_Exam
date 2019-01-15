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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'underscore');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         ';/O=-5ZzP0}%cjK%xVv[2vB_q_$3%P6x!1OT@p@#TuWGh`YY67,3Gcb*jM~-$Jja');
define('SECURE_AUTH_KEY',  'X|m#<7mS:Au5N}@#L8Vhwo%QK9 WDS$:2W[%m;9|2VV?;#p3@TcP[^]_bskpu ,K');
define('LOGGED_IN_KEY',    'SvGy}ZEt|Jch=cL*3c<5M$^hOrQs&6nS9+`#b]@9D/d]CPvHnSG(M7M}@:w74OX`');
define('NONCE_KEY',        'V= AO]I9uRC FkP}&`L+btB?pO-`#]Vy4pn(GN5%s:m@K`kP3 nU>y`DClLZ qB3');
define('AUTH_SALT',        'oh5%>J3szf=yx3:=3}^O#UE1W`AloWE,!!Ia]ui7y=QBJ*74]dP4!6Tl 3j6g{% ');
define('SECURE_AUTH_SALT', '|C@;d.gTk9iYks<E<,f,k$qY]SoPnolS9/|@Ww8Y(Xqpc6OLw Cd*(;8~!&!9-1@');
define('LOGGED_IN_SALT',   '*[A}}y%@XeG5XpTcc|G>%t7Zt;zM1XI?GdV5g$@Bd7%HELU2.i:<AY7keTY%kBAZ');
define('NONCE_SALT',       'mtQ5C?:z+C!PK2fpwsl#}a)WxE)UrP@E*4XROp;EUq+]5]1<-_9IK[idCJoqv%<U');

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
