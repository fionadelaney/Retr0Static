<?php
//-------------------------------------------------
// default style strings to empty, if not set
if (empty($indexLinkStyle)){
    $indexLinkStyle = '';
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

if ($isLoggedIn) {
    $logout = '<span id="logout">Logged in as: <strong><?= $username ?></strong>
    <a href="index.php?action=logout">(logout)</a></span>';
} else {
    $logout = '';
}
?>

<header id="header">
    <h1>Retr0Static | <?= $this->pageTitle = $pageTitle ?></h1>
    <?= $logout; ?>
</header>

<div align="center" id="nav">
    <nav>
    <ul>
    <li><a href="index.php" class="<?= $indexLinkStyle ?>">Home</a></li>
    <li><a href="index.php?action=screen" class="<?= $screenLinkStyle ?>">Screen</a></li>
    <li><a href="index.php?action=news" class="<?= $newsLinkStyle ?>">News</a></li>
    <li><a href="index.php?action=insight" class="<?= $insightLinkStyle ?>">Insight</a></li>
    <li><a href="index.php?action=shop" class="<?= $shopLinkStyle ?>">Shop</a></li>
    </ul>
    </nav>
</div>


