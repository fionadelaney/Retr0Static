<?php

namespace Phizzle;

/**
 * Class Product
 * @package Phizzle
 */
class Product
{
    /**
     * The object's unique ID in the database
     * @var int
     */
    private $id;

    /**
     * The product_id which appears on the website
     * @var string
     */
    private $product_id;

    /**
     * The title of the product
     * @var string
     */
    private $title;

    /**
     * The product's platform
     * @var string
     */
    private $platform;

    /**
     * The product's year of release
     * @var string
     */
    private $released;

    /**
     * The product's price
     * @var number
     */
    private $price;

    /**
     * Screen capture of product
     * @var string
     */
    private $screen;

    /**
     * ID of product developer
     * @var int
     */
    private $developer_id;

    /**
     * A description of the game
     * @var string
     */
    private $description;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param $platform
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;
    }

    /**
     * @return string
     */
    public function getReleased()
    {
        return $this->released;
    }

    /**
     * @param $released
     */
    public function setReleased($released)
    {
        $this->released = $released;
    }

    /**
     * @return string
     */
    public function getScreen()
    {
        return $this->screen;
    }

    /**
     * @param $screen
     */
    public function setScreen($screen)
    {
        $this->screen = $screen;
    }

    /**
     * @return number
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getDeveloperId()
    {
        return $this->developer_id;
    }

    /**
     * @param int $developer_id
     */
    public function setDeveloperId($developer_id)
    {
        $this->developer_id = $developer_id;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}