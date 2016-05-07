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
use Phizzle\DeveloperRepository;

//----------------- Twig setup ----------------------------
$loader = new Twig_Loader_Filesystem( TEMPLATE_PATH );

$twig = new Twig_Environment($loader);

$action_url_function = new Twig_SimpleFunction('action_url', function ($action) {
    $base_url = '/';
    switch ($action) {
        case 'login' :
        case 'logout' :
        case 'register' :
        case 'insight' :
        case 'news' :
        case 'screen' :
        case 'shop' :
        case 'sitemap' :
            $link_url = $base_url . '?' . $action;
            break;
        default:
            $link_url = $base_url;
    }
    echo $link_url;
});
$twig->addFunction($action_url_function);

$developer_list_function = new Twig_SimpleFunction('developer_list', function ($providedId) {

    $db = new DeveloperRepository;
    $developer_list = $db->getAll();
    $htmlBlock = '';

    foreach ($developer_list as $developer) {
        $selected = ($providedId == $developer->getId()) ? ' selected' : '';
        $htmlBlock .= '<option value="'. $developer->getId() .'"'. $selected .'>'.$developer->getName().'</option>';
    }

    echo $htmlBlock;
});
$twig->addFunction($developer_list_function);

$developer_link_function = new Twig_SimpleFunction('developer_link', function ($providedId) {

    $db = new DeveloperRepository;
    $developer_id = filter_var($providedId, FILTER_SANITIZE_NUMBER_INT);
    $developer = $db->getOneById($developer_id);
    $link = '';

    if ($developer) {
        $link .= '<a href="/?developer/'. $developer->getId() .'">'.$developer->getName().'</a>';
    }

    echo $link;
});
$twig->addFunction($developer_link_function);


//create an instance of MainController class for use in index.php
$mainController = new MainController();