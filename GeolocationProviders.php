<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 1/14/2020
 * Time: 2:40 PM
 */

include "GeolocationInfo.php";

class GeolocationProviders
{
    public $ip = false;

    public $providers = array(
        'ipApiCom',
        'ipApiCo',
        'freeGeoIpApp'
    );

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function getDetails()
    {
        foreach ($this->providers as $provider) {

            $info = $this->{$provider}();
            if (!$info) {
                continue;
            }

            return $info;
        }

        return array();
    }

    private function freeGeoIpApp($ip)
    {
        $url = 'http://freegeoip.app/json/'.$this->ip;
        $content = file_get_contents($url);
        $json = json_decode($content, TRUE);

        if (!$json) {
            return false;
        }

        if (!$json['country_name']) {
            return false;
        }

        $geoInfo = new GeolocationInfo();
        $geoInfo->setIp($this->ip);
        $geoInfo->setCountryName($json['country_name']);
        $geoInfo->setCountryCode($json['country_code']);
        $geoInfo->setRegionCode($json['region_code']);
        $geoInfo->setRegionName($json['region_name']);
        $geoInfo->setCity($json['city']);
        $geoInfo->setZipCode($json['zip_code']);
        $geoInfo->setLatitude($json['latitude']);
        $geoInfo->setLongtitude($json['longitude']);
        $geoInfo->setTimeZone($json['time_zone']);

        return $geoInfo->getInfo();
    }

    private function ipApiCo($ip)
    {
        $url = 'http://ipapi.co/'.$this->ip.'/json/';
        $content = file_get_contents($url);
        $json = json_decode($content, TRUE);

        if (!$json) {
            return false;
        }

        if (!$json['country_name']) {
            return false;
        }

        $geoInfo = new GeolocationInfo();
        $geoInfo->setIp($this->ip);
        $geoInfo->setCountryName($json['country_name']);
        $geoInfo->setCountryCode($json['country_code']);
        $geoInfo->setRegionCode($json['region_code']);
        $geoInfo->setRegionName($json['region_name']);
        $geoInfo->setCity($json['city']);
        $geoInfo->setZipCode($json['zip_code']);
        $geoInfo->setLatitude($json['latitude']);
        $geoInfo->setLongtitude($json['longitude']);
        $geoInfo->setTimeZone($json['time_zone']);

        return $geoInfo->getInfo();
    }

    private function ipApiCom($ip)
    {
        $url = 'http://ip-api.com/json/' . $this->ip;
        $content = file_get_contents($url);
        $json = json_decode($content, TRUE);

        if (!$json) {
            return false;
        }

        if (!$json['country']) {
            return false;
        }

        $geoInfo = new GeolocationInfo();
        $geoInfo->setIp($this->ip);
        $geoInfo->setCountryName($json['country']);
        $geoInfo->setCountryCode($json['countryCode']);
        $geoInfo->setRegionCode($json['region']);
        $geoInfo->setRegionName($json['regionName']);
        $geoInfo->setCity($json['city']);
        $geoInfo->setZipCode($json['zip']);
        $geoInfo->setLatitude($json['lat']);
        $geoInfo->setLongtitude($json['lon']);
        $geoInfo->setTimeZone($json['timezone']);

        return $geoInfo->getInfo();
    }
}