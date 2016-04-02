<?php

function aboutAction()
{
    $pageTitle = 'About Us';
    require_once __DIR__ . '/../templates/about.php';
}

function contactAction()
{
    $pageTitle = 'Screen';
    require_once __DIR__ . '/../templates/screen.php';
}

function contactAction()
{
    $pageTitle = 'News';
    require_once __DIR__ . '/../templates/news.php';
}

function contactAction()
{
    $pageTitle = 'Insight';
    require_once __DIR__ . '/../templates/insight.php';
}

function indexAction()
{
    $pageTitle = 'Home';
    require_once __DIR__ . '/../templates/index.php';
}

function listAction()
{
    $pageTitle = 'Shop';
    require_once __DIR__ . '/../templates/shop.php';
}

function sitemapAction()
{
    $pageTitle = 'Site Map';
    require_once __DIR__ . '/../templates/sitemap.php';
}
