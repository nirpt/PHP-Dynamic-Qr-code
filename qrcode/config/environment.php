<?php
/*
|--------------------------------------------------------------------------
| DOCKER INSTALLATION
|--------------------------------------------------------------------------
 */
$docker_cid = getenv('DOCKER_CID');

if(is_string($docker_cid)) {
    define('DATABASE_HOST', Getenv('DATABASE_HOST'));
    define('DATABASE_PORT', filter_var(Getenv('DATABASE_PORT'), FILTER_VALIDATE_INT));
    define('DATABASE_NAME', Getenv('DATABASE_NAME'));
    define('DATABASE_USER', Getenv('DATABASE_USER'));
    define('DATABASE_PASSWORD', Getenv('DATABASE_PASSWORD'));
    define('DATABASE_PREFIX', Getenv('DATABASE_PREFIX'));
    define('DATABASE_CHARSET', Getenv('DATABASE_CHARSET'));
} else {
    define('DATABASE_HOST', "localhost");
    define('DATABASE_PORT', "3306");
    define('DATABASE_NAME', "qrcode");
    define('DATABASE_USER', "root");
    define('DATABASE_PASSWORD', "root");
    define('DATABASE_PREFIX', "");
    define('DATABASE_CHARSET', "utf8");
}
/*
|--------------------------------------------------------------------------
| INSTALLATION WITHOUT CONTAINER
|--------------------------------------------------------------------------
 */

?>