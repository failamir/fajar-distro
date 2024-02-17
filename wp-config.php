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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kukodein-fajar' );

/** Database username */
define( 'DB_USER', 'kukodein-fajar' );

/** Database password */
define( 'DB_PASSWORD', 'c2xUM0zT99pFiqxp6dAa' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1:3306' );

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
define( 'AUTH_KEY',          '*d[K39Q2.oa%OU.sDL.TsgC@FH/;`A_[Q)#h`@uvi4mYC#$@.-=0QD<zN,K|EfO9' );
define( 'SECURE_AUTH_KEY',   ' ,c>>`A?n29_[AV_xwsQ2dGiZ]0VyY j)O/xwNf%:b?5iLt(%y#!X}931u4/wDI=' );
define( 'LOGGED_IN_KEY',     'la+xHc!6.50uX1yYAzRAYYe!dIyMB=@a)D4x*LET`Y?LmjsMv,nMexL~&As{e.!^' );
define( 'NONCE_KEY',         'lY*2FQfoQf0WT/4:-c.,{MqbjV]&,w5W,#lbic?0JiYQl0WIif1_8-Ga[lb9ihJ3' );
define( 'AUTH_SALT',         '/jsH $$Zw0JqtKz+C%jNrV2fV&nl82<-u_*aSrYHO? i9v57G2fpk~@AXL8I-)[(' );
define( 'SECURE_AUTH_SALT',  's|1osa84xZcWdWD`5`H0Oc8K%<?:_U&qU%hDVQ!}U2wckij!spVW;COH @v243xX' );
define( 'LOGGED_IN_SALT',    '/Dte_[=;@[;|/;f,JD]=+LSYK_^{Yk>DqsWdF+N# 1MRa<o%6V&:xnGKXCHF?{%X' );
define( 'NONCE_SALT',        'aEFd8f89<#$:yMn<W)OW;HU{EV)>$_l<e9eKpXD+eQ(eyk|KHgdL{{:)ld]mImU$' );
define( 'WP_CACHE_KEY_SALT', 'o?FR?]?jaYh<R 7<y<?yVGC7}C{Bo P-b v&nTyO(tm$U!ie+0-dtMk5m*CpRcx0' );


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
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );
define( 'CONCATENATE_SCRIPTS', false );
define( 'AUTOSAVE_INTERVAL', 600 );
define( 'WP_POST_REVISIONS', 5 );
define( 'EMPTY_TRASH_DAYS', 21 );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
