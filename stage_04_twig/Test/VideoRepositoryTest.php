<?php

namespace Phizzle\Test;

class VideoRepositoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Generate a fake Video record with option to provide a name
     * @param string $title
     * @return int
     */
    public function setupFakeVideo($title = '')
    {
        // use the Faker\Factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();
        // set name
        $title = (!empty($title)) ? $title : $faker->company;
        // instantiate the Video object
        $obj = new \Phizzle\Video;
        $obj->setTitle($title);
        $obj->setUrl($faker->url);
        $obj->setScreen($faker->imageUrl());
        $obj->setDescription($faker->sentences(3, true));
        // create Video record in the database
        $db = new \Phizzle\VideoRepository;
        // return the id for use in a test
        $id = $db::create($obj);

        return $id;
    }

    /**
     * Delete all records in the Video database table
     */
    public function setupEmptyVideoTable()
    {
        // get database connection
        $db = new \Mattsmithdev\PdoCrud\DatabaseManager();
        $connection = $db->getDbh();
        // delete all records in the users table
        $statement = $connection->prepare('DELETE FROM video');
        $statement->execute();
    }

    public function testCanCreateVideo()
    {
        // test expectation
        $expectedResult = 1;
        // empty the database table
        $this->setupEmptyVideoTable();
        // create a test user
        $temp = $this->setupFakeVideo();
        // get database connection
        $db = new \Mattsmithdev\PdoCrud\DatabaseManager();
        $connection = $db->getDbh();
        // execute the COUNT query
        $statement = $connection->query('SELECT COUNT(*) AS counted FROM video');
        $num = $statement->fetch(\PDO::FETCH_OBJ);
        // check the result
        $result = $num->counted;
        // there should be 1 User object returned array
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanUpdateVideo()
    {
        // test expectation
        $expectedTitle = 'Abcdefghijklm123';
        // empty the database table
        $this->setupEmptyVideoTable();
        // create a developer
        $originalId = $this->setupFakeVideo();
        // get database connection
        $db = new \Phizzle\VideoRepository;
        // get the Video object from the database
        $obj = $db->getOneById($originalId);
        // change the Title field value
        $obj->setTitle($expectedTitle);
        // update the database
        $result = $db->update($obj, $originalId);
        // there should be 1 row updated
        $this->assertEquals(1, $result);
        // get the updated Video object from the database
        $updated = $db->getOneById($originalId);
        // get the Title field value
        $resultTitle = $updated->getTitle();
        // the Title strings should match
        $this->assertSame($expectedTitle, $resultTitle);
    }

    public function testCanGetAllVideos()
    {
        $faker = \Faker\Factory::create();
        // empty the database table
        $this->setupEmptyVideoTable();
        // generate random number of developers
        $expectedNum = $faker->randomDigitNotNull;
        for ($i = 0; $i < $expectedNum; $i++) {
            $temp = $this->setupFakeVideo();
        }
        // get all Videos in database
        $db = new \Phizzle\VideoRepository;
        $result = $db->getAll();
        // there should be a matching number of objects in the returned array
        $this->assertCount($expectedNum, $result);
    }

}