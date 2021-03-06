<?php

namespace Phizzle;

/**
 * Class Video
 * @package Phizzle
 */
class Video
{
    /**
     * The object's unique ID in the database
     * @var int
     */
    private $id;

    /**
     * The title of the video
     * @var string
     */
    private $title;

    /**
     * Screen capture of the video
     * @var string
     */
    private $screen;

    /**
     * The url for the video
     * @var string
     */
    private $url;

    /**
     * A description of the video
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
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getScreen()
    {
        return $this->screen;
    }

    /**
     * @param string $screen
     */
    public function setScreen($screen)
    {
        $this->screen = $screen;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}