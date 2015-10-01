<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tech_rsharma');

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
define('AUTH_KEY',         '#:3V{7<%R|$D|/f+^6oMY[^BTGR;.dGtN&-XmuCh6>kx&1T%WR#4(^I|?~_,}~d#');
define('SECURE_AUTH_KEY',  'FSbt~8S<9%~Ilq-#>pfjV.8hyj:5{g*5:-yM=BJVlWD:*$UK4(}X-B[a[,~:;R+!');
define('LOGGED_IN_KEY',    '|&0HEcRRnbd/+rhuG3=1W|O?<PnbNX#,x/+?pb^R)CN}p*Z`~>(Rzj&;F&^)%o=M');
define('NONCE_KEY',        'm6+X(0-szahnUisB^>Wg&O>M(=Bq7n/Ve#e;5ocp19<Aklak_|cho.]Mx30!b:(&');
define('AUTH_SALT',        '4+LO{^[pq;ant=g=ji(kx(wbyKqthp5|Tpre1@SHLb-?#cWK9MP+0)j1_cB|dyqz');
define('SECURE_AUTH_SALT', '>1._!K8X|1OJ}41tJtF9--tslojfFn!?Im{uQ$WxDm{#c H}a1VCp;QE*%n1@K&<');
define('LOGGED_IN_SALT',   'A0r{H=Ff+vt!1Nqw|nZ-Zy),H?J:cB?TQC#nQKQ3v[g63E+S*nAL8+>p-$>*A#Ed');
define('NONCE_SALT',       'OB[{{Cb>ip=G`V]p+/MmgEj+4_/~unMsP/vTLB)/?~+W;?$v,D@X.A%RD?&|r)gA');

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
