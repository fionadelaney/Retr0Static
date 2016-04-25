<?php
/**
 * Created by PhpStorm.
 * User: vagrant
 * Date: 18/04/16
 * Time: 16:00
 */

namespace Phizzle;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

class User extends DatabaseTable
{
    const ROLE_MEMBER = 1;
    const ROLE_ADMIN = 2;

    private $id;
    private $username;
    private $password;

    /**
     * @return mixed
     */

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    /**
     * hash the password before storing
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
//        $this->password = $hashedPassword;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function canFindMatchingUsernameAndPassword($username, $password)
    {
        $user = $this->getOneByUsername($username);

        // if no record has this username, return FALSE
        if (null == $user){
            return false;
        }

        // hashed correct password
        $hashedStoredPassword = $user->getPassword();
        // FAKE IT FOR NOW - hash the database password so it can be verified
        //$hashedStoredPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);

        //session_start();
        //$_SESSION['user_pass'] = $hashedStoredPassword;


        // return whether or not hash of input password matched stored hash
        return password_verify($password, $hashedStoredPassword);
    }

    public static function getOneByUsername($username) {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM user WHERE username=:username';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }
}

/*

create table user( id UNSIGNED INT AUTO_INCREMENT, username VARCHAR(30), password VARCHAR(255), role TINY INT DEFAULT 1);

 */