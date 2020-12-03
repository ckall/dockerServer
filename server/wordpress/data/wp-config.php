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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', '180.76.53.25' );

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
define( 'AUTH_KEY',         '|W0vinU%E{7Jo?A`BLT<1bZ@23e]n@%:ua-]nWY[@[}}Asb{|2y|LrE{)I`7tW7!' );
define( 'SECURE_AUTH_KEY',  'p?w;yOW!$YSt@!g9h!wh`&9aRk;]h$=#V+3j=vq-E27#:G@>y^0`w`:^DZu2kxhO' );
define( 'LOGGED_IN_KEY',    'aK`~v>e?*5G I_@?(CcT}.yYe+5wIy9@sANvgt9UTt/>bAB)UF5biI#LjnWQ)wEb' );
define( 'NONCE_KEY',        'Eo|.${YT<#NfD#djyLG1lCksfvz7s71!obf:,eB7 wiO1FE2/,}#p6w7)obaP{8)' );
define( 'AUTH_SALT',        ')_KS{-5JxWW<p9D<c4c.I0(Yc(ftT-p;2koZpAmpV0B}o7)6DxOi7{GmYT`ejH/f' );
define( 'SECURE_AUTH_SALT', 'S*&39%t!1SeW84<NtlYG4}08j6s?0UX{!eBR,]A4[Efn0-Y:u`<K8s!,ZY)!lfKY' );
define( 'LOGGED_IN_SALT',   '>*G>*xCu8nLWEy9f@c$YP5`aeB-.cRKeK)@q=8o{4imXKHe;Y lxK|An*WxW*Xth' );
define( 'NONCE_SALT',       'y~pSlX5wa1)rJWHG)TS#(I,KHW:~Ba/|hUk+H44Zq1.XGo|oh=p@Myt,!i-?h+B+' );

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
