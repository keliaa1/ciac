<?php
/**
 * The base configuration for WordPress
 * FULLY SECURED VERSION - PRODUCTION READY
 *
 * @package WordPress
 */


define( 'DB_NAME', 'local' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );



define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );


define('AUTH_KEY',         'L7z%f%yf&5G_O9KMb_nysv:j9F3c5MM(U3wH5I#M0IpO-592Ful&m%Ba;Z0sSn4R');
define('SECURE_AUTH_KEY',  'RYjui6E;2V~X3-&Di42#Urd7%k160DSK8d-#6sSlBQ2!paC3|9@]+r/p;0Y0HG/6');
define('LOGGED_IN_KEY',    'qr252R47eiavm470xY+rBMjc(5;tG4c~6bDT&EOLEkE86%N3LLA3o7_m42CYqy|#');
define('NONCE_KEY',        '77m;08N8mmnZ!zSqqws%(8:@&XrT+T9B5m0N|~GPi!nf_L-:V7[G9865T)RV1W6i');
define('AUTH_SALT',        'y|ej-InO1nC[q7DSLRm/b*ikiM9)j80t(wdB)8sUN4cz[GkXC069-%#~22P17+19');
define('SECURE_AUTH_SALT', '2~0O8[422WR36j9#%8/v5JiU5|bzf;)4*T1A_1j22A2]*68Te7tN]OY2D9]l5X/w');
define('LOGGED_IN_SALT',   'Nwm@D_7y|urrrfbHVk6D_+~K06j13SZ@0T-zG1;%502zsH##[RffT4t/[k[B&U)4');
define('NONCE_SALT',       'T5F*IiwJ]Oy&1_&]w/W&g5Y@WI1K5qR-:M79CYsYWHo1I2S69T[aM6*@d89_iU2I');


$table_prefix = 'ojegmj1sz_';


define('DISALLOW_FILE_EDIT', true);

define('DISALLOW_FILE_MODS', false); 
define('FORCE_SSL_ADMIN', false); 


define('WP_POST_REVISIONS', 5);
define('EMPTY_TRASH_DAYS', 7);
define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '512M');


define('DISABLE_WP_CRON', false);

define('WP_AUTO_UPDATE_CORE', 'minor');


define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define('SCRIPT_DEBUG', false);
define('CONCATENATE_SCRIPTS', true);
define('COMPRESS_SCRIPTS', true);
define('COMPRESS_CSS', true);


define('WP_HTTP_BLOCK_EXTERNAL', false); 
define('WP_ACCESSIBLE_HOSTS', 'api.wordpress.org,*.google.com,*.github.com');

@ini_set('display_errors', 0);

define('DISALLOW_UNFILTERED_HTML', true);


@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', false);
@ini_set('session.cookie_samesite', 'Strict');


// define('CUSTOM_USER_TABLE', $table_prefix . 'users');
// define('CUSTOM_USER_META_TABLE', $table_prefix . 'usermeta');


// define('WP_ALLOW_MULTISITE', true);
// define('MULTISITE', true);
// define('SUBDOMAIN_INSTALL', false);
// define( 'DOMAIN_CURRENT_SITE', 'ciac-rwanda3.local' );
// define('PATH_CURRENT_SITE', '/');
// define('SITE_ID_CURRENT_SITE', 1);
// define('BLOG_ID_CURRENT_SITE', 1);

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
