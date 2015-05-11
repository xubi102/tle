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
define('AUTH_KEY',         '|3nB6Jm&o[O6?1L>gz3|PI%]Y]$nAeEd*or1wxRRg5ZZ/t@}d(ut/v^TJbdPO%wY');
define('SECURE_AUTH_KEY',  'tN,7C$o,q}s>sHHKruWAa<oZ/cn+n{X|N8L>-H18CPo|7eM+7$D6L[=[<!Ig{EH9');
define('LOGGED_IN_KEY',    'a e<BPy/hiN?>IPQlO8]NaryPu}~0d)KdIr>NE3zPYneY:Dj$YZ<d*f{$>>W7rq2');
define('NONCE_KEY',        ']A;bbRmDI@K^n,^W+MWv>WNG6OTzaT{l7S~?PQ}yW}rL;aSs!?hv2*sY,3AScQeQ');
define('AUTH_SALT',        '3m0kz}V3k~o1{] 7[2]_u;Z*^QD/tauhr&D_ -r0$,b1XBXcIV6s7z&>!z*2M&pg');
define('SECURE_AUTH_SALT', 'H!-cb7/LOhn.Dde<A*(,-q:{Q/F,ibYk7`M0PnyUb/fkgJU/7},=Hw03Op$<t|`q');
define('LOGGED_IN_SALT',   ')xl?ui(MpYG4cn;wn~w}[Cp?#Nb@pS< <((;8 E7 /7uzu +%:E56[aTSF?X-_?D');
define('NONCE_SALT',       '(qo+c;#k2,p1;dv9wB;sA;+UiD1JU?Q>EU10%Lj%?kxfp7WDP$c9a!8V#YcwL=M0');

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
