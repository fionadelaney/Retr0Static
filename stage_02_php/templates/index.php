<?php
require_once __DIR__ . '/../templates/header1.inc.php';
//-------------------------------------------

//<!DOCTYPE html>
//<html lang="en">
//<head>
	//<meta charset="utf-8">
	//<title>Retr0Static | Home</title>
   // <style>
      //  @import "css/body.css";
      //  @import "css/nav.css";
      //  @import "css/head_foot.css";
   // </style>

//</head>
//<body>

?>
<div id="header">
<h1>Retr0Static | Home</h1>
</div>

<div align="center" id="nav">

  <a href="index.php" class="current_page">Home</a>
  <a href="about.php?action=about"class="button">About</a>
  <a href="screen.php?action=screen" class="button">Screen</a>
  <a href="news.php?action=news" class="button">News</a>
  <a href="insight.php?action=insight"class="button">Insight</a>
  <a href="shop.php?action=shop"class="button">Shop</a>
</div>



<div id="aside_index">
<p>
	<a href="Shop.php?action=shop"><img src="buttons/grunge_cart.png" alt="Shopping Cart" width="90%" height="auto"></a>
<br>

</p>
<br>
</div>

<div id="section_index">

<img src="images/246bioshock.jpg" alt="Bioshock" width="100%" height="100%">

<aside><br><strong>GAME OF THE WEEK: </strong><em> Irrational Games</em><strong> BIOSHOCK </strong><em>  2007</em><br></aside>

<p>
<a href="https://www.facebook.com/retr0static/"class="button"target="_blank">
<img src="buttons/social-facebook-button-blue-icon.png" alt="Facebook Button" width="5%" height="5%"></a>
</p>
</div>

<div id="main_index">

</div>

<?php
//-------------------------------------------
require_once __DIR__ . '/../templates/footer.inc.php';

//  don't close the PHP tags


//<div id="footer">
//<p>
//Copyright@ Fiona Delaney 2015	<a href="sitemap.php?action=sitemap" class="footerbutton">Sitemap</a></p>
//</div>

//</body>
//</html>