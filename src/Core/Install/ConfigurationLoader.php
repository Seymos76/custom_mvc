<?php


namespace App\Core\Install;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class ConfigurationLoader
{
    public static function load(string $fileName, bool $withIndex = false)
    {
        try {
            $yml = Yaml::parseFile(__DIR__.'/../../../config/'.$fileName.'.yml');
            return $withIndex ? $yml : $yml[$fileName];
        } catch (ParseException $exception) {
            printf('Unable to parse the YAML fils: %s', $exception->getMessage());
        }
    }
}