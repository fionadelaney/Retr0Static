<?php

namespace Phizzle\Test;

class VideoTest extends \PHPUnit_Framework_TestCase
{

    public function testTitleIsSet()
    {
        // test expectations
        $originalTitle = 'A test title';
        $expectedResult = 'A test title';
        // instantiate video
        $user = new \Phizzle\Video;
        // set the video title
        $user->setTitle( $originalTitle );
        // get the video title
        $result = $user->getTitle();
        // result should equal the expectation
        $this->assertEquals($expectedResult, $result);
    }

    public function testUrlIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalUrl = $faker->url;
        $expectedResult = $originalUrl;
        // instantiate video
        $user = new \Phizzle\Video;
        // set the video url
        $user->setUrl( $originalUrl );
        // get the video url
        $result = $user->getUrl();
        // result should equal the expectation
        $this->assertEquals($expectedResult, $result);
    }

    public function testScreenIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalScreen = $faker->url;
        $expectedResult = $originalScreen;
        // instantiate video
        $user = new \Phizzle\Video;
        // set the screen url
        $user->setScreen( $originalScreen );
        // get the screen url
        $result = $user->getScreen();
        // result should equal the expectation
        $this->assertEquals($expectedResult, $result);
    }

    public function testDescriptionIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalDescription = $faker->realText(200);
        // instantiate video
        $user = new \Phizzle\Video;
        // set the video description
        $user->setDescription( $originalDescription );
        // get the video description
        $result = $user->getDescription();
        // result should equal the expectation
        $this->assertEquals($originalDescription, $result);
    }


    public function testCanGetId()
    {
        // setup test video object
        $faker = \Faker\Factory::create();
        $obj = new \Phizzle\Video;
        $obj->setTitle($faker->company);
        $obj->setUrl($faker->url);
        $obj->setScreen($faker->imageUrl());
        $obj->setDescription($faker->sentences(3, true));
        // create Video in database
        $db = new \Phizzle\VideoRepository;
        // returned id is the test expectation
        $originalId = $db::create($obj);
        // get Video object from database
        $video = $db->getOneById($originalId);
        // get the id from the Video object
        $result = $video->getId();
        // result should equal the expectation
        $this->assertEquals($result, $originalId);
        // delete Video from the database
        $deleted = $db->delete($result);
        // A single row should have been deleted from the database table
        $this->assertEquals(1, $deleted);
    }
}