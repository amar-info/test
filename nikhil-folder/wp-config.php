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
define('DB_NAME', 'imagereality');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'S:4T}`p!J8>Dh~4/$|b1iIP9Jj]~W)4]hw 5<lfAgW<we*,}Lng6OC,C.Ru~bK,W');
define('SECURE_AUTH_KEY',  '-h=p^PRmMQ1OUg[>wSv*8*xJ1!1eU}G~$dX2Em8(%I&^.m[XLM)um~?3G0b/qXN[');
define('LOGGED_IN_KEY',    't?,)3)3$EwdO_~TQ?Gb:Z,SME`=7myy:3;bFxW ls^:|]~NmO?nsvBx/KTc7eUv2');
define('NONCE_KEY',        'd/1j&Q&NF!G&7ZL;srT+wd41Kq1Q-!?6,%UnWS  0;K^T(X{nIgMm|S+fEV|z+<3');
define('AUTH_SALT',        'OsHT:Oz>Nkf~R,(&~UUrD(UpfkzE{!+v]CN~Wqks&10bRo]K|GjLj:0hgqK1s)S[');
define('SECURE_AUTH_SALT', '(!|qW<-*DpiwQdC?Xbsrr`r&k(:}Rh64/_.zB~Q=Jhga.po,qr&cmJh!yLHDk1I^');
define('LOGGED_IN_SALT',   '3,6t&!Kk&[Rs#t};cB4OQ7 ?Kc^b2&k`lc/aLW4~i6@|TvdhkX,/Iy;s2i^T;0K#');
define('NONCE_SALT',       '|=ng @^1nnU 8u+*_l./U`$3=)sW2ac-!=`P,m;L6azJg[UYeM3>9EefJ56.r^*G');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
