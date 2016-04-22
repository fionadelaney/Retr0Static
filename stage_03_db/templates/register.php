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

    <form action="../public/index.php?action=register" method="post">

        <p>
            First Name: <br><input type="text" name=firstname" id="firstname" size="30" maxlength="45" required><br>
        </p>

        <p>
            Last Name: <br><input type="text" name="lastname" id="lastname" size="30" maxlength="45" required><br>
        </p>

        <p>
            Email: <br><input type="text" name="email" id="email" size="30" maxlength="100" required><br>
        </p>

        <p>
            Username: <br><input type="text" name="username" id="username" size="30" maxlength="45" required><br>
        </p>

        <p>
            Password: <br><input type="text" name="password" id="password" size="30" maxlength="45" required><br>
        </p>

        <p>
            Confirm password: <br><input type="text" name="password" id="passwordConfirm" size="30" maxlength="45" required><br>
        </p>

        <br><br>

        <input type="submit" value="login">

        <br><br>


    </form>


<?php
//-------------------------------------------
require_once TEMPLATE_DIRECTORY . '/footer.inc.php';

//  don't close the PHP tags




