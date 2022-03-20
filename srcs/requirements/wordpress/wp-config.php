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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'jludt' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

/** MySQL hostname */
define( 'DB_HOST', 'mariadb' );

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
define('AUTH_KEY',         'wDq|(a|As0r3,NIT1Smjf;:,tb8;Jn4 ;&ky~,K~?.}ga::`fn|1[kU)w^,=rI/-');
define('SECURE_AUTH_KEY',  '[?4W-mthO^74X9ZL:-@nwR1[{#Y#-D% E7&<34^$tAZ0qBr-TSiiOTj.>Uwg6P[%');
define('LOGGED_IN_KEY',    '|B$7:*&WHr2Z!:^(pD=:I6X;v8$F1v{_M{@T4.47#]=|pq@ZI,_:l;5U#Q[G~)?P');
define('NONCE_KEY',        'D7JpuPx||,|-ZHKXB&LB4oaWfwQv1$j$u[o2iK_<@D|@/IW+X}gjjv?;qcN^q6(x');
define('AUTH_SALT',        'toTN1@S:}%e ?!xh7m*wY=DW|un8Ve{)jH#9LS+#F*og+$rnv{(~g=7U0l~=(Nd@');
define('SECURE_AUTH_SALT', 'z{R9M#V6+R^*X3b@tF^#eB{pE_pI-KyV-_Pm<mg|M+k}K:WrM~Dv,I0r(%,:Evmo');
define('LOGGED_IN_SALT',   '@xXT(qNV,A=B?zkga|Ib9z|W9$OLTmG^`vXw&n]%@i>dP%3fM!Ovl{PX w_pd:Ib');
define('NONCE_SALT',       'b;{wY~=+c}Y#EL;ghDGu?h3Iz!2Nfv|k22NguSas82QZHeLy?}XY`vE4an+B]4%+');

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
define( 'WP_DEBUG', False);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );