<?php
/**
 * Created by PhpStorm.
 * User: vagrant
 * Date: 29/04/16
 * Time: 13:44
 */

//------------------------------------
require_once TEMPLATE_DIRECTORY . '/header1.inc.php';
require_once TEMPLATE_DIRECTORY . '/nav.inc.index.php';
//-------------------------------------

?>

    <form action="../public/index.php?action=admin" method="post">

        <p>
         <h1> Users Admin Page</h1>
        </p>


        <table>
            <tr>
                <th> ID </th>
                <th> First name </th>
                <th> Last name </th>
                <th> Email </th>
                <th> Username </th>
                <th> Role </th>
            </tr>

            <tr>
                <td></td>
            </tr>

            <p>
                Search for:<br><input type="text" name="email" value="url"> email address<br>
              <br><input type="text" name="username" value="username"><br>

            </p>
        <p>
            <br><input type="radio" name="crud_select" value="create">Create<br>
        </p>

        <p>
            <br><input type="radio" name="crud_select" value="destroy">Destroy<br>
        </p>

        <p>
            <br><input type="radio" name="crud_select" value="ammend">Ammend<br>
        </p>

        <br><br>

        <input type="submit" value="login">

        <br><br>


    </form>


<?php
//-------------------------------------------
require_once TEMPLATE_DIRECTORY . '/footer.inc.php';

//  don't close the PHP tags




