<?php
require_once __DIR__ . '/../vendor/autoload.php';
//require_once __DIR__ . '/../app/setup.php';

use Phizzle\MainController;

// get action GET parameter (if it exists)
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);


$mainController = new MainController();

if ('about' == $action){
   $mainController->aboutAction(); //$twig
} else if ('insight' == $action) {
    $mainController->insightAction(); //$twig
} else if ('screen' == $action) {
    $mainController->screenAction(); //$twig
} else if ('news' == $action) {
    $mainController->newsAction(); //$twig
} else if ('shop' == $action) {
    $mainController->shopAction(); //$twig
} else if ('sitemap' == $action) {
    $mainController->sitemapAction(); //$twig
} else {
    // default is home page ('index' action)
    $mainController->indexAction(); //$twig
}

