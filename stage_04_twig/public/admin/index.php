<?php

require_once dirname(__DIR__, 2) . '/app/setup.php';

use Phizzle\AdminController;

$adminController = new AdminController();

// start session
session_start();

// get action GET parameter (if it exists)
$action = strtolower(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING));

switch ($action) {
    case 'login' :
        $mainController->loginAction($twig);
        break;
    case 'logout' :
        $mainController->logoutAction();
        break;
    case 'user' :
        $adminController->userUpdateAction($twig);
        break;
    default:
        $adminController->indexAction($twig);
}

