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
define('DB_NAME', 'wp_comet');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '4~!nA~Fv2]Y+WXYKkRi*T8(JeDO8VBVFt3ZH|5?&i]@ O &nyq^9:fL6RUh([)$k');
define('SECURE_AUTH_KEY',  'hUnG$Wq[pP`1:CvU5[#=CZci+?o,M%@g:-m; +JU1gE]S-GvrfR10HIQ6HC@XQLR');
define('LOGGED_IN_KEY',    'nQ<QeooQ-HqUB,=NFcw]R57NqZrH6Wp$R-Yo+`A]V.Yo?fMY_}yrJjQ&TQp<mGoN');
define('NONCE_KEY',        'DX>(*~N4,&3dg[+jGIY$*J1E9#P_wsJs*J8`F(}S*7k`=l)2X,BO3@&7.-`[,NBt');
define('AUTH_SALT',        'q%67/-{bhDO9m^{?IGnqY99)+s*lWOs]`K:a(`&o}/A91lbA`WBT,+/(f?jj-50!');
define('SECURE_AUTH_SALT', 'nEbdhuM=a)0]2mz?Xk6n-;pU{U5^FnM~5t2y2s,i43nNX>;K6|$Wk;tc*JZ!ZSNP');
define('LOGGED_IN_SALT',   '$W!.VWJC~-t%3Cmy>}TatDxl %-s!$aAi.IR-DYNbD*3RSM}o-YnqT5:qFZ#G3Mc');
define('NONCE_SALT',       '$g }k*(D$.<Et(7h0[o;r7a0>f@a))`4v)pK)R=~{,VA(Tz(rn8J[=aBsbx(M<ub');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
