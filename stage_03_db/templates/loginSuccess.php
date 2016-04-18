<?php
/**
 * Created by PhpStorm.
 * User: vagrant
 * Date: 18/04/16
 * Time: 15:22
 */

//------------------------------------
require_once TEMPLATE_DIRECTORY . '/header1.inc.php';
require_once TEMPLATE_DIRECTORY . '/nav.inc.index.php';
//-------------------------------------

?>

    <h1>successful login</h1>

        <p>
            Well done <?= $username ?>, you have successfully logged in to the system.
        </p>


<?php
//-------------------------------------------
require_once TEMPLATE_DIRECTORY . '/footer.inc.php';

//  don't close the PHP tags




