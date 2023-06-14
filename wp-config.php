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
define( 'DB_NAME', 'wadi-badi' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'c,VCK=mGB`gp_w#0x$UUYP,l):A%<--k0DGX2rd(}%/6?7epy;8hl=j</vk^<-RD' );
define( 'SECURE_AUTH_KEY',  '*m$*B[DI<&?%a-ZA.9V{2^gGH/{{m7BAr%M $J2EPVYEpBF[|LLLKm+hWzK+|RdX' );
define( 'LOGGED_IN_KEY',    'Dt5WqiF<D/{@iBp(=<vlBE?J:?T+]V:Phg!,7Bu3~lxp_)qPoSIwHs_ukWLyA6_T' );
define( 'NONCE_KEY',        'mtE).oz-9r;B[f_[.rnHuK8$Jx,?.7U4Ik?>y8|,/l{R.1oU}zo [b=9{}HXv7Va' );
define( 'AUTH_SALT',        '*F{x?w}ttZ^Q ;4N@ srZATBmvF?ZS4KYL|B@+_TQ)PV7RGQ:U7>eO3l0bqRrm:c' );
define( 'SECURE_AUTH_SALT', '(n=tm$2LmDXUgKQTaBP!c-S|Q=0Zy[H#{u8?.qJbo&Z+[P&MR>>DQ_2xS*P 5QS6' );
define( 'LOGGED_IN_SALT',   '*vY,wdvB*T!B-r.F!D+a=RYLQ(TU!})HKI1LdlP~j=lVoO!k{j|IUpP{&D|vN_f*' );
define( 'NONCE_SALT',       '0dml`i)7 w1p<?X@mtxXo@5oYl)g1K$5aMnr}A,wwe&vV>cLz`Wc1#]g;<p5egz@' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
