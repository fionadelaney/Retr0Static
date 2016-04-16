<?php
namespace Phizzle;
/**
 * Created by PhpStorm.
 * User: vagrant
 * Date: 13/04/16
 * Time: 10:30
 */
class Database
{

    // database handle
    private $_dbh;

    /**
     * Database constructor.
     * @param $settings array(hostname, dbname, user, pass)
     */
    public function __construct($settings)
    {
        try {
            // use persistent database connections
            $options = array(PDO::ATTR_PERSISTENT => true);
            $dsn = 'mysql:host=' . $settings['hostname'] . ';dbname=' . $settings['dbname'];
            $this->_dbh = new PDO($dsn, $settings['user'], $settings['pass'], $options);
            // set the database column names to lower case
            $this->_dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        } catch (PDOException $e) {
            print '<p class="error">Database Error!: ' . $e->getMessage() . '</p>';
            die();
        }
    }

    /**
     * Get a single record from the database
     * @param $sql
     * @param $values
     * @return mixed
     */
    public function getOneRecord($sql, $values) {

        $statement = $this->_dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        try {
            $statement->execute($values);
            /*
             * should return an associative array
             * http://php.net/manual/en/pdostatement.fetch.php
             */
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print '<p class="error">Database Error!: ' . $e->getMessage() . '</p>';
            die();
        }
        return $result;

    }

    /**
     * method to get all records
     * @param $sql sql statement
     * @param $params field headers
     * @return array records
     */
    public function getAllRecords($sql, $params) {

        $statement = $this->_dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        try {
            $statement->execute($params);
            /*
             * should return an associative array
             * http://php.net/manual/en/pdostatement.fetchall.php
             */
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print '<p class="error">Database Error!: ' . $e->getMessage() . '</p>';
            die();
        }
        return $results;

    }

    /**
     * function to update / edit / delete database
     *
     * @param $sql
     * @param $params
     * @return bool
     */
    public function executeQuery($sql, $params) {

        $statement = $this->_dbh->prepare($sql);
        try {
            $statement->execute($params);
            /*
             * should return true/false
             * http://php.net/manual/en/pdostatement.execute.php
             */
            $result = $statement->execute($params);
        } catch (PDOException $e) {
            print '<p class="error">Database Error!: ' . $e->getMessage() . '</p>';
            die();
        }
        return $result;

    }



}