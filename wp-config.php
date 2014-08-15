<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nfphb');

/** MySQL database username */
define('DB_USER', 'nfphb');

/** MySQL database password */
define('DB_PASSWORD', 'nfphb');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',]]LHPqoHCkO-VNb Y]]sm-BxyY5e^rv;MEJ~PTL:[Rd%&YQ_PVolHSRu]_&+LgI');
define('SECURE_AUTH_KEY',  'c-cy LV(3a|g;/GI&Z+R/uqs+i:=J[({icd:9=nc01uZngK]C4|c85;o|[=>/I^A');
define('LOGGED_IN_KEY',    '|LF~pN8E8D2f0|,A12-x:RKVN._uhD-S6mRtZd*t&q~G^f+<bMZ]2uYOs<WRQCxP');
define('NONCE_KEY',        'c84DYfJHO=fEYR`By@b x-(au6cv+?m{UbD%sm-3c?//Fyp-A{E<|I7c@)#ft/lk');
define('AUTH_SALT',        'YrXQO;PrQ6TEHS@zs?`ckzef~%?]{Uw#j@:~ulQ t-z8 1MB0.v-EY3XtrX+ZQjY');
define('SECURE_AUTH_SALT', '|[K$_PO0QK)VBI]x0[.!0)/1+ 7@DQF/^U-ZdnF-J]>3n=2>/lO4cllv@8^LeYqm');
define('LOGGED_IN_SALT',   '5HBo<;44Hcf<Q%lHOYf!ic=d2K9n 9$eOK^R9zfw~(po0WjXT^Kr{dw.EGiGol(?');
define('NONCE_SALT',       'k/7+;(}jj!8#U$B&!>4Eeqs~$G}?8lO@`RgM056-+HJp_v|P4}Xw JD)&r;XnM8_');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
