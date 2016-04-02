<?php
require_once __DIR__ . '/../templates/header1.inc.php';
//-------------------------------------------

//<!DOCTYPE html>
//<html lang="en">
//<head>
	//<meta charset="utf-8">
	//<title>Retr0Static | Shop</title>
   // <style>
      //  @import "css/body.css";
      //  @import "css/nav.css";
      //  @import "css/head_foot.css";
   // </style>

//</head>
//<body>

?>
<div id="header">
<h1>Retr0Static | Shop</h1>
</div>

<div align="center" id="nav">

  <a href="index.php" class="button">Home</a>
  <a href="about.php?action=about"class="button">About</a>
  <a href="screen.php?action=screen" class="button">Screen</a>
  <a href="news.php?action=news" class="button">News</a>
  <a href="insight.php?action=insight"class="button">Insight</a>
  <a href="shop.php?action=shop"class="current_page">Shop</a>
</div>


<div id="aside_shop">
<p>
<a href="Login.html"><img src="buttons/key.png" alt="Login Button" width="80%" height="auto"></a>
<br>
</p>
<br>
</div>

<div id="section_shop">

<blockquote>
<p>  <h2><strong>Secondhand video games for all platforms</strong></h2>
     Sci-fi, historical, fantasy, geo-political, thriller, <br>
     shoot-em-up, chill-out, car-chase, quest and more...
</p>  
</blockquote>


<!-- start table for displaying Game details -->
<h2>Games</h2>

<table>
    <tr>
        <th> ID </th>
        <th> Title </th>
        <th> Platform </th>
        <th> &euro; </th>       
        <th> Screengrab </th>
        <th> Dev </th>
    	<th> Description </th>
    </tr>

    <!-- ********************* HTML for dvd items ****************** -->
<!--
    //   	0 - 15 - 40 - 55 - 70 - 85 - 100 %age
    // 	      .5   1    2    3    4    5     stars
-->
    <tr>
        <td> BIG001 </td>
        <td> Bioshock </td>
        <td> XBox 360 2007 </td>
        <td>&euro; 6.00 </td>
        <td><img src="images/bioshock_ss.jpg" alt="5 star" width="100%" height="auto"></td>
        <td><a href="http://irrationalgames.com/tag/bioshock/" target="blank">Irrational Games</a></td>
    	<td> Fantasy 1st person shooter </td>
    </tr>
    
        <tr>
        <td> BIG002 </td>
        <td> Bioshock </td>
        <td> PS3 2008 </td>
        <td>&euro; 6.00 </td>
        <td><img src="images/bioshock_ss.jpg" alt="5 star" width="100%" height="auto"></td>
        <td><a href="http://irrationalgames.com/tag/bioshock/" target="blank">Irrational Games</a></td>
    	<td> Fantasy 1st person shooter </td>
    </tr>
    
        <tr>
        <td> BIG006 </td>
        <td> Bioshock </td>
        <td> Windows 2007 </td>
        <td>&euro; 6.00 </td>
        <td><img src="images/bioshock_ss.jpg" alt="5 star" width="100%" height="auto"></td>
        <td><a href="http://irrationalgames.com/tag/bioshock/" target="blank">Irrational Games</a></td>
    	<td> Fantasy 1st person shooter </td>
    </tr>

    <tr>
        <td> CDG003 </td>
        <td>Chili Con Carnage</td>
        <td> PSP 2007 </td>
        <td>&euro; 6.00</td>
        <td><img src="images/Chili_Con_Carnage.jpg" alt="4 star" width="100%" height="auto"></td>
        <td> Deadline Games [Defunct] </td>
    	<td> Comedy Action 3rd person shooter </td>
    </tr>

    <tr>
        <td> BIE005</td>
        <td> Baldur's Gate II </td>
        <td> Windows </td>
        <td>&euro; 6.00 </td>
        <td><img src="images/baldursgate_ss.png" alt="3 star" width="100%" height="auto"></td>
        <td><a href="http://www.interplay.com/" target="blank">Interplay Ent Corp</a></td>
    	<td> Fantasy CRPG </td> 
    </tr>

    <tr>
        <td> SEA004 </td>
        <td> The Sims 2</td>
        <td> Nintendo DS 2005 </td>
        <td>&euro; 6.00</td>
        <td><img src="images/sims2_ss.jpg" alt="3 star" width="100%" height="auto"></td>
        <td> <a href="http://www.ea.com/" target="blank"> Electronic Arts</a></td> 
    	<td> Life Simulation </td>
    </tr>

    <tr>
        <td> SEA003 </td>
        <td> The Sims 2</td>
        <td> GameCube 2005</td>
        <td>&euro; 6.00</td>
        <td><img src="images/sims2_ss.jpg" alt="3 star" width="100%" height="auto"></td>
        <td> <a href="http://www.ea.com/" target="blank"> Electronic Arts</a></td> 
    	<td> Life Simulation </td>
    </tr>


    <tr>
        <td> PHMR02</td>
        <td> Prince of Persia </td>
        <td> Sega Master System 1992 </td>
        <td>&euro; 26.00</td>
        <td><img src="images/prince_persia_ss.png" alt="5 star" width="100&" height="auto"></td>
        <td> dev website </td>
    	<td> Fantasy </td>
    </tr>
    
    
    <tr>
        <td> PHMR75</td>
        <td> Prince of Persia </td>
        <td> Gameboy Color 1999</td>
        <td>&euro; 26.00</td>
        <td><img src="images/prince_persia_ss.png" alt="5 star" width="100&" height="auto"></td>
        <td> Broderbund Software [defunct] </td>
    	<td> Fantasy </td>
    </tr>
    
    
    <tr>
        <td> PHMR08 </td>
        <td> Prince of Persia </td>
        <td> Amstrad PCP 1990 </td>
        <td>&euro; 50.00</td>
        <td><img src="images/prince_persia_ss.png" alt="5 star" width="100&" height="auto"></td>
        <td> Broderbund Software [defunct] </td>
    	<td> Fantasy </td>
    </tr>
    
</table>

</div>

<div id="main_shop">

<p>
<img src="assets1/Retr0Static.gif" alt="logo gif" width="100%" height="auto">
</p>

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
