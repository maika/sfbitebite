<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
// define('DB_NAME', 'wordpress');

/** MySQL database username */
// define('DB_USER', 'root');

/** MySQL database password */
// define('DB_PASSWORD', 'root');

/** MySQL hostname */
// define('DB_HOST', 'localhost');

if (isset($_SERVER['PLATFORM']) && $_SERVER['PLATFORM'] == 'PAGODABOX') {
    define('DB_NAME', $_SERVER['DB1_NAME']);
    define('DB_USER', $_SERVER['DB1_USER']);
    define('DB_PASSWORD', $_SERVER['DB1_PASS']);
    define ('DB_HOST', $_SERVER['DB1_HOST'] . ':' . $_SERVER['DB1_PORT']);
}
else {
    define('DB_NAME', 'wordpress-sfbb');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_HOST', 'localhost');
}

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
define('AUTH_KEY',         '2A9kc%@8Uyt~fZ~gamn+b}^(23PAZ0B<q}~?3@oG|_.hlIrS66%T}`WGjvcG4+-q');
define('SECURE_AUTH_KEY',  'Opl;;h!p/5c16D+{.[4lbmGr z[K`&UX@/A81bI5dp/hJ@k|~?AD!zH&e}HBo:g.');
define('LOGGED_IN_KEY',    'u]YiIHM]91yx#C x(Kr`BsHJAgP#_x!gp1BV*$X+-/}|%~|7xjLzL$rNQWWbwWuh');
define('NONCE_KEY',        't+x+i9gFU.yBoE=z84ly574I htGz<N-8v-YdDZX+$g8wc}b3G $Q;NLF+g!]J9{');
define('AUTH_SALT',        '&z6}ga-HD[KU-`~hx/ %Z^FP->;vz)o~d R*-47(+ NwuBl.?Hb.Xji[9_F;iq+o');
define('SECURE_AUTH_SALT', 'RhLX=pID*,:v_4_=?:rkM0e&p9 o%?w(*[b 8cvTJ+TC*CAX<?ws`G?<y+D$BwAa');
define('LOGGED_IN_SALT',   '+tx2CXlo>(WF-G^S!,9aa,J}UDS`>U&BR>+f**jOOr<I&TBLHb7l](-L-u%SUn17');
define('NONCE_SALT',       ';3%W!nChSVUg<8jT.hBdx/4qfn^?G:bG3-2!Qh%J[vERs~:Z$b*f6|DdOBLrpUnT');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
