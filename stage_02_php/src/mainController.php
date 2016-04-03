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
