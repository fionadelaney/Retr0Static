<?php
require_once __DIR__ . '/../vendor/autoload.php';
//require_once __DIR__ . '/../app/setup.php';

use Phizzle\MainController;

define('DB_HOST','localhost');
define('DB_USER','fred');
define('DB_PASS','smith');
define('DB_NAME','retr0static');

// get action GET parameter (if it exists)
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

$mainController = new MainController();

if('login' == $action) {
    $mainController->loginAction(); //$twig
} else if('register' == $action) {
    $mainController->registerAction(); //$twig
} else if('insight' == $action) {
    $mainController->insightAction(); //$twig
} else if ('screen' == $action) {
    $mainController->screenAction(); //$twig
} else if ('news' == $action) {
    $mainController->newsAction(); //$twig
} else if ('shop' == $action) {
    $mainController->shopAction(); //$twig
} else if ('sitemap' == $action) {
    $mainController->sitemapAction(); //$twig
} else if ('login' == $action) {
    $mainController->loginAction(); //$twig
} else {
    // default is home page ('index' action)
    $mainController->indexAction(); //$twig
}



