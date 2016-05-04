<?php
namespace Phizzle;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Mattsmithdev\PdoCrud\DatabaseTable;

$parent_directory = dirname( dirname(__FILE__) );
define('TEMPLATE_DIRECTORY', $parent_directory . '/templates');

class AdminController
{

    public function indexAction(\Twig_Environment $twig)
    {

    }

    public function userUpdateAction(\Twig_Environment $twig)
    {
        $data = array( 'page_title' => 'Create / Update User' );
        $db = new \Phizzle\UserRepository;
        // create a log channel
        $logger = new Logger('name');
        $logger->pushHandler(new StreamHandler(__DIR__.'/../my_app.log', Logger::DEBUG));
        $logger->pushHandler(new FirePHPHandler());

        $logger->addInfo('Registration logger is now ready.');

        // Check that this is a POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // If the POST variable 'register' exists (the form submit button),
            // we can assume that the user has submitted the registration form.

            $validation_rules = array(
                'username' => array( 'type' => 'string', 'required' => true, 'min' => 3, 'max' => 50, 'trim' => true ),
                'email' => array( 'type' => 'email', 'required' => true, 'trim' => true ),
                'firstname' => array( 'type' => 'string', 'required' => true, 'min' => 1, 'max' => 50, 'trim' => true ),
                'lastname' => array( 'type' => 'string', 'required' => true, 'min' => 2, 'max' => 50, 'trim' => true ),
            );

            // do we need to validate the password?
            if (empty($_POST['id']) && !empty($_POST['password'])) {
                // creating a new user or updating a password
                $validation_rules['password'] = array('type' => 'string', 'required' => true, 'min' => 8, 'max' => 50, 'trim' => true);
            }

            $validate = new validation;
            $validate->addRules($validation_rules);
            $validate->addSource($_POST);
            $validate->run();

            if (!empty($_POST['id']) && empty($_POST['password'])) {
                // this is an update without a new password
                $originalId = $_POST['id'];
                // get the User object from the database
                $update_user = $db->getOneById($originalId);
            }
            else {
                $update_user = new \Phizzle\User;
            }

            $update_user->setUsername( $validate->sanitized['username'] );
            $update_user->setFirstname( $validate->sanitized['firstname'] );
            $update_user->setLastname( $validate->sanitized['lastname'] );
            $update_user->setEmail( $validate->sanitized['email'] );
            $update_user->setRole( $validate->sanitized['role'] );

            if (!empty($_POST['password'])) {
                $update_user->setPassword( $validate->sanitized['password'] );
            }

            if (sizeof($validate->errors) > 0) {
                // go back to form
                $data['user'] = $update_user;
                $htmlOutput = $twig->render('admin/user.html.twig', $data);
                print $htmlOutput;
            }
            else {

                if (!empty($_POST['id'])) {
                    $result = $db->update($update_user, $originalId);
                } else {
                    // create new user
                    $newId = $db->create($update_user);
                }
            }

        }
        else {


            $isLoggedIn = $this->isLoggedInFromSession();
            $data['user'] = new \Phizzle\User;
            $htmlOutput = $twig->render('admin/user.html.twig', $data);
            print $htmlOutput;

        }


    }

    /**
     * Check if user is logged in
     * @return bool Returns true if 'user' variable is found in session
     */
    public function isLoggedInFromSession() {
        $isLoggedIn = false;

        // user is logged in if there is a 'user' entry in the SESSION superglobal
        if (isset($_SESSION['user'])) {
            $isLoggedIn = true;
        }
        return $isLoggedIn;
    }

    public function usernameFromSession() {
        $username = '';
        // extract username from SESSION superglobal
        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user'];
        }

        return $username;
    }

    function doLoginRedirect() {
        // set session variable for redirect
        $_SESSION['redirect'] = $_SERVER['REQUEST_URI']; // e.g. /index.php?action=screen
        // go to login page
        header("HTTP/1.1 403 Unauthorised");
        header("Location: " . "index.php?action=login");
        exit();
    }

    public function generate_url($action)
    {
        $base_url = 'admin/index.php';
        switch ($action) {
            case 'login' :
            case 'logout' :
            case 'user' :
            case 'watch' :
            case 'read' :
            case 'product' :
            case 'order' :
                $link_url = $base_url . '?action=' . $action;
                break;
            default:
                $link_url = 'index.php';
        }
        return $link_url;

    }

    public function get_logout_panel()
    {

        $logout = '';
        if ($this->isLoggedIn()) {
            $logout = '<span id="logout">Logged in as: <strong><?= $username ?></strong> <a href="'. $this->generate_url('logout') .'">(logout)</a></span>';
        }
        return $logout;

    }

}