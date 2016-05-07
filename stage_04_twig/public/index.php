<?php

require_once dirname(__DIR__, 1) . '/app/setup.php';

use Phizzle\MainController;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

// start session
session_start();

$logger = new Logger('name');
$logger->pushHandler(new StreamHandler(__DIR__.'/../my_app.log', Logger::DEBUG));
$logger->pushHandler(new FirePHPHandler());

// For URL http://localhost:8080/?admin/developer/view/123
$urlStr =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
// urlStr = //localhost/?admin/developer/view/123
$urlQuery = parse_url( $urlStr , PHP_URL_QUERY );
// urlQuery = admin/developer/view/123
$urlPieces = explode('/', $urlQuery);
// urlPieces = [ 'admin', 'developer', 'view', '123' ]

if (count($urlPieces) > 0) {
    // remove the first element from the array
    $action = strtolower( filter_var(array_shift($urlPieces), FILTER_SANITIZE_STRING) );

    switch ($action) {
        case 'admin' :
            $logger->addInfo('Going to AdminController.');
            $adminController = new \Phizzle\AdminController($twig, $urlPieces);
            break;
        case 'login' :
            $mainController->loginAction($twig);
            break;
        case 'logout' :
            $mainController->logoutAction($twig);
            break;
        case 'register' :
            $mainController->registerAction($twig);
            break;
        case 'developer' :
            $mainController->developerAction($twig, $urlPieces);
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

}



