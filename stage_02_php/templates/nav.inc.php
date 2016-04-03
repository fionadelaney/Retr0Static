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
<nav>
<div align="center" id="nav">

  <a href="index.php" class="<?= $indexLinkStyle ?>">Home</a>
  <a href="about.php?action=about"class="<?= $aboutLinkStyle ?>">About</a>
  <a href="screen.php?action=screen" class="<?= $screenLinkStyle ?>">Screen</a>
  <a href="news.php?action=news" class="<?= $newsLinkStyle ?>">News</a>
  <a href="insight.php?action=insight"class="<?= $insightLinkStyle ?>">Insight</a>
  <a href="shop.php?action=shop"class="<?= $shopLinkStyle ?>">Shop</a>

</div>
</nav>

