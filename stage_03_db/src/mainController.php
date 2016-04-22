<?php
namespace Phizzle;

$parent_directory = dirname( dirname(__FILE__) );
define('TEMPLATE_DIRECTORY', $parent_directory . '/templates');

require_once __DIR__ . '/game.php';
require_once __DIR__ . '/watch.php';

class MainController
{

   // public function aboutAction(\Twig_Environment $twig) - NOTE: About page
    // was merged with index.php to create single landing page

    public function loginAction() // \Twig_Environment $twig
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // login form has been submitted

            $isLoggedIn = false; //default is bad login

            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            $hashedCorrectPassword = password_hash('admin', PASSWORD_DEFAULT);

            // search for user with username in repository
            //$userRepository = new UserRepository();
            $user = new User();
            $isLoggedIn = $user->canFindMatchingUsernameAndPassword($username, $password);

            // if(('admin' ==$username) && password_verify ($password, $hashedCorrectPassword)){
            //   $isLoggedIn = true;
            //   }

            if ($isLoggedIn) {
                //STORE login status SESSION
                $_SESSION['user'] = $username;
                // set the redirect location
                $redirect = isset($_SESSION['redirect']) ? $_SESSION['redirect'] : 'index.php';
                // success - found a matching username and password
                //require_once __DIR__ . TEMPLATE_DIRECTORY . '/loginSuccess.php';
                // perform browser redirect
                header("Location: " . $redirect);
                // end request
                exit();

            } else {
                // $message = 'bad username or password, please try again';
                require_once __DIR__ . TEMPLATE_DIRECTORY . '/message.php';
            }


        }
        else {
        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();

        $pageTitle = 'Login';
        $sitemapLinkStyle = 'current_page';
        require_once TEMPLATE_DIRECTORY . '/login.php';
        }
       // require_once TEMPLATE_DIRECTORY . '/login.php';

        //      $argsArray = [];
        //      $template = 'sitemap';
        //      $htmlOutput = $twig->($template . '.html.twig', $argsArray);
        //      print $htmlOutput;

    }

    public function registerAction() // \Twig_Environment $twig
    {

        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();
        require_once TEMPLATE_DIRECTORY . '/register.php';

        $pageTitle = 'Register';
        $sitemapLinkStyle = 'current_page';

    }


    public function processLoginAction()
    {
        $isLoggedIn = false; //default is bad login

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $hashedCorrectPassword = password_hash('admin', PASSWORD_DEFAULT);

        // search for user with username in repository
        //$userRepository = new UserRepository();
        $isLoggedIn = User::canFindMatchingUsernameAndPassword($username, $password);

       // if(('admin' ==$username) && password_verify ($password, $hashedCorrectPassword)){
         //   $isLoggedIn = true;
     //   }

        if($isLoggedIn) {
            //STORE login status SESSION
            $_SESSION['user'] = $username;
            // success - found a matching username and password
            require_once __DIR__ . TEMPLATE_DIRECTORY . '/loginSuccess.php';
        } else {
            // $message = 'bad username or password, please try again';
            require_once __DIR__ . TEMPLATE_DIRECTORY . '/message.php';
        }
    }

    public function isLoggedInFromSession() {
        $isLoggedIn = false;

        // user is logged in if there is a 'user' entry in the SESSION superglobal
        if(isset($_SESSION['user'])) {
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
        $_SESSION['redirect'] = $_SERVER['REQUEST_URI']; // e.g. /stage_02_php/public/index.php?action=screen
        // go to login page
        header("HTTP/1.1 403 Unauthorised");
        header("Location: " . "index.php?action=login");
        exit();
    }

    public function screenAction() //\Twig_Environment $twig
    {

        $isLoggedIn = $this->isLoggedInFromSession();

        if ($isLoggedIn) {
            $username = $this->usernameFromSession();

            $pageTitle = 'Screen';
            $screenLinkStyle = 'current_page';
            require_once TEMPLATE_DIRECTORY . '/screen.php';
        }
        else {
            $this->doLoginRedirect();
        }

       // require_once TEMPLATE_DIRECTORY .'/screen.php';

        //      $argsArray = [];
        //      $template = 'screen';
        //      $htmlOutput = $twig->($template . '.html.twig', $argsArray);
        //      print $htmlOutput;


    }

    public function screenListingAction() //\Twig_Environment $twig
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

    public function newsAction() //\Twig_Environment $twig
    {


        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();


        $pageTitle = 'News';
        $newsLinkStyle = 'current_page';
        require_once TEMPLATE_DIRECTORY . '/news.php';

        //      $argsArray = [];
        //      $template = 'news';
        //      $htmlOutput = $twig->($template . '.html.twig', $argsArray);
        //      print $htmlOutput;
    }

    public function insightAction()  //\Twig_Environment $twig
    {
        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();


        $pageTitle = 'Insight';
        $insightLinkStyle = 'current_page';
        require_once TEMPLATE_DIRECTORY . '/insight.php';

        //      $argsArray = [];
        //      $template = 'insight';
        //      $htmlOutput = $twig->($template . '.html.twig', $argsArray);
        //      print $htmlOutput;
    }

    public function indexAction() //\Twig_Environment $twig
    {
        $pageTitle = 'Home';
        $indexLinkStyle = 'current_page';
        require_once __DIR__ . '/../templates/index.php';

        //      $argsArray = [];
        //      $template = 'home';
        //      $htmlOutput = $twig->($template . '.html.twig', $argsArray);
        //      print $htmlOutput;
    }

    public function shopAction() //\Twig_Environment $twig
    {

        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();

        $pageTitle = 'Shop';
        $shopLinkStyle = 'current_page';
        require_once TEMPLATE_DIRECTORY . '/shop.php';

        //      $argsArray = [];
        //      $template = 'shop';
        //      $htmlOutput = $twig->($template . '.html.twig', $argsArray);
        //      print $htmlOutput;
    }

    public function shopListingAction() //\Twig_Environment $twig
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

    public function sitemapAction() // \Twig_Environment $twig
    {
        $pageTitle = 'Sitemap';
        $sitemapLinkStyle = 'current_page';
        require_once TEMPLATE_DIRECTORY . '/sitemap.php';

        //      $argsArray = [];
        //      $template = 'sitemap';
        //      $htmlOutput = $twig->($template . '.html.twig', $argsArray);
        //      print $htmlOutput;
    }

}