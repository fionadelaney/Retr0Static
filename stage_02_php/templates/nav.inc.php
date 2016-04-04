<?php
//-------------------------------------------------
// default style strings to empty, if not set
if (empty($indexLinkStyle)){
    $indexLinkStyle = '';
}
if (empty($aboutLinkStyle)){
    $aboutLinkStyle = '';
}
if (empty($screenLinkStyle)){
    $screenLinkStyle = '';
}
if (empty($newsLinkStyle)){
    $newsLinkStyle = '';
}
if (empty($insightLinkStyle)){
    $insightLinkStyle = '';
}
if (empty($shopLinkStyle)){
    $shopLinkStyle = '';
}
if (empty($sitemapLinkStyle)){
    $sitemapLinkStyle = '';
}


/* here is the same logic, using the '?' ternary operator and 'isset()' function
$indexLinkStyle = isset($homeLinkStyle) ? $homeLinkStyle : '';
$aboutLinkStyle = isset($aboutLinkStyle) ? $aboutLinkStyle : '';
$listLinkStyle = isset($listLinkStyle) ? $listLinkStyle : '';
$contactLinkStyle = isset($contactLinkStyle) ? $contactLinkStyle : '';
$sitemapLinkStyle = isset($sitemapLinkStyle) ? $sitemapLinkStyle : '';
*/
//-------------------------------------------------
?>

<div id="header">
    <h1>Retr0Static | <?= $pageTitle ?></h1>
</div>

<div align="center" id="nav">
    <nav>
    <ul>
    <li><a href="index.php" class="<?= $indexLinkStyle ?>">Home</a></li>
    <li><a href="index.php?action=about"class="<?= $aboutLinkStyle ?>">About</a></li>
    <li><a href="index.php?action=screen" class="<?= $screenLinkStyle ?>">Screen</a></li>
    <li><a href="index.php?action=news" class="<?= $newsLinkStyle ?>">News</a></li>
    <li><a href="index.php?action=insight"class="<?= $insightLinkStyle ?>">Insight</a></li>
    <li><a href="index.php?action=shop"class="<?= $shopLinkStyle ?>">Shop</a></li>
    </ul>
    </nav>
</div>


