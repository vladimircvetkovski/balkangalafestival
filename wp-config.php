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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp' );

/** MySQL database username */
define( 'DB_USER', 'vladimir' );

/** MySQL database password */
define( 'DB_PASSWORD', 'qwe123!' );

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
define( 'AUTH_KEY',         'MuLl%tYc;^X7&:TdZgQIw5f&%_AC)Ur]0k|d-mj(u),1w|Pkq6]$WE={BfmLa_a1' );
define( 'SECURE_AUTH_KEY',  '.BX9CcUKe$RQC`3D(G<i8vUY~{J!$C^+ &dF;G%6w13mvy1KRud6zVD),};QOEny' );
define( 'LOGGED_IN_KEY',    'lY2WvZCebR )!FngVqHn!$?%ge I[i0DiunO$:tXV.Z:wPto1o+r*[SDi86.EIBa' );
define( 'NONCE_KEY',        '@wd2RG;G5,0H7^YA_Em~m~jEH}+[g@ s4qnf,YO%~J}m^MpM[fhVOl0MUI<cqAbl' );
define( 'AUTH_SALT',        'p4q[j>8(JhK!m_Hff?;+B$bHH@}T*1$KJ{(HsKO<ZMWu3H[N8=k^u4xh80Y.2YSj' );
define( 'SECURE_AUTH_SALT', 'K,<CR:<R]El#9wV9[Y[cC>DEVVYAejr <C<=j7h)U>/Im#%Cfp;_d~pony%Z-Cfe' );
define( 'LOGGED_IN_SALT',   '?^+H3]aq5bYXn2~F6<Iuf;_+<-wC%.8W97{h3][f>zrz K2fbYkjGYCQ:Q&%Z{,a' );
define( 'NONCE_SALT',       '$J0v&DF R:mf,=l|JFb=ut%%-b1xy-UG(lcWPkDHz26tz9@+),{:RAJ-7WX0d0kF' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
