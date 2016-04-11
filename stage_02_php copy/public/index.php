<?php
require_once __DIR__ . '/../src/mainController.php';

// get action GET parameter (if it exists)
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

if ('about' == $action){
   aboutAction();
} else if ('insight' == $action) {
    insightAction();
} else if ('screen' == $action) {
    screenAction();
} else if ('news' == $action) {
    newsAction();
} else if ('shop' == $action) {
    shopAction();
} else if ('sitemap' == $action) {
    sitemapAction();
} else {
    // default is home page ('index' action)
    indexAction();
}
