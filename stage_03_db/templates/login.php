<?php
/**
 * Created by PhpStorm.
 * User: vagrant
 * Date: 19/04/16
 * Time: 13:57
 */

//------------------------------------
require_once TEMPLATE_DIRECTORY . '/header1.inc.php';
require_once TEMPLATE_DIRECTORY . '/nav.inc.index.php';
//-------------------------------------

?>

    <form action="index.php?action=login" method="post">
        <!-- <?= $_SESSION['redirect']; ?> // -->

        <p>
            Username: <br><input type="text" name="username">
        </p>

        <p>
            Password: <br><input type="text" name="password">
        </p>
<br><br>
        <input type="submit" value="  login  ">
        <input type="submit" value="  Register ">

        // 	<a href="index.php?action=login"><input type="submit" value="login"></a>
<br><br>

    </form>


<?php
//-------------------------------------------
require_once TEMPLATE_DIRECTORY . '/footer.inc.php';

//  don't close the PHP tags


