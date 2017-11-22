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
define('DB_NAME', 'petshop');

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
define('AUTH_KEY',         'IReV9Sv$!TcS2GI`=!erlbuQPBPx]}AO0{v(N={-j .BerTd/.>%pJgdFABuLn;v');
define('SECURE_AUTH_KEY',  'SHfp Mum.:?F8CJ_/tYK]_iH8rKzo/5p4lQ-Ve%qQAP8KLivOfZA%*8`QiNZ,3l+');
define('LOGGED_IN_KEY',    'vLhB]m%1y11fz4+W%7@LXA~8cdQv!M,x!_gyMIiXft3|bzg{E8P&[m{]}-$)dDZ}');
define('NONCE_KEY',        'XkVA#yq?{t2@Ta%h=X7TI/cvyk*-*:S058JYE$?Z~heHWe ^{_5G4AQi(!:1@j$W');
define('AUTH_SALT',        '!1mAfN`9#u^xgJ]|Y3Ov7J{X/z/0LZFd.x[dV?i;5[]09|:yr rP}JoF_sO1-R8Q');
define('SECURE_AUTH_SALT', '@R@%*A8v#>yD}m3Az?C7L&Vl7SkzU3X F_F@_fD|lV/+i|*|fG0.h~sf#Wga|Qep');
define('LOGGED_IN_SALT',   'x;Q$I$YQ$N N@gu(Bn1:k@Wup^|9x&zOlY83<og&=ec~);5r(CBU1Y6LFlKrMR/i');
define('NONCE_SALT',       ' ;.PkqrJ}Cax2qE6w6F;NbK.a&_]9K]|61U5_:`V7;$uddj@Vu*tZ#UKzxS`;IK+');

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
