<?php

namespace Phizzle;

/**
 * Class VideoController
 * @package Phizzle
 */
class VideoController
{
    public function __construct(\Twig_Environment $twig, $parameters = array())
    {

        if (0 < count($parameters)) {
            $action = array_shift($parameters);
            switch (strtolower( filter_var($action, FILTER_SANITIZE_STRING) )) {
                case 'create' :
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Process POST : Create new Video
                        $this->createAction($twig);
                    } else {
                        // Render Create new Video form
                        $video = new \Phizzle\Video;
                        $this->showFormAction($twig, $video);
                    }
                    break;
                case 'update' :
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Process POST : Update Video
                        $this->updateAction($twig);
                    } else {
                        $video_id = filter_var( array_shift($parameters), FILTER_SANITIZE_NUMBER_INT );
                        $db = new \Phizzle\VideoRepository;
                        if (! $video = $db->getOneById($video_id) ) {
                            // Delete the Video from the database
                            $video = new \Phizzle\Video;
                        }
                        // Render Update Video form
                        $this->showFormAction($twig, $video);
                    }
                    break;
                case 'delete' :
                    // Delete the Video
                    $this->deleteAction($twig, $parameters);
                    break;
                default:
                    // Display the Video
                    $this->showAction($twig, $parameters);
                    break;
            }
        } else {
            $this->indexAction($twig);
        }
    }

    public function indexAction(\Twig_Environment $twig)
    {
    	$db = new \Phizzle\VideoRepository;
        $data = array( 
                'active_page' => 'admin/video',
        		'username' => Utility::usernameFromSession(),
                'video_list' => $db->getAll()
        );


        print $twig->render('admin/video-list.html.twig', $data);
    }

    public function createAction(\Twig_Environment $twig)
    {
        if ( ! Utility::checkUserIsAuthorised() ) {
            Utility::doLoginRedirect();
        } else {

            $video_id = null;
            $video = new \Phizzle\Video;
            $db = new \Phizzle\VideoRepository;

            $video->setTitle( filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING) );
            $video->setScreen( filter_input(INPUT_POST, 'screen', FILTER_SANITIZE_STRING) );
            $video->setUrl( filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING) );
            $video->setDescription( filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING) );
            $video_id = $db->create($video);

            if (!$video_id) {
                $this->showFormAction($twig, $video);
            } else {
                header("Location: /?admin/video");
                exit();
            }

        }
    }

    public function updateAction(\Twig_Environment $twig)
    {
        if ( ! Utility::checkUserIsAuthorised() ) {
            Utility::doLoginRedirect();
        } else {
            $data = array( 'username' => Utility::usernameFromSession() );

            $video_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

            $db = new \Phizzle\VideoRepository;

            // get the Video object from the database
            $video = $db->getOneById($video_id);

            $video->setTitle( filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING) );
            $video->setScreen( filter_input(INPUT_POST, 'screen', FILTER_SANITIZE_STRING) );
            $video->setUrl( filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING) );
            $video->setDescription( filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING) );

            $result = $db->update($video, $video_id);

            if (! $result) {
                $this->showFormAction($twig, $video);
            } else {
                header("Location: /?admin/video");
                exit();
            }

        }
    }

    public function deleteAction(\Twig_Environment $twig, $param = array())
    {
        if (! Utility::checkUserIsAuthorised() ) {
            Utility::doLoginRedirect();
        } else {
            // Get the 'id' of the Video object to be deleted
            $video_id = filter_var( array_shift($param), FILTER_SANITIZE_NUMBER_INT );
            // Check that a Video with that 'id' exists
            $db = new \Phizzle\VideoRepository;
            if ( $video = $db->getOneById($video_id) ) {
                // Delete the Video from the database
                $db->delete( $video->getId() );
                // Log the action
            }
            // Send User to Video listings
            header("Location: /?admin/video");
            exit();
        }
    }

    public function showFormAction(\Twig_Environment $twig, \Phizzle\Video $video)
    {
        $data = array(
            'active_page' => 'admin/video',
            'username' => Utility::usernameFromSession(),
            'video' => $video
        );
        print $twig->render('admin/video-form.html.twig', $data);
    }

    public function showAction(\Twig_Environment $twig, $param = array())
    {
        $video_id = filter_var( array_shift($param), FILTER_SANITIZE_NUMBER_INT );
        $db = new \Phizzle\VideoRepository;

        $data = array(
    
            'username' => Utility::usernameFromSession(),
            'video' => $db->getOneById($video_id)
        );

        // Show Video
        print $twig->render('video.html.twig', $data);
    }

}