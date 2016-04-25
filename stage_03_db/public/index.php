<?php
require_once __DIR__ . '/../vendor/autoload.php';
//require_once __DIR__ . '/../app/setup.php';

use Phizzle\MainController;

// start session
session_start();

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','vagrant');
define('DB_NAME','retr0static');

// get action GET parameter (if it exists)
$action = strtolower(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING));

$mainController = new MainController();

switch ($action) {
    case 'login' :
        $mainController->loginAction();
        break;
    case 'logout' :
        $mainController->logoutAction();
        break;
    case 'register' :
        $mainController->registerAction();
        break;
    case 'insight' :
        $mainController->insightAction();
        break;
    case 'news' :
        $mainController->newsAction();
        break;
    case 'screen' :
        $mainController->screenAction();
        break;
    case 'shop' :
        $mainController->shopAction();
        break;
    case 'sitemap' :
        $mainController->sitemapAction();
        break;
    default:
        $mainController->indexAction(); //$twig
}

