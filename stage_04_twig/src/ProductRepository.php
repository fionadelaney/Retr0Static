<?php

namespace Phizzle;

use \Phizzle\Product;
use \Mattsmithdev\PdoCrud\DatabaseManager;
use \Mattsmithdev\PdoCrud\DatatbaseUtility;

/**
 * Class ProductRepository
 * @package Phizzle
 */
class ProductRepository
{

    /**
     * @param \Phizzle\Product $product
     * @return int
     */
    public static function create(\Phizzle\Product $product)
    {
        // get database connection
        $db = new \Mattsmithdev\PdoCrud\DatabaseManager();
        $connection = $db->getDbh();

        // use DatatbaseUtility class to transform the User object to a usable array
        $objectAsArrayForSqlInsert = \Mattsmithdev\PdoCrud\DatatbaseUtility::objectToArrayLessId($product);

        // execute the INSERT query
        $statement = $connection->prepare('INSERT INTO product (product_id, title, platform, released, price, screen, developer_id, description) VALUES (:product_id, :title, :platform, :released, :price, :screen, :developer_id, :description)');
        $statement->execute($objectAsArrayForSqlInsert);

        // check the result
        $queryWasSuccessful = ($statement->rowCount() > 0);

        // return the new id
        return ($queryWasSuccessful) ? $connection->lastInsertId() : -1;
    }

    /**
     * @param \Phizzle\Product $product
     * @param int $id
     *
     * @return int
     */
    public function update(\Phizzle\Product $product, $id)
    {
        $db = new \Mattsmithdev\PdoCrud\DatabaseManager();
        $connection = $db->getDbh();
        // remove the id from the User object
        $objectAsArrayForSqlInsert = \Mattsmithdev\PdoCrud\DatatbaseUtility::objectToArrayLessId($product);
        // prepare the update fields
        $fields = array_keys($objectAsArrayForSqlInsert);
        // create the update field list
        $updateFieldList = \Mattsmithdev\PdoCrud\DatatbaseUtility::fieldListToUpdateString($fields);
        // create the UPDATE statement
        $sql = 'UPDATE product SET ' . $updateFieldList  . ' WHERE id=:id';
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
        $statement = $connection->prepare('DELETE FROM product WHERE id=:id');
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
        $statement = $connection->prepare('SELECT * FROM product');
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Phizzle\\Product');
        $statement->execute();

        // get the result set rows
        $developers = $statement->fetchAll();

        return $developers;
    }

    /**
     * @param int $developerId
     * @return array
     */
    public function getAllByDeveloper($developerId)
    {
        // get database connection
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // execute the SELECT query
        $statement = $connection->prepare('SELECT * FROM product WHERE developer_id=:developer_id');
        $statement->bindParam(':developer_id', $developerId, \PDO::PARAM_INT);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Phizzle\\Product');
        $statement->execute();

        // get the result set rows
        $developers = $statement->fetchAll();

        return $developers;
    }

    /**
     * @param int $id
     * @return \Phizzle\Product|null
     */
    public function getOneById($id)
    {
        // get database connection
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // execute the SELECT query
        $statement = $connection->prepare('SELECT * FROM product WHERE id=:id');
        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Phizzle\\Product');
        $statement->execute();

        return ($product = $statement->fetch()) ? $product : null;
    }

}