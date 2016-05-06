<?php
namespace Phizzle;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
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
            $userDb = new UserRepository();

            $isLoggedIn = $userDb->canFindMatchingUsernameAndPassword($username, $password);

            if ($isLoggedIn) {

                $user = $userDb->getOnebyUsername($username);
                //STORE login status SESSION
                $_SESSION['user'] = $username;
                $_SESSION['role'] = $user->getRole();
                // set the redirect location
                $redirect = isset($_SESSION['redirect']) ? $_SESSION['redirect'] : 'index.php';
                // perform browser redirect
                header("Location: " . $redirect);
                // end request
                exit();

            } else {

                print $twig->render('message.html.twig');

            }

        }
        else {

            $data = array( 'page_title' => 'Login' );

            if ( Utility::isLoggedInFromSession() ) {
                $data['username'] = Utility::usernameFromSession();
            }

            print $twig->render('login.html.twig', $data);

        }

    }

    public function logoutAction()
    {

        if ( Utility::isLoggedInFromSession() ) {
            // ensure there is a session
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
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

        $logger->
        $logger->addInfo('Registration logger is now ready.', array( 'user' => 'Joe'));

        // Check that this is a POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // If the POST variable 'register' exists (the form submit button),
            // we can assume that the user has submitted the registration form.
            $logger->addInfo('A form was posted.');
            
                $logger->addInfo('We have a registration form.');

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
                        $_SESSION['role'] = $newSignup->getRole();
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

            if ( Utility::isLoggedInFromSession() ) {
                // ensure there is a session
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                // end the session
                session_destroy();
            }

            print $twig->render('register.html.twig', $data);

        }

    }

    public function screenAction(\Twig_Environment $twig)
    {

        if ( Utility::isLoggedInFromSession() ) {
            $data = array(
                'page_title' => 'Screen',
                'active_page' => 'screen',
                'username' => Utility::usernameFromSession(),
                'isAdmin' => Utility::isUserAuthorised(),
                'watch_list' => $this->screenListingAction()
            );
            print $twig->render('screen.html.twig', $data);
        }
        else {
            Utility::doLoginRedirect();
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

        $rss = new \DOMDocument();
        $rss->load('http://feeds.feedburner.com/GamasutraNews');
        $feed = array();
        foreach ($rss->getElementsByTagName('item') as $node) {

            $content = $node->getElementsByTagName('description')->item(0)->nodeValue;
            $dom = new \DOMDocument();
            @$dom->loadHTML($content);

            $images = $dom->getElementsByTagName('img');

            $text = preg_replace("/<img[^>]+\>/i", "", $node->getElementsByTagName('description')->item(0)->nodeValue);

            $item = array (
                'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                'image' => $images[0]->attributes['src']->nodeValue,
                'text' => $text,
                'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                'date' => date('l F d, Y', strtotime($node->getElementsByTagName('pubDate')->item(0)->nodeValue))
            );
            array_push($feed, $item);
        }

        if ( Utility::isLoggedInFromSession() ) {
            $data = array(
                'page_title' => 'News',
                'active_page' => 'news',
                'username' => Utility::usernameFromSession(),
                'isAdmin' => Utility::isUserAuthorised(),
                'feed' => $feed
            );
            print $twig->render('news.html.twig', $data);
        }
        else {
            Utility::doLoginRedirect();
        }

    }

    public function insightAction(\Twig_Environment $twig)
    {

        if ( Utility::isLoggedInFromSession() ) {
            $data = array(
                'page_title' => 'Insight',
                'active_page' => 'insight',
                'username' => Utility::usernameFromSession(),
                'isAdmin' => Utility::isUserAuthorised()
            );
            print $twig->render('insight.html.twig', $data);
        }
        else {
            Utility::doLoginRedirect();
        }

    }

    public function indexAction(\Twig_Environment $twig)
    {

        $data = array( 'page_title' => 'Home' );

        if ( Utility::isLoggedInFromSession() ) {
            $data['username'] = Utility::usernameFromSession();
            $data['isAdmin'] = Utility::isUserAuthorised();
        }

        print $twig->render('home.html.twig', $data);

    }

    public function shopAction(\Twig_Environment $twig)
    {

        if ( Utility::isLoggedInFromSession() ) {
            $data = array(
                'page_title' => 'Shop',
                'active_page' => 'shop',
                'username' => Utility::usernameFromSession(),
                'game_list' => $this->shopListingAction(),
                'isAdmin' => Utility::isUserAuthorised()
            );
            print $twig->render('shop.html.twig', $data);
        }
        else {
            Utility::doLoginRedirect();
        }

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

        $data = array(
            'page_title' => 'Sitemap',
            'active_page' => 'sitemap',
        );

        if ( Utility::isLoggedInFromSession() ) {
            $data['username'] = Utility::usernameFromSession();
            $data['isAdmin'] = Utility::isUserAuthorised();
        }

        print $twig->render('sitemap.html.twig', $data);

    }

}