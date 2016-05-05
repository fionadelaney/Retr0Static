<?php

namespace Phizzle\Test;

class DeveloperTest extends \PHPUnit_Framework_TestCase
{

    public function testNameIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalName = $faker->words(3);
        $expectedResult = $originalName;
        // instantiate developer object
        $obj = new \Phizzle\Developer;
        // set the developer's name
        $obj->setName( $originalName );
        // get the name
        $result = $obj->getName();
        // result should equal the expectation
        $this->assertEquals($expectedResult, $result);
    }

    public function testUrlIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalUrl = $faker->url;
        $expectedResult = $originalUrl;
        // instantiate developer object
        $obj = new \Phizzle\Developer;
        // set the developer's url
        $obj->setUrl( $originalUrl );
        // get the url
        $result = $obj->getUrl();
        // result should equal the expectation
        $this->assertEquals($expectedResult, $result);
    }

    public function testDescriptionIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalDescription = $faker->realText(200);
        // instantiate developer object
        $obj = new \Phizzle\Developer;
        // set the developer description
        $obj->setDescription( $originalDescription );
        // get the description
        $result = $obj->getDescription();
        // result should equal the expectation
        $this->assertEquals($originalDescription, $result);
    }

    public function testCanGetId()
    {
        // setup test developer
        $faker = \Faker\Factory::create();
        $obj = new \Phizzle\Developer;
        $obj->setName($faker->company);
        $obj->setUrl($faker->url);
        $obj->setDescription($faker->sentences(3, true));
        // create Developer in database
        $db = new \Phizzle\DeveloperRepository;
        // returned id is the test expectation
        $originalId = $db::create($obj);
        // get Developer object from database
        $developer = $db->getOneById($originalId);
        // get the id from the Developer object
        $result = $developer->getId();
        // result should equal the expectation
        $this->assertEquals($result, $originalId);
        // delete Developer from the database
        $deleted = $db->delete($result);
        // A single row should have been deleted from the database table
        $this->assertEquals(1, $deleted);
    }

}