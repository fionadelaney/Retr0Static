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

    <form action="../public/index.php?action=login" method="post">

        <p>
            Username: <input type="text" name="username">
        </p>

        <p>
            Password: <input type="text" name="password">
        </p>
<br><br>
        <input type="submit" value="  login  ">
        <input type="submit" value="  Register  ">
<br><br>

    </form>


<?php
//-------------------------------------------
require_once TEMPLATE_DIRECTORY . '/footer.inc.php';

//  don't close the PHP tags


