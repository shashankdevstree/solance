<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
// define('WP_HOME', 'http://3.109.67.33');
// define('WP_SITEURL', 'http://3.109.67.33');

define( 'DB_NAME', 'solance' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '8eglw%g4MK' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'U}OK~Op/Wb5W-O!`kQa5yOm+b_d[r-{aDe%aNbN|$EF;k%T(}IJ7}^G]acehI*{E' );
define( 'SECURE_AUTH_KEY',  'G5}>sn&zX?DoX>6vc(l4@m]n!eqPs8,NpmvEmvt@^@)+YpFEfi]$o5Zx{Hav3h$z' );
define( 'LOGGED_IN_KEY',    'viu37w.L%Jj~d0ORT`#KxPhwibv0^OX--DZ6 MdQglQq}9EJe;s*pX@6&Gma[=Y>' );
define( 'NONCE_KEY',        'pGP4qDio{Fu?hQwH:VRfz8{/b$ZV&VeKj(mIr6(,nAtr9KY)5_eb14A|{I/Uo051' );
define( 'AUTH_SALT',        'FF A4u[=b9VwFf6m{(FqCm5krz(,s2bIF&3hzvd@I*jXf2Ov/8-;$0x `GOES1il' );
define( 'SECURE_AUTH_SALT', '.{n(zxod 52P+#$o|3rs]:y{[NXy~Gd61JP*O_3coDEV-~|Fzx.#^b@b*`#;/esQ' );
define( 'LOGGED_IN_SALT',   '%B$S,,*QC8kbOb^~37bIaYFTe^:?X`6(O!zP$ Ufa9{6=BTI=x[~U8Y HH&r5[W]' );
define( 'NONCE_SALT',       '-{{8GyBHz=f(w}Xj buAUVr($WWu>@$3*z*S5*9CN76?^i(9HRH(v):SmdDAjR.P' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'FS_METHOD', 'direct' );

define('WP_CACHE', true);
define('DISALLOW_FILE_EDIT', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
