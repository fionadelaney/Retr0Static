<?php

namespace Phizzle;

/**
 * Class Developer
 * @package Phizzle
 */
class Developer
{
    /**
     * The object's unique ID in the database
     * @var int
     */
    private $id;

    /**
     * The name of the developer
     * @var string
     */
    private $name;

    /**
     * The developer's website url
     * @var string
     */
    private $url;

    /**
     * A description of the developer
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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