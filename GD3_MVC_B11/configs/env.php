<?php

define('BASE_URL',          'http://localhost/02_WD20306_WEB2014_SU25_BL1/GD3_MVC_B11/');

define('PATH_ROOT',         __DIR__ . '/../');

define('PATH_VIEW',         PATH_ROOT . 'views/');

define('PATH_VIEW_MAIN',    PATH_ROOT . 'views/main.php');

define('BASE_ASSETS_UPLOADS',   BASE_URL . 'assets/uploads/');

define('PATH_ASSETS_UPLOADS',   PATH_ROOT . 'assets/uploads/');

define('PATH_CONTROLLER',       PATH_ROOT . 'controllers/');

define('PATH_MODEL',            PATH_ROOT . 'models/');

define('DB_HOST',     'localhost');
define('DB_PORT',     '3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME',     'ph12345_lab03x04');
define('DB_OPTIONS', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
