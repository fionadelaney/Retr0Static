<?php
require_once __DIR__ . '/../vendor/autoload.php';
//require_once __DIR__ . '/../src/mainController.php';

use Phizzle\MainController;

// get action GET parameter (if it exists)
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);


$mainController = new MainController();

if ('about' == $action){
   $mainController->aboutAction();
} else if ('insight' == $action) {
    $mainController->insightAction();
} else if ('screen' == $action) {
    $mainController->screenAction();
} else if ('news' == $action) {
    $mainController->newsAction();
} else if ('shop' == $action) {
    $mainController->shopAction();
} else if ('sitemap' == $action) {
    $mainController->sitemapAction();
} else {
    // default is home page ('index' action)
    $mainController->indexAction();
}

