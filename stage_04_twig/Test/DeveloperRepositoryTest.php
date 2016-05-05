<?php

namespace Phizzle\Test;

class DeveloperRepositoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Generate a fake Developer record with option to provide a name
     * @param string $name
     * @return int
     */
    public function setupFakeDeveloper($name = '')
    {
        // use the Faker\Factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();
        // set name
        $name = (!empty($name)) ? $name : $faker->company;
        // instantiate the developer object
        $obj = new \Phizzle\Developer;
        $obj->setName($name);
        $obj->setUrl($faker->url);
        $obj->setDescription($faker->sentences(3, true));
        // create Developer in the database
        $db = new \Phizzle\DeveloperRepository;
        // return the id for use in a test
        $id = $db::create($obj);

        return $id;
    }

    /**
     * Delete all records in the Developer database table
     */
    public function setupEmptyDeveloperTable()
    {
        // get database connection
        $db = new \Mattsmithdev\PdoCrud\DatabaseManager();
        $connection = $db->getDbh();
        // delete all records in the users table
        $statement = $connection->prepare('DELETE FROM developer');
        $statement->execute();
    }

    public function testCanCreateDeveloper()
    {
        // test expectation
        $expectedResult = 1;
        // empty the database table
        $this->setupEmptyDeveloperTable();
        // create a test user
        $temp = $this->setupFakeDeveloper();
        // get database connection
        $db = new \Mattsmithdev\PdoCrud\DatabaseManager();
        $connection = $db->getDbh();
        // execute the COUNT query
        $statement = $connection->query('SELECT COUNT(*) AS counted FROM developer');
        $num = $statement->fetch(\PDO::FETCH_OBJ);
        // check the result
        $result = $num->counted;
        // there should be 1 User object returned array
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanUpdateDeveloper()
    {
        // test expectation
        $expectedName = 'Abcdefghijklm123';
        // empty the database table
        $this->setupEmptyDeveloperTable();
        // create a developer
        $originalId = $this->setupFakeDeveloper();
        // get database connection
        $db = new \Phizzle\DeveloperRepository;
        // get the Developer object from the database
        $obj = $db->getOneById($originalId);
        // change the Firstname field value
        $obj->setName($expectedName);
        // update the database
        $result = $db->update($obj, $originalId);
        // there should be 1 row updated
        $this->assertEquals(1, $result);
        // get the updated Developer object from the database
        $updated = $db->getOneById($originalId);
        // get the Name field value
        $resultName = $updated->getName();
        // the Name strings should match
        $this->assertSame($expectedName, $resultName);
    }

    public function testCanGetAllDevelopers()
    {
        $faker = \Faker\Factory::create();
        // empty the database table
        $this->setupEmptyDeveloperTable();
        // generate random number of developers
        $expectedNum = $faker->randomDigitNotNull;
        for ($i = 0; $i < $expectedNum; $i++) {
            $temp = $this->setupFakeDeveloper();
        }
        // get all Developers in database
        $db = new \Phizzle\DeveloperRepository;
        $result = $db->getAll();
        // there should be a matching number of objects in the returned array
        $this->assertCount($expectedNum, $result);
    }

}