<?php
/**
 * Created by PhpStorm.
 * User: vagrant
 * Date: 17/04/16
 * Time: 20:19
 */
//------------------------------------
require_once TEMPLATE_DIRECTORY . '/header1.inc.php';
require_once TEMPLATE_DIRECTORY . '/nav.inc.index.php';
//-------------------------------------

?>

<form action="../public/index.php?action=login" method="post">

    <p>
        username: <input type="text" name="username">
    </p>

    <p>
        password: <input type="text" name="password">
    </p>

    <input type="submit" value="login">
</form>


<?php
//-------------------------------------------
require_once TEMPLATE_DIRECTORY . '/footer.inc.php';

//  don't close the PHP tags




