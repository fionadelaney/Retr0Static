<?php
namespace Phizzle;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Mattsmithdev\PdoCrud\DatabaseTable;

$parent_directory = dirname( dirname(__FILE__) );
define('TEMPLATE_DIRECTORY', $parent_directory . '/templates');

require_once __DIR__ . '/game.php';
require_once __DIR__ . '/watch.php';

class MainController
{

   // public function aboutAction(\Twig_Environment $twig) - NOTE: About page
    // was merged with index.php to create single landing page

    public function loginAction(\Twig_Environment $twig)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // login form has been submitted

            $isLoggedIn = false; //default is bad login

            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


            // search for user with username in repository
            //$userRepository = new UserRepository();
            $user = new UserRepository();

            $isLoggedIn = $user->canFindMatchingUsernameAndPassword($username, $password);

            if ($isLoggedIn) {
                //STORE login status SESSION
                $_SESSION['user'] = $username;
                // set the redirect location
                $redirect = isset($_SESSION['redirect']) ? $_SESSION['redirect'] : 'index.php';
                // perform browser redirect
                header("Location: " . $redirect);
                // end request
                exit();

            } else {

                $htmlOutput = $twig->render('message.html.twig');
                print $htmlOutput;

            }


        }
        else {

            $isLoggedIn = $this->isLoggedInFromSession();
            $data = [];

            if ($isLoggedIn) {
                $data['username'] = $this->usernameFromSession();
            }

            $data['page_title'] = 'Login';

            $template = 'login';
            $htmlOutput = $twig->render($template . '.html.twig', $data);
            print $htmlOutput;

        }

    }

    public function logoutAction() // \Twig_Environment $twig
    {
        $isLoggedIn = $this->isLoggedInFromSession();
        if ($isLoggedIn) {
            // ensure there is a session
            session_start();
            // end the session
            session_destroy();
            // redirect to home page
            header("Location: " . "index.php");
            exit();
        }
    }

    public function registerAction(\Twig_Environment $twig)
    {
        // create a log channel
        $logger = new Logger('name');
        $logger->pushHandler(new StreamHandler(__DIR__.'/../my_app.log', Logger::DEBUG));
        $logger->pushHandler(new FirePHPHandler());

        $logger->addInfo('Registration logger is now ready.');

        // Check that this is a POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // If the POST variable 'register' exists (the form submit button),
            // we can assume that the user has submitted the registration form.
            $logger->addInfo('A form was posted.');
            
                $logger->addInfo('We have a registration form.');
/*
                // Retrieve the field values from the registration form.
                $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
                $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
                $confirm = !empty($_POST['confirm']) ? trim($_POST['confirm']) : null;
                $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
                $firstname = !empty($_POST['firstname']) ? trim($_POST['firstname']) : null;
                $lastname = !empty($_POST['lastname']) ? trim($_POST['lastname']) : null;
*/
                $validation_rules = array(
                    'username' => array( 'type' => 'string', 'required' => true, 'min' => 3, 'max' => 50, 'trim' => true ),
                    'email' => array( 'type' => 'email', 'required' => true, 'trim' => true ),
                    'firstname' => array( 'type' => 'string', 'required' => true, 'min' => 1, 'max' => 50, 'trim' => true ),
                    'lastname' => array( 'type' => 'string', 'required' => true, 'min' => 2, 'max' => 50, 'trim' => true ),
                    'password' => array( 'type' => 'string', 'required' => true, 'min' => 8, 'max' => 50, 'trim' => true )
                );

                $validate = new validation;
                $validate->addRules($validation_rules);
                $validate->addSource($_POST);
                $validate->run();

                if (sizeof($validate->errors) > 0) {
                    print_r($validate->errors);
                }
                else {
                    // create a new User object
                    $newSignup = new User;
                    // populate the User properties
                    $newSignup->setUsername( $validate->sanitized['username'] );
                    $newSignup->setFirstname( $validate->sanitized['firstname'] );
                    $newSignup->setLastname( $validate->sanitized['lastname'] );
                    $newSignup->setEmail( $validate->sanitized['email'] );
                    $newSignup->setPassword( $validate->sanitized['password'] );
                    // assign User role
                    $newSignup->setRole( 1 );
                    // save User to database
                    $id = UserRepository::create($newSignup);
                    if ($id > -1) {
                        // ensure there is a session
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        // store the username in the session
                        $_SESSION['user'] = $newSignup->getUsername();
                        // render the welcome template
                        print $twig->render('thanks.html.twig', array( 'firstname' => $newSignup->getFirstname(), 'username' => $newSignup->getUsername() ));
                    }
                    else {
                        // database error
                    }
                    
                }

        }
        else {

            $data = array( 'page_title' => 'Register' );

            $isLoggedIn = $this->isLoggedInFromSession();

            if ($isLoggedIn) {
                // ensure there is a session
                session_start();
                // end the session
                session_destroy();
            }

            $htmlOutput = $twig->render('register.html.twig', $data);
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

    public function screenAction(\Twig_Environment $twig)
    {

        $data = array( 'page_title' => 'Screen' );
        $isLoggedIn = $this->isLoggedInFromSession();

        if ($isLoggedIn) {
            $data['username'] = $this->usernameFromSession();
            $data['watch_list'] = $this->screenListingAction();
            $template = 'screen';
            $htmlOutput = $twig->render($template . '.html.twig', $data);
            print $htmlOutput;
        }
        else {
            $this->doLoginRedirect();
        }

    }

    public function screenListingAction()
    {
        $watch_list = [];
        $watch_list[] = new Watch('246bioshock.jpg', 'Bioshock Playthrough',
            'https://www.youtube.com/watch?v=iScHVPjP1jU');
        $watch_list[] = new Watch('bioshock_ss.jpg', 'Bioshock Trailer',
            'https://www.youtube.com/watch?v=CoYorK3E4aM');
        $watch_list[] = new Watch('prince.JPG', 'Prince of Persia The Movie Trailer',
            'https://www.youtube.com/watch?v=Z8EA7EbFX4k');
        $watch_list[] = new Watch('chili.jpg', 'Chili Con Carnage Playthrough',
            'https://www.youtube.com/watch?v=Be6HXPBRwoQ');
        $watch_list[] = new Watch('reality_2.png', 'Sims2 Reality show by dkidluke',
            'https://www.youtube.com/watch?v=n8UOEt0-WqU&ebc=ANyPxKqJJ_png__4Fd8DBWajf_QtlCyUY_w-UDD6KAegELP26Eqfjj5qlU0QGm5X482pxeyEhk2qh83Yu8R7Zjsfn-EHTv6rgw');

        $watch_list[] = new Watch('mountain.png', 'Mountain Playthrough',
            'https://www.youtube.com/watch?v=Qd_x-S7IpHA');
        $watch_list[] = new Watch('Chili_Con_Carnage.jpg', 'Chili Con Carnage Trailer',
        'https://www.youtube.com/watch?v=LhFeyJ00fdo');
        $watch_list[] = new Watch('her2.JPG', 'Her The Movie Trailer',
            'http://www.davidoreilly.com/projects/her/');
        $watch_list[] = new Watch('baldursgate_ss.png', 'Baldurs Gate 2 Playthrough',
            'https://www.youtube.com/watch?v=QHHzMLL8ERs');
        $watch_list[] = new Watch('reality_1.png', 'Bioshock',
            'https://www.youtube.com/watch?v=cKpKv8lGG9o');

    return $watch_list;

    }

    public function newsAction(\Twig_Environment $twig)
    {

        $data = array( 'page_title' => 'News' );
        $isLoggedIn = $this->isLoggedInFromSession();

        if ($isLoggedIn) {
            $data['username'] = $this->usernameFromSession();
            $template = 'news';
            $htmlOutput = $twig->render($template . '.html.twig', $data);
            print $htmlOutput;
        }
        else {
            $this->doLoginRedirect();
        }

    }

    public function insightAction(\Twig_Environment $twig)
    {
        $data = array( 'page_title' => 'Insight' );
        $isLoggedIn = $this->isLoggedInFromSession();

        if ($isLoggedIn) {
            $data['username'] = $this->usernameFromSession();
            $template = 'insight';
            $htmlOutput = $twig->render($template . '.html.twig', $data);
            print $htmlOutput;
        }
        else {
            $this->doLoginRedirect();
        }

    }

    public function indexAction(\Twig_Environment $twig)
    {
        $template = 'home';
        $data = array( 'page_title' => 'Home' );

        $isLoggedIn = $this->isLoggedInFromSession();
        if ($isLoggedIn) {
            $data['username'] = $this->usernameFromSession();
        }

        $htmlOutput = $twig->render($template . '.html.twig', $data);
        print $htmlOutput;
    }

    public function shopAction(\Twig_Environment $twig)
    {

        $template = 'shop';
        $data = array( 'page_title' => 'Shop' );

        $isLoggedIn = $this->isLoggedInFromSession();

        if ($isLoggedIn) {
            $data['username'] = $this->usernameFromSession();
            $data['game_list'] = $this->shopListingAction();
        }
        else {
            $this->doLoginRedirect();
        }

        $htmlOutput = $twig->render($template . '.html.twig', $data);
        print $htmlOutput;

    }

    public function shopListingAction()
    {
        $game_list = [];
        $game_list[] = new Game('BIG001', 'Bioshock','XBox 360 2007', '&euro; 6.00',
        'bioshock_ss.jpg', 'Irrational Games', 'http://irrationalgames.com/tag/bioshock/',
        'Fantasy 1st person shooter');

        $game_list[] = new Game(' BIG002 ', 'Bioshock', 'PS3 2008', '&euro; 6.00', 'bioshock_ss.jpg',
        'Irrational Games', 'http://irrationalgames.com/tag/bioshock/', 'Fantasy 1st person shooter');

        $game_list[] = new Game('BIG003', 'Bioshock', 'Windows 2007', '&euro; 6.00', 'bioshock_ss.jpg',
        'Irrational Games', 'http://irrationalgames.com/tag/bioshock/', 'Fantasy 1st person shooter');

        $game_list[] = new Game(' CDG003 ','Chili Con Carnage','PSP 2007','&euro; 6.00','chili.jpg',
        'Deadline Games [Defunct] ', 'http://www.mobygames.com/company/deadline-games-as/','Comedy Action 3rd person shooter');

        $game_list[] = new Game(' IE005 ', 'Baldur\'s Gate II',' Windows ','&euro; 6.00','baldursgate_ss.png',
        'Interplay Ent Corp ', ' http://www.interplay.com/ ',' Fantasy CRPG ');

        $game_list[] = new Game(' SEA004 ', ' The Sims 2 ', ' Nintendo DS 2005 ','&euro; 6.00','sims2_ss.jpg',
        ' Electronic Arts ',' http://www.ea.com/ ',' Life Simulation ');

        $game_list[] = new Game(' SEA007 ',' The Sims 2 ',' GameCube 2005 ','&euro; 6.00', 'sims2_ss.jpg',
        ' Electronic Arts ', ' http://www.ea.com/ ',' Life Simulation ');

        $game_list[] = new Game(' PHMR02 ',' Prince of Persia ',' Sega Master System 1992 ','&euro; 26.00',
        'prince_persia_ss.png',' Broderbund Software [defunct]  ',
        ' http://www.mobygames.com/company/brderbund-software-inc/ ',' Fantasy ');

        $game_list[] = new Game(' PHMR75 ', ' Prince of Persia ',' Gameboy Color 1999 ','&euro; 26.00',
        'prince_persia_ss.png', ' Broderbund Software [defunct]  ',
        ' http://www.mobygames.com/company/brderbund-software-inc/',' Fantasy ');

        $game_list[] = new Game(' PHMR08 ', ' Prince of Persia ',' Amstrad PCP 1990 ','&euro; 26.00',
        'prince_persia_ss.png', ' Broderbund Software [defunct]  ',
        ' http://www.mobygames.com/company/brderbund-software-inc/ ',' Fantasy ');


        return $game_list;

    }

    public function sitemapAction(\Twig_Environment $twig)
    {

        $data = array( 'page_title' => 'Sitemap' );

        $isLoggedIn = $this->isLoggedInFromSession();

        if ($isLoggedIn) {
            $data['username'] = $this->usernameFromSession();
        }

        $template = 'sitemap';
        $htmlOutput = $twig->render($template . '.html.twig', $data);
        print $htmlOutput;
    }

    public function generate_url($action)
    {
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