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
define('DB_NAME', 'oliveira_wp');

/** MySQL database username */
define('DB_USER', 'oliveira_wp');

/** MySQL database password */
define('DB_PASSWORD', 'hk290120');

/** MySQL hostname */
define('DB_HOST', 'oliveira_wp.mysql.dbaas.com.br');

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
define('AUTH_KEY',         '1pr1attkehej16uweqoi6kxd7temdhqhft9pssdn00jrozmmdiadnmoefixxc5es');
define('SECURE_AUTH_KEY',  'z5wjkvytmfg9iioqr2txwpacrkgimbzylgjjmnrubjcm4s2mf9grfruodocgxilw');
define('LOGGED_IN_KEY',    'fdrxs2c3lqwa5hr8om2rjkrxmbctwr9tptt3cce0h1qq304lp6cqyzc0d9wbyzvz');
define('NONCE_KEY',        'egpbgynglapbfavk8nxywunnjb2zqxajsdolvjxyrqbfyyhvtcprkykvewzutr8p');
define('AUTH_SALT',        '7kkjo01fjl5ghmxfofkm5kklkeifwnc3grblpprknplwqovd6bpsb9mobyufjdtz');
define('SECURE_AUTH_SALT', 'qqrlaknwnfvrtpmpyausgpanqwbtqod7gztmbjmfippcsbcgmsakjz4hwxl9djfk');
define('LOGGED_IN_SALT',   'tdrrapgzfdj8ctlcrjfnl2xvilzp5tanr7km8ajwvxwau1nxzlz3cianmlsluiox');
define('NONCE_SALT',       '3bhiqteb0h33x3dnfvd64b1jsdlg8kiawt5omjb6uydcgbgmisdm89f7mp5vc9vx');

define('WP_MEMORY_LIMIT', '128M');
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
