<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 1/14/2020
 * Time: 3:37 PM
 */

class CacheManager
{
    public $cacheFile = false;
    public $cacheFolder = 'cache';

    public function setCacheFilename($name)
    {
        $this->cacheFile = $name . '.txt';
    }

    public function setCacheData($data)
    {
        if (!$data) {
            return false;
        }

        $this->_checkCacheDir();

        file_put_contents($this->cacheFolder . DIRECTORY_SEPARATOR . $this->cacheFile, serialize($data));

        return $data;
    }

    public function getCacheData()
    {
        if (is_file($this->cacheFolder . DIRECTORY_SEPARATOR . $this->cacheFile)) {
            return unserialize(file_get_contents($this->cacheFolder . DIRECTORY_SEPARATOR . $this->cacheFile));
        }

       return false;
    }

    private function _checkCacheDir()
    {
        if (!is_dir($this->cacheFolder)) {
            mkdir($this->cacheFolder);
        }
    }
}
