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
define( 'DB_NAME', 'callatmser_wp12' );

/** Database username */
define( 'DB_USER', 'callatmser_wp12' );

/** Database password */
define( 'DB_PASSWORD', 'y75Sp6!fP]' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'yiu8jn0ax2x07rgn4lkwqn5ybyopefilwzyom057ujhwjawzhjkox95emzjqszaa' );
define( 'SECURE_AUTH_KEY',  'kc1t8yxzlxhvsupemp65x0kxpuwzrijkxxs7zitfvy1xwtzoajifbhinin3zetu5' );
define( 'LOGGED_IN_KEY',    'wurxmr0kf0bxjql9qffmrnofvavcrsai1coboel4rrlvdvmjuiyptw7u1if6mukq' );
define( 'NONCE_KEY',        '28e5insk4whzxqzhspwwlsvaww4pgasedywdu9qhr2wwglcu62vli1drbzaqz2vg' );
define( 'AUTH_SALT',        'ic7nrwvugbqb2jpthoqazroi7fxupnykksyd12p8njnyvsvilhfytesnc6exr1yp' );
define( 'SECURE_AUTH_SALT', '8g71cc3b39zoyadtbzyzsahlbwrfzbyga2kqocukkkx9asktlq6ouuzoczmqrquv' );
define( 'LOGGED_IN_SALT',   'dumyffc50tiwodzd3bifxhxvys3dp2djmc3dhhzvllnkrz8fqwfb7rqxscnxucwm' );
define( 'NONCE_SALT',       'oueeok8zdpoviqdpozxm1h8qocd9yjiczfs3hzjovdsjrj6qoyjyil3nyjbrcyqp' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpry_';

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
