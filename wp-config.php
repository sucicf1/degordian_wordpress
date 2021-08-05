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
define( 'DB_NAME', 'degordian' );

/** MySQL database username */
define( 'DB_USER', 'ivan' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ivan' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'X*{KZ3#|6;-/[qExV$8Ps)YIhwt]T.K:XVdMbkXt!aCXJcU9{!lhk3N-Hj.35wZ4' );
define( 'SECURE_AUTH_KEY',  'yWJ5C%9pEra?wodhCl3?Hh3ToNWqxU=Q~HT8].r-@];cBZuwO}!$.9+-y`7 XyCc' );
define( 'LOGGED_IN_KEY',    'Wo5Gd6b~|ADPde mdB8{ur`FRw=}8EWhF=]Ym@w_RioUx$M[kRJ{uI%~%SqwQ$}8' );
define( 'NONCE_KEY',        '?#U0vs>Xk^:`_7h.0N;y$D)[eHq5f$Dc|C{8lQ9_)K_^)XFAT%j1A0@BZW7>HTJy' );
define( 'AUTH_SALT',        'g{HUfc:{G_4#d[|DG^lYY,()YcC|$;SF BB!NDq wK=98[Bh+%k@b0V[@MSZp1tC' );
define( 'SECURE_AUTH_SALT', 'fkSiI vvKGC q[9n$rA;%BPnO,?>]wLiDX^<cMU2HZkyUTMu1Z4[;jd]g()J]@&E' );
define( 'LOGGED_IN_SALT',   '0B;+bzaS=6|]22p&6.z6ZSc>*qu~s{8_Ej7+vvLk L_T-d8(MXthuJI}v)W1M/5h' );
define( 'NONCE_SALT',       '5](h&S5FrV7=eU$0uA~7_7KMGX)+O{kjSOXFM_MdmP<^7;]WM^,@>?l1$$xQ:JZ5' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
