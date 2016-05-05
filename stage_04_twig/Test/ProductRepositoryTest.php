<?php

namespace Phizzle\Test;

class ProductRepositoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Generate a fake Product record with option to provide a title
     * @param string $title
     * @return int
     */
    public function setupFakeProduct($title = '')
    {
        // use the Faker\Factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();
        // set name
        $title = (!empty($title)) ? $title : $faker->company;
        // instantiate the Product object
        $obj = new \Phizzle\Product;
        $obj->setTitle($title);
        $obj->setProductId($faker->isbn13);
        $obj->setPlatform($faker->postcode);
        $obj->setReleased($faker->year);
        $obj->setPrice($faker->randomFloat(2,1,20));
        $obj->setScreen($faker->imageUrl());
        $obj->setDeveloperId($faker->randomDigitNotNull);
        $obj->setDescription($faker->sentences(3, true));
        // create Product object in the database
        $db = new \Phizzle\ProductRepository;
        // return the id for use in a test
        $id = $db::create($obj);

        return $id;
    }

    /**
     * Delete all records in the Product database table
     */
    public function setupEmptyProductTable()
    {
        // get database connection
        $db = new \Mattsmithdev\PdoCrud\DatabaseManager();
        $connection = $db->getDbh();
        // delete all records in the users table
        $statement = $connection->prepare('DELETE FROM product');
        $statement->execute();
    }

    public function testCanCreateProduct()
    {
        // test expectation
        $expectedResult = 1;
        // empty the database table
        $this->setupEmptyProductTable();
        // create a test Product object
        $temp = $this->setupFakeProduct();
        // get database connection
        $db = new \Mattsmithdev\PdoCrud\DatabaseManager();
        $connection = $db->getDbh();
        // execute the COUNT query
        $statement = $connection->query('SELECT COUNT(*) AS counted FROM product');
        $num = $statement->fetch(\PDO::FETCH_OBJ);
        // check the result
        $result = $num->counted;
        // there should be 1 object returned array
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanUpdateProduct()
    {
        // test expectation
        $expectedTitle = 'Abcdefghijklm123';
        // empty the database table
        $this->setupEmptyProductTable();
        // create a Product object
        $originalId = $this->setupFakeProduct();
        // get database connection
        $db = new \Phizzle\ProductRepository;
        // get the Productr object from the database
        $obj = $db->getOneById($originalId);
        // change the Title field value
        $obj->setTitle($expectedTitle);
        // update the database
        $result = $db->update($obj, $originalId);
        // there should be 1 row updated
        $this->assertEquals(1, $result);
        // get the updated Product object from the database
        $updated = $db->getOneById($originalId);
        // get the Title field value
        $resultTitle = $updated->getTitle();
        // the Title strings should match
        $this->assertSame($expectedTitle, $resultTitle);
    }

    public function testCanGetAllProducts()
    {
        $faker = \Faker\Factory::create();
        // empty the database table
        $this->setupEmptyProductTable();
        // generate random number of Product objects
        $expectedNum = $faker->randomDigitNotNull;
        for ($i = 0; $i < $expectedNum; $i++) {
            $temp = $this->setupFakeProduct();
        }
        // get all Product objects in the database
        $db = new \Phizzle\ProductRepository;
        $result = $db->getAll();
        // there should be a matching number of objects in the returned array
        $this->assertCount($expectedNum, $result);
    }

}