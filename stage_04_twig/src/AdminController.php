<?php

namespace Phizzle;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

/**
 * Class AdminController
 * @package Phizzle
 */
class AdminController
{

    public function __construct(\Twig_Environment $twig, $parameters = array())
    {

        $logger = new Logger('name');
        $logger->pushHandler(new StreamHandler(__DIR__.'/../my_app.log', Logger::DEBUG));

        // Security check
        if (!Utility::checkUserIsAuthorised()) {
            Utility::doLoginRedirect();
        } 
        else {

            $logger->addInfo('Passed AdminController security check.');
            
            if (0 < count($parameters)) {

                $logger->addInfo('Unwrapping parameters.');

                $subController = array_shift($parameters);
                switch (strtolower( filter_var($subController, FILTER_SANITIZE_STRING) )) {
                    case 'developer':
                        $logger->addInfo('Passing to DeveloperController.');
                        $developerController = new \Phizzle\DeveloperController($twig, $parameters);
                        break;
                    default :
                        $logger->addInfo('AdminController:default - display Index.');
                        $this->indexAction($twig);
                        break;
                }
            }
            else {
                $logger->addInfo('AdminController: No parameters - display Index.');
                $this->indexAction($twig);
            }

        }
    }    

    public function indexAction(\Twig_Environment $twig)
    {
        // For URL http://localhost:8080/index.php?admin/developer/view/123
        $urlStr =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        // urlStr = //localhost/index.php?admin/developer/view/123
        $urlQuery = parse_url( $urlStr , PHP_URL_QUERY );
        // urlQuery = admin/developer/view/123
        $urlPieces = explode('/', $myUrl);
        // urlPieces = [ 'admin', 'developer', 'view', '123' ]

        $logger->addInfo('AdminController: indexAction().');

        
    }
}