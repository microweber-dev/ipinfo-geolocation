<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 1/14/2020
 * Time: 2:46 PM
 */

include "GeolocationProviders.php";

class IpInfo
{
    public $ip = false;

    public function __construct()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $this->ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $this->ip = $_SERVER['REMOTE_ADDR'];
        }
    }

    public function setIp($ip)
    {
        if ($ip) {
            $this->ip = $ip;
        }
    }

    public function getDetails()
    {
        $geo = new GeolocationProviders();
        $geo->setIp($this->ip);

        return $geo->getDetails();
    }

}
