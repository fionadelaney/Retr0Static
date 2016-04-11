<?php

require_once __DIR__ . '/game.php';


function aboutAction()
{
    $pageTitle = 'About';
    $aboutLinkStyle = 'current_page';
    require_once __DIR__ . '/../templates/about.php';
}

function screenAction()
{
    $pageTitle = 'Screen';
    $screenLinkStyle = 'current_page';
    require_once __DIR__ . '/../templates/screen.php';
}

function newsAction()
{
    $pageTitle = 'News';
    $newsLinkStyle = 'current_page';
    require_once __DIR__ . '/../templates/news.php';
}

function insightAction()
{
    $pageTitle = 'Insight';
    $insightLinkStyle = 'current_page';
    require_once __DIR__ . '/../templates/insight.php';
}

function indexAction()
{
    $pageTitle = 'Home';
    $indexLinkStyle = 'current_page';
    require_once __DIR__ . '/../templates/index.php';
}

function shopAction()
{
    $pageTitle = 'Shop';
    $shopLinkStyle = 'current_page';
    require_once __DIR__ . '/../templates/shop.php';
    require_once __DIR__ . '/../src/game.php';

}

 function shopListingAction()
 {
    $game_list = [];
    $game_list[] = new Game('BIG001_', 'Bioshock','XBox 360 2007', '&euro; 6.00',
        'bioshock_ss.jpg', 'Irrational Games', 'http://irrationalgames.com/tag/bioshock/',
        'Fantasy 1st person shooter');

    $game_list[] = new Game(' BIG002 ', 'Bioshock', 'PS3 2008', '&euro; 6.00', 'bioshock_ss.jpg',
        'Irrational Games', 'http://irrationalgames.com/tag/bioshock/', 'Fantasy 1st person shooter');

    $game_list[] = new Game('BIG003', 'Bioshock', 'Windows 2007', '&euro; 6.00', 'bioshock_ss.jpg',
        'Irrational Games', 'http://irrationalgames.com/tag/bioshock/', 'Fantasy 1st person shooter');

    $game_list[] = new Game(' CDG003 ','Chili Con Carnage','PSP 2007','&euro; 6.00','bioshock_ss.jpg',
        'Deadline Games [Defunct] ', 'n/a','Comedy Action 3rd person shooter');

    $game_list[] = new Game(' IE005 ', 'Baldur\'s Gate II',' Windows ','&euro; 6.00','baldursgate_ss.png',
        'Interplay Ent Corp ', ' http://www.interplay.com/ ',' Fantasy CRPG ');

    $game_list[] = new Game(' SEA004 ', ' The Sims 2 ', ' Nintendo DS 2005 ','&euro; 6.00','sims2_ss.jpg',
        ' Electronic Arts ',' http://www.ea.com/ ',' Life Simulation ');

    $game_list[] = new Game(' SEA007 ',' The Sims 2 ',' GameCube 2005 ','&euro; 6.00', 'sims2_ss.jpg',
        ' Electronic Arts ', ' http://www.ea.com/ ',' Life Simulation ');

    $game_list[] = new Game(' PHMR02 ',' Prince of Persia ',' Sega Master System 1992 ','&euro; 26.00',
        'prince_persia_ss.png', ' Broderbund Software [defunct]  ', ' n/a ',' Fantasy ');

    $game_list[] = new Game(' PHMR75 ', ' Prince of Persia ',' Gameboy Color 1999 ','&euro; 26.00',
        'prince_persia_ss.png', ' Broderbund Software [defunct]  ', ' n/a ',' Fantasy ');

    $game_list[] = new Game(' PHMR08 ', ' Prince of Persia ',' Amstrad PCP 1990 ','&euro; 26.00',
        'prince_persia_ss.png', ' Broderbund Software [defunct]  ', ' n/a ',' Fantasy ');


return $game_list;

}

function sitemapAction()
{
    $pageTitle = 'Sitemap';
    $sitemapLinkStyle = 'current_page';
    require_once __DIR__ . '/../templates/sitemap.php';
}