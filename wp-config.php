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

// One wp-config.php file for multiple environments setup from http://www.messaliberty.com/2010/01/how-to-create-a-single-wp-config-file-for-local-and-remote-wordpress-development/
if ($_SERVER['REMOTE_ADDR']=='127.0.0.1' || $_SERVER['REMOTE_ADDR']=='localhost' || preg_match('/^192\.168\.5\./', $_SERVER['REMOTE_ADDR'])) {
	define('WP_ENV', 'local');
} elseif (preg_match('/staging_tld/', $_SERVER['HTTP_HOST'])) { // staging_server_domain
	define('WP_ENV', 'staging');
} else {
	define('WP_ENV', 'production');
}

if ( WP_ENV == 'local' ) {
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'replace_with_local_db'); // local_db_name

	/** MySQL database username */
	define('DB_USER', 'root'); // local_db_user

	/** MySQL database password */
	define('DB_PASSWORD', 'root'); // local_db_password

	/** MySQL hostname */
	define('DB_HOST', 'localhost'); // local_db_host

	define('WP_SITEURL', ".dev"); // local_site_url

	define('WP_HOME', ".dev"); // local_home_url

} elseif ( WP_ENV == 'staging') {
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'staging'); // staging_db_name

	/** MySQL database username */
	define('DB_USER', ''); // staging_db_user

	/** MySQL database password */
	define('DB_PASSWORD', ''); // staging_db_password

	/** MySQL hostname */
	define('DB_HOST', ''); // staging_db_host

	define('WP_SITEURL', ".com"); // staging_site_url

	define('WP_HOME', ".com"); // staging_home_url

} else {
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', ''); // production_db_name

	/** MySQL database username */
	define('DB_USER', ''); // production_db_user

	/** MySQL database password */
	define('DB_PASSWORD', ''); // production_db_password

	/** MySQL hostname */
	define('DB_HOST', ''); // production_db_host

	define('WP_SITEURL', ".com"); // production_site_url

	define('WP_HOME', ".com"); // production_home_url

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
// Insert_Salts_Below

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
