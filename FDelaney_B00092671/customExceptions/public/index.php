<?php
require_once __DIR__ . '/../vendor/autoload.php';

define('DB_HOST', 'localhost');
define('DB_NAME', 'tuesday');
define('DB_USER', 'matt');
define('DB_PASS', 'smith');

$app = require_once __DIR__ . '/../app/setup.php';

$app->get('/',          'Itb\MainController::indexAction');
$app->get('/list',      'Itb\MainController::listAction');
$app->get('/about',     'Itb\MainController::aboutAction');
$app->get('/show/{id}', 'Itb\MainController::showAction');

$app->get('/login',      'Itb\UserController::loginAction');
$app->post('/login',      'Itb\UserController::loginCheckAction');

$app->get('/errorBadId/{id}',     'Itb\MainController::badIDAction');
$app->get('/errorNotInteger/{id}',     'Itb\MainController::badIDNotIntegerAction');

$app->run();

