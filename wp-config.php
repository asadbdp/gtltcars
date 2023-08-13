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
// This disables debugging.
define( 'WP_DEBUG', false );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gari');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '{&-5ACXFvYc*nF 4TAg-`K*l-zFE}B8[ 0F;Y([yWZLzq_`D=opt?|s$i$enWE~v');
define('SECURE_AUTH_KEY',  'n8<B@)e$y.v2]?xD O>e{0ZiqG|4W( $ZpPju!$lBfU|,c,4B~mNFG%HyG1uI8B}');
define('LOGGED_IN_KEY',    'eKpp3wN~!1Zt,.?.zngL @V?Yg!MmC7g/!x7tpf?e%ExnrRW[x3INraNlMWf0yzP');
define('NONCE_KEY',        'Q,My=Pa)8&Z[2DIjB,.Fs|B`A|[=htbY{&ly}&n}W~GR?&`Y+va6+;X9@P$3T3_s');
define('AUTH_SALT',        '>GZ[F,wAQWnA]W}UVsL4L[)eUDgjKu+_)1-j~o6J=>K6#p_3b~/)1w4=yyzw~9Bf');
define('SECURE_AUTH_SALT', ']5PTL#{HOdSLR3NoxPICH>&|E;Cp}NlX/o.5V;;alY Wkd%KKKsm{vlT2k@!yZ|v');
define('LOGGED_IN_SALT',   'aMDihwC|v5Z8BjjI.!.G08JP>Uzg/|F;DMD@fQq(Qnfm@z#Bm^B&OCZrx>7|<yS?');
define('NONCE_SALT',       'Hx~rVuHm%3Ki1@)Qp x?|aD $<>AB-zf(~wPFi[s#u}RMIUQZrVllKGM/?gP#n{H');
define('ULTIMATE_NO_EDIT_PAGE_NOTICE', true);
define('ULTIMATE_NO_PLUGIN_PAGE_NOTICE', true);

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
