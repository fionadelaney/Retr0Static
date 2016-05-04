<?php
/**
 * Created by PhpStorm.
 * User: vagrant
 * Date: 17/04/16
 * Time: 18:36
 */
//----------------- autoload any classes we are using ------------------
define('APP_PATH', dirname(__DIR__, 1) );
require_once APP_PATH . '/vendor/autoload.php';

// Load the database settings
require_once __DIR__ . '/config_db.php';

define('TEMPLATE_PATH', APP_PATH . '/templates' );

use Phizzle\MainController;

//----------------- Twig setup ----------------------------
$loader = new Twig_Loader_Filesystem( TEMPLATE_PATH );

$twig = new Twig_Environment($loader);

$action_url_function = new Twig_SimpleFunction('action_url', function ($action) {
    $base_url = 'index.php';
    switch ($action) {
        case 'login' :
        case 'logout' :
        case 'register' :
        case 'insight' :
        case 'news' :
        case 'screen' :
        case 'shop' :
        case 'sitemap' :
            $link_url = $base_url . '?action=' . $action;
            break;
        default:
            $link_url = $base_url;
    }
    echo $link_url;
});
$twig->addFunction($action_url_function);


function staticCall($class, $function, $args = array())
{
    if (class_exists($class) && method_exists($class, $function))
        return call_user_func_array(array($class, $function), $args);
    return null;
}
$twig->addFunction('staticCall', new Twig_Function_Function('staticCall'));

//create an instance of MainController class for use in index.php
$mainController = new MainController();