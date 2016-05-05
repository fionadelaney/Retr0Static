<?php

namespace Phizzle;

use \Phizzle\Video;
use \Mattsmithdev\PdoCrud\DatabaseManager;
use \Mattsmithdev\PdoCrud\DatatbaseUtility;

/**
 * Class VideoRepository
 * @package Phizzle
 */
class VideoRepository
{

    /**
     * @param \Phizzle\Video $video
     * @return int
     */
    public static function create(\Phizzle\Video $video)
    {
        // get database connection
        $db = new \Mattsmithdev\PdoCrud\DatabaseManager();
        $connection = $db->getDbh();

        // use DatatbaseUtility class to transform the User object to a usable array
        $objectAsArrayForSqlInsert = \Mattsmithdev\PdoCrud\DatatbaseUtility::objectToArrayLessId($video);

        // execute the INSERT query
        $statement = $connection->prepare('INSERT INTO video (title, screen, url, description) VALUES (:title, :screen, :url, :description)');
        $statement->execute($objectAsArrayForSqlInsert);

        // check the result
        $queryWasSuccessful = ($statement->rowCount() > 0);

        // return the new id
        return ($queryWasSuccessful) ? $connection->lastInsertId() : -1;
    }

    /**
     * @param \Phizzle\Video $video
     * @param int $id
     *
     * @return int
     */
    public function update(\Phizzle\Video $video, $id)
    {
        $db = new \Mattsmithdev\PdoCrud\DatabaseManager();
        $connection = $db->getDbh();
        // remove the id from the User object
        $objectAsArrayForSqlInsert = \Mattsmithdev\PdoCrud\DatatbaseUtility::objectToArrayLessId($video);
        // prepare the update fields
        $fields = array_keys($objectAsArrayForSqlInsert);
        // create the update field list
        $updateFieldList = \Mattsmithdev\PdoCrud\DatatbaseUtility::fieldListToUpdateString($fields);
        // create the UPDATE statement
        $sql = 'UPDATE video SET ' . $updateFieldList  . ' WHERE id=:id';
        // prepare the SQL statement
        $statement = $connection->prepare($sql);
        // add 'id' to parameters array
        $objectAsArrayForSqlInsert['id'] = $id;

        $queryWasSuccessful = $statement->execute($objectAsArrayForSqlInsert);

        return $queryWasSuccessful;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        // get database connection
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // execute the DELETE query
        $statement = $connection->prepare('DELETE FROM video WHERE id=:id');
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
        $statement = $connection->prepare('SELECT * FROM video');
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Phizzle\\Video');
        $statement->execute();

        // get the result set rows
        $videos = $statement->fetchAll();

        return $videos;
    }

    /**
     * @param int $id
     * @return \Phizzle\Video|null
     */
    public function getOneById($id)
    {
        // get database connection
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // execute the SELECT query
        $statement = $connection->prepare('SELECT * FROM video WHERE id=:id');
        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Phizzle\\Video');
        $statement->execute();

        return ($video = $statement->fetch()) ? $video : null;
    }

}