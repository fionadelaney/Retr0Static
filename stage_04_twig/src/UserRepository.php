<?php

namespace Phizzle;

use \Phizzle\User;
use \Mattsmithdev\PdoCrud\DatabaseManager;
use \Mattsmithdev\PdoCrud\DatatbaseUtility;

class UserRepository
{

    /**
     * @param \Phizzle\User $user
     * @return int
     */
    public static function create(User $user)
    {
        // get database connection
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // use DatatbaseUtility class to transform the User object to a usable array
        $objectAsArrayForSqlInsert = DatatbaseUtility::objectToArrayLessId($user);

        // execute the INSERT query
        $statement = $connection->prepare('INSERT INTO user (firstname, lastname, email, username, password, role) VALUES (:firstname, :lastname, :email, :username, :password, :role)');
        $statement->execute($objectAsArrayForSqlInsert);

        // check the result
        $queryWasSuccessful = ($statement->rowCount() > 0);

        // return the new id
        return ($queryWasSuccessful) ? $connection->lastInsertId() : -1;
    }

    /**
     * @param \Phizzle\User $user
     * @param int $id
     *
     * @return int
     */
    public function update(User $user, $id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();
        // remove the id from the User object
        $objectAsArrayForSqlInsert = DatatbaseUtility::objectToArrayLessId($user);
        // prepare the update fields
        $fields = array_keys($objectAsArrayForSqlInsert);
        // create the update field list
        $updateFieldList = DatatbaseUtility::fieldListToUpdateString($fields);
        // create the UPDATE statement
        $sql = 'UPDATE user SET ' . $updateFieldList  . ' WHERE id=:id';
        // prepare the SQL statement
        $statement = $connection->prepare($sql);
        // add 'id' to parameters array
        $objectAsArrayForSqlInsert['id'] = $id;

        $queryWasSuccessful = $statement->execute($objectAsArrayForSqlInsert);

        return $queryWasSuccessful;
    }


    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        // get database connection
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // execute the DELETE query
        $statement = $connection->prepare('DELETE FROM user WHERE id=:id');
        $statement->bindParam(':id', $id, \PDO::PARAM_INT);

        // check the result
        $queryWasSuccessful = $statement->execute();

        // return the result
        return $queryWasSuccessful;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        // get database connection
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // execute the SELECT query
        $statement = $connection->prepare('SELECT * FROM user');
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Phizzle\\User');
        $statement->execute();

        // get the result set rows
        $users = $statement->fetchAll();

        return $users;
    }

    /**
     * @param $id
     * @return \Phizzle\User|null
     */
    public function getOneById($id)
    {
        // get database connection
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // execute the SELECT query
        $statement = $connection->prepare('SELECT * FROM user WHERE id=:id');
        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Phizzle\\User');
        $statement->execute();

        return ($user = $statement->fetch()) ? $user : null;
    }

    /**
     * @param $username
     * @return \Phizzle\User|null
     */
    public function getOneByUsername($username)
    {
        // get database connection
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // execute the SELECT query
        $statement = $connection->prepare('SELECT * FROM user WHERE username=:username');
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Phizzle\\User');
        $statement->execute();

        return ($user = $statement->fetch()) ? $user : null;
    }

    /**
     * @param $searchText
     * @return array
     */
    public function searchByUsernameOrEmail($searchText)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // wrap wildcard '%' around the search text for the SQL query
        $searchText = '%' . $searchText . '%';

        $statement = $connection->prepare('SELECT * FROM user WHERE (username LIKE :searchText) or (email LIKE :searchText)');
        $statement->bindParam(':searchText', $searchText, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Phizzle\\User');
        $statement->execute();

        $users = $statement->fetchAll();

        return $users;
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function canFindMatchingUsernameAndPassword($username, $password)
    {
        $user = $this->getOneByUsername($username);

        // if no record has this username, return FALSE
        if (null == $user) {
            return false;
        }

        // hashed correct password
        $hashedStoredPassword = $user->getPassword();

        // return whether or not hash of input password matched stored hash
        return password_verify($password, $hashedStoredPassword);
    }
}