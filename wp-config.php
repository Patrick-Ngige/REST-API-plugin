<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rest-api' );

/** Database username */
define( 'DB_USER', 'rest-api' );

/** Database password */
define( 'DB_PASSWORD', 'rest-api' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'QH__djazT2t8{oUK_A{ljavd3!i~)ba:LOkp}wR .6#4/s9ucVtI @Ix8=3i&.[>' );
define( 'SECURE_AUTH_KEY',  '&.){!z3>AxXD19R|YE;v45#J`H=9d!qlC9V~<tadC@3$tXi=jNwHS-tHT#jdd_Gd' );
define( 'LOGGED_IN_KEY',    ')0~<n<H}Yk`qR1t:m|r?8N(&W8n?0}!J&.E6a7mJ;.4tiP>UtTF8w)RF3XL?@CiA' );
define( 'NONCE_KEY',        '5Z,8oSB.*orZ7$%Sr/:^~u?@s/QM>)xf^IGqHguZ[T@2Y-XXzqCScgv2xoGatw>|' );
define( 'AUTH_SALT',        '8t=#T:dGm2 D7B]9q:FzNo)c3rE<Hntwq9jjkb GPQXMMzxNqo_Zib0ODo6P[PUZ' );
define( 'SECURE_AUTH_SALT', '9hSH0Zc%lo^KMhGZDrINBax*sb9SGtkO}:Nm,8BavEh`H3a6l*3By#oX_{lmC>tn' );
define( 'LOGGED_IN_SALT',   '5Z|chyIYuWba#I$O_D~@Y~so?oK3sF0i]fBG0q!1^!P)?xq(#qb<OFTMSP(7U&dl' );
define( 'NONCE_SALT',       'S~88}i%P9@c?sX+dm&}h{9hkFwqW|zN~&dB[Vb9z+:!/nO)Z!,pM/vWjc2oR*o #' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
