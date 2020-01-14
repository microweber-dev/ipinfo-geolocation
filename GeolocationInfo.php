<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 1/14/2020
 * Time: 3:23 PM
 */


class GeolocationInfo {

    public $countryName = '';
    public $countryCode = '';
    public $regionCode = '';
    public $regionName = '';
    public $city = '';
    public $zipCode = '';
    public $latitude = '';
    public $longtitude = '';
    public $timeZone = '';

    public function setCountryName($name) {
        $this->countryName = $name;
    }

    public function setCountryCode($code) {
        $this->countryCode = $code;
    }

    public function setRegionCode($code) {
        $this->regionCode = $code;
    }

    public function setRegionName($name) {
        $this->regionName = $name;
    }

    public function setCity($city)  {
        $this->city = $city;
    }

    public function setZipCode($code) {
        $this->zipCode = $code;
    }

    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    public function setLongtitude($longtitude) {
        $this->longtitude = $longtitude;
    }

    public function setTimeZone($time) {
        $this->timeZone = $time;
    }

    public function getInfo() {
        return $this;
    }

}