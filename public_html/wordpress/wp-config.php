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
define('DB_NAME', 'cl48-a-wordp-q5b');

/** MySQL database username */
define('DB_USER', 'cl48-a-wordp-q5b');

/** MySQL database password */
define('DB_PASSWORD', 'YbmHMHB-H');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'C_htF832FoHAkmy!xilPhLYbUZ8m+FXhBz4=A4PQdIdoMd83Qo(U-k9NvWZn-Q43');
define('SECURE_AUTH_KEY',  'X+pod8oabAHo^/ZG2R5XpP+!Mtn+o#de-z5+FLxqG1c=DViWmUAQn_zJeVuO73D1');
define('LOGGED_IN_KEY',    'PrTBmcTMuIpuiQVva0YuGBlh7F44HY4Q44+WXJA-6X92Pk!03)/uAk+-^()Lsr0u');
define('NONCE_KEY',        'nO2OFtM!U7_QCDaA9Rx^Xko!_A0JJ)8C6_huVTfpHMAT)0oHLX(thb7EkxSt(T9u');
define('AUTH_SALT',        '^K+coH#)qoYKTxF_ehFrbFcAq8R+!ILg1I7c/vRAuuL#WE8^s7^_wimRiZVgbDnI');
define('SECURE_AUTH_SALT', 'ZGtdPBJv9HR+uGwNhaKon/VPd!8^3ihWgv(Pjg-nBCCoo^)F64uXlimP6QJjK8Qf');
define('LOGGED_IN_SALT',   '/!bA2H8FAD0)-bT(erD!iY0bV2pEKC0rDxQ1m(j__3OAmJKAP_D+A(gCzm(NEi+N');
define('NONCE_SALT',       'k+ckSk2Oj#f7-VFO8Vqk)6ks#=TX0/H+7=zLqw^ZJ_Y6^1HlvO)hYbL^tVGYQ3+4');

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
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
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

/**
 *  Change this to true to run multiple blogs on this installation.
 *  Then login as admin and go to Tools -> Network
 */
define('WP_ALLOW_MULTISITE', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/* Destination directory for file streaming */
define('WP_TEMP_DIR', ABSPATH . 'wp-content/');

