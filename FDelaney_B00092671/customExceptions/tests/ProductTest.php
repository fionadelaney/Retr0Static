<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 28/06/2016
 * Time: 08:23
 */

namespace ItbTests;


use Itb\Product;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCreateProduct()
    {
        // Arrange
        $p = new Product();

        // Act

        // Assert
        $this->assertNotNull($p);
    }

    public function testSetGetId()
    {
        // Arrange
        $p = new Product();
        $p->setId(5);
        $expectedResult = 5;

        // Act
        $result = $p->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetGetName()
    {
        // Arrange
        $p = new Product();
        $p->setName('carrots');
        $expectedResult = 'carrots';

        // Act
        $result = $p->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }


    public function testSetGetPrice()
    {
        // Arrange
        $p = new Product();
        $p->setPrice(9.99);
        $expectedResult = 9.99;

        // Act
        $result = $p->getPrice();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }


}