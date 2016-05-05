<?php

namespace Phizzle;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

/**
 * Class DeveloperController
 * @package Phizzle
 */
class DeveloperController
{
    public function __construct(\Twig_Environment $twig, $parameters = array())
    {

        $logger = new Logger('name');
        $logger->pushHandler(new StreamHandler(__DIR__.'/../my_app.log', Logger::DEBUG));
        $logger->addInfo('DeveloperController.');

        if (0 < count($parameters)) {
            $action = array_shift($parameters);
            switch (strtolower( filter_var($action, FILTER_SANITIZE_STRING) )) {
                case 'create' :
                    $logger->addInfo('DeveloperController : create');
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Process POST : Create new Developer
                        $this->createAction($twig, $parameters);
                    }
                    else {
                        // Render Create new Developer form
                        $this->showFormAction($twig, $parameters);
                    }
                    break;
                case 'edit' :
                    $logger->addInfo('DeveloperController : edit');
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Process POST : Update Developer
                        $this->updateAction($twig, $parameters);
                    }
                    else {
                        // Render Update Developer form
                        $this->showFormAction($twig, $parameters);
                    }
                    break;
                case 'delete' :
                    $logger->addInfo('DeveloperController : delete');
                    // Delete the Developer
                    $this->deleteAction($twig, $parameters);
                    break;
                default:
                    $logger->addInfo('DeveloperController : default');
                    // Display the Developer
                    $this->showAction($twig, $parameters);
                    break;
            }
        }
        else {
            $logger->addInfo('DeveloperController : No parameters.');

            $this->indexAction($twig);
        }
    }

    public function indexAction(\Twig_Environment $twig)
    {
        if ( ! Utility::checkUserIsAuthorised() ) {
            Utility::doLoginRedirect();
        }
        else {
            $data = array( 'username' => Utility::usernameFromSession() );
            $db = new \Phizzle\DeveloperRepository;
            $data['developer_list'] = $db->getAll();
            print $twig->render('admin/developer-list.html.twig', $data);
        }
    }

    public function createAction(\Twig_Environment $twig, $param = array())
    {
        if ( ! Utility::checkUserIsAuthorised() ) {
            Utility::doLoginRedirect();
        }
        else {
            // List Developers
        }
    }

    public function updateAction(\Twig_Environment $twig, $param = array())
    {
        if ( ! Utility::checkUserIsAuthorised() ) {
            Utility::doLoginRedirect();
        }
        else {
            $data = array( 'username' => Utility::usernameFromSession() );
            // List Developers
        }
    }

    public function deleteAction(\Twig_Environment $twig, $param = array())
    {
        if ( ! Utility::checkUserIsAuthorised() ) {
            Utility::doLoginRedirect();
        }
        else {
            // Get the 'id' of the Developer object to be deleted
            $developer_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            // Check that a Developer with that 'id' exists
            $db = new \Phizzle\DeveloperRepository;
            if ( $developer = $db->getOneById($developer_id) ) {
                // Delete the Developer from the database
                $db->delete( $developer->getId() );
                // Log the action
            }
            // Send User to Developer listings
            $this->indexAction($twig);
        }
    }

    public function showFormAction(\Twig_Environment $twig, $param = array())
    {
        if ( ! Utility::checkUserIsAuthorised() ) {
            Utility::doLoginRedirect();
        }
        else {
            $data = array( 'username' => Utility::usernameFromSession() );
            print $twig->render('admin/developer-form.html.twig', $data);
        }
    }

    public function showAction(\Twig_Environment $twig, $param = array())
    {
        $data = array( 'username' => Utility::usernameFromSession() );
        // List Developers
    }

}