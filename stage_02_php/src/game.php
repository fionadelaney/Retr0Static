<?php
/**
 * Created with: PHPStorm
 * By: Fiona Delaney
 * Date: 9/04/16
 * Time: 19.17
 *
 * Object oriented representation of Games for sale in ShopListing
 *
 *
 * <tr>
<td> Id </td>
<td> Title</td>
<td> Platform </td>
<td> &euro; </td>
<td> Screengrab </td>
<td> Dev </td>
<td> Description </td>
</tr>
 *
 *
 */

class game
{
    /**
     * objects unique ID
     * @var String
     */
    private $game_id;


    /**
     * objectsTitle
     * @var String
     */
    private $game_title;

    /**
     * objects gaming platform
     * @var String
     */
    private $game_platform;

    /**
     * objects price
     * @var float
     */
    private $game_price;

    /**
     * objects startscreen
     * @var String
     */
    private $game_screen;

    /**
     * objects developer
     * @var String
     */
    private $game_dev;

    /**
     * objects dev url
     * @var String
     */
    private $game_dev_url;

    /**
     * objects description
     * @var String
     */
    private $game_desc;

    /**
     * game constructor
     * @param $game_id
     */
    public function__construct($game_id, $game_title, $game_platform, $game_price, $game_screen, $game_dev,
        $game_dev_url, $game_description)
    {
        $this-> game_id = $game_id;
        $this-> game_title = $game_title;
        $this-> game_platform = $game_platform;
        $this-> game_price = $game_price;
        $this-> game_screen = $game_screen;
        $this-> game_dev = $game_dev;
        $this-> game_dev_url = $game_dev_url;
        $this-> game_desc = $game_desc;
    }

    /**
    * return variables
    */
    public function getGameId()
    {
        return $this->game_id;
    }

    public function getGameTitle()
    {
        return $this->game_title;
    }

    public function getGamePlatform()
    {
        return $this->game_platform;
    }

    public function getGamePrice()
    {
        return $this->game_price()
    }

    public function getGameScreen()
    {
        return$this->
    }

}
