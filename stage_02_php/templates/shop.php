<?php
require_once __DIR__ . '/../templates/header1.inc.php';
require_once __DIR__ . '/../templates/nav.inc.php';
//-------------------------------------------

?>

<div id="aside_shop">
<p>
<a href="Login.html"><img src="../public/buttons/key.png" alt="Login Button" width="80%" height="auto"></a>
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

    <?php
    //require_once ;
    $game_list = shopListingAction();

    $content = '';

    while ($product = current($game_list)) {
        ob_start();

        ?>
        <tr>
            <td> <?= $product->getGameId() ?> </td>
            <td> <?= $product->getGameTitle() ?> </td>
            <td> <?= $product->getGamePlatform() ?> </td>
            <td> <?= $product->getGamePrice() ?> </td>
            <td><img src="../public/images/<?= $product->getGameScreen() ?>" alt="<?= $product->getGameTitle() ?> screen" width="100%" height="auto"></td>
            <td><a href="<?= $product->getGameDevUrl() ?>" target="blank"><?= $product->getGameDev() ?></a></td>
            <td> <?= $product->getGameDesc() ?> </td>
        </tr>

        <?php
        $table_row = ob_get_contents();
        ob_end_clean();
        $content .= $table_row;
        next($game_list);
    }

    echo $content;


    ?>

</table>

</div>

<div id="main_shop">

<p>
<img src="../public/assets1/Retr0Static.gif" alt="logo gif" width="100%" height="auto">
</p>

</div>

<?php
//-------------------------------------------
require_once __DIR__ . '/../templates/footer.inc.php';

//  don't close the PHP tags

