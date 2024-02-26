<?php
ini_set('display_errors','Off');
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
define( 'DB_NAME', "hutchi" );

/** MySQL database username */
define( 'DB_USER', "hutchi" );

/** MySQL database password */
define( 'DB_PASSWORD', "jkhTR987MNBrew432" );

/** MySQL hostname */
define( 'DB_HOST', "localhost" );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'J@6i;~j oO4ZlVJa`/tLkZg>*h@#=nWN)oRR]o^CHP61ezG/i:TY.2_% hvMO9=s' );
define( 'SECURE_AUTH_KEY',  '_uGnu:-vD_q)8 CJ(YF=shx)>z]XwL^L]/5}0Y8/8`K;BTLFe8xJ62Xw%q87N<m6' );
define( 'LOGGED_IN_KEY',    '|oMqw)PFt2dk&8nKMevv[%g;m>7)Cm=4ZPmH+atw4z]FQjr*zWS}nrdZ_@9&0{7Z' );
define( 'NONCE_KEY',        '~?L>^g %S53=7!/0d6an*U1u 0@97WMtlfK+B@^LHN9(m6]Tmh#I[gz/7%}d60<2' );
define( 'AUTH_SALT',        '@BE{i=j*NgAf59@E<d.A[r.r%4OSocQi8/dIb7$pHTVmhF;BS942*.+^N$mxscuy' );
define( 'SECURE_AUTH_SALT', '>l.Liu{5cMXr{CB9<*aG;8Q>!m(S@=<Y(jTXv;QseT9j-<ZEn+M5K:Fgy4fOP6[A' );
define( 'LOGGED_IN_SALT',   '%ov8:89ftoX}z>AyQ<Usj?tCan*kB2?*K$Rj~W;.gac-w=uV>DMO[2]4WavW-j!(' );
define( 'NONCE_SALT',       't^16#XRJALt1jJ^SA4G[sq!sz?5}tHi@dY:f&;GshS&Al~8!oNeni9,6Itk+RKL^' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

//define( 'WP_SITEURL', 'http://hutcheson.localhost' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
