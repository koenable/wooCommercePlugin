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
define( 'DB_NAME', 'mystore' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '.*!;-}W#x4{F/C,oHC`Ba@@XMQY1ZJ)_!V1`{.]3wTz6Sd0hJ;nO4_^AEW1VV0H0' );
define( 'SECURE_AUTH_KEY',  'ZM9~;.!*(d6|:)jY}bIfCDeYYdG`QQ#ArQ(N?tsM:h^{6SBeHxI#=(k/@B`;S$tn' );
define( 'LOGGED_IN_KEY',    'v-| .a@pOh.loQSg aww=3Yb%mlY,Dz#hRa8yy$`)gD9EoN1`&;sW}_eL]b~jO-~' );
define( 'NONCE_KEY',        'bz3-og(;`gR+5zmi:oPa@WwTY]Kn_h5R|2iWi,:T=jM;-,8fnv!xaz_v2eI:Tzk,' );
define( 'AUTH_SALT',        ';pzhe]vo;u.pT7U6u/.f>);0k3ZZm^ !Op#]%9d{Cf(xlOHPgz[t1^Ga!YFeb2+4' );
define( 'SECURE_AUTH_SALT', 'J5rWaS5qA(BwSZ%S1Hpn~)30`7LOzzWmLv>7D[3}}Q*{7,Xgwi_,V}u~s/9@J:^C' );
define( 'LOGGED_IN_SALT',   'D-LUCNnm@fA;SL=74H^]~b5b9&7_F_uvDC2Y7wb!Wxv?DIxbK`g&p:RifO8CKyra' );
define( 'NONCE_SALT',       '-$%pJlnlOJH;KA;#rk(wuw75-&chLLj,`_-V81kT,7GH >C(@{.b%F3`v>fD!lH ' );

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

/*  You can turn on Jetpack Development Mode by adding the follwing line:
	Without the following statement, Jetpack will not work on localhost
*/

define( 'JETPACK_DEV_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
