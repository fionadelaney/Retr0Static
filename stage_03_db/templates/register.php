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
            First Name: <input type="text" name=firstname">
        </p>

        <p>
            Last Name: <input type="text" name="lastname">
        </p>

        <p>
            Email: <input type="text" name="email">
        </p>

        <p>
            Username: <input type="text" name="username">
        </p>

        <p>
            Password: <input type="text" name="password">
        </p>

        <p>
            Confirm password: <input type="text" name="password">
        </p>

        <br><br>

        <input type="submit" value="login">

        <br><br>


    </form>


<?php
//-------------------------------------------
require_once TEMPLATE_DIRECTORY . '/footer.inc.php';

//  don't close the PHP tags




