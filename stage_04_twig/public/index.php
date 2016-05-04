<?php
//require_once __DIR__ . '/../vendor/autoload.php';
//require_once __DIR__ . '/../app/setup.php';

require_once dirname(__DIR__, 1) . '/app/setup.php';

use Phizzle\MainController;

// start session
session_start();

// get action GET parameter (if it exists)
$action = strtolower(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING));

//$mainController = new MainController();

switch ($action) {
    case 'login' :
        $mainController->loginAction($twig);
        break;
    case 'logout' :
        $mainController->logoutAction($twig);
        break;
    case 'register' :
        $mainController->registerAction($twig);
        break;
    case 'insight' :
        $mainController->insightAction($twig);
        break;
    case 'news' :
        $mainController->newsAction($twig);
        break;
    case 'screen' :
        $mainController->screenAction($twig);
        break;
    case 'shop' :
        $mainController->shopAction($twig);
        break;
    case 'sitemap' :
        $mainController->sitemapAction($twig);
        break;
    default:
        $mainController->indexAction($twig);
}

