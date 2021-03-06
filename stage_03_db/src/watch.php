<?php
namespace Phizzle;
/**
 * Created by PhpStorm.
 * User: vagrant
 * Date: 16/04/16
 * Time: 16:46


* Object oriented representation of stuff to watch in ScreenListing
*

<th><h3>Playthrough</h3></th>
<th><h3> Trailers </h3></th>
<th><h3>  Movies  </h3></th>
<th><h3>Playthrough</h3></th>
<th><h3>Sims2 TV dkidluke</h3></th>

 *
 *
 */




class Watch
{

    /**
     * objectsTitle
     * @var String
     */
    private $game_title;

    /**
     * objects startscreen
     * @var String
     */
    private $game_screen;

    /**
     * objects video url
     * @var String
     */
    private $video_url;

    /**
     * game constructor
     * @param $game_title
     */
    public function __construct($game_screen, $game_title, $video_url)
    {
        $this->game_screen = $game_screen;
        $this->game_title = $game_title;
        $this->video_url = $video_url;
    }

    /**
     * return variables
     */

    public function getGameScreen()
    {
        return $this->game_screen;
    }

    public function getGameTitle()
    {
        return $this->game_title;
    }

    public function getVideoUrl()
    {
        return $this->video_url;
    }

}