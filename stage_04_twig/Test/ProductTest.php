<?php

namespace Phizzle\Test;

class ProductTest extends \PHPUnit_Framework_TestCase
{

    public function testTitleIsSet()
    {
        // test expectations
        $originalTitle = 'A test title';
        $expectedResult = 'A test title';
        // instantiate product
        $product = new \Phizzle\Product;
        // set the product title
        $product->setTitle( $originalTitle );
        // get the product title
        $result = $product->getTitle();
        // result should equal the expectation
        $this->assertEquals($expectedResult, $result);
    }

    public function testProductIdIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalProductId = $faker->slug(2);
        $expectedResult = $originalProductId;
        // instantiate product
        $product = new \Phizzle\Product;
        // set the product_id
        $product->setProductId( $originalProductId );
        // get the platform_id
        $result = $product->getProductId();
        // result should equal the expectation
        $this->assertEquals($expectedResult, $result);
    }

    public function testPlatformIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalPlatform = $faker->word;
        $expectedResult = $originalPlatform;
        // instantiate product
        $product = new \Phizzle\Product;
        // set the platform
        $product->setPlatform( $originalPlatform );
        // get the platform
        $result = $product->getPlatform();
        // result should equal the expectation
        $this->assertEquals($expectedResult, $result);
    }

    public function testReleasedIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalReleased = $faker->year;
        $expectedResult = $originalReleased;
        // instantiate product
        $product = new \Phizzle\Product;
        // set the released year
        $product->setReleased( $originalReleased );
        // get the released year
        $result = $product->getReleased();
        // result should equal the expectation
        $this->assertEquals($expectedResult, $result);
    }

    public function testScreenIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalScreen = $faker->url;
        $expectedResult = $originalScreen;
        // instantiate product
        $product = new \Phizzle\Product;
        // set the screen url
        $product->setScreen( $originalScreen );
        // get the screen url
        $result = $product->getScreen();
        // result should equal the expectation
        $this->assertEquals($expectedResult, $result);
    }

    public function testPriceIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalPrice = $faker->randomFloat(2);
        $expectedResult = $originalPrice;
        // instantiate product
        $product = new \Phizzle\Product;
        // set the product price
        $product->setPrice( $originalPrice );
        // get the product price
        $result = $product->getPrice();
        // result should equal the expectation
        $this->assertEquals($expectedResult, $result);
    }

    public function testDeveloperIdIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalDeveloperId = $faker->randomNumber(5);
        $expectedResult = $originalDeveloperId;
        // instantiate product
        $product = new \Phizzle\Product;
        // set the developer_id
        $product->setDeveloperId( $originalDeveloperId );
        // get the developer_id
        $result = $product->getDeveloperId();
        // result should equal the expectation
        $this->assertEquals($expectedResult, $result);
    }

    public function testDescriptionIsSet()
    {
        $faker = \Faker\Factory::create();
        // test expectations
        $originalDescription = $faker->realText(200);
        // instantiate video
        $product = new \Phizzle\Product;
        // set the video description
        $product->setDescription( $originalDescription );
        // get the video description
        $result = $product->getDescription();
        // result should equal the expectation
        $this->assertEquals($originalDescription, $result);
    }


    public function testCanGetId()
    {
        // setup test developer
        $faker = \Faker\Factory::create();
        $obj = new \Phizzle\Product;
        $obj->setTitle($faker->company);
        $obj->setProductId($faker->isbn13);
        $obj->setPlatform($faker->postcode);
        $obj->setReleased($faker->year);
        $obj->setPrice($faker->randomFloat(2,1,20));
        $obj->setScreen($faker->imageUrl());
        $obj->setDeveloperId($faker->randomDigitNotNull);
        $obj->setDescription($faker->sentences(3, true));
        // create Product object in the database
        $db = new \Phizzle\ProductRepository;
        // returned id is the test expectation
        $originalId = $db::create($obj);
        // get Product object from database
        $product = $db->getOneById($originalId);
        // get the id from the Developer object
        $result = $product->getId();
        // result should equal the expectation
        $this->assertEquals($result, $originalId);
        // delete Product object from the database
        $deleted = $db->delete($result);
        // A single row should have been deleted from the database table
        $this->assertEquals(1, $deleted);
    }

}