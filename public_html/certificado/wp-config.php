<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
define( 'FORCE_SSL_ADMIN', true ); // Redirect All HTTP Page Requests to HTTPS - Security > Settings > Secure Socket Layers (SSL) > SSL for Dashboard
// END iThemes Security - Do not modify or remove this line

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
define('DB_NAME', 'dboliveira');

/** MySQL database username */
define('DB_USER', 'dboliveira');

/** MySQL database password */
define('DB_PASSWORD', 'OliveiraDB16');

/** MySQL hostname */
define('DB_HOST', 'dboliveira.mysql.dbaas.com.br');

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
define('AUTH_KEY',         'o`7JU&qv37Ye}Y<fZ)1o|qfT+}!jP^LxG^)r},p%ozs#%KHFtZ(,q|:U@G|[NV93');
define('SECURE_AUTH_KEY',  'd5z;xZF37q<)&W[8V=(BpgMLo#Uv)(ZO<E#op@XVd60#1L Ke`lSU+{pZ+./;}[@');
define('LOGGED_IN_KEY',    'i!chz%+N9}J/s(?[NnC)zM2LA+0Xe0t;lb15@a``HI}KJV#u0^5UMQBAueW0Ry(o');
define('NONCE_KEY',        'seI:i0FEGVUXx3LUdNJhKL@S0rd77WlLS8CF#[_{Ss_czBLv)0D3%t(,9>rgj;@~');
define('AUTH_SALT',        'S|e*-F--[+rI+D!{$f*IU4<9!yXDg2.rDH}gs67z!M ;f(rues,-%H4?(tXV:[e>');
define('SECURE_AUTH_SALT', 'JB4a^^!LJW,MCE[;9J4A8pvK5yc+eS>7o*p_NWEFpp8M*{Y(t8W9<3m7+xRdsq[+');
define('LOGGED_IN_SALT',   'spA;xYv{67IYN0)*q6fz7u*075H:H(H4p{hblvOsk,5zinnT~Z9*Td.iRbl5a&28');
define('NONCE_SALT',       '=NkF>Y{3+7[V[]bOY^Y/tED6{zn9/hov?o?[Jnsx5~q5jYlF6Y(-y%=D%8Nr{|yp');

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
