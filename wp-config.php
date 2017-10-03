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
define('DB_NAME', 'lordier');

/** MySQL database username */
define('DB_USER', 'lordier');

/** MySQL database password */
define('DB_PASSWORD', '@#_}{e8t$i*r');

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
define('AUTH_KEY',         'z(/fNnN(e7|{+-RDm9&4N:x4ru:)InQHUkB7fO(Hl8#Sb.]k1azM3t>i>|Q{8=^z');
define('SECURE_AUTH_KEY',  '*,8/y%L>>Wh;Vai*%/&F1{;7iN6t!1&Ox~p5EEFQT7qtX]2$[7*kcZ9DT9B(*ihs');
define('LOGGED_IN_KEY',    '>>q#D{y**mw.geM;/+&tG>Mtrd}}MzGXV`rjBg+&__~iB|RfLE6t!&HgH%zH6FB}');
define('NONCE_KEY',        'j0[]eU!tHdp$/3|ESZdbDmB9a]dKX9vwLAsWAdKAl;L}ZN(yC,Yru[I~$/4}?+(?');
define('AUTH_SALT',        'gRhjc>gmMhOHzNlFP(rkmc}a5M(SP8I7-V|{S5@9@zrfFj`uB]k}|M;s4gBD:cw@');
define('SECURE_AUTH_SALT', ')`vl+lh{=_,q~%Px0/Q@BlDi3-aLRxFdA&18J[^Jxkl#fXF#=h<wa79Gn,1^{;u6');
define('LOGGED_IN_SALT',   'ig]9b5+V^!{f0e/cg#z1$Cg..Qyp/$ZC1Y=K<h|v&^;<TCZO+<rQzKu?Xr?mS>o*');
define('NONCE_SALT',       '[hMzFO3NE*^Y3+`f*Ng$8LiC)(|KoFYi`F?v@5n:,||*nC!gu(;#sl6i%#,cl+mE');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'rs_';

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
