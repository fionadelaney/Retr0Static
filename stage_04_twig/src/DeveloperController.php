<?php

namespace Phizzle;

/**
 * Class DeveloperController
 * @package Phizzle
 */
class DeveloperController
{
    public function __construct(\Twig_Environment $twig, $parameters = array())
    {

        if (0 < count($parameters)) {
            $action = array_shift($parameters);
            switch (strtolower( filter_var($action, FILTER_SANITIZE_STRING) )) {
                case 'create' :
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Process POST : Create new Developer
                        $this->createAction($twig);
                    }
                    else {
                        // Render Create new Developer form
                        $developer = new \Phizzle\Developer;
                        $this->showFormAction($twig, $developer);
                    }
                    break;
                case 'update' :
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Process POST : Update Developer
                        $this->updateAction($twig);
                    }
                    else {
                        $developer_id = filter_var( array_shift($parameters), FILTER_SANITIZE_NUMBER_INT );
                        $db = new \Phizzle\DeveloperRepository;
                        if (! $developer = $db->getOneById($developer_id) ) {
                            // Delete the Developer from the database
                            $developer = new \Phizzle\Developer;
                            // Log the action
                        }
                        // Render Update Developer form
                        $this->showFormAction($twig, $developer);
                    }
                    break;
                case 'delete' :
                    // Delete the Developer
                    $this->deleteAction($twig, $parameters);
                    break;
                default:
                    // Display the Developer
                    $this->showAction($twig, $parameters);
                    break;
            }
        }
        else {
            $this->indexAction($twig);
        }
    }

    public function indexAction(\Twig_Environment $twig)
    {
        $data = array( 'username' => Utility::usernameFromSession() );
        $db = new \Phizzle\DeveloperRepository;
        $data['developer_list'] = $db->getAll();
        print $twig->render('admin/developer-list.html.twig', $data);
    }

    public function createAction(\Twig_Environment $twig)
    {
        if ( ! Utility::checkUserIsAuthorised() ) {
            Utility::doLoginRedirect();
        }
        else {

            $developer_id = null;
            $developer = new \Phizzle\Developer;
            $db = new \Phizzle\DeveloperRepository;

            $developer->setName( filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING) );
            $developer->setUrl( filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING) );
            $developer->setDescription( filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING) );
            $developer_id = $db->create($developer);

            if (!$developer_id) {
                $this->showFormAction($twig, $developer);
            }
            else {
                $this->indexAction($twig);
            }

        }
    }

    public function updateAction(\Twig_Environment $twig)
    {
        if ( ! Utility::checkUserIsAuthorised() ) {
            Utility::doLoginRedirect();
        }
        else {
            $data = array( 'username' => Utility::usernameFromSession() );

            $developer_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

            $db = new \Phizzle\DeveloperRepository;

            // get the Developer object from the database
            $developer = $db->getOneById($developer_id);

            $developer->setName( filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING) );
            $developer->setUrl( filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING) );
            $developer->setDescription( filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING) );

            $result = $db->update($developer, $developer_id);

            if (! $result) {
                $this->showFormAction($twig, $developer);
            }
            else {
                $this->indexAction($twig);
            }

        }
    }

    public function deleteAction(\Twig_Environment $twig, $param = array())
    {
        if ( ! Utility::checkUserIsAuthorised() ) {
            Utility::doLoginRedirect();
        }
        else {
            // Get the 'id' of the Developer object to be deleted
            $developer_id = filter_var( array_shift($param), FILTER_SANITIZE_NUMBER_INT );
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

    public function showFormAction(\Twig_Environment $twig, \Phizzle\Developer $developer)
    {
        $data = array(
            'username' => Utility::usernameFromSession(),
            'developer' => $developer
        );
        print $twig->render('admin/developer-form.html.twig', $data);
    }

    public function showAction(\Twig_Environment $twig, $param = array())
    {
        $data = array( 'username' => Utility::usernameFromSession() );
        $developer_id = filter_var( array_shift($param), FILTER_SANITIZE_NUMBER_INT );

        // Show Developer
        print $twig->render('developer.html.twig', $data);
    }

}