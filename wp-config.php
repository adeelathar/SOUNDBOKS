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
define('DB_NAME', 'wp_echo_soundboks');

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
define('AUTH_KEY',         '+>oU?+)Rikn{r%JSuO{ jMn;[|u=gFgO][palC+Qn<]c]Q YA+?nA82B=V>fllh4');
define('SECURE_AUTH_KEY',  'S)EY#bW22{~/4M3<TEX9Q+zkTw=s[/ IM8<t*sRibl*x$T1}d?!KgGg 9%_WA!hr');
define('LOGGED_IN_KEY',    'NVqRZvg#=-8b_.pE7gu|;eVSHO3Emsif[%R~[/y9imkl-x[k,g^Tc}O]WosJ^mRb');
define('NONCE_KEY',        'EyDh*yWB!gQo7baN1C`OG6>S$Qhq?J/3 %++-FKohwV-eQF$`4_jrvn/^Zf(<j|K');
define('AUTH_SALT',        'Y@T^qpMwV60vvNH{sOo(OHvPWdy-|{/{ha:^ccKA@NE]=!6mzw/PJ[K=s/:>Wcl1');
define('SECURE_AUTH_SALT', 'CD]q=ulW(ZYs&1e:!bh)SUjL|uy7@a{0}Manrm.%07jpejf7zJlL]qS9@.A`zuT>');
define('LOGGED_IN_SALT',   'ihs1uXg%=;< gU&F9aGCgzj1&<j1-6#4U2A]EU&e  J?I;=hr}xI[j2;a]M:>fO8');
define('NONCE_SALT',       'E/6M@jp1y0jboMUaJH~7{0:ok=x9fjgqtSTY6W.L}3^CBCH[G,G!eO]EGfq50){3');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_echo_';

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
