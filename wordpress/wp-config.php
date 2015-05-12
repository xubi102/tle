<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tle');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '192.168.0.100');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'j-;t3T{Rp 08#.tXg:*-fF1+lCyv-5h]Q=1|~k^~b?>`9M5)w+7*lo#$Y[%=p#2V');
define('SECURE_AUTH_KEY',  'aOop>bvT?:~%7wI58ebE}/b[TX&7HN&AI7ya*C=c<I>~ +wZ=+b_09(3?w|50^O|');
define('LOGGED_IN_KEY',    'Vd-tt}<YC037n;?;O`bpOHA!hJI#*[4x-Axv.AYUV6Tm0>Hjg?m8axXQls[K&1N,');
define('NONCE_KEY',        '_u]fhc%vI4Zf%rry+7?vk4DIb{_6X4$063.3:WS`m(co@ri?m?C}iYAr$eBKV.]t');
define('AUTH_SALT',        '+46<W23xm4%`s*7<6#|{P1$P~x=<z?]ND]|-ewk Ysd4HK)=S:^,?&<t=wi5&]:D');
define('SECURE_AUTH_SALT', 'h7n@2/BSjbsxyXl*K99(|2A!5PQj)</G+p08.<UU@?tC~UBV-h),T,t[T-o;D(/q');
define('LOGGED_IN_SALT',   '0 Z}PaSy(!-~v>E3*sDd21Tr&RxWrRT|c|s?u<m91c|W1+cTbJsO!l*|^MoG?Qpl');
define('NONCE_SALT',       '~M6 5=B|(LYf25Ke@a>vw=B4;|]hV1uNF0RvbDaVGE?i[;rZt8fr4 P6lNU:{huS');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tle_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
