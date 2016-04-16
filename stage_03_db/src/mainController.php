<?php
namespace Phizzle;
class MainController
{
    //require_once __DIR__ . '/game.php';
    //require_once __DIR__ . '/../templates/watch.php';

    public function aboutAction()
    {
        $pageTitle = 'About';
        $aboutLinkStyle = 'current_page';
        require_once __DIR__ . '/../templates/about.php';
    }

    public function screenAction()
    {
        $pageTitle = 'Screen';
        $screenLinkStyle = 'current_page';
        require_once __DIR__ . '/../templates/screen.php';
        require_once __DIR__ . '/../templates/watch.php';
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

    public function newsAction()
    {
        $pageTitle = 'News';
        $newsLinkStyle = 'current_page';
        require_once __DIR__ . '/../templates/news.php';
    }

    public function insightAction()
    {
        $pageTitle = 'Insight';
        $insightLinkStyle = 'current_page';
        require_once __DIR__ . '/../templates/insight.php';
    }

    public function indexAction()
    {
        $pageTitle = 'Home';
        $indexLinkStyle = 'current_page';
        require_once __DIR__ . '/../templates/index.php';
    }

    public function shopAction()
    {
        $pageTitle = 'Shop';
        $shopLinkStyle = 'current_page';
        require_once __DIR__ . '/game.php';
        require_once __DIR__ . '/../templates/shop.php';
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


    public function sitemapAction()
    {
        $pageTitle = 'Sitemap';
         $sitemapLinkStyle = 'current_page';
        require_once __DIR__ . '/../templates/sitemap.php';
    }



}