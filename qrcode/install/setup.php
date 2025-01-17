<?php
/**
 * PHP Dynamic Qr code
 *
 * @author    Giandonato Inverso <info@giandonatoinverso.it>
 * @copyright Copyright (c) 2020-2021
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/giandonatoinverso/PHP-Dynamic-Qr-code
 * @version   1.0
 */

require_once ('../config/environment.php');
require_once('includes/database_class.php');

/*
|--------------------------------------------------------------------------
| CHECK REQUIREMENTS
|--------------------------------------------------------------------------
 */

if (!(phpversion() >= 5.6)) {
    echo "Installation failed. A php version> = 5.6 is required";
    die();
}

if (!extension_loaded('curl')) {
    echo "Installation failed. The curl extension is required";
    die();
}

/*
|--------------------------------------------------------------------------
| CHECK FOLDER PERMISSION
|--------------------------------------------------------------------------
 */

if (!is_writable('../saved_qrcode')) {
    echo "Installation failed. The folder where you save the qrcodes must have write permissions";
    die();
}

/*
|--------------------------------------------------------------------------
| DATABASE CREATION
|--------------------------------------------------------------------------
 */

$database = new Database();

if (!$database->create_database(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME, DATABASE_PORT)) {
    echo "The database could not be created, please check your database credentials!";
    die();
}
else if (!$database->create_tables(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME, DATABASE_PORT)) {
    echo "The database tables could not be created, please check your database credentials!";
    die();
}

// If no errors, redirect to index
header("Refresh: 1; finish.php");

?>