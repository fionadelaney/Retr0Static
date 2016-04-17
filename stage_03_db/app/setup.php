<?php
/**
 * Created by PhpStorm.
 * User: vagrant
 * Date: 17/04/16
 * Time: 18:36
 */
//----------------- autoload any classes we are using ------------------
require_once __DIR__ . '/../vendor/autoload.php';

use Phizzle\MainController;


//----------------- Twig setup ----------------------------
$templatesPath = __DIR__ . '/../templates';
$loader = new Twig_Loader_Filesystem($templatesPath);
$twig = new Twig_Environment($loader);

//create an instance of MainController class for use in index.php

$mainController = new MainController();