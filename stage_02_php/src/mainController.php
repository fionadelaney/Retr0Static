<?php

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
}

function sitemapAction()
{
    $pageTitle = 'Sitemap';
    $sitemapLinkStyle = 'current_page';
    require_once __DIR__ . '/../templates/sitemap.php';
}

function shopListingAction()
{

    $game_list = array();
    $game_list[] = array(
   //         'game_id' => 'BIG001_',
   //         'game_title' => 'Bioshock',
   //         'game_platform' => 'XBox 360 2007',
   //         'game_price' => '&euro; 6.00',
   //         'game_screen' => 'bioshock_ss.jpg',
   //         'game_dev' => 'Irrational Games',
   //         'game_dev_url' => 'http://irrationalgames.com/tag/bioshock/',
   //         'game_desc' => 'Fantasy 1st person shooter'
        'BIG001_', 'Bioshock','XBox 360 2007', '&euro; 6.00', 'bioshock_ss.jpg', 'Irrational Games',
        'http://irrationalgames.com/tag/bioshock/', 'Fantasy 1st person shooter' );

    $game_list[] = array(
   //     'game_id' => ' BIG002 ',
   //     'game_title' => 'Bioshock',
   //     'game_platform' => 'PS3 2008',
   //     'game_price' => '&euro; 6.00',
   //     'game_screen' => 'bioshock_ss.jpg',
   //     'game_dev' => 'Irrational Games',
   //     'game_dev_url' => 'http://irrationalgames.com/tag/bioshock/',
   //     'game_desc' => 'Fantasy 1st person shooter'
        ' BIG002 ', 'Bioshock', 'PS3 2008', '&euro; 6.00', 'bioshock_ss.jpg', 'Irrational Games',
        'http://irrationalgames.com/tag/bioshock/', 'Fantasy 1st person shooter');

    $game_list[] = array(
   //     'game_id' => 'BIG003',
   //     'game_title' => 'Bioshock',
   //     'game_platform' => 'Windows 2007',
   //     'game_price' => '&euro; 6.00',
   //     'game_screen' => 'bioshock_ss.jpg',
   //     'game_dev' => 'Irrational Games',
   //     'game_dev_url' => 'http://irrationalgames.com/tag/bioshock/',
   //     'game_desc' => 'Fantasy 1st person shooter'
        'BIG003', 'Bioshock', 'Windows 2007', '&euro; 6.00', 'bioshock_ss.jpg', 'Irrational Games',
        'http://irrationalgames.com/tag/bioshock/', 'Fantasy 1st person shooter');

    $game_list[] = array(
   //     'game_id' => ' CDG003 ',
   //     'game_title' => 'Chili Con Carnage',
   //     'game_platform' => 'PSP 2007',
   //     'game_price' => '&euro; 6.00',
   //     'game_screen' => 'bioshock_ss.jpg',
   //     'game_dev' => 'Deadline Games [Defunct] ',
   //     'game_dev_url' => 'n/a',
   //     'game_desc' => 'Comedy Action 3rd person shooter'
        ' CDG003 ','Chili Con Carnage','PSP 2007','&euro; 6.00','bioshock_ss.jpg',
        'Deadline Games [Defunct] ', 'n/a','Comedy Action 3rd person shooter');

    $game_list[] = array(
   //     'game_id' => ' IE005 ',
   //     'game_title' => 'Baldur\'s Gate II',
   //     'game_platform' => ' Windows ',
   //     'game_price' => '&euro; 6.00',
   //     'game_screen' => 'baldursgate_ss.png',
   //     'game_dev' => 'Interplay Ent Corp ',
   //     'game_dev_url' => ' http://www.interplay.com/ ',
   //     'game_desc' => ' Fantasy CRPG '
        ' IE005 ', 'Baldur\'s Gate II',' Windows ','&euro; 6.00','baldursgate_ss.png',
        'Interplay Ent Corp ', ' http://www.interplay.com/ ',' Fantasy CRPG ');

    $game_list[] = array(
   //     'game_id' => ' SEA004 ',
   //     'game_title' => ' The Sims 2 ',
   //     'game_platform' => ' Nintendo DS 2005 ',
  //      'game_price' => '&euro; 6.00',
  //      'game_screen' => 'sims2_ss.jpg',
  //      'game_dev' => ' Electronic Arts ',
  //      'game_dev_url' => ' http://www.ea.com/ ',
   //     'game_desc' => ' Life Simulation '
        ' SEA004 ', ' The Sims 2 ', ' Nintendo DS 2005 ','&euro; 6.00','sims2_ss.jpg',
        ' Electronic Arts ',' http://www.ea.com/ ',' Life Simulation ');

    $game_list[] = array(
   //     'game_id' => ' SEA007 ',
   //     'game_title' => ' The Sims 2 ',
   //     'game_platform' => ' GameCube 2005 ',
   //     'game_price' => '&euro; 6.00',
   //     'game_screen' => 'sims2_ss.jpg',
   //     'game_dev' => ' Electronic Arts ',
   //     'game_dev_url' => ' http://www.ea.com/ ',
   //     'game_desc' => ' Life Simulation '
        ' SEA007 ',' The Sims 2 ',' GameCube 2005 ','&euro; 6.00', 'sims2_ss.jpg',
        ' Electronic Arts ', ' http://www.ea.com/ ',' Life Simulation ');

    $game_list[] = array(
   //     'game_id' => ' PHMR02 ',
   //     'game_title' => ' Prince of Persia ',
   //     'game_platform' => ' Sega Master System 1992 ',
   //     'game_price' => '&euro; 26.00',
   //     'game_screen' => 'prince_persia_ss.png',
   //     'game_dev' => ' Broderbund Software [defunct]  ',
   //     'game_dev_url' => ' n/a ',
   //     'game_desc' => ' Fantasy '
        ' PHMR02 ',' Prince of Persia ',' Sega Master System 1992 ','&euro; 26.00',
        'prince_persia_ss.png', ' Broderbund Software [defunct]  ', ' n/a ',' Fantasy ');

    $game_list[] = array(
   //     'game_id' => ' PHMR75 ',
   //     'game_title' => ' Prince of Persia ',
   //     'game_platform' => ' Gameboy Color 1999 ',
   //     'game_price' => '&euro; 26.00',
   //     'game_screen' => 'prince_persia_ss.png',
   //     'game_dev' => ' Broderbund Software [defunct]  ',
   //     'game_dev_url' => ' n/a ',
   //     'game_desc' => ' Fantasy '
        ' PHMR75 ', ' Prince of Persia ',' Gameboy Color 1999 ','&euro; 26.00',
        'prince_persia_ss.png', ' Broderbund Software [defunct]  ', ' n/a ',' Fantasy ');

    $game_list[] = array(
   //     'game_id' => ' PHMR08 ',
   //     'game_title' => ' Prince of Persia ',
   //     'game_platform' => ' Amstrad PCP 1990 ',
   //     'game_price' => '&euro; 50.00',
   //     'game_screen' => 'prince_persia_ss.png',
   //     'game_dev' => ' Broderbund Software [defunct]  ',
   //     'game_dev_url' => ' n/a ',
   //     'game_desc' => ' Fantasy '
        ' PHMR08 ', ' Prince of Persia ',' Amstrad PCP 1990 ','&euro; 26.00',
        'prince_persia_ss.png', ' Broderbund Software [defunct]  ', ' n/a ',' Fantasy ');


    require_once __DIR__ . '/../templates/shop.php';

}
