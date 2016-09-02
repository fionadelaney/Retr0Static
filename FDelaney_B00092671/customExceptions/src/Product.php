<?php
/**
 * any old comment
 */
namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;

/**
 * Class Product
 * @package Itb
 */
class Product extends DatabaseTable
{
    /**
     * unique ID for the product
     *
     * @var int
     */
    private $id;

    /**
     * price of product
     *
     * @var float
     */
    private $price;

    /**
     * name of product
     *
     * @var string
     */
    private $name;

    /**
     * name getter
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * name setter
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * id getter
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * id setter
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * price getter
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * price seter
     *
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }



}