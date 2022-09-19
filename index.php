<?php
require_once 'vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\IndexController;
use App\Controllers\TaskAddController;

require_once 'config/config.inc.php';

session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/' === $uri) {
    new IndexController();
} else if ('/add' === $uri) {
    new TaskAddController();
} else if ('/auth' === $uri) {
    new AuthController();
} else {
    header('HTTP/1.1 404 Not Found');
    echo '<html lang="ru"><body><h1>Page Not Found</h1></body></html>';
}