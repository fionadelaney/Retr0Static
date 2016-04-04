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
            'game_id' => 'BIG001',
            'game_title' => 'Bioshock',
            'game_platform' => 'XBox 360 2007',
            'game_price' => '&euro; 6.00',
            'game_screen' => 'bioshock_ss.jpg',
            'game_dev' => 'Irrational Games',
            'game_dev_url' => 'http://irrationalgames.com/tag/bioshock/',
            'game_desc' => 'Fantasy 1st person shooter'
        );

    $game_list[] = array(
        'game_id' => 'BIG002',
        'game_title' => 'Bioshock',
        'game_platform' => 'XBox 360 2007',
        'game_price' => '&euro; 6.00',
        'game_screen' => 'bioshock_ss.jpg',
        'game_dev' => 'Irrational Games',
        'game_dev_url' => 'http://irrationalgames.com/tag/bioshock/',
        'game_desc' => 'Fantasy 1st person shooter'
    );


    $content = '';


    foreach ($game_list as $game) {
        ob_start();
    ?>
<tr>
    <td> <?= $game['game_id'] ?> </td>
    <td> <?= $game['game_title'] ?> </td>
    <td> <?= $game['game_platform'] ?> </td>
    <td> <?= $game['game_price'] ?> </td>
    <td><img src="../public/images/<?= $game['game_screen'] ?>" alt="<?= $game['game_title'] ?> screen" width="100%" height="auto"></td>
    <td><a href="<?= $game['game_dev_url'] ?>" target="blank"><?= $game['game_dev'] ?></a></td>
    <td> <?= $game['game_desc'] ?> </td>
</tr>

<?php
        $table_row = ob_get_contents();
        ob_end_clean();
        $content .= $table_row;
    }

    echo $content;
}
